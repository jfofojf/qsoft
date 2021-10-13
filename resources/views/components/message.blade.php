@props([
'color',
'text',
])


<div class="my-4">
    <div class="px-4 py-3 leading-normal text-{{ $color }}-700 bg-{{ $color }}-100 rounded-lg" role="alert">
        <p>{{ $text }}</p>
    </div>
</div>
