<?php

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return inertia('Home');
    }
}