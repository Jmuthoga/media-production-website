<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photography;
use App\Models\Certification;
use App\Models\InternshipAttachment;

class AdminAcademyController extends Controller
{
    // ======== PHOTOGRAPHY ========
    public function photographyIndex() {
        $items = Photography::all();
        return view('admin.academy.photography.index', compact('items'));
    }

    public function photographyCreate() {
        return view('admin.academy.photography.create');
    }

    public function photographyStore(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/photography', 'public');
        }

        Photography::create($data);
        return redirect()->route('admin.academy.photography.index')->with('success', 'Photography course created successfully.');
    }

    public function photographyEdit(Photography $photography) {
        return view('admin.academy.photography.edit', compact('photography'));
    }

    public function photographyUpdate(Request $request, Photography $photography) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/photography', 'public');
        }

        $photography->update($data);
        return redirect()->route('admin.academy.photography.index')->with('success', 'Photography course updated successfully.');
    }

    public function photographyDestroy(Photography $photography) {
        $photography->delete();
        return redirect()->route('admin.academy.photography.index')->with('success', 'Photography course deleted successfully.');
    }

    // ======== CERTIFICATIONS ========
    public function certificationIndex() {
        $items = Certification::all();
        return view('admin.academy.certifications.index', compact('items'));
    }

    public function certificationCreate() {
        return view('admin.academy.certifications.create');
    }

    public function certificationStore(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'provider' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/certifications', 'public');
        }

        Certification::create($data);
        return redirect()->route('admin.academy.certifications.index')->with('success', 'Certification created successfully.');
    }

    public function certificationEdit(Certification $certification) {
        return view('admin.academy.certifications.edit', compact('certification'));
    }

    public function certificationUpdate(Request $request, Certification $certification) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'provider' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/certifications', 'public');
        }

        $certification->update($data);
        return redirect()->route('admin.academy.certifications.index')->with('success', 'Certification updated successfully.');
    }

    public function certificationDestroy(Certification $certification) {
        $certification->delete();
        return redirect()->route('admin.academy.certifications.index')->with('success', 'Certification deleted successfully.');
    }

    // ======== INTERNSHIPS & ATTACHMENTS ========
    public function internshipIndex() {
        $items = InternshipAttachment::all();
        return view('admin.academy.internships.index', compact('items'));
    }

    public function internshipCreate() {
        return view('admin.academy.internships.create');
    }

    public function internshipStore(Request $request) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'organization' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/internships', 'public');
        }

        InternshipAttachment::create($data);
        return redirect()->route('admin.academy.internships.index')->with('success', 'Internship/Attachment created successfully.');
    }

    public function internshipEdit(InternshipAttachment $internship) {
        return view('admin.academy.internships.edit', compact('internship'));
    }

    public function internshipUpdate(Request $request, InternshipAttachment $internship) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'organization' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/internships', 'public');
        }

        $internship->update($data);
        return redirect()->route('admin.academy.internships.index')->with('success', 'Internship/Attachment updated successfully.');
    }

    public function internshipDestroy(InternshipAttachment $internship) {
        $internship->delete();
        return redirect()->route('admin.academy.internships.index')->with('success', 'Internship/Attachment deleted successfully.');
    }
}

