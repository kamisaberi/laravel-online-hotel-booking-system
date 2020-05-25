<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">
            {{$page_title}}
        </h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
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

    {{--    <div class="content-header-right text-md-right col-md-6 col-12">--}}
    {{--        <div class="form-group">--}}
    {{--            @can($permissions['create'])--}}
    {{--                @if(isset($urls['create']))--}}
    {{--                    <a href="{{$urls['create']}}" class="btn-icon btn btn-primary btn-round"><i class="ft-plus"></i></a>--}}
    {{--                @endif--}}
    {{--            @endcan--}}
    {{--            --}}{{--            <a href="#" class="btn-icon btn btn-primary btn-round"><i class="ft-life-buoy"></i></a>--}}
    {{--            <a href="#" class="btn-icon btn btn-danger btn-round"><i class="ft-settings"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    <div class="content-header-right col-md-6 col-12">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            @if(isset($urls['create']))
                @can($permissions['create'])
                    <a class="btn btn-primary" href="{{$urls['create']}}"><i class="ft-plus"></i></a>
                @endcan
            @endif
            @if(isset($urls['settings.edit']))
                @can($permissions['settings.edit'])
                    <a class="btn btn-danger" href="{{$urls['settings.edit']}}"><i class="ft-settings"></i></a>
                @endcan
            @endif

        </div>
    </div>

    {{--    <div class="content-header-right col-md-6 col-12">--}}
    {{--        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">--}}
    {{--            --}}
    {{--            <div class="btn-group" role="group">--}}
    {{--                <button class="btn btn-outline-primary dropdown-toggle dropdown-menu-right" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"--}}
    {{--                        aria-expanded="false">--}}
    {{--                    <i class="ft-settings icon-left"></i>--}}
    {{--                    Settings--}}
    {{--                </button>--}}
    {{--                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">--}}
    {{--                    <a class="dropdown-item" href="card-bootstrap.html">Bootstrap Cards</a>--}}
    {{--                    <a class="dropdown-item" href="component-buttons-extended.html">Buttons Extended</a>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            --}}
    {{--            <a class="btn btn-outline-primary" href="full-calender-basic.html"><i class="ft-mail"></i></a>--}}
    {{--            <a class="btn btn-outline-primary" href="timeline-center.html"><i class="ft-plus"></i></a>--}}
    {{--        </div>--}}
    {{--    </div>--}}
</div>
