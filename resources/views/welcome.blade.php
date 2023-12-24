<x-guest-layout>
    <livewire:guest-navigation />

    <!-- Hero Banner -->
    <div class="hero-area max-w-7xl mx-auto overflow-hidden h-[70vh] bg-orange-50 relative rounded-lg">
      <div class="absolute left-0 top-0 flex flex-col items-start justify-between h-full px-20 pt-20 pb-10">
        <div>
            <h2 class="text-3xl">
              <strong>TheFurnishingStore.</strong> Number #1 <br/>
            Trusted Cover Website
          </h2>
          <p class="mt-3 text-orange-400">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <button class="">
          <span class="border-b-2 py-2 text-xs uppercase text-orange-600 border-orange-600">View Now</span>
        </button>
        <div class="flex-center gap-3">
          <button class="text-sm uppercase">Prev</button>
          <button class="text-sm uppercase">|</button>
          <button class="text-sm uppercase">Next</button>
        </div>
      </div>
      <img src="/images/products/hero.png" alt="" class="w-full h-full object-cover">
    </div>
    <!-- featured-product grid -->
    <section class="max-w-7xl mx-auto grid grid-cols-2 gap-5 mt-5">
      <img src="/images/products/sample-1.jpeg" alt="" class="h-[40vh] object-cover rounded-lg w-full">
      <img src="/images/products/sample-2.webp" alt="" class="h-[40vh] object-cover rounded-lg w-full">
    </section>

    <!-- Featured -->
    <section class="w-full max-w-7xl mx-auto py-20 mt-32">
      <div class="bg-gray-100 flex rounded relative">
        <div class="py-16 px-20">
          <h2 class="uppercase text-3xl mb-2"><span class="font-bold">STYLISH</span> Minimal chair</h2>
          <button class="text-xs underline uppercase text-gray-600">View Now</button>
        </div>
        <img src="/images/png.png" alt="" class="absolute right-20 -bottom-6 w-[30vw]">
      </div>
    </section>

    <!-- Most selling product -->
    <section class="w-full max-w-7xl mx-auto py-20">
      <div class="flex w-full gap-5">
        <div class="w-[70%] flex flex-col gap-5 ">
          <div class="flex gap-5">
            <div class="h-[45vh] w-[60%] bg-red-100 p-6 relative flex overflow-hidden">
              <img src="/images/products/1.png" alt="" class="w-[25vw] absolute -left-16 -bottom-4">
              <div class="absolute right-10 top-10">
                <h3 class="font-semibold text-sm text-red-400 uppercase">#New Arrivals</h3>
                <h2 class="text-2xl font-bold">White Shape Chair</h2>
                <button class="text-[10px] underline uppercase text-gray-800">Shop Now</button>
              </div>
            </div>
            <div class="h-[45vh] w-[40%] bg-red-100 p-6 relative flex overflow-hidden">
              <div class="absolute right-6 top-16">
                <h3 class="font-semibold text-sm text-teal-400 uppercase">#Featured</h3>
                <h2 class="text-xl font-bold">White Shape Chair</h2>
              </div>
              <img src="/images/products/2.png" alt="" class="w-full object-contain absolute -left-16 -bottom-2">
            </div>
          </div>
          <div class="flex gap-5">
            <div class="w-[40%] bg-green-100 p-6 relative h-[45vh] flex overflow-hidden">
              <div class="absolute right-6 top-16">
                <h3 class="font-semibold text-sm text-green-400 uppercase">#Most popular</h3>
                <h2 class="text-xl font-bold">White Shape Chair</h2>
              </div>
              <img src="/images/products/5.png" alt="" class="w-full object-contain absolute -left-16 bottom-0">
            </div>
            <div class="w-[60%] bg-indigo-100 p-6 relative h-[45vh] flex overflow-hidden">
              <div class="absolute right-6 top-16">
                <h3 class="font-semibold text-sm text-indigo-400 uppercase">#Most popular</h3>
                <h2 class="text-xl font-bold">White Shape Chair</h2>
              </div>
              <img src="/images/products/6.png" alt="" class="w-[24vw] object-contain absolute -left-10 -bottom-2">
            </div>
          </div>
        </div>
        <!-- Right  -->
        <div class="w-[30%]">
          <div class="h-full w-full bg-orange-100 p-6 relative flex items-center">
            <div class="absolute left-12 top-16">
              <h3 class="font-semibold text-sm text-orange-400 uppercase">#Trending Now</h3>
              <h2 class="text-2xl font-semibold">White Shape Chair</h2>
            </div>
            <img src="/images/products/3.png" alt="" class="w-full h-[60vh] object-contain mt-auto">
          </div>
        </div>
      </div>
    </section>
</x-guest-layout>

