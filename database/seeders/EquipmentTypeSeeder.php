<?php

namespace Database\Seeders;

use App\Models\Equipment;
use App\Models\EquipmentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Type;

class EquipmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = EquipmentType::create([
            'type' => 'Mixer',
        ]);

        $type = EquipmentType::create([
            'type' => 'Audio speaker',
        ]);

        $type = EquipmentType::create([
            'type' => 'Microphone',
        ]);

        $type = EquipmentType::create([
            'type' => 'Audio cable',
        ]);

        $type = EquipmentType::create([
            'type' => 'DMX controller',
        ]);

        $type = EquipmentType::create([
            'type' => 'DMX fixtures',
        ]);

        $type = EquipmentType::create([
            'type' => 'DMX cable',
        ]);
    }
}
