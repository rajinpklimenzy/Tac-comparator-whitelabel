
@include('admin.includes.header')

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/theme/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div id="app" class="page">
        <div class="page-main">

    @include('admin.includes.sidebar')

            <!--app-content open-->
            <div class="app-content">
                <div class="side-app">

                    @include('admin/includes/page-header')

                 <!-- error message -->


@if (\Session::has('error'))
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Sorry!</strong> {!! \Session::get('error') !!} 
</div>
@endif

@if (\Session::has('success'))
   <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Success!</strong> {!! \Session::get('success') !!} 
   </div>
@endif

<!-- error message -->

                   



                    <!-- ROW-2 OPEN -->
                    <div class="card accordion-wizard">
                  <div class="card-header">
                    <h3 class="card-title">Edit Analytics Data</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('whitelabel.tacking_code_update')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                     
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">


        <div class="form-group {{ $errors->has('page') ? ' has-danger' : '' }}">
            <label>Google analytics:</label>
            <textarea type="text" name="google_analytics" id="page"  class="form-control" >{{$tracking->google_analytics}}</textarea>
            @if ($errors->has('page'))
            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('page') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
            <label>Facebook Pixels:</label>
            <textarea type="text" class="form-control" name="facebook_pixel" id="content_eng" >{{$tracking->facebook_pixel}}</textarea>
            @if ($errors->has('content_eng'))
            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('content_eng') }}</div>
            @endif
        </div>
        <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
            <label>Other tracking code:</label>
            <textarea type="text" class="form-control" name="other_tracking_code" id="content_eng" >{{$tracking->other_tracking_code}}</textarea>
            @if ($errors->has('content_eng'))
            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('content_eng') }}</div>
            @endif
        </div>

                             

                            </div>
                          <button type="submit" class="btn btn-primary float-right" data-acc-btn-next="">Save Changes</button></div>
                        </div>
                       
                      </div>
                    </form>
                  </div>
                </div>
                    <!-- ROW-2 CLOSED -->

                </div>
            </div>
            <!--CONTAINER CLOSED -->
        </div>

        <!-- SIDE-BAR -->
        <div class="sidebar sidebar-right sidebar-animate">
           <div class="p-4 border-bottom">
                <span class="fs-17">Notifications</span>
                <a href="#" class="sidebar-icon text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right"><i class="fe fe-x"></i></a>
            </div>
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-primary brround avatar-md">CH</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>New Websites is Created</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">30 mins ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-danger brround avatar-md">N</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare For the Next Project</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">2 hours ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-info brround avatar-md">S</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Decide the live Discussion Time</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">3 hours ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-warning brround avatar-md">K</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Team Review meeting</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">4 hours ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-success brround avatar-md">R</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 days ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-pink brround avatar-md">MS</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 days ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-purple brround avatar-md">L</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 day ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center border-bottom p-4">
                <div class="">
                    <span class="avatar bg-warning brround avatar-md">L</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">1 day ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
            <div class="list d-flex align-items-center p-4">
                <div class="">
                    <span class="avatar bg-blue brround avatar-md">U</span>
                </div>
                <div class="wrapper w-100 ml-3">
                    <p class="mb-0 d-flex">
                        <b>Prepare for Presentation</b>
                    </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-clock text-muted mr-1"></i>
                            <small class="text-muted ml-auto">2 days ago</small>
                            <p class="mb-0"></p>
                        </div>
                    </div>
                </div>
            </div><!-- LIST END -->
        </div>
        <!-- SIDE-BAR CLOSED -->

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © {{date('Y')}} <a href="#">{{Request::getHost()}}</a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>


    @include('admin.includes.footer')