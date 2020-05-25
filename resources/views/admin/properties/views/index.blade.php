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
        @include("{$widgets[0]->subview}.main", ['datas'=> $properties])
    @endif


    @include('admin.components.modal-property-translations')

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


            if (confirm("Are you sure?")) {

                var th = $(this);

                // return;

                var s = $(this).attr('id');
                var ss = s.split('-');
                var did = ss[ss.length - 1];
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "{{$urls['destroy']}}",
                    method: 'post',
                    data: {
                        id: did
                    },
                    success: function (result) {
//                        alert(result.message);
                        var e = result.error;
                        if (e == true) {
                            alert(result.message);
                        } else {
                            th.parent().parent().remove();
                            // $('#container-' + did).hide('normal', function () {
                            //     $('#container-' + did).remove();
                            // });
                        }
                    },
                    error: function (result) {
                        alert(result.status);

                    }
                });
            }
        });
    </script>

    <script>

        $('#mdl-property-translations').on('show.bs.modal', function (e) {

            var vc = $('input[name=data-content]', this).val();

            var dc = vc.split('||')[1];

            var arr = dc.split(',');
            for (i = 0; i < arr.length; i++) {
                var tr = arr[i].split(':');
                $('#mdl-property-translations input[name=title-' + tr[0] + ']').val(tr[1]);
            }

            var action = vc.split('||')[0].split('==')[1];
            $('form', this).attr('action', action);

        });


        $('#mdl-property-translations form').submit(function (e) {
            e.preventDefault();
            // alert("XXxzX");
            // return;

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
//                        alert(result.message);
                    var e = result.error;
                    if (e == true) {
                        alert(result.message);
                    } else {


                        $('#mdl-property-translations').modal('hide');
                    }
                },
                error: function (result) {
                    alert(result.status);

                }
            });


        });


    </script>


@endsection