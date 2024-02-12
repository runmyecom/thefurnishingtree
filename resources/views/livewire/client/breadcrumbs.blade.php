<ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
    @if ($type)
        <li class="inline-flex items-center">
            <a href="{{ route('item-brands', $type) }}" class="flex items-center px-2 py-1 rounded-lg text-sm border text-gray-500 bg-gray-50">{{ $type }}</a>
            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
        </li>
    @endif
    @if ($brand)
        <li class="inline-flex items-center">
            <a
            href="{{ route('item-materials',
                    [
                        $type,
                        str_replace(' ', '-', strtolower($brand))
                        ])
                    }}"
                class="flex items-center border px-2 py-1 rounded-lg text-sm text-gray-500 hover:text-gray-800 font-bold"
                >
                {{ $brand }}
            </a>
        </li>
    @endif
    @if ($material)
        <li class="inline-flex items-center">
            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
            <a
                href="{{ route('item-colors',
                    [
                        $type,
                        str_replace(' ', '-', strtolower($brand)),
                        str_replace(' ', '-', strtolower($material))
                    ])
                }}"
                class="flex items-center border px-2 py-1 rounded-lg text-sm text-gray-500 hover:text-gray-800 font-bold"
            >
                {{ $material }}
            </a>
        </li>
    @endif
    @if ($color)
        <li class="inline-flex items-center">
            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
            <a class="flex items-center text-sm text-gray-800 font-bold">
                {{ $color }}
            </a>
        </li>
    @endif
</ol>
