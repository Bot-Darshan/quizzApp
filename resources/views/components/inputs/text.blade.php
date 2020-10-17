@props(['id', 'model', 'label'])
<div>
    <div class="pt-3 mb-3 rounded-lg">
        <label for="{{ $id }}" class="block text-gray-700 text-sm font-bold mb-1">{{ $label }}</label>
        <input wire:model="{{ $model }}" type="text" id="{{ $id }}" name="{{ $id }}" required
            class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 py-1">
    </div>
    @error($id) <div class="pl-3 mt-2 text-red-500 text-sm">{{ $message }}</div> @enderror
</div>
