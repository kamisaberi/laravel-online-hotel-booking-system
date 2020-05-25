$("#slide-images").click(function () {
});

$("#btn-add-image").click(function () {

    var property_title = $('#property-title').val();
    $("#rw-selected-images-" + property_title).html("");
    var tt = $("#property-title").val();
    var type = $("#document-type").val();

    if (tt !== 'tinymce') {

        if (type == 'images') {

            $('#rw-images').find('.se-image').each(function () {
                var c = $(this).attr('data-content');
                if (c == 1) {
                    // console.log($(this).attr('src'));
                    var t = "<div class='col col-md-1 col-sm-6'>";
                    t += "<input type='hidden' name='" + tt + "[]' value='" + $(this).attr('data-src') + "'>";
                    t += "<img src='" + $(this).attr('src') + "' style='width: 100%'>";
                    t += "</div>";
                    // console.log(property_title);
                    $("#rw-selected-images-" + property_title).append(t);
                }
            });

        } else if (type == 'videos') {

            $('#rw-images').find('.se-image').each(function () {
                var c = $(this).attr('data-content');
                if (c == 1) {
                    var t = "<div class='col col-md-6 col-sm-12'>";
                    t += "<input type='hidden' name='" + tt + "[]' value='" + $(this).attr('data-src') + "'>";
                    t += '<video controls><source src="' + $(this).attr('data-src') + '" type="video/mp4"></video>';
                    t += "</div>";
                    $("#rw-selected-images-" + property_title).append(t);
                }
            });

        } else if (type == 'swfs') {

            $('#rw-images').find('.se-image').each(function () {
                var c = $(this).attr('data-content');
                if (c == 1) {
                    var t = "<div class='col col-md-6 col-sm-12'>";
                    t += "<input type='hidden' name='" + tt + "[]' value='" + $(this).attr('data-src') + "'>";
                    t += '<embed src="' + $(this).attr('data-src') + '" style="width: 600px;height: 400px;" quality="high" pluginspage="http://www.macromedia.com/go/getfashplayer" type="application/x-shockwave-flash">';
                    t += "</div>";
                    $("#rw-selected-images-" + property_title).append(t);
                }
            });

        }
    } else if (tt === 'tinymce' && activeTextArea != null) {

        if (type == 'images') {
            $('#rw-images').find('.se-image').each(function () {
                var c = $(this).attr('data-content');
                if (c == 1) {
                    activeTextArea.insertContent('&nbsp; <img src="' + $(this).attr("data-src") + '" /> &nbsp;');
                }
            });
        } else if (type == 'videos') {

            var w = 0;
            if ($(".attributes input[name=width]").parent().prop('hidden') === false) {
                var w = $(".attributes input[name=width]").val();
            }

            $('#rw-images').find('.se-image').each(function () {
                var c = $(this).attr('data-content');
                if (c == 1) {
                    activeTextArea.insertContent('&nbsp; <video ' + (w != 0 ? `width="${w}"` : '') + 'controls><source src="' + $(this).attr("data-src") + '" type="video/mp4"></video> &nbsp;');
                }
            });

        } else if (type == 'swfs') {

            var w = 0;
            if ($(".attributes input[name=width]").parent().prop('hidden') === false) {
                var w = $(".attributes input[name=width]").val();
            }
            var h = 0;
            if ($(".attributes input[name=height]").parent().prop('hidden') === false) {
                var h = $(".attributes input[name=height]").val();
            }

            $('#rw-images').find('.se-image').each(function () {
                var c = $(this).attr('data-content');
                if (c == 1) {

                    var st = '';
                    if (w != 0 && h != 0) {
                        st = ` style="width:${w}px;height:${h}px" `;
                    } else if (w != 0 && h == 0) {
                        st = ` style="width:${w}px" `;
                    } else if (w == 0 && h != 0) {
                        st = ` style="height:${h}px" `;
                    }

                    activeTextArea.insertContent('&nbsp; <embed src="' + $(this).attr("data-src") + '" quality="high" '
                        + st +
                        ' pluginspage="http://www.macromedia.com/go/getfashplayer" type="application/x-shockwave-flash"> &nbsp;');
                }

            });


        }


    }
    $("#modal1").modal("hide");

});

$('#rw-images').on('click', '.se-image', function (e) {
    var m_s = $('#multi_selection').val();
    if (m_s == 1) {

        var c = $(this).attr('data-content');
        if (c == 0) {

            $(this).css('border', '2px solid red').attr('data-content', 1);

        } else {

            $(this).css('border', '2px none red').attr('data-content', 0);

        }

    } else if (m_s == 0) {

        var c = $(this).attr('data-content');
        if (c == 0) {

            $('.se-image').each(function () {
                $(this).css('border', '2px none red').attr('data-content', 0);
            });
            $(this).css('border', '2px solid red').attr('data-content', 1);

        } else {

            $(this).css('border', '2px none red').attr('data-content', 0);

        }

    }

});

