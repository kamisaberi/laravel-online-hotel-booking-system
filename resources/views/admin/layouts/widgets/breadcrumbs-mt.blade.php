<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
        <div class="row">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0">
                    {{$page_title}}
                </h5>
                <ol class="breadcrumbs mb-0">
                    @foreach($breadcrumbs  as $breadcrumb)
                        <li class="breadcrumb-item">
                            @if($breadcrumb['url'] != '')
                                <a href="{{$breadcrumb['url']}}">
                                    {{$breadcrumb['title']}}
                                </a>
                            @else
                                {{$breadcrumb['title']}}
                            @endif
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</div>
