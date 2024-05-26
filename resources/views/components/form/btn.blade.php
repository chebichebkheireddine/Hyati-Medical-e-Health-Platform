@props(['name', 'href', 'type' => 'submit', 'class', 'icon', 'notfiy' => 0])

<a href="{{ $href }}" type="{{ $type }}" class="{{ $class }}">

    <i class="{{ $icon }}">

    </i>
    {{ $name }}
    @if ($notfiy > 0)
        @php
            $notfiy = $notfiy > 9 ? '+9' : $notfiy;
        @endphp
        @if ($notfiy > 9)
            <span>
                {{ $notfiy }}
            </span>
        @endif
        <span>
            {{ $notfiy }}
        </span>

    @endif

</a>
