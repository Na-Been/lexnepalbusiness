@extends('admin.layouts.app')
@section('title','Update Team')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Update Team
            </h3>
            <div class="card-toolbar">
                <a href="{{route('team.index')}}" class="btn btn-primary font-weight-bolder">
										<span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Navigation\Left 3.svg--><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                        <path
                                            d="M4.7071045,12.7071045 C4.3165802,13.0976288 3.68341522,13.0976288 3.29289093,12.7071045 C2.90236664,12.3165802 2.90236664,11.6834152 3.29289093,11.2928909 L9.29289093,5.29289093 C9.67146987,4.914312 10.2810563,4.90106637 10.6757223,5.26284357 L16.6757223,10.7628436 C17.0828413,11.136036 17.1103443,11.7686034 16.7371519,12.1757223 C16.3639594,12.5828413 15.7313921,12.6103443 15.3242731,12.2371519 L10.0300735,7.38413553 L4.7071045,12.7071045 Z"
                                            fill="#000000" fill-rule="nonzero"
                                            transform="translate(10.000001, 8.999997) scale(-1, -1) rotate(90.000000) translate(-10.000001, -8.999997) "/>
                                        <path
                                            d="M20,8 C20.5522847,8 21,8.44771525 21,9 C21,9.55228475 20.5522847,10 20,10 L13.5,10 C12.9477153,10 12.5,10.4477153 12.5,11 L12.5,21.0415946 C12.5,21.5938793 12.0522847,22.0415946 11.5,22.0415946 C10.9477153,22.0415946 10.5,21.5938793 10.5,21.0415946 L10.5,11 C10.5,9.34314575 11.8431458,8 13.5,8 L20,8 Z"
                                            fill="#000000" fill-rule="nonzero" opacity="0.3"
                                            transform="translate(15.750000, 15.020797) scale(-1, 1) translate(-15.750000, -15.020797) "/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                    <!--end::Svg Icon-->
                    </span>Go Back</a>
            </div>
        </div>
        <!--begin::Form-->
        <form class="form" method="POST" action="{{route('team.update',$team->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label><span class="text-danger">*</span>
                    <input type="text" name="name" value="{{$team->name}}" class="form-control form-control-solid"
                           placeholder="Example input"/>
                </div>
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Position</label><span class="text-danger">*</span>
                    <input type="text" name="position"  value="{{$team->position}}" class="form-control form-control-solid" placeholder="Example input"/>
                </div>
                @error('position')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="from-group">
                    <label>Image</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                             style=" @if($team->image)
                                 background-image: url({{$team->getMedia('images')->last()->getFullUrl()}})">
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
                @error('image')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group mt-5">
                    <label for="kt-ckeditor-1">Description</label><span class="text-danger">*</span>
                    <div class="card-body">
                        <textarea name="description" id="kt-ckeditor-1">{!! $team->description !!}</textarea>
                    </div>
                </div>
                @error('description')
                <div class="text-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
