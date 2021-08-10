    <div class="compare-sec">
		<div class="container">
			<div class="row">
				<div class="col-md-3 sec-part-1">
                                    <span class="com-button" id="compareme">
						<?php echo app('translator')->getFromJson('home.Compare_plans'); ?> <i class="fa fa-chevron-up"></i>
					</span>
				</div>
                          
                            <?php $__currentLoopData = $get_res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $get_result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-md-3 sec-part-2">
					<div class="selected">
						<div class="row">
							<div class="col-md-6">
								<img src="<?php echo e($get_result['supplier']['logo']); ?>">
							</div>
						</div>
						<p><?php echo e($get_result['supplier']['name']); ?> - <?php echo e($get_result['product']['name']); ?></p>
						
					</div>
				</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($get_res->count()==1): ?>
                            <div class="col-md-3 sec-part-4">
					<div class="selected-span">
						<span><?php echo app('translator')->getFromJson('home.selected_tarif_compare'); ?></span>	
					
					</div>
				</div>
                             <div class="col-md-3 sec-part-4">
					<div class="selected-span">
						<span><?php echo app('translator')->getFromJson('home.selected_tarif_compare'); ?></span>	
					
					</div>
				</div>
                            <?php endif; ?>
                            <?php if($get_res->count()==2): ?>
                            <div class="col-md-3 sec-part-4">
					<div class="selected-span">
						<span><?php echo app('translator')->getFromJson('home.selected_tarif_compare'); ?></span>	
					
					</div>
				</div>
                            
                            <?php endif; ?>
                            
                           
                            
                            
                         
				
                                
                            
                            
			</div>
		</div>
	</div>