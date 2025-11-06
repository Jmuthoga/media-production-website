<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurStoryMission;
use App\Models\OurBrandsAchievements;
use App\Models\CareersOpportunities;

class AdminAboutUsController extends Controller
{
    // === OUR STORY & MISSION ===
    public function storyIndex()
    {
        $story = OurStoryMission::all();
        return view('admin.aboutus.story.index', compact('story'));
    }

    public function storyCreate()
    {
        return view('admin.aboutus.story.create');
    }

    public function storyStore(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        OurStoryMission::create($request->all());
        return redirect()->route('admin.aboutus.story.index')->with('success', 'Story & Mission added successfully.');
    }

    public function storyEdit(OurStoryMission $story)
    {
        return view('admin.aboutus.story.edit', compact('story'));
    }

    public function storyUpdate(Request $request, OurStoryMission $story)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $story->update($request->all());
        return redirect()->route('admin.aboutus.story.index')->with('success', 'Story & Mission updated successfully.');
    }

    public function storyDestroy(OurStoryMission $story)
    {
        $story->delete();
        return redirect()->route('admin.aboutus.story.index')->with('success', 'Story & Mission deleted successfully.');
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
