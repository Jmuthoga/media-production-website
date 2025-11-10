<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InternshipAttachment;

class InternshipAttachmentSeeder extends Seeder
{
    public function run()
    {
        // hero / page entry (type = page)
        InternshipAttachment::create([
            'title' => 'Join Our Internship & Attachment Programs',
            'description' => 'Hands-on training, mentorship, and real project experience to help you build a career in photography & media production.',
            'image' => null,
            'type' => 'page',
            'meta' => json_encode(['hero_image' => null, 'about_paragraph1' => 'Our Internship program is 3 months full-time, while the Attachment program is 1 month. Participants gain real project experience, mentorship, and professional skill development.', 'about_paragraph2' => 'Access professional equipment, build a portfolio, and network with industry experts to kickstart your creative career.']),
        ]);

        // stats entries
        InternshipAttachment::create(['title' => 'Successful Interns', 'stat_value' => 200, 'type' => 'stat']);
        InternshipAttachment::create(['title' => 'Mentors & Staff', 'stat_value' => 50, 'type' => 'stat']);
        InternshipAttachment::create(['title' => 'Projects Completed', 'stat_value' => 150, 'type' => 'stat']);
        InternshipAttachment::create(['title' => 'Years Running', 'stat_value' => 5, 'type' => 'stat']);

        // roles examples
        InternshipAttachment::create([
            'title' => 'Photographer Intern',
            'description' => 'Work on real photoshoots, learn studio & outdoor photography, and build a professional portfolio.',
            'image' => null,
            'type' => 'role',
            'apply_link' => '#',
            'icon' => 'bi bi-camera-fill',
            'meta' => json_encode(['status' => 'open']),
        ]);

        InternshipAttachment::create([
            'title' => 'Videographer Intern',
            'description' => 'Capture, edit, and produce cinematic videos while learning modern storytelling techniques.',
            'image' => null,
            'type' => 'role',
            'apply_link' => '#',
            'icon' => 'bi bi-camera-reels',
            'meta' => json_encode(['status' => 'open']),
        ]);

        InternshipAttachment::create([
            'title' => 'Photo Editor Intern',
            'description' => 'Edit and retouch client photos for professional projects, building practical skills.',
            'image' => null,
            'type' => 'role',
            'apply_link' => null,
            'icon' => 'bi bi-image',
            'meta' => json_encode(['status' => 'closed']),
        ]);

        // offers & requirements (type = offer / requirement)
        InternshipAttachment::create(['title' => 'Professional Experience', 'description' => 'Hands-on experience with cameras, lighting, and video equipment on real projects.', 'type' => 'offer', 'icon' => 'bi bi-camera-fill']);
        InternshipAttachment::create(['title' => 'Mentorship & Guidance', 'description' => 'Learn from industry professionals and improve your skills on live projects.', 'type' => 'offer', 'icon' => 'bi bi-person-badge-fill']);

        InternshipAttachment::create(['title' => 'Passionate about photography, videography, or media production', 'type' => 'requirement', 'icon' => 'bi bi-lightning-fill']);
        InternshipAttachment::create(['title' => 'Basic knowledge of cameras & editing software', 'type' => 'requirement', 'icon' => 'bi bi-tools']);
    }
}
