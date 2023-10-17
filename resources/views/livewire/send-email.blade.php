<div class="flex justify-between">
    <form wire:submit="sendEmail" class="p-4 flex flex-wrap">
        <x-text-input wire:model.live.debounce.150ms="form.email" id="email" name="email"
            divClass="sm:mr-4 sm:mb-0 mb-2 mr-4" class="block mt-1 w-full sm:w-auto" label="email" error="form.email"
            type="email" />
        <x-primary-button class="self-end mr-4 p-2">
            {{ __('Send') }}
        </x-primary-button>
    </form>
    <button type="button" wire:click="$dispatch('closeModal')"
        class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 self-start mt-2 mr-2">
        <span class="sr-only">Close menu</span>
        <!-- Heroicon name: outline/x -->
        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
