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
                            تاریخ :
                            {{$data->properties['date']->title}}
                        </span>
                    </div>

                    <div class="col s6">
                        <span>
ارسال کننده:
                            {{$data->properties['sender']->title}}
                        </span>

                    </div>
                </div>
                <div class="row">
                    <div class="col s12">
                        <p>
                            متن :
                            {{$data->properties['content']->title}}
                        </p>
                    </div>
                </div>

            </div>

            <div class="card-action">
                <button id="response-{{$data->id}}" class="btn btn-danger">response</button>
                <a href="#" class="left">#</a>
            </div>
        </div>
    </div>
</div>
