<?php

namespace App\Http\Controllers\Farmer;

use App\Http\Controllers\Controller;
use App\Jobs\Farmer\CattleRegistrationProcess;
use App\Models\CattleRegistration;
use App\Models\Firm;
use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Client\ConnectionException;

class CattleRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farms = auth()->user()->farm;

        return view('farmer.admin-content.cattle_register.index', compact('farms'));
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


        $animalType = $request->input('animal_type');

        if (!in_array($animalType, ['cattle', 'buffalo', 'goat'])) {
            // Return early or display an error message
            return "Invalid Request";
        }

        $id = 0;

        if (CattleRegistration::orderBy('id', 'desc')->count() == 0) {
            $id = 1;
        } else if (!CattleRegistration::orderBy('id', 'desc')->count() == 0) {
            $id = CattleRegistration::orderBy('id', 'desc')->first()->id + 1;
        }

        $rules = [
            'animal_type' => 'required',
            'cattle_name' => 'required',
            'cattle_breed' => 'required',
            'age' => 'required',
            'cattle_color' => 'required',
            'weight' => 'required',
            'farm' => 'required',
            'cattle_type' => 'nullable',

            'sum_insured' => 'required',
            'muzzle_of_cow' => $animalType === 'goat' ? 'nullable|mimes:jpeg,jpg,png' : 'required|mimes:jpeg,jpg,png',
            'left_side' => 'required|mimes:jpeg,jpg,png',
            'right_side' => 'required|mimes:jpeg,jpg,png',
            'special_marks' => 'required|mimes:jpeg,jpg,png',
            'cow_with_owner' => 'nullable|mimes:jpeg,jpg,png',

        ];

        // Perform the validation
        $inputs = request()->validate($rules);
        $inputs['unique_id'] = $id;


//        ----------------------------- If animal type is cattle then muzzle will be inserted, else it will store "Not Applicable for goat registration" -----------------------------

        if ($animalType === 'goat') {
            $inputs['muzzle_of_cow'] = "Not Applicable for goat registration";
        } else {
            if (request('muzzle_of_cow')) {
                $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
            }
        }

//        ----------------------------- If animal type is cattle then muzzle will be inserted, else it will store "Not Applicable for goat registration" -----------------------------


        if (request('left_side')) {
            $inputs['left_side'] = \request('left_side')->store('images');
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

//        ----------------------------- Detecting if animal type is goat -----------------------------

        if ($animalType === 'goat') {
            auth()->user()->cattleRegister()->create($inputs);
            session()->flash("register_goat", "Goat Registered Successfully");
            return back();
        }

//        ----------------------------- Detecting if animal type is goat -----------------------------


//        ------------------------------- API DATA [ With JOB Batching ] - Cattle Registration ---------------------------------

        $basename = $inputs['muzzle_of_cow'];

        $this->dispatch(new CattleRegistrationProcess($inputs, $basename, auth()->user(), $id));
        session()->flash("register", "Verification process running, If the process is accepted, the cattle information will be automatically added to the list");
        return back();

//        ------------------------------- API DATA [ With JOB Batching ] - Cattle Registration ---------------------------------


//        ------------------------------- API DATA ---------------------------------

//


//        $basename = $inputs['muzzle_of_cow'];
//
//        $apiUrl = "http://13.232.34.224/cattle_identification";
//        $options = 'registration';

//
//        try {
//            $response = Http::attach(
//                'image',
//                file_get_contents(storage_path('app/public/' . $basename)),
//                basename($basename) // File name to use in the request
//            )->post($apiUrl, ['options' => $options]);
//
//
//            if ($response->status() == 200) {
//
//                $apiResponse = $response->json('output');
//
//                if ($apiResponse == "Success") {
//
//                    auth()->user()->cattleRegister()->create($inputs);
//                    session()->flash("register", "Cattle Registered Successfully");
//                    return back();
//                } elseif ($apiResponse == "Failed") {
//                    session()->flash("register", "Registration failed");
//                    return back();
//                } else {
//                    session()->flash("register", "Server Error");
//                    return back();
//                }
//
//            } else {
//
//                return "Error";
//            }
//        } catch (ConnectionException $e) {
//
//            return "Server Timeout";
//        }

//        ------------------------------- API DATA ---------------------------------


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
