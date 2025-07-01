<?php
use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;

Route::controller(NoticeController::class)->prefix('notice')->group(function(){
    Route::get('/', 'index');
    Route::get('/add', 'create');
    Route::post('/add', 'store')->name('notice.create');
    Route::post('/update', 'update')->name('notice.update');
    Route::post('/destroy', 'destroy')->name('notice.delete');
});
