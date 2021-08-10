
<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="../theme/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div id="app" class="page">
        <div class="page-main">

    <?php echo $__env->make('admin.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <!--app-content open-->
            <div class="app-content">
                <div class="side-app">

                    <?php echo $__env->make('admin/includes/page-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                 <!-- error message -->


<?php if(\Session::has('error')): ?>
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Sorry!</strong> <?php echo \Session::get('error'); ?> 
</div>
<?php endif; ?>

<?php if(\Session::has('success')): ?>
   <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Success!</strong> <?php echo \Session::get('success'); ?> 
   </div>
<?php endif; ?>

<!-- error message -->

                   


                    <!-- ROW-2 OPEN -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h3 class="card-title ">Manage Footer</h3>
                                   
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">English</th>
                                                <th scope="col">NL</th>
                                                <th scope="col">FR</th>
                                                <th scope="col">Link in NL</th>
                                                <th scope="col">Link in FR</th>
                                                <th scope="col"></th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $i=1; ?>
                                          <?php $__currentLoopData = $footer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $footers): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           
                                            <tr>
                                                <td><?php echo e($i++); ?></td>
                                                <td><?php echo e($footers->eng); ?></td>
                                                <td><?php echo e($footers->nl); ?></td>
                                                <td><?php echo e($footers->fr); ?></td>
                                                <td><?php echo e($footers->link_nl); ?></td>
                                                <td><?php echo e($footers->link_fr); ?></td>
                                                
                                                <td>
                                                   
                                                    <a class="btn btn-sm btn-primary" href="<?php echo e(route('footer.index')); ?>/<?php echo e($footers->id); ?>/edit"><i class="fa fa-edit"></i> Edit</a>
                                                </td>
                                               
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          
                                            
                                            
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
                        Copyright © <?php echo e(date('Y')); ?> <a href="#"><?php echo e(Request::getHost()); ?></a> All rights reserved.
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
    <?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>