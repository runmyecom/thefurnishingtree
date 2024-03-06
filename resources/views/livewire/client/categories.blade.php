<div class="w-full relative flex">
    @if($categories != null)
        <div x-data="{ show: false, menu: false }">
            <div class="flex">
                @foreach ($categories as $category)
                    <button
                        class="flex text-sm border-2 border-transparent rounded-lg focus:outline-none transition hover:bg-gray-100 px-3 py-1"
                        x-on:click="show = ! show"
                        wire:click="fetchSubCategory({{ $category->id }})"
                    >{{ $category->name }}</button>
                @endforeach
            </div>

            {{-- First level menu --}}
            <div class="relative">
                @if($sub_categories != null)
                    <div
                        class="bg-white shadow rounded-md p-2 min-w-[220px] top-1 w-full absolute z-10" x-show="show" x-cloak
                        @click.away="show = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="transform opacity-0 scale-95"
                    >
                        <ul class="[&>li]:text-gray-900 [&>li]:text-sm [&>li]:cursor-pointer [&>li]:px-2 [&>li]:py-1.5 [&>li]:rounded-md [&>li]:transition-all hover:[&>li]:bg-gray-50 active:[&>li]:bg-gray-50 active:[&>li]:scale-[0.99]">
                            @foreach ($sub_categories as $subcategory)
                                <li class="flex items-center justify-between text-sm"
                                    x-on:click="menu = ! menu"
                                    @click.away="menu = false"
                                    wire:click="fetchType({{ $subcategory->id }})"
                                >
                                    {{ $subcategory->name }}
                                    <i class="arrow"></i>
                                </li>
                            @endforeach

                            @if($types != null)
                                <div
                                    class="bg-white shadow rounded-md max-w-[320px] w-full p-2 absolute -right-[185px] top-0 [&>li]:text-gray-900 [&>li]:text-sm [&>li]:cursor-pointer [&>li]:px-2 [&>li]:py-1.5 [&>li]:rounded-md [&>li]:transition-all hover:[&>li]:bg-gray-50 active:[&>li]:bg-gray-50 active:[&>li]:scale-[0.99]"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95">
                                    @foreach ($types as $type)
                                        <li>
                                            <a href="{{ route('itemListByType', $type->slug) }}">
                                                <button class="w-full text-left text-sm">{{ $type->name }}</button>
                                            </a>
                                        </li>
                                    @endforeach
                                </div>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    @endif

</div>
