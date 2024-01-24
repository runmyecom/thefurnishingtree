<div class="">
    <!-- Header -->
    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Sizes</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Manage, add, edit & delete sizes.</p>
        </div>

        <div>
            <div class="inline-flex gap-x-2">
                <livewire:admin.size.size-create />
            </div>
        </div>
    </div>
    <!-- End Header -->

    <livewire:admin.size.size-edit />
    <livewire:admin.size.size-delete />
    <livewire:admin.size.size-table />

</div>
