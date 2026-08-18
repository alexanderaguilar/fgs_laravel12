@include('partials.breadcrumb', ['items' => [['label' => $page->title]]])
<section id="content">
    {!! $page->body !!}
</section>
@if($page->has_about_videos == 1)
    @include('components.module_about_videos')
@endif
@if($page->has_how_about == 1)
    @include('components.home_module_how')
    @include('components.home_module_activities')
@endif
@if($page->has_faqs == 1)
    @include('components.module_faq')
@endif
@if($page->has_float_message == 1)
    @include('components.module_floating_message')
@endif