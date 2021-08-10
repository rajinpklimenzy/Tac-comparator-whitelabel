<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://use.fontawesome.com/2c807575d5.js"></script>
</head>
<body>
   
	<div class="container" style="max-width: 600px; margin: 0 auto;">
        <?php $__currentLoopData = $productlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php  
                $product = $getdetails['product'];
                $parameters = $getdetails['parameters'];
                $supplier = $getdetails['supplier'];
                $price = $getdetails['price'];
                $count=DB::table('user_logs')->where('product_id',$product['id'])->count();
                $tot_count=DB::table('user_logs')->count();
               
                
                $p_type=$product['type'];
                                
            ?>
            <table width = "100%" style="border: 1px solid #d1d5dc;border-radius: 5px;padding: 15px 5px;">
                <thead>
                    <tr>
                    <td colspan = "4" style="padding-bottom: 15px;"><a href="#" style="text-decoration: none; color: #000; font-weight: 600;"><?php echo e($supplier['name']); ?> - <?php echo e($product['name']); ?></a></td>
                    </tr>
                </thead>
                
                <tbody style="font-size: 13px;">
                    <tr>
                    <td style="width: 20%;" rowspan="3"><img width="100" src="<?php echo e($supplier['logo']); ?>"></td>
                    <td style="width: 25%;"><i style="color:#cdcfd1;padding-right: 5px;" class="fa fa-check" aria-hidden="true"></i><?php if($p_type=="pack"): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> + <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php elseif($p_type=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php elseif($p_type=='electricity'): ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php else: ?> <?php endif; ?></td>
                   
                    <?php if(Session::get('currentValue')): ?>
                    <td style="width: 20%;" <?php if(Session::get('currentValue')): ?>    <?php else: ?> style="visibility: none;" <?php endif; ?>><?php echo app('translator')->getFromJson('home.Savings_Year'); ?></td>
                    <?php else: ?>
                    <td style="width: 20%;" <?php if(Session::get('currentValue')): ?>    <?php else: ?> style="visibility: none;" <?php endif; ?>></td>
                    <?php endif; ?>
                                        <?php if($p_type=='pack'): ?>
                                          <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
                                        <?php endif; ?>
                                         
                                        <?php if($p_type=='electricity'): ?>
                                          <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
                                        <?php endif; ?>
                                        
                                        <?php if($p_type=='gas'): ?>
                                          <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
                                        <?php endif; ?>
                                         
                                        
                    <td style="width: 20%;" class="years"><?php echo app('translator')->getFromJson('home.All_in_costs_Year'); ?></td>
                    <td rowspan=""><a href="<?php echo e($actual_link); ?>?mail=true&locale=<?php echo e($parameters['values']['locale']); ?>&postal=<?php echo e($parameters['values']['postal_code']); ?>&customer_group=<?php echo e($parameters['values']['customer_group']); ?>" style="background: linear-gradient(180deg, rgba(211, 92, 92, 1) 21%, rgba(191, 59, 60, 1) 66%);border: none;padding: 5px 12px;color: #fff;border-radius: 5px;font-size: 10px;">SELECTEREN</a><br>
                    </td>
                    </tr>
                    <tr>
                    <td style="padding: 8px 0;"><i class="fa fa-check" style="color:#cdcfd1;padding-right: 5px;" aria-hidden="true"></i>
                        <?php if(Session::get('locale')=='nl'): ?> 
                                    <?php if($product['contract_duration']=='123'): ?> <?php echo app('translator')->getFromJson('home.123year'); ?><?php elseif($product['contract_duration']=='13'): ?> <?php echo app('translator')->getFromJson('home.13year'); ?><?php elseif($product['contract_duration']=='0'): ?> <?php echo app('translator')->getFromJson('home.Undetermined'); ?><?php else: ?> <?php echo e($product['contract_duration']); ?> <?php echo app('translator')->getFromJson('home.Year'); ?><?php endif; ?>,<?php if($product['type']=='pack'): ?> <?php if($product['underlying_products']['electricity']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> (E) <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> (E) <?php endif; ?> + <?php if($product['underlying_products']['gas']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> (G) <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> (G) <?php endif; ?>  <?php else: ?> <?php echo e($product['pricing_type']); ?> <?php endif; ?> <?php echo app('translator')->getFromJson('home.rate'); ?>
                        <?php else: ?>
                                    <?php if($product['contract_duration']=='123'): ?> <?php echo app('translator')->getFromJson('home.123year'); ?><?php elseif($product['contract_duration']=='13'): ?> <?php echo app('translator')->getFromJson('home.13year'); ?><?php elseif($product['contract_duration']=='0'): ?> <?php echo app('translator')->getFromJson('home.Undetermined'); ?><?php else: ?> <?php echo e($product['contract_duration']); ?> <?php echo app('translator')->getFromJson('home.Year'); ?><?php endif; ?>,<?php if($product['type']=='pack'): ?> <?php if($product['underlying_products']['electricity']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.rate'); ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> (E) <?php else: ?> <?php echo app('translator')->getFromJson('home.rate'); ?> <?php echo app('translator')->getFromJson('home.variable'); ?> (E) <?php endif; ?> + <?php if($product['underlying_products']['gas']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> (G) <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> (G) <?php endif; ?>  <?php else: ?> <?php echo e($product['pricing_type']); ?> <?php endif; ?>
                        <?php endif; ?>
                    </td>
                     
                                    <?php $currentValue=Session::get('currentValue');
                                        if(Session::get('cur_invoice_moth_year')=='year'){   
                                        $invamount=(int)$currentValue; 
                                        }else{
                                        $invamount=(int)$currentValue*12;
                                        }
                                        if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){
                                          $prc=number_format($invamount-($price['totals']['year']['incl_promo']/100),2,',', '.');
                                        } else {
                                        $prc=number_format($invamount-($price['totals']['year']['excl_promo']/100),2,',', '.');
                                        }
                                        $sp_pricea=preg_split("/,/",$prc)
                                    ?>
                                  
                    <?php if($prc>0): ?>    
                    <td style="font-weight: 700;font-size: 20px;">&euro; <?php echo e($sp_pricea[0]); ?><sup style="font-size: 11px;font-weight: 400;">,<?php echo e($sp_pricea[1]); ?></sup></td>
                    <?php else: ?>
                    <td style="font-weight: 700;font-size: 20px; visibility: none;"> <sup style="font-size: 11px;font-weight: 400;"></sup></td>
                    <?php endif; ?>
                    
                    <?php if($p_type=='pack'): ?>
                        <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            <td rowspan="2" style="font-weight: 700;color: red; font-size: 20px;">&euro; <?php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?><sup style="font-weight: 400;font-size: 11px;">,<?php echo e($sp_price[1]); ?></sup>
                                <?php if($per1!=0): ?><br><span style="color:#000;font-size: 13px;"><strike>&euro; <?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <?php $per=100-(($price['totals']['year']['incl_promo']/$price['totals']['year']['excl_promo'])*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span>  <?php endif; ?>
                            </td>
                        <?php else: ?>
                            <td rowspan="2" style="font-weight: 700; font-size: 20px;">&euro; <?php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?><sup style="font-weight: 400;font-size: 11px;">,<?php echo e($sp_price[1]); ?></sup></td>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if($p_type=='electricity'): ?>
                         <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            <td rowspan="2" style="font-weight: 700;color: red;font-size: 20px;">&euro; <?php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?><sup style="font-weight: 400;font-size: 11px;">,<?php echo e($sp_price[1]); ?></sup>
                            <?php if($per1!=0): ?><br><span style="color:#000;font-size: 13px;"><strike>&euro; <?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <?php $per=100-(($price['totals']['year']['incl_promo']/$price['totals']['year']['excl_promo'])*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span>  <?php endif; ?>
                            </td>
                        <?php else: ?>
                            <td rowspan="2" style="font-weight: 700; font-size: 20px;">&euro; <?php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?><sup style="font-weight: 400;font-size: 11px;">,<?php echo e($sp_price[1]); ?></sup></td>
                        <?php endif; ?>
                            
                    <?php endif; ?>
                    <?php if($p_type=='gas'): ?>
                        <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            <td rowspan="2" style="font-weight: 700;color: red;font-size: 20px;">&euro; <?php $prc=number_format($price['totals']['year']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?><sup style="font-weight: 400;font-size: 11px;">,<?php echo e($sp_price[1]); ?></sup>
                            <?php if($per1!=0): ?><br><span style="color:#000;font-size: 13px;"><strike>&euro; <?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <?php $per=100-(($price['totals']['year']['incl_promo']/$price['totals']['year']['excl_promo'])*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span>  <?php endif; ?>
                            </td>
                        <?php else: ?>
                            <td rowspan="2" style="font-weight: 700; font-size: 20px;">&euro; <?php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?><sup style="font-weight: 400;font-size: 11px;">,<?php echo e($sp_price[1]); ?></sup></td>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php
                            $string = trans("home.Choose");
                            $replace = ['{X}'];
                            $info = [
                            'X' => $product['popularity_score'],
                            ];
                   ?>  
                    <td style="text-align: center;"><i class="fa fa-heart" style="color:#cdcfd1;margin-right: 5px;" aria-hidden="true"></i>
                        <?php echo e(str_replace($replace, $info, $string)); ?>

                    </td>
                    </tr>
                    <tr>
                    <td><i class="fa fa-check" style="color:#cdcfd1;padding-right: 5px;" aria-hidden="true"></i><?php if($product['origin']=='BE' &&  $product['green_percentage'] > 0): ?><img src="<?php echo e(url('images/bel-flag.png')); ?>" alt="belgium flag"><?php endif; ?> <?php echo e($product['green_percentage']); ?> % <?php echo app('translator')->getFromJson('home.green'); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>	
</body>
</html>

 <script>
$(document).ready(function(){
    
    var a=$('#month').hasClass('active');
    var b=$('#year').hasClass('active');
    
      if(a==true) {
        $('.month').addClass("active");
        $('.years').removeClass("active");
        $('.month').css('display', 'block');
        $('.years').css('display', 'none');
    };

    if(b==true){
        $('.years').addClass("active");
        $('.month').removeClass("active");
        $('.years').css('display', 'block');
        $('.month').css('display', 'none');
    };

});

</script>  