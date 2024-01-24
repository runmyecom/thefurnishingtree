<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <button class="text-sm text-gray-500">{{ $color->material->brand->node->subcategory_name }}</button>
                </li>
                @if ($color->material->brand->node->type_id)
                    <li class="inline-flex items-center">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        <button class="text-sm text-gray-500">{{ $color->material->brand->node->type_name }}</button>
                    </li>
                @endif
                <li class="inline-flex items-center">
                    @if ($color->material->brand->node->type_id)
                        <a href="{{ route('brand-by-type', $color->material->brand->node->type_id) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $color->material->brand->name }}
                        </a>
                    @else
                        <a href="{{ route('brand-by-sub-category', $color->material->brand->node->subcategory_id) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $color->material->brand->name }}
                        </a>
                    @endif
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('material-by-brand', $color->material->brand->id ) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $color->material->name }}
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('color-by-material', $color->material->id ) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $color->name }}
                    </a>
                </li>
            </ol>
        </div>
        <div>
            @if($sizes)
                <h2 class="my-2 text-xl font-fold">All Sizes</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($sizes as $size)
                        <a href="{{ route('model-by-size', $size->id) }}" class="shadow rounded-lg bg-white p-2">{{ $size->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
