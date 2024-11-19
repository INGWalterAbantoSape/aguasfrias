@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-[#f84525] text-sm flex items-center before:contents-[""] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3'
            : 'text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[""] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} href="#"> 
    {{ $slot }}
</a>
