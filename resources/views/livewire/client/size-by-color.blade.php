<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <livewire:client.breadcrumbs :type="$type" :brand="$brand" :material="$material" :color="$color" />
        </div>
        <div>
            @if($sizes)
                <h2 class="my-2 text-xl font-fold">All sizes in {{ $color }}</h2>
                <div class="grid grid-cols-5 gap-5">
                    @foreach ($sizes as $size)
                        <a
                            href=
                            "{{
                                route(
                                'item-models',
                                [
                                    $type,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material)),
                                    str_replace(' ', '-', strtolower($color)),
                                    str_replace(' ', '-', strtolower($size->size))
                                ])
                            }}"
                            class="shadow rounded-lg bg-white overflow-hidden"
                        >
                            <img src="{{ $size->image_1 }}" class="h-32 w-full object-cover">
                            <div class="p-2 text-center">{{ $size->size }}</div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
