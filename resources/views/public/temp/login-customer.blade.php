@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    {{--<link rel="stylesheet" type="text/css" href="{{asset('style/jquery.countdownTimer.css')}}"/>--}}
    <script type="text/javascript" src="{{asset('scripts/jquery.countdownTimer.js')}}"></script>


@endsection

@section('container')

    <div class="container" style="margin-top: 35px; margin-bottom: 35px;">
        <div class="post-single">
            @if($command->title == "open login page")
                <div class="row">
                    <div class="row">
                        <div class="col l3 s12">
                        </div>
                        <div id="right-side-content" class="col l6 s12  right-side-cn " style="padding: 15px !important;">
                            <h6 class="col s12 center-on-small-only">{{__('layout.user.please login')}}</h6>
                            <form method="post" action="{{ route('home.services.launch', ['type'=>'login-customer', 'step'=> 2]) }}">
                                {{csrf_field()}}
                                <input type="text" name="mobile" id="mobile" class="dp2 col l11 s12"
                                       placeholder="{{__('layout.user.email place holder')}}">
                                <input type="password" name="password" id="password" class="dp2 col l11 s12"
                                       placeholder="{{__('layout.user.password place holder')}}">
                                <div class="col s12 btn-div left-align">
                                    <input type="submit" value="{{__('layout.user.login')}}"
                                           class="btn-small btn-red btn-log  ">
                                </div>
                            </form>
                        </div>
                        <div class="col l3 s12">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col l3 s12">
                        </div>
                        <div class="col l6 s12">
                            <div id="more-inf" class="more-inf center-on-small-only" style="margin-right: 0 !important;">
                                <a href="#">
                                    {{__('layout.user.forgot your password')}}
                                </a>
                                <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">
                            </div>

                            <div id="more-inf" class="more-inf center-on-small-only" style="margin-right: 0 !important;">
                                <a href="#">
                                    {{__('layout.user.register')}}
                                </a>
                                <img class="responsive-img" src="{{asset('images/left-arrow.png')}}">
                            </div>
                        </div>
                        <div class="col l3 s12">
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section("footer")
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.parallax').parallax();
            $('.modal').modal();
            $('select').formSelect();
        });

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, options);
        });

    </script>

@endsection
