@include('admin.includes.header')


<body class="app sidebar-mini">
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
              <h3 class="card-title"> Edit my App</h3>
            </div>
            <div class="card-body">
              <form id="form"  method="POST" action="{{route('whitelabel.update')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                      
                      
                <div class="list-group">
                  <div class="list-group-item py-4 open" data-acc-step="">
                    <div data-acc-content="" style="">
                      <div class="my-3">
                        <div class="form-group {{ $errors->has('NL_title') ? ' has-danger' : '' }}">
                          <label>Name:</label>
                          <input type="text" data-toggle="tooltip" title="App name" type="color" name="name" id="title" value="{{$app->name}}" class="form-control" required>
                          </div>
                          <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                            <label>Logo: (153 x 77)</label>
                            <br>
                              <img src="/uploads/logos/{{$app->logo}}" data-toggle="tooltip" title="App logo in nl" type="color" width="120">
                                <br>
                                  <input type="file" data-toggle="tooltip" title="App logo" class="form-control" name="logo" id="FR_title" >
                                 @if ($errors->has('logo'))
                                  
                                    <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('logo') }}</div>
                                  @endif
                              
                                  </div>
                                  <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                    <label>Logo-fr: (153 x 77)</label>
                                    <br>
                                      <img src="/uploads/logos/{{$app->logo_fr}}" data-toggle="tooltip" title="App logo in fr" width="120">
                                        <br>
                                          <input type="file" data-toggle="tooltip" title="App logo in fr" class="form-control" name="logo_fr" id="FR_title" >
                                 @if ($errors->has('logo_fr'))
                                  
                                            <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('logo_fr') }}</div>
                                  @endif
                              
                                          </div>
                                          <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                            <label>Fav icon: (32 x 32)</label>
                                            <img src="/uploads/fav-icon/{{$app->fav_icon}}">
                                              <input type="file" data-toggle="tooltip" title="App Fav icon" class="form-control" name="fav_icon" id="FR_title" >

                                @if ($errors->has('fav_icon'))
                                  
                                                <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('fav_icon') }}</div>
                                  @endif
                                 
                              
                                              </div>
                                              <div class="form-group">
                                                <label for="locale" class="form-control-label">Default Laguage</label>
                                                <select name="locale" data-toggle="tooltip" title="App Default language" id="locale" class="form-control" required>
                                    @if($app->locale=='nl')
                                    
                                                  <option value="nl">Dutch</option>
                                                  <option value="fr">French</option>
                                    @else
                                    
                                                  <option value="fr">French</option>
                                                  <option value="nl">Dutch</option>
                                
                                    @endif
                                

                                
                                                </select>
                                              </div>
                                              <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                                <label>Wizard:</label>
                                                <select class="form-control" data-toggle="tooltip" title="App Wizard disable and enable" name="wizard" id="wizard" required>
                                    @if($app->wizard=='1')
                                     
                                                  <option value="1">Activate</option>
                                                  <option value="0">Deactivate</option>
                                    @else
                                    
                                                  <option value="0">Deactivate</option>
                                                  <option value="1">Activate</option>
                                    
                                
                                    @endif
                                   
                                 
                                                </select>
                                              </div>
                                              <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                                <label>Title(nl):</label>
                                                <input type="text" data-toggle="tooltip" title="SEO Meta title nl" class="form-control" required name="title" value="{{$app->title}}"  >
                                                </div>
                                                <div class="form-group {{ $errors->has('title') ? ' has-danger' : '' }}">
                                                  <label>Title(fr):</label>
                                                  <input type="text" data-toggle="tooltip" title="SEO Meta title fr" class="form-control" required name="title_fr" value="{{$app->title_fr}}"  >
                                                  </div>
                                                  <div class="form-group {{ $errors->has('meta') ? ' has-danger' : '' }}">
                                                    <label>SEO meta description(nl):</label>
                                                    <textarea class="form-control" data-toggle="tooltip" title="SEO Meta Description nl" name="meta" id="meta" >{{$app->meta}}</textarea>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('meta') ? ' has-danger' : '' }}">
                                                    <label>SEO meta description(fr):</label>
                                                    <textarea class="form-control" data-toggle="tooltip" title="SEO Meta Description fr" name="meta_fr" id="meta" >{{$app->meta_fr}}</textarea>
                                                  </div>
                                                  <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                                    <label>Old-Password:</label>
                                                    <input type="password" data-toggle="tooltip" title="Old Password" class="form-control" name="old_password" id="FR_title" >
                                 @if ($errors->has('FR_title'))
                                  
                                                      <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('FR_title') }}</div>
                                  @endif
                              
                                                    </div>
                                                    <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                                      <label>Password:</label>
                                                      <input type="password" data-toggle="tooltip" title="New password" class="form-control" name="password" id="FR_title" >
                                 @if ($errors->has('FR_title'))
                                  
                                                        <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('FR_title') }}</div>
                                  @endif
                              
                                                      </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary float-right" data-acc-btn-next="">Save Changes</button>
                                                  </div>
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
                        Copyright © {{date('Y')}} 
                                          <a href="#">{{Request::getHost()}}</a> All rights reserved.
                    
                                        </div>
                                      </div>
                                    </div>
                                  </footer>
                                  <!-- FOOTER END -->
                                </div>


    @include('admin.includes.footer')