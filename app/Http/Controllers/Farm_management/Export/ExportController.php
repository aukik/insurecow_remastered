<?php

namespace App\Http\Controllers\Farm_management\Export;

use App\Exports\AnimalInformation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function animal_health_information()
    {
        return Excel::download(new AnimalInformation, 'animal_health_information.xlsx');
    }
}
