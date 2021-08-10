<div class="Footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <ul>
                        
                        
                         <?php if(Session::get('locale')=='nl'): ?>
                                <?php $__currentLoopData = $link_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $link->link_status == 1): ?>
                                     
                                        <?php if($link->slug == 'terms_conditions'): ?>
                                        <?php if(trans('home.terms&conditions')!="home.terms&conditions"): ?>
                                         <li>
                                        <a href="<?php echo e(trans('home.terms_link')); ?>">
                                         <?php echo app('translator')->getFromJson('home.terms&conditions'); ?> </a>
                                          </li>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'contact'): ?>
                                        <?php if(trans('home.contact')!="home.contact"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.contact_link')); ?>">  <?php echo app('translator')->getFromJson('home.contact'); ?> </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'frequent_questions'): ?>
                                        <?php if(trans('home.frequent_questions')!="home.frequent_questions"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.frequent_link')); ?>">
                                        
                                    <?php echo app('translator')->getFromJson('home.frequent_questions'); ?> </a>
                                    </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'powered_by'): ?>
                                        <?php if(trans('home.powered_by')!="home.powered_by"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.powered_by_link')); ?>"> <?php echo app('translator')->getFromJson('home.powered_by'); ?> </a>
                                         </li>
                                         <?php endif; ?>
                                        <?php endif; ?>
                                    
                                <?php else: ?>

                                      <?php if($link->slug == 'terms_conditions'): ?>
                                        <?php if(trans('home.terms&conditions')!="home.terms&conditions"): ?>
                                         <li>
                                        <a href="<?php echo e(trans('home.terms_link')); ?>">
                                         <?php echo app('translator')->getFromJson('home.terms&conditions'); ?> </a>
                                          </li>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'contact'): ?>
                                        <?php if(trans('home.contact')!="home.contact"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.contact_link')); ?>">  <?php echo app('translator')->getFromJson('home.contact'); ?> </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'frequent_questions'): ?>
                                        <?php if(trans('home.frequent_questions')!="home.frequent_questions"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.frequent_link')); ?>">
                                        
                                    <?php echo app('translator')->getFromJson('home.frequent_questions'); ?> </a>
                                    </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'powered_by'): ?>
                                        <?php if(trans('home.powered_by')!="home.powered_by"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.powered_by_link')); ?>"> <?php echo app('translator')->getFromJson('home.powered_by'); ?> </a>
                                         </li>
                                         <?php endif; ?>
                                        <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        <?php else: ?>
                                <?php $__currentLoopData = $link_status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if( $link->link_status == 1): ?>
                                        <?php if($link->slug == 'terms_conditions'): ?>
                                        <?php if(trans('home.terms&conditions')!="home.terms&conditions"): ?>
                                         <li>
                                        <a href="<?php echo e(trans('home.terms_link')); ?>">
                                         <?php echo app('translator')->getFromJson('home.terms&conditions'); ?> </a>
                                          </li>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'contact'): ?>
                                        <?php if(trans('home.contact')!="home.contact"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.contact_link')); ?>">  <?php echo app('translator')->getFromJson('home.contact'); ?> </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'frequent_questions'): ?>
                                        <?php if(trans('home.frequent_questions')!="home.frequent_questions"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.frequent_link')); ?>">
                                        
                                    <?php echo app('translator')->getFromJson('home.frequent_questions'); ?> </a>
                                    </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'powered_by'): ?>
                                        <?php if(trans('home.powered_by')!="home.powered_by"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.powered_by_link')); ?>"> <?php echo app('translator')->getFromJson('home.powered_by'); ?> </a>
                                         </li>
                                         <?php endif; ?>
                                        <?php endif; ?>
                                <?php else: ?>
                                        <?php if($link->slug == 'terms_conditions'): ?>
                                        <?php if(trans('home.terms&conditions')!="home.terms&conditions"): ?>
                                         <li>
                                        <a href="<?php echo e(trans('home.terms_link')); ?>">
                                         <?php echo app('translator')->getFromJson('home.terms&conditions'); ?> </a>
                                          </li>
                                          <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'contact'): ?>
                                        <?php if(trans('home.contact')!="home.contact"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.contact_link')); ?>">  <?php echo app('translator')->getFromJson('home.contact'); ?> </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'frequent_questions'): ?>
                                        <?php if(trans('home.frequent_questions')!="home.frequent_questions"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.frequent_link')); ?>">
                                        
                                    <?php echo app('translator')->getFromJson('home.frequent_questions'); ?> </a>
                                    </li>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($link->slug == 'powered_by'): ?>
                                        <?php if(trans('home.powered_by')!="home.powered_by"): ?>
                                        <li>
                                        <a href="<?php echo e(trans('home.powered_by_link')); ?>"> <?php echo app('translator')->getFromJson('home.powered_by'); ?> </a>
                                         </li>
                                         <?php endif; ?>
                                        <?php endif; ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endif; ?>
                    </ul>
                    <P><?php echo app('translator')->getFromJson('home.Copyright'); ?> <?php echo e(date('Y')); ?></P>
                </div>
            </div>
        </div>
    </div>
</div>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://kit.fontawesome.com/5371eb2245.js"></script>
     


