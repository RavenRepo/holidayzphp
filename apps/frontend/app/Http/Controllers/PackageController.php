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
        // Get destination-specific packages based on slug
        $destinationPackages = $this->getPackagesByDestination($slug, $unsplash);
        
        // Fetch gallery images for the destination
        $galleryImages = $unsplash->searchImages($slug . ' travel landscape', 5);
        
        // Get related destinations for the slider
        $relatedDestinations = $this->getRelatedDestinations($slug, $unsplash);
        
        // Special case for Malaysia
        if (strtolower($slug) === 'malaysia') {
            $package = $this->getMalaysiaPackage();
            $itineraryImages = $unsplash->searchImages('malaysia kuala lumpur travel', 5);
            
            return view('package-details', [
                'package' => $package,
                'galleryImages' => $galleryImages,
                'itineraryImages' => $itineraryImages,
                'destinationPackages' => $destinationPackages,
                'relatedDestinations' => $relatedDestinations,
            ]);
        }
        
        // Mock package data - replace with database query later
        $package = [
            'name' => ucfirst($slug),
            'description' => 'Experience the beauty and culture of ' . ucfirst($slug) . '. A perfect blend of relaxation and adventure.',
            'duration' => '3 Days 2 Nights',
            'price' => 19999,
            'highlights' => [
                'Explore top attractions',
                'Authentic local experiences',
                'Cultural heritage tours',
                'Luxury accommodation',
                'Local cuisine experiences',
            ],
            'itinerary' => [
                [
                    'title' => 'Arrival & Exploration',
                    'description' => 'Welcome to ' . ucfirst($slug) . '! Check-in to your hotel and spend the evening exploring the surroundings.',
                    'activities' => ['Airport pickup', 'Hotel check-in', 'Local visit', 'Welcome dinner'],
                    'meals' => ['breakfast' => false, 'lunch' => false, 'dinner' => true],
                ],
                [
                    'title' => 'Adventure & Heritage',
                    'description' => 'Full day of adventure and culture.',
                    'activities' => ['Local activities', 'Heritage site tour', 'Cultural experience'],
                    'meals' => ['breakfast' => true, 'lunch' => true, 'dinner' => true],
                ],
                [
                    'title' => 'Leisure & Departure',
                    'description' => 'Free morning for relaxation followed by departure.',
                    'activities' => ['Free time', 'Souvenir shopping', 'Airport transfer'],
                    'meals' => ['breakfast' => true, 'lunch' => false, 'dinner' => false],
                ],
            ],
            'inclusions' => [
                'Luxury accommodation',
                'Daily breakfast',
                'Airport transfers',
                'Sightseeing tours',
                'Local activities',
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
                    'comment' => 'Amazing experience! The hotel was beautiful and the activities were well organized.',
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
                    'answer' => 'October to March is the best time to visit ' . ucfirst($slug) . ' when the weather is pleasant.',
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
                    'title' => 'Top 10 Places to Visit in ' . ucfirst($slug),
                    'excerpt' => 'Discover the most beautiful and serene places in ' . ucfirst($slug) . '...',
                    'image' => 'blog-1.jpg',
                    'date' => '2025-04-15',
                ],
                [
                    'title' => ucfirst($slug) . ' Food Guide',
                    'excerpt' => 'A culinary journey through ' . ucfirst($slug) . ' cuisine...',
                    'image' => 'blog-2.jpg',
                    'date' => '2025-04-10',
                ],
            ],
        ];

        $itineraryImages = $unsplash->searchImages($slug.' travel', 5);

        return view('package-details', [
            'package' => $package,
            'galleryImages' => $galleryImages,
            'itineraryImages' => $itineraryImages,
            'destinationPackages' => $destinationPackages,
            'relatedDestinations' => $relatedDestinations,
        ]);
    }

    /**
     * Get packages specific to a destination
     * 
     * @param string $destination
     * @param UnsplashService $unsplash
     * @return array
     */
    private function getPackagesByDestination($destination, UnsplashService $unsplash): array
    {
        // Normalize destination name
        $destinationName = ucfirst(strtolower($destination));
        
        // Get destination image
        $destinationImages = $unsplash->searchImages($destination . ' travel', 3);
        
        // Define packages based on destination
        $packages = [];
        
        // Package 1: Basic package
        $packages[] = [
            'title' => $destinationName . ' Essential Tour',
            'description' => 'Perfect introduction to ' . $destinationName . ' with all must-see attractions and experiences',
            'price' => rand(15000, 25000),
            'duration' => rand(3, 5) . ' Days / ' . rand(2, 4) . ' Nights',
            'features' => ['Sightseeing', 'Hotel Stay', 'Breakfast'],
            'image' => $destinationImages[0] ?? 'https://via.placeholder.com/600x400?text=' . urlencode($destinationName)
        ];
        
        // Package 2: Premium package
        $packages[] = [
            'title' => 'Premium ' . $destinationName . ' Experience',
            'description' => 'Luxurious stay with premium experiences, private tours and gourmet meals in ' . $destinationName,
            'price' => rand(30000, 50000),
            'duration' => rand(5, 7) . ' Days / ' . rand(4, 6) . ' Nights',
            'features' => ['Luxury Hotel', 'Private Guide', 'All Meals', 'Transfers'],
            'image' => $destinationImages[1] ?? 'https://via.placeholder.com/600x400?text=' . urlencode('Premium ' . $destinationName)
        ];
        
        // Package 3: Adventure package
        $packages[] = [
            'title' => $destinationName . ' Adventure Package',
            'description' => 'Action-packed itinerary with adventure activities and unique experiences in ' . $destinationName,
            'price' => rand(20000, 35000),
            'duration' => rand(4, 8) . ' Days / ' . rand(3, 7) . ' Nights',
            'features' => ['Adventure Activities', 'Accommodation', 'Expert Guides', 'Some Meals'],
            'image' => $destinationImages[2] ?? 'https://via.placeholder.com/600x400?text=' . urlencode($destinationName . ' Adventure')
        ];
        
        return $packages;
    }

    /**
     * Get related destinations for the slider
     * 
     * @param string $currentDestination
     * @param UnsplashService $unsplash
     * @return array
     */
    private function getRelatedDestinations($currentDestination, UnsplashService $unsplash): array
    {
        // List of popular destinations
        $popularDestinations = [
            'goa' => 'Beach paradise with vibrant nightlife and Portuguese heritage',
            'kerala' => 'Serene backwaters, lush landscapes and Ayurvedic wellness',
            'rajasthan' => 'Royal palaces, desert adventures and rich cultural heritage',
            'himachal' => 'Majestic mountains, adventure sports and scenic beauty',
            'ladakh' => 'High-altitude desert with stunning landscapes and monasteries',
            'andaman' => 'Pristine beaches, coral reefs and water sports paradise',
            'sikkim' => 'Himalayan gem with monasteries, trekking and natural beauty',
            'uttarakhand' => 'Spiritual centers, adventure activities and Himalayan views',
            'kashmir' => 'Paradise on earth with beautiful lakes and mountain landscapes',
            'meghalaya' => 'Living root bridges, caves and lush green landscapes',
        ];
        
        // Remove current destination from the list
        if (isset($popularDestinations[strtolower($currentDestination)])) {
            unset($popularDestinations[strtolower($currentDestination)]);
        }
        
        // Shuffle and take 5 destinations
        $randomKeys = array_rand($popularDestinations, min(5, count($popularDestinations)));
        
        if (!is_array($randomKeys)) {
            $randomKeys = [$randomKeys];
        }
        
        $selectedDestinations = [];
        foreach ($randomKeys as $key) {
            $selectedDestinations[$key] = $popularDestinations[$key];
        }
        
        // Get images for each destination
        $destinationsWithImages = [];
        foreach ($selectedDestinations as $slug => $description) {
            $images = $unsplash->searchImages($slug . ' travel', 1);
            $destinationsWithImages[] = [
                'name' => ucfirst($slug),
                'slug' => $slug,
                'description' => $description,
                'image' => $images[0] ?? 'https://via.placeholder.com/800x500?text=' . urlencode(ucfirst($slug)),
            ];
        }
        
        return $destinationsWithImages;
    }

    /**
     * Get Malaysia-specific package details
     * 
     * @return array
     */
    private function getMalaysiaPackage(): array
    {
        return [
            'name' => 'Malaysia',
            'description' => 'Experience the beauty and culture of Malaysia, from the bustling streets of Kuala Lumpur to the tranquil beaches of Langkawi. A perfect blend of urban exploration, cultural discovery, and natural wonders.',
            'duration' => '5-8 Days',
            'price' => 42999,
            'highlights' => [
                'Iconic Petronas Twin Towers',
                'Beautiful Batu Caves',
                'Exciting Genting Highlands',
                'Scenic Langkawi Island',
                'Island Hopping Adventures',
                'Rich Cultural Heritage',
            ],
            'itinerary' => [
                [
                    'title' => '5 Days & 4 Nights Malaysia Itinerary: Explore the Best of Kuala Lumpur',
                    'description' => 'A perfect introduction to Malaysia, focusing on the vibrant capital city and its surroundings.',
                    'activities' => [
                        'Day 1: Arrival in Kuala Lumpur',
                        'Day 2: Discover Kuala Lumpur on a City Tour',
                        'Day 3: Explore the Wonders of KLCC Aquarium',
                        'Day 4: Adventure to Genting Highlands and Batu Caves',
                        'Day 5: Departure with Unforgettable Memories'
                    ],
                    'meals' => ['breakfast' => true, 'lunch' => false, 'dinner' => false],
                ],
                [
                    'title' => '6 Days & 5 Nights Kuala Lumpur & Langkawi Itinerary',
                    'description' => 'A Journey of Exploration and Relaxation combining the urban experience with island paradise.',
                    'activities' => [
                        'Day 1: Arrival in Kuala Lumpur',
                        'Day 2: Kuala Lumpur City Tour',
                        'Day 3: Discover Genting Highlands and Batu Caves',
                        'Day 4: Fly to Langkawi',
                        'Day 5: Exciting Island Hopping Adventure by Speedboat',
                        'Day 6: Departure, Returning with Cherished Memories'
                    ],
                    'meals' => ['breakfast' => true, 'lunch' => false, 'dinner' => false],
                ],
                [
                    'title' => '8 Days & 7 Nights in Malaysia: The Ultimate Adventure',
                    'description' => 'The Ultimate Adventure and Cultural Experience across multiple destinations in Malaysia.',
                    'activities' => [
                        'Day 1: Arrival in Kuala Lumpur',
                        'Day 2: Discover Kuala Lumpur on a City Tour with the Iconic Petronas Twin Towers',
                        'Day 3: Explore Genting Highlands and Batu Caves',
                        'Day 4: Fly to Langkawi',
                        'Day 5: Langkawi City Tour',
                        'Day 6: Exciting Island Hopping Adventure by Speedboat',
                        'Day 7: Leisure Day to Relax and Explore at Your Own Pace',
                        'Day 8: Departure from Langkawi, Carrying Cherished Memories of a Wonderful Trip'
                    ],
                    'meals' => ['breakfast' => true, 'lunch' => false, 'dinner' => false],
                ],
            ],
            'inclusions' => [
                'Airport Pickup & Drop',
                'Accommodation with Daily Breakfast',
                'Tickets for Itinerary Attractions',
                'Transfers to All Attractions',
            ],
            'exclusions' => [
                'Personal expenses',
                'International and domestic flights',
                'Meals not specified in the itinerary or inclusions',
                'Additional excursions or sightseeing not included in the itinerary',
                'Visa charges',
                'Taxes (TCS & GST)',
            ],
            'reviews' => [
                [
                    'name' => 'Ananya Mehta',
                    'rating' => 5,
                    'comment' => 'Our Malaysia trip was absolutely amazing! The Petronas Towers were breathtaking and the island hopping in Langkawi was unforgettable. Highly recommend!',
                    'date' => '1 month ago',
                    'trip_date' => 'April 2023',
                    'travel_type' => 'Family',
                ],
                [
                    'name' => 'Vikram Singh',
                    'rating' => 4,
                    'comment' => 'Great experience in Malaysia. The Batu Caves were spectacular and Genting Highlands was fun. The guides were very knowledgeable and accommodating.',
                    'date' => '2 months ago',
                    'trip_date' => 'March 2023',
                    'travel_type' => 'Couple',
                ],
                [
                    'name' => 'Deepa Krishnan',
                    'rating' => 5,
                    'comment' => 'Perfect balance of city exploration and beach relaxation. Langkawi was paradise! The hotel arrangements were excellent.',
                    'date' => '3 months ago',
                    'trip_date' => 'February 2023',
                    'travel_type' => 'Friends',
                ],
            ],
            'faqs' => [
                [
                    'question' => 'What is the best time to visit Malaysia?',
                    'answer' => 'The best time to visit Malaysia is during the dry season from March to October. However, Malaysia can be visited year-round as it has a tropical climate.',
                ],
                [
                    'question' => 'Do Indians need a visa for Malaysia?',
                    'answer' => 'Yes, Indian citizens need a visa to visit Malaysia. You can apply for an e-Visa online or get a visa on arrival in some cases.',
                ],
                [
                    'question' => 'Can I customize the itinerary?',
                    'answer' => 'Yes, we offer customizable itineraries based on your preferences and budget. Please mention your requirements in the enquiry form.',
                ],
                [
                    'question' => 'What is the currency used in Malaysia?',
                    'answer' => 'The Malaysian Ringgit (MYR) is the official currency of Malaysia.',
                ],
            ],
            'related_posts' => [
                [
                    'title' => 'Top 10 Places to Visit in Malaysia',
                    'excerpt' => 'Discover the most beautiful and exciting destinations across Malaysia, from the bustling streets of Kuala Lumpur to the pristine beaches of Langkawi...',
                    'image' => 'blog-1.jpg',
                    'date' => '2023-04-15',
                ],
                [
                    'title' => 'Malaysian Food Guide: A Culinary Adventure',
                    'excerpt' => 'A journey through Malaysia\'s diverse and delicious cuisine, featuring local favorites like Nasi Lemak, Laksa, and Roti Canai...',
                    'image' => 'blog-2.jpg',
                    'date' => '2023-03-10',
                ],
            ],
        ];
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
