<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('property_data', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('price');
            $table->unsignedInteger('bedrooms');
            $table->unsignedInteger('bathrooms');
            $table->unsignedInteger('storeys');
            $table->unsignedInteger('garages');
            $table->timestamps();

            $table->index([
                'bedrooms',
                'bathrooms',
                'storeys',
                'garages',
                'price'
            ], 'exact_fields_price_index');

            $table->index('price'); //for price ranges
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_data');
    }
};
