<div class="flex">

    <section class="max-w-7xl mx-auto w-full py-12">
        <div class="w-full">
            @if($item)
                <div class="grid md:grid-cols-2 gap-12">
                    {{-- <div class="card shadow-xl rounded-xl p-1 h-[75vh]"> --}}
                    <div class="image-gallery grid grid-cols-2 gap-4">
                        <img src="{{$item->image_1}}" alt="{{$item->item_name}}" class="h-[60vh] w-full object-cover rounded-lg shadow">
                        <img src="{{$item->image_2}}" alt="{{$item->item_name}}" class="h-[60vh] w-full object-cover rounded-lg shadow">
                        <img src="{{$item->image_3}}" alt="{{$item->item_name}}" class="h-[60vh] w-full object-cover rounded-lg shadow">
                        <img src="{{$item->image_4}}" alt="{{$item->item_name}}" class="h-[60vh] w-full object-cover rounded-lg shadow">
                        <img src="{{$item->image_5}}" alt="{{$item->item_name}}" class="h-[60vh] w-full object-cover rounded-lg shadow">
                        <img src="{{$item->image_6}}" alt="{{$item->item_name}}" class="h-[60vh] w-full object-cover rounded-lg shadow">
                    </div>
                    <div class="w-full">
                        <section class="">
                            <div class="text-2xl">{{ $item->item_name }}</div>
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
                            <p class="text-gray-700 mb-4">{{ $item->description }} Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam ea, saepe doloremque veritatis ad aperiam impedit accusantium quod cum, soluta alias rerum iure illum animi obcaecati atque illo vero provident.</p>
                            <ul class="text-gray-700 list-disc pl-8">
                                <li>{{ $item->bullet_1 }}</li>
                                <li>{{ $item->bullet_2 }}</li>
                                <li>{{ $item->bullet_3 }}</li>
                                <li>{{ $item->bullet_4 }}</li>
                                <li>{{ $item->bullet_5 }}</li>
                                <li>{{ $item->bullet_6 }}</li>
                            </ul>
                        </section>

                        <hr class="my-5" />

                        {{-- Product Dimensions --}}
                        <section class="mb-10">
                            <h3 class="font-bold uppercase flex items-center gap-2 mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 15 15"><path fill="currentColor" fill-rule="evenodd" d="M3 2.739a.25.25 0 0 1-.403.197L1.004 1.697a.25.25 0 0 1 0-.394L2.597.063A.25.25 0 0 1 3 .262v.74h6V.26a.25.25 0 0 1 .404-.197l1.592 1.239a.25.25 0 0 1 0 .394l-1.592 1.24A.25.25 0 0 1 9 2.738V2H3zM9.5 5h-7a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.5-.5m-7-1A1.5 1.5 0 0 0 1 5.5v7A1.5 1.5 0 0 0 2.5 14h7a1.5 1.5 0 0 0 1.5-1.5v-7A1.5 1.5 0 0 0 9.5 4zm12.239 2H14v6h.739a.25.25 0 0 1 .197.403l-1.239 1.593a.25.25 0 0 1-.394 0l-1.24-1.593a.25.25 0 0 1 .198-.403H13V6h-.739a.25.25 0 0 1-.197-.403l1.239-1.593a.25.25 0 0 1 .394 0l1.24 1.593a.25.25 0 0 1-.198.403" clip-rule="evenodd"/></svg>
                                DIMENSIONS
                            </h3>
                            <div class="grid grid-cols-2 md:grid-cols-4">
                                <div class="border p-3">
                                    <h5 class="text-xs text-gray-500">Item Height</h5>
                                    <h3>{{ $item->item_height }} {{ $item->item_height_unit }}</h3>
                                </div>
                                <div class="border p-3">
                                    <h5 class="text-xs text-gray-500">Item Width</h5>
                                    <h3>{{ $item->item_width }} {{ $item->item_width_unit }}</h3>
                                </div>
                                <div class="border p-3">
                                    <h5 class="text-xs text-gray-500">Item Length</h5>
                                    <h3>{{ $item->item_length }} {{ $item->item_length_unit }}</h3>
                                </div>
                                <div class="border p-3">
                                    <h5 class="text-xs text-gray-500">Item Weight</h5>
                                    <h3>{{ $item->item_weight }} {{ $item->item_weight_unit }}</h3>
                                </div>
                            </div>
                        </section>

                        {{-- <hr class="my-5" /> --}}

                        {{-- Product Details --}}
                        <section>
                            <h3 class="font-bold uppercase flex items-center gap-2 mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"><g fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"><path d="M5.25 14.5a.75.75 0 0 1 .75-.75h8a.75.75 0 1 1 0 1.5H6a.75.75 0 0 1-.75-.75m0 3.5a.75.75 0 0 1 .75-.75h5.5a.75.75 0 0 1 0 1.5H6a.75.75 0 0 1-.75-.75"/><path d="M12.25 2.834c-.46-.078-1.088-.084-2.22-.084c-1.917 0-3.28.002-4.312.14c-1.012.135-1.593.39-2.016.812c-.423.423-.677 1.003-.812 2.009c-.138 1.028-.14 2.382-.14 4.29v4c0 1.906.002 3.26.14 4.288c.135 1.006.389 1.586.812 2.01c.423.422 1.003.676 2.009.811c1.028.139 2.382.14 4.289.14h4c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812c.423-.423.677-1.003.812-2.009c.138-1.027.14-2.382.14-4.289v-.437c0-1.536-.01-2.264-.174-2.813h-3.13c-1.133 0-2.058 0-2.79-.098c-.763-.103-1.425-.325-1.954-.854c-.529-.529-.751-1.19-.854-1.955c-.098-.73-.098-1.656-.098-2.79zm1.5.776V5c0 1.2.002 2.024.085 2.643c.08.598.224.891.428 1.094c.203.204.496.348 1.094.428c.619.083 1.443.085 2.643.085h2.02a45.815 45.815 0 0 0-1.17-1.076l-3.959-3.563A37.2 37.2 0 0 0 13.75 3.61m-3.575-2.36c1.385 0 2.28 0 3.103.315c.823.316 1.485.912 2.51 1.835l.107.096l3.958 3.563l.125.112c1.184 1.065 1.95 1.754 2.361 2.678c.412.924.412 1.954.411 3.546v.661c0 1.838 0 3.294-.153 4.433c-.158 1.172-.49 2.121-1.238 2.87c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153H9.944c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433V9.945c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.75-.749 1.701-1.08 2.878-1.238c1.144-.153 2.607-.153 4.455-.153h.056z"/></g></svg>
                                PRODUCT DETAILS
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                <div class="border-b py-1">
                                    <h5 class="text-xs text-gray-500">Brand</h5>
                                    <h3>{{ $item->brand }}</h3>
                                </div>
                                <div class="border-b py-1">
                                    <h5 class="text-xs text-gray-500">Material</h5>
                                    <h3>{{ $item->material }}</h3>
                                </div>
                                <div class="border-b py-1">
                                    <h5 class="text-xs text-gray-500">Color</h5>
                                    <h3>{{ $item->color }}</h3>
                                </div>
                                <div class="border-b py-1">
                                    <h5 class="text-xs text-gray-500">Size</h5>
                                    <h3>{{ $item->size }}</h3>
                                </div>
                                <div class="py-1">
                                    <h5 class="text-xs text-gray-500">Model</h5>
                                    <h3>{{ $item->model }}</h3>
                                </div>
                            </div>

                            <div class="flex items-center gap-5 border-t mt-5 pt-4">
                                <div>Enter your own dimensions:</div>
                                <input type="text" placeholder="Enter dimensions" class="text-sm rounded-lg border-gray-300 focus:outline-none"/>
                            </div>
                        </section>

                        <hr class="my-5" />

                        <section>
                            <div class="flex items-center gap-6">
                                <button class="text-center bg-gray-100 px-12 rounded-lg border hover:bg-gray-800 hover:text-white h-12 flex items-center gap-2" wire:click="addToCart( {{ $item->id }} )">
                                    <x-icons.cart class="w-5 h-5" />
                                    Add To Cart
                                </button>
                                <button class="text-center px-12 rounded-lg border hover:bg-pink-600 hover:text-white h-12 flex items-center gap-2" wire:click="addToCart( {{ $item->id }} )">
                                    <x-icons.wishlist class="w-5 h-5" />
                                    Wishlist
                                </button>
                            </div>
                        </section>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>
