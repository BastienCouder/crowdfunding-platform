<x-app-layout>
    <!-- Hero Section -->
    <section class="relative mb-12">
        <div class="relative rounded-lg mx-6 overflow-hidden">
            <img src="{{ asset('images/hands-reaching.jpg') }}" alt="Hands reaching out to each other" class="w-full h-[220px] md:h-[300px] object-cover">
            <div class="absolute inset-0 bg-gray-800/30"></div>
            <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
                <h1 class="text-white text-6xl md:text-7xl font-bold mb-1">Fund</h1>
                <p class="text-white text-xl md:text-2xl font-medium mb-6">Help<br>Others</p>
                <div class="flex">
                    <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium inline-block">
                        Start Fundraising
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Fast As Flash Section -->
    <section class="px-6 mb-12">
        <h2 class="text-2xl font-bold mb-1">Fund, Fast As Flash</h2>
        <p class="text-gray-600 mb-12">Fundraise at the speed of thought! Elevate your cause in just a minute with our lightning-fast fundraising platform.</p>
        
        <!-- Features Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <!-- Feature 1 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Ignite Impact</h3>
                <p class="text-gray-600 text-sm">Spark a fire by sharing your cause with the positive community. Every donation, no matter how small, from contributors will make a meaningful difference.</p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 1 0 0 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186 9.566-5.314m-9.566 7.5 9.566 5.314m0 0a2.25 2.25 0 1 0 3.935 2.186 2.25 2.25 0 0 0-3.935-2.186Z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Spread The Word</h3>
                <p class="text-gray-600 text-sm">Leverage the power of social media and public sharing to amplify your campaign's reach. Connect with worthy causes without barriers.</p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Connect Globally</h3>
                <p class="text-gray-600 text-sm">Build lasting relationships, amplify your cause, and make a difference on a global scale. Create meaningful connections within the local communities.</p>
            </div>
        </div>
    </section>

    <!-- Urgent Fundraising Section -->
    <section class="px-6 mb-12">
        <h2 class="text-2xl font-bold mb-1">Urgent Fundraising!</h2>
        <p class="text-gray-600 mb-8">Time is of the essence! Join our mission NOW to make an immediate impact. Every second counts!</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Campaign 1 -->
            <div class="rounded-lg overflow-hidden border border-gray-200">
                <img src="{{ asset('images/environmental-campaign.jpg') }}" alt="Person cleaning environment" class="w-full h-40 object-cover">
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-gray-600">We Care</span>
                        <span class="ml-2 w-2 h-2 rounded-full bg-blue-500"></span>
                    </div>
                    <h3 class="font-bold">GreenFund: Sustain Earth Now</h3>
                    <div class="flex justify-between items-center mt-4">
                        <span class="font-bold">$50,250.00</span>
                        <span class="text-xs text-gray-500">7 hours left</span>
                    </div>
                </div>
            </div>
            
            <!-- Campaign 2 -->
            <div class="rounded-lg overflow-hidden border border-gray-200">
                <img src="{{ asset('images/senior-health.jpg') }}" alt="Senior health support" class="w-full h-40 object-cover">
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-gray-600">Unicef</span>
                        <span class="ml-2 w-2 h-2 rounded-full bg-blue-500"></span>
                    </div>
                    <h3 class="font-bold">SeniorHealth: Support Campaign</h3>
                    <div class="flex justify-between items-center mt-4">
                        <span class="font-bold">$14,345.00</span>
                        <span class="text-xs text-gray-500">16 days left</span>
                    </div>
                </div>
            </div>
            
            <!-- Campaign 3 -->
            <div class="rounded-lg overflow-hidden border border-gray-200">
                <img src="{{ asset('images/disaster-relief.jpg') }}" alt="Disaster relief volunteers" class="w-full h-40 object-cover">
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-gray-600">Unity Foundation</span>
                        <span class="ml-2 w-2 h-2 rounded-full bg-blue-500"></span>
                    </div>
                    <h3 class="font-bold">DisasterCare: Urgent Support</h3>
                    <div class="flex justify-between items-center mt-4">
                        <span class="font-bold">$29,000.00</span>
                        <span class="text-xs text-gray-500">23 days left</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Fundraisers Section -->
    <section class="px-6 mb-12 text-center">
        <div class="relative py-12 px-4 max-w-4xl mx-auto">
            <!-- Background images -->
            <div class="absolute left-0 top-1/4">
                <img src="{{ asset('images/people-1.jpg') }}" alt="Fundraisers" class="w-16 h-16 object-cover rounded-lg">
            </div>
            <div class="absolute right-0 top-1/4">
                <img src="{{ asset('images/people-2.jpg') }}" alt="Fundraisers" class="w-16 h-16 object-cover rounded-lg">
            </div>
            <div class="absolute left-1/4 bottom-0">
                <img src="{{ asset('images/people-3.jpg') }}" alt="Fundraisers" class="w-16 h-16 object-cover rounded-lg">
            </div>
            <div class="absolute right-1/4 bottom-0">
                <img src="{{ asset('images/people-4.jpg') }}" alt="Fundraisers" class="w-16 h-16 object-cover rounded-lg">
            </div>
            
            <h2 class="text-xl font-bold mb-2">Be The Part Of FundRaisers With Over</h2>
            <div class="text-7xl font-bold mb-4">217,924<span class="text-5xl">+</span></div>
            <p class="mb-6">People From Around The World Joined</p>
            <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-6 py-2 rounded-full text-sm font-medium inline-block">
                Join FundRaisers Now!
            </a>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="px-6 mb-16">
        <h2 class="text-2xl font-bold mb-8">Frequently Asked Questions.</h2>
        
        <div class="space-y-4 max-w-3xl">
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer">
                    <h3 class="font-medium">How Can I Make Donation?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer">
                    <h3 class="font-medium">Is My Donation Tax-Deductible?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer">
                    <h3 class="font-medium">Can I Donate In Honor Or Memory Of Someone?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer">
                    <h3 class="font-medium">How Will My Donation Be Used?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
            </div>
            
            <div class="border-b pb-4">
                <div class="flex justify-between items-center cursor-pointer">
                    <h3 class="font-medium">Can I Set Up A Recurring Donation?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
