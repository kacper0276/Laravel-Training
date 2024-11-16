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

    // REQUEST
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
        $hasParams = $request->has(['name', 'nick']); // True only when all params was pass
        $hasAnyParams = $request->hasAny(['name', 'nick']); // True if min one of these params was pass

        $cookies = $request->cookie();

        dd($request);
        dd($id);
    }

    // REQUEST
    public function testStore(Request $request, int $id)
    {
        if (!$request->isMethod('post')) {
            return 'Not allowed method';
        }

        $all = $request->all();
        dd($all);
    }

    // RESPONSE
    public function responseTest()
    {
        dd('show');

        // Text
        // return 'This is normal text convert by framework on http Response';

        // Response object
        // return response(
        //     "<h3> This is response object </h3>", // Content
        //     200, // http status
        //     ['Content-Type' => 'text-plain'] // array with headers
        // );

        // Chain
        // return response('<h3>This is response object </h3>')
        //     ->setStatusCode(200)
        //     ->header('Content-Type', 'text/html')
        //     ->header('Own-Header', 'Laravel');

        // With cookie
        // return response("<h3> This is response object </h3>", 200)
        //     ->header('Content-Type', 'text/html')
        //     ->cookie('my_cookie', 'brownie', 10); // Time in minutes

        // Redirect
        // return redirect('users');

        // Redirect by route name
        // return redirect()->route('controller.get.users');
        // return redirect()->route('get.users.address', ['id' => 10]);

        // Redirect to controller
        // return redirect()->action([HelloController::class, 'hello']);
        // return redirect()->action([HelloController::class, 'hello'], ['id' => 1]);

        // Redirect to other site
        return redirect()->away('https://google.com');
    }
}
