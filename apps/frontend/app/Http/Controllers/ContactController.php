<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:1000',
            'travel_date' => 'nullable|date|after:today',
            'duration' => 'nullable|integer|min:1|max:90',
            'destination' => 'nullable|string|max:100',
        ]);

        // Send email notification
        Mail::to(config('mail.admin_email', 'info@holidayzmanager.com'))
            ->send(new ContactFormSubmission($validated));

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
