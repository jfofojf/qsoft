@props([
'id',
'name',
'value' => null,
])

<textarea id="{{ $id }}" name="{{ $name }}" :error="$error"
          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">
    {{ $value }}
</textarea>
