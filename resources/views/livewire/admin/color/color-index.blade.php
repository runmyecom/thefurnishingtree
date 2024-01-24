<div class="">
    <!-- Header -->
    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Colors</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Manage, add, edit & delete colors.</p>
        </div>

        <div>
            <div class="inline-flex gap-x-2">
                <livewire:admin.color.color-create />
            </div>
        </div>
    </div>
    <!-- End Header -->

    <livewire:admin.color.color-edit />
    <livewire:admin.color.color-delete />
    <livewire:admin.color.color-table />

</div>
