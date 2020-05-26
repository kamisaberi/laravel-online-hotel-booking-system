@extends('public.themes.hotel-new.layouts.public2')

@section("header")

    {{--<link rel="stylesheet" type="text/css" href="{{asset('style/jquery.countdownTimer.css')}}"/>--}}
    <script type="text/javascript" src="{{asset('scripts/jquery.countdownTimer.js')}}"></script>


@endsection

@section('container')

    @include($widgets[0]->subview)

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
        var countdowntimer;

        $(document).ready(function () {
            $('.parallax').parallax();
            $('.modal').modal();
            $("#modal2").modal({
                dismissible: false
            });
            $("#modal21").modal({
                dismissible: false
            });

            $('select').formSelect();
        });

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.parallax');
            var instances = M.Parallax.init(elems, options);
        });

    </script>

    <script>
        // import moment from 'moment-jalaali';
        var app = new Vue({
            el: '#app',
            data: {
                date: moment().format('jYYYY/jMM/jDD'),
                today: moment().format('jYYYY/jMM/jDD'),
            },
            components: {
                DatePicker: VuePersianDatetimePicker
            }
        });
    </script>

    @include($widgets[0]->subview . '_script' )
{{--    @include('public.themes.hotel-new.subviews.booking.booking_script' )--}}

    {{--    @php($scr=str_replace('blade', 'script.blade',$widgets[0]->subview ))--}}
    {{--    {{$scr}}--}}


@endsection
