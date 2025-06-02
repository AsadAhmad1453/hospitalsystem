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
                    <table class="datatables-basic table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th></th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)

                            @if($user->role == '1')
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('del-user', $user->id)}}" data-jobs="sdadas" class="text-danger course-sure"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal to add new record -->
        <div class="modal modal-slide-in fade" id="modals-slide-in">
            <div class="modal-dialog sidebar-sm">
                <form action="{{route('save-user')}}" method="POST" class="add-new-record modal-content pt-0">
                    @csrf
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title" id="exampleModalLabel">New Person</h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Person Name</label>
                            <input type="text" name="name" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="John Doe" aria-label="John Doe" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Email</label>
                            <input type="email" name="email" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="E-mail" aria-label="John Doe" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="basic-icon-default-fullname">Password</label>
                            <input type="password" name="password" class="form-control dt-full-name" id="basic-icon-default-fullname" placeholder="Password" aria-label="John Doe" />
                        </div>
                        <div class="form-group">
                            <label for="basicSelect">Role</label>
                            <select class="form-control" name="role_id" id="basicSelect">
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                                <input type="hidden" name="role" value="1">
                            </select>
                        </div>                     
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
<script src="{{ asset('admin-assets/js/scripts/cards/card-advance.js') }}"></script>
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