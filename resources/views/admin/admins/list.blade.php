
@include('admin.includes.header')

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="../theme/assets/images/loader.svg" class="loader-img" alt="Loader">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h3 class="card-title ">SubAdmin Login Details</h3>
                                   
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Website</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Role</th>
                                                <!-- <th scope="col">Last login</th>
                                                <th scope="col">Last login IP</th> -->
                                                <th scope="col">Status</th>
                                                <th scope="col"></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @php $i=1; @endphp
                                          @foreach($admin as $admins)
                                           
                                            <tr>
                                                <td>{{$i++}}</td>
                                                 <td>{{$admins->website}}</td>
                                                <td>{{$admins->name}}</td>
                                                <td>{{$admins->guard_name}}</td>
                                               <!--  <td>{{$admins->last_login_at}}</td>
                                                <td>{{$admins->last_login_ip}}</td> -->
                                                <td>
                                                  @if($admins->status==1)
                                                  <a class="btn btn-sm btn-success"> Active</a>
                                                  @else
                                                  <a class="btn btn-sm btn-danger"> De-active</a>
                                                  @endif


                                                </td>
                                                
                                                <td>
                                                   
                                                    <a class="btn btn-sm btn-primary" href="{{route('admin.admin-users.index')}}/edit/{{$admins->id}}"><i class="fa fa-edit"></i> Edit</a>
                                                    <!-- <a class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#myModal{{$admins->id}}"><i class="fa fa-edit"></i> Delete</a> -->
                                                </td>
                                               
                                            </tr>


                                            <!-- The Modal -->
<div class="modal" id="myModal{{$admins->id}}">
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
        <a type="button" class="btn btn-danger" data-dismiss="modal">No</a>
         <a href="{{route('admin.admin-users.index')}}/delete/{{$admins->id}}" class="btn btn-success" >Yes</a>
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
                        Copyright © {{date('Y')}} <a href="#">{{Request::getHost()}}</a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>
<!-- TIME COUNTER JS-->
<script src="../theme/assets/plugins/counters/jquery.missofis-countdown.js"></script>
<script src="../theme/assets/plugins/counters/counter.js"></script>

<!-- COUNT-DOWN JS-->
<script src="../theme/assets/plugins/counters/count-down.js"></script>
<script src="../theme/assets/plugins/countdown/moment.min.js"></script>
<script src="../theme/assets/plugins/countdown/moment-timezone.min.js"></script>
<script src="../theme/assets/plugins/countdown/moment-timezone-with-data.min.js"></script>
<script src="../theme/assets/plugins/countdown/countdowntime.js"></script>

<!-- COUNTERS JS-->
<script src="../theme/assets/plugins/counters/counterup.min.js"></script>
<script src="../theme/assets/plugins/counters/waypoints.min.js"></script>
<script src="../theme/assets/plugins/counters/counters-1.js"></script>
<script type="text/javascript">
  $(document).ready(function(){



$('#conf_password').keyup(function(){
var pass=$('#password').val();
var pass2=$('#conf_password').val();

if(pass==pass2){

$('#succ').show();
$('#error').hide();
$('#create').prop('disabled', false);

}else{

$('#succ').hide();
$('#error').show();
$('#create').prop('disabled', true);
}

});



  });

</script>
    @include('admin.includes.footer')