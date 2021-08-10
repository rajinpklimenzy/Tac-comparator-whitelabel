
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
                    <h3 class="card-title">Edit Video Content</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('request-content.store')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                        <input type="hidden" value="{{$videocontent->id}}" name="id">
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group {{ $errors->has('NL_title') ? ' has-danger' : '' }}">
                                <label>NL Title:</label>
                                <input type="text" data-toggle="tooltip" title="Title in nl" name="NL_title" id="NL_title" value="{{$videocontent->NL_title}}" class="form-control" required>
                                @if ($errors->has('NL_title'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('NL_title') }}</div>
                                  @endif
                              </div>
                              <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                <label>FR Title:</label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Title in fr" name="FR_title" id="FR_title" value="{{$videocontent->FR_title}}" required>
                                @if ($errors->has('FR_title'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('FR_title') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('NL_description') ? ' has-danger' : '' }}">
                                <label>Image (728 x 394):</label><br>
                                <img src="{{url('images/request-page/'.$videocontent->video)}}" alt="youtube link format"  width="200">
                                <input type="file" class="form-control" data-toggle="tooltip" title="Image" name="videolink" id="videolink" >

                                @if ($errors->has('videolink'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('videolink') }}</div>
                                  @endif

                                   <div class="col-5 offset-2">
                                  
                              </div> 
                              </div>

                              <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                <label>Image URL: <span style="color: green;">(Eg: https://abcd.com )</span></label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Title in fr" name="image_url" id="FR_title" value="{{$videocontent->image_url}}" required>
                                @if ($errors->has('image_url'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('image_url') }}</div>
                                  @endif
                              </div>

                               <div class="form-group {{ $errors->has('NL_description') ? ' has-danger' : '' }}">
                                <label>NL Description:</label>
                                <textarea type="text" data-toggle="tooltip" title="Request page Description nl" class="form-control" id="summernotes" aria-describedby="Description" placeholder="Content" name="NL_description" required>{{$videocontent->NL_content}}</textarea>
                                @if ($errors->has('NL_description'))

                                <span class="text-danger"> *{{ $errors->first('NL_description') }}</span>
                                @endif
                              </div>

                               <div class="form-group {{ $errors->has('FR_description') ? ' has-danger' : '' }}">
                                <label>FR Description:</label>
                                <textarea type="text" data-toggle="tooltip" title="Request page Description fr" class="form-control" id="summernotes" aria-describedby="Description" placeholder="Content" name="FR_description" required>{{$videocontent->FR_content}}</textarea>
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