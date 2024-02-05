<div>
    <x-dialog-form wire:model.live="modalItemEdit" submit="edit">
        <x-slot name="title">
            Edit Item
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <!-- Category name -->
                <div class="col-span-12">
                    <x-label for="form.item_name" value="Item Name" />
                    <x-input wire:model="form.item_name" id="form.item_name" type="text" class="mt-1 block w-full" required autocomplete="form.item_name" />
                    <x-input-error for="form.item_name" class="mt-1" />
                </div>

                <!-- Thumbnail -->
                <div class="col-span-12">
                    <x-label for="form.sku" value="sku" />
                    <x-input wire:model="form.sku" id="form.sku" type="text" class="mt-1 block w-full" autocomplete="form.sku" />
                    <x-input-error for="form.sku" class="mt-1" />
                </div>

                <!-- Slug -->
                <div class="col-span-12">
                    <x-label for="form.slug" value="slug" />
                    <x-input wire:model="form.slug" id="form.slug" type="text" class="mt-1 block w-full" autocomplete="form.slug" />
                    <x-input-error for="form.slug" class="mt-1" />
                </div>

                <!-- Node ID -->
                <div class="col-span-12">
                    <x-label for="form.node_id" value="node_id" />
                    <x-input wire:model="form.node_id" id="form.node_id" type="text" class="mt-1 block w-full" autocomplete="form.node_id" />
                    <x-input-error for="form.node_id" class="mt-1" />
                </div>
                <!-- Brand -->
                <div class="col-span-12">
                    <x-label for="form.brand" value="brand" />
                    <x-input wire:model="form.brand" id="form.brand" type="text" class="mt-1 block w-full" autocomplete="form.brand" />
                    <x-input-error for="form.brand" class="mt-1" />
                </div>
                <!-- Material -->
                <div class="col-span-12">
                    <x-label for="form.material" value="material" />
                    <x-input wire:model="form.material" id="form.material" type="text" class="mt-1 block w-full" autocomplete="form.material" />
                    <x-input-error for="form.material" class="mt-1" />
                </div>
                <!-- Color -->
                <div class="col-span-12">
                    <x-label for="form.color" value="color" />
                    <x-input wire:model="form.color" id="form.color" type="text" class="mt-1 block w-full" autocomplete="form.color" />
                    <x-input-error for="form.color" class="mt-1" />
                </div>
                <!-- size -->
                <div class="col-span-12">
                    <x-label for="form.size" value="size" />
                    <x-input wire:model="form.size" id="form.size" type="text" class="mt-1 block w-full" autocomplete="form.size" />
                    <x-input-error for="form.size" class="mt-1" />
                </div>
                <!-- model -->
                <div class="col-span-12">
                    <x-label for="form.model" value="model" />
                    <x-input wire:model="form.model" id="form.model" type="text" class="mt-1 block w-full" autocomplete="form.model" />
                    <x-input-error for="form.model" class="mt-1" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalItemEdit', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Update Item
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>

