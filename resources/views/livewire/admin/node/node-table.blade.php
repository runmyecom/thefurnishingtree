<!-- Table Section -->
<div class="min-w-full">
    <!-- Table -->
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
      <thead class="bg-gray-50 dark:bg-slate-900">
        <tr>
          <th scope="col" class="px-6 py-3 text-start" @click="$wire.sortField('id')">
            <div class="flex items-center gap-x-2">
              <x-sort :$sortDirection :$sortBy :field="'uuid'" />
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Node ID
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start" @click="$wire.sortField('category_name')">
            <div class="flex items-center gap-x-2">
              <x-sort :$sortDirection :$sortBy :field="'category_name'" />
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Category
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start" @click="$wire.sortField('subcategory_name')">
            <div class="flex items-center gap-x-2">
              <x-sort :$sortDirection :$sortBy :field="'subcategory_name'" />
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Sub-Category
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-start">
            <div class="flex items-center gap-x-2">
              <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                Type
              </span>
            </div>
          </th>

          <th scope="col" class="px-6 py-3 text-end"></th>
        </tr>
        <tr>
          <td class="p-2 border border-spacing-1"></td>
          <td class="p-2 border border-spacing-1">
            <x-input wire:model.live="form.category_name" type="search" class="w-full text-sm" />
          </td>
          <td class="p-2 border border-spacing-1">
            <x-input wire:model.live="form.subcategory_name" type="search" class="w-full text-sm" />
          </td>
          <td class="p-2 border border-spacing-1">
            <x-input wire:model.live="form.type_name" type="search" class="w-full text-sm" />
          </td>
          <td class="p-2 border border-spacing-1"></td>
        </tr>
      </thead>

      <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
          @isset($data)
              @foreach ($data as $item)
              <tr>
                  <td class="h-px w-px whitespace-nowrap bg-gray-50 border-r">
                      <div class="px-6 py-3">
                          <span class="text-sm rounded-lg">{{ $item->id }}</span>
                      </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                      <div class="px-6 py-3">
                        <span class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-purple-50 border border-purple-200 text-purple-500 rounded-full">
                          {{ $item->category_name }}
                        </span>
                      </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                      <div class="px-6 py-3">
                        @if($item->subcategory_name)
                          <span class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-orange-50 border border-orange-200 text-orange-500 rounded-full">
                            {{ $item->subcategory_name }}
                          </span>
                        @endif
                      </div>
                  </div>
                  </td>
                  <td class="h-px w-px whitespace-nowrap">
                    <div class="px-6 py-3">
                      @if($item->type_name)
                      <span class="py-1 px-3 inline-flex items-center gap-x-1 text-xs font-medium bg-gray-50 border border-gray-200 text-gray-500 rounded-full">
                        {{ $item->type_name }}
                      </span>
                      @endif
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
                                      <button type="button" class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100" @click="$dispatch('dispatch-subitem-table-edit', { id: '{{ $item->id }}' })">
                                          Edit
                                      </button>
                                  </div>
                                  <div class="p-1">
                                      <button type="button" class="w-full flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100" @click="$dispatch('dispatch-subitem-table-delete', { id: '{{ $item->id }}', name: '{{ $item->name }}' })">
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
