<div>
    @if($items)
        <div class="grid grid-cols-3 gap-6">
            @foreach($items as $item)
                <div class="card shadow-xl rounded-xl p-1">
                    <img src="{{$item->image_1}}" alt="{{$item->item_name}}" class="h-60 w-full object-cover rounded-lg">
                    <div class="text-sm p-2">{{ Str::limit($item->item_name, 45) }}</div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Footer -->
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
