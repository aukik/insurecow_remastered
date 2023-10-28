<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $permission = User::findOrFail($id)->permission;
        $specific_user =  User::findOrFail($id);


        if ($permission == null) {
            return "Invalid Action";
        }

        return view("super-admin.admin-content.permission.permission", compact('permission','specific_user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
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
        session()->flash("permission","Permission updated");
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
