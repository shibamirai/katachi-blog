@props(['name'])

<x-form.field>
  <x-form.label name="{{ $name }}" />

  <input class="border border-gray-200 p-2 w-full rounded file:bg-gray-100 file:border file:rounded file:px-3 file:py-1"
         type="file"
         name="{{ $name }}"
         id="{{ $name }}"
         {{ $attributes(['value' => old($name)]) }}
  >

  <x-form.error name="{{ $name }}"/>
</x-form.field>
