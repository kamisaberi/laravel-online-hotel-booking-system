<h6 class="center contact_us_h6">
    {{__('layout.pages.about us')}}
</h6>
<span class="center contact_us_span" style="display: block">
    {{__('layout.pages.get more info about us')}}
</span>


<div class="container" style="margin-top: 35px; margin-bottom: 35px;">

    <div class="post-single">


        <div class="row">

            <div id="right-side-content" class="col l6 s12  content-right-side center"
                 style="padding: 15px !important;">

                <img class="logo_cu responsive-img" src="{{asset('images/main_logo_cu.png')}}">
                <h6>
                    {{__('layout.pages.manager')}}

                    -
                </h6>

                <br>
                <br>
                <br>
                <p style="margin: 0 !important; padding: 0 20px !important; " class="col s12 center">
                    {{$application['description']->value}}
                </p>


                <div id="btn-mail" class="col l5 s12 btn-mail-address center">

                    <img class="mail-icon" src="{{asset('images/main-address.png')}}">
                    <span>{{$hotel['email']->value}}</span>

                </div>

                <div id="btn-number" class="col l5 offset-l1 s12 btn-mail-address center">

                    <img class="mail-icon" src="{{asset('images/telephone.png')}}">
                    @foreach($hotel['phone']->value as $t)
                        <span dir="ltr">{{$t}}</span>
                    @endforeach
                </div>


            </div>


            <div id="left-side-content2" class="col l6 s12  content-left-side center">

                <div class="row">
                    <div class="col s12">
                        <div id='map' style='width: 100%; height: 500px;'></div>
                    </div>

                </div>

                {{--<img src="{{asset('images/google_map_img.jpg')}}" class="col s12" hidden>--}}

                <div class="col s12 spn-address">
                    <span> {{$hotel['address']->value}}</span>
                </div>

                <!--content-left-side-->


            </div>


        </div>


    </div>

    <!--post single-->

</div>
