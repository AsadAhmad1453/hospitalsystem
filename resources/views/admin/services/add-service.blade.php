@extends('admin.layouts.main')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/vendors/css/forms/select/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropify/0.2.2/css/dropify.min.css" integrity="sha512-2l9VmOAXoJ1i8LojRxurx8WcN6i/K3PaY5E9O+V1YQUiCEV4VpWw2X2gYdEx+kt1/3uzMdGII4XESyqSeX5l9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 20px !important; /* adjust to what you like */
        }
    </style>
@endsection
@section('content')
   <section id="multiple-column-form">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Service</h4>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="{{ route('save-service') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="question">Service Name</label>
                                        <input type="text" id="service_name" class="form-control " placeholder="Service Name" name="service_name" value="{{ old('service_name') }}" />
                                        @if ($errors->has('service_name'))
                                            <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                                Please enter a valid service name.
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label>Amount</label>
                                    <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}" />
                                    @if ($errors->has('amount'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please enter a valid amount.
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-1">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="8">{{ old('description') }}</textarea>
                                    </select>
                                    @if ($errors->has('description'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please enter a valid description.
                                        </div>
                                    @endif
                                </div>
                                
                                

                                <div class="col-md-6 mb-1">
                                    <label for="image">Service Image</label>
                                    <input 
                                        type="file" 
                                        id="image" 
                                        name="image" 
                                        class="dropify" 
                                        data-allowed-file-extensions="*"
                                        data-max-file-size="2M"
                                    />
                                    @if ($errors->has('image'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please upload a valid image.
                                        </div>
                                    @endif
                                </div>


                                <div class="col-md-12 mb-1">
                                    <label for="detail_description">Detail Page Description</label>
                                    <textarea class="form-control" id="detail_description" name="detail_description" rows="6">{{ old('detail_description') }}</textarea>
                                    @if ($errors->has('detail_description'))
                                        <div class="alert alert-warning mt-1 mb-0 py-1 px-2" style="font-size: 0.95em;">
                                            Please enter a valid detail page description.
                                        </div>
                                    @endif
                                </div>
                            
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mr-1">Submit</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
    <script src="{{ asset('admin-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/scripts/forms/form-select2.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(function () {
            if ($('#detail_description').length) {
                CKEDITOR.replace('detail_description');
            }
            if ($('.dropify').length) {
                $('.dropify').dropify();
            }
        });
    </script>

@endsection