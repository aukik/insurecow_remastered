<?php

namespace App\Http\Controllers\Farm_management\Export;

use App\Exports\Farmer\AnimalInformation;
use App\Exports\Farmer\BreedingInformation;
use App\Exports\Farmer\FeedingAndNutrition;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function animal_health_information()
    {
        return Excel::download(new AnimalInformation, 'animal_health_information.xlsx');
    }

    public function feed_consumption_records()
    {
        return Excel::download(new FeedingAndNutrition, 'feeding_and_nutrition_data.xlsx');
    }

    public function reproduction_and_breeding()
    {
        return Excel::download(new BreedingInformation, 'breeding_information.xlsx');
    }
}
