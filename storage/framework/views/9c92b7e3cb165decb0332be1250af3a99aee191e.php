 <?php $disc="0";  ?>
                    <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 