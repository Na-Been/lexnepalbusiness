@extends('admin.profile.layout')
@section('title','Change Password')
@section('forms')
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header py-3">
                <div class="card-title align-items-start flex-column">
                    <h3 class="card-label font-weight-bolder text-dark">Change Password</h3>
                    <span class="text-muted font-weight-bold font-size-sm mt-1">Change your account password</span>
                </div>
                <div class="card-toolbar">
                    <button type="submit" class="btn btn-success mr-2" id="change_password">Save Changes</button>
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form class="form" id="form1" method="POST" action="{{route('admin.update.password')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Current
                            Password</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="current_password"
                                   class="form-control form-control-lg form-control-solid mb-2"
                                   placeholder="Current password"/>
                        </div>
                        @error('current_password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">New Password</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="new_password"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="New password"/>
                        </div>
                        @error('new_password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label text-alert">Verify
                            Password</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" name="confirm_password"
                                   class="form-control form-control-lg form-control-solid"
                                   placeholder="Verify password"/>
                        </div>
                        @error('confirm_password')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
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
            $('#change_password').on('click', function () {
                $('#form1').submit();
            });
        });
    </script>
@endsection
