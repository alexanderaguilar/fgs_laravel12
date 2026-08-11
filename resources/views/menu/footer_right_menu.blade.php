@php
    $items_count = count($items);
    $i = 1;
@endphp
@foreach ($items as $item) 
	<li><a target="{{$item->target}}" href="{{ url($item->link()) }}">{{ $item->title }}</a></li>
	@if($items_count != $i)
	 <li class="sepeter">|</li>
    @endif 
@endforeach