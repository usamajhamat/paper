$(document).on('change', '#course1', function (e) {
    e.preventDefault();
    var url='{{route('course-classes','')}}'+'/'+$(this).val()
    $('#subjects1').empty();
    $('#chapters1').empty();
    $.ajax({
        type:'GET',
        url:url,
        success:function(data){
            var option='<option>Select</option>';

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
            var option='<option>Select</option>';

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
            var option='<option>Select</option>';

            $.each(data.chapters,function (key,val) {
                option +="<option value='"+val.chapter_id+"'>"+val.chapter_name+"</option>";
            });
            $('#chapters1').html(option);

        }
    });
});


