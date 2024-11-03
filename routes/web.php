<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', 'HelloController@hello');

Route::get('/goodbye/{name}', function (string $name) {
    return "Goodbye: " . $name;
});

Route::get('/example', function () {
    return 'GET method';
});
