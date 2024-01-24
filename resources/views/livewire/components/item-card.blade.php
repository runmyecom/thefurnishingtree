<div>
    <a class="flex flex-col group bg-white rounded-xl transition dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]" href="{{ route('item-by-model', $item->model_id) }}">
        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-xl overflow-hidden h-[50vh] group shadow-xl">
            <img class="w-full h-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl" src="{{$item->image_1}}" alt="Image Description">
            <div class="action-btn flex flex-col gap-4 absolute top-4 right-4">
                <button class="bg-white p-3 rounded-full shadow-xl group-hover:block hidden">
                    <x-icons.wishlist class="h-5 w-5" />
                </button>
                <button class="bg-white p-3 rounded-full shadow-xl group-hover:block hidden">
                    <x-icons.cart class="h-5 w-5" />
                </button>
            </div>
        </div>
        <div class="">
          <h3 class="text-lg mt-2 font-bold text-gray-800 dark:text-white">
            {{ Str::limit($item->item_name, 30) }}
          </h3>
          <p class=" text-gray-500 dark:text-gray-400">
            ${{ $item->selling_price }}
          </p>
        </div>
    </a>
</div>
