<div class="col s12 m6 l6">
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">
                <div class="row">
                    <div class="col s6">
                        {{--<span>--}}
                        {{--<i class="material-icons">title</i>--}}
                        {{--</span>--}}
                        <span>
                            تاریخ ورود:
                            {{$data->properties['ja-start-date']->title}}
                        </span>
                        <br>
                        <span>
                            تاریخ خروج:
                            {{$data->properties['ja-end-date']->title}}
                        </span>
                        <br>
                        <span>
وضعیت:
                            {{ __('messages.service_situations')[$data->properties['situation']->title]}}
                        </span>

                    </div>
                    <div class="col s6">
                        <span>
                            هزینه:
                            @if(isset($data->properties['price']))
                                {{number_format($data->properties['price']->title)}}
                            @else
                                0
                            @endif
                        </span>
                        <br>
                        <span>
رزرو کننده:
                            {{$data->customer->properties['name']->title}}
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        {{--{{$data->properties->active }}--}}
                    </div>
                </div>

            </div>


            <div class="card-action">

                @if($data->properties['situation']->title == 7 || $data->properties['situation']->title == 9)
                    <a class="btn-floating btn-small waves-effect waves-light amber"
                       href="{{route('home.voucher.print', ['code'=>$data->properties['code']->title])}}">
                        <i class="material-icons">visibility</i>
                    </a>
                @endif

            </div>
        </div>
    </div>
</div>
