
<?php echo $__env->make('admin.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="app sidebar-mini">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="/theme/assets/images/loader.svg" class="loader-img" alt="Loader">
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
                    <div class="card accordion-wizard">
                  <div class="card-header">
                    <h3 class="card-title">Edit Banner Data</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="<?php echo e(route('banner-content.update',$banner->id)); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                       <input type="hidden" name="_method" value ="PUT"/>
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>Page Name:</label>
                                <input type="text" data-toggle="tooltip" title="Page name" name="page" id="page" value="<?php if($banner->page_name=="request page"): ?> Confirmation page 
                                                    <?php endif; ?>
                                                    <?php if($banner->page_name=="sort page"): ?> Comparison page 
                                                    <?php endif; ?>
                                                    <?php if($banner->page_name=="sort_page banner"): ?> Comparison page banner 
                                                    <?php endif; ?>
                                                    <?php if($banner->page_name=="sort_page last"): ?> Comparison page bottom title 
                                                    <?php endif; ?>" class="form-control" readonly>
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('content_eng') ? ' has-danger' : ''); ?>">
                                <label>Heading in English:</label>
                                <input type="text" data-toggle="tooltip" title="Heading in english" class="form-control" name="content_eng" id="content_eng" value="<?php echo e($banner->banner_content_in_english); ?>" required>
                                 <?php if($errors->has('content_eng')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_eng')); ?></div>
                                  <?php endif; ?>
                              </div>

                               <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                <label>Heading in NL: <?php if($banner->page_name=='sort page'): ?><span style="color:green;">X1:Comparison type (eg: gas/electricity/gas and electricity) , X2:Month , X3:Year</span>    <?php endif; ?></label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Banner content in nl" name="content_nl" id="content_nl" value="<?php echo e($banner->banner_content_in_NL); ?>" required>

                                <?php if($errors->has('content_nl')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
                                  <?php endif; ?>

                                   
                              </div>

                               <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Heading in FR: <?php if($banner->page_name=='sort page'): ?><span style="color:green;">X1:Comparison type (eg: gas/electricity/gas and electricity) , X2:Month , X3:Year</span>    <?php endif; ?></label>
                                <input class="form-control" type="text" data-toggle="tooltip" title="Heading in fr"  aria-describedby="Description" name="content_fr" id="content_fr" value="<?php echo e($banner->banner_content_in_FR); ?>" required>
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <?php if($banner->banner_image): ?>
                               <div class="form-group <?php echo e($errors->has('banner_image') ? ' has-danger' : ''); ?>">
                                
                                 <?php if($banner->page_name=='request page'): ?>
                               
                                <label>Banner Image (1400 x 150):</label>
                                <?php else: ?>
                                <label>Banner Image (1400 x 212):</label>
                                <?php endif; ?>
                                <div class="col-3">
                                  <img src="<?php echo e(url('images/'.$banner->banner_image)); ?>" alt="<?php echo e($banner->banner_image); ?>" height="50px">
                              </div>
                              <div class="col-3">
                                  <input class="form-control" type="file" data-toggle="tooltip" title="Banner image" name="banner_image" id="banner_image" value="<?php echo e($banner->banner_image); ?>" >
                                    <?php if($errors->has('banner_image')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('banner_image')); ?></div>
                                  <?php endif; ?>
                              </div> 
                              </div>
                              <?php endif; ?>





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
                        Copyright © <?php echo e(date('Y')); ?> <a href="#"><?php echo e(Request::getHost()); ?></a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>


    <?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>