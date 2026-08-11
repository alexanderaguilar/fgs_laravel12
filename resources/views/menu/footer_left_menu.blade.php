@php
    $items_count = count($items);
    $i = 1;
@endphp
@foreach ($items as $item)
	<li><a target="{{ $item->target ?? '_self' }}" href="{{ $item->url ?? url($item->link()) }}">{{ $item->title }}</a></li>
	@if($items_count != $i)
	 <li class="sepeter">|</li>
    @endif
    @php $i++; @endphp
@endforeach
