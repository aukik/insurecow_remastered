<?php

namespace App\Http\Controllers\API\Farmer\Claim;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\CattleRegReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClaimRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $inputs = [];
        $inputs['muzzle_of_cow'] = $request->input('muzzle_of_cow');
//        $inputs['muzzle_token'] = $request->input('muzzle_token');
        $inputs['cattle_id'] = $request->input('cattle_id');

        if (request('muzzle_of_cow')) {
            $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
        }

        // Additional parameters to send to the API
        $options = 'claim';
        $apiUrl = "http://13.232.34.224/cattle_identification";


        $cattle_id = $inputs['cattle_id'];
        $cattle_data = CattleRegistration::findOrFail($cattle_id);

        // API endpoint URL

        $basename = $cattle_data->muzzle_of_cow;

//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------

        $basename_with_cattle_r_id = pathinfo($basename, PATHINFO_FILENAME);

//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------


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

//                    session()->flash("claim_success", "Claim action matched successfully");
//                    return back()->with("data", $cattle_data);

                    return response()->json([
                        'message' => 'Claim action matched successfully'
                    ], 200); // 404 Not Found


                } elseif ($result == 0) {

                    CattleRegReport::create([
                        'cattle_name' => $cattle_data->cattle_name,
                        'cow_with_owner' => $cattle_data->cow_with_owner,
                        'verification_report' => "failed",
                        'user_id' => auth()->user()->id,
                        'cattle_id' => $cattle_data->id,
                        'operation' => 'claim'

                    ]);

//                    session()->flash("claim_failed", "Claim action unaccepted");
//                    return back();

                    return response()->json([
                        'message' => 'Claim action unaccepted'
                    ], 200); // 404 Not Found
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

    public function index()
    {

        $claim_reports = auth()->user()->cattle_reg_report()->where('verification_report','success')->get()->map(function ($claim) {
            return [
                'id' => $claim->id,
                'cattle_name' => $claim->cattle_name,
                'verification_report' => $claim->verification_report,

                'cow_with_owner' => asset('storage/'.$claim->cow_with_owner),
                'farmer_id' => (int) $claim->user_id,
                'cattle_id' => (int) $claim->cattle_id,

                'created_at' => $claim->created_at,
                'updated_at' => $claim->updated_at,
            ];
        });

        return response()->json([
            'data' => $claim_reports
        ]);

    }

}
