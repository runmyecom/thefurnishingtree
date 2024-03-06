<div>
    <nav class="flex items-center border-b">
        <div class="w-[20vw] px-6 py-4">
            <h3 class="font-bold uppercase">Filters</h3>
        </div>
        <div class="gap-5 hidden">
            <button class="text-sm flex items-center gap-1 rounded-lg hover:bg-gray-100 px-2 py-1">
                Brand
                <x-icons.caretdown class="w-5 h-5 text-gray-500" />
            </button>
            <button class="text-sm flex items-center gap-1 rounded-lg hover:bg-gray-100 px-2 py-1">
                Model
                <x-icons.caretdown class="w-5 h-5 text-gray-500" />
            </button>
        </div>

        {{-- selected Filters --}}
        <div class="flex ml-auto pr-5 gap-3">
            @if ($brandInputs)
                <div class="flex items-center gap-3">
                    @foreach ($brandInputs as $input)
                        <span class="text-xs px-3 py-1 rounded-xl border border-red-200 bg-red-50/50 text-red-500">{{ $input }}</span>
                    @endforeach
                </div>
            @endif
            @if ($sizeInputs)
                <div class="flex items-center gap-3">
                    @foreach ($sizeInputs as $input)
                        <span class="text-xs px-3 py-1 rounded-xl border border-indigo-200 bg-indigo-50/50 text-indigo-500">{{ $input }}</span>
                    @endforeach
                </div>
            @endif
            @if ($modelInputs)
                <div class="flex items-center gap-3">
                    @foreach ($modelInputs as $input)
                        <span class="text-xs px-3 py-1 rounded-xl border border-purple-200 bg-purple-50/50 text-purple-500">{{ $input }}</span>
                    @endforeach
                </div>
            @endif
            @if ($materialInputs)
                <div class="flex items-center gap-3">
                    @foreach ($materialInputs as $input)
                        <span class="text-xs border border-blue-200 px-3 py-1 rounded-xl bg-blue-50/50 text-blue-500">{{ $input }}</span>
                    @endforeach
                </div>
            @endif
            @if ($colorInputs)
                <div class="flex items-center gap-3">
                    @foreach ($colorInputs as $input)
                        <span class="text-xs border border-green-200 px-3 py-1 rounded-xl bg-green-50/50 text-green-500">{{ $input }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </nav>

    <div class="flex">
        <aside class="w-[20vw] border-r">
            <section class="border-b px-6 py-5 ">
                <h3 class="text-[13px] uppercase font-bold">Brand</h3>
                <div class="max-h-48 h-full overflow-y-auto">
                    @foreach ($brands as $brand)
                    <label for="brand">
                        <div class="text-[13px] flex items-center gap-2 mt-2">
                            <input type="checkbox" value="{{$brand->brand}}" wire:model.live="brandInputs" />
                            {{ $brand->brand}}
                        </div>
                    </label>
                    @endforeach
                </div>
            </section>
            <section class="border-b px-6 py-5">
                <h3 class="text-[13px] uppercase font-bold">Size</h3>
                <div class="max-h-48 h-full overflow-y-auto">
                    @foreach ($sizes as $size)
                        <label for="size">
                            <div class="text-[13px] flex items-center gap-2 mt-2">
                                <input type="checkbox" value="{{$size->size}}" wire:model.live="sizeInputs" />
                                {{ $size->size}}
                            </div>
                        </label>
                    @endforeach
                </div>
            </section>
            <section class="border-b px-6 py-5">
                <h3 class="text-[13px] uppercase font-bold">Model</h3>
                <div class="max-h-48 h-full overflow-y-auto">
                    @foreach ($models as $model)
                        <label for="model">
                            <div class="text-[13px] flex items-center gap-2 mt-2">
                                <input type="checkbox" value="{{$model->model}}" wire:model.live="modelInputs" />
                                {{ $model->model}}
                            </div>
                        </label>
                    @endforeach
                </div>
            </section>
            <section class="border-b px-6 py-5">
                <h3 class="text-[13px] uppercase font-bold">Material</h3>
                <div class="max-h-48 h-full overflow-y-auto">
                    @foreach ($materials as $material)
                        <label for="material">
                            <div class="text-[13px] flex items-center gap-2 mt-2">
                                <input type="checkbox" value="{{$material->material}}" wire:model.live="materialInputs" />
                                {{ $material->material}}
                            </div>
                        </label>
                    @endforeach
                </div>
            </section>
            <section class="border-b px-6 py-5">
                <h3 class="text-[13px] uppercase font-bold">Color</h3>
                <div class="max-h-48 h-full overflow-y-auto">
                    @foreach ($colors as $color)
                        <label for="color">
                            <div class="text-[13px] flex items-center gap-2 mt-2">
                                <input type="checkbox" value="{{$color->color}}" wire:model.live="colorInputs" />
                                {{ $color->color}}
                            </div>
                        </label>
                    @endforeach
                </div>
            </section>
        </aside>

        {{-- All Item List --}}
        <div class="w-[80vw] p-8">

            @if($items)
                <div class="grid grid-cols-4 gap-6">
                    @foreach($items as $item)
                        <div class="card">
                            <a href="{{ route('singleItem', $item->slug) }}">
                                <img src="{{$item->image_1}}" alt="{{$item->item_name}}" class="h-60 w-full object-cover rounded">
                            </a>
                            <div class="p-2">
                                <h3 class="">{{ Str::limit($item->item_name, 45) }}</h3>
                                <div class="text-sm flex items-center gap-2">
                                    <span class="font-bold">Rs. {{ $item->selling_price }}</span>
                                    <span class="text-xs text-gray-500 line-through">Rs.{{ $item->mrp }}</span>
                                </div>
                                {{-- <p class="text-xs">Brand: {{$item->brand}}</p>
                                <p class="text-xs">Material: {{$item->material}}</p>
                                <p class="text-xs">Color: {{$item->color}}</p>
                                <p class="text-xs">Size: {{$item->size}}</p>
                                <p class="text-xs">Model: {{$item->model}}</p> --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Pagination -->
            @if($items)
                <div class="mt-5 py-4 grid gap-3 md:flex md:justify-between md:items-center">
                    <select wire:model.live="paginate" class="py-2 px-3 pe-9 block w-20 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <div class="w-full">
                        {{ $items->onEachSide(1)->links() }}
                    </div>
                </div>
            @endif

        </div>
    </div>
</div>
