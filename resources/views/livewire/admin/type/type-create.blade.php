<div>
    <x-outline-button @click="$wire.set('modalTypeCreate', true)">Create Type</x-outline-button>

    <x-dialog-form wire:model.live="modalTypeCreate" submit="save">
        <x-slot name="title">
            New Type
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Select Category -->
                <div class="col-span-12">
                    <x-label for="form.category_id" value="Select Sub-Category" />
                    <div class="search-box relative">
                        <x-input type='text' wire:model="search" wire:keyup="searchCategory" />
                        @if($resultDiv)
                            <ul class="absolute top-12 left-4 right-4 bg-white rounded-lg overflow-hidden shadow-lg border divide-y">
                                @if(!empty($results))
                                    @foreach($results as $result)
                                        <li class="cursor-pointer p-2.5 hover:bg-zinc-50 bg-white" wire:click="fetchDetailById({{ $result->id }})">{{ $result->name}}</li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </div>
                    <x-input-error for="form.subcategory_id" class="mt-1" />
                </div>

                <!-- Category name -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Name" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 block w-full" required />
                    <x-input-error for="form.name" class="mt-1" />
                </div>

                <!-- Thumbnail -->
                <div class="col-span-12">
                    <x-label for="form.thumbnail" value="Thumbnail" />
                    <x-input wire:model="form.thumbnail" id="form.thumbnail" type="text" class="mt-1 block w-full" />
                    <x-input-error for="form.thumbnail" class="mt-1" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalTypeCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Add Type
            </x-button>
        </x-slot>
    </x-dialog-form>

</div>
