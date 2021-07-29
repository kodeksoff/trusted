<ul class="flex text-gray-600 text-sm">
@foreach($breadcrumbs as $breadcrumb)
    <li>
        <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['title'] }}</a>@if(!$loop->last)<span class="mr-0.5 ml-0.5">></span>@endif
    </li>
@endforeach
</ul>
