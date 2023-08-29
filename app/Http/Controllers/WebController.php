<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class WebController extends Controller
{
    private function getPageComponent($page)
    {
        switch ($page) {
            case 'value':
                break;
            default:
                return 'Home';
        }
    }
    public function index(Request $request, $page = 'Home'): Response
    {
        $user = (object) ['name' => 'John'];

        return Inertia::render($this->getPageComponent($page), [
            'user' => $user
        ]);
    }
}
