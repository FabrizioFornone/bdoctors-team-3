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
            ["specialization_name" => "Allergy and immunology", "description" => ""],
            ["specialization_name" => "Anesthesiology", "description" => ""],
            ["specialization_name" => "Dermatology", "description" => ""],
            ["specialization_name" => "Diagnostic radiology", "description" => ""],
            ["specialization_name" => "Emergency medicine", "description" => ""],
            ["specialization_name" => "Family medicine", "description" => ""],
            ["specialization_name" => "Internal medicine", "description" => ""],
            ["specialization_name" => "Medical genetics", "description" => ""],
            ["specialization_name" => "Neurology", "description" => ""],
            ["specialization_name" => "Nuclear medicine", "description" => ""],
            ["specialization_name" => "Obstetrics and gynecology", "description" => ""],
            ["specialization_name" => "Ophthalmology", "description" => ""],
            ["specialization_name" => "Pathology", "description" => ""],
            ["specialization_name" => "Pediatrics", "description" => ""],
            ["specialization_name" => "Physical medicine and rehabilitation", "description" => ""],
            ["specialization_name" => "Preventive medicine", "description" => ""],
            ["specialization_name" => "Psychiatry", "description" => ""],
            ["specialization_name" => "Radiation oncology", "description" => ""],
            ["specialization_name" => "Surgery", "description" => ""],
            ["specialization_name" => "Urology", "description" => ""],
        ];
        foreach ($Specializations as $Specialization) {
            $newSpec = new Specialization();
            $newSpec->specialization_name = $Specialization["specialization_name"];
            $newSpec->description = $Specialization["description"];
            $newSpec->save();
        }
    }
}
