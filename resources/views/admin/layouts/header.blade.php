<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->

        <div class="dropdown btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2">
            <!--begin::Toggle-->
            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                    <div
                        class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                        id="kt_quick_user_toggle">
                                    <span
                                        class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                        <span
                            class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">
                                                @if(auth()->user()->image)
                                                    <img width="35px;" height="35px;"
                                                         src="{{Auth::user()->getMedia('images')->last()->getFullUrl()}}">
                                                @else
                                                    <img width="35px;" height="35px;"
                                                         src="https://image.shutterstock.com/image-vector/blank-avatar-photo-icon-design-600w-1682415103.jpg">
                                                @endif
                                            </span>
										</span>
                    </div>
                </div>
            </div>
            <!--end::Toggle-->
            <!--begin::Dropdown-->
            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                <!--begin:Header-->
                <div class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top"
                     style="background-image: url({{asset('assets/media/misc/bg-1.jpg')}})">
                    <h4 class="text-white font-weight-bold">Quick Actions</h4>
                    <span class="btn btn-success btn-sm font-weight-bold font-size-sm mt-2">23 tasks pending</span>
                </div>
                <!--end:Header-->
                <!--begin:Nav-->
                <div class="row row-paddingless">
                    <!--begin:Item-->
                    <div class="col-6">
                        <a href="{{route('admin.profile')}}"
                           class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Euro.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															 <g stroke="none" stroke-width="1" fill="none"
                                                                fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path
                                                                    d="M12,10.9996338 C12.8356605,10.3719448 13.8743941,10 15,10 C17.7614237,10 20,12.2385763 20,15 C20,17.7614237 17.7614237,20 15,20 C13.8743941,20 12.8356605,19.6280552 12,19.0003662 C11.1643395,19.6280552 10.1256059,20 9,20 C6.23857625,20 4,17.7614237 4,15 C4,12.2385763 6.23857625,10 9,10 C10.1256059,10 11.1643395,10.3719448 12,10.9996338 Z M13.3336047,12.504354 C13.757474,13.2388026 14,14.0910788 14,15 C14,15.9088933 13.7574889,16.761145 13.3336438,17.4955783 C13.8188886,17.8206693 14.3938466,18 15,18 C16.6568542,18 18,16.6568542 18,15 C18,13.3431458 16.6568542,12 15,12 C14.3930587,12 13.8175971,12.18044 13.3336047,12.504354 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                <circle fill="#000000" cx="12" cy="9" r="5"/>
                                                            </g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Profile</span>
                            <span class="d-block text-dark-50 font-size-lg">update/change email, password</span>
                        </a>
                    </div>
                    <!--end:Item-->
                    <!--begin:Item-->
                    <div class="col-6">
                        <a href="{{route('setting.index')}}"
                           class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
													<span class="svg-icon svg-icon-3x svg-icon-success">
														<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-attachment.svg-->
														<svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1">
															  <g stroke="none" stroke-width="1" fill="none"
                                                                 fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                <path
                                                                    d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                                    fill="#000000"/>
                                                            </g>
														</svg>
                                                        <!--end::Svg Icon-->
													</span>
                            <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Setting</span>
                            <span class="d-block text-dark-50 font-size-lg">Add change Setting</span>
                        </a>
                    </div>
                    <!--end:Item-->
                    <!--begin:Item-->
                    <div class="col-12" id="signoutButton">
                        <form action="{{route('logout')}}" method="POST" id="logoutForm"
                              class="d-block py-10 px-5 text-center bg-hover-light border-right">
                            @csrf
                            <span class="svg-icon svg-icon-3x svg-icon-success">
                                <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none"
                                       fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path
                                                d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                            <rect fill="#000000" opacity="0.3"
                                                  transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) "
                                                  x="13" y="6" width="2" height="12" rx="1"/>
                                            <path
                                                d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                                fill="#000000" fill-rule="nonzero"
                                                transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                    </g>
                                </svg>
                                <!--end::Svg Icon-->
                            </span>
                            <button type="submit">
                                <span class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">Logout</span>
                            </button>
                            <span class="d-block text-dark-50 font-size-lg">sign out</span>
                        </form>
                    </div>
                    <!--end:Item-->
                </div>
                <!--end:Nav-->
            </div>
            <!--end::Dropdown-->
        </div>

    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
