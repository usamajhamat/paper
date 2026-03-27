
<script src="{{asset('admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatable/datatable.js')}}"></script>
<div class="table-responsive">
    <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
        <thead class="bg-light">
        <tr>

            {{--<th scope="col">ID</th>--}}
            <th>#</th>
            <th width="90%">Chapter Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php $count=1 @endphp
        @foreach($chapters as $chapter)
            <tr>
                {{--<th scope="row">{{$course->course_id}}</th>--}}
                <td>{{$count}}</td>
                <td>{{$chapter->chapter_name}}</td>

                <td>
                    <a class="btn btn-sm btn-info edit" href="{{route('chapter-edit',$chapter->chapter_id)}}"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger remove" href="{{route('chapter-remove',$chapter->chapter_id)}}"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
          @php $count++ @endphp
        @endforeach

        </tbody>
    </table>
</div>


@push('script')
    <script>
        $('#example').DataTable({});
    </script>
@endpush