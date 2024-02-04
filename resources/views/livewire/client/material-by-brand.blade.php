<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">

        </div>
        <div>
            @if($materials)
                <h2 class="my-2 text-xl font-fold">All Materials</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($materials as $material)
                        <a
                            href="{{ route('item-colors',
                                [
                                    $type_name,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material->material))
                                ])
                            }}"
                            class="shadow rounded-lg bg-white p-2"
                        >{{ $material->material }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
