@if(session()->has('success'))
    <div class="alert alert-icon alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-check-circle-o mr-2" aria-hidden="true"></i> Success! {{session('success')}}
    </div>
@endif

@if(session()->has('failure'))
    <div class="alert alert-icon alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="fa fa-frown-o mr-2" aria-hidden="true"></i> Oh snap! {{session('failure')}}
    </div>
@endif
