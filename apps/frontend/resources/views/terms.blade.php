@extends('layouts.app')

@section('title', 'Terms & Conditions - Holidayz Manager')

@section('meta_description', 'Read our terms and conditions to understand the rules and guidelines for using Holidayz Manager services.')

@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6 text-center">
                    Terms & Conditions
                </h1>
                <p class="text-lg text-gray-700 text-center">
                    Last updated: {{ date('F d, Y') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto prose prose-lg">
                <h2>Agreement to Terms</h2>
                <p>
                    By accessing and using Holidayz Manager's website and services, you agree to be bound by these Terms 
                    and Conditions. If you disagree with any part of these terms, you may not access our services.
                </p>

                <h2>Use of Our Services</h2>
                <h3>Account Registration</h3>
                <p>When you create an account with us, you must provide accurate and complete information. You are responsible for:</p>
                <ul>
                    <li>Maintaining the confidentiality of your account</li>
                    <li>Restricting access to your account</li>
                    <li>All activities that occur under your account</li>
                </ul>

                <h3>Booking and Payments</h3>
                <p>When making a booking through our platform:</p>
                <ul>
                    <li>All payments must be made in full by the specified deadline</li>
                    <li>Prices are subject to change until payment is confirmed</li>
                    <li>Additional charges may apply for special requests or modifications</li>
                    <li>All bookings are subject to availability</li>
                </ul>

                <h2>Cancellation and Refund Policy</h2>
                <p>Our cancellation policy is as follows:</p>
                <ul>
                    <li>Cancellations made 30+ days before departure: Full refund minus processing fees</li>
                    <li>Cancellations made 15-29 days before departure: 50% refund</li>
                    <li>Cancellations made 14 days or less before departure: No refund</li>
                    <li>All refunds are processed within 7-14 business days</li>
                </ul>

                <h2>Travel Insurance</h2>
                <p>
                    We strongly recommend purchasing comprehensive travel insurance. Holidayz Manager is not responsible for:
                </p>
                <ul>
                    <li>Trip cancellations due to personal emergencies</li>
                    <li>Medical emergencies during travel</li>
                    <li>Lost or stolen belongings</li>
                    <li>Travel delays or disruptions</li>
                </ul>

                <h2>Limitation of Liability</h2>
                <p>
                    Holidayz Manager shall not be liable for any indirect, incidental, special, consequential, or punitive 
                    damages resulting from your use or inability to use our services.
                </p>

                <h2>Intellectual Property</h2>
                <p>
                    All content on this website, including text, graphics, logos, images, and software, is the property of 
                    Holidayz Manager and is protected by copyright and other intellectual property laws.
                </p>

                <h2>Changes to Terms</h2>
                <p>
                    We reserve the right to modify these terms at any time. We will notify users of any material changes 
                    via email or through our website.
                </p>

                <h2>Governing Law</h2>
                <p>
                    These terms shall be governed by and construed in accordance with the laws of India, without regard to 
                    its conflict of law provisions.
                </p>

                <h2>Contact Information</h2>
                <p>
                    For questions about these Terms & Conditions, please contact us at:<br>
                    Email: legal@holidayzmanager.com<br>
                    Phone: +91 (22) 1234-5678
                </p>
            </div>
        </div>
    </section>
@endsection
