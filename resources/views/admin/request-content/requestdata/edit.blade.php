
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

                   

@if(!$sub->isEmpty())
                    <!-- ROW-2 OPEN -->
                    <div class="card accordion-wizard">
                  <div class="card-header">
                    <h3 class="card-title"> Add Request Content</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="{{route('request-content.add')}}" enctype="multipart/form-data">
                      {{csrf_field()}}
                       <input type="hidden" value="@if(isset($subcontent[0]['title_id'])) {{$subcontent[0]['title_id']}} @endif" name="titleid">
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group {{ $errors->has('NL_title') ? ' has-danger' : '' }}">
                                <label>NL Title:</label>
                                <input type="text" name="NL_title" data-toggle="tooltip" title="Request Title nl" id="title" value="@if(isset($subcontent[0]['NL_title'])) {{$subcontent[0]['NL_title']}} @endif" class="form-control">
                                 @if ($errors->has('NL_title'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('NL_title') }}</div>
                                  @endif
                              </div>
                              <div class="form-group {{ $errors->has('FR_title') ? ' has-danger' : '' }}">
                                <label>FR Title:</label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Request Title fr" name="FR_title" id="FR_title" value="@if(isset($subcontent[0]['FR_title'])) {{$subcontent[0]['FR_title']}} @endif ">
                                 @if ($errors->has('FR_title'))
                                  <div id="first_name-error" class="form-control-feedback text-danger">{{ $errors->first('FR_title') }}</div>
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
@endif

<!-- MESSAGE MODAL -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="example-Modal3">Add Request Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('admin/request-content-add')}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="@if(isset($subcontent[0]['title_id'])) {{$subcontent[0]['title_id']}} @endif" name="titleid">
                    <div class="form-group">
                        <label for="coupon-name" class="form-control-label">NL Subtitle:</label>
                        <input class="form-control" type="text" name="NL_subtitle" id="NL_subtitle" required>
                    </div>
                    <div class="form-group">
                        <label for="coupon-details" class="form-control-label">FR Subtitle</label>
                       <input class="form-control" type="text" name="FR_subtitle" id="FR_subtitle" required>
                    </div>

                    <div class="form-group">
                        <label for="coupon-details" class="form-control-label">NL Description</label>
                      <textarea class="form-control m-input m-input--solid summernote"  id="summernotea" aria-describedby="Description" placeholder="Content" name="NL_description" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="coupon-details" class="form-control-label">FR Description</label>
                        <textarea class="form-control m-input m-input--solid summernote"  id="summernotea" aria-describedby="Description" placeholder="Content" name="FR_description" required></textarea>
                    </div>

                  
                
            </div>
            <div class="modal-footer">
               
                <button type="submit" id="create" class="btn btn-primary">Create</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!-- MESSAGE MODAL CLOSED -->

                    <!-- ROW-2 OPEN -->
                    <div class="row">


                        <div class="col-12">
                           

                            <div class="card">

                               
                                <div class="card-header ">
                                    <h3 class="card-title ">Request page content</h3>
                                      <div class="card-options">
                                        <button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target="#exampleModal3"><i class="fa fa-plus"></i> Add Request page content</button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Subtitle</th>
                                                <th scope="col">Description</th>
                                                <th scope="col"></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach($sub as $subs)
                                           
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$subs->subtitle}}</td>
                                                <td>{{$subs->content}}</td>
                                                
                                                
                                                <td>
                                                     <a class="btn btn-sm btn-primary" href="{{route('request-content.index')}}/{{$subs->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
                                                 
                                                    <a class="btn btn-sm btn-danger" href="{{url('admin/request-content-delete')}}/{{$subs->id}}" data-toggle="modal" data-target="#myModal{{$subs->id}}"><i class="fa fa-trash"></i> Delete</a>
                                                </td>
                                               
                                            </tr>

                                            <!-- The Modal -->
<div class="modal" id="myModal{{$subs->id}}">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Are you sure you want to delete ?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        
         <a href="{{url('admin/request-content-delete')}}/{{$subs->id}}" class="btn btn-success" >Yes</a>
         <a type="button" class="btn btn-danger" data-dismiss="modal">No</a>
      </div>

    </div>
  </div>
</div>

                                            @endforeach
                                          
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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