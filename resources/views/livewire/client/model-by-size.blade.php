<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">

        </div>
        <div>
            @if($models)
                <h2 class="my-2 text-xl font-fold">All Models</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($models as $model)
                        <a
                            href=
                            "{{
                                route(
                                'item-by-model',
                                [
                                    $type_name,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material)),
                                    str_replace(' ', '-', strtolower($color)),
                                    str_replace(' ', '-', strtolower($size)),
                                    str_replace(' ', '-', strtolower($model->model)),
                                ])
                            }}"
                            class="shadow rounded-lg bg-white p-2"
                        >{{ $model->model }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
