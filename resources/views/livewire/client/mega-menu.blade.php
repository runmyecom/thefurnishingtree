<div>
    <x-outline-button @click="$wire.set('modalSubMenu', true)">Advance Search</x-outline-button>

    <x-dialog-form wire:model.live="modalSubMenu">
        <x-slot name="title">
            New Brand
        </x-slot>

        <x-slot name="content">
            <div class='border-b w-full shadow-xl'>
                <!-- Fetch Category -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Category</h4>
                    @if($categories)
                        @foreach($categories as $category)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchSubCategory({{ $category->id }})">{{ $category->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Sub-Category -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Sub-Category</h4>
                    @if($sub_categories)
                        @foreach($sub_categories as $category)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchType({{ $category->id }})">{{ $category->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Item Type -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Item Type</h4>
                    @if($types)
                        @foreach($types as $type)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchBrand({{ $type->id }})">{{ $type->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Brands -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Brands</h4>
                    @if($brands)
                        @foreach($brands as $brand)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchMaterial({{ $brand->id }})">{{ $brand->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Material -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Material</h4>
                    @if($materials)
                        @foreach($materials as $material)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchColor({{ $material->id }})">{{ $material->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Color -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Colors</h4>
                    @if($colors)
                        @foreach($colors as $color)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchSize({{ $color->id }})">{{ $color->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Size -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Sizes</h4>
                    @if($sizes)
                        @foreach($sizes as $size)
                            <button class="border rounded-xl px-3 py-1" wire:click="fetchModel({{ $size->id }})">{{ $size->name }}</button>
                        @endforeach
                    @endif
                </div>
                <!-- Fetch Model -->
                <div class="w-full border-b p-3">
                    <h4 class="font-bold mb-2 text-purple-500">Models</h4>
                    @if($models)
                        @foreach($models as $model)
                            <a target="_blank" href="{{ route('item-by-model', ['id' => $model->id ]) }}" class="border rounded-xl px-3 py-1">{{ $model->name }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-dialog-form>

</div>
