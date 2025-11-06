<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrintingBranding;
use App\Models\RadioHostingAdvertising;
use App\Models\HireCrew;
use App\Models\EventPlanningSupport;
use App\Models\PhotoEditingRetouching;
use App\Models\DronePhotographyVideography;

class AdminOthersController extends Controller
{
    // ===================== PRINTING & BRANDING =====================
    public function printingIndex()
    {
        $items = PrintingBranding::all();
        return view('admin.others.printing.index', compact('items'));
    }

    public function printingCreate()
    {
        return view('admin.others.printing.create');
    }

    public function printingStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('printing', 'public');
        }

        PrintingBranding::create($data);
        return redirect()->route('admin.others.printing.index')->with('success', 'Printing & Branding service added successfully.');
    }

    public function printingEdit(PrintingBranding $printing)
    {
        return view('admin.others.printing.edit', compact('printing'));
    }

    public function printingUpdate(Request $request, PrintingBranding $printing)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('printing', 'public');
        }

        $printing->update($data);
        return redirect()->route('admin.others.printing.index')->with('success', 'Printing & Branding updated successfully.');
    }

    public function printingDestroy(PrintingBranding $printing)
    {
        $printing->delete();
        return redirect()->route('admin.others.printing.index')->with('success', 'Printing & Branding deleted successfully.');
    }

    // ===================== RADIO HOSTING & ADVERTISING =====================
    public function radioIndex()
    {
        $items = RadioHostingAdvertising::all();
        return view('admin.others.radio.index', compact('items'));
    }

    public function radioCreate()
    {
        return view('admin.others.radio.create');
    }

    public function radioStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('radio', 'public');
        }

        RadioHostingAdvertising::create($data);
        return redirect()->route('admin.others.radio.index')->with('success', 'Radio Hosting & Advertising added successfully.');
    }

    public function radioEdit(RadioHostingAdvertising $radio)
    {
        return view('admin.others.radio.edit', compact('radio'));
    }

    public function radioUpdate(Request $request, RadioHostingAdvertising $radio)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('radio', 'public');
        }

        $radio->update($data);
        return redirect()->route('admin.others.radio.index')->with('success', 'Radio Hosting & Advertising updated successfully.');
    }

    public function radioDestroy(RadioHostingAdvertising $radio)
    {
        $radio->delete();
        return redirect()->route('admin.others.radio.index')->with('success', 'Radio Hosting & Advertising deleted successfully.');
    }

    // ===================== HIRE PROFESSIONAL CREW =====================
    public function crewIndex()
    {
        $items = HireCrew::all();
        return view('admin.others.crew.index', compact('items'));
    }

    public function crewCreate()
    {
        return view('admin.others.crew.create');
    }

    public function crewStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('crew', 'public');
        }

        HireCrew::create($data);
        return redirect()->route('admin.others.crew.index')->with('success', 'Crew service added successfully.');
    }

    public function crewEdit(HireCrew $crew)
    {
        return view('admin.others.crew.edit', compact('crew'));
    }

    public function crewUpdate(Request $request, HireCrew $crew)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('crew', 'public');
        }

        $crew->update($data);
        return redirect()->route('admin.others.crew.index')->with('success', 'Crew service updated successfully.');
    }

    public function crewDestroy(HireCrew $crew)
    {
        $crew->delete();
        return redirect()->route('admin.others.crew.index')->with('success', 'Crew service deleted successfully.');
    }

    // ===================== EVENT PLANNING SUPPORT =====================
    public function eventIndex()
    {
        $items = EventPlanningSupport::all();
        return view('admin.others.event.index', compact('items'));
    }

    public function eventCreate()
    {
        return view('admin.others.event.create');
    }

    public function eventStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('event', 'public');
        }

        EventPlanningSupport::create($data);
        return redirect()->route('admin.others.event.index')->with('success', 'Event Planning Support added successfully.');
    }

    public function eventEdit(EventPlanningSupport $event)
    {
        return view('admin.others.event.edit', compact('event'));
    }

    public function eventUpdate(Request $request, EventPlanningSupport $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('event', 'public');
        }

        $event->update($data);
        return redirect()->route('admin.others.event.index')->with('success', 'Event Planning Support updated successfully.');
    }

    public function eventDestroy(EventPlanningSupport $event)
    {
        $event->delete();
        return redirect()->route('admin.others.event.index')->with('success', 'Event Planning Support deleted successfully.');
    }

    // ===================== PHOTO EDITING & RETOUCHING =====================
    public function photoIndex()
    {
        $items = PhotoEditingRetouching::all();
        return view('admin.others.photo.index', compact('items'));
    }

    public function photoCreate()
    {
        return view('admin.others.photo.create');
    }

    public function photoStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('photo', 'public');
        }

        PhotoEditingRetouching::create($data);
        return redirect()->route('admin.others.photo.index')->with('success', 'Photo Editing & Retouching added successfully.');
    }

    public function photoEdit(PhotoEditingRetouching $photo)
    {
        return view('admin.others.photo.edit', compact('photo'));
    }

    public function photoUpdate(Request $request, PhotoEditingRetouching $photo)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('photo', 'public');
        }

        $photo->update($data);
        return redirect()->route('admin.others.photo.index')->with('success', 'Photo Editing & Retouching updated successfully.');
    }

    public function photoDestroy(PhotoEditingRetouching $photo)
    {
        $photo->delete();
        return redirect()->route('admin.others.photo.index')->with('success', 'Photo Editing & Retouching deleted successfully.');
    }

    // ===================== DRONE PHOTOGRAPHY & VIDEOGRAPHY =====================
    public function droneIndex()
    {
        $items = DronePhotographyVideography::all();
        return view('admin.others.drone.index', compact('items'));
    }

    public function droneCreate()
    {
        return view('admin.others.drone.create');
    }

    public function droneStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('drone', 'public');
        }

        DronePhotographyVideography::create($data);
        return redirect()->route('admin.others.drone.index')->with('success', 'Drone Photography & Videography added successfully.');
    }

    public function droneEdit(DronePhotographyVideography $drone)
    {
        return view('admin.others.drone.edit', compact('drone'));
    }

    public function droneUpdate(Request $request, DronePhotographyVideography $drone)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('drone', 'public');
        }

        $drone->update($data);
        return redirect()->route('admin.others.drone.index')->with('success', 'Drone Photography & Videography updated successfully.');
    }

    public function droneDestroy(DronePhotographyVideography $drone)
    {
        $drone->delete();
        return redirect()->route('admin.others.drone.index')->with('success', 'Drone Photography & Videography deleted successfully.');
    }
}

