<?php

namespace App\Http\Controllers\API\Farmer\CattleRegistration;

use App\Http\Controllers\Controller;
use App\Jobs\Farmer\CattleRegistrationProcess;
use App\Models\CattleRegistration;
use Illuminate\Http\Request;

class CattleRegistrationController extends Controller
{


    private function transformAnimalData($animal): array
    {
        return [
            'id' => $animal->id,
            'animal_type' => $animal->animal_type,
            'cattle_name' => $animal->cattle_name,
            'cattle_breed' => $animal->cattle_breed,
            'age' => $animal->age,
            'cattle_color' => $animal->cattle_color,
            'weight' => $animal->weight,
            'left_side' => asset('storage/'.$animal->left_side),
            'right_side' => asset('storage/'.$animal->right_side),
            'special_marks' => asset('storage/'.$animal->special_marks),
            'cow_with_owner' => asset('storage/'.$animal->cow_with_owner),
            'farm' => $animal->farm,
            'sum_insured' => $animal->sum_insured,
            'unique_id' => $animal->unique_id,
            'insured_by' => $animal->insured_by,
            'insurance_status' => $animal->insurance_status,
            'insurance_date' => $animal->insurance_date,
            'insurance_expire_date' => $animal->insurance_expire_date,
            'is_claimed' => $animal->is_claimed,
            'user_id' => $animal->user_id,
            'created_at' => $animal->created_at,
            'updated_at' => $animal->updated_at,
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */


    public function index()
    {
        $animal_data = auth()->user()->cattleRegister->map(function ($animal) {
            return $this->transformAnimalData($animal);
        });

        return response()->json([
            'data' => $animal_data
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "test";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        $id = 0;

        if (CattleRegistration::orderBy('id', 'desc')->count() == 0) {
            $id = 1;
        } else if (!CattleRegistration::orderBy('id', 'desc')->count() == 0) {
            $id = CattleRegistration::orderBy('id', 'desc')->first()->id + 1;
        }

        $inputs = [];
        $inputs['animal_type'] = $request->input('animal_type');
        $inputs['cattle_name'] = $request->input('cattle_name');
        $inputs['cattle_breed'] = $request->input('cattle_breed');
        $inputs['age'] = $request->input('age');
        $inputs['cattle_color'] = $request->input('cattle_color');
        $inputs['weight'] = $request->input('weight');
        $inputs['farm'] = $request->input('farm');
        $inputs['sum_insured'] = $request->input('sum_insured');
        $inputs['muzzle_of_cow'] = $request->input('muzzle_of_cow');
        $inputs['left_side'] = $request->input('left_side');
        $inputs['right_side'] = $request->input('right_side');
        $inputs['special_marks'] = $request->input('special_marks');
        $inputs['cow_with_owner'] = $request->input('cow_with_owner');

        $inputs['unique_id'] = $id;

        $animalType = $inputs['animal_type'];

        if (!in_array($animalType, ['cattle', 'buffalo', 'goat'])) {
            // Return early or display an error message
            return response()->json([
                'message' => 'Invalid animal type'
            ], 400);
        }

        //        ----------------------------- If animal type is cattle then muzzle will be inserted, else it will store "Not Applicable for goat registration" -----------------------------

        if ($animalType === 'goat') {
            $inputs['muzzle_of_cow'] = "Not Applicable for goat registration";
        } else {
            if (request('muzzle_of_cow')) {
                $inputs['muzzle_of_cow'] = \request('muzzle_of_cow')->store('images');
//                return $inputs['muzzle_of_cow'];

//                -------------------------- the cattle_r_id , currently on test mode --------------------------

                $cattle_r_id = pathinfo($inputs['muzzle_of_cow'], PATHINFO_FILENAME);
                $inputs['unique_id'] = $cattle_r_id;

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

        if ($animalType === 'goat') {
            auth()->user()->cattleRegister()->create($inputs);
            session()->flash("register_goat", "Goat Registered Successfully");

            return response()->json([
                'message' => $animalType . ' registered successfully',
                'queue_process' => 'disabled'
            ], 200);
        }

//        ----------------------------- Detecting if animal type is goat -----------------------------


        //        ------------------------------- API DATA [ With JOB Batching ] - Cattle Registration ---------------------------------

        $basename = $inputs['muzzle_of_cow'];

        $this->dispatch(new CattleRegistrationProcess($inputs, $basename, auth()->user(), $id));
        return response()->json([
            'message' => $animalType . ' registration process running, if the process is successfully it will appear in the animal list',
            'queue_process' => 'enabled'
        ], 200);

//        ------------------------------- API DATA [ With JOB Batching ] - Cattle Registration ---------------------------------

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $user = auth()->user();

        $cattle_data = $user->cattleRegister->where('id', $id)->first();

        if ($cattle_data) {
            // Transform the cattle data and return it
            $transformedData = $this->transformAnimalData($cattle_data);
            return response()->json([
                'data' => $transformedData
            ]);
        } else {
            // Cattle data not found for the specified ID
            return response()->json([
                'message' => 'No cattle data found'
            ], 404); // 404 Not Found
        }
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
