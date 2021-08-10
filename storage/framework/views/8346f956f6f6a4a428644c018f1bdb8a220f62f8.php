
<?php $disc_total="0"; $checkPlus=0; $i="0"; 


if($locale=='nl'){
	
$fixed='Vast';
$on_consumption='op verbruik';
$Electricity='Elektriciteit';
$Gas='Gas';
$Total='Totaal';
$Discounts='Kortingen';

}else{
	
$fixed='Fix';
$on_consumption='le prix';
$Electricity='Electricité';
$Gas='Gaz';
$Total='Total';
$Discounts='Réductions';


}

?>
<?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



                    <?php
                    $disc_total=$disc_total+$discounts['amount']; $i++; ?>

                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?>" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    <?php if($discounts['parameters']['unit']=='euro'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>
                    <?php $priceTot=$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['single']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['day']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['night']/100+$response['products'][0]['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;  ?>

                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    &#8364; <?php echo e(number_format(($discounts['amount']),2,',', '.')); ?>

                    <?php endif; ?></b></h5>


                    <p class="amt"><?php if($discounts['parameters']['value_type']=='fixed'): ?> <?php echo e($fixed); ?> <?php endif; ?></p>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?>
                    <p class="amt"><?php echo e(number_format($discounts['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    <p class="amt"><?php echo e($discounts['parameters']['value']*100); ?> % <?php echo e($on_consumption); ?></p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['discount_type']=='servicelevel'): ?>
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    <?php elseif($discounts['parameters']['discount_type']=='loyalty'): ?>
                    <p class="mode amt"><img class="online_web" src="<?php echo e(url('images/loyality.png')); ?>">Getrouwheidskorting</p>
                    <?php else: ?>
                    <p class="mode amt"><?php if($discounts['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> <?php if($discounts['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

                    <?php endif; ?>
                    </span>
                    </span>
                    </a>
                    </li><span class="plus"><?php if($checkPlus> $i): ?> + <?php endif; ?></span>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                 <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php  $disc_total=$disc_total+$discounts['amount']; $i++;  ?>
                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?>" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    <?php if($discounts['parameters']['unit']=='euro'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    &#8364; <?php echo e(number_format(($discounts['amount']),2,',', '.')); ?>

                    <?php endif; ?></b></h5>
                    <p class="amt"><?php if($discounts['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?>
                    <p class="amt"><?php echo e(number_format($discounts['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    <p class="amt"><?php echo e($discounts['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['discount_type']=='servicelevel'): ?>
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    <?php elseif($discounts['parameters']['discount_type']=='loyalty'): ?>
                    <p class="mode amt"><img class="online_web" src="<?php echo e(url('images/loyality.png')); ?>">Getrouwheidskorting</p>
                    <?php else: ?>
                    <p class="mode amt"><?php if($discounts['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> <?php if($discounts['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

                    <?php endif; ?>
                    </span>
                    </span>
                    </a>
                    </li><span class="plus"><?php if($checkPlus> $i): ?> + <?php endif; ?></span>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php  $disc_total=$disc_total+$discounts['amount']; $i++;  ?>
                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?>" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    <?php if($discounts['parameters']['unit']=='euro'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    &#8364; <?php echo e(number_format(($discounts['amount']),2,',', '.')); ?>

                    <?php endif; ?></b></h5>


                    <p class="amt"><?php if($discounts['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?>
                    <p class="amt"><?php echo e(number_format($discounts['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    <p class="amt"><?php echo e($discounts['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['discount_type']=='servicelevel'): ?>
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    <?php elseif($discounts['parameters']['discount_type']=='loyalty'): ?>
                    <p class="mode amt"><img class="online_web" src="<?php echo e(url('images/loyality.png')); ?>">Getrouwheidskorting</p>
                    <?php else: ?>
                    <p class="mode amt"><?php if($discounts['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> <?php if($discounts['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

                    <?php endif; ?>
                    </span>
                    </span>
                    </a>
                    </li><span class="plus"><?php if($checkPlus> $i): ?> + <?php endif; ?></span>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <?php  $disc_total=$disc_total+$discounts['amount']; $i++;  ?>


                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?>" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    <?php if($discounts['parameters']['unit']=='euro'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    &#8364; <?php echo e(number_format(($discounts['amount']),2,',', '.')); ?>

                    <?php endif; ?></b></h5>


                    <p class="amt"><?php if($discounts['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?>
                    <p class="amt"><?php echo e(number_format($discounts['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    <p class="amt"><?php echo e($discounts['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['discount_type']=='servicelevel'): ?>
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    <?php elseif($discounts['parameters']['discount_type']=='loyalty'): ?>
                    <p class="mode amt"><img class="online_web" src="<?php echo e(url('images/loyality.png')); ?>">Getrouwheidskorting</p>
                    <?php else: ?>
                    <p class="mode amt"><?php if($discounts['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> <?php if($discounts['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

                    <?php endif; ?>
                    </span>
                    </span>
                    </a>
                    </li><span class="plus"><?php if($checkPlus> $i): ?> + <?php endif; ?></span>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    
                <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <?php  $disc_total=$disc_total+$discounts['amount']; $i++;  ?>


                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?>" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    <?php if($discounts['parameters']['unit']=='euro'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    &#8364; <?php echo e(number_format(($discounts['amount']),2,',', '.')); ?>

                    <?php endif; ?></b></h5>


                    <p class="amt"><?php if($discounts['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?>
                    <p class="amt"><?php echo e(number_format($discounts['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['unit']=='pct'): ?>
                    <p class="amt"><?php echo e($discounts['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
                    <?php endif; ?>
                    <?php if($discounts['parameters']['discount_type']=='servicelevel'): ?>
                    <p class="mode amt"><i class="fas fa-at"></i> Beperkte dienstverlening</p>
                    <?php elseif($discounts['parameters']['discount_type']=='loyalty'): ?>
                    <p class="mode amt"><img class="online_web" src="<?php echo e(url('images/loyality.png')); ?>">Getrouwheidskorting</p>
                    <?php else: ?>
                    <p class="mode amt"><?php if($discounts['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> <?php if($discounts['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

                    <?php endif; ?>
                    </span>
                    </span>
                    </a>
                    </li><span class="plus"><?php if($checkPlus> $i): ?> + <?php endif; ?></span>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php if($disc_total!=0): ?>
                    <span class="plus">=</span>
                    <li class="nav-item">
                        <div class="nav-link lst" aria-controls="contact" aria-selected="false">
                            <span class="main-sec">
                                <span class="main-sec-1">
                                    <h5 class="dis-bold"><b>&#8364;</i><?php echo e(number_format($disc_total,2,',', '.')); ?></b></h5>
                                    <p class="amt dis-amt"><?php echo e($Total); ?> <?php echo e($Discounts); ?></p>
                                    <p class="mode amt">
                                        <?php if($response['products'][0]['parameters']['values']['comparison_type']=="electricity"): ?><i class="fa fa-bolt"></i></p><?php endif; ?>
                                        <?php if($response['products'][0]['parameters']['values']['comparison_type']=="gas"): ?><i class="fa fa-fire"></i></p><?php endif; ?>
                                        <?php if($response['products'][0]['parameters']['values']['comparison_type']=="pack"): ?><i class="fa fa-bolt"></i> + <i class="fa fa-fire"></i></p><?php endif; ?>
                                </span>
                            </span>
                        </div>
                    </li>
            <?php endif; ?>