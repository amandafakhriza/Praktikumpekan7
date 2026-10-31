@props(['type' => 'success'])

<div style="padding:12px; border-radius:6px; margin-bottom:15px;
    background: {{ $type === 'success' ? '#d4edda' : '#f8d7da' }};">
    {{ $slot }}
</div>