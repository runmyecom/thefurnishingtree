@props(['sortDirection' => null, 'sortBy' => null, 'field' => null ])

@if($sortBy === $field)
    @if($sortDirection === 'asc')
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="inline-flex text-purple-400" viewBox="0 0 24 24"><path fill="currentColor" d="M19 17h3l-4 4l-4-4h3V3h2m-8 10v2l-3.33 4H11v2H5v-2l3.33-4H5v-2M9 3H7c-1.1 0-2 .9-2 2v6h2V9h2v2h2V5a2 2 0 0 0-2-2m0 4H7V5h2Z"/></svg>
    @else
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="inline-flex text-purple-400" viewBox="0 0 24 24"><path fill="currentColor" d="M19 7h3l-4-4l-4 4h3v14h2m-8-8v2l-3.33 4H11v2H5v-2l3.33-4H5v-2M9 3H7c-1.1 0-2 .9-2 2v6h2V9h2v2h2V5a2 2 0 0 0-2-2m0 4H7V5h2Z"/></svg>
    @endif
@endif