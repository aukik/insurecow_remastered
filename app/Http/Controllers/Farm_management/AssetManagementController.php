<?php

namespace App\Http\Controllers\Farm_management;

use App\Http\Controllers\Controller;
use App\Models\Farm_management\AssetManagement;
use Illuminate\Http\Request;

class AssetManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $animal_data = auth()->user()->asset_management;
        return view("farm-management.admin-content.financial.asset-management.index", compact('animal_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view("farm-management.admin-content.financial.asset-management.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'expense_date' => 'required',
            'description' => 'required',
            'amount' => 'required',
        ]);

        auth()->user()->asset_management()->create($inputs);
        session()->flash("success", "Asset data added successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Farm_management\AssetManagement $assetManagement
     * @return \Illuminate\Http\Response
     */
    public function show(AssetManagement $assetManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Farm_management\AssetManagement $assetManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(AssetManagement $assetManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farm_management\AssetManagement $assetManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssetManagement $assetManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Farm_management\AssetManagement $assetManagement
     * @return string
     */
    public function destroy(AssetManagement $assetManagement)
    {
        if ($assetManagement->user_id != auth()->user()->id) {
            return "Invalid request";
        }

        $assetManagement->delete();
        session()->flash("success", "Asset management data deleted successfully");
        return back();
    }
}
