@props(['name', 'href', 'type' => 'submit', 'class', 'icon'])

<a href="{{ $href }}" type="{{ $type }}" class="{{ $class }}">
    <i class="{{ $icon }}">
    </i>
    {{ $name }}
</a>
