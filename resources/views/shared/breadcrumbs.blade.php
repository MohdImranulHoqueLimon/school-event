<ul class="page-breadcrumb">
@if ($breadcrumbs)
    @foreach ($breadcrumbs as $breadcrumb)
        @if ($breadcrumb->url && !$breadcrumb->last)
            <li>
                <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                <i class="fa fa-circle"></i>
            </li>
        @else
            <li class="active">{{ $breadcrumb->title }}</li>
        @endif
    @endforeach
@endif
</ul>