<link href="https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/notonaskharabic.css?display=swap" rel="stylesheet">
{{--<script src="https://cdn.tiny.cloud/1/p5te0wbrc3rkauufn0ullcbce3lspfekdsbkh8fs6l7qkg74/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
{{--<script src="https://wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image"></script>--}}
{{--<script src="https://www.rosariosis.org/demonstration/assets/js/tinymce/tinymce.min.js?v=4.9.8"></script>--}}
<script src="{{asset('public/tinymce/tinymce.min.js?v=4.9.8')}}"></script>
{{--<script src="http://cdn.tinymce.com/4/tinymce.min.js"></script>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"></script>--}}

{{--<script src="{{asset('public/admin/assets/js/vendors/jquery-3.2.1.min.js')}}"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/tinymce@4.9.8/jquery.tinymce.min.js"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/tinymce@4.9.8/tinymce.min.js"></script>--}}

<style>
    .tox-tinymce-aux{z-index:99999999999 !important;}
    .mce-menu { z-index: 65537 !important; }

</style>
<script>
    $(function () {
        // tinymce.execCommand("mceAddControl", false, ".te");
        tinymce.init({
            selector: '.te',
            theme: 'modern',
            plugins: 'formula link image pagebreak paste table textcolor colorpicker code  hr media lists autoresize',
            toolbar: "formula undo redo fontselect fontsizeselect formatselect  bold table inserttable cell row column italic underline bullist numlist alignleft aligncenter alignright alignjustify link image forecolor backcolor code",
            menubar:false,
            statusbar: false,
            paste_data_images: true,
            images_upload_handler: function(blobInfo, success, failure) {
                success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
            },
            pagebreak_separator: '<div style="page-break-after: always;"></div>',
            language: "",
            directionality: "rtl",
            relative_urls: false,
            toolbar_mode: 'floating',
            // verify_html: false,
            remove_script_host: false,
            external_plugins: {
                // Add your plugins using the action hook below.
                'formula': '{{url('node_modules/tinymce-formula/plugin.min.js')}}'

            },

            // content_style: "@import url('https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?family=Noto Nastaliq Urdu&display=Noto Nastaliq Urdu);body {font-family: 'Noto Nastaliq Urdu'; }",
            // font_formats: "Noto Nastaliq Urdu; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
            // "content_css": 'https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css,https://fonts.googleapis.com/earlyaccess/notonaskharabic.css,/fonts/Qadreeregular.css,https://fonts.googleapis.com/css2?family=Amiri&family=Harmattan:wght@400;700&family=Katibeh&family=Lateef&family=Markazi+Text&family=Scheherazade:wght@400;700&family=Tajawal:wght@300;400&display=swap" rel="stylesheet',
            // init_instance_callback: "insert_contents",

        });
        tinymce.init({
            selector: '.eng',
            theme: 'modern',
            plugins: 'formula link image pagebreak paste table textcolor colorpicker code  hr media lists autoresize',
            toolbar: "formula undo redo  fontselect fontsizeselect formatselect  table inserttable cell row column bold italic underline bullist numlist alignleft aligncenter alignright alignjustify link image forecolor backcolor code",
            menubar:false,
            statusbar: false,
            menu: {
                // file: {title: 'File', items: 'newdocument'},
                edit: {
                    title: 'Edit',
                    items: 'undo redo | cut copy paste pastetext'
                },
                insert: {
                    title: 'Insert',
                    items: 'media | hr pagebreak | inserttable cell row column'
                },
                // view: {title: 'View', items: 'visualaid'},
                format: {
                    title: 'Format',
                    items: 'formats | removeformat'
                }
            },
            // menubar:true,
            // statusbar: false,
            paste_data_images: true,
            images_upload_handler: function(blobInfo, success, failure) {
                success("data:" + blobInfo.blob().type + ";base64," + blobInfo.base64());
            },
            pagebreak_separator: '<div style="page-break-after: always;"></div>',
            language: "",
            directionality: "ltr",
            relative_urls: false,
            toolbar_mode: 'floating',

            // verify_html: false,
            remove_script_host: false,
            external_plugins: {
                // Add your plugins using the action hook below.
                'formula': '{{url('node_modules/tinymce-formula/plugin.min.js')}}'

            },
            // content_style: "@import url('https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?family=Noto Nastaliq Urdu&display=Noto Nastaliq Urdu);body {font-family: 'Noto Nastaliq Urdu'; }",
            // font_formats: "Noto Nastaliq Urdu; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
            // "content_css": 'https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css,https://fonts.googleapis.com/earlyaccess/notonaskharabic.css,/fonts/Qadreeregular.css,https://fonts.googleapis.com/css2?family=Amiri&family=Harmattan:wght@400;700&family=Katibeh&family=Lateef&family=Markazi+Text&family=Scheherazade:wght@400;700&family=Tajawal:wght@300;400&display=swap" rel="stylesheet',

        });


        // tinymce.execCommand("mceAddControl", false, ".te");

    })

</script>
{{--<script src="https://wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image"></script>--}}
