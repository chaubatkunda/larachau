<?php

class HomeController
{
    public function __invoke()
    {
        return inertia('Home');
    }
}