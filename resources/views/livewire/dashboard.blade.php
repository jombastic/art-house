<div>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight {{ Route::currentRouteNamed('report.show') ? 'print:text-black' : '' }}">
            {{ $header ?? __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 {{ Route::currentRouteNamed('report.show') ? 'print:py-0' : '' }}">
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-4 {{ Route::currentRouteNamed('report.show') ? 'print:mx-0 print:px-0 print:mb-0' : '' }}">
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg {{ Route::currentRouteNamed('report.show') ? 'print:bg-transparent print:shadow-none print:border-0' : '' }}">
                @unless (Route::currentRouteNamed('report.show'))
                    <div
                        class="p-6 text-gray-900 flex flex-wrap">
                        <x-primary-button href="{{ route('create') }}" class="mr-4 my-2">
                            {{ __('Create Activity') }}
                        </x-primary-button>
                        <x-primary-button href="{{ route('report.show', ['date_from' => $date_from, 'date_to' => $date_to]) }}" class="bg-yellow-500 hover:bg-yellow-600 mr-4 my-2">
                            {{ __('Show print report') }}
                        </x-primary-button>
                        <x-primary-button type="button" onclick="Livewire.dispatch('openModal', { component: 'send-email', arguments: { date_from: '{{ $date_from }}', date_to: '{{ $date_to }}' } })" class="bg-green-500 hover:bg-green-600 my-2">
                            {{ __('Send to email') }}
                        </x-primary-button>
                    </div>
                @endunless
            </div>
        </div>

        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8 {{ Route::currentRouteNamed('report.show') ? 'print:mx-0 print:px-0' : '' }}">
            <div
                class="bg-white overflow-hidden shadow-sm sm:rounded-lg {{ Route::currentRouteNamed('report.show') ? 'print:bg-transparent print:shadow-none print:border-0' : '' }}">
                <div class="p-6 text-gray-900 {{ Route::currentRouteNamed('report.show') ? 'print:p-0' : '' }}">
                    <livewire:activity-table :routeName="Route::currentRouteName()" :token="request()->route('token')" />
                </div>
            </div>
        </div>
    </div>
</div>
