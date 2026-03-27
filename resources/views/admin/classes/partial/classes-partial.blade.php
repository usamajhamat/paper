
<script src="{{asset('public/admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatable/datatable.js')}}"></script>
<div class="table-responsive">
    <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
        <thead class="bg-light">
        <tr>

            {{--<th scope="col">ID</th>--}}
            <th width="90%">Class Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($classes as $cls)
            <tr>
                {{--<th scope="row">{{$course->course_id}}</th>--}}
                <td>{{$cls->class_name}}</td>

                <td>
                    <a class="btn btn-sm btn-info edit" href="{{route('class-edit',$cls->class_id)}}"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger remove" href="{{route('class-remove',$cls->class_id)}}"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
</div>


@push('script')
    <script>
        $('#example').DataTable({});
    </script>
@endpush