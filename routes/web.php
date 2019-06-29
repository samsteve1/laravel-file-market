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

/**
 * Amin Routes
 */

 Route::group(['prefix' => '/admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
     Route::get('/', 'AdminController@index')->name('index');
    /**
     * File management
     */
     Route::group(['prefix' => '/files', 'as' => 'files.'], function () {
         Route::group(['prefix' => '/new', 'as' => 'new.'], function () {
             /**
              * New Files
              */
            Route::get('/', 'AdminNewFileController@index')->name('index');
            Route::patch('/{file}', 'AdminNewFileController@update')->name('update');
            Route::delete('/{file}', 'AdminNewFileController@destroy')->name('destroy');
         });
         /**
          * Updated Files
          */
         Route::group(['prefix' => '/updated', 'as' => 'updated.'], function () {
             Route::get('/', 'AdminUpdatedFileController@index')->name('index');
             Route::patch('/{file}', 'AdminUpdatedFileController@update')->name('update');
             Route::delete('/{file}', 'AdminUpdatedFileController@destroy')->name('destroy');
         });
     });
 });
 
Route::post('/{file}/upload', 'Upload\UploadController@store')->name('upload.store');
Route::delete('/{file}/upload/{upload}', 'Upload\UploadController@destroy')->name('upload.destroy');