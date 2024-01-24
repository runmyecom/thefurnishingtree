<div>
    <x-dialog-form wire:model.live="modalDelete" submit="del">
        <x-slot name="title">
            Delete Color
        </x-slot>

        <x-slot name="content">
            <p>Do you really want to delete Color : {{ $name }} ?</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalDelete', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Delete Color
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
