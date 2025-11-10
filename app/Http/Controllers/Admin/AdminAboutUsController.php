<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurStoryMission;
use App\Models\OurBrandsAchievements;
use App\Models\CareersOpportunities;
use App\Models\OurStoryClient;
use Illuminate\Support\Facades\Storage; 


class AdminAboutUsController extends Controller
{
 /* ===========================
     *   OUR STORY & MISSION CRUD
     * =========================== */

    // List all story/mission entries
    public function index()
    {
        $stories = OurStoryMission::all();
        $clients = \App\Models\OurStoryClient::all();

        return view('admin.aboutus.story.index', compact('stories', 'clients'));
    }
    // Show form to create new entry
    public function create()
    {
        return view('admin.aboutus.story.create');
    }

    // Store new entry
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'organization' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
            'type' => 'nullable|string|max:50',
            'stat_value' => 'nullable|integer',
            'meta' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('aboutus/story', 'public');
        }

        $data['type'] = $data['type'] ?? 'section';
        $data['meta'] = isset($data['meta']) ? json_encode($data['meta']) : null;

        OurStoryMission::create($data);

        return redirect()->route('admin.aboutus.story.index')
            ->with('success', 'Story & Mission created successfully.');
    }

    // Show form to edit entry
    public function edit(OurStoryMission $story)
    {
        return view('admin.aboutus.story.edit', compact('story'));
    }

    // Update existing entry
    public function update(Request $request, OurStoryMission $story)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'organization' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
            'type' => 'nullable|string|max:50',
            'stat_value' => 'nullable|integer',
            'meta' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('aboutus/story', 'public');
        }

        $data['type'] = $data['type'] ?? $story->type;
        $data['meta'] = isset($data['meta']) ? json_encode($data['meta']) : $story->meta;

        $story->update($data);

        return redirect()->route('admin.aboutus.story.index')
            ->with('success', 'Story & Mission updated successfully.');
    }

    // Delete entry
    public function destroy(OurStoryMission $story)
    {
        $story->delete();

        return redirect()->route('admin.aboutus.story.index')
            ->with('success', 'Story & Mission deleted successfully.');
    }

    /* ===========================
     *   HERO / PAGE INFO SECTION
     * =========================== */

    // Fetch or edit hero section
    public function heroForm()
    {
        $hero = OurStoryMission::where('type', 'hero')->first();
        return view('admin.aboutus.story.hero_form', compact('hero'));
    }

    // Store/update hero section
    public function heroSave(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_bg' => 'nullable|image|max:4096',
            'hero_right' => 'nullable|image|max:4096',
        ]);

        $hero = OurStoryMission::firstOrNew(['type' => 'hero']);
        $meta = $hero->meta ? json_decode($hero->meta, true) : [];

        if ($request->hasFile('hero_bg')) {
            $meta['hero_image'] = $request->file('hero_bg')->store('aboutus/story', 'public');
        }

        if ($request->hasFile('hero_right')) {
            $meta['hero_right_image'] = $request->file('hero_right')->store('aboutus/story', 'public');
        }

        $hero->fill([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'type' => 'hero',
            'meta' => json_encode($meta),
        ])->save();

        return redirect()->route('admin.aboutus.story.index')
            ->with('success', 'Hero section saved successfully.');
    }

    public function heroDelete()
    {
        $hero = OurStoryMission::where('type', 'hero')->first();

        if ($hero) {
            // Delete uploaded images from storage
            $meta = $hero->meta ? json_decode($hero->meta, true) : [];

            if (!empty($meta['hero_image'])) {
                \Storage::disk('public')->delete($meta['hero_image']);
            }
            if (!empty($meta['hero_right_image'])) {
                \Storage::disk('public')->delete($meta['hero_right_image']);
            }

            $hero->delete();

            return redirect()->route('admin.aboutus.story.index')
                ->with('success', 'Hero section deleted successfully.');
        }

        return redirect()->route('admin.aboutus.story.index')
            ->with('error', 'Hero section not found.');
    }

    // Page info section
    public function pageInfoForm()
    {
        $pageInfo = OurStoryMission::where('type', 'page_info')->first();
        return view('admin.aboutus.story.page_info_form', compact('pageInfo'));
    }

    public function pageInfoSave(Request $request)
    {
        $data = $request->validate([
            'about1' => 'required|string',
            'about2' => 'required|string',
            'video_id' => 'nullable|string|max:255',
            'stats' => 'nullable|array',
            'stats.*.title' => 'required|string|max:255',
            'stats.*.value' => 'required|integer|min:0',
        ]);

        $page = OurStoryMission::where('type', 'page_info')->first() ?? new OurStoryMission(['type' => 'page_info']);

        $page->meta = json_encode([
            'about_paragraph1' => $data['about1'],
            'about_paragraph2' => $data['about2'],
            'video_id' => $data['video_id'] ?? null,
            'stats' => $data['stats'] ?? [],
        ]);

        $page->save();

        return redirect()->route('admin.aboutus.story.index')
            ->with('success', 'Page info saved successfully.');
    }

    /* ===========================
    *   FAQ & SIDE FEATURE SECTION
    * =========================== */

    // Show FAQ & Side Feature edit form
    public function faqForm()
    {
        // Fetch the FAQ section entry or create new
        $faqSection = OurStoryMission::where('type', 'faq')->first();
        return view('admin.aboutus.story.faq_form', compact('faqSection'));
    }

    // Store/update FAQ section
    public function faqSave(Request $request)
    {
        $data = $request->validate([
            'faqs' => 'nullable|array',
            'faqs.*.question' => 'required|string|max:255',
            'faqs.*.answer' => 'required|string',
            'side_image' => 'nullable|image|max:4096',
        ]);

        $faqSection = OurStoryMission::firstOrNew(['type' => 'faq']);
        $meta = $faqSection->meta ? json_decode($faqSection->meta, true) : [];

        if ($request->hasFile('side_image')) {
            $meta['side_image'] = $request->file('side_image')->store('aboutus/story', 'public');
        }

        $meta['faqs'] = $data['faqs'] ?? $meta['faqs'] ?? [];

        $faqSection->fill([
            'title' => 'FAQ & Side Feature',
            'type' => 'faq',
            'meta' => json_encode($meta),
        ])->save();

        return redirect()->route('admin.aboutus.story.index')
            ->with('success', 'FAQ & Side Feature section saved successfully.');
    }

    // ==========================
    // OUR CLIENTS SECTION
    // ==========================
    public function clientsCreate()
    {
        return view('admin.aboutus.story.clients_create');
    }

    public function clientsStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('aboutus/clients', 'public');
        }

        OurStoryClient::create($data);

        return redirect()->route('admin.aboutus.story.index')->with('success', 'Client added successfully.');
    }

    public function clientsEdit(OurStoryClient $client)
    {
        return view('admin.aboutus.story.clients_edit', compact('client'));
    }

    public function clientsUpdate(Request $request, OurStoryClient $client)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:4096',
        ]);

        if ($request->hasFile('image')) {
            if ($client->image) {
                Storage::disk('public')->delete($client->image);
            }
            $data['image'] = $request->file('image')->store('aboutus/clients', 'public');
        }

        $client->update($data);

        return redirect()->route('admin.aboutus.story.index')->with('success', 'Client updated successfully.');
    }

    public function clientsDestroy(OurStoryClient $client)
    {
        if ($client->image) {
            Storage::disk('public')->delete($client->image);
        }

        $client->delete();

        return redirect()->route('admin.aboutus.story.index')->with('success', 'Client deleted successfully.');
    }



    // === OUR BRANDS & ACHIEVEMENTS ===
    public function brandIndex()
    {
        $brands = OurBrandsAchievements::all();
        return view('admin.aboutus.brands.index', compact('brands'));
    }

    public function brandCreate()
    {
        return view('admin.aboutus.brands.create');
    }

    public function brandStore(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        OurBrandsAchievements::create($request->all());
        return redirect()->route('admin.aboutus.brands.index')->with('success', 'Brand & Achievement added successfully.');
    }

    public function brandEdit(OurBrandsAchievements $brand)
    {
        return view('admin.aboutus.brands.edit', compact('brand'));
    }

    public function brandUpdate(Request $request, OurBrandsAchievements $brand)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $brand->update($request->all());
        return redirect()->route('admin.aboutus.brands.index')->with('success', 'Brand & Achievement updated successfully.');
    }

    public function brandDestroy(OurBrandsAchievements $brand)
    {
        $brand->delete();
        return redirect()->route('admin.aboutus.brands.index')->with('success', 'Brand & Achievement deleted successfully.');
    }

    // === CAREERS & OPPORTUNITIES ===
    public function careerIndex()
    {
        $careers = CareersOpportunities::all();
        return view('admin.aboutus.careers.index', compact('careers'));
    }

    public function careerCreate()
    {
        return view('admin.aboutus.careers.create');
    }

    public function careerStore(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        CareersOpportunities::create($request->all());
        return redirect()->route('admin.aboutus.careers.index')->with('success', 'Career & Opportunity added successfully.');
    }

    public function careerEdit(CareersOpportunities $career)
    {
        return view('admin.aboutus.careers.edit', compact('career'));
    }

    public function careerUpdate(Request $request, CareersOpportunities $career)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $career->update($request->all());
        return redirect()->route('admin.aboutus.careers.index')->with('success', 'Career & Opportunity updated successfully.');
    }

    public function careerDestroy(CareersOpportunities $career)
    {
        $career->delete();
        return redirect()->route('admin.aboutus.careers.index')->with('success', 'Career & Opportunity deleted successfully.');
    }
}
