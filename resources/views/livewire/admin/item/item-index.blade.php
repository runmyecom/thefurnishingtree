<div class="">
    <!-- Header -->
    <div class="header-section flex items-center justify-between border-b p-6 border-dashed">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Items</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400">Manage, add, edit & delete items.</p>
        </div>
        <div>
            <div class="inline-flex gap-x-2">
                <div class="flex justify-center">
                    <div
                        x-data="{
                            open: false,
                            toggle() {
                                if (this.open) {
                                    return this.close()
                                }

                                this.$refs.button.focus()

                                this.open = true
                            },
                            close(focusAfter) {
                                if (! this.open) return

                                this.open = false

                                focusAfter && focusAfter.focus()
                            }
                        }"
                        x-on:keydown.escape.prevent.stop="close($refs.button)"
                        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
                        x-id="['dropdown-button']"
                        class="relative"
                    >
                        <!-- Button -->
                        <button
                            x-ref="button"
                            x-on:click="toggle()"
                            :aria-expanded="open"
                            :aria-controls="$id('dropdown-button')"
                            type="button"
                            class="text-[13px] border font-semibold px-4 py-1.5 rounded-lg flex items-center gap-1"
                        >
                            <x-icons.excel class="w-4 h-4 text-gray-700" />
                            Bulk actions

                            <!-- Heroicon: chevron-down -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Panel -->
                        <div
                            x-ref="panel"
                            x-show="open"
                            x-transition.origin.top.left
                            x-on:click.outside="close($refs.button)"
                            :id="$id('dropdown-button')"
                            style="display: none;"
                            class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md"
                        >
                            <a href="/items/bulk-upload" class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                <x-icons.upload class="w-5 h-5 text-gray-700" />
                                <span class="text-sm">Bulk Upload</span>
                            </a>

                            <a href="/items/bulk-update" class="border-t flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                <x-icons.update class="w-5 h-5 text-gray-700" />
                                <span class="text-sm">Update Sheet</span>
                            </a>

                            <a href="/items/bulk-delete" class="border-t flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                                <x-icons.delete class="w-5 h-5 text-gray-700" />
                                <span class="text-sm">Bulk Delete</span>
                            </a>
                        </div>
                    </div>
                </div>
                <livewire:admin.item.item-export />
                <livewire:admin.item.item-create />
            </div>
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
