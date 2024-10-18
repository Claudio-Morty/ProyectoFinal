@props(['value'])

<label {{ $attributes->merge(['class' => 'block nuevo-label']) }}>
    {{ $value ?? $slot }}
</label>
