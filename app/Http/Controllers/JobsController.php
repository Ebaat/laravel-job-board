<?php

namespace App\Http\Controllers;

use App\Models\job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    function index()
    {
        $jobs = job::all();
        return view('job/index', ['jobs' => $jobs]);
    }
}
