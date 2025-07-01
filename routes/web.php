<?php

use Illuminate\Support\Facades\Route;

require(base_path('routes/route-list/route-auth.php'));
require(base_path('routes/route-list/route-notice.php'));

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
