<div>
    @push('styles')
        @vite(['resources/css/activity-table.css'])
    @endpush

    <h2 class="text-lg font-medium text-gray-900 mb-2">Filter dates</h2>
    <form wire:submit="refresh" class="flex flex-col flex-wrap sm:flex-row mb-4">
        <x-text-input wire:model.live.debounce.150ms="form.date_from" id="date_from" name="date_from" divClass="sm:mr-4 sm:mb-0 mb-2"
            class="block mt-1 w-full sm:w-auto" label="date_from" error="form.date_from" type="datetime-local" />
        <x-text-input wire:model.live.debounce.150ms="form.date_to" id="date_to" name="date_to" divClass="sm:mb-0 mb-2 sm:mr-4"
            class="block mt-1 w-full sm:w-auto" label="date_from" error="form.date_to" type="datetime-local" />
        <div class="flex flex-wrap mt-2">
            <x-primary-button class="sm:self-end self-start mr-4 ">
                {{ __('Filter') }}
            </x-primary-button>
            <x-secondary-button wire:click="resetForm" class="sm:self-end self-start">
                {{ __('Reset') }}
            </x-secondary-button>
        </div>
    </form>

    @php
        $fields = ['Title' => 'title', 'Description' => 'description', 'Time Spent' => 'time_spent', 'Date' => 'date_time', 'Actions'];
    @endphp
    <table class="min-w-full divide-y divide-gray-200 table-fixed w-full p-0 m-0">
        <thead class="bg-gray-50">
            <tr>
                @foreach($fields as $label)
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        {{ $label }}
                    </th>
                @endforeach
            </tr>
        </thead>
        @php
            array_pop($fields);
        @endphp
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($activities->isEmpty())
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                        No activities for the time period
                    </td>
                </tr>
            @else
                @foreach ($activities as $activity)
                    <tr wire:key="{{ $activity->id }}">
                        @foreach($fields as $label => $field)
                            <td class="px-6 py-4 whitespace-nowrap" data-label="{{ $label }}">
                                <div class="text-sm text-gray-900">{{ $activity->$field }}</div>
                            </td>
                        @endforeach
                        <td class="px-6 py-4 whitespace-nowrap" data-label="Actions">
                            <div class="text-sm text-gray-900">
                                <a href="{{ route('update', $activity->id) }}" wire:navigate class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <a href="delete-activity/{{ $activity->id }}" wire:click.prevent="deleteActivity({{ $activity->id }})" class="text-red-600 hover:text-red-900 ml-4">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="mt-4">
        {{ $activities->links() }}
    </div>
</div>
