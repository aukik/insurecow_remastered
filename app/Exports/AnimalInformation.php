<?php

namespace App\Exports;

use App\Models\CattleRegistration;
use App\Models\Farm_management\Animal_information;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AnimalInformation implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $animalInfoCollection = auth()->user()->animal_health;

        $modifiedCollection = $animalInfoCollection->map(function ($animal) {
            $animal->medical_history = asset('storage/' . $animal->medical_history);
            $animal->is_pregnant = $animal->is_pregnant == 1 ? "Pregnant" : "Not Pregnant";
            $animal->cattle_id = CattleRegistration::find($animal->cattle_id)->cattle_name;
            $animal->user_id = User::find($animal->user_id)->name;
            return $animal;
        });

        return $modifiedCollection;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Health Status',
            'Medical History',
            'Last Vaccination Date',
            'Pregnancy Status',
            'Cattle Name',
            'Farmer Information',
            'Data Creation date',
            'Data Update Date'
        ];
    }
}
