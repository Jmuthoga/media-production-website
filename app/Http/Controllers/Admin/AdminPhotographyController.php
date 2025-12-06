<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\TiktokSchoolMediaShoots;

class AdminPhotographyController extends Controller
{
    // ===1. PORTRAIT PHOTOGRAPHY ===

    public function portraitIndex()
    {
        $portraits = PortraitPhotography::all();
        return view('admin.photography.portrait.index', compact('portraits'));
    }

    public function portraitCreate()
    {
        return view('admin.photography.portrait.create');
    }

    public function portraitStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120', // max 5MB
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        // Upload hero images
        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('portraits', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('portraits', 'public');
        }

        PortraitPhotography::create($data);

        return redirect()->route('admin.photography.portrait.index')
            ->with('success', 'Portrait photography added successfully.');
    }

    public function portraitEdit(PortraitPhotography $portrait)
    {
        return view('admin.photography.portrait.edit', compact('portrait'));
    }

    public function portraitUpdate(Request $request, PortraitPhotography $portrait)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        // Upload hero images
        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('portraits', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('portraits', 'public');
        }

        $portrait->update($data);

        return redirect()->route('admin.photography.portrait.index')
            ->with('success', 'Portrait photography updated successfully.');
    }

    public function portraitDestroy(PortraitPhotography $portrait)
    {
        // Delete hero images from storage
        if ($portrait->hero_image) {
            \Storage::disk('public')->delete($portrait->hero_image);
        }
        if ($portrait->hero_right_image) {
            \Storage::disk('public')->delete($portrait->hero_right_image);
        }

        $portrait->delete();

        return redirect()->route('admin.photography.portrait.index')
            ->with('success', 'Portrait photography deleted successfully.');
    }

    // === GALLERY MANAGEMENT ===

    // Show gallery for a portrait or independent gallery
    public function portraitGallery($portraitId)
    {
        $portrait = null;
        if ($portraitId != 0) {
            $portrait = PortraitPhotography::findOrFail($portraitId);
        }

        return view('admin.photography.portrait.gallery', compact('portrait'));
    }

    public function portraitGalleryStore(Request $request, $portraitId)
    {
        // Ensure a portrait is selected
        if ($portraitId == 0) {
            return redirect()->back()->with('error', 'Please select a portrait to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120', // 5MB max per image
        ]);

        $portrait = PortraitPhotography::findOrFail($portraitId);

        // Existing gallery or empty array
        $gallery = $portrait->gallery ?? [];

        // Append all uploaded images
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('portraits', 'public');
            }
        } else {
            return redirect()->back()->with('error', 'No images selected for upload.');
        }

        $portrait->gallery = $gallery;
        $portrait->save();

        return redirect()->route('admin.photography.portrait.gallery', $portrait)
            ->with('success', 'Gallery images added successfully.');
    }

    public function portraitGalleryDestroy(PortraitPhotography $portrait, $index)
    {
        $gallery = $portrait->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1); // remove image
            $portrait->gallery = $gallery;
            $portrait->save();
        }

        return redirect()->route('admin.photography.portrait.gallery', $portrait)
            ->with('success', 'Gallery image deleted successfully.');
    }


    // === 2. FAMILY PHOTOGRAPHY ===
    public function familyIndex()
    {
        $families = FamilyPhotography::all();
        return view('admin.photography.family.index', compact('families'));
    }

    // Create family entry
    public function familyCreate()
    {
        return view('admin.photography.family.create');
    }

    // Store family hero section
    public function familyStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('family', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('family', 'public');
        }

        FamilyPhotography::create($data);

        return redirect()->route('admin.photography.family.index')
            ->with('success', 'Family photography added successfully.');
    }

    // Edit page
    public function familyEdit(FamilyPhotography $family)
    {
        return view('admin.photography.family.edit', compact('family'));
    }

    // Update hero section
    public function familyUpdate(Request $request, FamilyPhotography $family)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('family', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('family', 'public');
        }

        $family->update($data);

        return redirect()->route('admin.photography.family.index')
            ->with('success', 'Family photography updated successfully.');
    }

    // Delete a full record
    public function familyDestroy(FamilyPhotography $family)
    {
        if ($family->hero_image) {
            \Storage::disk('public')->delete($family->hero_image);
        }
        if ($family->hero_right_image) {
            \Storage::disk('public')->delete($family->hero_right_image);
        }

        if ($family->gallery) {
            foreach ($family->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $family->delete();

        return redirect()->route('admin.photography.family.index')
            ->with('success', 'Family photography deleted successfully.');
    }

    // === FAMILY GALLERY MANAGEMENT ===
    public function familyGallery($familyId)
    {
        $family = null;
        if ($familyId != 0) {
            $family = FamilyPhotography::findOrFail($familyId);
        }

        return view('admin.photography.family.gallery', compact('family'));
    }

    public function familyGalleryStore(Request $request, $familyId)
    {
        if ($familyId == 0) {
            return redirect()->back()->with('error', 'Please select a family entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $family = FamilyPhotography::findOrFail($familyId);

        $gallery = $family->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('family/gallery', 'public');
            }
        }

        $family->gallery = $gallery;
        $family->save();

        return redirect()->route('admin.photography.family.gallery', $family)
            ->with('success', 'Gallery images added successfully.');
    }

    public function familyGalleryDestroy(FamilyPhotography $family, $index)
    {
        $gallery = $family->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $family->gallery = $gallery;
            $family->save();
        }

        return redirect()->route('admin.photography.family.gallery', $family)
            ->with('success', 'Gallery image deleted successfully.');
    }




    // === 3. STUDIO SESSION & HIRE ===
    public function studioIndex()
    {
        $studios = StudioSessionHire::all();
        return view('admin.photography.studio.index', compact('studios'));
    }

    // Show create form
    public function studioCreate()
    {
        return view('admin.photography.studio.create');
    }

    // Store new studio entry
    public function studioStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('studio', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('studio', 'public');
        }

        StudioSessionHire::create($data);

        return redirect()->route('admin.photography.studio.index')
            ->with('success', 'Studio photography added successfully.');
    }

    // Show edit form
    public function studioEdit(StudioSessionHire $studio)
    {
        return view('admin.photography.studio.edit', compact('studio'));
    }

    // Update studio entry
    public function studioUpdate(Request $request, StudioSessionHire $studio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('studio', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('studio', 'public');
        }

        $studio->update($data);

        return redirect()->route('admin.photography.studio.index')
            ->with('success', 'Studio photography updated successfully.');
    }

    // Delete studio entry
    public function studioDestroy(StudioSessionHire $studio)
    {
        if ($studio->hero_image) {
            \Storage::disk('public')->delete($studio->hero_image);
        }

        if ($studio->hero_right_image) {
            \Storage::disk('public')->delete($studio->hero_right_image);
        }

        if ($studio->gallery) {
            foreach ($studio->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $studio->delete();

        return redirect()->route('admin.photography.studio.index')
            ->with('success', 'Studio photography deleted successfully.');
    }

    // === STUDIO GALLERY MANAGEMENT ===

    // Show gallery page
    public function studioGallery($studioId)
    {
        $studio = null;
        if ($studioId != 0) {
            $studio = StudioSessionHire::findOrFail($studioId);
        }

        return view('admin.photography.studio.gallery', compact('studio'));
    }

    // Add images to gallery
    public function studioGalleryStore(Request $request, $studioId)
    {
        if ($studioId == 0) {
            return redirect()->back()->with('error', 'Please select a studio entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $studio = StudioSessionHire::findOrFail($studioId);

        $gallery = $studio->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('studio/gallery', 'public');
            }
        }

        $studio->gallery = $gallery;
        $studio->save();

        return redirect()->route('admin.photography.studio.gallery', $studio)
            ->with('success', 'Gallery images added successfully.');
    }

    // Delete gallery image
    public function studioGalleryDestroy(StudioSessionHire $studio, $index)
    {
        $gallery = $studio->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $studio->gallery = $gallery;
            $studio->save();
        }

        return redirect()->route('admin.photography.studio.gallery', $studio)
            ->with('success', 'Gallery image deleted successfully.');
    }



    // === 4. WEDDINGS & ENGAGEMENTS ===

    public function weddingsIndex()
    {
        $weddings = WeddingsEngagements::all();
        return view('admin.photography.weddings.index', compact('weddings'));
    }

    public function weddingsCreate()
    {
        return view('admin.photography.weddings.create');
    }

    public function weddingsStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120', // 5MB max
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('weddings', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('weddings', 'public');
        }

        WeddingsEngagements::create($data);

        return redirect()->route('admin.photography.weddings.index')
            ->with('success', 'Weddings & engagements added successfully.');
    }

    public function weddingsEdit(WeddingsEngagements $wedding)
    {
        return view('admin.photography.weddings.edit', compact('wedding'));
    }

    public function weddingsUpdate(Request $request, WeddingsEngagements $wedding)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('weddings', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('weddings', 'public');
        }

        $wedding->update($data);

        return redirect()->route('admin.photography.weddings.index')
            ->with('success', 'Weddings & engagements updated successfully.');
    }

    public function weddingsDestroy(WeddingsEngagements $wedding)
    {
        if ($wedding->hero_image) {
            \Storage::disk('public')->delete($wedding->hero_image);
        }

        if ($wedding->hero_right_image) {
            \Storage::disk('public')->delete($wedding->hero_right_image);
        }

        if ($wedding->gallery) {
            foreach ($wedding->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $wedding->delete();

        return redirect()->route('admin.photography.weddings.index')
            ->with('success', 'Weddings & engagements deleted successfully.');
    }

    // === WEDDINGS GALLERY MANAGEMENT ===

    public function weddingsGallery($weddingId)
    {
        $wedding = null;
        if ($weddingId != 0) {
            $wedding = WeddingsEngagements::findOrFail($weddingId);
        }

        return view('admin.photography.weddings.gallery', compact('wedding'));
    }

    public function weddingsGalleryStore(Request $request, $weddingId)
    {
        if ($weddingId == 0) {
            return redirect()->back()->with('error', 'Please select a wedding entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $wedding = WeddingsEngagements::findOrFail($weddingId);

        $gallery = $wedding->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('weddings/gallery', 'public');
            }
        }

        $wedding->gallery = $gallery;
        $wedding->save();

        return redirect()->route('admin.photography.weddings.gallery', $wedding)
            ->with('success', 'Gallery images added successfully.');
    }

    public function weddingsGalleryDestroy(WeddingsEngagements $wedding, $index)
    {
        $gallery = $wedding->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $wedding->gallery = $gallery;
            $wedding->save();
        }

        return redirect()->route('admin.photography.weddings.gallery', $wedding)
            ->with('success', 'Gallery image deleted successfully.');
    }


    // === 5. PARTIES & CONCERTS ===

    public function partiesIndex()
    {
        $parties = PartiesConcerts::all();
        return view('admin.photography.parties.index', compact('parties'));
    }

    public function partiesCreate()
    {
        return view('admin.photography.parties.create');
    }

    public function partiesStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('parties', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('parties', 'public');
        }

        PartiesConcerts::create($data);

        return redirect()->route('admin.photography.parties.index')
            ->with('success', 'Parties & concerts added successfully.');
    }

    public function partiesEdit(PartiesConcerts $party)
    {
        return view('admin.photography.parties.edit', compact('party'));
    }

    public function partiesUpdate(Request $request, PartiesConcerts $party)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('parties', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('parties', 'public');
        }

        $party->update($data);

        return redirect()->route('admin.photography.parties.index')
            ->with('success', 'Parties & concerts updated successfully.');
    }

    public function partiesDestroy(PartiesConcerts $party)
    {
        if ($party->hero_image) {
            \Storage::disk('public')->delete($party->hero_image);
        }
        if ($party->hero_right_image) {
            \Storage::disk('public')->delete($party->hero_right_image);
        }
        if ($party->gallery) {
            foreach ($party->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $party->delete();

        return redirect()->route('admin.photography.parties.index')
            ->with('success', 'Parties & concerts deleted successfully.');
    }

    // === PARTIES GALLERY MANAGEMENT ===

    public function partiesGallery($partyId)
    {
        $party = null;
        if ($partyId != 0) {
            $party = PartiesConcerts::findOrFail($partyId);
        }

        return view('admin.photography.parties.gallery', compact('party'));
    }

    public function partiesGalleryStore(Request $request, $partyId)
    {
        if ($partyId == 0) {
            return redirect()->back()->with('error', 'Please select a party entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $party = PartiesConcerts::findOrFail($partyId);

        $gallery = $party->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('parties/gallery', 'public');
            }
        }

        $party->gallery = $gallery;
        $party->save();

        return redirect()->route('admin.photography.parties.gallery', $party)
            ->with('success', 'Gallery images added successfully.');
    }

    public function partiesGalleryDestroy(PartiesConcerts $party, $index)
    {
        $gallery = $party->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $party->gallery = $gallery;
            $party->save();
        }

        return redirect()->route('admin.photography.parties.gallery', $party)
            ->with('success', 'Gallery image deleted successfully.');
    }


    // === 6. GRADUATION PHOTOGRAPHY ===

    public function graduationIndex()
    {
        $graduations = GraduationPhotography::all();
        return view('admin.photography.graduation.index', compact('graduations'));
    }

    public function graduationCreate()
    {
        return view('admin.photography.graduation.create');
    }

    public function graduationStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('graduation', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('graduation', 'public');
        }

        GraduationPhotography::create($data);

        return redirect()->route('admin.photography.graduation.index')
            ->with('success', 'Graduation photography added successfully.');
    }

    public function graduationEdit(GraduationPhotography $graduation)
    {
        return view('admin.photography.graduation.edit', compact('graduation'));
    }

    public function graduationUpdate(Request $request, GraduationPhotography $graduation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('graduation', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('graduation', 'public');
        }

        $graduation->update($data);

        return redirect()->route('admin.photography.graduation.index')
            ->with('success', 'Graduation photography updated successfully.');
    }

    public function graduationDestroy(GraduationPhotography $graduation)
    {
        if ($graduation->hero_image) {
            \Storage::disk('public')->delete($graduation->hero_image);
        }

        if ($graduation->hero_right_image) {
            \Storage::disk('public')->delete($graduation->hero_right_image);
        }

        if ($graduation->gallery) {
            foreach ($graduation->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $graduation->delete();

        return redirect()->route('admin.photography.graduation.index')
            ->with('success', 'Graduation photography deleted successfully.');
    }

    // === GRADUATION GALLERY MANAGEMENT ===

    public function graduationGallery($graduationId)
    {
        $graduation = null;
        if ($graduationId != 0) {
            $graduation = GraduationPhotography::findOrFail($graduationId);
        }

        return view('admin.photography.graduation.gallery', compact('graduation'));
    }

    public function graduationGalleryStore(Request $request, $graduationId)
    {
        if ($graduationId == 0) {
            return redirect()->back()->with('error', 'Please select a graduation entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $graduation = GraduationPhotography::findOrFail($graduationId);

        $gallery = $graduation->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('graduation/gallery', 'public');
            }
        }

        $graduation->gallery = $gallery;
        $graduation->save();

        return redirect()->route('admin.photography.graduation.gallery', $graduation)
            ->with('success', 'Gallery images added successfully.');
    }

    public function graduationGalleryDestroy(GraduationPhotography $graduation, $index)
    {
        $gallery = $graduation->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $graduation->gallery = $gallery;
            $graduation->save();
        }

        return redirect()->route('admin.photography.graduation.gallery', $graduation)
            ->with('success', 'Gallery image deleted successfully.');
    }




    // === 6. CORPORATE EVENT COVERAGE ===

    public function corporateIndex()
    {
        $corporates = CorporateEventCoverage::all();
        return view('admin.photography.corporate.index', compact('corporates'));
    }

    public function corporateCreate()
    {
        return view('admin.photography.corporate.create');
    }

    public function corporateStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('corporate', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('corporate', 'public');
        }

        CorporateEventCoverage::create($data);

        return redirect()->route('admin.photography.corporate.index')
            ->with('success', 'Corporate event coverage added successfully.');
    }

    public function corporateEdit(CorporateEventCoverage $corporate)
    {
        return view('admin.photography.corporate.edit', compact('corporate'));
    }

    public function corporateUpdate(Request $request, CorporateEventCoverage $corporate)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('corporate', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('corporate', 'public');
        }

        $corporate->update($data);

        return redirect()->route('admin.photography.corporate.index')
            ->with('success', 'Corporate event coverage updated successfully.');
    }

    public function corporateDestroy(CorporateEventCoverage $corporate)
    {
        if ($corporate->hero_image) {
            \Storage::disk('public')->delete($corporate->hero_image);
        }

        if ($corporate->hero_right_image) {
            \Storage::disk('public')->delete($corporate->hero_right_image);
        }

        if ($corporate->gallery) {
            foreach ($corporate->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $corporate->delete();

        return redirect()->route('admin.photography.corporate.index')
            ->with('success', 'Corporate event coverage deleted successfully.');
    }


    // === CORPORATE GALLERY MANAGEMENT ===

    public function corporateGallery($corporateId)
    {
        $corporate = null;
        if ($corporateId != 0) {
            $corporate = CorporateEventCoverage::findOrFail($corporateId);
        }

        return view('admin.photography.corporate.gallery', compact('corporate'));
    }

    public function corporateGalleryStore(Request $request, $corporateId)
    {
        if ($corporateId == 0) {
            return redirect()->back()->with('error', 'Please select a corporate entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $corporate = CorporateEventCoverage::findOrFail($corporateId);

        $gallery = $corporate->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('corporate/gallery', 'public');
            }
        }

        $corporate->gallery = $gallery;
        $corporate->save();

        return redirect()->route('admin.photography.corporate.gallery', $corporate)
            ->with('success', 'Gallery images added successfully.');
    }

    public function corporateGalleryDestroy(CorporateEventCoverage $corporate, $index)
    {
        $gallery = $corporate->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $corporate->gallery = $gallery;
            $corporate->save();
        }

        return redirect()->route('admin.photography.corporate.gallery', $corporate)
            ->with('success', 'Gallery image deleted successfully.');
    }


    // === 8. SCHOOL & INSTITUTION PHOTOGRAPHY ===

    public function schoolIndex()
    {
        $schools = SchoolInstitutionPhotography::all();
        return view('admin.photography.school.index', compact('schools'));
    }

    public function schoolCreate()
    {
        return view('admin.photography.school.create');
    }

    public function schoolStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('school', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('school', 'public');
        }

        SchoolInstitutionPhotography::create($data);

        return redirect()->route('admin.photography.school.index')
            ->with('success', 'School & institution photography added successfully.');
    }

    public function schoolEdit(SchoolInstitutionPhotography $school)
    {
        return view('admin.photography.school.edit', compact('school'));
    }

    public function schoolUpdate(Request $request, SchoolInstitutionPhotography $school)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('school', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('school', 'public');
        }

        $school->update($data);

        return redirect()->route('admin.photography.school.index')
            ->with('success', 'School & institution photography updated successfully.');
    }

    public function schoolDestroy(SchoolInstitutionPhotography $school)
    {
        if ($school->hero_image) {
            \Storage::disk('public')->delete($school->hero_image);
        }

        if ($school->hero_right_image) {
            \Storage::disk('public')->delete($school->hero_right_image);
        }

        if ($school->gallery) {
            foreach ($school->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $school->delete();

        return redirect()->route('admin.photography.school.index')
            ->with('success', 'School & institution photography deleted successfully.');
    }

    // === SCHOOL GALLERY MANAGEMENT ===

    public function schoolGallery($schoolId)
    {
        $school = null;
        if ($schoolId != 0) {
            $school = SchoolInstitutionPhotography::findOrFail($schoolId);
        }

        return view('admin.photography.school.gallery', compact('school'));
    }

    public function schoolGalleryStore(Request $request, $schoolId)
    {
        if ($schoolId == 0) {
            return redirect()->back()->with('error', 'Please select a school entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $school = SchoolInstitutionPhotography::findOrFail($schoolId);
        $gallery = $school->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('school/gallery', 'public');
            }
        }

        $school->gallery = $gallery;
        $school->save();

        return redirect()->route('admin.photography.school.gallery', $school)
            ->with('success', 'Gallery images added successfully.');
    }

    public function schoolGalleryDestroy(SchoolInstitutionPhotography $school, $index)
    {
        $gallery = $school->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $school->gallery = $gallery;
            $school->save();
        }

        return redirect()->route('admin.photography.school.gallery', $school)
            ->with('success', 'Gallery image deleted successfully.');
    }



    // === 9. PRODUCT PHOTOGRAPHY ===
    public function productIndex()
    {
        $products = ProductPhotography::all();
        return view('admin.photography.product.index', compact('products'));
    }

    public function productCreate()
    {
        return view('admin.photography.product.create');
    }

    public function productStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('product', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('product', 'public');
        }

        ProductPhotography::create($data);

        return redirect()->route('admin.photography.product.index')
            ->with('success', 'Product photography added successfully.');
    }

    public function productEdit(ProductPhotography $product)
    {
        return view('admin.photography.product.edit', compact('product'));
    }

    public function productUpdate(Request $request, ProductPhotography $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('product', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('product', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.photography.product.index')
            ->with('success', 'Product photography updated successfully.');
    }

    public function productDestroy(ProductPhotography $product)
    {
        if ($product->hero_image) {
            \Storage::disk('public')->delete($product->hero_image);
        }

        if ($product->hero_right_image) {
            \Storage::disk('public')->delete($product->hero_right_image);
        }

        if ($product->gallery) {
            foreach ($product->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $product->delete();

        return redirect()->route('admin.photography.product.index')
            ->with('success', 'Product photography deleted successfully.');
    }

    // === PRODUCT GALLERY MANAGEMENT ===

    public function productGallery($productId)
    {
        $product = null;
        if ($productId != 0) {
            $product = ProductPhotography::findOrFail($productId);
        }

        return view('admin.photography.product.gallery', compact('product'));
    }

    public function productGalleryStore(Request $request, $productId)
    {
        if ($productId == 0) {
            return redirect()->back()->with('error', 'Please select a product entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $product = ProductPhotography::findOrFail($productId);
        $gallery = $product->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('product/gallery', 'public');
            }
        }

        $product->gallery = $gallery;
        $product->save();

        return redirect()->route('admin.photography.product.gallery', $product)
            ->with('success', 'Gallery images added successfully.');
    }

    public function productGalleryDestroy(ProductPhotography $product, $index)
    {
        $gallery = $product->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $product->gallery = $gallery;
            $product->save();
        }

        return redirect()->route('admin.photography.product.gallery', $product)
            ->with('success', 'Gallery image deleted successfully.');
    }




    // === 10. OUTDOOR & NATURE SHOOTS ===

    public function outdoorIndex()
    {
        $outdoors = OutdoorNatureShoots::all();
        return view('admin.photography.outdoor.index', compact('outdoors'));
    }

    public function outdoorCreate()
    {
        return view('admin.photography.outdoor.create');
    }

    public function outdoorStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('outdoor', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('outdoor', 'public');
        }

        OutdoorNatureShoots::create($data);

        return redirect()->route('admin.photography.outdoor.index')
            ->with('success', 'Outdoor & nature shoot added successfully.');
    }

    public function outdoorEdit(OutdoorNatureShoots $outdoor)
    {
        return view('admin.photography.outdoor.edit', compact('outdoor'));
    }

    public function outdoorUpdate(Request $request, OutdoorNatureShoots $outdoor)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'hero_image' => 'nullable|image|max:5120',
            'hero_right_image' => 'nullable|image|max:5120',
        ]);

        $data = $request->only(['title', 'description']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('outdoor', 'public');
        }

        if ($request->hasFile('hero_right_image')) {
            $data['hero_right_image'] = $request->file('hero_right_image')->store('outdoor', 'public');
        }

        $outdoor->update($data);

        return redirect()->route('admin.photography.outdoor.index')
            ->with('success', 'Outdoor & nature shoot updated successfully.');
    }

    public function outdoorDestroy(OutdoorNatureShoots $outdoor)
    {
        if ($outdoor->hero_image) {
            \Storage::disk('public')->delete($outdoor->hero_image);
        }

        if ($outdoor->hero_right_image) {
            \Storage::disk('public')->delete($outdoor->hero_right_image);
        }

        if ($outdoor->gallery) {
            foreach ($outdoor->gallery as $img) {
                \Storage::disk('public')->delete($img);
            }
        }

        $outdoor->delete();

        return redirect()->route('admin.photography.outdoor.index')
            ->with('success', 'Outdoor & nature shoot deleted successfully.');
    }


    // === OUTDOOR GALLERY MANAGEMENT ===

    public function outdoorGallery($outdoorId)
    {
        $outdoor = null;

        if ($outdoorId != 0) {
            $outdoor = OutdoorNatureShoots::findOrFail($outdoorId);
        }

        return view('admin.photography.outdoor.gallery', compact('outdoor'));
    }

    public function outdoorGalleryStore(Request $request, $outdoorId)
    {
        if ($outdoorId == 0) {
            return redirect()->back()->with('error', 'Please select an outdoor entry to add gallery images.');
        }

        $request->validate([
            'gallery.*' => 'required|image|max:5120',
        ]);

        $outdoor = OutdoorNatureShoots::findOrFail($outdoorId);

        $gallery = $outdoor->gallery ?? [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $img) {
                $gallery[] = $img->store('outdoor/gallery', 'public');
            }
        }

        $outdoor->gallery = $gallery;
        $outdoor->save();

        return redirect()->route('admin.photography.outdoor.gallery', $outdoor)
            ->with('success', 'Gallery images added successfully.');
    }

    public function outdoorGalleryDestroy(OutdoorNatureShoots $outdoor, $index)
    {
        $gallery = $outdoor->gallery ?? [];

        if (isset($gallery[$index])) {
            \Storage::disk('public')->delete($gallery[$index]);
            array_splice($gallery, $index, 1);
            $outdoor->gallery = $gallery;
            $outdoor->save();
        }

        return redirect()->route('admin.photography.outdoor.gallery', $outdoor)
            ->with('success', 'Gallery image deleted successfully.');
    }


    // === 11. TIKTOK & SCHOOL MEDIA SHOOTS ===
    public function tiktokIndex()
    {
        $tiktoks = TiktokSchoolMediaShoots::all();
        return view('admin.photography.tiktok.index', compact('tiktoks'));
    }

    public function tiktokCreate()
    {
        return view('admin.photography.tiktok.create');
    }

    public function tiktokStore(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        TiktokSchoolMediaShoots::create($request->all());
        return redirect()->route('admin.photography.tiktok.index')->with('success', 'Tiktok & school media shoot added successfully.');
    }

    public function tiktokEdit(TiktokSchoolMediaShoots $tiktok)
    {
        return view('admin.photography.tiktok.edit', compact('tiktok'));
    }

    public function tiktokUpdate(Request $request, TiktokSchoolMediaShoots $tiktok)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $tiktok->update($request->all());
        return redirect()->route('admin.photography.tiktok.index')->with('success', 'Tiktok & school media shoot updated successfully.');
    }

    public function tiktokDestroy(TiktokSchoolMediaShoots $tiktok)
    {
        $tiktok->delete();
        return redirect()->route('admin.photography.tiktok.index')->with('success', 'Tiktok & school media shoot deleted successfully.');
    }
}
