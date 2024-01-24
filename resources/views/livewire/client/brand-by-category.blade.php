<div class="flex">
    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <button class="text-sm text-gray-500">{{ $node->subcategory_name }}</button>
                </li>
            </ol>
        </div>
        <div>
            @if($brands->isNotEmpty())
                <h2 class="my-2 text-xl font-fold">All Brands</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($brands as $brand)
                        <a href="{{ route('material-by-brand', $brand->id) }}" class="shadow rounded-lg bg-white p-2">{{ $brand->name }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
