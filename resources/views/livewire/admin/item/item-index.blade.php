<div class="">
    <!-- Header -->
    <div class="header-section flex items-center justify-between border-b p-6 border-dashed">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Items</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Manage, add, edit & delete items.</p>
        </div>
        <div class="flex items-center gap-2">
            <!-- Import Product -->
            <x-outline-button><a href="/items/bulk-upload">Import Item</a></x-outline-button>

            <!-- Export Product -->
            <livewire:export-sheet />

            <!-- Add New Product -->
            <x-outline-button><a href="/products/create">New Item</a></x-outline-button>
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
    <!-- End Header -->

    <livewire:admin.item.item-edit />
    <livewire:admin.item.item-delete />
    <livewire:admin.item.item-table />

</div>
