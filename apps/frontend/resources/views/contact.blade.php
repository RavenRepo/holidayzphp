@extends('layouts.app')

@section('title', 'Contact Us - Holidayz Manager')

@section('meta_description', 'Get in touch with Holidayz Manager for personalized travel planning, inquiries, and support. We\'re here to help make your dream Indian vacation a reality.')

@section('content')
    <!-- Hero Section -->
    <section class="relative py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6">
                    Get in Touch
                </h1>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                    Have questions about planning your trip? We're here to help make your dream Indian vacation a reality.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Office Address -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 text-center shadow-soft hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Office Address</h3>
                    <p class="text-gray-700">
                        123 Tourism Street<br>
                        Mumbai Central<br>
                        Mumbai, Maharashtra 400008<br>
                        India
                    </p>
                </div>

                <!-- Contact Details -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 text-center shadow-soft hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Contact Details</h3>
                    <p class="text-gray-700 mb-2">
                        <span class="font-medium">Phone:</span><br>
                        +91 (22) 1234-5678
                    </p>
                    <p class="text-gray-700">
                        <span class="font-medium">Email:</span><br>
                        info@holidayzmanager.com
                    </p>
                </div>

                <!-- Business Hours -->
                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 text-center shadow-soft hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 bg-brandblue/10 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-8 h-8 text-brandblue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-brandblue mb-4">Business Hours</h3>
                    <p class="text-gray-700 mb-2">
                        <span class="font-medium">Monday - Friday:</span><br>
                        9:00 AM - 6:00 PM
                    </p>
                    <p class="text-gray-700">
                        <span class="font-medium">Saturday:</span><br>
                        10:00 AM - 4:00 PM
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="py-16 bg-gradient-to-br from-saffron/10 via-white to-brandblue/5">
        <div class="container mx-auto px-4">
            <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 shadow-soft overflow-hidden">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.803970762962!2d72.82344867497635!3d19.020117682163775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce12d52b3d49%3A0x27c7b3ec739c42a3!2sMumbai%20Central!5e0!3m2!1sen!2sin!4v1683334567890!5m2!1sen!2sin" 
                    width="100%" 
                    height="450" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Holidayz Manager Office Location"
                ></iframe>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-4">
                        Send Us a Message
                    </h2>
                    <p class="text-lg text-gray-700">
                        Whether you have a question about our packages, need custom travel planning, or anything else, our team is ready to answer all your questions.
                    </p>
                </div>

                <div class="bg-white/70 backdrop-blur-md rounded-2xl border border-gray-100 p-8 shadow-soft">
                    <x-contact.form />
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
        <div class="container mx-auto px-4">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-brandblue mb-4">
                        Frequently Asked Questions
                    </h2>
                    <p class="text-lg text-gray-700">
                        Find quick answers to common questions about our services.
                    </p>
                </div>

                <div class="space-y-6">
                    @foreach([
                        [
                            'question' => 'How do I book a tour package?',
                            'answer' => 'You can book a tour package by filling out our inquiry form above, calling us directly, or visiting our office. Our team will assist you with the booking process and customize the package according to your preferences.'
                        ],
                        [
                            'question' => 'What payment methods do you accept?',
                            'answer' => 'We accept various payment methods including credit/debit cards, bank transfers, and digital wallets. All payments are processed securely through our trusted payment partners.'
                        ],
                        [
                            'question' => 'Can you customize a tour package?',
                            'answer' => 'Yes, we specialize in creating customized tour packages. Contact us with your preferences, and our expert team will design a personalized itinerary that matches your interests, budget, and schedule.'
                        ],
                        [
                            'question' => 'What is your cancellation policy?',
                            'answer' => 'Our cancellation policy varies depending on the package and timing of cancellation. Generally, cancellations made 30 days before the trip are eligible for a full refund. Please contact us for specific details.'
                        ]
                    ] as $faq)
                        <div class="bg-white/70 backdrop-blur-md rounded-xl border border-gray-100 shadow-soft overflow-hidden">
                            <details class="group">
                                <summary class="flex items-center justify-between p-6 cursor-pointer">
                                    <h3 class="text-lg font-medium text-brandblue">
                                        {{ $faq['question'] }}
                                    </h3>
                                    <span class="ml-6 flex-shrink-0 text-brandblue group-open:rotate-180 transition-transform duration-300">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </span>
                                </summary>
                                <div class="px-6 pb-6 text-gray-700">
                                    {{ $faq['answer'] }}
                                </div>
                            </details>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
