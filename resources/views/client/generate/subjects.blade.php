<style>
    .Subjects {
        margin-bottom: 10px;
        cursor: pointer;
        transition: 0.2s;
        box-shadow: 0px 0px 2px #999999;
        background-color: #fff;
    }
    .Subjects img {
        max-width: 90px;
        max-height: 100px;
        position: relative;
    }
    .Subjects h5 {
        color: #000;
        font-weight: 600;
        padding-top: 15px;
        border-bottom: 1px
        ridge #999999;
        font-size: 1.3em;
        text-align: center;
        transform: scaleY(1.3);
        font-weight: bold;
    }
    .Subjects p {
        color: #000;
        text-align: center;
        margin-bottom: 0px;
    }
    .Subjects:hover {
        transform: scale(1.05);
        background-color: rgba(178, 189, 149,.5);
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
<div id="pg-3" style="display: block;">
    <div class="row slide-left" style="margin-top: 40px;">
        @foreach($subjects as $subject)
            <div class="col-md-4 col-sm-6">
                <div class="Subjects">
                    <a href="{{$subject->subject_id}}" class="subject" id="43" onclick="GetChaptersBySubjectID(this)">
                        <div class="row">
                            <div class="col-3">
                                <i><img src="{{url('images'.'/'.$subject->cover)}}"></i>
                            </div>
                            <div class="col-9">
                                <h5>{{$subject->subject_name}}</h5>
                                <p>{{$class->class_name}}</p>
                                <i class="fa fa-sign-out-alt" style="margin-left: 80%; font-size:30px;"></i>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>