<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function index():Response 
    {
        $user = (object) ['name' => 'John'];

        return Inertia::render('Home', [
            'user' => $user
        ]);
    }
}
