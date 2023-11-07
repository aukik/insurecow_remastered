<?php

namespace App\Exports\Farmer;

use App\Models\CattleRegistration;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BreedingInformation implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $animalInfoCollection = auth()->user()->reproduction_and_breeding;

        $modifiedCollection = $animalInfoCollection->map(function ($animal) {
            $animal->fertility_history = asset('storage/' . $animal->fertility_history);
//            $animal->cattle_id = CattleRegistration::find($animal->cattle_id)->cattle_name;
//            $animal->user_id = User::find($animal->user_id)->name;

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
            'Breeding Date',
            'Fertility History',
            'Cattle Name',
            'Farmer Name',
            'Data Creation date',
            'Data Update Date'
        ];
    }
}
