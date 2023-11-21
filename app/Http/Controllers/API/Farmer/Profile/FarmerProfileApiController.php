<?php

namespace App\Http\Controllers\API\Farmer\Profile;

use App\Http\Controllers\Controller;
use App\Models\FarmerProfile;
use Illuminate\Http\Request;

class FarmerProfileApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        if (auth()->user()->farmerProfile()->orderBy('id', 'desc')->count() > 0) {
            $farmerProfileData = auth()->user()->farmerProfile()->orderBy('id', 'desc')->first();

            $farmerProfileData->nid_front = asset('storage/' . $farmerProfileData->nid_front);
            $farmerProfileData->nid_back = asset('storage/' . $farmerProfileData->nid_back);
            $farmerProfileData->loan_investment = asset('storage/' . $farmerProfileData->loan_investment);
            $farmerProfileData->chairman_certificate = asset('storage/' . $farmerProfileData->chairman_certificate);
            $farmerProfileData->image = asset('storage/' . $farmerProfileData->image);

            return response()->json(['message' => 'Farmer data', 'profile_state' => 1, 'profile_data' => $farmerProfileData], 200);
        } else {
            return response()->json(['message' => 'Farmer profile data not found', 'profile_state' => 0], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {

        if (auth()->user()->farmerProfile()->orderBy('id', 'desc')->count() > 0) {
            $farmerProfileData = auth()->user()->farmerProfile()->orderBy('id', 'desc')->first();

            $farmerProfileData->nid_front = asset('storage/' . $farmerProfileData->nid_front);
            $farmerProfileData->nid_back = asset('storage/' . $farmerProfileData->nid_back);
            $farmerProfileData->loan_investment = asset('storage/' . $farmerProfileData->loan_investment);
            $farmerProfileData->chairman_certificate = asset('storage/' . $farmerProfileData->chairman_certificate);
            $farmerProfileData->image = asset('storage/' . $farmerProfileData->image);

            return response()->json(['message' => 'Farmer profile data already exists', 'profile_data' => $farmerProfileData], 200);
        }

        $inputs = [
            'fathers_name' => \request()->input('fathers_name'),
            'mothers_name' => \request()->input('mothers_name'),
            'present_address' => \request()->input('present_address'),
            'dob' => \request()->input('dob'),
            'nid' => \request()->input('nid'),
            'source_of_income' => \request()->input('source_of_income'),
            'bank_account_no' => \request()->input('bank_account_no'),
            'farmer_address' => \request()->input('farmer_address'),
            'thana' => \request()->input('thana'),
            'upazilla' => \request()->input('upazilla'),
            'union' => \request()->input('union'),
            'division' => \request()->input('division'),
            'district' => \request()->input('district'),
            'zip_code' => \request()->input('zip_code'),
            'village' => \request()->input('village'),
            'loan_amount' => \request()->input('loan_amount'),
            'num_of_livestock' => \request()->input('num_of_livestock'),
            'type_of_livestock' => \request()->input('type_of_livestock'),
            'nationality' => \request()->input('nationality'),
            'bank_name_insured' => \request()->input('bank_name_insured'),
            'nid_front' => \request()->input('nid_front'),
            'nid_back' => \request()->input('nid_back'),
            'loan_investment' => \request()->input('loan_investment'),
            'chairman_certificate' => \request()->input('chairman_certificate'),
            'image' => \request()->input('image'),
        ];

        if (request()->hasFile('image')) {
            $inputs['image'] = \request('image')->store('images');
        } else {
            return "Its not a file type, Invalid data type for image file type";
        }

        if (request()->hasFile('loan_investment')) {
            $inputs['loan_investment'] = \request('loan_investment')->store('images');
        } else {
            $inputs['loan_investment'] = null;
//            return "Its not a file type, Invalid data type for loan_investment file type";
        }

        if (request()->hasFile('nid_front')) {
            $inputs['nid_front'] = \request('nid_front')->store('images');
        } else {
            return "Its not a file type, Invalid data type for nid_front file type";
        }

        if (request()->hasFile('nid_back')) {
            $inputs['nid_back'] = \request('nid_back')->store('images');
        } else {
            return "Its not a file type, Invalid data type for nid_back file type";
        }

        if (request()->hasFile('chairman_certificate')) {
            $inputs['chairman_certificate'] = \request('chairman_certificate')->store('images');
        } else {
            $inputs['chairman_certificate'] = null;
//            return "Its not a file type, Invalid data type for chairman_certificate file type";
        }


//      ------------------------------ validation ------------------------------

//        $missingFields = [];
//
//        foreach ($inputs as $field => $value) {
//            if (empty($value)) {
//                $missingFields[] = $field;
//            } elseif (in_array($field, ['nid_front', 'nid_back', 'loan_investment', 'chairman_certificate', 'image']) && is_null(\request()->file($field))) {
//                $missingFields[] = 'File required for ' . $field;
//            } elseif (in_array($field, ['nid_front', 'nid_back']) && !in_array(\request()->file($field)->getClientOriginalExtension(), ['jpeg', 'jpg', 'png'])) {
//                $missingFields[] = 'Invalid file type for ' . $field;
//            } elseif ($field === 'loan_investment' && !in_array(\request()->file($field)->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'pdf', 'txt'])) {
//                $missingFields[] = 'Invalid file type for ' . $field;
//            } elseif (in_array($field, ['chairman_certificate', 'image']) && !in_array(\request()->file($field)->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'pdf', 'txt'])) {
//                $missingFields[] = 'Invalid file type for ' . $field;
//            }
//        }
//
//        if (!empty($missingFields)) {
//            $response = [
//                'error' => 'Missing or invalid required fields',
//                'missing_fields' => $missingFields
//            ];
//
//            return response()->json($response, 400); // Return a JSON error response with a 400 status code
//        }


        $missingFields = [];

        foreach ($inputs as $field => $value) {
            if (empty($value) && !in_array($field, ['loan_investment', 'chairman_certificate'])) {
                $missingFields[] = $field;
            } elseif (in_array($field, ['nid_front', 'nid_back', 'loan_investment', 'chairman_certificate', 'image']) && !is_null(\request()->file($field))) {
                if (in_array($field, ['nid_front', 'nid_back'])) {
                    $fileExtension = \request()->file($field)->getClientOriginalExtension();
                    if (!in_array($fileExtension, ['jpeg', 'jpg', 'png'])) {
                        $missingFields[] = 'Invalid file type for ' . $field;
                    }
                } elseif (in_array($field, ['loan_investment', 'chairman_certificate', 'image'])) {
                    $fileExtension = \request()->file($field)->getClientOriginalExtension();

                    if ($field === 'image') {
                        $allowedExtensions = ['jpeg', 'jpg', 'png'];
                    } else {
                        $allowedExtensions = ['jpeg', 'jpg', 'png', 'pdf', 'txt'];
                    }

                    if (!in_array($fileExtension, $allowedExtensions)) {
                        $missingFields[] = 'Invalid file type for ' . $field;
                    }
                }
            }
        }

        if (!empty($missingFields)) {
            $response = [
                'error' => 'Missing or invalid required fields',
                'missing_fields' => $missingFields
            ];

            return response()->json($response, 400); // Return a JSON error response with a 400 status code
        }

//      ------------------------------ validation ------------------------------


        $farmerProfile = auth()->user()->farmerProfile()->create($inputs);

        if ($farmerProfile) {
            // Farmer profile created successfully
            return response()->json(['message' => 'Farmer profile has been created successfully'], 200);
        } else {
            // Handle the case where the profile creation failed
            return response()->json(['error' => 'Failed to create farmer profile'], 500); // You can choose an appropriate HTTP status code
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {


        $farmerProfile = auth()->user()->farmerProfile()->where('id', $id)->first();


        if ($farmerProfile) {
            if ($farmerProfile->user_id != auth()->user()->id) {
                return response()->json(['message' => 'This data does not belong to the authenticated user'], 403);
            }
        } else {
            return response()->json(['message' => 'Farmer profile data resource not found'], 404);
        }

        $inputs = [
            'fathers_name' => \request()->input('fathers_name'),
            'mothers_name' => \request()->input('mothers_name'),
            'present_address' => \request()->input('present_address'),
            'dob' => \request()->input('dob'),
            'nid' => \request()->input('nid'),
            'source_of_income' => \request()->input('source_of_income'),
            'bank_account_no' => \request()->input('bank_account_no'),
            'farmer_address' => \request()->input('farmer_address'),
            'thana' => \request()->input('thana'),
            'upazilla' => \request()->input('upazilla'),
            'union' => \request()->input('union'),
            'division' => \request()->input('division'),
            'district' => \request()->input('district'),
            'zip_code' => \request()->input('zip_code'),
            'village' => \request()->input('village'),
            'loan_amount' => \request()->input('loan_amount'),
            'num_of_livestock' => \request()->input('num_of_livestock'),
            'type_of_livestock' => \request()->input('type_of_livestock'),
            'nationality' => \request()->input('nationality'),
            'bank_name_insured' => \request()->input('bank_name_insured'),
            'nid_front' => \request()->input('nid_front'),
            'nid_back' => \request()->input('nid_back'),
            'loan_investment' => \request()->input('loan_investment'),
            'chairman_certificate' => \request()->input('chairman_certificate'),
            'image' => \request()->input('image'),
        ];

        if (request()->hasFile('image')) {
            $inputs['image'] = \request('image')->store('images');
        } else {
            $inputs['image'] = $farmerProfile->image;
        }


        if (request()->hasFile('loan_investment')) {
            $inputs['loan_investment'] = \request('loan_investment')->store('images');
        } else {
            $inputs['loan_investment'] = $farmerProfile->loan_investment;
        }

        if (request()->hasFile('nid_front')) {
            $inputs['nid_front'] = \request('nid_front')->store('images');
        } else {
            $inputs['nid_front'] = $farmerProfile->nid_front;
        }

        if (request()->hasFile('nid_back')) {
            $inputs['nid_back'] = \request('nid_back')->store('images');
        } else {
            $inputs['nid_back'] = $farmerProfile->nid_back;
        }

        if (request()->hasFile('chairman_certificate')) {
            $inputs['chairman_certificate'] = \request('chairman_certificate')->store('images');
        } else {
            $inputs['chairman_certificate'] = $farmerProfile->chairman_certificate;
        }


        $update_information = auth()->user()->farmerProfile()->where('id', $farmerProfile->id)->update($inputs);

        if ($update_information) {
            // Farmer profile created successfully
            return response()->json(['message' => 'Farmer profile has been updated successfully'], 200);
        } else {
            // Handle the case where the profile creation failed
            return response()->json(['error' => 'Failed to create farmer profile'], 500); // You can choose an appropriate HTTP status code
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
