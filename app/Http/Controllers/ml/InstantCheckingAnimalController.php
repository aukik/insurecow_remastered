<?php

namespace App\Http\Controllers\ml;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\CattleRegReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstantCheckingAnimalController extends Controller
{


    public function index()
    {
        return view("farmer.admin-content.animal_checking.index_claim_demo");
    }


    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'muzzle_of_cow' => 'required|mimes:jpeg,jpg,png',
//            'muzzle_token' => 'required',
//            'cattle_id' => 'required',
        ]);

        if (request('muzzle_of_cow')) {
            $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
        }


        //        ------------------------------- API DATA ---------------------------------

        // Additional parameters to send to the API
        $options = 'claim';

        // API endpoint URL
        $apiUrl = "http://13.232.34.224/cattle_identification";

//        $basename = $inputs['muzzle_token'];


//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------

//        $basename_with_cattle_r_id = pathinfo($basename, PATHINFO_FILENAME);


//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------


//        $cattle_id = $inputs['cattle_id'];
//
//        $cattle_data = CattleRegistration::find($cattle_id);
//
//
//        if ($cattle_data){
//            return "Cattle data not found";
//        }

//        return $inputs['muzzle_of_cow'];

        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $inputs['muzzle_of_cow']))
                , basename("N1UoxGhFxbcjhbl1MJq0FB80VsPWLOlZss206YIP")
            )->post($apiUrl, ['options' => $options]);


            if ($response->status() == 200) {


                $apiResponse = $response->json('output');




                $result = auth()->user()->cattleRegister()->where('muzzle_of_cow', 'like', '%' . $apiResponse . '%')->count();

                if ($result == 1) {

                    $cattle_data = CattleRegistration::where('muzzle_of_cow', 'like', '%' . $apiResponse . '%')->first();

                    if (!$cattle_data){
                        return "Cattle data not found in database but found in ml server";
                    }

                    session()->flash("claim_success", "Information Found");
                    return back()->with("data", $cattle_data);


                } elseif ($result == 0) {


                    session()->flash("claim_failed", "Information not found");
                    return back();
                } else {
                    session()->flash("error", "Server error");
                }

            } else {
                // Handle API error, e.g., log or throw an exception
                // You can access the response content with $response->body()
                // and the status code with $response->status()
                return "Error";
            }
        } catch (Exception $e) {
            // Handle exceptions, e.g., connection issues or timeouts
            // Log or rethrow the exception as needed
            return "Catch Exception";
        }
//        ------------------------------- API DATA ---------------------------------


        return back();
    }

}
