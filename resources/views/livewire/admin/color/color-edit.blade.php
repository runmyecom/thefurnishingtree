<div>
    <x-dialog-form wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Edit Color
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Select Category -->
                <div class="col-span-12">
                    <x-label for="form.material_id" value="Search Material" />
                    <div class="search-box relative">
                        <x-input type='text' wire:model="search" wire:keyup="searchParent" placeholder="Search Material" />
                        @if($resultDiv)
                            <ul class="absolute top-12 left-4 right-4 bg-white rounded-lg overflow-hidden shadow-lg border divide-y">
                                @if(!empty($results))
                                    @foreach($results as $result)
                                        <li class="cursor-pointer p-2.5 hover:bg-zinc-50 bg-white" wire:click="fetchDetail({{ $result->id }})">{{ $result->name}}</li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </div>
                    <x-input-error for="form.material_id" class="mt-1" />

                    <x-select wire:model="form.material_id" id="form.material_id" required class="w-full mt-4">
                        @foreach($materials as $material)
                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.material_id" class="mt-1" />
                </div>

                <!-- Category name -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Name" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 block w-full" required autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update Color
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
