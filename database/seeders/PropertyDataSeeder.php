<?php

namespace Database\Seeders;

use App\Models\PropertyData;
use App\Services\PropertyData\CsvImporter;
use Illuminate\Database\Seeder;

class PropertyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = base_path('database/seeders/data/property-data.csv');

        if (!file_exists($csvFile)) {
            $this->command->error('CSV file not found!');
            return;
        }

        (new CsvImporter())->import($csvFile);
    }
}
