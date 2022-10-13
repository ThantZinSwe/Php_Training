<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    /**
     * @return View index
     */
    public function index()
    {
        return view('index');
    }
}
