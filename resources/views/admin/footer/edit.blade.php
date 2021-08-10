
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
                    <h3 class="card-title">Edit Footer Content</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('footer.update',$footer->id)}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value ="PUT"/>
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group {{ $errors->has('eng') ? ' has-danger' : '' }}">
                                <label>In English:</label>
                                <input class="form-control" data-toggle="tooltip" title="Footer content" type="text" name="eng" id="eng" value="{{$footer->eng}}" required>
                                    @if ($errors->has('eng'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('eng') }}</div>
                                  @endif
                              </div>
                              <div class="form-group {{ $errors->has('nl') ? ' has-danger' : '' }}">
                                <label>In Dutch:</label>
                               <input class="form-control" data-toggle="tooltip" title="Footer content nl" type="text" name="nl" id="nl" value="{{$footer->nl}}" required>
                                    @if ($errors->has('nl'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('nl') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('fr') ? ' has-danger' : '' }}">
                                <label>In French:</label>
                                 <input class="form-control" type="text" data-toggle="tooltip" title="Footer content fr" name="fr" id="fr" value="{{$footer->fr}}" required>
                                    @if ($errors->has('fr'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('fr') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('link_nl') ? ' has-danger' : '' }}">
                                <label>link in NL:</label>
                                 <input class="form-control" data-toggle="tooltip" title="Footer content nl" type="text" name="link_nl" id="link_nl" value="{{$footer->link_nl}}" required>
                                    @if ($errors->has('link_nl'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('link_nl') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('link_fr') ? ' has-danger' : '' }}">
                                <label>link in FR:</label>
                                 <input class="form-control" type="text" data-toggle="tooltip" title="Footer content fr" name="link_fr" id="link_fr" value="{{$footer->link_fr}}" required>
                                    @if ($errors->has('link_fr'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('link_fr') }}</div>
                                  @endif
                              </div>


                               <div class="form-group {{ $errors->has('link_status') ? ' has-danger' : '' }}">
                                <label data-toggle="tooltip" title="Open link in a new tab">External Link:</label>
                                @if ($footer->link_status == 0)
                                  <input type="checkbox" name="link_status" value="1">
                                 @else
                                  <input type="checkbox" name="link_status" value="1" checked>
                                 @endif
                                    @if ($errors->has('link_status'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('link_status') }}</div>
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

    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script>
                        CKEDITOR.replace( '.editor' );
     </script>
    @include('admin.includes.footer')