
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
                    <h3 class="card-title">Edit language of each content</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('language.update',$language->id)}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value ="PUT"/>
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Content in English:</label>
                                <input type="text" class="form-control" name="content_eng" id="content_eng" value="{{$language->eng}}" required="required">
                                  @if ($errors->has('content_eng'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('content_eng') }}</div>
                                  @endif
                              </div>
                              <div class="form-group {{ $errors->has('content_nl') ? ' has-danger' : '' }}">
                                <label>Content in NL:</label>
                                <input type="text" class="form-control" name="content_nl" id="content_nl" value="{{$language->nl}}" required="required">
                                 @if ($errors->has('content_nl'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('content_nl') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('content_fr') ? ' has-danger' : '' }}">
                                <label>Content in FR:</label>
                                <input type="text" class="form-control" name="content_fr" id="content_fr" value="{{$language->fr}}" required="required">

                               @if ($errors->has('content_fr'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('content_fr') }}</div>
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