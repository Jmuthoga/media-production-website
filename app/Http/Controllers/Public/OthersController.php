<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class OthersController extends Controller
{
    public function printing()
    {
        return view('public.others.printing');
    }
    public function radio()
    {
        return view('public.others.radio');
    }
    public function commercials()
    {
        return view('public.others.commercials');
    }
    public function hirecrew()
    {
        return view('public.others.hirecrew');
    }
    public function eventplanning()
    {
        return view('public.others.eventplanning');
    }
    public function photoediting()
    {
        return view('public.others.photoediting');
    }
    public function equipment()
    {
        return view('public.others.equipment');
    }
    public function drone()
    {
        return view('public.others.drone');
    }
    public function custom()
    {
        return view('public.others.custom');
    }
}
