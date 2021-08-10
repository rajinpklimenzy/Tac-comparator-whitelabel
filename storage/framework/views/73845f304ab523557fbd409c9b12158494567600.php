
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
                    <h3 class="card-title">Edit Colors</h3>
                  </div>
                  <div class="card-body">
                    <form id="form"  method="POST" action="<?php echo e(route('site-color.update')); ?>" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                      
                      <div class="list-group">
                       
                        <div class="list-group-item py-4 open" data-acc-step="">
                          
                          <div data-acc-content="" style="">
                            <div class="my-3 color_section">
                              <h3>Landing Page Section</h3>

                              <h4>Landing page background Type:</h4>
                                 <div class="form-group <?php echo e($errors->has('content_eng') ? ' has-danger' : ''); ?>">
                                  
                                  <div class="background_type">
                                     <div class="type_heading">
                                          <label><input type="radio" name="landing_page_background_color_activate" data-check="a" value="1" <?php if($site_color->landing_page_background_color_activate=='1'): ?> checked <?php endif; ?> >Background Color</label>
                                          <label><input type="radio" name="landing_page_background_color_activate" data-check="b" value="0" <?php if($site_color->landing_page_background_color_activate=='0'): ?> checked <?php endif; ?> >Backkground default Image</label>
                                     </div>
                                      
                                  </div>
                                  <div class="background_type_content">
                                    <div class="bg_color_lp a bg_type_sec" <?php if($site_color->landing_page_background_color_activate=='1'): ?> style="display:block" <?php endif; ?>>
                                        <input data-toggle="tooltip" title="Landing page backgound colour" type="color" class="form-control" name="landing_page_background_color" id="content_eng" value="<?php echo e($site_color->landing_page_background_color); ?>">
                                      </div>
                                      <div class="bg_image_lp b bg_type_sec" data-toggle="tooltip" title="Change image" <?php if($site_color->landing_page_background_color_activate=='0'): ?> style="display:block" <?php endif; ?>><a href="/whitelabel/landing-page">Click here to change Background image</a></div>
                                  </div>


                                   <?php if($errors->has('content_eng')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_eng')); ?></div>
                                    <?php endif; ?>
                                  



                                </div>

                                   <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                  <label>Banner text color:</label>
                                  <input type="color" data-toggle="tooltip" title="banner text colour" class="form-control" name="landing_banner_text_color" id="content_nl" value="<?php echo e($site_color->landing_banner_text_color); ?>">

                                  <?php if($errors->has('landing_banner_text_color')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
                                    <?php endif; ?>
                                </div>

                                 <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                  <label>Form text color:</label>
                                  <input type="color" data-toggle="tooltip" title="Request page banner text colour" class="form-control" name="form_text_color" id="content_nl" value="<?php echo e($site_color->form_text_color); ?>">

                                  <?php if($errors->has('form_text_color')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('form_text_color')); ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                  <label>Button color:</label>
                                  <input type="color" data-toggle="tooltip" title="Request page banner text colour" class="form-control" name="langing_button_color" id="content_nl" value="<?php echo e($site_color->langing_button_color); ?>">

                                  <?php if($errors->has('langing_button_color')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('langing_button_color')); ?></div>
                                    <?php endif; ?>
                                </div>
                            
                              <h3>Banner Section</h3>
                              <div class="form_2_column">
                                
                                
                                <h4>Banner background Type:</h4>
	                              <div class="form-group <?php echo e($errors->has('content_eng') ? ' has-danger' : ''); ?>">
	                                
                                  <div class="background_type">
                                     <div class="type_heading">
                                          <label><input type="radio" data-check="c" name="banner_background_color_activate" value="1" <?php if($site_color->banner_background_color_activate=='1'): ?> checked <?php endif; ?>>Background Color</label>
                                          <label><input type="radio" data-check="d" name="banner_background_color_activate" value="0" <?php if($site_color->banner_background_color_activate=='0'): ?> checked <?php endif; ?>>Backkground Image</label>
                                     </div>
                                      
                                  </div>
                                  <div class="background_type_content">
                                    <div class="bg_color_lp c bg_type_sec" <?php if($site_color->banner_background_color_activate=='1'): ?> style="display:block" <?php endif; ?>>
                                        <input type="color" data-toggle="tooltip" title="Comparison page banner colour" class="form-control" name="banner_background_color" id="content_eng" value="<?php echo e($site_color->banner_background_color); ?>">
                                      </div>
                                      <div class="bg_image_lp d bg_type_sec" <?php if($site_color->banner_background_color_activate=='0'): ?> style="display:block" <?php endif; ?>><a href="/admin/banner-content">Click here to change Background image</a></div>
                                  </div>


	                                
                                   
	                                 <?php if($errors->has('content_eng')): ?>
	                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_eng')); ?></div>
	                                  <?php endif; ?>
	                              </div>

	                               <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
	                                <label>Banner text color:</label>
	                                <input type="color" data-toggle="tooltip" title="Comparison page banner text colour" class="form-control" name="banner_text_color" id="content_nl" value="<?php echo e($site_color->banner_text_color); ?>">

	                                <?php if($errors->has('content_nl')): ?>
	                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
	                                  <?php endif; ?>
	                              </div>
                                <h3>Request Page Section</h3>
                                <h4>Request page Banner background type:</h4>
                                 <div class="form-group <?php echo e($errors->has('content_eng') ? ' has-danger' : ''); ?>">
                                  
                                  <div class="background_type">
                                     <div class="type_heading">
                                          <label><input type="radio" data-check="e" name="request_banner_background_color_activate" value="1" <?php if($site_color->request_banner_background_color_activate=='1'): ?> checked <?php endif; ?>>Background Color</label>
                                          <label><input type="radio" data-check="f" name="request_banner_background_color_activate" value="0" <?php if($site_color->request_banner_background_color_activate=='0'): ?> checked <?php endif; ?>>Backkground Image</label>
                                     </div>
                                      
                                  </div>
                                  <div class="background_type_content">
                                    <div class="bg_color_lp e bg_type_sec" <?php if($site_color->request_banner_background_color_activate=='1'): ?> style="display:block" <?php endif; ?>>
                                        <input type="color" data-toggle="tooltip" title="Request page banner background colour" class="form-control" name="request_banner_background_color" id="content_eng" value="<?php echo e($site_color->request_banner_background_color); ?>">
                                      </div>
                                      <div class="bg_image_lp f bg_type_sec"  <?php if($site_color->request_banner_background_color_activate=='0'): ?> style="display:block" <?php endif; ?>><a href="/admin/banner-content">Click here to change Background image</a></div>
                                  </div>

                                  
                                   <!-- <input type="Checkbox" class="form-control" value="1" name="request_banner_background_color_activate" id="content_eng" <?php if($site_color->request_banner_background_color_activate=='1'): ?> checked <?php endif; ?> > -->
                                   <?php if($errors->has('content_eng')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_eng')); ?></div>
                                    <?php endif; ?>
                                </div>

                                 <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                  <label>Request page Banner text color:</label>
                                  <input type="color" data-toggle="tooltip" title="Request page banner text colour" class="form-control" name="request_banner_text_color" id="content_nl" value="<?php echo e($site_color->request_banner_text_color); ?>">

                                  <?php if($errors->has('content_nl')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
                                    <?php endif; ?>
                                </div>
                              </div>

                              <h3>Change Your Data Section</h3>
                              <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                <label>Change Your Data Backgorund Color:</label>
                                <input type="color" data-toggle="tooltip" title="Change Your data backgound colour" class="form-control" name="change_your_data_backgorund_color" id="content_nl" value="<?php echo e($site_color->change_your_data_backgorund_color); ?>">

                                <?php if($errors->has('content_nl')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
                                <?php endif; ?>

                              </div>

                              <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                <label>Change Your Data Text Color:</label>
                                <input type="color" data-toggle="tooltip" title="Change your data text colour" class="form-control" name="change_your_data_text_color" id="content_nl" value="<?php echo e($site_color->change_your_data_text_color); ?>">

                                <?php if($errors->has('content_nl')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
                                <?php endif; ?>

                              </div>

                              <div class="form-group <?php echo e($errors->has('content_nl') ? ' has-danger' : ''); ?>">
                                <label>Change Your Data Button Color:</label>
                                <input type="color" data-toggle="tooltip" title="Change your data button colour" class="form-control" name="change_your_data_button_color" id="content_nl" value="<?php echo e($site_color->change_your_data_button_color); ?>">

                                <?php if($errors->has('content_nl')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_nl')); ?></div>
                                <?php endif; ?>

                              </div>





                              <h3>Navigation Section</h3>
                              <div class="form_2_column">
                               <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Navigation menu icon color:</label>
                                <input class="form-control" data-toggle="tooltip" title="Header Navigation menu icon colour" type="color"  aria-describedby="Description" name="navigation_menu_button_color" id="content_fr" value="<?php echo e($site_color->navigation_menu_button_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Navigation text color:</label>
                                <input class="form-control" data-toggle="tooltip" title="Header Navigation menu text colour" type="color"  aria-describedby="Description" name="navigation_text_color" id="content_fr" value="<?php echo e($site_color->navigation_text_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Navigation Text active color:</label>
                                  <input class="form-control" data-toggle="tooltip" title="Header Navigation menu active colour" type="color"  aria-describedby="Description" name="navigation_text_inactive_color" id="content_fr" value="<?php echo e($site_color->navigation_text_inactive_color); ?>">
                                    <?php if($errors->has('content_fr')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                    <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Navigation Bar Background color:</label>
                                  <input class="form-control" data-toggle="tooltip" title="Header navigation bar background colour" type="color"  aria-describedby="Description" name="navigation_bar_color" id="content_fr" value="<?php echo e($site_color->navigation_bar_color); ?>">
                                    <?php if($errors->has('content_fr')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                    <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Navigation Inactive Icon Color</label>
                                  <input class="form-control" data-toggle="tooltip" title="Header Navigation menu active colour" type="color"  aria-describedby="Description" name="navigation_text_inactive_color_step3_inactive" id="content_fr" value="<?php echo e($site_color->navigation_text_inactive_color_step3_inactive); ?>">
                                    <?php if($errors->has('content_fr')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                    <?php endif; ?>
                              </div>

                              <h3>Header Menu Section</h3>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Menu text color :</label>
                                <input class="form-control" data-toggle="tooltip" title="Header Navigation menu text colour" type="color"  aria-describedby="Description" name="navigation_text_color_step3" id="content_fr" value="<?php echo e($site_color->navigation_text_color_step3); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Menu icon color:</label>
                                  <input class="form-control" data-toggle="tooltip" title="Header Navigation menu active colour" type="color"  aria-describedby="Description" name="navigation_text_inactive_color_step3" id="content_fr" value="<?php echo e($site_color->navigation_text_inactive_color_step3); ?>">
                                    <?php if($errors->has('content_fr')): ?>
                                    <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                    <?php endif; ?>
                              </div>

                              


                          </div>

                          		

                              <h3>Listing Section</h3>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Listing background color (highlighted / first item):</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Listing section background colour fist item"  aria-describedby="Description" name="listing_background_color" id="content_fr" value="<?php echo e($site_color->listing_background_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Listing background color (regular item):</label>
                                <input class="form-control" data-toggle="tooltip" title="Listing section background colour regular item" type="color"  aria-describedby="Description" name="listing_background_color_reg" id="content_fr" value="<?php echo e($site_color->listing_background_color_reg); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Title color:</label>
                                <input class="form-control" data-toggle="tooltip" title="Title colour" type="color"  aria-describedby="Description" name="title_color" id="content_fr" value="<?php echo e($site_color->title_color); ?>">
                               
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Listing Text color:</label>
                                <input class="form-control" data-toggle="tooltip" title="Listing section text colour" type="color"  aria-describedby="Description" name="listing_text_color" id="content_fr" value="<?php echo e($site_color->listing_text_color); ?>">
                               
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Listing Price color:</label>
                                <input class="form-control" data-toggle="tooltip" title="Listing section Price colour" type="color"  aria-describedby="Description" name="listing_price_color" id="content_fr" value="<?php echo e($site_color->listing_price_color); ?>">
                               
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>CTA Text color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="CTA tect colour"  aria-describedby="Description" name="cta_text_color" id="content_fr" value="<?php echo e($site_color->cta_text_color); ?>">
                               
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Popularity Text color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Popularity text colour"  aria-describedby="Description" name="popularity_text_color" id="content_fr" value="<?php echo e($site_color->popularity_text_color); ?>">
                               
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Listing Icon color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Listing icon colour"  aria-describedby="Description" name="listing_icon_color" id="content_fr" value="<?php echo e($site_color->listing_icon_color); ?>">
                               
                              </div>

                            

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>More info button color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="More info button colour" aria-describedby="Description" name="more_info_button_color" id="content_fr" value="<?php echo e($site_color->more_info_button_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>More info Text color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="More info text colour"  aria-describedby="Description" name="more_info_text_color" id="content_fr" value="<?php echo e($site_color->more_info_text_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>CTA color:</label>
                                <input type="color" name="button_color" data-toggle="tooltip" title="CTA colour" id="page" value="<?php echo e($site_color->button_color); ?>" class="form-control" >
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>Cheapest border color:</label>
                                <input type="color" name="cheapest_border_color" data-toggle="tooltip" title="CTA colour" id="page" value="<?php echo e($site_color->cheapest_border_color); ?>" class="form-control" >
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>Cheapest label color:</label>
                                <input type="color" name="cheapest_border_label_color" data-toggle="tooltip" title="CTA colour" id="page" value="<?php echo e($site_color->cheapest_border_label_color); ?>" class="form-control" >
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>Active tab color:</label>
                                <input type="color" name="active_tab_color" data-toggle="tooltip" title="CTA colour" id="page" value="<?php echo e($site_color->active_tab_color); ?>" class="form-control" >
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>Link color:</label>
                                <input type="color" name="link_color" data-toggle="tooltip" title="CTA colour" id="page" value="<?php echo e($site_color->link_color); ?>" class="form-control" >
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('page') ? ' has-danger' : ''); ?>">
                                <label>Discount sum color:</label>
                                <input type="color" name="discount_sum_color" data-toggle="tooltip" title="CTA colour" id="page" value="<?php echo e($site_color->discount_sum_color); ?>" class="form-control" >
                                 <?php if($errors->has('page')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('page')); ?></div>
                                  <?php endif; ?>
                              </div>


                              <h3>Filter Section</h3>
                              <div class="form_2_column">
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Filter Section Button Active Color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Filter section button active colour"  aria-describedby="Description" name="filter_section_color_button" id="content_fr" value="<?php echo e($site_color->filter_section_color_button); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Filter section Button Active Text color :</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Filter section button active text colour"  aria-describedby="Description" name="filter_section_button_color" id="content_fr" value="<?php echo e($site_color->filter_section_button_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Filter Section Checkbox Active Color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Filter section checkbox active colour" aria-describedby="Description" name="filter_section_color_checkbox" id="content_fr" value="<?php echo e($site_color->filter_section_color_checkbox); ?>">
                               
                              </div>

                          





                          </div>
                              
                          	<h3>General Section</h3>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>More tariffs button color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="More tariffs button colour"  aria-describedby="Description" name="more_tariffs_button_color" id="content_fr" value="<?php echo e($site_color->more_tariffs_button_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>More tariffs Text color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="More tariffs text colour"  aria-describedby="Description" name="more_tariffs_text_color" id="content_fr" value="<?php echo e($site_color->more_tariffs_text_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <h3>Footer Section</h3>
                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Footer background color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Footer backgound colour"  aria-describedby="Description" name="footer_background_color" id="content_fr" value="<?php echo e($site_color->footer_background_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
                                  <?php endif; ?>
                              </div>

                              <div class="form-group <?php echo e($errors->has('content_fr') ? ' has-danger' : ''); ?>">
                                <label>Footer text color:</label>
                                <input class="form-control" type="color" data-toggle="tooltip" title="Footer text colour"  aria-describedby="Description" name="footer_text_color" id="content_fr" value="<?php echo e($site_color->footer_text_color); ?>">
                                <?php if($errors->has('content_fr')): ?>
                                  <div id="first_name-error" class="form-control-feedback text-danger"><?php echo e($errors->first('content_fr')); ?></div>
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
<script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).data("check");
        var targetBox = $("." + inputValue);
        if(inputValue=='a'){
        $(".b").hide();
      }
      if(inputValue=='b'){
        $(".a").hide();
      }

      if(inputValue=='c'){
        $(".d").hide();
      }

      if(inputValue=='d'){
        $(".c").hide();
      }

      if(inputValue=='e'){
        $(".f").hide();
      }

      if(inputValue=='f'){
        $(".e").hide();
      }
        $(targetBox).show();
    });
});
</script>