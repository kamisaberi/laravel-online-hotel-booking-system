<div class="post-parallax">
    <div class="parallax-container pc2" id="parallax-container">
        <div class="container" style="margin-top: 85px">
            <span class="span-location">
                <span style="color: #dab662">{{__('layout.room.your location')}}</span>
            </span>
        </div>
        <div class="parallax"><img src="{{asset('images/post_bg.jpg')}}"></div>
    </div>
</div>
<div class="content2 " id="content-2">
    <div class="post-single container">
        <div class="row">
            <div class="col l6 m12 s12 center-on-small-only">
                <h6 class="title-post" id="title-h6" style="font-size: 24px;">
                    {{$data->properties['title']->value}}
                </h6>
            </div>
        </div>

        <br>
        <br>

        @if(isset($data->properties['content']->value))
            <div class="row" style="margin: 0 !important; height: 150px">
                <div class="col l12 s12 hide-on-med-and-down">
                    <div>
                     <span class="center special-service-title">
                     </span>
                    </div>
                    <p class="special-service-description">
                        {!! $data->properties['content']->value !!}
                    </p>
                </div>
            </div>
        @endif
    </div>
</div>
