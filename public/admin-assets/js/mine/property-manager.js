var parent_to_add_property;
$('a[data-target="#mdl-add-new-property"]').click(function () {
    $('#mdl-add-new-property input[name=group]').val($(this).parent().find('input[name=group]').val());
    parent_to_add_property = $(this).parent();
});

$('#mdl-add-new-property ').on('show.bs.modal', function (e) {

    $(".print-error-msg", $(this)).find("ul").html('');
    $(".print-error-msg", $(this)).css('display', 'none');
    // $(':input', $(this)).not(':button, :submit, :reset, :hidden, :checkbox, :radio').val('');
    // $(':checkbox, :radio',$(this)).prop('checked', false);
    // $('form', $(this)).trigger("reset");
    $('input[name=title]', $(this)).val('');
    $('input[name=title-fa]', $(this)).val('');
    $('input[name=title-en]', $(this)).val('');
    $('input[name=title-ar]', $(this)).val('');
});


$('#mdl-add-new-property form').submit(function (e) {

    e.preventDefault();

    // return;


    var form = this;
    var $form = $(this);
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

                submit.html('ذخیره');
                submit.prop('disabled', false);

                var s;
                if (result.input_type === 'check') {

                    s = parent_to_add_property.prev().prop('outerHTML');
                    s = `<body>${s}</body>`;
                    var ss = $($.parseHTML(s));
                    $(ss).find('input[type=checkbox]').attr('id', $('#title-en', $form).val().replace(' ', '-'));
                    $(ss).find('input[type=checkbox]').attr('name', $('#title-en', $form).val().replace(' ', '-'));
                    $(ss).find('span').html($('#title-fa', $form).val());
                    $(ss).insertBefore(parent_to_add_property);

                } else if (result.input_type === 'text') {


                    var id_name = $('#title-en', $form).val().replace(' ', '-');
                    s = parent_to_add_property.prev().prop('outerHTML');
                    s = `<body>${s}</body>`;
                    var ss = $($.parseHTML(s));
                    $(ss).find('input[type=text]').attr('id', id_name);
                    $(ss).find('input[type=text]').attr('name', id_name);
                    $(ss).find('input[type=text]').val('');
                    $(ss).find('label').attr('for', id_name);
                    $(ss).find('label').html($('#title-fa', $form).val());
                    $(ss).find('.locales .flag-icon-ir').prev().attr('id', id_name + '-fa');
                    $(ss).find('.locales .flag-icon-ir').prev().attr('name', id_name + '-fa');
                    $(ss).find('.locales .flag-icon-gb').prev().attr('id', id_name + '-en');
                    $(ss).find('.locales .flag-icon-gb').prev().attr('name', id_name + '-en');
                    $(ss).find('.locales .flag-icon-sa').prev().attr('id', id_name + '-ar');
                    $(ss).find('.locales .flag-icon-sa').prev().attr('name', id_name + '-ar');
                    $(ss).insertBefore(parent_to_add_property);

                }

                $('#mdl-add-new-property').modal('hide');

            } else {
//                        alert(result.error);

                submit.html('ذخیره');
                submit.prop('disabled', false);


                $(".print-error-msg", $form).find("ul").html('');
                $(".print-error-msg", $form).css('display', 'block');
                $.each(result.error, function (key, value) {
                    $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                });
            }


        },
        error: function (result) {
            alert(result.status);
            submit.html('ذخیره');
            submit.prop('disabled', false);

        }
    });

});
