<div class="w-full">
    <!-- Top-nav -->
    <div class="top-nav flex items-center justify-between max-w-4xl mx-auto h-14">
        <div class="flex-center gap-5 text-gray-400 text-[11px] uppercase">
            <span>+918877665544</span>
            <span class="">.</span>
            <span>support@tft.com</span>
        </div>
        <div class="flex items-center gap-5 text-gray-400 text-[11px] uppercase">
            <a class="hover:text-gray-700" href="#">Account</a>
            <a href="#">Wishlist</a>
            <a href="#">Blog</a>
            @if (Route::has('login'))
                <div class="flex items-center gap-2">   
                    @auth
                        <a href="{{ url('/dashboard') }}" wire:navigate class="font-semibold text-gray-600">Dashboard</a>
                        <button class="snipcart-checkout flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 256 256"><path fill="currentColor" d="M222.14 58.87A8 8 0 0 0 216 56H54.68l-4.89-26.86A16 16 0 0 0 34.05 16H16a8 8 0 0 0 0 16h18l25.56 140.29a24 24 0 0 0 5.33 11.27a28 28 0 1 0 44.4 8.44h45.42a27.75 27.75 0 0 0-2.71 12a28 28 0 1 0 28-28H83.17a8 8 0 0 1-7.87-6.57L72.13 152h116a24 24 0 0 0 23.61-19.71l12.16-66.86a8 8 0 0 0-1.76-6.56ZM96 204a12 12 0 1 1-12-12a12 12 0 0 1 12 12Zm96 0a12 12 0 1 1-12-12a12 12 0 0 1 12 12Zm4-74.57a8 8 0 0 1-7.9 6.57H69.22L57.59 72h148.82Z"/></svg>
                        </button>
                    @else
                        <a href="{{ route('login') }}" wire:navigate class="font-semibold text-gray-600">Log in</a>
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- Main Nav -->
    <nav class="bg-white border-t w-full">
        <div class="flex items-center justify-between max-w-4xl mx-auto">
            <NuxtLink to="/" class="logo flex">
                <img src="/images/logo.png" alt="tft-logo" class="w-40">
            </NuxtLink>
            <div class="flex items-center gap-8 text-[14px]">
                <NuxtLink to="/">Home</NuxtLink>
                <button @click="openMegaMenu">Appliance Cover</button>
                <a href="#">Curtains</a>
                <a href="#">Slipcovers</a>
                <a href="#">More</a>
            </div>
            <button>Search</button>
        </div>
    </nav>
</div>
