<?php

namespace Database\Seeders;

use App\Models\PropertyData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PropertyData::factory()->count(300)->create();
    }
}
