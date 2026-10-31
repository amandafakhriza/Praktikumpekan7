@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-pink-300 focus:border-blue-500 focus:ring-blue-500 rounded-lg shadow-sm']) !!}>