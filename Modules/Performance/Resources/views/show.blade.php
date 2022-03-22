@extends('admin.layouts.app')
@section('title','Offer List')
@section('content')
    <div class="content">
        <!-- BEGIN: Top Bar -->
        <!-- END: Top Bar -->
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Offer Detail
            </h2>
            <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
                <a href="{{route('offer.create')}}" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                                     viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24"/>
														<circle fill="#000000" cx="9" cy="15" r="6"/>
														<path
                                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                                            fill="#000000" opacity="0.3"/>
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>Add New Offer</a>

                <a href="{{route('offer.index')}}" class="btn btn-primary font-weight-bolder">
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
        <div class="intro-y news p-5 box mt-8">
            <!-- BEGIN: Blog Layout -->
            <h2 class="intro-y font-medium text-xl sm:text-2xl">
                {{$offer->name}}
            </h2>
            <div
                class="intro-y text-gray-700 dark:text-gray-600 mt-3 text-xs sm:text-sm"> {{$offer->created_at->format('Y-m-d')}}
                <span
                    class="mx-1">•</span>
                {{$offer->created_at->diffForHumans()}}
            </div>
            <div
                class="intro-y flex text-xs sm:text-sm flex-col sm:flex-row items-center mt-5 pt-5 border-t border-gray-200 dark:border-dark-5">
                <div class="flex items-center">
                    <div class="w-12 h-12 flex-none image-fit">
                        <img class="rounded-full" src="{{asset('uploads/users/dummyUser.png')}}">
                    </div>
                </div>
            </div>
            <!-- END: Blog Layout -->
        </div>
    </div>
@endsection

