<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photography;
use App\Models\Certification;
use App\Models\InternshipAttachment;

class AdminAcademyController extends Controller
{
    /* ===========================
     *   PHOTOGRAPHY COURSES
     * =========================== */
    public function photographyIndex()
    {
        $items = Photography::all();
        return view('admin.academy.photography.index', compact('items'));
    }

    public function photographyCreate()
    {
        return view('admin.academy.photography.create');
    }

    public function photographyStore(Request $request)
    {
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

        return redirect()
            ->route('admin.academy.photography.index')
            ->with('success', 'Photography course created successfully.');
    }

    public function photographyEdit(Photography $photography)
    {
        return view('admin.academy.photography.edit', compact('photography'));
    }

    public function photographyUpdate(Request $request, Photography $photography)
    {
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

        return redirect()
            ->route('admin.academy.photography.index')
            ->with('success', 'Photography course updated successfully.');
    }

    public function photographyDestroy(Photography $photography)
    {
        $photography->delete();

        return redirect()
            ->route('admin.academy.photography.index')
            ->with('success', 'Photography course deleted successfully.');
    }

    /* ===========================
     *   CERTIFICATIONS
     * =========================== */
    public function certificationIndex()
    {
        $items = Certification::all();
        return view('admin.academy.certifications.index', compact('items'));
    }

    public function certificationCreate()
    {
        return view('admin.academy.certifications.create');
    }

    public function certificationStore(Request $request)
    {
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

        return redirect()
            ->route('admin.academy.certifications.index')
            ->with('success', 'Certification created successfully.');
    }

    public function certificationEdit(Certification $certification)
    {
        return view('admin.academy.certifications.edit', compact('certification'));
    }

    public function certificationUpdate(Request $request, Certification $certification)
    {
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

        return redirect()
            ->route('admin.academy.certifications.index')
            ->with('success', 'Certification updated successfully.');
    }

    public function certificationDestroy(Certification $certification)
    {
        $certification->delete();

        return redirect()
            ->route('admin.academy.certifications.index')
            ->with('success', 'Certification deleted successfully.');
    }

    /* ===========================
     *   INTERNSHIPS & ATTACHMENTS
     * =========================== */
    public function internshipIndex()
    {
        $items = InternshipAttachment::all();
        return view('admin.academy.internships.index', compact('items'));
    }

    public function internshipCreate()
    {
        return view('admin.academy.internships.create');
    }

