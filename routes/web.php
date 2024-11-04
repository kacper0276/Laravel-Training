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

$uri = '/example-arrow';
Route::get($uri, fn() => 'arrow function GET');
Route::post($uri, fn() => 'arrow function POST');
Route::put($uri, fn() => 'arrow function PUT');
Route::patch($uri, fn() => 'arrow function PATCH');
Route::delete($uri, fn() => 'arrow function DELETE');
Route::options($uri, fn() => 'arrow function OPTIONS');

Route::match(['get', 'post'], '/match', function() {
    return 'Same logic for http get and post';
});

Route::all('/all', fn() => 'All methods');
