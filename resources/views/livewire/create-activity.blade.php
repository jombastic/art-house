<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $header ?? __('Create') }} {{ __('activity') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form wire:submit="save" class="space-y-4">
                    <x-text-input wire:model.live.debounce.150ms="form.title" id="title" name="title" class="block mt-1 w-full"
                        label="title" error="form.title" type="text" />

                    <x-text-input divClass="mt-4" wire:model.live.debounce.150ms="form.description" id="description" name="description"
                        class="block mt-1 w-full" type="textarea" error="form.description" label="description" />

                    <x-text-input divClass="mt-4" wire:model.live.debounce.150ms="form.time_spent" id="time_spent" name="time_spent"
                        class="block mt-1 w-full" type="number" step=".01" error="form.time_spent" label="time_spent" />

                    <x-text-input divClass="mt-4" wire:model.live.debounce.150ms="form.date_time" id="date_and_time" name="date_time"
                        class="block mt-1 w-full" type="datetime-local" step=".01" error="form.date_time" label="date_and_time" />

                    <x-primary-button>
                        {{ __('Save') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
