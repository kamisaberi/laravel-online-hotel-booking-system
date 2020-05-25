<div class="col s12 m4 l4" id="container-{{$data->id}}">
    <div class="card horizontal">
        <div class="card-stacked">
            <div class="card-content">
                <div class="row">
                    <div class="col s6">
                        <span>
                            <span>عنوان:</span>
                            {{isset($data->locales[app()->getLocale()])?$data->locales[app()->getLocale()]:$data->title}}
                        </span>
                    </div>
                    <div class="col s6">
                        <span>
                            <span>نوع ورودی:</span>
                            {{$data->input_type }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col s6">
                        <br>
                        <h6>ترجمه ها:</h6>
                        @foreach($data->locales as $locale=>$value)
                            <span>
                                {{__('messages.languages.'. $locale)}}:{{$value}}
                            </span>
                            <br>
                        @endforeach
                    </div>
                    <div class="col s6">
                        <br>
                        <span>سطح:</span>
                        {{$data->level }}
                    </div>
                </div>


                <div class="row">
                    <div class="col s12">
                        <p>
                            {{--                            {{$data->properties->description }}--}}
                        </p>
                    </div>
                </div>

            </div>

            <div class="card-action">

                @can($permissions['edit'])
                    <a class="btn-floating btn-small waves-effect waves-light amber"
                       href="{{$data->urls['edit']}}">
                        <i class="material-icons">edit</i>
                    </a>
                @endcan

                @can($permissions['destroy'])
                    <button id="del-{{$data->id}}" class="btn-floating btn-small waves-effect waves-light red left">
                        <i class="material-icons">delete</i>
                    </button>
                @endcan
            </div>
        </div>
    </div>
</div>
