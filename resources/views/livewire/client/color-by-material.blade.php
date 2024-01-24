<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <button class="text-sm text-gray-500">{{ $material->brand->node->subcategory_name }}</button>
                </li>
                @if ($material->brand->node->type_id)
                    <li class="inline-flex items-center">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        <button class="text-sm text-gray-500">{{ $material->brand->node->type_name }}</button>
                    </li>
                @endif
                <li class="inline-flex items-center">
                    @if ($material->brand->node->type_id)
                        <a href="{{ route('brand-by-type', $material->brand->node->type_id) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $material->brand->name }}
                        </a>
                    @else
                        <a href="{{ route('brand-by-sub-category', $material->brand->node->subcategory_id) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $material->brand->name }}
                        </a>
                    @endif
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('material-by-brand', $material->brand->id ) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $material->name }}
                    </a>
                </li>
            </ol>
        </div>
        <div>
            @if($colors)
                <h2 class="my-2 text-xl font-fold">All Colors</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($colors as $color)
                        <a href="{{ route('size-by-color', $color->id) }}" class="shadow rounded-lg bg-white p-2">{{ $color->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
