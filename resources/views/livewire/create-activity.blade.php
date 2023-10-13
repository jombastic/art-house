<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create post') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit="save" class="flex flex-col space-y-4">
                    <div class="flex flex-col">
                        <label for="title" class="text-gray-700">Title</label>
                        <input type="text" wire:model.live.debounce.150ms="form.title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('form.title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="description" class="text-gray-700">Description</label>
                        <textarea wire:model.live.debounce.150ms="form.description" id="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                        @error('form.description')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="time_spent" class="text-gray-700">Time Spent</label>
                        <input type="number" step=".01" wire:model.live.debounce.150ms="form.time_spent" id="time_spent" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @error('form.time_spent')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
