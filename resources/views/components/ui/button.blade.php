@props([
    'size' => 'md'
])

<button
    @class([
        'bg-black text-white',
        'py-1 px-2' => $size === 'sm',
        'py-2 px-3' => $size === 'md',
        'py-2.5 px-4' => $size === 'lg',
    ])
>{{ $slot }}</button>
