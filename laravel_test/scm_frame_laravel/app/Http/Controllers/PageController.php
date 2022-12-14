<?php

namespace App\Http\Controllers;

class PageController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * @return View index
     */
    public function index()
    {
        return view('index');
    }
}
