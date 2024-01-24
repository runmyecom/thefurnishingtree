<div>
    <x-outline-button @click="$wire.set('modalCreate', true)">New Item Model</x-outline-button>

    <x-dialog-form wire:model.live="modalCreate" submit="save">
        <x-slot name="title">
            New Model
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Search Color -->
                <div class="col-span-12">
                    <x-label for="form.size_id" value="Search Size" />
                    <div class="search-box relative">
                        <x-input type='text' wire:model="search" wire:keyup="searchParent" placeholder="Search Size" />
                        @if($resultDiv)
                            <ul class="absolute z-10 top-12 left-4 right-4 bg-white rounded-lg overflow-hidden shadow-lg border divide-y">
                                @if(!empty($results))
                                    @foreach($results as $result)
                                        <li class="cursor-pointer p-2.5 hover:bg-zinc-50 bg-white" wire:click="fetchDetail({{ $result->id }})">{{ $result->color->name }} > {{ $result->name }}</li>
                                    @endforeach
                                @endif
                            </ul>
                        @endif
                    </div>
                    <x-input-error for="form.size_id" class="mt-1" />
                </div>

                <!-- Color name -->
                <div class="col-span-12">
                    <x-label for="form.name" value="Name" />
                    <x-input wire:model="form.name" id="form.name" type="text" class="mt-1 block w-full" required autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-1" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCreate', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Add Model
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
