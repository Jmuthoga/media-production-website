<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\PortraitPhotography;
use App\Models\FamilyPhotography;
use App\Models\StudioSessionHire;
use App\Models\WeddingsEngagements;
use App\Models\PartiesConcerts;
use App\Models\GraduationPhotography;
use App\Models\CorporateEventCoverage;
use App\Models\SchoolInstitutionPhotography;
use App\Models\ProductPhotography;
use App\Models\OutdoorNatureShoots;

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
        $party = PartiesConcerts::first();
        $gallery = collect($party->gallery ?? []);
        return view('public.photography.parties', compact('party', 'gallery'));
    }
    public function graduation()
    {
        $graduation = GraduationPhotography::first();
        $gallery = collect($graduation->gallery ?? []);
        return view('public.photography.graduation', compact('graduation', 'gallery'));
    }
    public function corporate()
    {
        $corporate = CorporateEventCoverage::first();
        $gallery = collect($corporate->gallery ?? []);
        return view('public.photography.corporate', compact('corporate', 'gallery'));
    }
    public function school()
    {
        $school = SchoolInstitutionPhotography::first();
        $gallery = collect($school->gallery ?? []);
        return view('public.photography.school', compact('school', 'gallery'));
    }
    public function product()
    {
        $product = ProductPhotography::first();
        $gallery = collect($product->gallery ?? []);
        return view('public.photography.product', compact('product', 'gallery'));
    }
    public function outdoor()
    {
        $outdoor = OutdoorNatureShoots::first();
        $gallery = collect($outdoor->gallery ?? []);
        return view('public.photography.outdoor', compact('outdoor', 'gallery'));
    }
    public function social()
    {
        return view('public.photography.social');
    }
}
