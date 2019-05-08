<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/torontoNews'                   , 'torontoNewsController@list');
Route::get('/torontoNews/viewArticle/{id}'  , 'torontoNewsController@viewArticle')->where('id', '[0-9]+');
Route::get('/torontoNews/json'              , 'torontoNewsController@listJson');

Route::get('weather/all'            , 'weatherController@list');
Route::get('weather/city/{city}'    , 'weatherController@listCity');


Route::get('/apiWeather'      , 'apiRestController@GetWeather');
Route::get('/apiNewsToronto'  , 'apiRestController@GetnewsToronto');
Route::get('/GetUSADolar'     , 'apiRestController@GetUSADolar');


