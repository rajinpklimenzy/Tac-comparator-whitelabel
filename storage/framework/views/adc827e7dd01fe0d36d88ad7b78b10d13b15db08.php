	<?php 
	$desc=explode(" - ",$response['products'][0]['product']['description']);
	?>

	<?php $__currentLoopData = $desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<?php if($descs): ?><li class="product-desc-i"><?php echo $descs; ?></li><?php endif; ?>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>