@extends('admin.layouts.main')
@section('content')
<section id="page-account-settings">
    <div class="row">


        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- header media -->
                            <form class="validate-form mt-2" action="{{route('update-profile')}}" enctype="multipart/form-data" method="POST">
                                @csrf
                            <div class="media">
                                <a href="javascript:void(0);" class="mr-25">
                                    <img 
                                        src="{{ $user->profile_pic ? asset('storage/' . $user->profile_pic) : asset('admin-assets/images/avatars/default.png') }}" 
                                        id="account-upload-img" 
                                        class="rounded mr-50" 
                                        alt="profile image" 
                                        height="80" 
                                        width="80" 
                                    />
                                </a>
                                <!-- upload and reset button -->
                                <div class="media-body mt-75 ml-1">
                                    <h4 class="mb-2">Profile Picture</h4>
                                    <label for="account-upload" class="btn btn-sm btn-primary mb-75 mr-75">Upload</label>
                                    <input type="file" id="account-upload" hidden accept="image/*" name="profile_pic" />
                                    <button type="button" id="reset-profile-pic" class="btn btn-sm btn-outline-secondary mb-75">Reset</button>
                                </div>
                                <!--/ upload and reset button -->
                            </div>
                           
                            <!--/ header media -->

                            <!-- form -->
                            

                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-name">Name</label>
                                            <input type="text" class="form-control" id="account-name" name="name" placeholder="Name" value="{{$user->name}}" value="John Doe" />
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-company">Update Password</label>
                                            <input type="text" class="form-control" id="account-company" name="password" placeholder="New Password"   />
                                            <span class="text-warning ">Leave it empty if you dont want to change password</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>
                                        <button type="reset" class="btn btn-outline-secondary mt-2">Cancel</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ right content section -->
    </div>
</section>
@endsection
@section('custom-js')
    <script src="{{asset('admin-assets/js/scripts/pages/page-account-settings.js')}}"></script> 
    <script>
        $(document).ready(function () {
            var $input = $('#account-upload');
            var $img = $('#account-upload-img');
            var $resetBtn = $('#reset-profile-pic');
            var originalSrc = $img.attr('src');

            $input.on('change', function () {
                if (this.files && this.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $img.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $resetBtn.on('click', function () {
                $img.attr('src', originalSrc);
                $input.val('');
            });
        });
    </script>
@endsection