<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

// routes/api.php

Route::get('map/wb/district-count', [MapController::class, 'wbDistrictCount']);