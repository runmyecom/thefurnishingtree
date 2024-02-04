<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <button class="text-sm text-gray-500">{{ $node->subcategory_name }}</button>
                </li>
                <li class="inline-flex items-center">
                    @if ($node->type_id)
                        <a class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $node->type_name }}
                        </a>
                    @else
                        <a class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $node->subcategory_name }}
                        </a>
                    @endif
                </li>
            </ol>
        </div>
        <div>
            @if($brands)
                <h2 class="my-2 text-xl font-fold">All Brands</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($brands as $brand)
                        <a href="{{ route('item-materials', [$type_name, str_replace(' ', '-', strtolower($brand->brand))]) }}" class="shadow rounded-lg bg-white p-2">{{ $brand->brand }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
