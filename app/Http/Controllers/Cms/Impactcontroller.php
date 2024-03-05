<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Impact;
use Illuminate\Http\Request;

class Impactcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impacts =Impact::all();
        return view("super-admin.admin-content.cms.impact.view", compact('impacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.admin-content.cms.impact.create");
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

        Impact::create($inputs);
        session()->flash("success", "impact added successfully");
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
        $impact = Impact::find($id);
        return view("super-admin.admin-content.cms.impact.edit", compact('impact'));
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
        $impact = Impact::find($id);

        $inputs = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',

        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('photos');
        } else {
            $inputs['image'] = $impact->image;
        }

        $impact->update($inputs);
        session()->flash("success", "Impact Updated Successfully");
        return redirect()->route('impact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $impact = Impact::find($id);

        $impact->delete();

        return back();
    }
}
