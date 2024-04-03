@props([
    'options' => [],
    'value' => '',
    'label' => '',
    'wireModel'  => '',
])

<select {{ $attributes->merge(['class' => 'form-select']) }}
    @if ($wireModel)
        wire:model.live="{{ $wireModel }}"
    @endif
    >
    <option value="">{{ $label }}</option>
    @foreach ($options as $optionValue => $optionLabel)
        <option value="{{ $optionValue }}">{{ $optionLabel }}</option>
    @endforeach
</select>
