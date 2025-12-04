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

    public function studioCreate()
    {
        return view('admin.photography.studio.create');
    }

    public function studioStore(Request $request)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        StudioSessionHire::create($request->all());
        return redirect()->route('admin.photography.studio.index')->with('success', 'Studio session added successfully.');
    }

    public function studioEdit(StudioSessionHire $studio)
    {
        return view('admin.photography.studio.edit', compact('studio'));
    }

    public function studioUpdate(Request $request, StudioSessionHire $studio)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $studio->update($request->all());
        return redirect()->route('admin.photography.studio.index')->with('success', 'Studio session updated successfully.');
    }

    public function studioDestroy(StudioSessionHire $studio)
    {
        $studio->delete();
        return redirect()->route('admin.photography.studio.index')->with('success', 'Studio session deleted successfully.');
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        WeddingsEngagements::create($request->all());
        return redirect()->route('admin.photography.weddings.index')->with('success', 'Weddings & engagements added successfully.');
    }

    public function weddingsEdit(WeddingsEngagements $wedding)
    {
        return view('admin.photography.weddings.edit', compact('wedding'));
    }

    public function weddingsUpdate(Request $request, WeddingsEngagements $wedding)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $wedding->update($request->all());
        return redirect()->route('admin.photography.weddings.index')->with('success', 'Weddings & engagements updated successfully.');
    }

    public function weddingsDestroy(WeddingsEngagements $wedding)
    {
        $wedding->delete();
        return redirect()->route('admin.photography.weddings.index')->with('success', 'Weddings & engagements deleted successfully.');
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        PartiesConcerts::create($request->all());
        return redirect()->route('admin.photography.parties.index')->with('success', 'Parties & concerts added successfully.');
    }

    public function partiesEdit(PartiesConcerts $party)
    {
        return view('admin.photography.parties.edit', compact('party'));
    }

    public function partiesUpdate(Request $request, PartiesConcerts $party)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $party->update($request->all());
        return redirect()->route('admin.photography.parties.index')->with('success', 'Parties & concerts updated successfully.');
    }

    public function partiesDestroy(PartiesConcerts $party)
    {
        $party->delete();
        return redirect()->route('admin.photography.parties.index')->with('success', 'Parties & concerts deleted successfully.');
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        GraduationPhotography::create($request->all());
        return redirect()->route('admin.photography.graduation.index')->with('success', 'Graduation photography added successfully.');
    }

    public function graduationEdit(GraduationPhotography $graduation)
    {
        return view('admin.photography.graduation.edit', compact('graduation'));
    }

    public function graduationUpdate(Request $request, GraduationPhotography $graduation)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $graduation->update($request->all());
        return redirect()->route('admin.photography.graduation.index')->with('success', 'Graduation photography updated successfully.');
    }

    public function graduationDestroy(GraduationPhotography $graduation)
    {
        $graduation->delete();
        return redirect()->route('admin.photography.graduation.index')->with('success', 'Graduation photography deleted successfully.');
    }



    // === 7. CORPORATE & EVENT COVERAGE ===
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        CorporateEventCoverage::create($request->all());
        return redirect()->route('admin.photography.corporate.index')->with('success', 'Corporate & event coverage added successfully.');
    }

    public function corporateEdit(CorporateEventCoverage $corporate)
    {
        return view('admin.photography.corporate.edit', compact('corporate'));
    }

    public function corporateUpdate(Request $request, CorporateEventCoverage $corporate)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $corporate->update($request->all());
        return redirect()->route('admin.photography.corporate.index')->with('success', 'Corporate & event coverage updated successfully.');
    }

    public function corporateDestroy(CorporateEventCoverage $corporate)
    {
        $corporate->delete();
        return redirect()->route('admin.photography.corporate.index')->with('success', 'Corporate & event coverage deleted successfully.');
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        SchoolInstitutionPhotography::create($request->all());
        return redirect()->route('admin.photography.school.index')->with('success', 'School photography added successfully.');
    }

    public function schoolEdit(SchoolInstitutionPhotography $school)
    {
        return view('admin.photography.school.edit', compact('school'));
    }

    public function schoolUpdate(Request $request, SchoolInstitutionPhotography $school)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $school->update($request->all());
        return redirect()->route('admin.photography.school.index')->with('success', 'School photography updated successfully.');
    }

    public function schoolDestroy(SchoolInstitutionPhotography $school)
    {
        $school->delete();
        return redirect()->route('admin.photography.school.index')->with('success', 'School photography deleted successfully.');
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        ProductPhotography::create($request->all());
        return redirect()->route('admin.photography.product.index')->with('success', 'Product photography added successfully.');
    }

    public function productEdit(ProductPhotography $product)
    {
        return view('admin.photography.product.edit', compact('product'));
    }

    public function productUpdate(Request $request, ProductPhotography $product)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $product->update($request->all());
        return redirect()->route('admin.photography.product.index')->with('success', 'Product photography updated successfully.');
    }

    public function productDestroy(ProductPhotography $product)
    {
        $product->delete();
        return redirect()->route('admin.photography.product.index')->with('success', 'Product photography deleted successfully.');
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
        $request->validate(['title' => 'required', 'content' => 'required']);
        OutdoorNatureShoots::create($request->all());
        return redirect()->route('admin.photography.outdoor.index')->with('success', 'Outdoor & nature shoot added successfully.');
    }

    public function outdoorEdit(OutdoorNatureShoots $outdoor)
    {
        return view('admin.photography.outdoor.edit', compact('outdoor'));
    }

    public function outdoorUpdate(Request $request, OutdoorNatureShoots $outdoor)
    {
        $request->validate(['title' => 'required', 'content' => 'required']);
        $outdoor->update($request->all());
        return redirect()->route('admin.photography.outdoor.index')->with('success', 'Outdoor & nature shoot updated successfully.');
    }

    public function outdoorDestroy(OutdoorNatureShoots $outdoor)
    {
        $outdoor->delete();
        return redirect()->route('admin.photography.outdoor.index')->with('success', 'Outdoor & nature shoot deleted successfully.');
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
