<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\ContactInformation;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    // ===== HERO SECTION =====
    public function heroIndex()
    {
        $heroes = HeroSection::latest()->get();
        return view('admin.settings.hero.index', compact('heroes'));
    }

    public function heroCreate()
    {
        return view('admin.settings.hero.create');
    }

    public function heroStore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable|string',
            'background_image' => 'nullable|string',
        ]);
        HeroSection::create($request->all());
        return redirect()->route('admin.settings.hero.index')->with('success', 'Hero section added.');
    }

    public function heroEdit($id)
    {
        $hero = HeroSection::findOrFail($id);
        return view('admin.settings.hero.edit', compact('hero'));
    }

    public function heroUpdate(Request $request, $id)
    {
        $hero = HeroSection::findOrFail($id);
        $hero->update($request->all());
        return redirect()->route('admin.settings.hero.index')->with('success', 'Hero section updated.');
    }

    public function heroDestroy($id)
    {
        HeroSection::findOrFail($id)->delete();
        return redirect()->route('admin.settings.hero.index')->with('success', 'Hero section deleted.');
    }

    // ===== CONTACT INFORMATION =====
    public function contactIndex()
    {
        $contacts = ContactInformation::latest()->get();
        return view('admin.settings.contact.index', compact('contacts'));
    }

    public function contactCreate()
    {
        return view('admin.settings.contact.create');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'address' => 'nullable|string',
        ]);
        ContactInformation::create($request->all());
        return redirect()->route('admin.settings.contact.index')->with('success', 'Contact info added.');
    }

    public function contactEdit($id)
    {
        $contact = ContactInformation::findOrFail($id);
        return view('admin.settings.contact.edit', compact('contact'));
    }

    public function contactUpdate(Request $request, $id)
    {
        $contact = ContactInformation::findOrFail($id);
        $contact->update($request->all());
        return redirect()->route('admin.settings.contact.index')->with('success', 'Contact info updated.');
    }

    public function contactDestroy($id)
    {
        ContactInformation::findOrFail($id)->delete();
        return redirect()->route('admin.settings.contact.index')->with('success', 'Contact info deleted.');
    }

    // ===== SOCIAL MEDIA =====
    public function socialIndex()
    {
        $socials = SocialMedia::latest()->get();
        return view('admin.settings.social.index', compact('socials'));
    }

    public function socialCreate()
    {
        return view('admin.settings.social.create');
    }

    public function socialStore(Request $request)
    {
        $request->validate([
            'platform' => 'required|string',
            'link' => 'required|url',
        ]);
        SocialMedia::create($request->all());
        return redirect()->route('admin.settings.social.index')->with('success', 'Social media added.');
    }

    public function socialEdit($id)
    {
        $social = SocialMedia::findOrFail($id);
        return view('admin.settings.social.edit', compact('social'));
    }

    public function socialUpdate(Request $request, $id)
    {
        $social = SocialMedia::findOrFail($id);
        $social->update($request->all());
        return redirect()->route('admin.settings.social.index')->with('success', 'Social media updated.');
    }

    public function socialDestroy($id)
    {
        SocialMedia::findOrFail($id)->delete();
        return redirect()->route('admin.settings.social.index')->with('success', 'Social media deleted.');
    }

    // ===== USER MANAGEMENT =====
    public function userIndex()
    {
        $users = User::latest()->get();
        return view('admin.settings.users.index', compact('users'));
    }

    public function userCreate()
    {
        return view('admin.settings.users.create');
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.settings.users.index')->with('success', 'User added.');
    }

    public function userEdit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.settings.users.edit', compact('user'));
    }

    public function userUpdate(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->only('name', 'email');

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return redirect()->route('admin.settings.users.index')->with('success', 'User updated.');
    }

    public function userDestroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->route('admin.settings.users.index')->with('success', 'User deleted.');
    }
}
