<?php

namespace App\Exports\Farmer;

use App\Models\CattleRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\User;


class FeedingAndNutrition implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $animalInfoCollection = auth()->user()->feeding_and_nutrition;

        $modifiedCollection = $animalInfoCollection->map(function ($animal) {
            $animal->feed_consumption_records = asset('storage/' . $animal->feed_consumption_records);

            // Handle cattle not found
            if ($cattle = CattleRegistration::find($animal->cattle_id)) {
                $animal->cattle_id = $cattle->cattle_name;
            } else {
                // Assign a default value to cattle_id
                $animal->cattle_id = 'Unknown Cattle';
            }

            // Handle user not found
            if ($user = User::find($animal->user_id)) {
                $animal->user_id = $user->name;
            } else {
                // Assign a default value to user_id
                $animal->user_id = 'Unknown User';
            }


            return $animal;
        });

        return $modifiedCollection;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Schedule Data',
            'Feeding Schedule',
            'Nutrition Plans',
            'Feed Consumption Record',
            'Cattle Name',
            'Farmer Information',
            'Data Creation date',
            'Data Update Date'
        ];
    }
}
