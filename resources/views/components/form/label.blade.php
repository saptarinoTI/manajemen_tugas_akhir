@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label text-gray']) }}>
  {{ $value ?? $slot }}
</label>
