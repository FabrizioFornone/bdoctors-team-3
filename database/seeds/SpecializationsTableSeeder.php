<?php

use App\Specialization;

use Illuminate\Database\Seeder;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Specializations = [
            ["name" => "Allergy and immunology", "description" => ""],
            ["name" => "Anesthesiology", "description" => ""],
            ["name" => "Dermatology", "description" => ""],
            ["name" => "Diagnostic radiology", "description" => ""],
            ["name" => "Emergency medicine", "description" => ""],
            ["name" => "Family medicine", "description" => ""],
            ["name" => "Internal medicine", "description" => ""],
            ["name" => "Medical genetics", "description" => ""],
            ["name" => "Neurology", "description" => ""],
            ["name" => "Nuclear medicine", "description" => ""],
            ["name" => "Obstetrics and gynecology", "description" => ""],
            ["name" => "Ophthalmology", "description" => ""],
            ["name" => "Pathology", "description" => ""],
            ["name" => "Pediatrics", "description" => ""],
            ["name" => "Physical medicine and rehabilitation", "description" => ""],
            ["name" => "Preventive medicine", "description" => ""],
            ["name" => "Psychiatry", "description" => ""],
            ["name" => "Radiation oncology", "description" => ""],
            ["name" => "Surgery", "description" => ""],
            ["name" => "Urology", "description" => ""],
        ];
        foreach ($Specializations as $Specialization) {
            $newSpec = new Specialization();
            $newSpec->name = $Specialization["name"];
            $newSpec->description = $Specialization["description"];
            $newSpec->save();
        }
    }
}
