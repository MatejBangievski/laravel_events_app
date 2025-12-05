<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\EventController;
Route::resource('organizers', OrganizerController::class);
Route::resource('events', EventController::class);

Route::get('/', function () {
    return redirect()->route('organizers.index');
});
