
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
                    <h3 class="card-title">Edit Subtitle and Content</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('request-content.update',$subtitle->id)}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      <input type="hidden" name="_method" value ="PUT"/>
                       
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">

                              <div class="form-group {{ $errors->has('NL_subtitle') ? ' has-danger' : '' }}">
                                <label>NL Subtitle:</label>
                                <input type="text" name="NL_subtitle" data-toggle="tooltip" title="Request page Sub Title nl" id="NL_subtitle" value="{{$subtitle->NL_subtitle}}" class="form-control" required>
                                @if ($errors->has('NL_subtitle'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('NL_subtitle') }}</div>
                                  @endif
                              </div>

                              <div class="form-group {{ $errors->has('FR_subtitle') ? ' has-danger' : '' }}">
                                <label>FR Subtitle:</label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Request page Sub Title fr" name="FR_subtitle" id="FR_subtitle" value="{{$subtitle->FR_subtitle}}" required>
                                 @if ($errors->has('FR_subtitle'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('FR_subtitle') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('NL_description') ? ' has-danger' : '' }}">
                                <label>NL Description:</label>
                                <textarea type="text" data-toggle="tooltip" title="Request page  Description nl" class="form-control" id="summernotea" aria-describedby="Description" placeholder="Content" name="NL_description" required>{{$subtitle->NL_content}}</textarea>

                                @if ($errors->has('NL_description'))

                                <span class="text-danger"> *{{ $errors->first('NL_description') }}</span>
                                @endif

                                   
                              </div>

                               <div class="form-group {{ $errors->has('FR_description') ? ' has-danger' : '' }}">
                                <label>FR Description:</label>
                                <textarea type="text" data-toggle="tooltip" title="Request page  Description fr" class="form-control" id="summernotea" aria-describedby="Description" placeholder="Content" name="FR_description" required>{{$subtitle->FR_content}}</textarea>
                                @if ($errors->has('FR_description'))

                                <span class="text-danger"> *{{ $errors->first('FR_description') }}</span>
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
                        Copyright © {{date("Y")}} <a href="#">{{Request::getHost()}}</a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>


    @include('admin.includes.footer')