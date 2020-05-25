$('div').on('click', '.locales a', function (e) {
    e.preventDefault();
    // alert("cccccc");
    var clicked = $('span', this);
    if (clicked.hasClass('flag-icon-grayed') === true) {
        clicked.removeClass('flag-icon-grayed');

        if ($(this).parent().parent().find('input[type=text] , textarea:not(.tinymce)').length) {
            $(this).parent().parent().find('input[type=text] , textarea:not(.tinymce)').val($('input[type=hidden]', this).val());

        } else if ($(this).parent().parent().find('textarea.tinymce').length) {

            var id = $(this).parent().parent().find('textarea.tinymce').attr('id');
            tinymce.get(id).setContent($('input[type=hidden]', this).val());

        }

        $(this).parent().find("a span").each(function () {
            if (!$(this).is(clicked)) {
                $(this).addClass('flag-icon-grayed');
            }
        });
    }

    // M.updateTextFields();
    // M.textareaAutoResize($('textarea.materialize-textarea'));

});

$('div').on('change', 'input[type=text], textarea', function () {
    var clicked = $(this);
    $(this).parent().find(".locales a span").each(function () {
        if (!$(this).hasClass('flag-icon-grayed')) {
            $(this).parent().find('input[type=hidden]').val(clicked.val());
        }
    });

});
// $('input[type=text], textarea').change(function () {
//     var clicked = $(this);
//     $(this).parent().find(".locales a span").each(function () {
//         if (!$(this).hasClass('flag-icon-grayed')) {
//             $(this).parent().find('input[type=hidden]').val(clicked.val());
//         }
//     });
// });

var activeTextArea = null;
tinymce.init({
    selector: '.tinymce',
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | addImage | addVideo | addFlash',
    relative_urls: false,
    remove_script_host: false,
    object_resizing: true,
    convert_urls: false,
    // plugins: "media",
    // menubar: "insert",
    // toolbar: "media",
    // toolbar2: 'addImage',
    // setup: function (editor) { // on the setup of the TinyMCE plugin, add a button with the alias 'addImage'
    //     editor.addButton('addImage', {
    //         text: 'Add Image', // the text to display alongside the button
    //         icon: 'image', // the icon to display alongside the button
    //         onclick: function () {
    //             activeTextArea = editor; // onclick of this button, set the active textarea to that of which the button was pressed
    //             $('#mdl-file-manager').modal('show'); // show the file picker modal
    //         }
    //     });
    // },
    setup: (editor) => {

        editor.ui.registry.addButton('addImage', {
            text: 'Add Image',
            icon: 'image',
            onAction: () => {
                activeTextArea = editor;
                $('#mdl-file-manager #property-title').val("tinymce");
                $('#mdl-file-manager #multi_selection').val("0");
                $('#mdl-file-manager #document-type').val("images");
                $('#mdl-file-manager #attributes-to-display').val("");
                $('#mdl-file-manager').modal('show');
            }
        });
        editor.ui.registry.addButton('addVideo', {
            text: 'Add Video',
            icon: 'gallery',
            onAction: () => {
                activeTextArea = editor;
                $('#mdl-file-manager #property-title').val("tinymce");
                $('#mdl-file-manager #multi_selection').val("0");
                $('#mdl-file-manager #document-type').val("videos");
                $('#mdl-file-manager #attributes-to-display').val("width");
                $('#mdl-file-manager').modal('show');
            }
        });

        editor.ui.registry.addButton('addFlash', {
            text: 'Add Flash',
            icon: 'gallery',
            onAction: () => {
                activeTextArea = editor;
                $('#mdl-file-manager #property-title').val("tinymce");
                $('#mdl-file-manager #multi_selection').val("0");
                $('#mdl-file-manager #document-type').val("swfs");
                $('#mdl-file-manager #attributes-to-display').val("width,height");
                $('#mdl-file-manager').modal('show');
            }
        });


    },
    init_instance_callback: function (editor) {
        editor.on('Change', function (e) {
            var id = $(this).attr('id');
            var s = '#' + id;
            $(s).parent().find(".locales a span").each(function () {
                if (!$(this).hasClass('flag-icon-grayed')) {
                    $(this).parent().find('input[type=hidden]').val(editor.getContent());
                }
            });

        });
    }

});
