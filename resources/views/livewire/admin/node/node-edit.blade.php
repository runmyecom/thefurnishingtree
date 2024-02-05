<div>
    <x-dialog-form wire:model.live="modalEdit" submit="edit">
        <x-slot name="title">
            Edit Node
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Select Category -->
                <div class="col-span-12">
                    <x-label for="form.category_id" value="Select Category" />
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
                    <x-input-error for="form.category_id" class="mt-1" />
                </div>

                <!-- Category name -->
                <div class="col-span-12">
                    <x-label for="form.category_name" value="category_name" />
                    <x-input wire:model="form.category_name" id="form.category_name" type="text" class="mt-1 block w-full" required autocomplete="form.category_name" />
                    <x-input-error for="form.category_name" class="mt-1" />
                </div>

                <!-- Thumbnail -->
                <div class="col-span-12">
                    <x-label for="form.subcategory_name" value="subcategory_name" />
                    <x-input wire:model="form.subcategory_name" id="form.subcategory_name" type="text" class="mt-1 block w-full" autocomplete="form.subcategory_name" />
                    <x-input-error for="form.subcategory_name" class="mt-1" />
                </div>

                <div class="col-span-12">
                    <x-label for="form.type_name" value="type_name" />
                    <x-input wire:model="form.type_name" id="form.type_name" type="text" class="mt-1 block w-full" autocomplete="form.type_name" />
                    <x-input-error for="form.type_name" class="mt-1" />
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update Node
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
