<div class="flex">

    <section class="max-w-7xl mx-auto w-full">
        <div class="py-8 w-full">
            <livewire:client.breadcrumbs :type="$type" :brand="$brand" :material="$material" :color="$color" :size="$size" />
        </div>
        <div>
            @if($models)
                <h2 class="my-2 text-xl font-fold">All Models in {{ $size }}</h2>
                <div class="grid grid-cols-4 gap-5">
                    @foreach ($models as $model)
                        <a
                            href=
                            "{{
                                route(
                                'item-by-model',
                                [
                                    $type,
                                    str_replace(' ', '-', strtolower($brand)),
                                    str_replace(' ', '-', strtolower($material)),
                                    str_replace(' ', '-', strtolower($color)),
                                    str_replace(' ', '-', strtolower($size)),
                                    str_replace(' ', '-', strtolower($model->model)),
                                ])
                            }}"
                            class="shadow rounded-lg bg-white overflow-hidden"
                        >
                            <img src="{{ $model->image_1 }}" class="h-32 w-full object-cover">
                            <div class="p-2 text-center">{{ $model->model }}</div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</div>
