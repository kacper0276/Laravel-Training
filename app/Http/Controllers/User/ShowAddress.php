<?php

declare(strict_types=1);

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class ShowAddress extends Controller
{
    public function __invoke(int $id)
    {
        dd('test');
    }
}

// Invoke start when:
// $obj = new ShowAddress();

// $obj(); <- Here
