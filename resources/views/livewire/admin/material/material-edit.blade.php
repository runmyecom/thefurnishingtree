<div>
    <x-dialog-form wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Edit Material
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Select Category -->
                <div class="col-span-12">
                    <x-label for="form.brand_id" value="Search Brand" />
                    <div class="search-box relative">
                        <x-input type='text' wire:model="search" wire:keyup="searchBrand" placeholder="Search Brand" />
                        @if($resultDiv)
                            <ul class="absolute top-12 left-4 right-4 bg-white rounded-lg overflow-hidden shadow-lg border divide-y">
                                @if(!empty($results))
                                    @foreach($results as $result)
                                        <li class="cursor-pointer p-2.5 hover:bg-zinc-50 bg-white" wire:click="fetchById({{ $result->id }})">{{ $result->name}}</li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </div>
                    <x-input-error for="form.brand_id" class="mt-1" />

                    <x-select wire:model="form.brand_id" id="form.brand_id" required class="w-full mt-4">
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="form.brand_id" class="mt-1" />
                </div>

                <!-- Category name -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Name" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 block w-full" required autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Thumbnail -->
                <div class="col-span-12">
                    <x-label for="form.thumbnail" value="Thumbnail" />
                    <x-input wire:model="form.thumbnail" id="form.thumbnail" type="text" class="mt-1 block w-full" autocomplete="form.thumbnail" />
                    <x-input-error for="form.thumbnail" class="mt-1" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update Material
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
