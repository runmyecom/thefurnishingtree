<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">

        </div>
        <div>
            @if($colors)
                <h2 class="my-2 text-xl font-fold">All Colors</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($colors as $color)
                        <a
                            href=
                            "{{
                                route(
                                'item-sizes',
                                [
                                    $type,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material)),
                                    str_replace(' ', '-', strtolower($color->color))
                                ])
                            }}"
                            class="shadow rounded-lg bg-white p-2"
                        >{{ $color->color }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
