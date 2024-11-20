<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Http\Request;

class BladeTestController extends Controller
{

    public function list(Request $request)
    {
        return view('user.list');
    }

    public function show(int $userId)
    {
        $faker = Factory::create();
        $user = [
            'id' => $userId,
            'name' => $faker->name,
            'firstName' => $faker->firstName,
            'lastName' => $faker->lastName,
            'city' => $faker->city,
            'age' => $faker->numberBetween(12, 40),
            'html' => '<b>Bold HTML </b>'
        ];

        return view('user.show', [
            'userId' => $userId,
            'user' => $user
        ]);
    }
}
