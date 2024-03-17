<div class="w-full shadow bg-white">
    <nav class="bg-white w-full">
        <div class="flex items-center justify-between max-w-7xl mx-auto">
            <a href="/" class="logo flex">
                <img src="/images/tft.png" alt="tft-logo" class="w-20">
            </a>

            <div class="flex items-center gap-6 text-[14px] max-w-7xl mx-auto justify-center bg-white">
                <a href="/">Home</a>

                <livewire:client.categories />

                @if ($categories->count() > 0)
                    <div class="hs-dropdown relative inline-flex">
                        <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium bg-white text-gray-800 hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none rounded-lg">
                        More
                        <svg class="hs-dropdown-open:rotate-180 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" aria-labelledby="hs-dropdown-default">
                            @foreach ($categories as $category)
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700" href="#">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-5 text-gray-400 text-[11px] uppercase">
                <button class="hover:text-gray-700" wire:click="$set('openSearch', true)">
                    <x-icons.search class="w-5 h-5 text-gray-600" />
                </button>
                <a href="#">
                    <x-icons.wishlist class="w-5 h-5 text-gray-600" />
                </a>
                <button class="relative" wire:click="toNext()">
                    <span class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-red-500 text-white text-[9px] font-bold flex items-center justify-center">
                        <livewire:cart-counter />
                    </span>
                    <x-icons.cart class="w-5 h-5 text-gray-600" />
                </button>

                @if(Auth::check())
                    <div class="relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('profile.show') }}" class="capitalize">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link
                                        href="{{ route('logout') }}"
                                        class="capitalize"
                                            @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{ route('login') }}">
                        <x-icons.user class="w-5 h-5 text-gray-600" />
                    </a>
                @endif
            </div>
        </div>
    </nav>

    {{-- cart-sidebar --}}
    @if ($openSearch)
        <div
            class="h-screen cart-sidebar fixed right-0 left-0 top-0 bottom-0 overflow-y-auto bg-gray-950/25"
            wire:transition.in.opacity.duration.600ms
            wire:transition.out.opacity.duration.600ms
        >
            <div class="bg-white w-full h-auto py-7">
                <section class="flex items-center justify-between">
                    <img src="/images/logo.png" alt="tft-logo" class="w-40">
                    <div class="w-[40%]">
                        <label for="hs-trailing-button-add-on-with-icon" class="sr-only">Search</label>
                        <div class="flex rounded-lg border border-gray-500">
                            <input type="text" id="hs-trailing-button-add-on-with-icon" name="hs-trailing-button-add-on-with-icon" class="py-3 px-4 block w-full rounded-s-lg text-sm focus:z-10 disabled:opacity-50 disabled:pointer-events-none border-none focus:border-none focus:ring-0" placeholder="Search Item" wire:model.live.debounce.500ms="search">
                            <span class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md">
                                <x-icons.search class="w-5 h-5" />
                            </span>
                        </div>
                    </div>
                    <div class="flex items-center gap-5 text-gray-400 text-[11px] uppercase pr-12">
                        <a href="#">
                            <x-icons.wishlist class="w-5 h-5 text-gray-600" />
                        </a>
                        <button class="relative" wire:click="toNext()">
                            <span class="absolute -top-2 -right-2 w-4 h-4 rounded-full bg-red-500 text-white text-[9px] font-bold flex items-center justify-center">
                                <livewire:cart-counter />
                            </span>
                            <x-icons.cart class="w-5 h-5 text-gray-600" />
                        </button>
                    </div>
                </section>

                {{-- Search Results --}}
                @if(sizeof($items) > 0)
                    <section class="w-full mt-6">
                        <div class="w-full max-w-7xl mx-auto">
                            <div class="text-xl mb-6 text-center text-gray-500">Results for <span class="font-bold text-gray-800">"{{$search}}"</span></div>
                            {{-- Result --}}
                            <div class="grid grid-cols-4 gap-5">
                                @foreach ($items as $item)
                                    <a class="flex flex-col group bg-white rounded-xl transition dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]" href="{{ route('item-by-model', $item->model_id) }}">
                                        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-xl overflow-hidden h-[30vh] group shadow-xl">
                                            <img class="w-full h-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{$item->image_1}}" alt="Image Description">
                                        </div>
                                        <div class="">
                                        <h3 class="text-lg mt-2 font-bold text-gray-800 dark:text-white">
                                            {{ Str::limit($item->item_name, 30) }}
                                        </h3>
                                        <p class=" text-gray-500 text-sm dark:text-gray-400">
                                            ${{ $item->selling_price }}
                                        </p>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </section>
                @endif

                <div class="flex items-center justify-center mt-5">
                    <button class="border rounded-lg px-4 py-1 hover:bg-gray-900 hover:text-white" wire:click="closeSearch()">Close</button>
                </div>
            </div>
        </div>
    @endif
</div>
