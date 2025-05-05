@extends('layouts.app')

@section('title', 'Privacy Policy - Holidayz Manager')

@section('meta_description', 'Read our privacy policy to understand how we collect, use, and protect your personal information at Holidayz Manager.')

@section('content')
    <!-- Hero Section -->
    <section class="py-20 bg-gradient-to-br from-brandblue/5 via-white to-saffron/10">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold text-brandblue mb-6 text-center">
                    Privacy Policy
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
                <h2>Introduction</h2>
                <p>
                    At Holidayz Manager, we take your privacy seriously. This Privacy Policy explains how we collect, use, 
                    disclose, and safeguard your information when you visit our website or use our services.
                </p>

                <h2>Information We Collect</h2>
                <h3>Personal Information</h3>
                <p>We may collect personal information that you voluntarily provide to us when you:</p>
                <ul>
                    <li>Register for an account</li>
                    <li>Sign up for our newsletter</li>
                    <li>Request a travel quote</li>
                    <li>Contact us through our contact form</li>
                    <li>Book a travel package</li>
                </ul>

                <h3>Automatically Collected Information</h3>
                <p>
                    When you visit our website, we automatically collect certain information about your device, including:
                </p>
                <ul>
                    <li>IP address</li>
                    <li>Browser type</li>
                    <li>Pages visited</li>
                    <li>Time spent on pages</li>
                </ul>

                <h2>How We Use Your Information</h2>
                <p>We use the information we collect to:</p>
                <ul>
                    <li>Process your bookings and requests</li>
                    <li>Communicate with you about our services</li>
                    <li>Send you marketing communications (with your consent)</li>
                    <li>Improve our website and services</li>
                    <li>Comply with legal obligations</li>
                </ul>

                <h2>Information Sharing</h2>
                <p>
                    We do not sell or rent your personal information to third parties. We may share your information with:
                </p>
                <ul>
                    <li>Travel service providers to fulfill your bookings</li>
                    <li>Payment processors to handle transactions</li>
                    <li>Marketing partners (with your consent)</li>
                    <li>Legal authorities when required by law</li>
                </ul>

                <h2>Your Rights</h2>
                <p>You have the right to:</p>
                <ul>
                    <li>Access your personal information</li>
                    <li>Correct inaccurate information</li>
                    <li>Request deletion of your information</li>
                    <li>Opt-out of marketing communications</li>
                    <li>Withdraw consent at any time</li>
                </ul>

                <h2>Security</h2>
                <p>
                    We implement appropriate technical and organizational measures to protect your personal information 
                    against unauthorized access, alteration, disclosure, or destruction.
                </p>

                <h2>Contact Us</h2>
                <p>
                    If you have questions about this Privacy Policy or our privacy practices, please contact us at:<br>
                    Email: privacy@holidayzmanager.com<br>
                    Phone: +91 (22) 1234-5678
                </p>
            </div>
        </div>
    </section>
@endsection
