<?php

use App\Http\Controllers\Api\GameController;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\ShowAddress;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', [HelloController::class, 'hello']);

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

Route::get('users-parameter-regex/{nick}', function (string $nick) {
    dd($nick);
})->where(['nick' => '[a-z0-9]+']);

Route::get('items', function () {
    return 'Items';
})->name('shop.items');

Route::get('items/{id}', function (int $id) {
    return 'Items' . $id;
})->name('shop.item.single');

Route::get('example', function () {
    // $url = route('shop.items');

    $url = route('shop.item.single', ['id' => 4444]); // Add into place id param value 4444
    // If third param in route is true we get full url (if false only uri)
    dump($url);
});

//! Controllers section
Route::get('controller/users', [UserController::class, 'list'])
    ->name('controller.get.users');

Route::get('controller/users/{id}', [ProfileController::class, 'show'])
    ->name('get.user.profile');

// SINGLE ACTION CONTROLLER
Route::get('controller/users/{id}/address', ShowAddress::class)
    ->where(['id' => '[0-9]+'])
    ->name('get.users.address');

// Route::resource('games', 'GameController');
Route::resource('games', GameController::class)
    ->only(['index', 'show']);

Route::resource('games/another', GameController::class)
    ->only(['index', 'show', 'create']);
