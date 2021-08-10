
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
                    <h3 class="card-title">Edit Video Content</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="<?php echo e(route('request-content.store')); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                        <input type="hidden" value="<?php echo e($videocontent->id); ?>" name="id">
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3">
                              <div class="form-group <?php echo e($errors->has('NL_title') ? ' has-danger' : ''); ?>">
                                <label>NL Title:</label>
                                <input type="text" data-toggle="tooltip" title="Title in nl" name="NL_title" id="NL_title" value="<?php echo e($videocontent->NL_title); ?>" class="form-control" required>
                                <?php if($errors->has('NL_title')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('NL_title')); ?></div>
                                  <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('FR_title') ? ' has-danger' : ''); ?>">
                                <label>FR Title:</label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Title in fr" name="FR_title" id="FR_title" value="<?php echo e($videocontent->FR_title); ?>" required>
                                <?php if($errors->has('FR_title')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('FR_title')); ?></div>
                                  <?php endif; ?>
                              </div>

                               <div class="form-group <?php echo e($errors->has('NL_description') ? ' has-danger' : ''); ?>">
                                <label>Image (728 x 394):</label><br>
                                <img src="<?php echo e(url('images/request-page/'.$videocontent->video)); ?>" alt="youtube link format"  width="200">
                                <input type="file" class="form-control" data-toggle="tooltip" title="Image" name="videolink" id="videolink" >

                                <?php if($errors->has('videolink')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('videolink')); ?></div>
                                  <?php endif; ?>

                                   <div class="col-5 offset-2">
                                  
                              </div> 
                              </div>

                              <div class="form-group <?php echo e($errors->has('FR_title') ? ' has-danger' : ''); ?>">
                                <label>Image URL: <span style="color: green;">(Eg: https://abcd.com )</span></label>
                                <input type="text" class="form-control" data-toggle="tooltip" title="Title in fr" name="image_url" id="FR_title" value="<?php echo e($videocontent->image_url); ?>" required>
                                <?php if($errors->has('image_url')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('image_url')); ?></div>
                                  <?php endif; ?>
                              </div>

                               <div class="form-group <?php echo e($errors->has('NL_description') ? ' has-danger' : ''); ?>">
                                <label>NL Description:</label>
                                <textarea type="text" data-toggle="tooltip" title="Request page Description nl" class="form-control" id="summernotes" aria-describedby="Description" placeholder="Content" name="NL_description" required><?php echo e($videocontent->NL_content); ?></textarea>
                                <?php if($errors->has('NL_description')): ?>

                                <span class="text-danger"> *<?php echo e($errors->first('NL_description')); ?></span>
                                <?php endif; ?>
                              </div>

                               <div class="form-group <?php echo e($errors->has('FR_description') ? ' has-danger' : ''); ?>">
                                <label>FR Description:</label>
                                <textarea type="text" data-toggle="tooltip" title="Request page Description fr" class="form-control" id="summernotes" aria-describedby="Description" placeholder="Content" name="FR_description" required><?php echo e($videocontent->FR_content); ?></textarea>
                               <?php if($errors->has('FR_description')): ?>

                                <span class="text-danger"> *<?php echo e($errors->first('FR_description')); ?></span>
                                <?php endif; ?>
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
                        Copyright © <?php echo e(date("Y")); ?> <a href="#"><?php echo e(Request::getHost()); ?></a> All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER END -->
    </div>


    <?php echo $__env->make('admin.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>