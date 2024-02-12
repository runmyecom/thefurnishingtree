<div>
    <div class="w-full h-full overflow-x-hidden overflow-y-auto">
        <div class="w-full flex items-center">
            <form wire:submit="import" class="w-full flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 class="font-bold text-gray-800">Import Item Sizes</h3>
                </div>
                <div class="px-20 py-6 overflow-y-auto">
                    <p class="text-gray-500">Through imports you can add or update item sizes. To update existing category you must set an existing id in the Category id columns. If the value is unset a new record will be created. You will be asked for confirmation before we import category.</p>
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

                    <p class="font-bold">Unsure about how to arrange your list?</p>
                    <p>Download the template below to ensure you are following the correct format.</p>
                    <!-- Sample -->
                    <div class="border-2 rounded-xl flex items-center justify-between p-8 my-6">
                        <div class="flex gap-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 16 16"><path fill="currentColor" fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM3.517 14.841a1.13 1.13 0 0 0 .401.823c.13.108.289.192.478.252c.19.061.411.091.665.091c.338 0 .624-.053.859-.158c.236-.105.416-.252.539-.44c.125-.189.187-.408.187-.656c0-.224-.045-.41-.134-.56a1.001 1.001 0 0 0-.375-.357a2.027 2.027 0 0 0-.566-.21l-.621-.144a.97.97 0 0 1-.404-.176a.37.37 0 0 1-.144-.299c0-.156.062-.284.185-.384c.125-.101.296-.152.512-.152c.143 0 .266.023.37.068a.624.624 0 0 1 .246.181a.56.56 0 0 1 .12.258h.75a1.092 1.092 0 0 0-.2-.566a1.21 1.21 0 0 0-.5-.41a1.813 1.813 0 0 0-.78-.152c-.293 0-.551.05-.776.15c-.225.099-.4.24-.527.421c-.127.182-.19.395-.19.639c0 .201.04.376.122.524c.082.149.2.27.352.367c.152.095.332.167.539.213l.618.144c.207.049.361.113.463.193a.387.387 0 0 1 .152.326a.505.505 0 0 1-.085.29a.559.559 0 0 1-.255.193c-.111.047-.249.07-.413.07c-.117 0-.223-.013-.32-.04a.838.838 0 0 1-.248-.115a.578.578 0 0 1-.255-.384h-.765ZM.806 13.693c0-.248.034-.46.102-.633a.868.868 0 0 1 .302-.399a.814.814 0 0 1 .475-.137c.15 0 .283.032.398.097a.7.7 0 0 1 .272.26a.85.85 0 0 1 .12.381h.765v-.072a1.33 1.33 0 0 0-.466-.964a1.441 1.441 0 0 0-.489-.272a1.838 1.838 0 0 0-.606-.097c-.356 0-.66.074-.911.223c-.25.148-.44.359-.572.632c-.13.274-.196.6-.196.979v.498c0 .379.064.704.193.976c.131.271.322.48.572.626c.25.145.554.217.914.217c.293 0 .554-.055.785-.164c.23-.11.414-.26.55-.454a1.27 1.27 0 0 0 .226-.674v-.076h-.764a.799.799 0 0 1-.118.363a.7.7 0 0 1-.272.25a.874.874 0 0 1-.401.087a.845.845 0 0 1-.478-.132a.833.833 0 0 1-.299-.392a1.699 1.699 0 0 1-.102-.627v-.495Zm8.239 2.238h-.953l-1.338-3.999h.917l.896 3.138h.038l.888-3.138h.879l-1.327 4Z"/></svg>
                            <div >
                                <h3 class="text-sm">Click to browse</h3>
                                <p class="text-xs text-gray-500">Only .csv files are supported.</p>
                            </div>
                        </div>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M3 15c0 2.828 0 4.243.879 5.121C4.757 21 6.172 21 9 21h6c2.828 0 4.243 0 5.121-.879C21 19.243 21 17.828 21 15" opacity=".5"/><path d="M12 3v13m0 0l4-4.375M12 16l-4-4.375"/></g></svg>
                        </button>
                    </div>
                </div>
                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-[13px] font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-static-backdrop-modal">
                        Cancel
                    </button>
                    <button class="py-2 px-3 inline-flex items-center gap-x-2 text-[13px] font-semibold rounded-lg border border-transparent bg-indigo-600 text-white hover:bg-indigo-700 disabled:opacity-50 disabled:pointer-events-none" type="submit">
                        Import List
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
