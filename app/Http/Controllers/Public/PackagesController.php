<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class PackagesController extends Controller
{
    // Photography
    public function photographyLifestyle()
    {
        return view('public.packages.photography-lifestyle');
    }
    public function photographyWedding()
    {
        return view('public.packages.photography-wedding');
    }
    public function photographyFamily()
    {
        return view('public.packages.photography-family');
    }

    // Videography
    public function videographyEvent()
    {
        return view('public.packages.videography-event');
    }
    public function videographyCinematic()
    {
        return view('public.packages.videography-cinematic');
    }

    // Business & Premium
    public function businessCorporate()
    {
        return view('public.packages.business-corporate');
    }
    public function businessPremium()
    {
        return view('public.packages.business-premium');
    }

    // Custom
    public function custom()
    {
        return view('public.packages.custom');
    }
}
