var FILE_MANAGER = FILE_MANAGER || (function () {
    var _args = {}; // private
    var upload_url = '';
    var selector;
    var allowed_file_extensions = ['jpg', 'png', 'gif'];
    return {
        init: function (Args) {
            this.parse(Args);
            upload_url = Args['upload_url'];
            selector = Args['selector'];

            if (Args['allowed_file_extensions'])
                allowed_file_extensions = Args['allowed_file_extensions'];

            this.launch();
        },
        helloWorld: function () {
            alert(upload_url);
        },
        parse: function (args) {
            for (let elm in args) {
                _args[elm] = args[elm];
            }
        },
        launch: function () {

            selector.fileinput({
                theme: 'fa',
                uploadUrl: `${upload_url}`,
                uploadExtraData: function () {
                    return {
                        _token: $("input[name='_token']").val(),
                    };
                },
                allowedFileExtensions: allowed_file_extensions,
                overwriteInitial: false,
                maxFileSize: 20000,
                uploadAsync: true,
                maxFilesNum: 100,
                // showUpload: false,
                fileActionSettings: {
                    showUpload: false,
                },
                slugCallback: function (filename) {
                    // alert(filename);
                    return filename.replace('(', '_').replace(']', '_');

                }

            });

            selector.on('fileuploaded', function (event, previewId, index, fileId) {


                console.log(previewId.response.path);
                // files[type]
                var image_extensions = file_extensions['images'];
                var video_extensions = file_extensions['videos'];
                var swf_extensions = file_extensions['swfs'];

                var ext = previewId.response.path.split('.').pop();
                if (image_extensions.indexOf(ext) !== -1) {

                    var value = {'properties': {'path': {'value': previewId.response.path, 'thumbs': {"300x250": previewId.response.thumb}}}};
                    files['images'].push(value);
                    var img = `<img class="se-image" data-src="${previewId.response.path}" src="${previewId.response.thumb}" style="width: 128px" data-content="0" alt="">`;
                    $("#rw-images >div:first-child").append(img);

                } else if (video_extensions.indexOf(ext) !== -1) {

                    var value = {'properties': {'path': {'value': previewId.response.path}}};
                    files['videos'].push(value);
                    var s = `<div class="se-image" data-src="${previewId.response.path}"  style="position:relative;width:400px;display: inline-block !important;" data-content="0"><video width="400" controls><source src="${previewId.response.path}" type="video/mp4"></video><input type="checkbox" style="position: absolute; top:0;left:0;z-index: 1001;"></div>`;
                    $("#rw-images >div:first-child").append(s);


                } else if (swf_extensions.indexOf(ext) !== -1) {

                    var value = {'properties': {'path': {'value': previewId.response.path}}};
                    files['swfs'].push(value);
                    var s = `<div class="se-image" data-src="${previewId.response.path}"  style="position:relative;width:400px;display: inline-block !important;" data-content="0"><embed src="${previewId.response.path}" style="width: 400px;" quality="high" pluginspage="http://www.macromedia.com/go/getfashplayer" type="application/x-shockwave-flash"></div>`;
                    $("#rw-images >div:first-child").append(s);

                }


            });
            selector.on('filebatchuploadcomplete', function (event, files, extra) {
                // console.log(files);
                $('#file-1').fileinput('clear');
                $('.nav-tabs a[href="#home-just"]').tab('show');
            });
        }
    };
}());

$('#mdl-file-manager').on('show.bs.modal', function (e) {


    var type = $("#document-type", this).val();
    // console.log(type);
    var extensions = file_extensions[type];
    var image_extensions = file_extensions['images'];
    var video_extensions = file_extensions['videos'];
    var flash_extensions = file_extensions['flashes'];
    // console.log(extensions);
    var file_container = $("#rw-images > div:first-child");
    file_container.html("");

    console.log(files[type]);
    $.each(files[type], function (key, value) {
        var s = "";

        if (typeof value.path != "undefined") {
            var ext = value.path.split('.').pop();
            if (image_extensions.indexOf(ext) !== -1) {
                // if (typeof value.properties.path.thumbs != "undefined" && typeof value.properties.path.value != "undefined") {
                if (typeof value.path != "undefined" ) {
                    var s = `<img class="se-image" src="${value.path}" data-src="${value.path}" style="width: 128px" data-content="0" alt="">`;
                    // var s = `<img class="se-image" src="${value.properties.path.thumbs["300x250"]}" data-src="${value.path}" style="width: 128px" data-content="0" alt="">`;

                    file_container.append(s);
                }
            } else if (video_extensions.indexOf(ext) !== -1) {
                var s = `<div class="se-image" data-src="${value.path}"  style="position:relative;width:400px;display: inline-block !important;" data-content="0"><video width="400" controls><source src="${value.path}" type="video/mp4"></video><input type="checkbox" style="position: absolute; top:0;left:0;z-index: 1001;"></div>`;
                file_container.append(s);

            } else if (flash_extensions.indexOf(ext) !== -1) {

                var s = `<div class="se-image" data-src="${value.properties.path.value}"  style="position:relative;width:400px;display: inline-block !important;" data-content="0"><embed src="${value.properties.path.value}" style="width: 400px;" quality="high" pluginspage="http://www.macromedia.com/go/getfashplayer" type="application/x-shockwave-flash"></div>`;
                file_container.append(s);
            }
        }


    });


    $(".attributes .form-group").prop('hidden', true);
    // alert($("#attributes-to-display").val());
    var attr_to_display = $("#attributes-to-display").val().trim();
    if (attr_to_display != '') {
        var attrs = attr_to_display.split(',');
        for (i = 0; i < attrs.length; i++) {
            $("input[name=" + attrs[i] + "]", ".attributes").parent().prop('hidden', false);
        }
    }

    // alert(documents_urls[type]);

    $('#file-1').fileinput('destroy');
    $('#file-1').fileinput({
        theme: 'fa',
        uploadUrl: "",
        // uploadUrl: documents_urls[type],
        uploadExtraData: function () {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        allowedFileExtensions: extensions,
        overwriteInitial: false,
        maxFileSize: 20000,
        uploadAsync: true,
        maxFilesNum: 100,
        // showUpload: false,
        fileActionSettings: {
            showUpload: false,
        },
        slugCallback: function (filename) {
            // alert(filename);
            return filename.replace('(', '_').replace(']', '_');
        }
    });

});


// $(document).ready(function () {
//     FILE_MANAGER.init({'selector': $("#file-1"), 'upload_url': "{{route('documents.store', ['type'=>'general'])}}"});
//     FILE_MANAGER.launch();
// });

