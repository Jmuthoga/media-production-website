<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
    public function photography()
    {
        return view('public.academy.photography');
    }
    public function certifications()
    {
        return view('public.academy.certifications');
    }
    public function custom()
    {
        return view('public.academy.custom');
    }
}
