<div>
    @if($brands)
        <h2 class="my-2 text-xl font-fold">All Brands</h2>
        <div class="grid grid-cols-4 gap-5">
            @foreach ($brands as $brand)
                <a href="#" class="shadow rounded-lg bg-white p-2">{{ $brand->brand }}</a>
            @endforeach
        </div>
    @endif
</div>
