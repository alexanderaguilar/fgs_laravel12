@foreach ($items as $item)
    <li class="nav-item">
        <a class="nav-link" href="{{ $item->url ?? url($item->link()) }}" @if(($item->target ?? '_self') !== '_self') target="{{ $item->target }}" @endif>
            {{ $item->title }}
        </a>
    </li>
@endforeach
