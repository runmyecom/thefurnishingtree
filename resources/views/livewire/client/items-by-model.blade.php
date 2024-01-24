<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <ol class="flex items-center whitespace-nowrap" aria-label="Breadcrumb">
                <li class="inline-flex items-center">
                    <button class="text-sm text-gray-500">{{ $item->model->size->color->material->brand->node->subcategory_name }}</button>
                </li>
                @if ($item->model->size->color->material->brand->node->type_id)
                    <li class="inline-flex items-center">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        <button class="text-sm text-gray-500">{{ $item->model->size->color->material->brand->node->type_name }}</button>
                    </li>
                @endif
                <li class="inline-flex items-center">
                    @if ($item->model->size->color->material->brand->node->type_id)
                        <a href="{{ route('brand-by-type', $item->model->size->color->material->brand->node->type_id) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $item->model->size->color->material->brand->name }}
                        </a>
                    @else
                        <a href="{{ route('brand-by-sub-category', $item->model->size->color->material->brand->node->subcategory_id) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                            <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                            {{ $item->model->size->color->material->brand->name }}
                        </a>
                    @endif
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('material-by-brand', $item->model->size->color->material->brand->id ) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $item->model->size->color->material->name }}
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('color-by-material', $item->model->size->color->material->id ) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $item->model->size->color->name }}
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('size-by-color', $item->model->size->color->id ) }}" class="flex items-center text-sm text-gray-500 hover:text-gray-800">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $item->model->size->name }}
                    </a>
                </li>
                <li class="inline-flex items-center">
                    <a href="{{ route('model-by-size', $item->model->size->id ) }}" class="flex items-center text-sm text-gray-800 font-semibold ">
                        <x-icons.arrowright class="flex-shrink-0 h-4 w-4 text-gray-400 mx-2" />
                        {{ $item->model->name }}
                    </a>
                </li>
            </ol>
        </div>
        <div class="w-full">
            @if($item)
                <div class="grid md:grid-cols-2 gap-12">
                    <div class="card shadow-xl rounded-xl p-1">
                        <img src="{{$item->image_1}}" alt="{{$item->item_name}}" class="h-[75vh] w-full object-cover rounded-lg">
                    </div>
                    <div class="w-full">
                        <section class="">
                            <div class="text-2xl">{{ $item->item_name }}</div>
                            <p class="font-semibold text-blue-600">Brand: {{ $item->model->size->color->material->brand->name }}</p>
                        </section>
                        <hr class="my-5" />
                        <section>
                            <div>
                                <span class="text-red-500 text-xl">-{{$discount}}%</span>
                                <span class="text-[2em]">₹{{ $item->selling_price }}</span>
                            </div>
                            <h3 class=" text-gray-600 text-sm font-semibold">M.R.P.:
                                <span class="line-through">{{ $item->mrp }}</span>
                            </h3>
                        </section>
                        <hr class="my-5" />
                        <section>
                            <div class="flex items-center gap-6">
                                <!-- Input Number -->
                                <div class="py-2 px-3 bg-white border border-gray-200 rounded-lg dark:bg-slate-900 dark:border-gray-700" data-hs-input-number>
                                    <div class="w-full flex justify-between items-center gap-x-5">
                                        <div class="grow">
                                            <span class="block text-xs text-gray-500 dark:text-gray-400">
                                            Select quantity
                                            </span>
                                            <input class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-white" type="number" min="1" max="100" data-hs-input-number-input wire:model="qty" readonly>
                                        </div>
                                        <div class="flex justify-end items-center gap-x-1.5 mt-2">
                                            <button type="button" class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-decrement>
                                                <span class="text-lg">-</span>
                                            </button>
                                            <button type="button" class="w-6 h-6 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-input-number-increment>
                                                <span class="text-lg">+</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input Number -->
                                <button class="text-center px-12 rounded-lg border hover:bg-gray-800 hover:text-white h-10" wire:click="addToCart( {{ $item->id }} )">Add to cart</button>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
