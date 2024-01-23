<?php

namespace App\Http\Controllers\Company\Farmer;


use App\Http\Controllers\Controller;
use App\Jobs\Farmer\CattleRegistrationProcess;
use App\Models\CattleRegistration;
use App\Models\User;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index($id)
    {
        $farmer = User::findOrFail($id);

        if ($farmer->company_id != auth()->user()->id) {
            return "This farmer is not registered under this company";
        }

        if ($farmer->role == 's' || $farmer->role == 'fa' || $farmer->role == 'c') {
            return "Invalid request, this user is not a farmer";
        }

        $farms = User::find($id)->farm;

        return view('company.admin-content.farmer.cattle_register.index', compact('farms', 'farmer'));
    }

    public function store(Request $request)
    {

        $animalType = $request->input('animal_type');

        if (!in_array($animalType, ['cattle', 'buffalo', 'goat'])) {
            // Return early or display an error message
            return "Invalid animal type";
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

//        ------------------------ Find user id info ------------------------

        $user = User::find(\request('user_id_info'));

//        ------------------------ Find user id info ------------------------


//        ----------------------------- If animal type is cattle then muzzle will be inserted, else it will store "Not Applicable for goat registration" -----------------------------


        if ($animalType === 'goat' || $animalType === 'buffalo') {
            $inputs['muzzle_of_cow'] = "Not Applicable for goat or buffalo registration";

        } else {
            if (request('muzzle_of_cow')) {
                $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
//                return $inputs['muzzle_of_cow'];

//                -------------------------- the cattle_r_id , currently on test mode --------------------------

//                $cattle_r_id = pathinfo($inputs['muzzle_of_cow'], PATHINFO_FILENAME);
//                $inputs['unique_id'] = $cattle_r_id;
//                return $cattle_r_id;

//                -------------------------- the cattle_r_id , currently on test mode --------------------------
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

        if ($animalType === 'goat' || $animalType === 'buffalo') {
            $user->cattleRegister()->create($inputs);
            session()->flash("register_goat", $animalType." Registered Successfully");
            return back();
        }

//        ----------------------------- Detecting if animal type is goat -----------------------------


//        ------------------------------- API DATA [ With JOB Batching ] - Cattle Registration ---------------------------------

        $basename = $inputs['muzzle_of_cow'];

        $this->dispatch(new CattleRegistrationProcess($inputs, $basename, $user, $id));
        session()->flash("register", "Verification process running, If the process is accepted, the cattle information will be automatically added to the list");
        return back();

//        ------------------------------- API DATA [ With JOB Batching ] - Cattle Registration ---------------------------------
    }
}
