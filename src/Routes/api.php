<?php

use Illuminate\Support\Facades\Route;
use UnitSAD\TriggerSpatie\Services\SpatieService;

Route::middleware(['api', 'sso.validate-token'])->prefix('api/unit-sad')->as('api.unit-sad.')->group(function () {
	Route::post('/reset-cache', fn() => SpatieService::resetCache())->name('reset-cache');
});