@props([
'id',
'name',
'value' => null,
])

<input id="{{ $id }}" name="{{ $name }}" type="text" value="{{ $value }}"
       :error="$error"
       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
