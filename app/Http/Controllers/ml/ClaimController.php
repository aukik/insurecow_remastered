<?php

namespace App\Http\Controllers\ml;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\CattleRegReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ClaimController extends Controller
{


    public function index($id)
    {

        $cattle_info = auth()->user()->cattleRegister()->where('id', $id)->first();

        if ($cattle_info != null) {
            return view("farmer.admin-content.claim.index", compact('cattle_info'));

        } else {
            return "Invalid request";
        }
    }

    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'muzzle_of_cow' => 'required|mimes:jpeg,jpg,png',
            'muzzle_token' => 'required',
            'cattle_id' => 'required',
        ]);

//        return CattleRegistration::findOrFail($inputs['cattle_id']);


        if (request('muzzle_of_cow')) {
            $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
        }


        //        ------------------------------- API DATA ---------------------------------

        // Additional parameters to send to the API
        $options = 'claim';

        // API endpoint URL
        $apiUrl = "http://13.232.34.224/cattle_identification";

        $basename = $inputs['muzzle_token'];


//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------

        $basename_with_cattle_r_id = pathinfo($basename, PATHINFO_FILENAME);

//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------


        $cattle_id = $inputs['cattle_id'];

        $cattle_data = CattleRegistration::findOrFail($cattle_id);

        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $inputs['muzzle_of_cow'])),
                basename($basename_with_cattle_r_id) // File name to use in the request
            )->post($apiUrl, ['options' => $options]);


            if ($response->status() == 200) {

                CattleRegReport::create([
                    'cattle_name' => $cattle_data->cattle_name,
                    'cow_with_owner' => $cattle_data->cow_with_owner,
                    'verification_report' => "processing",
                    'user_id' => auth()->user()->id,
                    'cattle_id' => $cattle_data->id,
                    'operation' => 'claim'

                ]);

                $apiResponse = $response->json('output');


                $result = auth()->user()->cattleRegister()->where('muzzle_of_cow', 'like', '%' . $apiResponse . '%')->count();

                if ($result == 1) {

                    CattleRegReport::create([
                        'cattle_name' => $cattle_data->cattle_name,
                        'cow_with_owner' => $cattle_data->cow_with_owner,
                        'verification_report' => "success",
                        'user_id' => auth()->user()->id,
                        'cattle_id' => $cattle_data->id,
                        'operation' => 'claim'

                    ]);

                    session()->flash("claim_success", "Claim action matched successfully");
                    return back()->with("data", $cattle_data);


                } elseif ($result == 0) {

                    CattleRegReport::create([
                        'cattle_name' => $cattle_data->cattle_name,
                        'cow_with_owner' => $cattle_data->cow_with_owner,
                        'verification_report' => "failed",
                        'user_id' => auth()->user()->id,
                        'cattle_id' => $cattle_data->id,
                        'operation' => 'claim'

                    ]);

                    session()->flash("claim_failed", "Claim action unaccepted");
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
