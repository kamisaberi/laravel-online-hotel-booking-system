@extends("admin.layouts.admin")

@section('vendor-css')

@endsection

@section("header")






@endsection
@section("main")

    <div id="main">
        <div class="row">
            <div class="col s12">

                <div class="container">
                    <div class="divider"></div>
                    @can($permissions['create'])
                        <a class="btn-floating btn-large waves-effect waves-light orange darken-3"
                           href="{{$urls['create']}}">
                            <i class="material-icons">add</i>
                        </a>
                    @endcan

                    <div class="divider"></div>
                    <div id="horizontal-card" class="section">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="row">
                                    @foreach($datas as $data )
                                        @include('admin.types.widgets.single_card', ['data'=>$data])
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('vendor-js')
@endsection

@section("footer")

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