<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BladeTestController extends Controller
{

    public function list(Request $request)
    {
        return view('user.list');
    }

    public function show(int $userId)
    {
        return view('user.show', [
            'userId' => $userId
        ]);
    }
}
