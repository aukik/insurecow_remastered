<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return string
     */
    public function show($id)
    {
//        $permission = User::findOrFail($id)->permission;
//        $specific_user = User::findOrFail($id);

        $specific_user = User::findOrFail($id);
        $permission = $specific_user->permission;

        if ($specific_user && $permission) {
            // Check if the user belongs to the same company
            if ($specific_user->company_id != auth()->user()->id) {
                return "Invalid operation: User does not belong to the company.";
            }

        } else {
            return "Invalid operation: User or permission not found.";
        }

//        if ($permission == null) {
//            return "Invalid Action";
//        }

        return view("company.admin-content.permission.permission", compact('permission', 'specific_user'));
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
     * @return string
     */
    public function update(Request $request, $id)
    {

//        $permission = Permission::findOrFail($id);
//        $user = User::find($permission->user_id);
//        return $user->company_id;
//        return auth()->user()->id;


        $permission = Permission::findOrFail($id);

        if ($permission && $permission->user_id) {
            $user = User::find($permission->user_id);

            if ($user) {
                // Check if the user belongs to the same company
                if ($user->company_id != auth()->user()->id) {
                    return "Invalid operation: User does not belong to the company.";
                }
            } else {
                return "Invalid operation: User not found.";
            }
        } else {
            return "Invalid operation: Permission not found.";
        }

        $inputs = \request()->validate([
            'f_cattle_reg' => 'nullable',
            'f_insurance' => 'nullable',
            'f_farm_management' => 'nullable',
            'c_dashboard' => 'nullable',
            'c_register_agent' => 'nullable',
            'c_insurance' => 'nullable',
            'c_cattle_reg_and_claim' => 'nullable',
            'cattle' => 'nullable',
            'buffalo' => 'nullable',
            'goat' => 'nullable',
        ]);


        foreach ($inputs as $key => $value) {
            if ($value != 0 && $value != 1) {
                return "Bad request";
            }
        }

        $permission->update($inputs);
        session()->flash("permission", "Permission updated");
        return back();
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
