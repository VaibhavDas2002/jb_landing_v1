<?php
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    BeneficiarySearchController,
    DashboardController,
    HomeController,
    MapController
};

Route::get('welcome', function () {
    return view('welcome');
});


Route::get('/about', function () {
    return view('about');
});



Route::get('portlet', [MapController::class, 'index'])->name('portlet');
Route::post('/map-district-count', [MapController::class, 'wbDistrictCount'])->name('map.district.count');

Route::get('/', [HomeController::class, 'index'])->name('/');
Route::get('scheme_info', [HomeController::class, 'scheme_index'])->name('scheme_info');
Route::get('department', [HomeController::class, 'department_index'])->name('department');

Route::get('track-applicant', [BeneficiarySearchController::class, 'index'])->name('track-applicant');
Route::get('/search', [BeneficiarySearchController::class, 'search']);

Route::get('notifications', [NotificationController::class, 'index'])->name('notifications');
Route::post('/notifications/datatable', [NotificationController::class, 'datatable'])->name('notifications.datatable');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('ben-details/{id}', [BeneficiarySearchController::class, 'ben_details'])->name('ben-details');

Route::get('jbDownload', [BeneficiarySearchController::class, 'viewEncloser'])->name('jbDownload');