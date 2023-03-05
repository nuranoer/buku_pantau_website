<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function index()
    {
        return view('template/app');
    }

    public function dashboard()
    {
        return view('template/dashboard');
    }
}