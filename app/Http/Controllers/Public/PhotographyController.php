<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PhotographyController extends Controller
{
    public function portrait()
    {
        return view('public.photography.portrait');
    }
    public function family()
    {
        return view('public.photography.family');
    }
    public function studio()
    {
        return view('public.photography.studio');
    }
    public function weddings()
    {
        return view('public.photography.weddings');
    }
    public function parties()
    {
        return view('public.photography.parties');
    }
    public function graduation()
    {
        return view('public.photography.graduation');
    }
    public function corporate()
    {
        return view('public.photography.corporate');
    }
    public function school()
    {
        return view('public.photography.school');
    }
    public function product()
    {
        return view('public.photography.product');
    }
    public function outdoor()
    {
        return view('public.photography.outdoor');
    }
    public function social()
    {
        return view('public.photography.social');
    }
}
