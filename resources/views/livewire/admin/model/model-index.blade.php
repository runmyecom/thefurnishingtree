<div class="">
    <!-- Header -->
    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Item Model</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Manage, add, edit & delete Item Model.</p>
        </div>

        <div>
            <div class="inline-flex gap-x-2">
                <livewire:admin.model.model-create />
            </div>
        </div>
    </div>
    <!-- End Header -->

    <livewire:admin.model.model-edit />
    <livewire:admin.model.model-delete />
    <livewire:admin.model.model-table />

</div>
