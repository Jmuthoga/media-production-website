<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Quotation;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    // ======== MESSAGES ========
    public function messagesIndex()
    {
        $messages = Message::latest()->get();
        return view('admin.contacts.messages.index', compact('messages'));
    }

    public function messagesShow($id)
    {
        $message = Message::findOrFail($id);
        return view('admin.contacts.messages.show', compact('message'));
    }

    public function messagesDestroy($id)
    {
        Message::findOrFail($id)->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }

    // ======== QUOTATIONS ========
    public function quotationsIndex()
    {
        $quotations = Quotation::latest()->get();
        return view('admin.contacts.quotations.index', compact('quotations'));
    }

    public function quotationsShow($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('admin.contacts.quotations.show', compact('quotation'));
    }

    public function quotationsDestroy($id)
    {
        Quotation::findOrFail($id)->delete();
        return redirect()->route('admin.quotations.index')->with('success', 'Quotation deleted successfully.');
    }

    // Optionally for manual admin entry
    public function quotationsCreate()
    {
        return view('admin.contacts.quotations.create');
    }

    public function quotationsStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'service_type' => 'required',
        ]);

        Quotation::create($request->all());
        return redirect()->route('admin.quotations.index')->with('success', 'Quotation added successfully.');
    }

    public function quotationsEdit($id)
    {
        $quotation = Quotation::findOrFail($id);
        return view('admin.contacts.quotations.edit', compact('quotation'));
    }

    public function quotationsUpdate(Request $request, $id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->update($request->all());
        return redirect()->route('admin.quotations.index')->with('success', 'Quotation updated successfully.');
    }
}

