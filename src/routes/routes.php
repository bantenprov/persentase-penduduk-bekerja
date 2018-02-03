<?php

Route::group(['prefix' => 'pp-bekerja', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\PPBekerja\Http\Controllers\PPBekerjaController@index',
        'create'     => 'Bantenprov\PPBekerja\Http\Controllers\PPBekerjaController@create',
        'store'     => 'Bantenprov\PPBekerja\Http\Controllers\PPBekerjaController@store',
        'show'      => 'Bantenprov\PPBekerja\Http\Controllers\PPBekerjaController@show',
        'update'    => 'Bantenprov\PPBekerja\Http\Controllers\PPBekerjaController@update',
        'destroy'   => 'Bantenprov\PPBekerja\Http\Controllers\PPBekerjaController@destroy',
    ];

    Route::get('/',$controllers->index)->name('pp-bekerja.index');
    Route::get('/create',$controllers->create)->name('pp-bekerja.create');
    Route::post('/store',$controllers->store)->name('pp-bekerja.store');
    Route::get('/{id}',$controllers->show)->name('pp-bekerja.show');
    Route::put('/{id}/update',$controllers->update)->name('pp-bekerja.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('pp-bekerja.destroy');

});

