<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms\Achievement;

class AchievementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achievements= Achievement::all();
        return view("super-admin.admin-content.cms.achievement.view", compact('achievements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("super-admin.admin-content.cms.achievement.create");
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
            'description' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',

        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('cms');
        }

        Achievement::create($inputs);
        session()->flash("success", "Achievement added successfully");
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

        $achievement = Achievement::find($id);
        return view("super-admin.admin-content.cms.achievement.edit", compact('achievement'));

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
        $achievement = Achievement::find($id);

        $inputs = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif',

        ]);

        if (request('image')) {
            $inputs['image'] = request('image')->store('photos');
        } else {
            $inputs['image'] = $achievement->image;
        }

        $achievement->update($inputs);
        session()->flash("success", "Achievement Updated Successfully");
        return redirect()->route('achievement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Achievement::find($id);

        $about->delete();

        return back();
    }
}
