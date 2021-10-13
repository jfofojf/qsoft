@props([
'for',
'text',
'name'
])

<div class="block">
    <label for="{{ $for }}" class="text-gray-700 font-bold">{{ $text }}</label>

    {{$slot}}

    @error($name)

    <span class="text-xs italic text-red-600">Поле не заполнено</span>

    <x-message color="red" text="{{ $message }}" />

    @enderror

</div>
