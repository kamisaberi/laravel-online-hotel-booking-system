<div class="post-parallax">
    <!--todo id va avaz kardan media screen-->
    <div class="parallax-container pc2" id="parallax-container">
        <div class="container" style="margin-top: 85px">
            <span class="span-location">
                <span style="color: #dab662">{{__('layout.room.your location')}}</span>
                صفحه اصلی / اتاق و سوییت ها / اتاق دو خوابه
            </span>
        </div>
        <div class="parallax"><img src="{{asset('images/post_bg.jpg')}}"></div>
    </div>
</div>
<!--todo media screen-->
<div class="content2 " id="content-2">

    <div class="post-single container">


        <!--todo baraye class h6 va span class va id sakhte shod -->
        <div class="row">
            <div class="col l6 m12 s12 center-on-small-only">
                <h6 class="title-post" id="title-h6">
                    {{isset($datas->properties['title']->title) ? $datas->properties['title']->title : ""}}
                </h6>
            </div>
        </div>
        <div class="img-gallery" id="image-gallery">

            <ul id="lightSlider">
                @if(isset($datas->properties['slide-images']) and isset($datas->properties['slide-images']->slides)  )
                    @foreach( $datas->properties['slide-images']->slides as $slide)
                        <li data-thumb="{{$slide}}">
                            <img src="{{$slide}}"/>
                        </li>
                    @endforeach
                @else
                    <li data-thumb="{{asset('uploads/room-000.jpg')}}">
                        <img src="{{asset('uploads/room-000.jpg')}}"/>
                    </li>
                @endif
            </ul>
        </div>


        <!--Image gallery-->

        <div class="exit-txt-img hide-on-med-and-down">
            <img class="responsive-img img-exit" src="{{asset('images/exit.png')}}">
            <span class="span-exit">
                        {{__('layout.room.guest exit time')}}
                    </span>
        </div>

        <br>
        <br>


        <div class="row" style="margin: 0 !important; height: 150px">
            <div class="col l5 s12  special-service hide-on-med-and-down">
                <div>
                     <span class="center special-service-title">
                     </span>
                </div>
                <p class="special-service-description">
                    @if(isset($datas->properties['right-content']->title))
                        {!! $datas->properties['right-content']->title!!}
                    @endif
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col l12 s12  options-title-bg">
                <div class="img-options-bg ">
                    <img src="{{asset('images/door-hanger.png')}}" class="responsive-img img-options">
                </div>

                <div class="options-title-txt-bg">
                            <span class="options-title-txt">
{{__('layout.room.more information')}}
                            </span>
                    <br>
                    <span class="options-title-desc">More Information</span>
                </div>
            </div>
            <div class="col l12 m12 s12">
                <div class="check-txt-img special-service">
                    @if(isset($datas->properties['big-content']->title))
                        {!! $datas->properties['big-content']->title !!}
                    @endif
                </div>
            </div>
        </div>
        <div class="more-inf hide-on-med-and-down">
        </div>
    </div>

</div>



