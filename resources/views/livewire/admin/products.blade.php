<div>
    <div class="header-section flex items-center justify-between border-b p-6 border-dashed">
        <button>Products</button>
        <div class="flex items-center gap-2">
            <!-- Import Product -->
            <x-outline-button><a href="/products/bulk-upload">Import Product</a></x-outline-button>

            <!-- Export Product -->
            <livewire:export-sheet />

            <!-- Add New Product -->
            <x-outline-button><a href="/products/create">New Product</a></x-outline-button>
        </div>
    </div>
    <div class="flex items-center justify-between w-full p-6">
        <div class="buttons-group flex items-center gap-2">
            <x-outline-button>Filters</x-outline-button>
        </div>
        <div class="flex items-center gap-4">
            <input type="search" placeholder="Search product..." class="w-60 h-8 pl-4 pr-4 text-sm bg rounded-lg border border-gray-500 focus:outline-none ring-gray-400">
            <button><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.66669 5H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.66669 10H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M6.66669 15H17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2.5 5H2.50875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2.5 10H2.50875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M2.5 15H2.50875" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
            <button><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.5 3.5H3.5V8.5H8.5V3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16.5 3.5H11.5V8.5H16.5V3.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16.5 11.5H11.5V16.5H16.5V11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.5 11.5H3.5V16.5H8.5V11.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg></button>
        </div>
    </div>
    <!-- Table -->
    <div class="w-full">
        <table class="min-w-full divide-y divide-gray-200">
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
                            Category
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
                @foreach($products as $product)
                <tr class="text-[13px]">
                    <td class="h-px whitespace-nowrap w-[20%] pl-6">
                        <div class="flex items-center gap-2">
                            <img src="/images/p-1.jpeg" alt="" class="w-12 h-full object-cover rounded">
                            <span>{{ $product->name }}</span>
                        </div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $product->dimension }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $product->selling_price }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $product->category->name }}</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">{{ $product->is_featured }}</div>
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
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
            <div>
                <p class="text-sm text-gray-600">
                <span class="font-semibold text-gray-800">6</span> results
                </p>
            </div>

            <div>
                <div class="inline-flex gap-x-2">
                    <!-- Pagination -->
                    <nav class="flex items-center gap-x-1">
                        <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-xs rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                            <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                            <span aria-hidden="true" class="sr-only">Previous</span>
                        </button>
                        <div class="flex items-center gap-x-1">
                            <span class="min-h-[32px] min-w-[32px] flex justify-center items-center border border-gray-200 text-gray-800 py-2 px-3 text-xs rounded-lg focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">1</span>
                            <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-xs">of</span>
                            <span class="min-h-[38px] flex justify-center items-center text-gray-500 py-2 px-1.5 text-xs">3</span>
                        </div>
                        <button type="button" class="min-h-[38px] min-w-[38px] py-2 px-2.5 inline-flex justify-center items-center gap-x-2 text-xs rounded-lg text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                            <span aria-hidden="true" class="sr-only">Next</span>
                            <svg class="flex-shrink-0 w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </button>
                    </nav>
                    <!-- End Pagination -->
                </div>
            </div>
        </div>
        <!-- End Footer -->
    </div>
</div>
