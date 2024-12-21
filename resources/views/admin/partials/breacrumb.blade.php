<div class="page-header">
    <h3 class="fw-bold mb-3">{{isset($breadcrumbData['current_title']) ?$breadcrumbData['current_title']:''}}</h3>
    <ul class="breadcrumbs mb-3">
        <li class="nav-home">
            <a href="#">
                <i class="icon-home"></i>
            </a>
        </li>
        {{--        <li class="separator">--}}
        {{--            <i class="icon-arrow-right"></i>--}}
        {{--        </li>--}}
        @if(isset($breadcrumbData['other_items']))
            @foreach($breadcrumbData['other_items'] as $bItem)
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{$bItem['url']}}">{{$bItem['title']}}</a>
                </li>

            @endforeach
        @endif


    </ul>
</div>
