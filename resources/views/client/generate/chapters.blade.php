
<style>
    body {
        font-family: "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif;
    }

    @font-face {
        font-family: 'Jameel Noori Nastaleeq';
        src: url('~/fonts/Jameel Noori Nastaleeq.ttf');
    }

    @font-face {
        font-family: 'Jameel Noori Nastaleeq';
        src: url('~/Content/fonts/Jameel Noori Nastaleeq.ttf');
    }

    @font-face {
        font-family: 'Jameel Noori Nastaleeq';
        src: url('https://www.paktestsolution.com/fonts/Jameel Noori Nastaleeq.ttf');
    }

    /*Get Syllabus CSS*/
    .Courses {
        margin-bottom: 10px;
        cursor: pointer;
        transition: 0.2s;
        box-shadow: 0px 0px 2px #999999;
        background-color:#fff;
    }

    .Courses:hover{
        transform: scale(1.05);
        background-color: rgba(153,255,153,.5);
    }

    .Courses h4 {
        color: #000;
        font-weight:600;
        padding-top: 15px;
        border-bottom: 1px ridge #999999;
        font-size:1.3em;
        text-align:center;
        transform:scaleY(1.3);
    }

    .Courses p {
        color: #000;
        text-align:center;
        margin-bottom:0px;
    }

    .Courses i {
        font-size: 30px;
        color: #2A3F54;
        padding-top: 10px;
        text-align:right;
        padding-right:10px;
        padding-bottom:10px;
        width:100%;
    }

    .Subjects {
        margin-bottom: 10px;
        cursor: pointer;
        transition: 0.2s;
        box-shadow: 0px 0px 2px #999999;
        background-color: #fff;
    }

    .Subjects:hover {
        transform: scale(1.05);
        background-color: rgba(153,255,153,.5);
    }

    .Subjects img {
        max-width: 90px;
        max-height: 100px;
        position: relative;
    }

    .Subjects h5 {
        color: #000;
        font-weight:600;
        padding-top: 15px;
        border-bottom: 1px ridge #999999;
        font-size:1.3em;
        text-align:center;
        transform:scaleY(1.3);
        font-weight:bold;
    }

    .Subjects p {
        color: #000;
        text-align: center;
        margin-bottom:0px;
    }

    .Subjects i {
        font-size: 30px;
        color: #2A3F54;
        text-align: right;
        padding-right: 10px;
        padding-bottom: 10px;
        width: 100%;
    }


    .Chapters ul {
        list-style-type: none;
        background-color: #fff;
        padding: 10px;
    }

    .Chapters ul li {
        text-align: left;
        cursor: pointer;
        vertical-align: top;
    }

    .Chapters .checkbox:hover {
        transform: scale(2);
    }

    .Chapters ul li h6 {
        font-family: 'Arial Narrow', 'Jameel Noori Nastaleeq';
        font-weight: 600;
        padding-left: 10px;
    }

    .Chapters ul li p {
        font-family: 'Arial Narrow', 'Jameel Noori Nastaleeq';
        font-weight: 400;
        padding-left: 10px;
    }

    .Chapters ul li a {
        text-decoration: none;
        color:#000000;
    }

    .Chapters ul li .topics {
        width: 100%;
        line-height: 1;
        padding-left: 10px;
        padding-bottom: 5px;
    }

    div.slide-left {
        width:100%;
        overflow:hidden;
    }
    div.slide-left {
        animation: slide-left 1s;
    }

    @keyframes slide-left {
        from {
            margin-left: 100%;
            width: 300%;
        }

        to {
            margin-left: 0%;
            width: 100%;
        }
    }

</style>
<div class="col-12 slide-left">
    <div class="card">
        <div class="text-left bg-white p-2" style="width:100%;">
            <input type="checkbox" class="checkbox text-left" id="selectAll" />
            <label class="text-left" style="font-weight: bold;">SELECT ALL CHAPTERS</label>
        </div>
    </div>
</div>

