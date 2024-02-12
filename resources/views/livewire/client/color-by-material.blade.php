<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <livewire:client.breadcrumbs :type="$type" :brand="$brand" :material="$material" />
        </div>
        <div>
            @if($colors)
                <h2 class="my-2 text-xl font-fold">All colors in {{ $material }}</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($colors as $color)
                        <a
                            href=
                            "{{
                                route(
                                'item-by-color',
                                [
                                    $type,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material)),
                                    str_replace(' ', '-', strtolower($color->color))
                                ])
                            }}"
                            class="shadow rounded-lg bg-white overflow-hidden"
                        >
                            <img src="{{ $color->image_1 }}" class="h-40 w-full object-cover">
                            <div class="p-2 text-center">{{ $color->color }}</div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
