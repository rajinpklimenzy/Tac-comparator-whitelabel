<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="app sidebar-mini">
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
                        <!-- MESSAGE MODAL -->
                        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="example-Modal3">New Whitelabel app</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('whitelabel.create')); ?>" method="post" enctype="multipart/form-data">
                                         <?php echo e(csrf_field()); ?>

                    
                                            <div class="form-group">
                                                <label for="coupon-name" class="form-control-label"> Name:</label>
                                                <input type="text" name="name" required class="form-control" id="coupon-name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="coupon-details" class="form-control-label">Domain name</label>
                                                    <input type="text" name="domain_name" required class="form-control" id="coupon-name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="coupon-name" class="form-control-label">Email</label>
                                                        <input type="email" name="email" required class="form-control" id="coupon-name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="coupon-name" class="form-control-label">Password</label>
                                                            <input type="password" id="password" name="password" required class="form-control" id="coupon-product">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="start-date" class="form-control-label">Confirm Password</label>
                                                                <input type="password" id="conf_password" name="conf_password" required class="form-control" id="coupon-product">
                                                                    <span id="succ" style="color: green; display: none;">
                                                                        <b>Password confirmed</b>
                                                                    </span>
                                                                    <span id="error" style="color: red; display: none;">
                                                                        <b>Password mismatch</b>
                                                                    </span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="locale" class="form-control-label">Default Laguage</label>
                                                                    <select name="locale" id="locale" class="form-control" required>
                                                                        <option value="nl">Dutch</option>
                                                                        <option value="fr">French</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" id="create" class="btn btn-primary">Create</button>
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
                                                            <h3 class="card-title ">Whitelabel app</h3>
                                                            <div class="card-options">
                                                                <button id="add__new__list" type="button" class="btn btn-md btn-primary " data-toggle="modal" data-target="#exampleModal3">
                                                                    <i class="fa fa-plus"></i> Add a Whitelabel app
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-hover card-table table-striped table-vcenter table-outline text-nowrap">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">ID</th>
                                                                        <th scope="col">Domain name</th>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">Email</th>
                                                                        <th scope="col">Logo</th>
                                                                        <th scope="col">Created date</th>
                                                                        <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                            <?php $i=1; ?>
                                            <?php $__currentLoopData = $whitelabel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $whitelabels): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           
                                            
                                                                    <tr>
                                                                        <td><?php echo e($i++); ?></td>
                                                                        <td><?php echo e($whitelabels->fqdn); ?></td>
                                                                        <td><?php echo e($whitelabels->name); ?></td>
                                                                        <td><?php echo e($whitelabels->email); ?></td>
                                                                        <td><?php if($whitelabels->logo): ?>
                                                                            <img src="/uploads/logos/<?php echo e($whitelabels->logo); ?>" width="100px"><?php endif; ?>
                                                                            </td>
                                                                            <td><?php echo e(date('d-m-Y', strtotime($whitelabels->created_at))); ?></td>
                                                                            <td>
                                                    <?php if($whitelabels->activate==1): ?>
                                                  
                                                                                <a class="btn btn-sm btn-success" href="<?php echo e(url('whitelabel/activate/'.$whitelabels->id)); ?>">
                                                                                    <i class="fa fa-edit"></i> Active
                                                                                </a>
                                                  <?php else: ?>
                                                   
                                                                                <a class="btn btn-sm btn-danger" href="<?php echo e(url('whitelabel/activate/'.$whitelabels->id)); ?>">
                                                                                    <i class="fa fa-edit"></i> Deactive
                                                                                </a>

                                                  <?php endif; ?>
                                                    
                                                                                <a class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#myModal<?php echo e($whitelabels->id); ?>">
                                                                                    <i class="fa fa-trash"></i> Delete
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- The Modal -->
                                                                        <div class="modal" id="myModal<?php echo e($whitelabels->id); ?>">
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
                                                                                        <a href="<?php echo e(url('whitelabel/delete/'.$whitelabels->id.'/'.$whitelabels->email)); ?>" class="btn btn-success" >Yes</a>
                                                                                        <a type="button" class="btn btn-danger" data-dismiss="modal">No</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

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
                                            <a href="#" class="sidebar-icon text-right float-right" data-toggle="sidebar-right" data-target=".sidebar-right">
                                                <i class="fe fe-x"></i>
                                            </a>
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
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
                                        </div>
                                        <!-- LIST END -->
                                    </div>
                                    <!-- SIDE-BAR CLOSED -->
                                    <!-- FOOTER -->
                                    <footer class="footer">
                                        <div class="container">
                                            <div class="row align-items-center flex-row-reverse">
                                                <div class="col-md-12 col-sm-12 text-center">
                        Copyright © <?php echo e(date("Y")); ?> 
                                                    <a href="#"><?php echo e(Request::getHost()); ?></a> All rights reserved.
                    
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