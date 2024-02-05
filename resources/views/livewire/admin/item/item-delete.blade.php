<div>
    <x-dialog-form wire:model.live="modalItemDelete" submit="del">
        <x-slot name="title">
            Delete Item
        </x-slot>

        <x-slot name="content">
            <p>Do you really want to delete Item ?</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalItemDelete', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Delete Item
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
