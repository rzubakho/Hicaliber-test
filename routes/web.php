<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyDataController;

Route::get('property-data', [PropertyDataController::class, 'index']);
