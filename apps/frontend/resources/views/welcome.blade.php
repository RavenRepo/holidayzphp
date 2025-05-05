<x-ui.layout.app>

    <main>
        <!-- Hero Section -->
        <x-ui.layout.section
            class="bg-cover bg-center text-white text-center py-20"
            style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1600x600?text=Travel+Destination')"
            padding="none"
        >
            <div class="fade-in">
                <x-ui.layout.page-heading
                    title="Your Dream Vacation Starts Here"
                    subtitle="Discover the world with Holidayz Manager, your trusted partner in creating unforgettable travel experiences."
                    class="text-white max-w-4xl mx-auto"
                />
                <div class="bg-white/90 p-4 rounded-lg max-w-3xl mx-auto mt-8">
                    <form class="flex flex-wrap gap-4">
                        <x-ui.forms.input
                            name="destination"
                            placeholder="Destination"
                            class="flex-1"
                        />
                        <x-ui.forms.input
                            type="date"
                            name="date"
                            class="flex-1"
                        />
                        <x-ui.forms.input
                            type="number"
                            name="travelers"
                            placeholder="Travelers"
                            min="1"
                            class="flex-1"
                        />
                        <x-ui.forms.button type="submit" variant="primary" size="lg">
                            Search Packages
                        </x-ui.forms.button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Featured Packages -->
        <section class="section" id="packages">
            <div class="container slide-in">
                <h2 style="font-family: 'Poppins', sans-serif; text-align: center; margin-bottom: 3rem;">Featured Packages</h2>
                <div class="grid-desktop" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                    <div class="package-card card" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div style="background-image: url('https://via.placeholder.com/400x300?text=Paris'); background-size: cover; background-position: center; height: 200px; border-radius: 8px 8px 0 0;"></div>
                        <div style="padding: 1rem;">
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600;">Paris, France</h3>
                            <p style="font-family: 'Open Sans', sans-serif;">Experience romance and culture in the city of lights.</p>
                            <p style="font-family: 'Open Sans', sans-serif; font-weight: 600; color: var(--accent);">$1,200 per person</p>
                            <span style="display: inline-block; background: var(--neutral-light); padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; margin-top: 0.5rem;">5 Days</span>
                            <a href="#details" class="btn btn-outline-primary" style="margin-top: 1rem;">View Details</a>
                        </div>
                    </div>
                    <div class="package-card card" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div style="background-image: url('https://via.placeholder.com/400x300?text=Bali'); background-size: cover; background-position: center; height: 200px; border-radius: 8px 8px 0 0;"></div>
                        <div style="padding: 1rem;">
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600;">Bali, Indonesia</h3>
                            <p style="font-family: 'Open Sans', sans-serif;">Relax in tropical paradise with stunning beaches.</p>
                            <p style="font-family: 'Open Sans', sans-serif; font-weight: 600; color: var(--accent);">$900 per person</p>
                            <span style="display: inline-block; background: var(--neutral-light); padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; margin-top: 0.5rem;">7 Days</span>
                            <a href="#details" class="btn btn-outline-primary" style="margin-top: 1rem;">View Details</a>
                        </div>
                    </div>
                    <div class="package-card card" style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                        <div style="background-image: url('https://via.placeholder.com/400x300?text=New+York'); background-size: cover; background-position: center; height: 200px; border-radius: 8px 8px 0 0;"></div>
                        <div style="padding: 1rem;">
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600;">New York, USA</h3>
                            <p style="font-family: 'Open Sans', sans-serif;">Discover the vibrant energy of the Big Apple.</p>
                            <p style="font-family: 'Open Sans', sans-serif; font-weight: 600; color: var(--accent);">$1,500 per person</p>
                            <span style="display: inline-block; background: var(--neutral-light); padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.875rem; margin-top: 0.5rem;">4 Days</span>
                            <a href="#details" class="btn btn-outline-primary" style="margin-top: 1rem;">View Details</a>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 2rem;">
                    <a href="#all-packages" class="btn btn-secondary">View All Packages</a>
                </div>
            </div>
        </section>

        <!-- Why Choose Us / Value Props -->
        <section class="section" style="background-color: var(--neutral-light);">
            <div class="container slide-in">
                <h2 style="font-family: 'Poppins', sans-serif; text-align: center; margin-bottom: 3rem;">Why Choose Holidayz?</h2>
                <div class="flex-desktop" style="gap: 2rem; flex-wrap: wrap; justify-content: center;">
                    <div style="flex: 1; min-width: 250px; text-align: center;">
                        <div style="background: var(--primary); color: white; width: 60px; height: 60px; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg></div>
                        <h3 style="font-family: 'Poppins', sans-serif;">Expert Planning</h3>
                        <p style="font-family: 'Open Sans', sans-serif;">Our team ensures every detail is perfect.</p>
                    </div>
                    <div style="flex: 1; min-width: 250px; text-align: center;">
                        <div style="background: var(--secondary); color: white; width: 60px; height: 60px; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg></div>
                        <h3 style="font-family: 'Poppins', sans-serif;">Custom Trips</h3>
                        <p style="font-family: 'Open Sans', sans-serif;">Tailored itineraries to match your dreams.</p>
                    </div>
                    <div style="flex: 1; min-width: 250px; text-align: center;">
                        <div style="background: var(--accent); color: var(--neutral-dark); width: 60px; height: 60px; border-radius: 50%; margin: 0 auto 1rem; display: flex; align-items: center; justify-content: center;"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg></div>
                        <h3 style="font-family: 'Poppins', sans-serif;">Best Prices</h3>
                        <p style="font-family: 'Open Sans', sans-serif;">Unbeatable deals for your next adventure.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action (Itinerary Builder) -->
        <section class="section" style="background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://via.placeholder.com/1600x400?text=Plan+Your+Trip'); background-size: cover; background-position: center; color: white; text-align: center; padding: 4rem 1.5rem;">
            <div class="container fade-in">
                <h2 style="font-family: 'Poppins', sans-serif; margin-bottom: 1rem;">Build Your Custom Trip Today</h2>
                <p style="font-family: 'Open Sans', sans-serif; font-size: 1.25rem; margin: 1rem auto 2rem; max-width: 700px;">Design your perfect getaway with our easy-to-use itinerary builder.</p>
                <a href="#itinerary-builder" class="btn btn-accent" style="background-color: var(--accent); color: var(--neutral-dark);">Start Planning</a>
            </div>
        </section>

        <!-- Blog Highlights -->
        <section class="section">
            <div class="container slide-in">
                <h2 style="font-family: 'Poppins', sans-serif; text-align: center; margin-bottom: 3rem;">Travel Tips & Stories</h2>
                <div class="grid-desktop" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem;">
                    <div class="blog-card card">
                        <div style="background-image: url('https://via.placeholder.com/400x200?text=Travel+Tips'); background-size: cover; background-position: center; height: 150px; border-radius: 8px 8px 0 0;"></div>
                        <div style="padding: 1rem;">
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600;">Top 10 Travel Tips</h3>
                            <p style="font-family: 'Open Sans', sans-serif;">Make the most of your trip with these essential tips.</p>
                            <a href="#blog-post" class="btn btn-outline" style="margin-top: 1rem;">Read More</a>
                        </div>
                    </div>
                    <div class="blog-card card">
                        <div style="background-image: url('https://via.placeholder.com/400x200?text=Destination+Guide'); background-size: cover; background-position: center; height: 150px; border-radius: 8px 8px 0 0;"></div>
                        <div style="padding: 1rem;">
                            <h3 style="font-family: 'Poppins', sans-serif; font-weight: 600;">Destination Guide: Italy</h3>
                            <p style="font-family: 'Open Sans', sans-serif;">Explore the beauty and culture of Italy.</p>
                            <a href="#blog-post" class="btn btn-outline" style="margin-top: 1rem;">Read More</a>
                        </div>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 2rem;">
                    <a href="#blog" class="btn btn-secondary">View All Posts</a>
                </div>
            </div>
        </section>
    </main>

</x-ui.layout.app>
