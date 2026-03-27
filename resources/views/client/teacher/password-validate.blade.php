<script>
    $(document).ready(function(){
        $("#teacherForm").validate({
            rules: {
                cpassword: {
                    required: true
                },
                npassword: {
                    required: true
                }
            },
            messages: {

            },
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            highlight: function(element, errorClass, validClass) {
                $(element).removeClass(validClass).addClass(errorClass).
                next('label').removeAttr('data-success').attr('data-error', 'Incorrect!');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass).
                next('label').removeAttr('data-error').attr('data-success', 'Correct!');
            },
            errorPlacement: function() {
                // Done in highlight/unhighlight
            },

        });
    });
</script>