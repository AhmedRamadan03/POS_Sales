<?php

use App\Http\Controllers\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
	Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('index',[DashboardController::class,'index'])->name('index');
    });// end route of dashborad
});

    