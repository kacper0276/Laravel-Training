<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list(Request $request)
    {
        return view('user.list');
    }

    public function testShow(Request $request, int $id)
    {
        // Url adres
        $uri = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl(); // Include also query params

        // Http method
        $httpMethod = $request->method();

        if ($request->isMethod('post')) {
            dump('Post method');
        }

        // Get query params and data from body
        $all = $request->all();
        dd($all);

        $name = $request->input('name', 'default value'); // Get queryparam ?name=tom

        // pass array in query params; ?games[]=quake&games[]=turok
        $game = $request->input('games.1', 'default value'); // Get games[1] from query params
        $game = $request->input('games.1.name', 'default value'); // pass array in query params; ?games[]=quake&games[][name]=turok

        $allQuery = $request->query(); // Get all query params

        $name = $request->query('name', 'default'); // Get ?name=Tom

        $expired = $request->boolean('expired'); // Get query param ?expired=true as boolean not string
        dd($expired);

        $hasName = $request->has('name'); // Return True if name was in query params

        dd($request);
        dd($id);
    }

    public function testStore(Request $request, int $id)
    {
        if (!$request->isMethod('post')) {
            return 'Not allowed method';
        }

        $all = $request->all();
        dd($all);
    }
}
