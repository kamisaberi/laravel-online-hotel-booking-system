var FORM_ACTION = FORM_ACTION || (function () {
    var _args = {}; // private
    var url_index = '';
    var url_destroy = '';
    var form;

    return {
        init: function (Args) {
            this.parse(Args);
            url_index = Args['url_index'];
            url_destroy = Args['url_destroy'];
            form = Args['form'];
            this.launch();
        },
        parse: function (args) {
            for (let elm in args) {
                _args[elm] = args[elm];
            }
        },
        launch: function () {

            // form.submit(function (e) {
            $(document).on('submit', form, function (e) {


                if ($(".featured_image > img").length) {
                    var $image = $(".featured_image > img");
                    originalData = $image.cropper("getCroppedCanvas");
                    $('#path').val(originalData.toDataURL());
                }

                // e.preventDefault();
                // alert("fffffffff");
                // return;


                // e.preventDefault();
                // alert("fffffffff");
                // return;
                // alert($('#path').val());
                // return;
                var form = this;

                $(this).find('input[type=text] , textarea:not(.tinymce)').each(function () {
                    var n = $(this).attr('name');
                    $(this).parent().find('.locales input[name=' + n + '-fa' + ']').parent().trigger('click');
                    // alert($(this).val());
                });

                $(this).find('textarea.tinymce').each(function () {
                    var n = $(this).attr('name');
                    // alert($(this).val());
                    $(this).parent().find('.locales input[name=' + n + '-fa' + ']').parent().trigger('click');
                    // alert($(this).val());
                });


                // var datastring = $(this).serialize();
                // console.log(datastring);
                //
                // return;
                e.preventDefault();
                // console.log(form.serializeObject());
                // return;

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
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function (result) {
                        if ($.isEmptyObject(result.error)) {

                            submit.html('پایان');
                            submit.prop('disabled', false);
//                        alert(result.success);
                            window.location = url_index;

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


            $("[id^=del-]").click(function () {

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
                        url: url_destroy,
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


        }
    };
}());

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


// $("[id^=del-]").click(function () {
//
//     if (confirm("Are you sure?")) {
//
//         var s = $(this).attr('id');
//         var ss = s.split('-');
//
//         var did = ss[ss.length - 1];
//
//         $.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//             }
//         });
//
//
//         $.ajax({
//             url: "{{ $urls['destroy'] }}",
//             method: 'post',
//             data: {
//                 id: did
//             },
//             success: function (result) {
// //                        alert(result.message);
//
//                 $('#container-' + did).hide('normal', function () {
//                     $('#container-' + did).remove();
//                 });
//             },
//             error: function (result) {
//                 alert("error");
//
//             }
//         });
//     }
// });
//
//
// $("#form").submit(function (e) {
//     var form = this;
//     e.preventDefault();
//
//     $(this).find('input[type=text] , textarea:not(.tinymce), textarea.tinymce').each(function () {
//         var n = $(this).attr('name');
//         $(this).parent().find('.locales input[name=' + n + '-fa' + ']').parent().trigger('click');
//     });
//
//     // var datastring = $(this).serialize();
//     // console.log(datastring);
//     //
//     // return;
//
//     var submit = $('button[type="submit"]', this);
//     submit.html('در حال ارسال');
//     submit.prop('disabled', true);
//
//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         }
//     });
//     $.ajax({
//         url: $(this).attr('action'),
//         method: $(this).attr('method'),
//         data: new FormData(this),
//         processData: false,
//         contentType: false,
//         success: function (result) {
//             if ($.isEmptyObject(result.error)) {
//
//                 submit.html('پایان');
//                 submit.prop('disabled', false);
// //                        alert(result.success);
//                 window.location = "{{$urls['index']}}";
//
//             } else {
// //                        alert(result.error);
//
//                 submit.html('ذخیره');
//                 submit.prop('disabled', false);
//
//
//                 $(".print-error-msg").find("ul").html('');
//                 $(".print-error-msg").css('display', 'block');
//                 $.each(result.error, function (key, value) {
//                     $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
//                 });
//             }
//
//
//         },
//         error: function (result) {
//             alert(result.status);
//
//         }
//     });
//
// });
