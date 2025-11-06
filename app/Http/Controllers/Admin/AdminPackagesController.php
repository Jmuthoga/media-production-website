<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LifestylePackage;
use App\Models\WeddingPackage;
use App\Models\FamilyPackage;
use App\Models\EventPackage;
use App\Models\CinematicPackage;
use App\Models\PremiumPackage;
use App\Models\CorporatePackage;

class AdminPackagesController extends Controller
{
    // ================= 1️⃣ Lifestyle & Portrait =================
    public function lifestyleIndex()
    {
        $packages = LifestylePackage::all();
        return view('admin.packages.lifestyle.index', compact('packages'));
    }

    public function lifestyleCreate()
    {
        return view('admin.packages.lifestyle.create');
    }

    public function lifestyleStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        LifestylePackage::create($data);
        return redirect()->route('admin.packages.lifestyle.index')->with('success','Package created.');
    }

    public function lifestyleEdit(LifestylePackage $package)
    {
        return view('admin.packages.lifestyle.edit', compact('package'));
    }

    public function lifestyleUpdate(Request $request, LifestylePackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.lifestyle.index')->with('success','Package updated.');
    }

    public function lifestyleDestroy(LifestylePackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.lifestyle.index')->with('success','Package deleted.');
    }

    // ================= 2️⃣ Wedding & Engagement =================
    public function weddingIndex()
    {
        $packages = WeddingPackage::all();
        return view('admin.packages.wedding.index', compact('packages'));
    }

    public function weddingCreate()
    {
        return view('admin.packages.wedding.create');
    }

    public function weddingStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        WeddingPackage::create($data);
        return redirect()->route('admin.packages.wedding.index')->with('success','Package created.');
    }

    public function weddingEdit(WeddingPackage $package)
    {
        return view('admin.packages.wedding.edit', compact('package'));
    }

    public function weddingUpdate(Request $request, WeddingPackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.wedding.index')->with('success','Package updated.');
    }

    public function weddingDestroy(WeddingPackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.wedding.index')->with('success','Package deleted.');
    }

    // ================= 3️⃣ Family & Group =================
    public function familyIndex()
    {
        $packages = FamilyPackage::all();
        return view('admin.packages.family.index', compact('packages'));
    }

    public function familyCreate()
    {
        return view('admin.packages.family.create');
    }

    public function familyStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        FamilyPackage::create($data);
        return redirect()->route('admin.packages.family.index')->with('success','Package created.');
    }

    public function familyEdit(FamilyPackage $package)
    {
        return view('admin.packages.family.edit', compact('package'));
    }

    public function familyUpdate(Request $request, FamilyPackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.family.index')->with('success','Package updated.');
    }

    public function familyDestroy(FamilyPackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.family.index')->with('success','Package deleted.');
    }

    // ================= 4️⃣ Event & Ceremony =================
    public function eventpcgIndex()
    {
        $packages = EventPackage::all();
        return view('admin.packages.event.index', compact('packages'));
    }

    public function eventpcgCreate()
    {
        return view('admin.packages.event.create');
    }

    public function eventpcgStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        EventPackage::create($data);
        return redirect()->route('admin.packages.event.index')->with('success','Package created.');
    }

    public function eventpcgEdit(EventPackage $package)
    {
        return view('admin.packages.event.edit', compact('package'));
    }

    public function eventpcgUpdate(Request $request, EventPackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.event.index')->with('success','Package updated.');
    }

    public function eventpcgDestroy(EventPackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.event.index')->with('success','Package deleted.');
    }

    // ================= 5️⃣ Cinematic Productions =================
    public function cinematicIndex()
    {
        $packages = CinematicPackage::all();
        return view('admin.packages.cinematic.index', compact('packages'));
    }

    public function cinematicCreate()
    {
        return view('admin.packages.cinematic.create');
    }

    public function cinematicStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        CinematicPackage::create($data);
        return redirect()->route('admin.packages.cinematic.index')->with('success','Package created.');
    }

    public function cinematicEdit(CinematicPackage $package)
    {
        return view('admin.packages.cinematic.edit', compact('package'));
    }

    public function cinematicUpdate(Request $request, CinematicPackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.cinematic.index')->with('success','Package updated.');
    }

    public function cinematicDestroy(CinematicPackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.cinematic.index')->with('success','Package deleted.');
    }

    // ================= 6️⃣ Premium All-Inclusive =================
    public function premiumIndex()
    {
        $packages = PremiumPackage::all();
        return view('admin.packages.premium.index', compact('packages'));
    }

    public function premiumCreate()
    {
        return view('admin.packages.premium.create');
    }

    public function premiumStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        PremiumPackage::create($data);
        return redirect()->route('admin.packages.premium.index')->with('success','Package created.');
    }

    public function premiumEdit(PremiumPackage $package)
    {
        return view('admin.packages.premium.edit', compact('package'));
    }

    public function premiumUpdate(Request $request, PremiumPackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.premium.index')->with('success','Package updated.');
    }

    public function premiumDestroy(PremiumPackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.premium.index')->with('success','Package deleted.');
    }

    // ================= 7️⃣ Corporate & Brand =================
    public function corporateIndex()
    {
        $packages = CorporatePackage::all();
        return view('admin.packages.corporate.index', compact('packages'));
    }

    public function corporateCreate()
    {
        return view('admin.packages.corporate.create');
    }

    public function corporateStore(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        CorporatePackage::create($data);
        return redirect()->route('admin.packages.corporate.index')->with('success','Package created.');
    }

    public function corporateEdit(CorporatePackage $package)
    {
        return view('admin.packages.corporate.edit', compact('package'));
    }

    public function corporateUpdate(Request $request, CorporatePackage $package)
    {
        $data = $request->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|numeric',
            'description'=>'required',
            'image'=>'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages','public');
        }

        $package->update($data);
        return redirect()->route('admin.packages.corporate.index')->with('success','Package updated.');
    }

    public function corporateDestroy(CorporatePackage $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.corporate.index')->with('success','Package deleted.');
    }
}


