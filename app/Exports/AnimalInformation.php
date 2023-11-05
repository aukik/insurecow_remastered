<?php

namespace App\Exports;

use App\Models\Farm_management\Animal_information;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class AnimalInformation implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $animalInfoCollection = Animal_information::all();

        // Iterate through the collection and modify the "medical_history" column
        $modifiedCollection = $animalInfoCollection->map(function ($animal) {
            $animal->medical_history = asset('storage/' . $animal->medical_history);
            return $animal;
        });

        return $modifiedCollection;
    }
}
