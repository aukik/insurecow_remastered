<?php

namespace App\Http\Controllers\API\Farmer\Claim;

use App\Http\Controllers\API\Farmer\CattleRegistration\CattleRegistrationController;
use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use App\Models\CattleRegReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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

//        $cattle_data = CattleRegistration::findOrFail($cattle_id);

        $cattle_data = CattleRegistration::find($cattle_id);

        if (!$cattle_data) {
            return response()->json([
                'response' => 'not_exists',
                'message' => 'Cattle data does not exists in the database',
                'test_purpose' => 'for test purpose from insurecow.xyz, pass cattle_id = 17, for finding the cattle_id go to api route if needed  https://insurecow.xyz/api/farmer/cattle_registration/17 ',
            ], 200);
        }

        // API endpoint URL

        $basename = $cattle_data->muzzle_of_cow;


//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------

        $basename_with_cattle_r_id = pathinfo($basename, PATHINFO_FILENAME);


//        ---------------------------- Path Info without extension , the cattle_r_id ----------------------------


        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $inputs['muzzle_of_cow'])),
                basename($basename) // File name to use in the request
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

                    Log::debug("passed");
                    return response()->json([
                        'message' => 'Claim action matched successfully'
                    ], 200);


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

                    Log::debug("unaccepted");


                    return response()->json([
                        'message' => 'Claim action unaccepted'
                    ], 200); // 404 Not Found
                } else {
                    Log::debug("problem server error");

                    session()->flash("error", "Server error");
                }

            } else {
                // Handle API error, e.g., log or throw an exception
                // You can access the response content with $response->body()
                // and the status code with $response->status()

                Log::debug("error");


                return response()->json([
                    'message' => 'Error'
                ], 200);
            }
        } catch (Exception $e) {
            // Handle exceptions, e.g., connection issues or timeouts
            // Log or rethrow the exception as needed

            Log::debug("catch exception");

            return response()->json([
                'message' => 'Catch Exception'
            ], 200);
        }
//        ------------------------------- API DATA ---------------------------------


        return back();
    }

    public function index()
    {

        $claim_reports = auth()->user()->cattle_reg_report()->where('verification_report', 'success')->get()->map(function ($claim) {
            return [
                'claim_report_id' => $claim->id,
                'cattle_name' => $claim->cattle_name,
                'verification_report' => $claim->verification_report,
                'farmer_id' => (int)$claim->user_id,
                'animal_id' => (int)$claim->cattle_id,
                'animal_data' => app(CattleRegistrationController::class)->show($claim->cattle_id)->getData()->data ?? null,
                'created_at' => $claim->created_at,
                'updated_at' => $claim->updated_at,
            ];
        });

        return response()->json([
            'data' => $claim_reports
        ]);

    }

//    -------------------------------- claim status check --------------------------------

    public function claim_success_check($cattle_id)
    {
//        $claim_report = auth()->user()->cattle_reg_report()->where('verification_report', 'success')->where('cattle_id', $cattle_id)->first();
//
//        return $claim_report;

        $claim_report = auth()->user()->cattle_reg_report()->where('verification_report', 'success')->where('cattle_id', $cattle_id)->first();

        if ($claim_report) {
            $formatted_claim_report = [
                'claim_report_id' => $claim_report->id,
                'verification_report' => $claim_report->verification_report,
                'farmers_user_id' => $claim_report->user_id,
                'animal_data' => app(CattleRegistrationController::class)->show($claim_report->cattle_id)->getData()->data ?? null,
            ];

            return response()->json([
                'data' => $formatted_claim_report,
                'report_status' => 'success'
            ]);
        } else {
            // Return an appropriate response if the claim report is not found
            return response()->json([
                'message' => 'Claim report not found',
                'report_status' => 'failed'

            ], 404); // You can choose an appropriate HTTP status code
        }
    }

//    -------------------------------- claim status check --------------------------------


}
