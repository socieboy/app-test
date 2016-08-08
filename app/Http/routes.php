<?php

/**
 * Routes protected with the middleware web.
 */
Route::group(['middleware' => ['web']], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    Route::get('/home', 'HomeController@index');

});


// Routes without protection of the middleware,
// Since the request comes from the camera of the smartphone.

Route::group(['middleware' => ['auth.basic']], function(){

    /**
     * Initialize streaming.
     */
    Route::post('/api/device', 'DeviceController@store');

    /**
     * Stop streaming.
     */
    Route::delete('/api/device', 'DeviceController@destroy');


    // Opcionalmente tendremos otra ruta para mantener actualizado el GPS
    Route::post('/api/device/gps', 'DeviceGPSController@update');

});
