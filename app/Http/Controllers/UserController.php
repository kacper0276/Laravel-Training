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

        $name = $request->input('name'); // Get queryparam ?name=tom

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