    public function internshipStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'organization' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'type' => 'nullable|string|max:50',
            'apply_link' => 'nullable|url|max:1000',
            'icon' => 'nullable|string|max:255',
            'stat_value' => 'nullable|integer',
            'meta' => 'nullable|json',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/internships', 'public');
        }

        $data['type'] = $data['type'] ?? 'role';

        InternshipAttachment::create($data);

        return redirect()
            ->route('internships.index')
            ->with('success', 'Internship or attachment created successfully.');
    }

    public function internshipEdit(InternshipAttachment $internship)
    {
        return view('admin.academy.internships.edit', compact('internship'));
    }

    public function internshipUpdate(Request $request, InternshipAttachment $internship)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'organization' => 'nullable|string|max:255',
            'duration' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'type' => 'nullable|string|max:50',
            'apply_link' => 'nullable|url|max:1000',
            'icon' => 'nullable|string|max:255',
            'stat_value' => 'nullable|integer',
            'meta' => 'nullable|json',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/internships', 'public');
        }

        $data['type'] = $data['type'] ?? $internship->type;

        $internship->update($data);

        return redirect()
            ->route('internships.index')
            ->with('success', 'Internship or attachment updated successfully.');
    }

    public function internshipDestroy(InternshipAttachment $internship)
    {
        $internship->delete();

        return redirect()
            ->route('internships.index')
            ->with('success', 'Internship or attachment deleted successfully.');
    }

    // ======== ROLE CREATE/STORE ========
    public function internshipRoleCreate()
    {
        return view('admin.academy.internships.role_create');
    }

    public function internshipRoleStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'apply_link' => 'nullable|url',
            'icon' => 'nullable|string',
            'meta' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/internships', 'public');
        }

        $data['type'] = 'role';
        $meta = $data['meta'] ?? [];
        $meta['status'] = $meta['status'] ?? 'open';
        $data['meta'] = json_encode($meta);

        InternshipAttachment::create($data);

        return redirect()->route('internships.index')->with('success', 'Role created.');
    }

    public function internshipRoleEdit(InternshipAttachment $internship)
    {
        // Only allow editing items of type 'role'
        if ($internship->type !== 'role') {
            return redirect()->route('internships.index')->with('error', 'Invalid item type.');
        }

        return view('admin.academy.internships.role_edit', compact('internship'));
    }

    public function internshipRoleUpdate(Request $request, InternshipAttachment $internship)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|max:2048',
            'apply_link' => 'nullable|url',
            'icon' => 'nullable|string',
            'meta' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('academy/internships', 'public');
        }

        $data['type'] = 'role'; // ensure type
        $meta = $data['meta'] ?? [];
        $data['meta'] = json_encode($meta);

        $internship->update($data);

        return redirect()->route('internships.index')->with('success', 'Role updated successfully.');
    }

    /* ===========================
    *   HERO SECTION (INTERNSHIP PAGE)
    * =========================== */

    // Show form to create or edit hero
    public function internshipHeroForm()
    {
        $hero = InternshipAttachment::where('type', 'hero')->first();
        return view('admin.academy.internships.hero_form', compact('hero'));
    }

    // Store or update hero
    public function internshipHeroSave(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'hero_bg' => 'nullable|image|max:4096',
            'hero_right' => 'nullable|image|max:4096',
        ]);

        // Either get existing hero or create new
        $hero = InternshipAttachment::firstOrNew(['type' => 'hero']);
        $meta = $hero->meta ? json_decode($hero->meta, true) : [];

        if ($request->hasFile('hero_bg')) {
            $meta['hero_image'] = $request->file('hero_bg')->store('academy/internships', 'public');
        }

        if ($request->hasFile('hero_right')) {
            $meta['hero_right_image'] = $request->file('hero_right')->store('academy/internships', 'public');
        }

        $hero->fill([
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => 'hero',
            'meta' => json_encode($meta),
        ])->save();

        return redirect()
            ->route('internships.index')
            ->with('success', 'Hero section saved successfully.');
    }

   /* ===========================
 *   PAGE INFORMATION (INTERNSHIP PAGE)
 * =========================== */

// Show form to edit/create internship page details
public function internshipPageInfoForm()
{
    // Always fetch the single page_info record
    $pageInfo = InternshipAttachment::where('type', 'page_info')->first();
    return view('admin.academy.internships.page_info_form', compact('pageInfo'));
}

// Store/update page info
public function internshipPageInfoSave(Request $request)
{
    $data = $request->validate([
        'about1' => 'required|string',
        'about2' => 'required|string',
        'video_id' => 'nullable|string|max:255',
        'stats' => 'nullable|array',
        'stats.*.title' => 'required|string|max:255',
        'stats.*.value' => 'required|integer|min:0',
    ]);

    // Fetch the existing page_info or create a new one
    $page = InternshipAttachment::where('type', 'page_info')->first();

    if (!$page) {
        $page = new InternshipAttachment();
        $page->type = 'page_info';
    }

    $page->meta = json_encode([
        'about_paragraph1' => $data['about1'],
        'about_paragraph2' => $data['about2'],
        'video_id' => $data['video_id'] ?? null,
        'stats' => $data['stats'] ?? [],
    ]);

    $page->save();

    return redirect()->route('internships.index')->with('success', 'Internship page info saved successfully.');
}

    /* ===========================
     *   TOGGLE INTERNSHIP STATUS
     * =========================== */
    public function internshipToggleStatus(InternshipAttachment $internship)
    {
        $meta = $internship->meta ? json_decode($internship->meta, true) : [];

        $current = strtolower($meta['status'] ?? 'open');
        $meta['status'] = $current === 'open' ? 'closed' : 'open';

        $internship->meta = json_encode($meta);
        $internship->save();

        return back()->with('success', 'Internship status updated successfully.');
    }
}

