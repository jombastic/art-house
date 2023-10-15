@props([
    'label' => '',
    'error' => '',
    'divClass' => '',
    'disabled' => false,
])

<div class="{{ $divClass }}">
    <x-input-label for="{{ $label }}" :value="ucfirst(str_replace('_', ' ', __($label)))" />

    @if ($attributes->get('type') === 'textarea')
        <textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        ]) !!}></textarea>
    @else
        <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
            'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm',
        ]) !!}>
    @endif

    <x-input-error :messages="$errors->get($error)" class="mt-2" />

</div>
