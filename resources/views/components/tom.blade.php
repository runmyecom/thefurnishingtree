@props(['disabled' => false])

<div wire:ignore>
    <select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 rounded-md shadow-sm w-full text-sm py-2.5']) !!}>
        {{ $slot }}
    </select>
</div>
