{{--
  Miga de pan unificada.
  Uso:
    @include('partials.breadcrumb', ['items' => [
      ['label' => 'Conócenos', 'url' => '/conocenos/quienes-somos'],
      ['label' => 'Historia'],
    ]])
  Antepone Inicio si falta. No renderiza en home.
--}}
@php
    $trail = collect($items ?? [])
        ->filter(fn ($item) => filled($item['label'] ?? null))
        ->values();

    if ($trail->isEmpty()) {
        $segments = collect(explode('/', trim(request()->path(), '/')))
            ->filter()
            ->values();
        $pathAcc = '';
        $trail = $segments->map(function ($segment, $index) use ($segments, &$pathAcc) {
            $pathAcc .= '/'.$segment;
            $isLast = $index === $segments->count() - 1;

            return [
                'label' => ucwords(str_replace('-', ' ', $segment)),
                'url' => $isLast ? null : $pathAcc,
            ];
        });
    }

    if ($trail->isNotEmpty()) {
        $first = $trail->first();
        $startsWithHome = ($first['url'] ?? null) === '/'
            || strcasecmp((string) ($first['label'] ?? ''), 'Inicio') === 0;
        if (! $startsWithHome) {
            $trail = $trail->prepend(['label' => 'Inicio', 'url' => '/']);
        }
    }

    $count = $trail->count();
@endphp

@if($count > 1)
<nav id="bread-crumb" class="site-breadcrumb" aria-label="Miga de pan">
    <div class="container-fluid site-breadcrumb__inner">
        <ol class="site-breadcrumb__list">
            @foreach($trail as $index => $item)
                @php $isCurrent = $index === $count - 1; @endphp
                <li class="site-breadcrumb__item{{ $isCurrent ? ' is-current' : '' }}">
                    @if($isCurrent || empty($item['url']))
                        <span @if($isCurrent) aria-current="page" @endif>{{ $item['label'] }}</span>
                    @else
                        <a href="{{ $item['url'] }}">{{ $item['label'] }}</a>
                    @endif
                </li>
            @endforeach
        </ol>
    </div>
</nav>
@endif
