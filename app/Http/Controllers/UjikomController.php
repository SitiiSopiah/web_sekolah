<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UjikomController extends Controller
{
    public function public()
    {
        return view('public.ujikom');
    }
}
