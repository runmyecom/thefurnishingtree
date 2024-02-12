<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'RunMyStore') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- <x-head.tinymce-config/> -->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="h-screen overflow-hidden bg-gray-100 w-full flex">
            <aside class="w-[17%] bg-white border-r h-full overflow-y-auto pb-3">
                <div class="header px-6 py-4">
                    <button class="rounded-full bg-gray-900 w-10 h-10 mb-5 border-4 text-white flex items-center justify-center">A</button>
                    <h4 class="text-zinc-500 text-sm">Store</h4>
                    <h4 class="text-sm">TFT Store</h4>
                </div>
                <ul class="mt-5">
                    <li class="px-3">
                        <x-side-link href="{{ route('order.index') }}" :active="request()->routeIs('order.index')">
                            <x-icons.order class="w-5 h-5" />
                            <span class="text-sm">Orders</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('item.index') }}" :active="request()->routeIs('item.index')">
                            <x-icons.product class="w-5 h-5" />
                            <span class="text-sm">Items</span>
                        </x-side-link>
                    </li>
                    <hr class="my-2"/>
                    <li class="px-3">
                        <x-side-link href="{{ route('category.index') }}" :active="request()->routeIs('category.index')">
                            <x-icons.category class="w-5 h-5" />
                            <span class="text-sm">Categories</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('sub_category.index') }}" :active="request()->routeIs('sub_category.index')">
                            <x-icons.subcategory class="w-5 h-5" />
                            <span class="text-sm">Sub-Category</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('type.index') }}" :active="request()->routeIs('type.index')">
                            <x-icons.types class="w-5 h-5" />
                            <span class="text-sm">Product Type</span>
                        </x-side-link>
                    </li>
                    <hr class="my-2"/>
                    <li class="px-3">
                        <x-side-link href="{{ route('node.index') }}" :active="request()->routeIs('node.index')">
                            <x-icons.node class="w-5 h-5" />
                            <span class="text-sm">Browse Node</span>
                        </x-side-link>
                    </li>
                    <hr class="my-2"/>

                    <li class="px-3">
                        <x-side-link href="{{ route('size.index') }}" :active="request()->routeIs('size.index')">
                            <x-icons.size class="w-5 h-5" />
                            <span class="text-sm">Sizes</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('model.index') }}" :active="request()->routeIs('model.index')">
                            <x-icons.model class="w-5 h-5" />
                            <span class="text-sm">Model</span>
                        </x-side-link>
                    </li>

                    <hr class="my-2"/>
                    <li class="px-3">
                        <x-side-link href="{{ route('brand.index') }}" :active="request()->routeIs('brand.index')">
                            <x-icons.brand class="w-5 h-5" />
                            <span class="text-sm">Brands</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('material.index') }}" :active="request()->routeIs('material.index')">
                            <x-icons.material class="w-5 h-5" />
                            <span class="text-sm">Materials</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('color.index') }}" :active="request()->routeIs('color.index')">
                            <x-icons.size class="w-5 h-5" />
                            <span class="text-sm">Colors</span>
                        </x-side-link>
                    </li>

                    <hr class="my-2"/>
                    <li class="px-3">
                        <x-side-link href="{{ route('category.index') }}" :active="request()->routeIs('category.index')">
                            <x-icons.inventory class="w-5 h-5" />
                            <span class="text-sm">Inventory</span>
                        </x-side-link>
                    </li>
                    <li class="px-3">
                        <x-side-link href="{{ route('category.index') }}" :active="request()->routeIs('category.index')">
                            <x-icons.setting class="w-5 h-5" />
                            <span class="text-sm">Settings</span>
                        </x-side-link>
                    </li>
                </ul>
            </aside>
            <div class="font-sans text-gray-900 antialiased flex-grow h-screen overflow-y-auto w-[83%]">
                <nav class="w-full h-[55px] bg-white border-b flex items-center justify-between px-6 sticky top-0 z-10">
                    <div class="flex items-center gap-1">
                        <svg class="w-6 h-6 text-gray-400" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-grey-40"><title>Search</title><path d="M20.4696 21.5303C20.7625 21.8232 21.2373 21.8232 21.5302 21.5303C21.8231 21.2374 21.8231 20.7626 21.5302 20.4697L20.4696 21.5303ZM17.1802 16.1197C16.8873 15.8268 16.4125 15.8268 16.1196 16.1197C15.8267 16.4126 15.8267 16.8874 16.1196 17.1803L17.1802 16.1197ZM18.25 11C18.25 15.0041 15.0041 18.25 11 18.25V19.75C15.8325 19.75 19.75 15.8325 19.75 11H18.25ZM11 18.25C6.99594 18.25 3.75 15.0041 3.75 11H2.25C2.25 15.8325 6.16751 19.75 11 19.75V18.25ZM3.75 11C3.75 6.99594 6.99594 3.75 11 3.75V2.25C6.16751 2.25 2.25 6.16751 2.25 11H3.75ZM11 3.75C15.0041 3.75 18.25 6.99594 18.25 11H19.75C19.75 6.16751 15.8325 2.25 11 2.25V3.75ZM21.5302 20.4697L17.1802 16.1197L16.1196 17.1803L20.4696 21.5303L21.5302 20.4697Z" fill="currentColor"></path></svg>
                        <input type="text" placeholder="Search..." class="w-60 outline-none focus:outline-none ring-0 border-0 focus:ring-0">
                    </div>
                </nav>

                <div class="p-8 w-full">
                    <div class="bg-white rounded-xl border min-h-[80vh] h-full">
                        {{ $slot }}
                    </div>
                </div>
            </div>

        </div>

        <x-notify />

        @livewireScripts

    </body>
</html>
