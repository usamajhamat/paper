
<script src="{{asset('public/admin/assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatable/datatable.js')}}"></script>
<div class="table-responsive">
    <table id="example" class="table table-hover card-table  table-vcenter table-outline text-nowrap w-100">
        <thead class="bg-light">
        <tr>
            <th>Subject Name</th>
            <th>Class</th>
            <th>Shift</th>
            <th>Type</th>
            <th>Year</th>
            <th>Board</th>
            <th>Options</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($papers as $paper)
            <tr>
                <td>{{$paper->subject_name}}</td>
                <td>{{$paper->class_name}}</td>
                <td>{{$paper->shift_name}}</td>
                <td>{{$paper->type_name}}</td>
                <td>{{$paper->paper_year}}</td>
                <td>{{$paper->board_name}}</td>
                <td>
                    <a class="btn btn-sm btn-dark print1" href="{{url('images').'/'.$paper->paper}}" title="print"><i class="fa fa-print"></i></a>
                    <a class="btn btn-sm btn-info" href="{{route('past-paper-download',$paper->paper)}}" title="download"><i class="fa fa-download"></i></a>
                </td>
                <td>
                    <a class="btn btn-sm btn-info detail" href="{{route('past-paper-get',$paper->paper_id)}}"><i class="fa fa-eye"></i> view paper</a>
                    <a class="btn btn-sm btn-primary" href="{{route('past-edit',$paper->paper_id)}}"><i class="fa fa-edit"></i> Edit</a>
                    <a class="btn btn-sm btn-danger remove" href="{{route('past-remove',$paper->paper_id)}}"><i class="fa fa-trash"></i> Delete</a>
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