<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PortraitPhotography;
use App\Models\FamilyPhotography;
use App\Models\StudioSessionHire;
use App\Models\WeddingsEngagements;

class PhotographyController extends Controller
{
    public function portrait()
    {
        $portrait = PortraitPhotography::first();
        $gallery = collect($portrait->gallery ?? []);
        return view('public.photography.portrait', compact('portrait', 'gallery'));
    }

    public function family()
    {
        $family = FamilyPhotography::first();
        $gallery = collect($family->gallery ?? []);
        return view('public.photography.family', compact('family', 'gallery'));
    }

    public function studio()
    {
        $studio = StudioSessionHire::first();
        $gallery = collect($studio->gallery ?? []);
        return view('public.photography.studio', compact('studio', 'gallery'));
    }

    public function weddings()
    {
        $wedding = WeddingsEngagements::first();
        $gallery = collect($wedding->gallery ?? []);
        return view('public.photography.weddings', compact('wedding', 'gallery'));
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
