<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex flex-wrap">
                    <x-primary-button href="{{ route('create') }}" class="mr-4 my-2">
                        {{ __('Create Activity') }}
                    </x-primary-button>
                    <x-primary-button href="#" class="bg-yellow-500 hover:bg-yellow-600 mr-4 my-2">
                        {{ __('Print report') }}
                    </x-primary-button>
                    <x-primary-button href="#" class="bg-green-500 hover:bg-green-600 my-2">
                        {{ __('Send to email') }}
                    </x-primary-button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <livewire:activity-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
