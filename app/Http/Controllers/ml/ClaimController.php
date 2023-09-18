<?php

namespace App\Http\Controllers\ml;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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


        if (request('muzzle_of_cow')) {
            $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
        }


        //        ------------------------------- API DATA ---------------------------------

        // Additional parameters to send to the API
        $options = 'claim';

        // API endpoint URL
        $apiUrl = env('API_URL');

        $basename = $inputs['muzzle_token'];
        $catl_id = $inputs['cattle_id'];


        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $inputs['muzzle_of_cow'])),
                basename($basename) // File name to use in the request
            )->post($apiUrl, ['options' => $options]);


            if ($response->status() == 200) {

                $apiResponse = $response->json('output');

                if ($apiResponse == "Success") {
//                    auth()->user()->cattleRegister()->create($inputs);

                    auth()->user()->insurance_claimed()->create($inputs);

                    session()->flash("claim_success", "Claim action matched successfully");
                    return back();
                } elseif ($apiResponse == "Failed") {
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