@foreach($chapters as  $chapter)
    <div class="col-md-6 slide-left">
        <div class="card">
            <div class="card-body Chapters">
                <div class="col-md-12">
                    <ul>
                        <li>
                            <input type="checkbox" class="checkbox d-inline ChapterIDs" name="ch[]" value="{{$chapter->chapter_id}}" onclick="Parent()" />
                            @if($chapter->chapter_number!=null)
                                <h6 class="d-inline">CHAP {{$chapter->chapter_number}}: {{$chapter->chapter_name}}</h6>
                                @else
                                <h6 class="d-inline">{{$chapter->chapter_name}}</h6>
                            @endif
                            <ul>
                                @php $topics=\App\Models\Admin\Topic::topicByChapter($chapter->chapter_id) @endphp
                                @foreach($topics as $topic)
                                    {{--@php $value=array($chapter->chapter_id =>$topic->topic_id); @endphp--}}
                                    <li class="topics" style="width: 100%;">
                                        <input type="checkbox"  class="checkbox d-inline Topics" name="topics[]" value="{{$chapter->chapter_id.','.$topic->topic_id}}" onclick="Child()" />
                                        <p class="d-inline">{{$chapter->chapter_number}}.{{$topic->topic_number}} {{$topic->topic_name}}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endforeach
<div class="col-12">
<a onclick="return submit()" id="allSelectedValues" href="#" class="btn btn-dark btn-sm col-md-2 col-sm-4 float-right float-end"> NEXT <span class="fa fa-chevron-right"></span> </a>
</div>

