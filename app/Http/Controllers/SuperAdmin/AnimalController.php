<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\CattleRegistration;

class AnimalController extends Controller
{
    public function index(){
        $cattle_list = CattleRegistration::all();
        return view("super-admin.admin-content.farmer.cattle_register.view_cattles", compact('cattle_list'));
    }
}
