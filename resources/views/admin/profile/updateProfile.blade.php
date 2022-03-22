@extends('admin.profile.layout')
@section('title','Update Profile')
@section('forms')
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Update Profile</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account information</span>
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2" id="update_profile">Save Changes</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form" id="form1" method="POST" action="{{route('admin.update.profile')}}"
                  enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Name</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="text" name="name"
                                   class="form-control form-control-lg form-control-solid"
                                   value="{{auth()->user()->name}}"
                                   placeholder="New name"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Email</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="email" name="email"
                                   class="form-control form-control-lg form-control-solid mb-2"
                                   value="{{auth()->user()->email}}"
                                   placeholder="Current Email"/>
                        </div>
                    </div>
                    <div class="from-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Change Profile</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                                 style="@if(auth()->user()->image)
                                     background-image: url({{Auth::user()->getMedia('images')->last()->getFullUrl()}})">
                                @else
                                    background-image: url({{asset('assets/media/users/blank.png')}})">
                                @endif
                                <div class="image-input-wrapper"></div>

                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    data-original-title="Change avatar">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="image"/>
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                              <i class="ki ki-bold-close icon-xs text-muted"></i>
                             </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="remove" data-toggle="tooltip" title="Remove avatar">
                              <i class="ki ki-bold-close icon-xs text-muted"></i>
                             </span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!--end::Form-->
        </div>
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script>
        $(function () {
            $('#update_profile').on('click', function () {
                $('#form1').submit();
            });
        });
    </script>
@endsection
