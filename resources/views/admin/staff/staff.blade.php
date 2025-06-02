@extends('admin.layouts.main')
@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset("admin-assets/vendors/css/tables/datatable/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/vendors/css/tables/datatable/rowGroup.bootstrap4.min.css')}}">
@endsection
@section('content')
<section id="basic-datatable">
    <div class="row">
        <div class="col-12">
            <div class="card">
            <form action="{{ route('roles.bulkUpdatePermissions') }}" method="POST">
                @csrf
                <table  class="datatables-basic table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th></th>
                            @foreach($permissions as $permission)
                                <th>{{ ucfirst($permission->name) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{ ucfirst($role->name) }}</td>
        
                            @foreach($permissions as $permission)
                                <td>
                                    <input type="checkbox"
                                           name="permissions[{{ $role->id }}][]"
                                           value="{{ $permission->name }}"
                                           {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                                </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="mx-2 mt-4 mb-2 btn btn-primary">Update Permissions</button>
            </form>
            </div>
        </div>
    </div>
    <!-- Modal to add new record -->
    <div class="modal modal-slide-in fade" id="modals-slide-in">
        <div class="modal-dialog sidebar-sm">
            <form action="{{route('save-staff')}}" method="POST" class="add-new-record modal-content pt-0">
                @csrf
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <div class="form-group">
                        <label class="form-label" for="basic-icon-default-fullname">Role Name</label>
                        <input type="text" name="name" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                    </div>
                    {{-- <div class="form-group">
                        <label for="basicSelect">Designation</label>
                        <select class="form-control" name="designation" id="basicSelect">
                            <option value="0">Doctor</option>
                            <option value="1">Nurse</option>
                            <option value="2">Patient</option>
                            <option value="3">Receptionist</option>
                        </select>
                    </div> --}}
                    
                    <button type="submit" class="btn btn-primary data-submit mr-1">Submit</button>
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
@section('custom-js')
<script src="{{asset('admin-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/tables/table-datatables-basic.js')}}"></script>
<script src="{{asset('admin-assets/js/scripts/extensions/ext-component-sweet-alerts.js')}}"></script>
<script src="{{asset('admin-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script>
    
    $(document).on('click','.course-sure', function (event) {
    event.preventDefault();
    var approvalLink = $(this).attr('href');
    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You want to remove this Testimonial!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, remove it!',
        confirmButtonClass: 'btn btn-primary',
        cancelButtonClass: 'btn btn-danger ml-1',
        buttonsStyling: false,
    }).then(function (result) {
        if (result.value) {
            window.location.href = approvalLink;
        }
    });
});
   
</script>
@endsection