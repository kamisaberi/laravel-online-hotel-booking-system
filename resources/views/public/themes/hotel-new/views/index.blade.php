<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title>{{$website->title}}</title>
        <meta name="description"
              content="{{ isset($website->meta_description) ?  $website->meta_description : '' }}">
        <meta name="keywords"
              content="{{ isset($website->meta_keywords) ?  $website->meta_keywords : '' }}">

        <link rel="stylesheet" href="{{asset('style/materialize.min.css')}}">
        <link rel="stylesheet" href="{{asset('style/rtl.css')}}">
        <link rel="stylesheet" href="{{asset('style/vegas.min.css')}}">

        <link rel="stylesheet" href="{{asset('style/style_index.css')}}">

        {{--<script src="http://code.jquery.com/jquery.min.js"></script>--}}
        <script type="text/javascript" src="{{asset('vendors/jquery-3.2.1.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('vendors/zepto/zepto.min.js')}}"></script>
        {{--<script src="http://zeptojs.com/zepto.min.js"></script>--}}
        <script src="{{asset('scripts/vegas.min.js')}}"></script>


        <script>

            $(function () {
                $('body').vegas({
                    @if(isset($datas))
                    slides: [
                            @foreach($datas as $data)
                        {
                            src: '{{$data->properties['path']->value}}'
                        },

                        @endforeach
                    ]
                    @else
                    slides: [
                        {
                            src: '{{asset('uploads/slider1.jpg')}}'
                        },

                    ]

                    @endif
                });
            });


        </script>


    </head>
    <body>


        <div class="d10 container">

            <!--start-->

            <div class="row center d100" id="d100">

                <img class="responsive-img img-logo" src="images/logo.png">

            </div>


            <div class="container">


                <div class="row center">

                    <ul class="menu-1 col s12 center">

                        @foreach($navigations as $navigation)

                            @if($navigation->link_type == "route")
                                @if(isset($navigation->properties->key) and  isset($navigation->properties->value) )
                                    <li>
                                        <a href="{{route($navigation->properties->route, [$navigation->properties->key=>$navigation->properties->value])}}">
                                            {{$navigation->properties->title}}
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{route($navigation->properties->route)}}">
                                            {{$navigation->properties->title}}
                                        </a>
                                    </li>
                                @endif
                            @elseif($navigation->link_type == "url")
                                <li>
                                    <a href="{{$navigation ->properties->url}}">
                                        {{$navigation->properties->title}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>


                </div>


            </div>


            <div class="row center">

                <a href="{{ url('locale/en') }}">
                    <img class=" responsive-img img-flag" src="{{asset('images/united-kingdom.png')}}">
                </a>
                <a href="{{ url('locale/ar') }}">
                    <img class=" responsive-img img-flag" src="{{asset('images/saudi-arabia.png')}}">
                </a>
                <a href="{{ url('locale/fa') }}">
                    <img class=" responsive-img img-flag" src="{{asset('images/iran.png')}}">
                </a>
            </div>


            <!--end-->


        </div>


    </body>
</html>