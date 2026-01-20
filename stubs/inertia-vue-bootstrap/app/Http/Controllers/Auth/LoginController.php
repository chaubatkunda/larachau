<?php

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function create()
    {
        return inertia('Auth/Login');
    }
}