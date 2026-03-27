{{--<script src="https://cdn.tiny.cloud/1/p5te0wbrc3rkauufn0ullcbce3lspfekdsbkh8fs6l7qkg74/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}
{{--<script src="https://wiris.net/demo/plugins/app/WIRISplugins.js?viewer=image"></script>--}}

<script type="text/javascript">
    $(function(){

        function insert_contents(inst) {
            inst.setContent('لکھنا شروع کریں');
        }
        tinyMCE.init({
            selector: ".te",
            external_plugins: {
                'tiny_mce_wiris': "{{url('node_modules/@wiris/mathtype-tinymce5/plugin.min.js')}}",
            },

            plugins: 'lists media table autoresize',
            menubar:true,
            statusbar: false,
            // toolbar: 'ltr rtl a11ycheck checklist code formatpainter pageembed permanentpen table',
            // toolbar: 'fullscreen print forecolor backcolor removeformat | undo redo | bold italic underline strikethrough fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor | ltr rtl',
            // toolbar_location: 'bottom',
            toolbar: 'tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry|undo redo|fontselect fontsizeselect| insert | styleselect| bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |code | customalign |forecolor backcolor',
            htmlAllowedTags: ['.*'],
            htmlAllowedAttrs: ['.*'],
            draggable_modal: true,
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Write Urdu',
            directionality: "rtl",
            content_style: "@import url('https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?family=Noto Nastaliq Urdu&display=Noto Nastaliq Urdu);body { font-family: 'Noto Nastaliq Urdu'; }",
            font_formats: "Noto Nastaliq Urdu; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
            "content_css": 'https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css,https://fonts.googleapis.com/earlyaccess/notonaskharabic.css,/fonts/Qadreeregular.css,https://fonts.googleapis.com/css2?family=Amiri&family=Harmattan:wght@400;700&family=Katibeh&family=Lateef&family=Markazi+Text&family=Scheherazade:wght@400;700&family=Tajawal:wght@300;400&display=swap" rel="stylesheet',
            setup: function (ed) {
                ed.on('init', function () {

                    // $(this.getDoc()).find('head').append("<style>p{margin:0; font-size: 12px !important;font-family: 'Noto Nastaliq Urdu';}</style>");
                    // $('#spinner').hide();
                    //  $('[data-toggle="tooltip"]').tooltip();
                });
            },
            init_instance_callback: "insert_contents",
        });
        tinyMCE.init({
            selector: ".eng",
            plugins: 'lists media table autoresize link image',
            external_plugins: {
                'tiny_mce_wiris': "{{url('node_modules/@wiris/mathtype-tinymce5/plugin.min.js')}}",
            },
            menubar:true,
            statusbar: false,
            //toolbar: 'ltr rtl a11ycheck checklist code formatpainter pageembed permanentpen table',
            // toolbar: 'link image code|fullscreen print forecolor backcolor removeformat | undo redo | bold italic underline strikethrough fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor | ltr rtl',
            // toolbar_location: 'bottom',
            toolbar: 'tiny_mce_wiris_formulaEditor tiny_mce_wiris_formulaEditorChemistry|undo redo|fontselect fontsizeselect| insert | styleselect| bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent |code | customalign |forecolor backcolor',
            htmlAllowedTags: ['.*'],
            htmlAllowedAttrs: ['.*'],
            draggable_modal: true,
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Write Urdu',
            // directionality: "rtl",
            content_style: "@import url('https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css?family=Noto Nastaliq Urdu&display=Noto Nastaliq Urdu);body {font-family: 'Noto Nastaliq Urdu'; }",
            font_formats: "Noto Nastaliq Urdu; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Oswald=oswald; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
            "content_css": 'https://fonts.googleapis.com/earlyaccess/notonastaliqurdu.css,https://fonts.googleapis.com/earlyaccess/notonaskharabic.css,/fonts/Qadreeregular.css,https://fonts.googleapis.com/css2?family=Amiri&family=Harmattan:wght@400;700&family=Katibeh&family=Lateef&family=Markazi+Text&family=Scheherazade:wght@400;700&family=Tajawal:wght@300;400&display=swap" rel="stylesheet',
            setup: function (ed) {
                ed.on('init', function () {

                    // $(this.getDoc()).find('head').append("<style>p{margin:0; padding: 0; font-size:12px !important;font-family: 'Noto Nastaliq Urdu';}</style>");
                    // $('#spinner').hide();
                    //  $('[data-toggle="tooltip"]').tooltip();
                });
            },
            init_instance_callback: "insert_contents",
        });
        tinymce.init({
        });
        tinymce.execCommand("mceAddControl", false, ".te");
        // tinymce.execCommand("mceAddControl", false, ".eng");

    });

</script>
