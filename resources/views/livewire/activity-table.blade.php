<div>
    @vite(['resources/css/activity-table.css'])

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
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
