<div>
    <div class="w-full h-full overflow-x-hidden overflow-y-auto">
        <div class="w-full flex items-center">
            <form wire:submit="import" class="w-full flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">Update Category List</h3>
                </div>
                <div class="px-20 py-6 overflow-y-auto">
                    <p class="text-gray-500">Through imports you can add or update categories. To update existing category you must set an existing id in the Category id columns. If the value is unset a new record will be created. You will be asked for confirmation before we import category.</p>
                    <label for="sheetImport" class="border-2 border-dashed rounded-xl flex flex-col items-center justify-center py-8 cursor-pointer hover:border-teal-400 my-6">
                        <div wire:loading class="flex flex-col items-center justify-center">
                            <x-icons.loading class="w-12 h-12 text-teal-600" />
                            <span class="text-sm text-center text-teal-600">Uploading...</span>
                        </div>
                        <div class="flex flex-col items-center justify-center">
                            <h3 class="">Click to browse</h3>
                            <p class="text-sm text-gray-500">Only .csv files are supported.</p>
                        </div>
                        <input type="file" wire:model="sheet" class="hidden sheetImport" id="sheetImport">
                    </label>

                    @error('sheet') <span class="error">{{ $message }}</span> @enderror

                    @if (session('status'))
                        <div class="flex items-center justify-center">
                            <span class="bg-red-100 border border-red-300 text-red-500 rounded-lg px-8 py-2 text-sm">
                                {{ session('status') }}
                            </span>
                        </div>
                    @endif
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-[13px] font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-static-backdrop-modal">
                        Cancel
                    </button>
                    <button class="py-2 px-3 inline-flex items-center gap-x-2 text-[13px] font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none" type="submit">
                        Update List
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
