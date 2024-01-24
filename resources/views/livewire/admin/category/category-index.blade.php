<div class="">
    <!-- Header -->
    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Categories</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Manage, add, edit & delete category.</p>
        </div>

        <div>
            <div class="inline-flex gap-x-2">
                {{-- <x-outline-button>
                    <a href="/category/bulk-update" class="flex items-center gap-2">
                        <x-icons.excel class="w-4 h-4 text-gray-700" />
                        Bulk Update
                    </a>
                </x-outline-button> --}}
                <x-outline-button>
                    <a href="/category/bulk-upload" class="flex items-center gap-2">
                        <x-icons.excel class="w-4 h-4 text-gray-700" />
                        Bulk Upload
                    </a>
                </x-outline-button>
                <livewire:admin.category.category-create />
            </div>
        </div>
    </div>
    <!-- End Header -->

    <livewire:admin.category.category-edit />
    <livewire:admin.category.category-delete />
    <livewire:admin.category.category-table />

</div>
