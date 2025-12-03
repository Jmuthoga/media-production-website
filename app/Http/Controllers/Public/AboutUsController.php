<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InternshipAttachment;
use App\Models\OurStoryMission;
use App\Models\OurStoryClient;

class AboutUsController extends Controller
{
    public function ourStory()
    {
        // Fetch hero section
        $hero = OurStoryMission::where('type', 'hero')->first();

        // Fetch page info (about paragraphs, video, stats)
        $page = OurStoryMission::where('type', 'page_info')->first();

        // Fetch FAQs & side feature
        $faq = OurStoryMission::where('type', 'faq')->first();

        // Fetch clients (logos)
        $clients = OurStoryClient::all();

        // Decode meta JSON data for hero, page info, and faq
        $heroMeta = $hero ? json_decode($hero->meta, true) : [];
        $pageMeta = $page ? json_decode($page->meta, true) : [];
        $faqMeta  = $faq ? json_decode($faq->meta, true) : [];

        // Stats array inside page meta
        $stats = collect($pageMeta['stats'] ?? []);

        return view('public.aboutus.our-story', compact(
            'hero',
            'heroMeta',
            'page',
            'pageMeta',
            'stats',
            'faq',
            'faqMeta',
            'clients'
        ));
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
        $items = InternshipAttachment::orderBy('type')->orderBy('id')->get();

        // Hero and Page Info
        $hero = $items->firstWhere('type', 'hero');
        $page = $items->firstWhere('type', 'page_info');

        // Decode meta safely
        if ($hero && is_string($hero->meta)) {
            $hero->meta = json_decode($hero->meta, true) ?? [];
        }

        if ($page && is_string($page->meta)) {
            $page->meta = json_decode($page->meta, true) ?? [];
        }

        // Stats & Video
        $stats = collect($page->meta['stats'] ?? []);
        $videoId = $page->meta['video_id'] ?? 'nXo4uQ1iA3Y';

        // Other sections
        $roles = $items->where('type', 'role')->values();
        $offers = $items->where('type', 'offer')->values();
        $requirements = $items->where('type', 'requirement')->values();

        return view('public.aboutus.internships', compact(
            'hero',
            'page',
            'stats',
            'videoId',
            'roles',
            'offers',
            'requirements'
        ));
    }
}
