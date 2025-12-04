<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PortraitPhotography;
use App\Models\FamilyPhotography;
use App\Models\StudioSessionHire;

class PhotographyController extends Controller
{
    public function portrait()
    {
        $portrait = PortraitPhotography::first();

        // Use backend gallery if exists, else empty array
        $gallery = $portrait && !empty($portrait->gallery) ? $portrait->gallery : [];

        return view('public.photography.portrait', compact('portrait', 'gallery'));
    }

    public function family()
    {
        $family = FamilyPhotography::first();

        // Use backend gallery if exists, else empty array
        $gallery = $family && !empty($family->gallery) ? $family->gallery : [];

        return view('public.photography.family', compact('family', 'gallery'));
    }

    public function studio()
    {
        $studio = StudioSessionHire::first();

        // Use backend gallery if exists, else empty array
        $gallery = $studio && !empty($studio->gallery) ? $studio->gallery : [];

        return view('public.photography.studio', compact('studio', 'gallery'));
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
