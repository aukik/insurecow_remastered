<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investments =Investment::all();
        return view("super-admin.admin-content.cms.investment.view", compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.admin-content.cms.investment.create");
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

        Investment::create($inputs);
        session()->flash("success", "Investment added successfully");
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
        $investment = Investment::find($id);
        return view("super-admin.admin-content.cms.investment.edit", compact('investment'));
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
        $investment = Investment::find($id);

        $inputs = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',

        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('photos');
        } else {
            $inputs['image'] = $investment->image;
        }

        $investment->update($inputs);
        session()->flash("success", "investment Updated Successfully");
        return redirect()->route('investment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $investment =Investment::find($id);

        $investment->delete();

        return back();
    }
}
