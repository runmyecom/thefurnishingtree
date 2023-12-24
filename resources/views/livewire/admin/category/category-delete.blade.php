<div>
    <x-dialog-form wire:model.live="modalCategoryDelete" submit="del">
        <x-slot name="title">
            Delete Category
        </x-slot>

        <x-slot name="content">
            <p>Do you really want to delete Category : {{ $name }} ?</p>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('modalCategoryDelete', false)" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:loading.attr="disabled">
                Delete Category
            </x-button>
        </x-slot>
    </x-dialog-form>
</div>
