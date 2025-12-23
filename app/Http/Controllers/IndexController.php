<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        return view('index');
    }
    function about()
    {
        return view('about', ['title' => 'About Us']);
    }

    function contact()
    {
        return view('contact', ['title' => 'Contact Us']);
    }
}
