<?php

namespace App\Http\Controllers;

use App\Mail\PackageEnquiry;
use App\Services\UnsplashService;
use Illuminate\Http\Request;
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
     * Display the specified package details and itinerary with Unsplash images.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function show($slug, UnsplashService $unsplash)
    {
        // Mock package data - replace with database query later
        $package = [
            'name' => 'Goa Beach Escape',
            'description' => 'Experience the sun, sand, and sea in beautiful Goa. A perfect blend of relaxation and adventure.',
            'images' => ['goa-1.jpg', 'goa-2.jpg', 'goa-3.jpg', 'goa-4.jpg', 'goa-5.jpg'],
            'duration' => '3 Days 2 Nights',
            'price' => 19999,
            'highlights' => [
                'Explore pristine beaches',
                'Water sports activities',
                'Cultural heritage tours',
                'Luxury beachfront accommodation',
                'Local cuisine experiences',
            ],
            'itinerary' => [
                [
                    'title' => 'Arrival & Beach Exploration',
                    'description' => 'Welcome to Goa! Check-in to your beachfront resort and spend the evening exploring the beach.',
                    'activities' => ['Airport pickup', 'Resort check-in', 'Beach visit', 'Welcome dinner'],
                    'meals' => ['breakfast' => false, 'lunch' => false, 'dinner' => true],
                ],
                [
                    'title' => 'Water Sports & Heritage',
                    'description' => 'Full day of adventure and culture.',
                    'activities' => ['Water sports', 'Old Goa churches tour', 'Spice plantation visit'],
                    'meals' => ['breakfast' => true, 'lunch' => true, 'dinner' => true],
                ],
                [
                    'title' => 'Leisure & Departure',
                    'description' => 'Free morning for relaxation followed by departure.',
                    'activities' => ['Beach time', 'Souvenir shopping', 'Airport transfer'],
                    'meals' => ['breakfast' => true, 'lunch' => false, 'dinner' => false],
                ],
            ],
            'inclusions' => [
                'Luxury resort accommodation',
                'Daily breakfast',
                'Airport transfers',
                'Sightseeing tours',
                'Water sports activities',
                'Professional guide',
                'All applicable taxes',
            ],
            'exclusions' => [
                'Flights or train tickets',
                'Personal expenses',
                'Optional activities',
                'Travel insurance',
                'Additional meals',
            ],
            'reviews' => [
                [
                    'name' => 'Rahul Sharma',
                    'rating' => 5,
                    'comment' => 'Amazing experience! The resort was beautiful and the activities were well organized.',
                    'date' => '2 months ago',
                    'trip_date' => 'March 2025',
                    'travel_type' => 'Family',
                ],
                [
                    'name' => 'Priya Patel',
                    'rating' => 4,
                    'comment' => 'Great package with good mix of activities. The guide was very knowledgeable.',
                    'date' => '1 month ago',
                    'trip_date' => 'April 2025',
                    'travel_type' => 'Couple',
                ],
            ],
            'faqs' => [
                [
                    'question' => 'What is the best time to visit?',
                    'answer' => 'October to March is the best time to visit Goa when the weather is pleasant and perfect for beach activities.',
                ],
                [
                    'question' => 'Are flights included in the package?',
                    'answer' => 'No, flights are not included in the package price. However, we can assist you in booking flights at the best available rates.',
                ],
                [
                    'question' => 'Can the itinerary be customized?',
                    'answer' => 'Yes, we can customize the itinerary based on your preferences. Please mention your requirements in the enquiry form.',
                ],
            ],
            'related_posts' => [
                [
                    'title' => 'Top 10 Beaches in Goa',
                    'excerpt' => 'Discover the most beautiful and serene beaches in Goa...',
                    'image' => 'blog-1.jpg',
                    'date' => '2025-04-15',
                ],
                [
                    'title' => 'Goa Food Guide',
                    'excerpt' => 'A culinary journey through Goan cuisine...',
                    'image' => 'blog-2.jpg',
                    'date' => '2025-04-10',
                ],
            ],
        ];

        $itineraryImages = $unsplash->searchImages($slug.' travel', 5);

        return view('package-details', [
            'package' => $package,
            'itineraryImages' => $itineraryImages,
        ]);
    }

    /**
     * Handle package enquiry form submission.
     *
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
