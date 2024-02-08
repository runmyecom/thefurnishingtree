<div class="">
    <!-- Header -->
    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Total sizes ({{$sizes->count()}})</h2>
        </div>
    </div>
    <!-- End Header -->

    <!-- Table Section -->
    <div class="min-w-full">
        <div class="grid grid-cols-4 gap-5 p-5">
            @isset($sizes)
                @foreach ($sizes as $size)
                    <div class="shadow border text-center rounded-xl p-3">{{ $size->size }}</div>
                @endforeach
            @endisset
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-gray-700">
        <div class="w-full">
            {{ $sizes->onEachSide(1)->links() }}
        </div>
        </div>
    </div>
    <!-- End Table Section -->


</div>
