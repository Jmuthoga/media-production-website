<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $r)
    {
        $r->validate(['name' => 'required', 'email' => 'nullable|email', 'phone' => 'nullable', 'message' => 'required', 'service_item_id' => 'nullable|exists:service_items,id']);
        $inq = Inquiry::create($r->only('name', 'email', 'phone', 'message', 'service_item_id'));

        // send email to site admin (configure MAIL in .env)
        try {
            \Mail::raw("New inquiry from {$inq->name}\nPhone: {$inq->phone}\nEmail: {$inq->email}\nMessage:\n{$inq->message}", function ($m) {
                $m->to(config('mail.from.address'))->subject('New inquiry - Unimax');
            });
        } catch (\Exception $e) {
            // ignore or log
        }

        return back()->with('success', 'Thank you. We received your message.');
    }
}
