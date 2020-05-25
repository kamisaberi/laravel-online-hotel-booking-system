var selected_items = {};

var NESTABLE_ACTION = NESTABLE_ACTION || (function () {
    var _args = {}; // private
    var url_update = '';
    var nestable;

    return {
        init: function (Args) {
            this.parse(Args);
            url_update = Args['url_update'];
            nestable = Args['nestable'];
            this.launch();
        },
        parse: function (args) {
            for (let elm in args) {
                _args[elm] = args[elm];
            }
        },
        launch: function () {

            $("#mdl-category-selector button[name=update-property]").click(function (e) {
                var items = $('#nestable3').nestable('serialize');
                console.log(items);

                // alert(url_update);
                // return;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url_update,
                    method: 'post',
                    data: {
                        update_values: 'true',
                        title: 'category',
                        values: items
                    },
                    success: function (result) {
                        console.log(result);
                    },
                    error: function (result) {
                        alert(result.status);

                    }
                });

            });


        }
    };
}());


$('.dd').nestable({
    callback: function (l, e) {
        // l is the main container
        // e is the element that was moved
    }
});

$(".dd").on('click', '.dd3-content .item', function (e) {

    var selected = $(this).parent().parent().parent().attr('data-selected') === undefined ? "0" : $(this).parent().parent().parent().attr('data-selected');
    // alert(selected);

    if (selected == "1") {
        $(this).parent().parent().parent().attr('data-selected', "0");
        $(this).parent().parent().css('background-color', '#fafafa');

        var id = $(this).parent().parent().parent().attr('data-id');
        // var title = $(this).parent().parent().parent().attr('data-title');
        var title = $(this).html();
        delete selected_items[id];

    } else {
        $(this).parent().parent().parent().attr('data-selected', "1");
        $(this).parent().parent().css('background-color', '#FABA57');

        var id = $(this).parent().parent().parent().attr('data-id');
        // var title = $(this).parent().parent().parent().attr('data-title');
        var title = $(this).html();
        selected_items[id] = title;
    }

});

$(".add-parent").click(function (e) {
    e.preventDefault();
    $('#mdl-add-category #selected-item').val("0");
});

$(".dd").on('click', '.add-item', function (e) {

    if ($(this).parent().parent().parent().parent().length) {
        $('#mdl-add-category #selected-item').val($(this).parent().parent().parent().parent().attr('data-id'));
    } else {
        $('#mdl-add-category #selected-item').val("0");
    }

});

$(".dd").on('click', '.delete-item', function (e) {

    e.preventDefault();
    if (confirm('حذف؟')) {
        $(this).parent().parent().parent().parent().remove();
    }

});


$("#btn-add-new-category").click(function () {


    if ($("#mdl-add-category input[name=title-fa]").val().trim() === '') {
        alert("عنوان فارسی را پر نمایید");
        return;
    }

    if ($("#mdl-add-category input[name=title-en]").val().trim() === '') {
        alert("عنوان انگلیسی را پر نمایید");
        return;
    }

    if ($("#mdl-add-category input[name=title-ar]").val().trim() === '') {
        alert("عنوان عربی را پر نمایید");
        return;
    }

    var parent_id = $("#mdl-add-category #selected-item").val();

    // var title = $("#mdl-add-category #txt-new-category").val();

    var title_fa = $("#mdl-add-category input[name=title-fa]").val();
    var title_en = $("#mdl-add-category input[name=title-en]").val();
    var title_ar = $("#mdl-add-category input[name=title-ar]").val();
    var title = 'fa:' + title_fa + ',en:' + title_en + ',ar:' + title_ar;
    var title_to_print = $("#mdl-add-category input[name=title-" + base_locale + "]").val();

    var li_to_add = `<li class="dd-item dd3-item" data-id="${++lastId}" data-title="${title}"><div class="dd-handle dd3-handle"></div><div class="dd3-content" name="1"><div class="row"><div class="col col-md-1"><a href="#"><i class="fa fa-remove"></i></a></div><div class="col col-md-1"><a href="#" data-toggle="modal" data-target="#mdl-edit-category" data-backdrop="true" class="edit-item"><i class="fa fa-edit"></i></a></div><div class="col col-md-1"><a href="#" data-toggle="modal" data-target="#mdl-add-category" data-backdrop="true"class="add-item"><i class="fa fa-plus"></i></a></div><div class="col col-md-9 item" style="text-align: left">${title_to_print}</div></div></div></li>`;

    if (parent_id == "0") {

        var prnt = $(".dd > ol.dd-list");
        $(prnt).append(li_to_add);

    } else {

        if ($(".dd li.dd-item[data-id=" + parent_id + "]").length) {
            var prnt = $(".dd li.dd-item[data-id=" + parent_id + "]");
        }
        if ($('ol', prnt).length) {
            $('ol', prnt).append(li_to_add);
        } else {
            $(prnt).append(`<ol class="dd-list outer">${li_to_add}</ol>`);
        }
    }


    $('#mdl-add-category').modal('hide');
});


