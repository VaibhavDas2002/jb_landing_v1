<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

// routes/api.php

Route::post('map-district-count', [MapController::class, 'wbDistrictCount']);