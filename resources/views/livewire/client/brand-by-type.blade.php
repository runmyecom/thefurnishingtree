<div class="flex">
    <section class="max-w-7xl mx-auto w-full">
        <div class="py-6">
            @if($brands)
                <h2 class="mb-5 text-xl font-fold">All brands in {{$type}}</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($brands as $brand)
                        <a
                            href="{{ route('item-materials', [$type, str_replace(' ', '-', strtolower($brand->brand))]) }}"
                            class=" bg-white border border-dashed hover:border-gray-400 rounded-xl p-5 font-bold text-center">
                            {{ $brand->brand }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    <style>
        .bg-pat{
            background-color: #f9f9f9;
background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='1' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zM6 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</div>
