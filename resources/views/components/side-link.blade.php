@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 text-zinc-500 px-3 py-2.5 border rounded-xl bg-gray-100 text-zinc-800'
            : 'flex items-center gap-2 text-zinc-500 px-3 py-2.5 border border-transparent hover:border-gray-300 hover:text-zinc-800 rounded-xl';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
