@props(['socialLinks' => [
    'facebook' => '#',
    'twitter' => '#',
    'instagram' => '#',
    'linkedin' => '#'
]])

<footer class="bg-brandblue text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
            <!-- Company Info -->
            <div>
                <h3 class="font-heading text-2xl font-bold mb-6">Holidayz Manager</h3>
                <p class="text-gray-200 mb-6">Your trusted travel partner for curated packages and custom itineraries across India.</p>
                <div class="flex gap-4">
                    <a href="{{ $socialLinks['facebook'] }}" class="text-white hover:text-saffron transition-colors" aria-label="Facebook">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/></svg>
                    </a>
                    <a href="{{ $socialLinks['twitter'] }}" class="text-white hover:text-saffron transition-colors" aria-label="Twitter">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.32,6.44c-.86.38-1.77.64-2.74.76,1-.59,1.72-1.53,2.07-2.64-.91.54-1.92.93-3,1.14-.86-.92-2.09-1.49-3.44-1.49-2.61,0-4.72,2.11-4.72,4.72,0,.37.04.73.12,1.08C7.98,9.67,4.24,7.79,1.9,4.9c-.41.7-.64,1.51-.64,2.38,0,1.64.84,3.08,2.1,3.93-.77-.02-1.5-.24-2.13-.59v.06c0,2.29,1.63,4.19,3.79,4.62-.4.11-.81.17-1.24.17-.3,0-.6-.03-.89-.08.6,1.88,2.34,3.24,4.4,3.28-1.61,1.26-3.64,2.01-5.84,2.01-.38,0-.75-.02-1.12-.07,2.08,1.33,4.55,2.11,7.21,2.11,8.65,0,13.38-7.16,13.38-13.38,0-.2,0-.4-.01-.61C21.85,8.23,22.67,7.39,23.32,6.44Z"/></svg>
                    </a>
                    <a href="{{ $socialLinks['instagram'] }}" class="text-white hover:text-saffron transition-colors" aria-label="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12,2.16c3.2,0,3.58.01,4.85.07,3.25.15,4.77,1.69,4.92,4.92.06,1.27.07,1.65.07,4.85,0,3.2-.01,3.58-.07,4.85-.15,3.23-1.66,4.77-4.92,4.92-1.27.06-1.65.07-4.85.07-3.2,0-3.58-.01-4.85-.07-3.26-.15-4.77-1.7-4.92-4.92-.06-1.27-.07-1.65-.07-4.85,0-3.2.01-3.58.07-4.85C2.38,3.92,3.9,2.38,7.15,2.23,8.42,2.18,8.8,2.16,12,2.16ZM12,0C8.74,0,8.33.01,7.05.07c-4.35.2-6.78,2.62-6.98,6.98C0,8.33,0,8.74,0,12S.01,15.67.07,16.95c.2,4.36,2.62,6.78,6.98,6.98C8.33,24,8.74,24,12,24s3.67-.01,4.95-.07c4.35-.2,6.78-2.62,6.98-6.98C24,15.67,24,15.26,24,12s-.01-3.67-.07-4.95c-.2-4.35-2.62-6.78-6.98-6.98C15.67.01,15.26,0,12,0Zm0,5.84A6.16,6.16,0,1,0,18.16,12,6.16,6.16,0,0,0,12,5.84ZM12,16a4,4,0,1,1,4-4A4,4,0,0,1,12,16ZM18.41,4.15a1.44,1.44,0,1,0,1.44,1.44A1.44,1.44,0,0,0,18.41,4.15Z"/></svg>
                    </a>
                    <a href="{{ $socialLinks['linkedin'] }}" class="text-white hover:text-saffron transition-colors" aria-label="LinkedIn">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19,3H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h14c1.1,0,2-0.9,2-2V5C21,3.9,20.1,3,19,3z M9,17H6.5v-7H9V17z M7.7,8.7c-0.8,0-1.4-0.7-1.4-1.4c0-0.8,0.6-1.4,1.4-1.4c0.8,0,1.4,0.6,1.4,1.4C9.1,8.1,8.5,8.7,7.7,8.7z M18,17h-2.4v-3.8c0-1.1,0-2.5-1.5-2.5s-1.8,1.2-1.8,2.4V17h-2.4v-7h2.3v1h0c0.4-0.7,1.3-1.5,2.7-1.5c2.9,0,3.4,1.9,3.4,4.4V17z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="font-heading text-xl font-bold mb-6">Quick Links</h3>
                <ul class="space-y-4">
                    <li><a href="{{ route('about') }}" class="text-gray-200 hover:text-saffron transition-colors">About Us</a></li>
                    <li><a href="{{ route('destinations') }}" class="text-gray-200 hover:text-saffron transition-colors">Tour Packages</a></li>
                    <li><a href="{{ route('blog') }}" class="text-gray-200 hover:text-saffron transition-colors">Travel Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-200 hover:text-saffron transition-colors">Contact Us</a></li>
                </ul>
            </div>

            <!-- Popular Destinations -->
            <div>
                <h3 class="font-heading text-xl font-bold mb-6">Popular Destinations</h3>
                <ul class="space-y-4">
                    <li><a href="#" class="text-gray-200 hover:text-saffron transition-colors">Rajasthan</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-saffron transition-colors">Kerala</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-saffron transition-colors">Goa</a></li>
                    <li><a href="#" class="text-gray-200 hover:text-saffron transition-colors">Himachal Pradesh</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="font-heading text-xl font-bold mb-6">Contact Us</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="w-6 h-6 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="text-gray-200">123 Travel Street, Mumbai, India</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:info@holidayz.com" class="text-gray-200 hover:text-saffron transition-colors">info@holidayz.com</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-6 h-6 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+911234567890" class="text-gray-200 hover:text-saffron transition-colors">+91 123 456 7890</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-white/10 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-300 text-sm text-center md:text-left">
                    © {{ date('Y') }} Holidayz Manager. All rights reserved.
                </p>
                <div class="flex gap-6 text-sm">
                    <a href="{{ route('privacy') }}" class="text-gray-300 hover:text-saffron transition-colors">Privacy Policy</a>
                    <a href="{{ route('terms') }}" class="text-gray-300 hover:text-saffron transition-colors">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </div>
</footer>
