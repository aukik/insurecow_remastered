<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class CattleRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('farmer.admin-content.cattle_register.index');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = 0;

        if (CattleRegistration::orderBy('id', 'desc')->count() == 0) {
            $id = 1;
        } else if (!CattleRegistration::orderBy('id', 'desc')->count() == 0) {
            $id = CattleRegistration::orderBy('id', 'desc')->first()->id + 1;
        }

        $inputs = \request()->validate([
//            'cattle_name' => 'required',
//            'cattle_breed' => 'required',
//            'age' => 'required',
//            'cattle_color' => 'required',
//            'weight' => 'required',
//            'cattle_type' => 'required',
//            'current_price' => 'required',
//
//            'sum_insured' => 'required',
//            'bank_name_insured' => 'required',
//            'bank_account_no' => 'required',
//
//            'nid_front' => 'required|mimes:jpeg,jpg,png',
//            'nid_back' => 'required|mimes:jpeg,jpg,png',
//            'chairman_certificate' => 'required|mimes:jpeg,jpg,png',

            'muzzle_of_cow' => 'required|mimes:jpeg,jpg,png',
//            'left_side' => 'required|mimes:jpeg,jpg,png',
//            'right_side' => 'required|mimes:jpeg,jpg,png',
//            'special_marks' => 'required|mimes:jpeg,jpg,png',
//            'cow_with_owner' => 'required|mimes:jpeg,jpg,png',
//            'loan_investment' => 'required|mimes:jpeg,jpg,png,pdf,txt',
        ]);


#This worked
//        return response()->file(storage_path('app/public/images/' . "WegbDj4ZUvacx9Je2MElnZn0ZMLTMIe8JBmnVnsY.jpg"), ['Content-Type' => "jpg"]);

        $inputs['unique_id'] = $id;

        if (request('loan_investment')) {
            $inputs['loan_investment'] = \request('loan_investment')->store('images');
        }

        if (request('muzzle_of_cow')) {
            $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
        }

        if (request('left_side')) {
            $inputs['left_side'] = \request('left_side')->store('images');
        }

        if (request('nid_front')) {
            $inputs['nid_front'] = \request('nid_front')->store('images');
        }

        if (request('nid_back')) {
            $inputs['nid_back'] = \request('nid_back')->store('images');
        }


        if (request('chairman_certificate')) {
            $inputs['chairman_certificate'] = \request('chairman_certificate')->store('images');
        }

        if (request('right_side')) {
            $inputs['right_side'] = \request('right_side')->store('images');
        }

        if (request('special_marks')) {
            $inputs['special_marks'] = \request('special_marks')->store('images');
        }

        if (request('cow_with_owner')) {
            $inputs['cow_with_owner'] = \request('cow_with_owner')->store('images');
        }

//        ------------------------------- API DATA ---------------------------------

        // Additional parameters to send to the API
        $options = 'registration';

        // API endpoint URL
        $apiUrl = 'http://13.127.204.155/cattle_identification';


        try {
            $response = Http::attach(
                'image',
                file_get_contents(storage_path('app/public/' . $inputs['muzzle_of_cow'])),
                basename('images/'.$inputs['muzzle_of_cow']) // File name to use in the request
            )->post($apiUrl, ['options' => $options]);


            if ($response->status() == 200) {

                $apiResponse = $response->json('output');
                return $apiResponse;

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


        auth()->user()->cattleRegister()->create($inputs);
        session()->flash("register", "Cattle Registered Successfully");
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\CattleRegistration $cattleRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(CattleRegistration $cattleRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\CattleRegistration $cattleRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(CattleRegistration $cattleRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CattleRegistration $cattleRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CattleRegistration $cattleRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CattleRegistration $cattleRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(CattleRegistration $cattleRegistration)
    {
        //
    }
}
