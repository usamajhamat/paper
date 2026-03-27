<script>
        $(document).ready(function () {
            $(document).on('change','#course1' ,function (e) {
                e.preventDefault();
                var url='{{route('course-classes','')}}'+'/'+$(this).val();
                //changePrerequisite();
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function(data){
                        var option='<option value="">Select</option>';

                        $.each(data.classes,function (key,val) {
                            option +="<option value='"+val.class_id+"'>"+val.class_name+"</option>";
                        });

                        $('#classes1').html(option);

                    }
                });
            });
            $(document).on('change', '#classes1', function (e) {
                e.preventDefault();
                var url='{{route('class-subjects','')}}'+'/'+$(this).val();
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function(data){
                        var option='<option value="">Select</option>';

                        $.each(data.subjects,function (key,val) {
                            option +="<option value='"+val.subject_id+"'>"+val.subject_name+"</option>";
                        });
                        $('#subjects1').html(option);

                    }
                });
            });
            $(document).on('change', '#subjects1', function (e) {
                e.preventDefault();
                var url='{{route('subject-chapters','')}}'+'/'+$(this).val();
                $.ajax({
                    type:'GET',
                    url:url,
                    success:function(data){
                        var option='<option value="">Select</option>';

                        $.each(data.chapters,function (key,val) {
                            option +="<option value='"+val.chapter_id+"'>"+val.chapter_name+"</option>";
                        });
                        $('#chapters1').html(option);

                    }
                });
                $(document).on('change', '#chapters1', function (e) {
                    e.preventDefault();
                    var url = '{{route('chapter-topics','')}}' + '/' + $(this).val();
                    var chId=$(this).val();
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function (data) {
                            var option = '<option value="">Select</option>';

                            $.each(data.topics, function (key, val) {
                                option += "<option value='" + val.topic_id + "'>" + val.topic_name + "</option>";
                            });
                            $('#topics1').html(option);
                            questionTypes(chId);
                            priorities(chId)
                        }
                    });
                });

                $(".modal").on("hidden.bs.modal", function(){
                    $(".modal-body1").html("");
                });
            });

            $(document).on('change', '#chapters1', function (e) {
                e.preventDefault();
                var url = '{{route('chapter-priority','')}}' + '/'+$(this).val();
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (data) {
                        var option = '<option>Select</option>';

                        $.each(data.types, function (key, val) {
                            option += "<option value='" + val.priority_id + "'>" + val.priority_name + "</option>";
                        });
                        $('#priorities1').html(option);

                    }
                });
            });
        });

        function questionTypes(chapterId) {
            var url = '{{route('chapter-QT','')}}' + '/' +chapterId;
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    var option = '<option value="">Select</option>';

                    $.each(data.types, function (key, val) {
                        var urdu=val.urdu!=null?' ('+val.urdu+')':'';
                        if(val.english!=null)
                        {
                            option += "<option value='" + val.assign_id + "'>" + val.english +urdu + "</option>";
                        }else{
                            option += "<option value='" + val.assign_id + "'>" + val.urdu + "</option>";
                        }

                    });
                    $('#types1').html(option);

                }
            });
        }
</script>