<div class="w-full relative">
    @if($categories != null)
        <div class="flex items-center gap-1 p-2 w-full h-[52px]">
            @foreach ($categories as $category)
                <button class="flex text-sm border-2 border-transparent rounded-lg focus:outline-none transition hover:bg-gray-100 px-3 py-1" wire:click="fetchSubCategory({{ $category->id }})">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    @endif

    @if($sub_categories != null)
        <div class="flex items-center gap-1 rounded shadow p-2 w-full overflow-x-auto sub-category absolute top-[52px] bg-white z-50">
            @foreach ($sub_categories as $category)
                <button class="text-sm border-2 border-transparent rounded-lg focus:outline-none transition hover:bg-gray-100 px-3 py-1 w-full flex items-center justify-center" wire:click="fetchType({{ $category->id }})">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    @endif

    @if($types != null)
    <div class="flex items-center gap-1 rounded shadow p-2 w-full overflow-x-auto types absolute top-[101px] bg-white z-50">
            @foreach ($types as $type)
                <a href="{{ route('brand-by-type', $type->slug) }}" class="flex items-center justify-center text-sm border-2 border-transparent rounded-lg focus:outline-none transition hover:bg-gray-100 px-3 py-1 w-full">
                    {{ $type->name }}
                </a>
            @endforeach
        </div>
    @endif

    @if($sub_categories != null || $types != null)
        <div class="fixed top-[52px] left-0 right-0 bg-transparent bottom-0 h-full z-40" wire:click="hideSubType()"></div>
    @endif

</div>