{{--<div id="pg-4" style="display: block;">--}}
    {{--<div class="row">--}}
        {{--<div class="col-12">--}}
            {{--<div class="text-left bg-white p-2" style="width:100%;">--}}
                {{--<input type="checkbox" class="checkbox text-left" id="selectAll" />--}}
                {{--<label class="text-left" style="font-weight: bold;">SELECT ALL CHAPTERS</label>--}}
            {{--</div>--}}
            {{--<hr />--}}
            {{--<div class="row Chapters" id="embedHtml-pg-chapter">--}}
                {{--@foreach($chapters as  $chapter)--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<input type="checkbox" class="checkbox d-inline ChapterIDs" value="374" onclick="Parent()" />--}}
                                {{--<h6 class="d-inline">CHAP {{$chapter->chapter_number}}: {{$chapter->chapter_name}}</h6>--}}
                                {{--<ul>--}}
                                    {{--@php $topics=\App\Models\Admin\Topic::topicByChapter($chapter->chapter_id) @endphp--}}
                                    {{--@foreach($topics as $topic)--}}
                                        {{--<li class="topics">--}}
                                            {{--<input type="checkbox" class="checkbox d-inline Topics" value="680" onclick="Child()" />--}}
                                            {{--<p class="d-inline">{{$chapter->chapter_number}}.{{$topic->topic_number}} {{$topic->topic_name}}</p>--}}
                                        {{--</li>--}}
                                    {{--@endforeach--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<input type="checkbox" class="checkbox d-inline ChapterIDs" value="374" onclick="Parent()" />--}}
                                {{--<h6 class="d-inline"></h6>--}}
                                {{--<ul>--}}
                                    {{--<li class="topics">--}}
                                        {{--<input type="checkbox" class="checkbox d-inline Topics" value="680" onclick="Child()" />--}}
                                        {{--<p class="d-inline"></p>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    {{--<div class="col-lg-6">--}}
                        {{--<ul>--}}
                            {{--<li>--}}
                                {{--<input type="checkbox" class="checkbox d-inline ChapterIDs" value="374" onclick="Parent()" />--}}
                                {{--<h6 class="d-inline"></h6>--}}
                                {{--<ul>--}}
                                    {{--<li class="topics">--}}
                                        {{--<input type="checkbox" class="checkbox d-inline Topics" value="680" onclick="Child()" />--}}
                                        {{--<p class="d-inline"></p>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}

                {{--<br />--}}
                {{--<br />--}}
                {{--<div class="col-12">--}}
                    {{--<a onclick="return validateChapter()" id="allSelectedValues" href="#" class="btn btn-success btn-sm col-md-2 col-sm-4 float-end"> NEXT <span class="fa fa-chevron-right"></span> </a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

<script>
    var CourseID = "";
    var ClassID = "";
    var SubjectID = "";
    var ChaptersIDs = "";
    var TopicsIDs = "";


    $("#selectAll").change(function () {
        $("input:checkbox.ChapterIDs").prop('checked', this.checked);
        $("input:checkbox.Topics").prop('checked', this.checked);
        GetChapterIDs();
    });

    function Parent() {
        $("input:checkbox.ChapterIDs").change(function () {
            $(this).siblings('ul')
                .find("input:checkbox.Topics")
                .prop('checked', this.checked);
            GetChapterIDs();
        });
    };

    function Child() {
        $("input:checkbox.Topics").change(function () {
            if (this.checked == true) {
                if ($(this).parents('li').find("input:checkbox.ChapterIDs").prop('checked') == false) {
                    $(this).parents('li')
                        .find("input:checkbox.ChapterIDs")
                        .prop('checked', this.checked);
                    GetChapterIDs();
                }
            }
            else if ($(this).parents('li').find('input:checkbox.Topics:checked').length == 0) {
                $(this).parents('li')
                    .find("input:checkbox.ChapterIDs")
                    .prop('checked', false);
                GetChapterIDs();
            }
            GetChapterIDs();
        });
    };

    function validateChapter() {
        if ($("input:checkbox.ChapterIDs:checked").length > 0) {
            $("#formloader").show();
            return true;
        }
        else {
            Swal.fire(
                'Error!',
                'You have must select minimum one chapter!',
                'info'
            );
            return false;
        }
    }

    function GetChapterIDs() {
        ChaptersIDs = "";
        TopicsIDs = "";
        $.each($("input:checkbox.ChapterIDs:checked"), function () {
            var ValueID = $(this).val();
            if (ValueID != undefined) {
                ChaptersIDs += ValueID + ",";
            }
        });

        if (ChaptersIDs != "") {
            ChaptersIDs = ChaptersIDs.substring(0, (ChaptersIDs.length - 1));
            $("#txtChapterIDs").val(ChaptersIDs);
        }

        $.each($("input:checkbox.Topics:checked"), function () {
            var ValueID = $(this).val();
            if (ValueID != undefined) {
                TopicsIDs += ValueID + ",";
            }
        });

        if (TopicsIDs != "") {
            TopicsIDs = TopicsIDs.substring(0, (TopicsIDs.length - 1));
            $("#txtTopicIDs").val(TopicsIDs);
        }

        // $("#allSelectedValues").attr('href', "/GeneratePaper/GetGenerate?CourseID=" + CourseID + "&ClassID=" + ClassID + "&SubjectID=" + SubjectID + "&ChapterIDs=" + ChaptersIDs + "&TopicIDs=" + TopicsIDs);
    }

    function submit() {
        //$('.paperForm').submit();

        var topics = $("input[name='topics[]']:checked").map(function () {
            return this.value;
        }).get();
        var chp = $("input[name='ch[]']:checked").map(function () {
            return this.value;
        }).get();
        if(topics.length>0)
        {
            $.ajax({
                type:'POST',
                url:'{{route('paper-generate')}}',
                data:{topics:topics,chapters:chp},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success:function(data){
                   window.location.href = "{{route('my-paper-generate')}}";
                },
            });
        }else{
            alert('Selection Atleast One Topic')
        }

    }

    $(function () {
        TabFunc(1)
    });

    function TabFunc(e) {
        if (e == 1) {
            $('#pg-1').delay(300).show('slide', { direction: 'left' }, 300);
            $('#pg-2').hide('slide', { direction: 'right' }, 300)
            $('#pg-3').hide('slide', { direction: 'right' }, 300)
            $('#pg-4').hide('slide', { direction: 'right' }, 300)
        }
        else if (e == 2) {
            $('#pg-1').hide('slide', { direction: 'left' }, 300);
            $('#pg-2').delay(300).show('slide', { direction: 'right' }, 300)
        }
        else if (e == 3) {
            $('#pg-2').hide('slide', { direction: 'left' }, 300)
            $('#pg-3').delay(300).show('slide', { direction: 'right' }, 300)
        }
        else if (e == 4) {
            $('#pg-3').hide('slide', { direction: 'left' }, 300);
            $('#pg-4').delay(300).show('slide', { direction: 'right' }, 300)
        }
    }
</script>