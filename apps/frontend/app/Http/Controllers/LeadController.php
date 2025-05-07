<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Handles lead capture form submissions.
 */
class LeadController extends Controller
{
    /**
     * Handle the lead form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'country_code' => 'required|string',
            'phone' => 'required|string',
            'travel_date' => 'nullable|date',
            'traveller_count' => 'required|integer|min:1',
            'message' => 'nullable|string',
        ]);

        // TODO: Save to database or send email/notification

        return back()->with('success', 'Thank you! Our expert will contact you soon.');
    }
} 