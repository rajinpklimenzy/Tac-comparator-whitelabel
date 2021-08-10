
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

                   

<!-- MESSAGE MODAL -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="example-Modal3">New message</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="recipient-name" class="form-control-label">Recipient:</label>
						<input type="text" class="form-control" id="recipient-name">
					</div>
					<div class="form-group">
						<label for="message-text" class="form-control-label">Message:</label>
						<textarea class="form-control" id="message-text"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Send message</button>
			</div>
		</div>
	</div>
</div>
<!-- MESSAGE MODAL CLOSED -->

                  <!-- ROW-1 -->
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xl-6">
								<div class="row">


									 <?php if(Request::getHost()=='whitelable.wx.agency'): ?>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
                                       
										<div class="card">
											<div class="card-body text-center statistics-info">
												<div class="counter-icon bg-primary mb-0 box-primary-shadow">
													<i class="fe fe-trending-up text-white"></i>
												</div>
												<h6 class="mt-4 mb-1">Whitelabels</h6>
                                            <h2 class="mb-2 number-font"><?php echo e(DB::table('hostnames')->where('fqdn','!=','whitelable.wx.agency')->count()); ?></h2>
												<p class="text-muted">Number of clients available</p>
											</div>
										</div>
									</div>
									<?php endif; ?>
									<!-- <div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
										<div class="card">
                                           
											<div class="card-body text-center statistics-info">
												<div class="counter-icon bg-secondary mb-0 box-secondary-shadow">
													<i class="fe fe-codepen text-white"></i>
												</div>
												<h6 class="mt-4 mb-1">Leeds</h6>
												<h2 class="mb-2 number-font">200</h2>
												<p class="text-muted">Number of leeds</p>
											</div>
										</div>
									</div> -->
								
								</div>
							</div>
							
						</div>
                        <!-- ROW-1 END -->
                       

						
						


                </div>
            </div>
            <!--CONTAINER CLOSED -->
        </div>

       

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