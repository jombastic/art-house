<div>
    @vite(['resources/css/activity-table.css'])

    <h2 class="text-lg font-medium text-gray-900 mb-2">Filter dates</h2>
    <div class="flex flex-col flex-wrap sm:flex-row mb-4">
        <x-text-input wire:model.live.debounce.150ms="form.date_from" id="date_from" name="date_from" divClass="sm:mr-4 sm:mb-0 mb-2"
            class="block mt-1 w-full sm:w-auto" label="From" error="form.date_from" type="datetime-local" />
        <x-text-input wire:model.live.debounce.150ms="form.date_to" id="date_to" name="date_to" divClass="sm:mb-0 mb-2 sm:mr-4"
            class="block mt-1 w-full sm:w-auto" label="To" error="form.date_to" type="datetime-local" />
        <x-primary-button href="#" class="sm:self-end self-start">
            {{ __('Filter') }}
        </x-primary-button>
    </div>

    <table class="min-w-full divide-y divide-gray-200 table-fixed w-full p-0 m-0">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Time Spent
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @if ($activities->isEmpty())
                <tr>
                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium text-gray-500">
                        No activities at the moment
                    </td>
                </tr>
            @else
                @foreach ($activities as $activity)
                    <tr wire:key="{{ $activity->id }}">
                        <td class="px-6 py-4 whitespace-nowrap" data-label="Title">
                            <div class="text-sm text-gray-900">{{ $activity->title }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" data-label="Description">
                            <div class="text-sm text-gray-900">{{ $activity->description }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" data-label="Time Spent">
                            <div class="text-sm text-gray-900">{{ $activity->time_spent }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap" data-label="Date">
                            <div class="text-sm text-gray-900">{{ $activity->date_time }}</div>
                        </td>
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
