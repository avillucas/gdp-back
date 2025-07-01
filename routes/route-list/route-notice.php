<?php
use App\Http\Controllers\NoticeController;
use Illuminate\Support\Facades\Route;

Route::controller(NoticeController::class)->prefix('notice')->group(function(){
    Route::get('/', 'index')->name('notice.index');
    Route::get('/add', 'create')->name('notice.create');
    Route::post('/add', 'store')->name('notice.store');
    Route::get('/edit/{notice}', 'edit')->name('notice.edit');
    Route::post('/update', 'update')->name('notice.update');
    Route::post('/destroy/{notice}', 'destroy')->name('notice.destroy');
});