// EDIT TITLE

$(".dd").on('click', '.edit-item', function (e) {

    if ($(this).parent().parent().parent().parent().length) {
        $('#mdl-edit-category #selected-item').val($(this).parent().parent().parent().parent().attr('data-id'));
        var titles = $(this).parent().parent().parent().parent().attr('data-title');
        var ttls = titles.split(',');

        $.each(ttls, function (indx, vlu) {
            var k_v = vlu.split(':');
            $('#mdl-edit-category input[name=title-' + k_v[0] + ']').val(k_v[1]);
        });

    } else {
        $('#mdl-edit-category #selected-item').val("0");
    }

});

$("#btn-edit-category").click(function () {

    if ($("#mdl-edit-category input[name=title-fa]").val().trim() === '') {
        alert("عنوان فارسی را پر نمایید");
        return;
    }

    if ($("#mdl-edit-category input[name=title-en]").val().trim() === '') {
        alert("عنوان انگلیسی را پر نمایید");
        return;
    }

    if ($("#mdl-edit-category input[name=title-ar]").val().trim() === '') {
        alert("عنوان عربی را پر نمایید");
        return;
    }
    var parent_id = $("#mdl-edit-category #selected-item").val();

    var title_fa = $("#mdl-edit-category input[name=title-fa]").val();
    var title_en = $("#mdl-edit-category input[name=title-en]").val();
    var title_ar = $("#mdl-edit-category input[name=title-ar]").val();
    var title = 'fa:' + title_fa + ',en:' + title_en + ',ar:' + title_ar;
    var title_to_print = $("#mdl-edit-category input[name=title-" + base_locale + "]").val();

    $("li.dd3-item[data-id=" + parent_id + "]").attr("data-title", title);
    $("li.dd3-item[data-id=" + parent_id + "] > .dd3-content > .row > .item").html(title_to_print);

    $('#mdl-edit-category').modal('hide');

});

//**********


$("#mdl-category-selector button[name=send]").click(function (e) {

    if ($("#" + property_title + "-container").length) {
        var property_title = $('#mdl-category-selector #nestable-content').val();
        var container = $("#" + property_title + "-container");
        container.html("");

        $.each(selected_items, function (key, value) {
            var s = `<input type="hidden" name="${property_title}[]" value="${key}">`;
            s += `<span class="btn btn-outline-danger danger">${value}</span>`;
            s += `&nbsp&nbsp&nbsp`;
            container.append(s)
        });
    } else if ($('#mdl-filters-creator input[name=values]').length) {

        var container = $('#mdl-filters-creator input[name=values]');
        var vals = [];
        $.each(selected_items, function (key, value) {
            vals.push(key);
        });
        container.val(vals.join(','));
    }

    $("#mdl-category-selector").modal('hide');
});
