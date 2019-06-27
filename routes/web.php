<?php


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'account', 'middleware' => ['auth'], 'namespace' => 'Account', 'as' => 'account.'], function () {
    Route::get('/', 'AccountController@index')->name('index');
    
    Route::group(['prefix' => '/files'], function () {
        Route::get('/', 'FileController@index')->name('files.index');
        Route::get('/{file}/edit', 'FileController@edit')->name('files.edit');
        Route::patch('/{file}', 'FileController@update')->name('files.update');
        Route::post('/{file}', 'FileController@store')->name('files.store');
        Route::get('/create', 'FileController@create')->name('files.create.start');
        Route::get('/{file}/create', 'FileController@create')->name('files.create');
    });
});
