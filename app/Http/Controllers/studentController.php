<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('student.index');
    }
}
