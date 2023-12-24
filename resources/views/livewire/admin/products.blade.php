<div>
    <div class="header-section flex items-center justify-between border-b p-6 border-dashed">
        <button>Products</button>
        <div class="flex items-center gap-2">
            <!-- Import Product CSV -->
            <x-outline-button data-hs-overlay="#import-products">
                Import Products
            </x-outline-button>

            <div id="import-products" class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[60] overflow-x-hidden overflow-y-auto pointer-events-none">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-2xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                    <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl">
                        <div class="flex justify-between items-center py-3 px-4 border-b">
                            <h3 class="font-bold text-gray-800">Import products list</h3>
                            <button type="button" class="flex justify-center items-center w-7 h-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#import-products">
                            <span class="sr-only">Close</span>
                            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            </button>
                        </div>
                        <div class="p-6 overflow-y-auto">
                            <p class="text-gray-500">Through imports you can add or update products. To update existing products/variants you must set an existing id in the Product/Variant id columns. If the value is unset a new record will be created. You will be asked for confirmation before we import products.</p>
                            <div class="border-2 border-dashed rounded-xl flex flex-col items-center justify-center py-8 cursor-pointer hover:border-teal-400 my-6">
                                <h3 class="">Click to browse</h3>
                                <p class="text-sm text-gray-500">Only .csv files are supported.</p>
                            </div>
                            <p class="font-bold">Unsure about how to arrange your list?</p>
                            <p>Download the template below to ensure you are following the correct format.</p>
                            <!-- Sample -->
                            <div class="border-2 rounded-xl flex items-center justify-between p-8 my-6">
                                <div class="flex gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252c.19.061.411.091.665.091c.338 0 .624-.053.859-.158c.236-.105.416-.252.539-.44c.125-.189.187-.408.187-.656c0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357a2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176a.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384c.125-.101.296-.152.512-.152c.143 0 .266.023.37.068a.624.624 0 0 1 .246.181a.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566a1.21 1.21 0 0 0-.5-.41a1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15c-.225.099-.4.24-.527.421c-.127.182-.19.395-.19.639c0 .201.04.376.122.524c.082.149.2.27.352.367c.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326a.505.505 0 0 1-.085.29a.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07c-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115a.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399a.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26a.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964a1.441 1.441 0 0 0-.489-.272a1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223c-.25.148-.44.359-.572.632c-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976c.131.271.322.48.572.626c.25.145.554.217.914.217c.293 0 .554-.055.785-.164c.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363a.7.7 0 0 1-.272.25a.874.874 0 0 1-.401.087a.845.845 0 0 1-.478-.132a.833.833 0 0 1-.299-.392a1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z"/></svg>
                                    <div >
                                        <h3 class="text-sm">Click to browse</h3>
                                        <p class="text-xs text-gray-500">Only .csv files are supported.</p>
                                    </div>
                                </div>
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M3 15c0 2.828 0 4.243.879 5.121C4.757 21 6.172 21 9 21h6c2.828 0 4.243 0 5.121-.879C21 19.243 21 17.828 21 15" opacity=".5"/><path d="M12 3v13m0 0l4-4.375M12 16l-4-4.375"/></g></svg>
                                </button>
                            </div>
                        </div>
                        <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-[13px] font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-vertically-centered-modal">
                                Cancel
                            </button>
                            <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-[13px] font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none">
                                Import List
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Export Product -->
            <x-outline-button>Export Products</x-outline-button>
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
                            Collection
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Status
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Availability
                        </span>
                    </div>
                </th>

                <th scope="col" class="px-6 py-3 text-start">
                    <div class="flex gap-x-2">
                        <span class="text-[13px] font-semibold tracking-wide text-gray-800">
                            Inventory
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
                        <div class="px-6">Merch</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span class="py-1 px-1.5 flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="w-2.5 h-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                                </svg>
                                Published
                            </span>
                        </div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">Default Sales Channel</div>
                    </td>
                    <td class="h-px w-px whitespace-nowrap">
                        <div class="px-6">800 in stock for 8 variant(s)</div>
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
