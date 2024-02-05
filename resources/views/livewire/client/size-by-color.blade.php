<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">

        </div>
        <div>
            @if($sizes)
                <h2 class="my-2 text-xl font-fold">All Sizes</h2>
                <div class="grid grid-cols-4 gap-5">
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
                            class="shadow rounded-lg bg-white p-2"
                        >{{ $size->size }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
