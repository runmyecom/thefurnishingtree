<div>
    <!-- Table -->
    <div class="w-full">
        <table class="min-w-full h-full divide-y divide-gray-200">
            <thead class="border-t">
                <th scope="col" class="py-3 text-start w-[20%] pl-6">
                    <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                        SKU
                    </span>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Item Name
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Selling Price
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($data as $item)
                <tr class="text-[13px]">
                    <td class="h-px w-px">
                        <div class="px-6">{{ Str::limit($item->sku, 50) }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ Str::limit($item->item_name, 50) }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $item->selling_price }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6 py-1.5">
                            <div class="flex items-center gap-2">
                                <button type="button" class="" @click="$dispatch('dispatch-item-table-edit', { id: '{{ $item->id }}' })">
                                    <x-icons.edit class="w-5 h-5" />
                                </button>
                                <button type="button" class="" @click="$dispatch('dispatch-item-table-delete', { id: '{{ $item->id }}', name: '{{ $item->name }}' })">
                                    <x-icons.delete class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- End Table -->

        <!-- Footer -->
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
            <select wire:model.live="paginate" class="py-2 px-3 pe-9 block w-20 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
            <div class="w-full">
                {{ $data->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
</div>
