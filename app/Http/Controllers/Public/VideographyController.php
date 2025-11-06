<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class VideographyController extends Controller
{
    public function weddings()
    {
        return view('public.videography.weddings');
    }
    public function parties()
    {
        return view('public.videography.parties');
    }
    public function school()
    {
        return view('public.videography.school');
    }
    public function corporate()
    {
        return view('public.videography.corporate');
    }
    public function family()
    {
        return view('public.videography.family');
    }
    public function product()
    {
        return view('public.videography.product');
    }
    public function outdoor()
    {
        return view('public.videography.outdoor');
    }
    public function social()
    {
        return view('public.videography.social');
    }
    public function tiktok()
    {
        return view('public.videography.tiktok');
    }
    public function live()
    {
        return view('public.videography.live');
    }
}
