@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label text-gray fw-bold']) }}>
  {{ $value ?? $slot }}
</label>
