
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
                    <h3 class="card-title">Header Section</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('whitelabel.header_content_update')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group {{ $errors->has('page') ? ' has-danger' : '' }}">
                                <label>Faq text (nl):</label>
                                <input type="text" name="faq_text" data-toggle="tooltip" title="Faq text nl" id="page" value="{{$data->faq_text}}" class="form-control" required>
                               
                              </div>
                              <div class="form-group {{ $errors->has('page') ? ' has-danger' : '' }}">
                                <label>Faq text (fr):</label>
                                <input type="text" data-toggle="tooltip" title="Faq text fr" name="faq_text_fr" id="page" value="{{$data->faq_text_fr}}" class="form-control" required>
                               
                              </div>
                              <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Faq link (nl):</label>
                                <input type="text" data-toggle="tooltip" title="Faq link nl" class="form-control" name="faq_link" id="content_eng" value="{{$data->faq_link}}" required>
                                 
                              </div>

                              <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Faq link (fr):</label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Title Faq link fr" name="faq_link_fr" id="content_eng" value="{{$data->faq_link_fr}}" required>
                                 
                              </div>

                               <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Faq icon : Get more icons from <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">here</a></label>
                                <input type="text" data-toggle="tooltip" title="Faq icon" class="form-control" name="faq_icon" id="content_eng" value="{{$data->faq_icon}}" required>
                                 
                              </div>

                                <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Email text (nl) :</label>
                                <input type="text" data-toggle="tooltip" title="Email text nl" class="form-control" name="email_text" id="content_eng" value="{{$data->email_text}}" required>
                                 
                              </div>

                               <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Email text (fr) :</label>
                                <input type="text" data-toggle="tooltip" title="Email text fr" class="form-control" name="email_text_fr" id="content_eng" value="{{$data->email_text_fr}}" required>
                                 
                              </div>
                              <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Email link (nl) :</label>
                                <input type="text" data-toggle="tooltip" title="Email link nl" class="form-control" name="email_link" id="content_eng" value="{{$data->email_link}}" required>
                                 
                              </div>

                              <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Email link (fr) :</label>
                                <input type="text" data-toggle="tooltip" title="Email link fr" class="form-control" name="email_link_fr" id="content_eng" value="{{$data->email_link_fr}}" required>
                                 
                              </div>

                              <div class="form-group {{ $errors->has('content_eng') ? ' has-danger' : '' }}">
                                <label>Email icon: Get more icons from <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">here</a></label>
                                <input type="text" data-toggle="tooltip" title="Email icon" class="form-control" name="email_icon" id="content_eng" value="{{$data->email_icon}}" required>
                                 
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