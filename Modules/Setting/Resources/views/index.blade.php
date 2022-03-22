@extends('admin.layouts.app')
@section('title','Update Setting')
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Update Setting
            </h3>
        </div>
        <!--begin::Form-->
        <form class="form" action="{{route('setting.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label>Title</label><span class="text-danger">*</span>
                    <input type="text" name="title" value="{{getSetting('title')}}"
                           class="form-control form-control-solid"
                           placeholder="input title"/>
                </div>
                @error('title')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Site Title</label><span class="text-danger">*</span>
                    <input type="text" name="site_title" value="{{getSetting('site_title')}}"
                           class="form-control form-control-solid"
                           placeholder="input site title"/>
                </div>
                @error('site_title')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Short Name</label><span class="text-danger">*</span>
                    <input type="text" name="short_name" value="{{getSetting('short_name')}}"
                           class="form-control form-control-solid"
                           placeholder="input short name"/>
                </div>
                @error('short_name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Phone Number</label><span class="text-danger">*</span>
                    <input type="text" name="phone_number" value="{{getSetting('phone_number')}}"
                           class="form-control form-control-solid"
                           placeholder= "input phone number"/>
                </div>
                @error('phone_number')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Mobile Number</label><span class="text-danger">*</span>
                    <input type="text" name="mobile_number" value="{{getSetting('mobile_number')}}"
                           class="form-control form-control-solid"
                           placeholder="input mobile number"/>
                </div>
                @error('mobile_number')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Address</label><span class="text-danger">*</span>
                    <input type="text" name="address" value="{{getSetting('address')}}"
                           class="form-control form-control-solid"
                           placeholder=" input address"/>
                </div>
                @error('address')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Email</label><span class="text-danger">*</span>
                    <input type="email" name="email" value="{{getSetting('email')}}"
                           class="form-control form-control-solid"
                           placeholder=" input email"/>
                </div>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Website</label>
                    <input type="url" name="website" value="{{getSetting('website')}}"
                           class="form-control form-control-solid"
                           placeholder="Example input"/>
                </div>
                @error('website')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Facebook Link</label>
                    <input type="url" name="facebook_link" value="{{getSetting('facebook_link')}}"
                           class="form-control form-control-solid"
                           placeholder="input facebook link"/>
                </div>
                @error('facebook_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Youtube Link</label>
                    <input type="url" name="youtube_link" value="{{getSetting('youtube_link')}}"
                           class="form-control form-control-solid"
                           placeholder="input youtube link "/>
                </div>
                @error('youtube_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Instagram Link</label>
                    <input type="url" name="instagram_link" value="{{getSetting('instagram_link')}}"
                           class="form-control form-control-solid"
                           placeholder="input instagram link"/>
                </div>
                @error('instagram_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Skype Link</label>
                    <input type="url" name="skype_link" value="{{getSetting('skype_link')}}"
                           class="form-control form-control-solid"
                           placeholder="input skype link"/>
                </div>
                @error('skype_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="form-group">
                    <label>Twitter Link</label>
                    <input type="url" name="twitter_link" value="{{getSetting('twitter_link')}}"
                           class="form-control form-control-solid"
                           placeholder="input twitter link"/>
                </div>
                @error('twitter_link')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="from-group">
                    <label>Logo</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="image-input image-input-empty image-input-outline" id="kt_image_5"
                             style="@if(getSetting('logo'))
                                 background-image: url({{asset(url('/').Storage::url(getSetting('logo')))}})">
                            @else
                                background-image: url({{asset('assets/media/users/blank.png')}})">
                            @endif
                            <div class="image-input-wrapper"></div>

                            <label
                                class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title=""
                                data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="logo"/>
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
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection
