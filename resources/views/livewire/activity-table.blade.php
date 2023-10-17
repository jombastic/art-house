<div
    class="{{ Route::currentRouteNamed('report.show') ? 'print:bg-transparent print:shadow-none print:border-0' : '' }}">
    @push('styles')
        @vite(['resources/css/activity-table.css'])
    @endpush

    @unless (Route::currentRouteNamed('report.show'))
        <h2 class="text-lg font-medium text-gray-900 mb-2">Filter dates</h2>
        <form wire:submit="refresh" class="flex flex-col flex-wrap sm:flex-row mb-4">
            <x-text-input wire:model.live.debounce.150ms="form.date_from" id="date_from" name="date_from"
                divClass="sm:mr-4 sm:mb-0 mb-2" class="block mt-1 w-full sm:w-auto" label="date_from" error="form.date_from"
                type="datetime-local" />
            <x-text-input wire:model.live.debounce.150ms="form.date_to" id="date_to" name="date_to"
                divClass="sm:mb-0 mb-2 sm:mr-4" class="block mt-1 w-full sm:w-auto" label="date_from" error="form.date_to"
                type="datetime-local" />
            <div class="flex flex-wrap mt-2">
                <x-primary-button class="sm:self-end self-start mr-4 ">
                    {{ __('Filter') }}
                </x-primary-button>
                <x-secondary-button wire:click="resetForm" class="sm:self-end self-start">
                    {{ __('Reset') }}
                </x-secondary-button>
            </div>
        </form>
    @endunless

    @php
        $fields = ['Activity Title' => 'title', 'Description' => 'description', 'Time Spent (hours)' => 'time_spent', 'Date' => 'date_time'];
        if (!Route::currentRouteNamed('report.show')) {
            $fields['Actions'] = 'actions';
        }
    @endphp
    <table
        class="min-w-full divide-y divide-gray-200 table-fixed w-full p-0 m-0 {{ Route::currentRouteNamed('report.show') ? 'print:mx-0 print:px-0' : '' }}">
        <thead class="bg-gray-50">
            <tr>
                @foreach ($fields as $label => $field)
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $label }}
                    </th>
                @endforeach
            </tr>
        </thead>
        @php
            if (!Route::currentRouteNamed('report.show') && !$activities->isEmpty()) {
                array_pop($fields);
            }
        @endphp
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($activities->isEmpty())
                <tr>
                    <td colspan="{{ count($fields) }}"
                        class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                        No activities for the time period
                    </td>
                </tr>
            @else
                @foreach ($activities as $activity)
                    <tr wire:key="{{ $activity->id }}">
                        @foreach ($fields as $label => $field)
                            <td class="px-6 py-4 whitespace-nowrap" data-label="{{ $label }}">
                                <div class="text-sm text-gray-900">{{ $activity->$field }}</div>
                            </td>
                        @endforeach
                        @unless (Route::currentRouteNamed('report.show'))
                            <td class="px-6 py-4 whitespace-nowrap" data-label="Actions">
                                <div class="text-sm text-gray-900">
                                    <a href="{{ route('update', $activity->id) }}" wire:navigate
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <a href="delete-activity/{{ $activity->id }}"
                                        wire:click.prevent="deleteActivity({{ $activity->id }})"
                                        class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                                </div>
                            </td>
                        @endunless
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    @unless (Route::currentRouteNamed('report.show'))
        <div class="mt-4">
            {{ $activities->links() }}
        </div>
    @endunless

    @if (Route::currentRouteNamed('report.show'))
        <div class="mt-4">
            <p class="text-right font-bold">Total time spent: {{ $activities->sum('time_spent') }} hours</p>
        </div>
    @endif
</div>
