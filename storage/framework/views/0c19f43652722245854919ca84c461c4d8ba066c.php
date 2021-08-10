<div class="form-group">
        <label> <?php echo app('translator')->getFromJson('home.municipality'); ?> </label>
       
        <select id = "dropList" required name="subpo">
        <?php $__currentLoopData = $sub_pos1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_pos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
            <option value ="<?php echo e($sub_pos); ?>"  <?php if($mun==$sub_pos): ?> selected  <?php endif; ?>><?php echo e($sub_pos); ?></option>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>
</div>