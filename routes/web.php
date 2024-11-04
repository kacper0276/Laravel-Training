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

Route::match(['get', 'post'], '/match', function () {
    return 'Same logic for http get and post';
});

Route::any('/all', fn() => 'All methods');

// Route view - routing widoków
Route::view('/view/route', 'route.view');
Route::view('/view/route/var1', 'route.viewParam', ['param1' => 'var1 - example data', 'name' => 'Tom']);

Route::get('posts/{postId}/{title}', function (int $postId, string $title) {
    dd($postId);
    dd($title);
});

Route::get('users/{nick?}', function (string $nick = null) { // \? - parameter is optional, define default value
    dd($nick);
});

Route::get('users-default-value/{nick?}', function (string $nick = 'Robert') {
    dd($nick);
});
