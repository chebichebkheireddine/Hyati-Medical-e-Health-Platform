@props(['name', 'href', 'type' => 'submit', 'class', 'icon', 'notfiy' => 0])

<a href="{{ $href }}" type="{{ $type }}" class="{{ $class }}">
    {{ $name }}

    <i class="{{ $icon }}">

    </i>
    @if ($notfiy > 0)
        @php
            $notfiy = $notfiy > 9 ? '+9' : $notfiy;
        @endphp
        @if ($notfiy > 9)
            <span
                class=" rounded-full bg-blue-400 px-3 py-0.5 text-xs text-gray-600 group-hover:bg-gray-200 group-hover:text-gray-700">
                {{ $notfiy }}
            </span>
        @endif
        <span
            class=" rounded-full bg-gray-100 px-3 py-0.5 text-xs text-gray-600 group-hover:bg-gray-200 group-hover:text-gray-700">
            {{ $notfiy }}
        </span>

    @endif

</a>
