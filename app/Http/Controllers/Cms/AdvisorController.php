<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Advisor;
use App\Models\Cms\Team;
use Illuminate\Http\Request;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advisors=Advisor::all();
        return view("super-admin.admin-content.cms.advisor.view", compact('advisors'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.admin-content.cms.advisor.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = request()->validate([
            'title' => 'required',
            'description'=>'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',

        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('cms');
        }

        Advisor::create($inputs);
        session()->flash("success", "Advisor added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advisor = Advisor::find($id);
        return view("super-admin.admin-content.cms.advisor.edit", compact('advisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advisor = Advisor::find($id);

        $inputs = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',

        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('photos');
        } else {
            $inputs['image'] = $advisor->image;
        }

        $advisor->update($inputs);
        session()->flash("success", "Advisor Updated Successfully");
        return redirect()->route('advisor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advisor = Advisor::find($id);

        $advisor->delete();

        return back();
    }
}
