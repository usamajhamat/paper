{{--<link href="{{asset('admin/assets/plugins/accordion/accordion.css')}}" rel="stylesheet" />--}}
{{--<!---Accordion Js-->--}}
{{--<script src="{{asset('admin/assets/plugins/accordion/accordion.min.js')}}"></script>--}}
{{--<script src="{{asset('admin/assets/plugins/accordion/accordions.js')}}"></script>--}}

<script src="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/datatable.js')}}"></script>
@if(count($questions)==0)
    <h1>Sorry! No Record Is Found</h1>
@endif

@if(in_array($type,\App\Models\Helper::questionTypes()))
    @if(count($questions)>0 and $search=='all')
        @php $title=$questions[0] @endphp
        <div class="table-responsive">
            <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                <thead class="bg-light">
                <tr>

                    @if($medium=='English' or $medium=='all' or $medium=='Dual')
                        <th style="width: 150px;">In English</th>
                    @endif
                    @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                        <th>In Urdu</th>
                    @endif
                    <th>Priority</th>
                    <th>Topic</th>
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        @if($medium=='English' or $medium=='all' or $medium=='Dual')
                            <td>{!! $question->question_english !!}</td>
                        @endif
                        @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                            <td class="urdu">{!! $question->question_urdu !!}</td>
                        @endif
                        <td>{{$question->priority_name}}</td>
                        <td>{{$question->topic_name}}</td>
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{route('question-edit',$question->q_id)}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger remove" href="{{route('question-remove',$question->q_id)}}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @elseif(count($questions)>0 and $search=='chapter')
        @php $title=$questions[0] @endphp
        <div class="table-responsive">
            <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                <thead class="bg-light">
                <tr>
                    @if($medium=='English' or $medium=='all' or $medium=='Dual')
                        <th>In English</th>
                    @endif
                    @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                        <th class="urdu">In Urdu</th>
                    @endif
                    <th>Priority</th>
                    <th>Topic</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        @if($medium=='English' or $medium=='all' or $medium=='Dual')
                            <td>{!!$question->question_english!!}</td>
                        @endif
                        @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                            <td>{!!$question->question_urdu  !!}</td>
                        @endif
                        <td>{{$question->priority_name}}</td>
                        <td>{{$question->topic_name}}</td>
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{route('question-edit',$question->q_id)}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger remove" href="{{route('question-remove',$question->q_id)}}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endif

@endif

@if(in_array($type,\App\Models\Helper::mcqTypes()))
    @if(count($questions)>0 and $search=='all')
        @php $title=$questions[0] @endphp
        <div class="table-responsive">
            <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                <thead class="bg-light">
                <tr>

                    @if($medium=='English' or $medium=='all' or $medium=='Dual')
                        <th>In English</th>
                    @endif
                    @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                        <th>In Urdu</th>
                    @endif
                    <th width="8%">Priority</th>
                    {{--<th>Topic</th>--}}
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        @if($medium=='English' or $medium=='all' or $medium=='Dual')
                            <td>{!! $question->question_english !!}</td>
                        @endif
                        @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                            <td class="urdu">{!! $question->question_urdu !!}</td>
                        @endif
                        <td>{{$question->priority_name}}</td>
                        {{--<td>{{$question->topic_name}}</td>--}}
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{route('question-edit',$question->q_id)}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger remove" href="{{route('question-remove',$question->q_id)}}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @elseif(count($questions)>0 and $search=='chapter')
        @php $title=$questions[0] @endphp
        <div class="table-responsive">
            <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                <thead class="bg-light">
                <tr>
                    @if($medium=='English' or $medium=='all' or $medium=='Dual')
                        <th>In English</th>
                    @endif
                    @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                        <th class="urdu">In Urdu</th>
                    @endif
                    <th width="8%">Priority</th>
                    {{--<th>Topic</th>--}}
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        @if($medium=='English' or $medium=='all' or $medium=='Dual')
                            <td>{!!$question->question_english!!}</td>
                        @endif
                        @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                            <td>{!!$question->question_urdu  !!}</td>
                        @endif
                        <td>{{$question->priority_name}}</td>
                        {{--<td>{{$question->topic_name}}</td>--}}
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{route('question-edit',$question->q_id)}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger remove" href="{{route('question-remove',$question->q_id)}}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endif

@endif

@if(in_array($type,\App\Models\Helper::booleanTypes()))
    @if(count($questions)>0 and $search=='all')
        @php $title=$questions[0] @endphp
        <div class="table-responsive">
            <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                <thead class="bg-light">
                <tr>

                    @if($medium=='English' or $medium=='all' or $medium=='Dual')
                        <th>In English</th>
                    @endif
                    @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                        <th>In Urdu</th>
                    @endif
                    <th width="8%">Priority</th>
                    {{--<th>Topic</th>--}}
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        @if($medium=='English' or $medium=='all' or $medium=='Dual')
                            <td>{!! $question->question_english !!}</td>
                        @endif
                        @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                            <td class="urdu">{!! $question->question_urdu !!}</td>
                        @endif
                        <td>{{$question->priority_name}}</td>
                        {{--<td>{{$question->topic_name}}</td>--}}
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{route('question-edit',$question->q_id)}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger remove" href="{{route('question-remove',$question->q_id)}}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @elseif(count($questions)>0 and $search=='chapter')
        @php $title=$questions[0] @endphp
        <div class="table-responsive">
            <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
                <thead class="bg-light">
                <tr>
                    @if($medium=='English' or $medium=='all' or $medium=='Dual')
                        <th>In English</th>
                    @endif
                    @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                        <th class="urdu">In Urdu</th>
                    @endif
                    <th width="8%">Priority</th>
                    {{--<th>Topic</th>--}}
                    <th width="10%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $question)
                    <tr>
                        @if($medium=='English' or $medium=='all' or $medium=='Dual')
                            <td>{!!$question->question_english!!}</td>
                        @endif
                        @if($medium=='Urdu' or $medium=='all' or $medium=='Dual')
                            <td>{!!$question->question_urdu  !!}</td>
                        @endif
                        <td>{{$question->priority_name}}</td>
                        {{--<td>{{$question->topic_name}}</td>--}}
                        <td>
                            <a class="btn btn-sm btn-info edit" href="{{route('question-edit',$question->q_id)}}"><i class="fa fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger remove" href="{{route('question-remove',$question->q_id)}}"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    @endif

@endif


@push('script')
    <script>
        $('#example').DataTable({});
    </script>
@endpush

