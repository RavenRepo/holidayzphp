<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PackageEnquiry;
use Illuminate\Support\Facades\Mail;

class PackageController extends Controller
{
    /**
     * Display a listing of travel packages.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // For now, use mock data. Replace with Eloquent query later.
        $packages = [
            [
                'id' => 1,
                'title' => 'Goa Beach Escape',
                'description' => 'Experience the sun, sand, and sea in beautiful Goa. Includes guided tours, water sports, and more.',
                'price' => 19999,
                'duration_days' => 5,
                'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'id' => 2,
                'title' => 'Himalayan Adventure',
                'description' => 'Trek the majestic Himalayas with expert guides. Includes camping, meals, and local experiences.',
                'price' => 24999,
                'duration_days' => 7,
                'image' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=600&q=80',
            ],
            [
                'id' => 3,
                'title' => 'Kerala Backwaters',
                'description' => 'Cruise the tranquil backwaters of Kerala on a luxury houseboat. Includes meals and cultural shows.',
                'price' => 17999,
                'duration_days' => 4,
                'image' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=600&q=80',
            ],
        ];

        return view('packages.index', compact('packages'));
    }

    /**
     * Handle package enquiry form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitEnquiry(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'travel_date' => 'required|date|after:today',
            'travellers' => 'required|string',
            'message' => 'nullable|string|max:1000',
            'package' => 'required|string|max:255',
        ]);

        // Send email notification
        Mail::to(config('mail.admin_email'))->send(new PackageEnquiry($validated));

        return back()->with('success', 'Thank you for your enquiry. Our team will contact you shortly.');
    }
}