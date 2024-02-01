<div>
    <!-- Table -->
    <div class="w-full">
        <table class="min-w-full h-full divide-y divide-gray-200">
            <thead class="border-t">
                <th scope="col" class="py-3 text-start w-[20%] pl-6">
                    <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                        Name
                    </span>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Dimension
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

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Item Model
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Is Featured
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-end"></th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                @foreach($data as $item)
                <tr class="text-[13px]">
                    <td class="h-px w-[20%] pl-6">
                        <div class="flex items-center gap-2">
                            <span>{{ Str::limit($item->item_name, 45) }}</span>
                        </div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $item->dimension }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $item->selling_price }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $item->model }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $item->is_featured }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6 py-1.5">
                            <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                                <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-0 hover:bg-gray-50 transition-all text-sm">
                                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                                </button>
                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-10 bg-white shadow-2xl rounded-lg p-2" aria-labelledby="hs-table-dropdown-1">
                                    <div class="py-2 first:pt-0 last:pb-0">
                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                        Rename
                                        </a>
                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                        Regenrate Key
                                        </a>
                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500" href="#">
                                        Disable
                                        </a>
                                    </div>
                                    <div class="py-2 first:pt-0 last:pb-0">
                                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500" href="#">
                                        Delete
                                        </a>
                                    </div>
                                </div>
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
