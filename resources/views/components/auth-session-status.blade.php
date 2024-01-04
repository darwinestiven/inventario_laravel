@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-6000']) }}>
        {{ $status }}
    </div>
@endif
