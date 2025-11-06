<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function ourStory()
    {
        return view('public.aboutus.our-story');
    }

    public function ourBrands()
    {
        return view('public.aboutus.our-brands');
    }

    public function careers()
    {
        return view('public.aboutus.careers');
    }

    public function internships()
    {
        return view('public.aboutus.internships');
    }
}
