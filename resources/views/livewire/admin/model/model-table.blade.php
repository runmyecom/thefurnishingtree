<!-- Table Section -->
<div class="min-w-full">
    <!-- Table -->
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-slate-900">
        <tr>
          <th scope="col" class="ps-6 py-3 text-start">#</th>
          <th scope="col" class="px-6 py-3 text-start" @click="$wire.sortField('name')">
            <div class="flex items-center gap-x-2">
              <x-sort :$sortDirection :$sortBy :field="'name'" />
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Name
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start" @click="$wire.sortField('name')">
            <div class="flex items-center gap-x-2">
              <x-sort :$sortDirection :$sortBy :field="'name'" />
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Model ID
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start">
            <div class="flex items-center gap-x-2">
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Slug
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start">
            <div class="flex items-center gap-x-2">
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Size
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start">
            <div class="flex items-center gap-x-2">
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Created
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-end"></th>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @isset($data)
              @foreach ($data as $item)
              <tr>
                  <td class="h-px w-px whitespace-nowrap">
                      <span class="ps-6 py-3">{{ $loop->iteration }}.</span>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                      <div class="px-6 py-3">
                          <span class="text-sm text-gray-600 dark:text-gray-400">{{ $item->name }}</span>
                      </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                      <div class="px-6 py-3">
                        <span class="py-1 px-3 inline-flex items-center gap-x-1 text-xs bg-violet-50 border border-violet-300 text-violet-600 rounded-full font-bold">
                          {{ $item->id }}
                        </span>
                      </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                      <div class="px-6 py-3">
                          <span class="text-sm text-gray-600 dark:text-gray-400">{{ $item->slug }}</span>
                      </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      <span class="text-sm text-gray-600 dark:text-gray-400">
                        @isset($item->size)
                          {{ $item->size->name }}
                        @endisset
                      </span>
                    </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                    <div class="px-6 py-3">
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $item->created_at }}</span>
                    </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                      <div class="px-6 py-1.5">
                          <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
                              <button id="hs-table-dropdown-1" type="button" class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none transition-all text-sm">
                                  <x-icons.more class="w-4 h-4" />
                              </button>
                              <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden mt-2 divide-y divide-gray-200 min-w-[10rem] z-10 bg-white shadow-xl rounded-lg border border-gray-100" aria-labelledby="hs-table-dropdown-1">
                                  <div class="p-1">
                                      <button type="button" class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100" @click="$dispatch('dispatch-model-table-edit', { id: '{{ $item->id }}' })">
                                          Edit
                                      </button>
                                  </div>
                                  <div class="p-1">
                                      <button type="button" class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100" @click="$dispatch('dispatch-model-table-delete', { id: '{{ $item->id }}', name: '{{ $item->name }}' })">
                                          Delete
                                      </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
              </tr>
              @endforeach
          @endisset
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
<!-- End Table Section -->