<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WeddingEngagementVideo;
use App\Models\PartiesConcertVideo;
use App\Models\SchoolGraduationVideo;
use App\Models\CorporateBrandVideo;
use App\Models\FamilyPersonalVideo;
use App\Models\ProductVideo;
use App\Models\OutdoorLifestyleVideo;
use App\Models\TiktokSocialVideo;
use App\Models\LiveShowStream;

class AdminVideographyController extends Controller
{
    // === 1. WEDDINGS & ENGAGEMENTS ===
    public function weddingsIndex() {
        $videos = WeddingEngagementVideo::all();
        return view('admin.videography.weddings.index', compact('videos'));
    }

    public function weddingsCreate() {
        return view('admin.videography.weddings.create');
    }

    public function weddingsStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        WeddingEngagementVideo::create($data);
        return redirect()->route('admin.videography.weddings.index')->with('success', 'Wedding video added successfully.');
    }

    public function weddingsEdit(WeddingEngagementVideo $video) {
        return view('admin.videography.weddings.edit', compact('video'));
    }

    public function weddingsUpdate(Request $request, WeddingEngagementVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.weddings.index')->with('success', 'Wedding video updated successfully.');
    }

    public function weddingsDestroy(WeddingEngagementVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.weddings.index')->with('success', 'Wedding video deleted successfully.');
    }

    // === 2. PARTIES & CONCERTS ===
    public function partiesIndex() {
        $videos = PartiesConcertVideo::all();
        return view('admin.videography.parties.index', compact('videos'));
    }

    public function partiesCreate() {
        return view('admin.videography.parties.create');
    }

    public function partiesStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        PartiesConcertVideo::create($data);
        return redirect()->route('admin.videography.parties.index')->with('success', 'Party video added successfully.');
    }

    public function partiesEdit(PartiesConcertVideo $video) {
        return view('admin.videography.parties.edit', compact('video'));
    }

    public function partiesUpdate(Request $request, PartiesConcertVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.parties.index')->with('success', 'Party video updated successfully.');
    }

    public function partiesDestroy(PartiesConcertVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.parties.index')->with('success', 'Party video deleted successfully.');
    }

    // === 3. SCHOOL & GRADUATION EVENTS ===
    public function schoolIndex() {
        $videos = SchoolGraduationVideo::all();
        return view('admin.videography.school.index', compact('videos'));
    }

    public function schoolCreate() {
        return view('admin.videography.school.create');
    }

    public function schoolStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        SchoolGraduationVideo::create($data);
        return redirect()->route('admin.videography.school.index')->with('success', 'School video added successfully.');
    }

    public function schoolEdit(SchoolGraduationVideo $video) {
        return view('admin.videography.school.edit', compact('video'));
    }

    public function schoolUpdate(Request $request, SchoolGraduationVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.school.index')->with('success', 'School video updated successfully.');
    }

    public function schoolDestroy(SchoolGraduationVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.school.index')->with('success', 'School video deleted successfully.');
    }

    // === 4. CORPORATE & BRAND EVENTS ===
    public function corporateIndex() {
        $videos = CorporateBrandVideo::all();
        return view('admin.videography.corporate.index', compact('videos'));
    }

    public function corporateCreate() {
        return view('admin.videography.corporate.create');
    }

    public function corporateStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        CorporateBrandVideo::create($data);
        return redirect()->route('admin.videography.corporate.index')->with('success', 'Corporate video added successfully.');
    }

    public function corporateEdit(CorporateBrandVideo $video) {
        return view('admin.videography.corporate.edit', compact('video'));
    }

    public function corporateUpdate(Request $request, CorporateBrandVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.corporate.index')->with('success', 'Corporate video updated successfully.');
    }

    public function corporateDestroy(CorporateBrandVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.corporate.index')->with('success', 'Corporate video deleted successfully.');
    }

    // === 5. FAMILY & PERSONAL VIDEOS ===
    public function familyIndex() {
        $videos = FamilyPersonalVideo::all();
        return view('admin.videography.family.index', compact('videos'));
    }

    public function familyCreate() {
        return view('admin.videography.family.create');
    }

    public function familyStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        FamilyPersonalVideo::create($data);
        return redirect()->route('admin.videography.family.index')->with('success', 'Family video added successfully.');
    }

    public function familyEdit(FamilyPersonalVideo $video) {
        return view('admin.videography.family.edit', compact('video'));
    }

    public function familyUpdate(Request $request, FamilyPersonalVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.family.index')->with('success', 'Family video updated successfully.');
    }

    public function familyDestroy(FamilyPersonalVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.family.index')->with('success', 'Family video deleted successfully.');
    }

    // === 6. PRODUCT VIDEOGRAPHY ===
    public function productIndex() {
        $videos = ProductVideo::all();
        return view('admin.videography.product.index', compact('videos'));
    }

    public function productCreate() {
        return view('admin.videography.product.create');
    }

    public function productStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        ProductVideo::create($data);
        return redirect()->route('admin.videography.product.index')->with('success', 'Product video added successfully.');
    }

    public function productEdit(ProductVideo $video) {
        return view('admin.videography.product.edit', compact('video'));
    }

    public function productUpdate(Request $request, ProductVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.product.index')->with('success', 'Product video updated successfully.');
    }

    public function productDestroy(ProductVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.product.index')->with('success', 'Product video deleted successfully.');
    }

    // === 7. OUTDOOR & LIFESTYLE SHOOTS ===
    public function outdoorIndex() {
        $videos = OutdoorLifestyleVideo::all();
        return view('admin.videography.outdoor.index', compact('videos'));
    }

    public function outdoorCreate() {
        return view('admin.videography.outdoor.create');
    }

    public function outdoorStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        OutdoorLifestyleVideo::create($data);
        return redirect()->route('admin.videography.outdoor.index')->with('success', 'Outdoor video added successfully.');
    }

    public function outdoorEdit(OutdoorLifestyleVideo $video) {
        return view('admin.videography.outdoor.edit', compact('video'));
    }

    public function outdoorUpdate(Request $request, OutdoorLifestyleVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.outdoor.index')->with('success', 'Outdoor video updated successfully.');
    }

    public function outdoorDestroy(OutdoorLifestyleVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.outdoor.index')->with('success', 'Outdoor video deleted successfully.');
    }

    // === 8. TIKTOK & SOCIAL MEDIA VIDEOS ===
    public function tiktokIndex() {
        $videos = TiktokSocialVideo::all();
        return view('admin.videography.tiktok.index', compact('videos'));
    }

    public function tiktokCreate() {
        return view('admin.videography.tiktok.create');
    }

    public function tiktokStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        TiktokSocialVideo::create($data);
        return redirect()->route('admin.videography.tiktok.index')->with('success', 'Tiktok video added successfully.');
    }

    public function tiktokEdit(TiktokSocialVideo $video) {
        return view('admin.videography.tiktok.edit', compact('video'));
    }

    public function tiktokUpdate(Request $request, TiktokSocialVideo $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.tiktok.index')->with('success', 'Tiktok video updated successfully.');
    }

    public function tiktokDestroy(TiktokSocialVideo $video) {
        $video->delete();
        return redirect()->route('admin.videography.tiktok.index')->with('success', 'Tiktok video deleted successfully.');
    }

    // === 9. LIVESHOWS & STREAMING ===
    public function liveshowsIndex() {
        $videos = LiveShowStream::all();
        return view('admin.videography.liveshows.index', compact('videos'));
    }

    public function liveshowsCreate() {
        return view('admin.videography.liveshows.create');
    }

    public function liveshowsStore(Request $request) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        LiveShowStream::create($data);
        return redirect()->route('admin.videography.liveshows.index')->with('success', 'Live show added successfully.');
    }

    public function liveshowsEdit(LiveShowStream $video) {
        return view('admin.videography.liveshows.edit', compact('video'));
    }

    public function liveshowsUpdate(Request $request, LiveShowStream $video) {
        $this->validateRequest($request);
        $data = $this->handleImageUpload($request);
        $video->update($data);
        return redirect()->route('admin.videography.liveshows.index')->with('success', 'Live show updated successfully.');
    }

    public function liveshowsDestroy(LiveShowStream $video) {
        $video->delete();
        return redirect()->route('admin.videography.liveshows.index')->with('success', 'Live show deleted successfully.');
    }

    // === COMMON UTILITIES ===
    private function validateRequest($request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);
    }

    private function handleImageUpload($request) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('videography', 'public');
        }
        return $data;
    }
}

