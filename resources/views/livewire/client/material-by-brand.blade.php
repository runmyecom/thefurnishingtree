<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <livewire:client.breadcrumbs :type="$type" :brand="$brand" />
        </div>
        <div>
            @if($materials)
                <h2 class="my-2 text-xl font-fold">All materials in {{ $brand }}</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($materials as $material)
                        <a
                            href="{{ route('item-colors',
                                [
                                    $type,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material->material))
                                ])
                            }}"
                            class="shadow rounded-lg bg-white overflow-hidden"
                        >
                            <img src="{{ $material->image_1 }}" class="h-40 w-full object-cover">
                            <div class="p-2 text-center">{{ $material->material }}</div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
