@extends("admin.layouts.admin")

@section('vendor-css')

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.vendor-css")
    @endif

@endsection

@section("header")

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.header")
    @endif

@endsection
@section("main")

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.main", ['datas'=> $datas])
    @endif
@endsection
@section('vendor-js')

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.vendor-js")
    @endif

@endsection

@section("footer")

    @if(isset($widgets[0]->subview))
        @include("{$widgets[0]->subview}.footer")
    @endif
    <script>

        $("[id^=del-]").click(function () {

//                alert($(this).attr('id'));
//                return;

            if (confirm("Are you sure?")) {

                var s = $(this).attr('id');
                var ss = s.split('-');

                var did = ss[ss.length - 1];

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });


                $.ajax({
                    url: "{{ $urls['destroy']}}",
                    method: 'post',
                    data: {
                        id: did
                    },
                    success: function (result) {
//                        alert(result.message);

                        $('#container-' + did).hide('normal', function () {
                            $('#container-' + did).remove();
                        });
                    },
                    error: function (result) {
                        alert("error");

                    }
                });
            }
        });


        $("form").submit(function (e) {
            var form = this;
            e.preventDefault();

            var submit = $('button[type="submit"]', this);
            submit.html('در حال ارسال');
            submit.prop('disabled', true);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function (result) {
                    if ($.isEmptyObject(result.error)) {

                        submit.html('پایان');
                        submit.prop('disabled', false);
//                        alert(result.success);
                        window.location = "{{$urls['index']}}";

                    } else {
//                        alert(result.error);

                        submit.html('ذخیره');
                        submit.prop('disabled', false);


                        $(".print-error-msg").find("ul").html('');
                        $(".print-error-msg").css('display', 'block');
                        $.each(result.error, function (key, value) {
                            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                        });
                    }


                },
                error: function (result) {
                    alert(result.status);

                }
            });

        });


    </script>

@endsection