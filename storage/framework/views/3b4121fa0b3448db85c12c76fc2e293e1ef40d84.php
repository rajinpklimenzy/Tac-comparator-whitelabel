            <?php
            header('Content-Type:text/html; charset=UTF-8');
            ?>
            <?php  
            $parameters=Session::get('getParameters');

            $product = $getdetails['product']; $parameters = $getdetails['parameters']; $supplier = $getdetails['supplier']; $price = $getdetails['price']; $count=DB::table('user_logs')->where('product_id',$product['id'])->count();
            $tot_count=DB::table('user_logs')->count();
            //$choose=($count/$tot_count)*100;

            $p_type=$product['type']; $activeStar=false; $activeStarG=false; $activeStarE=false; $discPromo=false; $discService=false; $discloyalty=false;
            if(Session::get('promo')=='true'){
            $discPromo=true;
            }else{
            $discPromo=false;
            }
            if(Session::get('domi')=='true'){
            $discService=true;
            }else{
            $discService=false;
            }
            if(Session::get('email')=='true'){
            $discloyalty=true;
            }else{
            $discloyalty=false;
            }
            $ele_disc="0"; $gas_disc="0"; $all_disc="0"; $sl_disc="0"; $promo_disc="0"; $promo_discE="0"; $promo_discG="0"; $loyalty_disc="0"; $all_discTotal="0";
            $promo_discAll=0; $test_disc=0;
            foreach($price['breakdown']['discounts'] as $disc){
            $test_disc=$test_disc+$disc['amount'];
            }

            foreach($price['breakdown']['discounts'] as $disc){

            if($disc['parameters']['fuel_type']=='electricity'){

            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
            $ele_disc=$ele_disc+$disc['amount']; $promo_disc=$promo_disc+$disc['amount']; $promo_discE=$promo_discE+$disc['amount'];
            }

            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
            $ele_disc=$ele_disc+$disc['amount']; $sl_disc=$sl_disc+$disc['amount'];
            }

            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
            $ele_disc=$ele_disc+$disc['amount']; $loyalty_disc=$loyalty_disc+$disc['amount'];
            }
            }


            if($disc['parameters']['fuel_type']=='gas'){

            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
            $gas_disc=$gas_disc+$disc['amount'];  $promo_disc=$promo_disc+$disc['amount'];
            $promo_discG=$promo_discG+$disc['amount'];
            }
            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
            $gas_disc=$gas_disc+$disc['amount']; $sl_disc=$sl_disc+$disc['amount'];
            }
            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
            $gas_disc=$gas_disc+$disc['amount']; $loyalty_disc=$loyalty_disc+$disc['amount'];
            }
            }

            if($disc['parameters']['fuel_type']=='all'){

            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
            $all_disc=$all_disc+$disc['amount']; $promo_disc=$promo_disc+$disc['amount'];
            $promo_discAll=$promo_discAll+$disc['amount'];
            }
            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
            $all_disc=$all_disc+$disc['amount']; $sl_disc=$sl_disc+$disc['amount'];
            }
            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
            $all_disc=$all_disc+$disc['amount']; $loyalty_disc=$loyalty_disc+$disc['amount'];
            }
            }

            }  ?>

                            <input type="hidden" class="locale" value="<?php echo e($parameters['values']['locale']); ?>">
                            <input type="hidden" class="postalCode" value="<?php echo e($parameters['values']['postal_code']); ?>">
                            <input type="hidden" class="customerGroup" value="<?php echo e($parameters['values']['customer_group']); ?>">
                            <input type="hidden" class="first_residence" value="1">
                            <input type="hidden" class="registerNormal" value="<?php echo e($parameters['values']['usage_single']); ?>">
                            <input type="hidden" class="registerDay" value="<?php echo e($parameters['values']['usage_day']); ?>">
                            <input type="hidden" class="registerNight" value="<?php echo e($parameters['values']['usage_night']); ?>">
                            <input type="hidden" class="registerExclNight" value="<?php echo e($parameters['values']['usage_excl_night']); ?>">
                            <input type="hidden" class="registerG" value="<?php echo e($parameters['values']['usage_gas']); ?>">
                            <input type="hidden" class="meterType" value="<?php echo e($parameters['values']['meter_type']); ?>">
                            <input type="hidden" class="IncludeG" value="<?php echo e($parameters['values']['includeG']); ?>">
                            <input type="hidden" class="IncludeE" value="<?php echo e($parameters['values']['includeE']); ?>">
                            <input type="hidden" class="uuid" value="<?php echo e($parameters['uuid']); ?>">


                            <!-- for pack  -->
                             <?php if($packType=='pack'): ?>
                             <input type="hidden" name="ff" class="pr_fixed_fee" value="<?php echo e(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['fixed_fee'])/100); ?>">
                             <?php elseif($packType=='electricity'): ?>

                              <input type="hidden" name="ff" class="pr_fixed_fee" value="<?php echo e(($price['breakdown']['electricity']['energy_cost']['fixed_fee'])/100); ?>">
                              <?php elseif($packType=='gas'): ?>

                               <input type="hidden" name="ff" class="pr_fixed_fee" value="<?php echo e(($price['breakdown']['gas']['energy_cost']['fixed_fee'])/100); ?>">
                             <?php endif; ?>

                              <?php if($price['totals']['year']['excl_promo']>$price['totals']['year']['incl_promo']): ?>
                             <input type="hidden" name="discount" class="pr_discount" value="<?php echo e(($price['totals']['year']['excl_promo']-$price['totals']['year']['incl_promo'])/100); ?>">
                              <?php else: ?>
                             <input type="hidden" name="discount" class="pr_discount" value="0">
                              <?php endif; ?>

                               <?php if($packType=='pack'): ?>
                             <input type="hidden" name="consumption" class="pr_consumption" value="<?php echo e(($price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['gas']['energy_cost']['usage'])/100); ?>">
                             <?php elseif($packType=='electricity'): ?>
                             <input type="hidden" name="consumption" class="pr_consumption" value="<?php echo e(($price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night'])/100); ?>">

                             <?php elseif($packType=='gas'): ?>

                              <input type="hidden" name="consumption" class="pr_consumption" value="<?php echo e(($price['breakdown']['gas']['energy_cost']['usage'])/100); ?>">

                             <?php endif; ?>

                             <?php if($packType=='electricity'): ?>
                             <input type="hidden" name="certificate" class="pr_certificate" value="<?php echo e(($price['breakdown']['electricity']['energy_cost']['certificates'])/100); ?>">
                             <?php endif; ?>


                              <?php
                              if($packType=='pack'){
                              $impact_ev_market=(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['fixed_fee'])/100)+(($price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['gas']['energy_cost']['usage'])/100)+(($price['breakdown']['electricity']['energy_cost']['certificates'])/100)-(($price['totals']['year']['excl_promo']-$price['totals']['year']['incl_promo'])/100);
                              }

                              ?>
                              <?php if($packType=='pack'): ?>
                              <input type="hidden" name="impact_evolution_market_live" class="impact_evolution_market_live<?php echo e($product['id']); ?>" value="<?php echo e($impact_ev_market); ?>">
                              <?php endif; ?>

                              <input type="hidden" name="Scenario" class="scenario<?php echo e($product['id']); ?>">

                            

                            <!-- for pack -->



            <div class="<?php if($min==$product['id']): ?> featured-sec <?php endif; ?>">
            <?php if($min==$product['id']): ?>
            <div class="row justify-content-end">
            <div class="featured-text ">
            <p><?php echo app('translator')->getFromJson('home.This_cheap'); ?></p>
            </div>
            </div>
            <?php endif; ?>
            <?php $excl="";  ?>
            <?php $__currentLoopData = $price['breakdown']['discounts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            if($disc['parameters']['channel']=='exclusive_to_comparators'){
            $excl='exclusive_to_comparators';
            }
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="section-3-sec <?php if($min==$product['id']): ?> featured <?php endif; ?>" id="<?php echo e($product['id']); ?>" data-target='el-2'>
            <div class="row section-3">
            <div class="col-md-12 sec-3-head">
            <form action="<?php echo e(url('bevestiging')); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
            <input type="hidden" name="pro_id"  value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="supplier"  value="<?php echo e($supplier['name']); ?>">
            <input type="hidden" name="product"  value="<?php echo e($product['name']); ?>">
            <input type="hidden" name="pro_type"  value="<?php echo e($parameters['values']['comparison_type']); ?>">
            <input type="hidden" name="type" id="get_type" value="<?php echo e(Session::get('customer_type')); ?>">
            <input type="hidden" name="postalcode" id="get_postalcode" value="<?php echo e(Session::get('postal_code')); ?>">
            <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
            <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
            <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
            <?php if($packType=='elecrticity'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            <?php elseif($packType=='gas'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            <?php else: ?>
            <input type="hidden" name="sub_url"  value="<?php echo e($product['subscribe_url']); ?>">
            <?php endif; ?>
            <input type="hidden" name="from" value="pack" >
            <input type="hidden" name="pr_type" id="pr_type" value="">
            <div class="tool-sec-1">
            <button  data-id="<?php echo e($product['id']); ?>" type="submit" class="sec-head-btn"><?php echo e($supplier['name']); ?> - <?php echo e($product['name']); ?></button> <div>  <?php if($supplier['greenpeace_rating'] > 0.75): ?><span class="tool-1-sec"><span class="exc" style="background-color: #147b13;" > <?php echo app('translator')->getFromJson('home.greenest'); ?><span class="tool-sec-tip" rel="tooltip" title="<?php echo app('translator')->getFromJson('home.exc_greenest'); ?>"  ><i class="fas fa-info-circle"></i></span> </span></span> <?php endif; ?>  <?php if($min==$product['id']): ?> <span class="tool-1-sec"><span class="exc" style="background-color: blue;" > <?php echo app('translator')->getFromJson('home.cheapest'); ?> <span class="tool-sec-tip" rel="tooltip" title="<?php echo app('translator')->getFromJson('home.exc_cheapest'); ?>"  ><i class="fas fa-info-circle"></i></span> </span></span> <?php endif; ?>  <?php if($excl=='exclusive_to_comparators'): ?><span class="tool-1-sec"> <span class="exc"> <?php echo app('translator')->getFromJson('home.exclusive'); ?> <span class="tool-sec-tip" rel="tooltip" title="<?php echo app('translator')->getFromJson('home.exc_exclusive'); ?>"><i class="fas fa-info-circle"></i></span> </span></span><span class="tool-1-sec"> <?php endif; ?>  <?php if($product['contract_duration']=='4' || $product['contract_duration']=='5' && $product['pricing_type']=='fixed'): ?> <span class="exc"> <?php echo app('translator')->getFromJson('home.most_sec'); ?> <span class="tool-sec-tip" rel="tooltip" title="<?php echo app('translator')->getFromJson('home.exc_secure'); ?>"  ><i class="fas fa-info-circle"></i></span></span></span> <?php endif; ?></div> 
            </div>
            </form>
            </div>
            </div>
            <div class="row part">
            <div class="col-md-3 col-sm-6 part-1">
            <img src="<?php echo e($supplier['logo']); ?>" alt="supplier-logo">
            </div>
            <div  <?php if(Session::get('currentValue')): ?> class="col-md-3 col-sm-6 part-2" <?php else: ?> class="col-md-5 col-sm-6 part-2" <?php endif; ?> >
            <!-- basic details section -->
            <ul>

            <!-- tarrif type -->
            <li><p style="text-transform: capitalize"><i class="fa fa-check"></i><?php if($p_type=="pack" && $packType!="electricity" && $packType!="gas"): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> + <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php elseif($p_type=='gas' || $packType=="gas"): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php elseif($p_type=='electricity' || $packType=="electricity"): ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php else: ?> <?php endif; ?></p>
            </li>

            <!-- tarrif type end -->

            <!-- duration -->

            <li>
            <p><i class="fa fa-check"></i>
            <?php if(Session::get('locale')=='nl'): ?> 
            <?php if($product['contract_duration']=='123'): ?> <?php echo app('translator')->getFromJson('home.123year'); ?><?php elseif($product['contract_duration']=='13'): ?> <?php echo app('translator')->getFromJson('home.13year'); ?><?php elseif($product['contract_duration']=='0'): ?> <?php echo app('translator')->getFromJson('home.Undetermined'); ?><?php else: ?> <?php echo e($product['contract_duration']); ?> <?php if($product['contract_duration']>1): ?> <?php echo app('translator')->getFromJson('home.Year'); ?>s <?php else: ?> <?php echo app('translator')->getFromJson('home.Year'); ?> <?php endif; ?>
            <?php endif; ?>,

            <?php if($product['type']=='pack'): ?> 

                <?php if($product['underlying_products']['electricity']['pricing_type']!=$product['underlying_products']['gas']['pricing_type']): ?>
                    Combinatie vast en variabel
                <?php else: ?>
                <?php if($product['underlying_products']['electricity']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?>  <?php else: ?>     <?php echo app('translator')->getFromJson('home.variable'); ?>  <?php endif; ?> 

            <?php endif; ?>
            <?php else: ?> 

             <?php if($product['pricing_type']== 'fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?>
             <?php endif; ?> 


            <?php else: ?>
            <?php if($product['contract_duration']=='123'): ?> <?php echo app('translator')->getFromJson('home.123year'); ?><?php elseif($product['contract_duration']=='13'): ?> <?php echo app('translator')->getFromJson('home.13year'); ?><?php elseif($product['contract_duration']=='0'): ?> <?php echo app('translator')->getFromJson('home.Undetermined'); ?><?php else: ?> <?php echo e($product['contract_duration']); ?> <?php if($product['contract_duration']>1): ?> <?php echo app('translator')->getFromJson('home.Year'); ?>s <?php else: ?> <?php echo app('translator')->getFromJson('home.Year'); ?> <?php endif; ?> <?php endif; ?>,
            <?php if($product['type']=='pack'): ?>
            <?php if($product['underlying_products']['electricity']['pricing_type']!=$product['underlying_products']['gas']['pricing_type']): ?>
            Combinaison fixe et variable
            <?php else: ?>
            <?php if($product['underlying_products']['electricity']['pricing_type']=='fixed'): ?>  <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?>  <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?>
            <?php endif; ?>
            <?php else: ?> 
            <?php if($product['pricing_type']== 'fixed'): ?> <?php echo app('translator')->getFromJson('home.rate'); ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?>  <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?> <?php endif; ?>
            <?php endif; ?>
            </p>
            </li>
            <!-- duration end -->
            <!-- green % -->
            <?php if($product['type']=='electricity' || $product['type']=='pack'): ?>
            <li><p><i class="fa fa-check"></i><?php if($product['origin']=='BE' &&  $product['green_percentage'] > 0): ?><img src="<?php echo e(url('images/bel-flag.png')); ?>"><?php endif; ?> <?php echo e($product['green_percentage']); ?> % <?php echo app('translator')->getFromJson('home.green'); ?></p></li>
            <?php endif; ?>
            <!-- green % end -->
            </ul>
            <!-- basic details section ends -->
            </div>
            <?php if($product['type']=="pack"): ?>  
                                <?php $all_discTotal=$all_disc;  ?>
                                <?php else: ?>
                                
                                <?php $all_discTotal=$all_disc; ?>
                                
                                <?php endif; ?>


            <?php  

                      
            $discAmount=($price['totals']['year']['excl_promo']/100)-($promo_discE+$promo_discG+$promo_discAll+$sl_disc+$loyalty_disc);

            if($product['type']=='electricity'){

            $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
            $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
            $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100; 


            if(($fixF+$cun+$cer)-$promo_discE<0){

            $discAmount=($price['totals']['year']['excl_promo']/100)-($fixF+$cun+$cer);

            $discAmount=$discAmount-($promo_discAll+$sl_disc+$loyalty_disc);

            }

            }

            if($product['type']=='gas'){

            $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
            $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;

            if(($fixF+$cun)-$promo_discG<0){

            $discAmount=($price['totals']['year']['excl_promo']/100)-($fixF+$cun);
            $discAmount=$discAmount-($promo_discAll+$sl_disc+$loyalty_disc);
            }

            }

            if($product['type']=='pack'){
            $discAmountG=$promo_discG; $discAmountE=$promo_discE;


            $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
            $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;

            $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;

            if((($fixF+$cun+$cer)-($promo_discE))<0){
            $discAmountE=($fixF+$cun+$cer);
            $discAmount=($price['totals']['year']['excl_promo']/100)-($discAmountE+$discAmountG);
            $discAmount=$discAmount-($promo_discAll+$sl_disc+$loyalty_disc);
            }

            $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
            $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;

            if((($fixF+$cun)-($promo_discG))<0){
            $discAmountG=($fixF+$cun);

            }

            $discAmount=($price['totals']['year']['excl_promo']/100)-($discAmountG+$discAmountE+$promo_discAll+$sl_disc+$loyalty_disc);

            }

            ?>

            <!-- historical price -->

            <div class="col-md-2 col-sm-6 part-3" style="display: none;">
            <img src="<?php echo e(url('images/hisLoader.gif')); ?>" width="120px" class="historicalLoading historicalLoading<?php echo e($product['id']); ?>" style="display: none;">
            <p class="historicalPriceError red herror<?php echo e($product['id']); ?>" style="display: none;color: red;" >Historical price not available for this date</p>
            <ul class="year_savings historicalPrice historicalPrice<?php echo e($product['id']); ?>" style="display: none;">
            <input type="hidden" class="histProId" name="histProId" value="<?php echo e($product['id']); ?>">
                  
            <!-- <li><p><?php echo app('translator')->getFromJson('home.Savings_Year'); ?></p></li> -->
            <li><p>Historische prijs/jaar</p></li>
            <li><p class="euro" ><b>&#8364; <span class="price_savings"><span class="a<?php echo e($product['id']); ?>"></span><sup>,<span class="b<?php echo e($product['id']); ?>"></span></sup></span> </b></p></li>
            </ul>
            </div>

            <!-- historical end -->


            <?php if(Session::get('currentValue')): ?> 
            <div class="col-md-2 col-sm-6 part-3">

            <?php $currentValue=Session::get('currentValue'); 

            if(Session::get('cur_invoice_moth_year')=='year'){
            $invamount=(int)$currentValue;
            }else{
            $invamount=(int)$currentValue*12;
            }
            if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){
            $prc=number_format($invamount-($discAmount),2,',', '.');
            }else{
            $prc=number_format($invamount-($price['totals']['year']['excl_promo']/100),2,',', '.');
            }
            $sp_pricea=preg_split("/,/",$prc)
            ?>                                  
            <?php if($prc>0): ?>
            <ul <?php if(Session::get('currentValue')): ?>    <?php else: ?> style="display:none;" <?php endif; ?> class="year_savings years">
            <li><p><?php echo app('translator')->getFromJson('home.Savings_Year'); ?></p></li>
            <li><p class="euro" ><b>&#8364; <span class="price_savings"><?php echo e($sp_pricea[0]); ?><sup>,<?php echo e($sp_pricea[1]); ?></sup></span> </b></p></li>
            </ul>
            <?php else: ?>

            <ul <?php if(Session::get('currentValue')): ?>    <?php else: ?> style="display:none;" <?php endif; ?> class="year_savings years">
            <li><p><?php echo app('translator')->getFromJson('home.Savings_Year'); ?></p></li>
            <li><p class="euro" ><b>&#8364; <span class="price_savings">0<sup>,00</sup></span> </b></p></li>
            </ul>
            <?php endif; ?>
            <?php 
            $currentValue=Session::get('currentValue');  

            if(Session::get('cur_invoice_moth_year')=='month'){

            $invamount=(int)$currentValue;

            }else{
            $invamount=(int)$currentValue/12;
            }
            if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')){

            $prc=number_format($invamount-($discAmount),2,',', '.');
            }else{
            $prc=number_format($invamount-($price['totals']['month']['excl_promo']/100),2,',', '.');
            }
            $sp_pricem=preg_split("/,/",$prc)
            ?>

            <?php if($prc>0): ?>
            <ul  style="display:none;" class="month_savings month">
            <li><p><?php echo app('translator')->getFromJson('home.Savings_Month'); ?></p></li>

            <li><p class="euro" ><b>&#8364; <span class="price_savings"> <?php echo e($sp_pricem[0]); ?><sup>,<?php echo e($sp_pricem[1]); ?></sup></span> </b></p></li>
            </ul>
            <?php else: ?>

            <ul  style="display:none;" class="month_savings month">
            <li><p><?php echo app('translator')->getFromJson('home.Savings_Month'); ?></p></li>

            <li><p class="euro" ><b>&#8364; <span class="price_savings"> 0<sup>,00</sup></span> </b></p></li>
            </ul>

            <?php endif; ?>

            </div>
            <?php endif; ?>
            <div   class="col-md-2 col-sm-6 part-4">

            <ul>

            <?php if($p_type=='pack' && $packType=='electricity' ): ?>
            <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
            <?php endif; ?>

            <?php if($p_type=='electricity'): ?>
            <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
            <?php endif; ?>

            <?php if($p_type=='pack' && $packType=='gas' ): ?>
            <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
            <?php endif; ?>

            <?php if($p_type=='gas'): ?>
            <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
            <?php endif; ?>

            <?php if($p_type=='pack' && $packType!='electricity' && $packType!='gas'): ?>
            <?php $per1=100-(($price['totals']['month']['incl_promo']/$price['totals']['month']['excl_promo'])*100) ?>
            <?php endif; ?>

            <li>
            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>    
                 <p class="<?php if($per1!=0): ?> red <?php endif; ?> years"><?php echo app('translator')->getFromJson('home.All_in_costs_Year'); ?></p>
                 <p class="<?php if($per1!=0): ?> red <?php endif; ?> month" style="display:none;"><?php echo app('translator')->getFromJson('home.All_in_costs_Month'); ?></p>
            <?php else: ?>
                 <p class="years"><?php echo app('translator')->getFromJson('home.All_in_costs_Year'); ?></p>
                 <p class="month" style="display:none;"><?php echo app('translator')->getFromJson('home.All_in_costs_Month'); ?></p>
            <?php endif; ?>
            </li>

            <?php if($p_type=='pack' && $packType=='electricity' ): ?>

            <input type="hidden" value="<?php echo e(number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)); ?>" class="get_year_val">
            <input type="hidden" value="<?php echo e(number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)); ?>" class="get_month_val">
            <?php endif; ?>
            <?php if($p_type=='electricity'): ?>

            <input type="hidden" value="<?php echo e(number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)); ?>" class="get_year_val">
            <input type="hidden" value="<?php echo e(number_format(($price['breakdown']['electricity']['energy_cost']['fixed_fee']+$price['breakdown']['electricity']['energy_cost']['certificates']+$price['breakdown']['electricity']['energy_cost']['single']+$price['breakdown']['electricity']['energy_cost']['day']+$price['breakdown']['electricity']['energy_cost']['night']+$price['breakdown']['electricity']['energy_cost']['excl_night']+$price['breakdown']['electricity']['distribution_and_transport']['distribution']+$price['breakdown']['electricity']['distribution_and_transport']['transport']+$price['breakdown']['electricity']['taxes']['tax'])/100,2)); ?>" class="get_month_val">
            <?php endif; ?>
            <?php if($p_type=='gas'): ?>

            <input type="hidden" value="<?php echo e(number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2)); ?>" class="get_year_val">
            <input type="hidden" value="<?php echo e(number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2)); ?>" class="get_month_val">
            <?php endif; ?>

            <?php if($p_type=='pack'): ?>
            <input type="hidden" value="<?php echo e(number_format($price['totals']['year']['incl_promo']/100,2)); ?>" class="get_year_val">
            <input type="hidden" value="<?php echo e(number_format($price['totals']['month']['incl_promo']/100,2)); ?>" class="get_month_val">
            <?php endif; ?>



            <?php if($p_type=='pack' && $packType=='electricity' ): ?>
            <?php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) ?>
            <li>
            <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro years "><b>&#8364; </i><?php $prc=number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p><p class=" euro month"  style="display:none;"><b>&#8364;</i><?php $prc=number_format($price['totals']['month']['incl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <li>

            <?php if($per1!=0): ?> <p class="strike years"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><p class="strike month" style="display:none;"> <strike> &#8364;</i><?php echo e(number_format($price['totals']['month']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"> -<?php echo e(number_format($per1, 2,',', '.')); ?>%</span></p><?php endif; ?>

            </li>
            <?php endif; ?>

            <?php if($p_type=='electricity'): ?>

            <?php $per1=100-((($discAmount/12)/($price['totals']['month']['excl_promo']))*100) ?>
            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>

            <li>
            <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro years "><b>&#8364; </i><?php $prc=number_format($discAmount,2,',', '.'); $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p> <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro month" style="display:none;"><b>&#8364; </i><?php $prc=number_format(($discAmount/12),2,',', '.'); $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <li>
            <?php if($per1!=0): ?><p class="strike years"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['month']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><?php endif; ?>

            </li>
            <?php else: ?>
            <?php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) ?>
            <li>
            <p class=" euro years "><b>&#8364; </i><?php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p> <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro month" style="display:none;"><b>&#8364; </i><?php $prc=number_format($price['totals']['month']['excl_promo']/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>

            <?php endif; ?>

            <?php endif; ?>

            <?php if($p_type=='pack' && $packType=='gas' ): ?>
            <?php $per1=100-(($discAmount/$price['totals']['month']['excl_promo'])*100) ?>
            <li>
            <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro years "><b>&#8364; </i><?php $prc=number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p> <p class=" euro month " style="display:none;"><b>&#8364; </i><?php $prc=number_format(($price['breakdown']['gas']['energy_cost']['fixed_fee']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['taxes']['tax'])/100,2,',', '.'); $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <li>

             <?php if($per1!=0): ?><p class="strike years"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['month']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><?php endif; ?>

            </li>
            <?php endif; ?>

            <?php if($p_type=='gas'): ?>
            <?php $per1=100-((($discAmount/12)/$price['totals']['month']['excl_promo'])*100) ?>
            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
            <li>
            <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro years "><b>&#8364; </i><?php $prc=number_format($discAmount,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup</p><p class="<?php if($per1!=0): ?> red <?php endif; ?> euro month"  style="display:none;"><b>&#8364;</i><?php $prc=number_format($price['totals']['month']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <li>
             <?php if($per1!=0): ?><p class="strike years"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i><?php echo e(number_format(($discAmount/12)/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-((($discAmount/12)/$price['totals']['month']['excl_promo'])*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><?php endif; ?>
            </li>
            <?php else: ?>
            <?php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) ?>
            <li>
            <p class=" euro years "><b>&#8364; </i><?php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup</p><p class="<?php if($per1!=0): ?> red <?php endif; ?> euro month"  style="display:none;"><b>&#8364;</i><?php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            <?php if($p_type=='pack' && $packType!='electricity' && $packType!='gas'): ?>
            <?php $per1=100-((($discAmount/12)/$price['totals']['month']['excl_promo'])*100) ?>
            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
            <li>
             
            <p class="<?php if($per1!=0): ?> red <?php endif; ?> euro years " ><b>&#8364; </i><?php $prc=number_format($discAmount,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p><p class="<?php if($per1!=0): ?> red <?php endif; ?> euro month"  style="display:none;"><b>&#8364;</i><?php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <li class="<?php echo e($parameters['values']['promo_discount']['promo']); ?>" >
            <?php if($per1!=0): ?><p class="strike years"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-(($discAmount/($price['totals']['year']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><p class="strike month" style="display:none;"> <strike> &#8364; </i><?php echo e(number_format($price['totals']['month']['excl_promo']/100,2,',', '.')); ?></strike> <span class="disc"><?php $per=100-((($discAmount/12)/($price['totals']['month']['excl_promo']/100))*100) ?> -<?php echo e(number_format($per,2,',', '.')); ?>%</span></p><?php endif; ?>
            </li>
            <?php else: ?>
            <?php $per1=100-(round((round($discAmount)/12)*100/round($price['totals']['month']['excl_promo']))*100) ?>
            <li>
            <p class=" euro years "><b>&#8364; </i><?php $prc=number_format($price['totals']['year']['excl_promo']/100,2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p><p class="<?php if($per1!=0): ?> red <?php endif; ?> euro month"  style="display:none;"><b>&#8364;</i><?php $prc=number_format(($discAmount/12),2,',', '.');  $sp_price=preg_split("/,/",$prc)  ?> <?php echo e($sp_price[0]); ?></b><sup>,<?php echo e($sp_price[1]); ?></sup></p>
            </li>
            <?php endif; ?>
            <?php endif; ?>
            </ul>
            </div> 
            <div class="col-md-2 col-sm-6 part-5">
            <input type="hidden" class="load-type" value="<?php echo e($packType); ?>">
            <?php if(!$packType): ?>
            <form action="<?php echo e(url('bevestiging')); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
            <input type="hidden" name="pro_id" id="pro_id" value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="supplier"  value="<?php echo e($supplier['name']); ?>">
            <input type="hidden" name="product"  value="<?php echo e($product['name']); ?>">
            <input type="hidden" name="pro_type"  value="<?php echo e($parameters['values']['comparison_type']); ?>">
            <input type="hidden" name="type"  value="<?php echo e(Session::get('customer_type')); ?>">
            <input type="hidden" name="postalcode"  value="<?php echo e(Session::get('postal_code')); ?>">
            <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
            <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
            <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
            <?php if($packType=='elecrticity'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            <?php elseif($packType=='gas'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            <?php else: ?>
            <input type="hidden" name="sub_url"  value="<?php echo e($product['subscribe_url']); ?>">
            <?php endif; ?>
            <input type="hidden" name="pr_type" id="pr_type" value="">
            <input type="hidden" name="from" value="pack" >
            <input type='hidden' name='this_url' class="this_url">
            <button id="choose<?php echo e($product['id']); ?>" data-id="<?php echo e($product['id']); ?>" type="submit" class="choose" rel="tooltip" title="<?php echo app('translator')->getFromJson('home.To_Request'); ?>"><?php echo app('translator')->getFromJson('home.To_Request'); ?></button>
            <?php
            $string = trans("home.Choose");
            $replace = ['{X}'];
            $info = [
            'X' => $product['popularity_score'],
            ];
            ?>
            <p class="heart"><i class="fa fa-heart"></i><?php echo e(str_replace($replace, $info, $string)); ?></p>
            </form>
            <?php else: ?>
            <?php  $sel=Session::get('select-pro'); 
            if($packType=='electricity'){
            $sub_url=$product['subscribe_url'];
            }else{
            $sub_url=$product['subscribe_url'];
            }
            $p_id=null;
            ?>
            <?php if(Session::get('elecID')!=null): ?>
            <?php
            $p_sel=Session::get('elecID');
            $p_id=Session::get('elecID');
            ?>
            <?php endif; ?>
            <?php if($sel['id']==$product['id'] && $sel['type']==$packType && (Session::get('elecID') || Session::get('gasID') )): ?>

            <button id="getchoose<?php echo e($product['id']); ?>" data-id="<?php echo e($product['id']); ?>" type="submit"  class="choose getchoose sel<?php echo e($packType); ?>" rel="tooltip" data-supplier="<?php echo e($supplier['name']); ?>" data-product="<?php echo e($product['name']); ?>" data-type='<?php echo e($product['type']); ?>' title="<?php echo app('translator')->getFromJson('home.To_Request'); ?>"><i class='fa fa-check' aria-hidden='true'></i><?php echo app('translator')->getFromJson('home.check_select'); ?></button>
            <?php

            $string = trans("home.Choose");
            $replace = ['{X}'];
            $info = [
            'X' => $product['popularity_score'],
            ];
            ?>

            <p class="heart"><i class="fa fa-heart"></i><?php echo e(str_replace($replace, $info, $string)); ?></p>

            <?php else: ?>
            <?php $egid="";  ?>
            <?php if($packType=='electricity'): ?>

            <?php $egid=$product['id']; ?>
            <?php else: ?>

            <?php  $egid=$product['id']; ?>
            <?php endif; ?>


            <button id="getchoose<?php echo e($product['id']); ?>" data-id="<?php echo e($product['id']); ?>" data-url="<?php echo e($sub_url); ?>" type="submit" class="choose getchoose sel<?php echo e($packType); ?>" data-egid=<?php echo e($egid); ?> data-pid='<?php echo e($product['id']); ?>'  data-url="<?php echo e($sub_url); ?>" rel="tooltip" data-supplier="<?php echo e($supplier['name']); ?>" data-product="<?php echo e($product['name']); ?>" data-type='<?php echo e($product['type']); ?>' title="<?php echo app('translator')->getFromJson('home.To_Request'); ?>"><?php if(Session::get('selected_product')==$product['id']): ?> <i class='fa fa-check' aria-hidden='true'></i> <?php echo app('translator')->getFromJson('home.check_select'); ?>  <?php else: ?> <?php echo app('translator')->getFromJson('home.To_Request'); ?> <?php endif; ?></button>
            <?php

            $string = trans("home.Choose");
            $replace = ['{X}'];
            $info = [
            'X' => $product['popularity_score'],
            ];
            ?>

            <p class="heart"><i class="fa fa-heart"></i><?php echo e(str_replace($replace, $info, $string)); ?></p>

            <?php endif; ?>

            <?php endif; ?>
            </div>
            </div>
            <div class="row more-content more-contenta<?php echo e($product['id']); ?>">
            <div class="col-md-12 more-tab">
            <div class="tab">
                  <button class="tablinks active" onclick="openCity(event, 'pricing<?php echo e($product['id']); ?>')"><?php echo app('translator')->getFromJson('home.PRICING'); ?></button>
                  <button class="tablinks discountact" onclick="openCity(event, 'discount<?php echo e($product['id']); ?>')"><?php echo app('translator')->getFromJson('home.Discounts'); ?></button>
                   <button class="tablinks" onclick="openCity(event, 'history-details<?php echo e($product['id']); ?>')"><?php echo app('translator')->getFromJson('home.history'); ?></button>
                  <button class="tablinks" onclick="openCity(event, 'product-discription<?php echo e($product['id']); ?>')"><?php echo app('translator')->getFromJson('home.Product_Description'); ?></button>
                  <button class="tablinks" onclick="openCity(event, 'contract-details<?php echo e($product['id']); ?>')"><?php echo app('translator')->getFromJson('home.Contract_Details'); ?></button>
                 
            </div>

                    
            <div id="pricing<?php echo e($product['id']); ?>" class="tabcontent" style="display:block">
            <div class="row pricing-elec">

            <?php if($product['type']=='pack'||$product['type']=='electricity'): ?>
            <div <?php if($product['type']=='pack'): ?> class="col-md-4 col-lg-4 col-sm-12 elec-sec" <?php else: ?> class="col-md-6 col-lg-6 col-sm-12 elec-sec"  <?php endif; ?> >
                <div class="row elec-sec-head">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                        <h5><i class="fa fa-bolt"></i> <?php echo app('translator')->getFromJson('home.Electricity'); ?></h5>
                    </div>
                </div>
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-4">
                        <h6><b><?php echo app('translator')->getFromJson('home.Energy_Cost'); ?></b></h6>
                    </div>
                </div>
                <div class="row energy-sec mt-1">
                    <div class="col-md-8 col-8 col-lg-8 energy ">
                        <ul>
                            <li><?php echo app('translator')->getFromJson('home.Fixed_cost'); ?></li>
                            <li><?php echo app('translator')->getFromJson('home.Consumption'); ?></li>
                            <li><?php echo app('translator')->getFromJson('home.Certificates'); ?></li>
                            <?php if($parameters['values']['digital_meter']==1): ?>
                            <li><?php echo app('translator')->getFromJson('home.fixed_fee_inj'); ?></li>
                            <li><?php echo app('translator')->getFromJson('home.injection'); ?></li>
                            <?php endif; ?>
                            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            
                            <?php
                            $activeStarE=false;
                            $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                            $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                            $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;
                            
                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                            $activeStarE=true;
                            
                            }
                            ?>
                            
                            <li><?php echo app('translator')->getFromJson('home.Discounts'); ?> <?php if($activeStarE==true): ?> * <?php endif; ?></li>
                            
                            <?php else: ?>
                            
                            <li><?php echo app('translator')->getFromJson('home.Discounts'); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    
                   
                    <div class="col-md-4 col-4 col-lg-4 energy-price red-color text-right">
                        <ul>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.')); ?></li>
                            <li >&#8364; <?php echo e(number_format($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100,2,',', '.')); ?></li>
                            <li>&#8364;  <?php echo e(number_format($price['breakdown']['electricity']['energy_cost']['certificates']/100,2,',', '.')); ?></li>
                            <?php $inj=0; ?>
                             <?php if($parameters['values']['digital_meter']==1): ?>
                            <li>&#8364;  <?php echo e(number_format($price['breakdown']['electricity']['energy_cost']['fixed_fee_inj']/100,2,',', '.')); ?></li>
                            <li>&#8364;  <?php echo e(number_format($price['breakdown']['electricity']['energy_cost']['injection']/100,2,',', '.')); ?></li>
                            <?php $inj=$price['breakdown']['electricity']['energy_cost']['fixed_fee_inj']+$price['breakdown']['electricity']['energy_cost']['injection']; ?>
                            <?php endif; ?>




                        <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            <?php
                            $fixF=$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                            $cun=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;
                            $cer=$price['breakdown']['electricity']['energy_cost']['certificates']/100;
                            
                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                            $activeStar=true;
                            $promo_discE=$fixF+$cun+$cer;
                            }
                            
                            ?>
                            <li class="red-text">- &#8364; <?php echo e(number_format(($promo_discE),2,',', '.')); ?></li>
                            <?php else: ?>
                            <li class="gray-text">- &#8364; 0,00</li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b><?php echo app('translator')->getFromJson('home.Net_costs'); ?></b></h6>
                    </div>
                </div>
                <div class="row net-sec mt-1">
                    <div class="col-md-8 col-8 col-lg-8 energy">
                        <ul>
                            <li><?php echo app('translator')->getFromJson('home.Distribution'); ?></li>
                            <li><?php echo app('translator')->getFromJson('home.Transport'); ?></li>
                        </ul>
                    </div> 
                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                        <ul>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['electricity']['distribution_and_transport']['distribution']/100,2,',', '.')); ?></li>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['electricity']['distribution_and_transport']['transport']/100,2,',', '.')); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b><?php echo app('translator')->getFromJson('home.Taxing'); ?></b></h6>
                    </div>
                </div>
                <div class="row tax-sec mt-2">
                    <div class="col-md-8 col-8 col-lg-8 energy">
                        <ul>
                            <li><?php echo app('translator')->getFromJson('home.Taxing'); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                        <ul>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['electricity']['taxes']['tax']/100,2,',', '.')); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row total-sec mt-2">
                    <div class="col-md-8 col-8 col-lg-8 energy">
                        <ul>
                            <li><b><?php echo app('translator')->getFromJson('home.Sub_Total'); ?> E</b></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                        <ul>
                            <li><b>&#8364; <?php echo e(number_format($price['breakdown']['electricity']['taxes']['tax']/100+$price['breakdown']['electricity']['distribution_and_transport']['transport']/100+$price['breakdown']['electricity']['distribution_and_transport']['distribution']/100+$price['breakdown']['electricity']['energy_cost']['certificates']/100+$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100+$price['breakdown']['electricity']['energy_cost']['fixed_fee']/100+$inj/100,2,',', '.')); ?></b></li>
                        </ul>
                       
                        
                    </div>
                </div>

            </div>
            <?php endif; ?>
            <!-- end of electricity -->

            <!-- gas-sec -->

            <?php if($product['type']=='pack'||$product['type']=='gas'): ?>
            <div <?php if($product['type']=='pack'): ?> class="col-md-4 col-lg-4 col-sm-12 gas-sec" <?php else: ?> class="col-md-6 col-lg-6 col-sm-12 gas-sec"  <?php endif; ?>>
                <div class="row elec-sec-head">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                        <h5><i class="fa fa-fire"></i> <?php echo app('translator')->getFromJson('home.Gas'); ?></h5>
                    </div>
                </div>
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-4">
                        <h6><b><?php echo app('translator')->getFromJson('home.Energy_Cost'); ?></b></h6>
                    </div>
                </div>
                <div class="row energy-sec mt-1">
                    <div class="col-md-8 col-8 col-lg-8 energy ">
                        <ul>
                            <li><?php echo app('translator')->getFromJson('home.Fixed_cost'); ?></li>
                            <li><?php echo app('translator')->getFromJson('home.Consumption'); ?></li>
                            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                             
                            <?php
                            $activeStarG=false;
                            $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                            $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                            if((($fixF+$cun)-($promo_discG))<=0){
                            
                           
                            $activeStarG=true;
                            }
                            
                            ?>
                            
                            <li><?php echo app('translator')->getFromJson('home.Discounts'); ?> <?php if($activeStarG==true): ?> * <?php endif; ?></li>
                            
                           
                            <?php else: ?>
                             <li><?php echo app('translator')->getFromJson('home.Discounts'); ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="col-md-4 col-4 col-lg-4 energy-price red-color text-right">
                           <ul>
                            <li>&#8364;</i> <?php echo e(number_format($price['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.')); ?></li>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['gas']['energy_cost']['usage']/100,2,',', '.')); ?></li>
                               <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            
                            <?php
                            $fixF=$price['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                            $cun=$price['breakdown']['gas']['energy_cost']['usage']/100;
                            if((($fixF+$cun)-($promo_discG))<=0){
                            
                            $promo_discG=$fixF+$cun;
                            $activeStar=true;
                            }
                            
                            ?>
                            
                            <li class="red-text">- &#8364; <?php if(isset($promo_discG)): ?><?php echo e(number_format(($promo_discG),2,',', '.')); ?> <?php endif; ?></li>
                           
                            <?php else: ?>
                            <li class="gray-text">- &#8364; 0,00</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b><?php echo app('translator')->getFromJson('home.Net_costs'); ?></b></h6>
                    </div>
                </div>
                <div class="row net-sec mt-1">
                    <div class="col-md-8 col-8 col-lg-8 energy">
                        <ul>
                            <li><?php echo app('translator')->getFromJson('home.Distribution'); ?></li>
                            <li><?php echo app('translator')->getFromJson('home.Transport'); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-4 col-lg-4 energy-price text-right">
                        <ul>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['gas']['distribution_and_transport']['distribution']/100,2,',', '.')); ?></li>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['gas']['distribution_and_transport']['transport']/100,2,',', '.')); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b><?php echo app('translator')->getFromJson('home.Taxing'); ?></b></h6>
                    </div>
                </div>
                <div class="row tax-sec mt-2">
                    <div class="col-md-6 col-6 col-lg-6 energy">
                        <ul>
                            <li><?php echo app('translator')->getFromJson('home.Taxing'); ?></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                        <ul>
                            <li>&#8364; <?php echo e(number_format($price['breakdown']['gas']['taxes']['tax']/100,2,',', '.')); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="row total-sec mt-2">
                    <div class="col-md-6 col-6 col-lg-6 energy">
                        <ul>
                            <li><b><?php echo app('translator')->getFromJson('home.Sub_Total'); ?> G</b></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-6 col-lg-6 energy-price text-right">
                        <ul>
                            <li><b>&#8364; <?php echo e(number_format(($price['breakdown']['gas']['taxes']['tax']+$price['breakdown']['gas']['distribution_and_transport']['transport']+$price['breakdown']['gas']['distribution_and_transport']['distribution']+$price['breakdown']['gas']['energy_cost']['usage']+$price['breakdown']['gas']['energy_cost']['fixed_fee'])/100,2,',', '.')); ?></b></li>
                        </ul>
                    </div>
                </div>
            </div>                                            
            <?php endif; ?>

            <div <?php if($product['type']=='pack'): ?> class="col-md-4 col-lg-4 col-sm-12 total-sec" <?php else: ?> class="col-md-6 col-lg-6 col-sm-12 total-sec" <?php endif; ?> >
                <div class="row elec-sec-head">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-3 ">
                        <h5><?php echo app('translator')->getFromJson('home.Total'); ?></h5>
                    </div>
                </div>
                
                <?php
                        
                        if(isset($ele_disc)){
                        $eleD=$ele_disc;
                        }else{
                        $eleD=0;
                        
                        }
                        if(isset($gas_disc)){
                        $gasD=$gas_disc;
                        }else{
                        $gasD=0;
                        }
                        
                        if(isset($all_disc)){
                        $all_disc=$all_disc;
                        }else{
                        $all_disc=0;
                        }
                        
                        
                ?>
                        <?php if($product['type']=="pack"): ?>  
                                <?php $all_discTotal=$all_disc;  ?>
                                <?php else: ?>
                                
                               <?php $all_discTotal=$all_disc; ?>
                                
                                <?php endif; ?> 
                       
                <div class="total-bg mt-4">
                    
                    <!--total section-->
                    
                     <div class="total_sec_last">
                        
                            <div class="left_total">
                                <?php if($p_type=="pack" && $packType!="electricity" && $packType!="gas"): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> + <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php elseif($p_type=='gas' || $packType=="gas"): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php elseif($p_type=='electricity' || $packType=="electricity"): ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php else: ?> <?php endif; ?>
                            </div>
                            <div class="right_total">
                              &#8364; <?php echo e(number_format($price['totals']['year']['excl_promo']/100,2,',', '.')); ?>

                            </div>
                            
                            <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                                
                            <div class="left_total">
                                <?php if(Session::get('locale')=='nl'): ?>
                                Welkomstkortingen
                                <?php else: ?>
                                Réductions de bienvenue
                                <?php endif; ?>
                            </div>
                            <div class="right_total red-text">
                              &#8364; -<?php echo e(number_format(($promo_discG+$promo_discE+$promo_discAll),2,',', '.')); ?>

                            </div>
                            <?php if($sl_disc>0): ?>
                            <div class="left_total">
                                Beperkte dienstverlening
                            </div>
                            <div class="right_total red-text">
                               &#8364; -<?php echo e(number_format($sl_disc,2,',', '.')); ?>

                            </div>
                            <?php endif; ?>
                            <?php if($loyalty_disc>0): ?>
                            <div class="left_total">
                                Getrouwheidskorting
                            </div>
                            <div class="right_total red-text">
                              &#8364;  -<?php echo e(number_format($loyalty_disc,2,',', '.')); ?>

                            </div>
                            <?php endif; ?>
                            <div class="left_total">
                                
                            </div>
                            <div class="right_total">
                                
                              &#8364;  <?php echo e(number_format(($price['totals']['year']['excl_promo']/100)-($promo_discG+$promo_discE+$promo_discAll+$sl_disc+$loyalty_disc),2,',', '.')); ?>

                            </div>
                            
                            
                            <?php else: ?>
                            
                            <div class="left_total">
                               
                            </div>
                            <div class="right_total">
                              &#8364;  <?php echo e(number_format(($price['totals']['year']['excl_promo']/100),2,',', '.')); ?>

                            </div>
                            
                            
                             <?php endif; ?>
                        </div>
                        
                  
                </div> 
                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b><?php echo app('translator')->getFromJson('home.Unit_Prices'); ?></b></h6>
                    </div>
                </div>
                <div class="row net-sec net-sec-1 mt-1">
                    <div class="col-md-6 col-8 energy">
                        <ul>
                           
                           <?php if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])): ?>  <li><?php echo app('translator')->getFromJson('home.Electricity'); ?></li> <?php endif; ?>
                           <?php if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])): ?>  <li><?php echo app('translator')->getFromJson('home.Gas'); ?></li> <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-md-6 col-4 energy-price text-right">
                        <ul>
                            <?php
                            $totalElec=$parameters['values']['usage_single']+$parameters['values']['usage_day']+$parameters['values']['usage_night']+$parameters['values']['usage_excl_night'];
                            $totalgas=$parameters['values']['usage_gas'];
                            
                            ?>
                            
                         <?php if($activeStar==true): ?>
                         
                         
                         <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                            

                             <?php if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> <li>

                            <?php if($totalElec>0): ?>
                           <?php echo e(number_format(((($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+$inj/100)/$totalElec)*100,2,',', '.')); ?>




                           <?php else: ?>
                           0,00
                           <?php endif; ?>
                            &#8364;c/kWh </li><?php endif; ?>
                            <?php if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])): ?> <li>

                            <?php if($totalgas>0): ?>    
                            <?php echo e(number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')); ?> 

                            <?php else: ?>
                            0,00
                            <?php endif; ?>
                            &#8364;c/kWh </li> <?php endif; ?>


                            
                        <?php else: ?>
                           <?php if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> <li><?php echo e(number_format(((($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+($inj/100))/$totalElec)*100,2,',', '.')); ?> &#8364;c/kWh </li><?php endif; ?>
                            <?php if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])): ?> <li><?php echo e(number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')); ?> &#8364;c/kWh </li> <?php endif; ?>
                        
                        <?php endif; ?>
                         
                         
                         <?php else: ?>
                            
                          <?php if((Session::get('promo')=='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                             
                            <?php if($totalElec>0): ?>
                            <?php if($parameters['values']['comparison_type']=='pack' || $parameters['values']['comparison_type']=='electricity' ): ?>
                           <?php  $uPrice=(($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+($inj/100)-($promo_discE))/$totalElec;   ?>
                           <?php endif; ?>
                            <?php else: ?>
                           <?php $uPrice=0; ?>
                            <?php endif; ?>
                            
                            <?php if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> <li><?php echo e(number_format(($uPrice)*100,2,',', '.')); ?> &#8364;c/kWh </li><?php endif; ?>
                            <?php if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])): ?> <li><?php if($totalgas>0): ?> <?php echo e(number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')); ?> <?php else: ?> <?php echo e(number_format(0*100,2,',', '.')); ?>  <?php endif; ?> &#8364;c/kWh </li> <?php endif; ?>
                        <?php else: ?>
                            <?php if($totalElec>0): ?>
                            <?php if($parameters['values']['comparison_type']=='pack' || $parameters['values']['comparison_type']=='electricity' ): ?>
                           <?php  $uPrice=(($price['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100)+($price['breakdown']['electricity']['energy_cost']['certificates']/100)+$inj/100)/$totalElec;   ?>
                           <?php endif; ?>
                            <?php else: ?>
                           <?php $uPrice=0; ?>
                            <?php endif; ?>
                        
                           <?php if(isset($price['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> <li><?php echo e(number_format(($uPrice)*100,2,',', '.')); ?> &#8364;c/kWh </li><?php endif; ?>
                            <?php if(isset($price['breakdown']['gas']['unit_cost']['energy_cost'])): ?> <li><?php if($totalgas>0): ?> <?php echo e(number_format(((($price['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($price['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')); ?> <?php else: ?> <?php echo e(number_format(0*100,2,',', '.')); ?>  <?php endif; ?> &#8364;c/kWh </li> <?php endif; ?>
                        
                        <?php endif; ?>
                        
                        <?php endif; ?>
                        </ul>


                    </div>



                </div>

                <div class="row elec-sec-1">
                    <div class="col-md-12 col-lg-12 col-sm-12 mt-2">
                        <h6><b><?php echo app('translator')->getFromJson('home.Documents'); ?></b></h6>
                    </div>

                    <div class=" net-sec net-sec-1 mt-1">
                    <div class="col-md-12 col-12 energy">
                        <ul>
                        <?php if($product['type']=='pack'): ?> 
                            <li><a href="<?php echo e($product['underlying_products']['electricity']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Electricity'); ?></a></li>
                            <li><a href="<?php echo e($product['underlying_products']['gas']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Gas'); ?></a></li>
                            <?php if($parameters['values']['digital_meter']==1): ?>
                            <li><a href="<?php echo e($product['underlying_products']['electricity']['terms_url_dynamic_inj']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.tariff_card_inj'); ?></a></li>
                            <?php endif; ?>
                            
                        <?php elseif($product['type']=='electricity'): ?>
                            <li><a href="<?php echo e($product['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Electricity'); ?></a></li>
                             <?php if($parameters['values']['digital_meter']==1): ?>
                             <?php if($product['type']=='pack'): ?> 
                            <li><a href="<?php echo e($product['underlying_products']['electricity']['terms_url_dynamic_inj']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.tariff_card_inj'); ?></a></li>
                            <?php elseif($product['type']=='electricity'): ?>

                            <li><a href="<?php echo e($product['terms_url_dynamic_inj']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.tariff_card_inj'); ?></a></li>

                            <?php endif; ?>
                            <?php endif; ?>
                            
                        <?php elseif($product['type']=='gas'): ?>
                            <li><a href="<?php echo e($product['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Gas'); ?></a></li>
                          
                        <?php else: ?>
                            
                        <?php endif; ?>
                    </ul>
                    </div>
                </div>

                   
                    
                </div>


                <div class="row">
                    <div class="col-md-12 mt-4 text-right" >
            <form action="<?php echo e(url('bevestiging')); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
            <input type="hidden" name="pro_id"  value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="supplier"  value="<?php echo e($supplier['name']); ?>">
            <input type="hidden" name="product"  value="<?php echo e($product['name']); ?>">
            <input type="hidden" name="pro_type"  value="<?php echo e($parameters['values']['comparison_type']); ?>">
            <input type="hidden" name="type"  value="<?php echo e(Session::get('customer_type')); ?>">
            <input type="hidden" name="postalcode"  value="<?php echo e(Session::get('postal_code')); ?>">
            <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
            <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
            <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
            <?php if($packType=='elecrticity'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            <?php elseif($packType=='gas'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            <?php else: ?>
            <input type="hidden" name="sub_url"  value="<?php echo e($product['subscribe_url']); ?>">
            <?php endif; ?>
            <input type="hidden" name="from" value="pack" >
            <input type="hidden" name="pr_type" id="pr_type" value="">
            <button id="choose<?php echo e($product['id']); ?>" data-id="<?php echo e($product['id']); ?>" type="submit" class="choose1"><?php echo app('translator')->getFromJson('home.To_Request'); ?></button>
                          </form>
                    </div>
                </div>
            </div>
            </div>
            <div class="row section-last mt-4">
            <div class="col-md-8">

               
            <?php
            Session::put('p_type',$p_type);
            $string = trans("home.prices_text");
            $replace = ['{X5}','{X2}','{X3}'];
            $string1 = trans("home.prices_text_continuation");
            $replace1 = ['{X6}'];

            $time=strtotime($price['validity_period']['end']);
            $date = new DateTime('now');
            $modifiedDate=$date->modify('last day of this month');
            $month=$date->format('d/m/Y');

            $year=date("Y",$time);
            $x1=trans('home.Electricity');
            $customer_type=Session::get('customer_type');
            $x2="";
            if($p_type=='pack' || $p_type=='gas' || $p_type=='electricity' ){
            if($month=='january'){
            $x2=trans("home.1");
            }
            if($month=='february'){
            $x2=trans("home.2");
            }
            if($month=='march'){
            $x2=trans("home.3");
            }
            if($month=='april'){
            $x2=trans("home.4");
            }
            if($month=='may'){
            $x2=trans("home.5");
            }
            if($month=='june'){
            $x2=trans("home.6");
            }
            if($month=='july'){
            $x2=trans("home.7");
            }
            if($month=='august'){
            $x2=trans("home.8");
            }
            if($month=='september'){
            $x2=trans("home.9");
            }
            if($month=='october'){
            $x2=trans("home.10");
            }
            if($month=='november'){
            $x2=trans("home.11");
            }
            if($month=='december'){
            $x2=trans("home.12");
            }
            }

            if($customer_type=='residential'){
            $x5=trans('home.x5_res');
            $x6=trans('home.x6_res');
            }
            if($customer_type=='professional'){
            $x5=trans('home.x5_pro');
            $x6=trans('home.x6_pro');
            }
            $info = [
            'X5' => $x5,
            'X2'  => $x2,
            'X3'   => $month,

            ];
            $info1 = [
            'X6'      => $x6,
            ];


            ?>
                
                <p><?php echo str_replace($replace, $info, $string); ?> <a href="" class="disctab-active" onclick="openCity(event, 'discount<?php echo e($product['id']); ?>')"><?php echo e(ucfirst(trans('home.Discounts'))); ?></a> <?php echo str_replace($replace1, $info1, $string1); ?></p>

             <?php if((Session::get('promo')!='true' && $parameters['values']['promo_discount']['promo']=='promo') || (Session::get('domi')!='true' && $parameters['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')!='true' && $parameters['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                 <?php if(Session::get('locale')=='nl'): ?><button class="disc-activate">Op dit tarief zijn kortingen beschikbaar. Klik hier om ze te activeren.</button><?php else: ?> <button class="disc-activate">Ce tarif contient des réductions de bienvenu. Clicquez ici pour les activer.</button> <?php endif; ?>

            <?php endif; ?>


            <br/>
            <?php if($activeStar==true): ?>

            <p>* De kortingen kunnen nooit hoger zijn dan de vaste vergoeding + de verbruikskosten. Daarom is de waarde hier lager dan in het overzicht van de kortingen</p>  

            <?php endif; ?>

            </div>
            </div>
            </div>
            <div id="discount<?php echo e($product['id']); ?>" class="tabcontent">
            <div class="row discount">
            <div class="col-md-12 mt-4">
                <?php $ab=array(); 
                ?>
                <?php $__currentLoopData = $price['breakdown']['discounts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php 
                array_push($ab,$discounts['validity_period']['end']);
                ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
               
                <?php

                $date_arr=$ab;

                usort($date_arr, function($a, $b) {
                $dateTimestamp1 = strtotime($a);
                $dateTimestamp2 = strtotime($b);

                return $dateTimestamp1 < $dateTimestamp2 ? -1: 1;
                });

                ?>
                
                <?php if(isset($endDate)): ?> <?php echo e($endDate); ?> <?php endif; ?>

                <?php                                               
                $string = trans("home.switch_to");
                $replace = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];
                $info = [
                'SUPPLIER' => $supplier['name'],
                'PRODUCT' => $product['name'],
                'VALIDITYDATE'=>Carbon\Carbon::parse(current($date_arr))->format('d/m/Y'),

                ];

                ?>
                <?php if($per1!=0): ?>   
                <p><?php echo str_replace($replace, $info, $string); ?></p>
                <?php else: ?>
                <p><?php echo app('translator')->getFromJson('home.Currently_no_discount'); ?></p>
                <?php endif; ?>
                <ul class="nav nav-tabs" id="myTab"  role="tablist">

                    <?php  $disc_total="0"; $checkPlus=0; $i="0"; 
                    
                    
                    if($discPromo==true){
                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredE=$filtered->all();
                    }else{
                    
                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredE=$filtered->all();
                    
                    }
                    
                     if($discPromo==true){
                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredG=$filtered->all();
                    
                    }else{
                    
                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredG=$filtered->all();
                    
                    
                    }
                    
                    if($discPromo==true){
                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredAll=$filtered->all();
                    
                    }else{
                    
                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredAll=$filtered->all();
                    
                    
                    }
                    
                    if($discService==true){
                    
                     $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['discount_type']=='servicelevel'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredS=$filtered->all();
                    }else{
                    
                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['discount_type']=='unknown'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredS=$filtered->all();
                    
                    
                    }
                    
                    if($discloyalty==true){
                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['discount_type']=='loyalty'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredL=$filtered->all();
                    }else{
                    
                    $filtered = collect($price['breakdown']['discounts'])->filter(function ($value, $key) {
                    $s=0;
                    if($value['parameters']['discount_type']=='unknown'){
                        $s++;
                        }
                        return $s;
                        });

                    $filteredL=$filtered->all();
                    
                    
                    }
                    
                    ?>
                    
                    <?php $checkPlus=count($filteredE)+count($filteredG)+count($filteredS)+count($filteredL)+count($filteredAll); ?>
                 
                    
                <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php
                    $disc_total=$disc_total+$discounts['amount']; $i++; ?>

                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?><?php echo e($product['id']); ?>" role="tab" aria-controls="home" aria-selected="true">
                    <span class="main-sec">
                    <span class="main-sec-1">
                    <h5><b> 
                    <?php if($discounts['parameters']['unit']=='euro'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>

                    <?php if($discounts['parameters']['unit']=='eurocent'): ?> 
                    &#8364; <?php echo e(number_format($discounts['amount'],2,',', '.')); ?>

                    <?php endif; ?>
                    <?php $priceTot=$price['breakdown']['electricity']['energy_cost']['single']/100+$price['breakdown']['electricity']['energy_cost']['day']/100+$price['breakdown']['electricity']['energy_cost']['night']/100+$price['breakdown']['electricity']['energy_cost']['excl_night']/100;  ?>

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
                    
                    
                <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php  $disc_total=$disc_total+$discounts['amount']; $i++;  ?>
                    <li class="nav-item">
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?><?php echo e($product['id']); ?>" role="tab" aria-controls="home" aria-selected="true">
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
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?><?php echo e($product['id']); ?>" role="tab" aria-controls="home" aria-selected="true">
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
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?><?php echo e($product['id']); ?>" role="tab" aria-controls="home" aria-selected="true">
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
                    <a class="nav-link <?php if($i==1): ?> active <?php endif; ?> " id="home-tab<?php echo e($discounts['_id']); ?>" data-toggle="tab" href="#home<?php echo e($discounts['_id']); ?><?php echo e($product['id']); ?>" role="tab" aria-controls="home" aria-selected="true">
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
                                    <p class="amt dis-amt"><?php echo app('translator')->getFromJson('home.Total'); ?> <?php echo app('translator')->getFromJson('home.Discounts'); ?></p>
                                    <p class="mode amt">
                                        <?php if($parameters['values']['comparison_type']=="electricity"): ?><i class="fa fa-bolt"></i></p><?php endif; ?>
                                        <?php if($parameters['values']['comparison_type']=="gas"): ?><i class="fa fa-fire"></i></p><?php endif; ?>
                                        <?php if($parameters['values']['comparison_type']=="pack"): ?><i class="fa fa-bolt"></i> + <i class="fa fa-fire"></i></p><?php endif; ?>
                                </span>
                            </span>
                        </div>
                    </li>
            <?php endif; ?>

                </ul>

                <div class="tab-content" id="myTabContent">
                    <?php $disc="0";  ?>
                    <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?><?php echo e($product['id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?><?php echo e($product['id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?><?php echo e($product['id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?><?php echo e($product['id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $disc=$disc+1;  ?>

                    <div class="tab-pane fade show <?php if($disc=='1'): ?> active <?php endif; ?>" id="home<?php echo e($discountss['_id']); ?><?php echo e($product['id']); ?>" role="tabpanel" aria-labelledby="home-tab">
                         <p><b><?php echo $discountss['name']; ?></b><br><?php echo $discountss['description']; ?></p>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                   


                </div>
            </div>
            </div>

            <div class="row dis-btn mt-3">
            <div class="col-md-12 text-right">

            <form action="<?php echo e(url('bevestiging')); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
            <input type="hidden" name="pro_id"  value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="supplier"  value="<?php echo e($supplier['name']); ?>">
            <input type="hidden" name="product"  value="<?php echo e($product['name']); ?>">
            <input type="hidden" name="pro_type"  value="<?php echo e($parameters['values']['comparison_type']); ?>">
            <input type="hidden" name="type"  value="<?php echo e($customer_type); ?>">
            <input type="hidden" name="postalcode"  value="<?php echo e(Session::get('postal_code')); ?>">
            <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
            <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
            <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
            <?php if($packType=='elecrticity'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            <?php elseif($packType=='gas'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            <?php else: ?>
            <input type="hidden" name="sub_url"  value="<?php echo e($product['subscribe_url']); ?>">
            <?php endif; ?>
            <input type="hidden" name="from" value="pack" >
            <input type="hidden" name="pr_type" id="pr_type" value="">
            <button type="submit" class="choose1"><?php echo app('translator')->getFromJson('home.To_Request'); ?></button>
            </form>
               
            </div>
            </div>
            </div>     





            <div id="product-discription<?php echo e($product['id']); ?>" class="tabcontent">
            <div class="row product-tab mt-4 product-desc-sec">
            <div class="col-md-12">
                
                <h5><?php echo e($supplier['name']); ?> - <?php echo e($product['name']); ?>:</h5>
                
                <?php 
                $desc=explode(" - ",$product['description']);
                ?>
            <ul class="mt-2">
            <?php $__currentLoopData = $desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($descs): ?><li class="product-desc-i"><?php echo $descs; ?></li><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>


            </div>

            </div>
            <div class="row product-tab-btn">
            <div class="col-md-12 text-right">
            <form action="<?php echo e(url('bevestiging')); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
            <input type="hidden" name="pro_id"  value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="supplier"  value="<?php echo e($supplier['name']); ?>">
            <input type="hidden" name="product"  value="<?php echo e($product['name']); ?>">
            <input type="hidden" name="pro_type"  value="<?php echo e($parameters['values']['comparison_type']); ?>">
            <input type="hidden" name="type"  value="<?php echo e($customer_type); ?>">
            <input type="hidden" name="postalcode"  value="<?php echo e(Session::get('postal_code')); ?>">
            <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
            <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
            <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
            <?php if($packType=='elecrticity'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            <?php elseif($packType=='gas'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            <?php else: ?>
            <input type="hidden" name="sub_url"  value="<?php echo e($product['subscribe_url']); ?>">
            <?php endif; ?>
            <input type="hidden" name="from" value="pack" >
            <input type="hidden" name="pr_type" id="pr_type" value="">
            <button type="submit" class="choose1"><?php echo app('translator')->getFromJson('home.To_Request'); ?></button>
            </form>
            </div>
            </div>
            </div>




            <div id="contract-details<?php echo e($product['id']); ?>" class="tabcontent">
            <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 hidden-sec">
                <h4><?php echo app('translator')->getFromJson('home.Contract_Details'); ?></h4>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="duration-sec">
                    <h5><?php echo app('translator')->getFromJson('home.Duration'); ?></h5>
                    <p class="year"><?php echo e($product['contract_duration']); ?> <?php echo app('translator')->getFromJson('home.Year'); ?></p>
                    <p class="dur-p">
                        <?php echo app('translator')->getFromJson('home.After_the_first'); ?>
                        <?php if(Session::get('locale')=='fr'): ?>
                            <a class="more-info" href="https://www.veriftarif.be/faq-foire-aux-questions/les-particuliers-et-petits-consommateurs-professionnels-ne-paieront-plus-de-frais-de-resiliation-de-leurs-contrats-d-energie" target="_blank" ><?php echo app('translator')->getFromJson('home.More_info'); ?></a>
                        <?php else: ?>
                            <a class="more-info" href="https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s" target="_blank"><?php echo app('translator')->getFromJson('home.More_info'); ?></a>
                        <?php endif; ?>
                    </p>
            <!--                                                    <a class="more-info" href="#"><?php echo app('translator')->getFromJson('home.More_info'); ?></a>-->
                </div>
                <div class="price-type">
                    <div class="row ">
                        <div class="col-md-12">
                            <h5><?php echo app('translator')->getFromJson('home.Price_type'); ?></h5>
                        </div>
                    </div>
                <div class="pri-type-sec">
                    <div class="pri-type-1 pri-type">
                      <div class="pri-type-left-1 pri-type-left">
                          <?php if($product['type']=='pack'): ?>
                          <div><i class="fa fa-bolt"></i>  <?php echo app('translator')->getFromJson('home.Electricity'); ?></div>
                          <?php endif; ?>
                      </div>
                      <div class="pri-type-right-1 pri-type-right">
                          <?php if($product['type']=='pack'): ?>
                            <div><?php if($product['underlying_products']['electricity']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?></div>
                          <?php endif; ?>
                      </div>
                  </div>
                   <?php if($product['type']=='electricity' || $product['type']=='pack'): ?>
                  <div class="pri-type-2 pri-type">
                      <div class="pri-type-left-2 pri-type-left">
                          <div><i class="fa fa-plug"></i> <?php echo app('translator')->getFromJson('home.Source_Power'); ?></div>
                      </div>
                      <div class="pri-type-right-2 pri-type-right">
                          <div class=image-sec-pri><?php if($product['origin']=='BE' && $product['green_percentage'] > 0 ): ?><img src="<?php echo e(url('images/bel-flag.png')); ?>"><?php endif; ?> <?php echo e($product['green_percentage']); ?>% <?php if($product['origin'] !='BE'): ?> <?php echo app('translator')->getFromJson('home.green'); ?> <?php endif; ?> <?php if($product['green_percentage']>0 && $product['origin']=='BE'): ?> <?php echo app('translator')->getFromJson('home.green_from_Belgium'); ?> <?php endif; ?></div>
                      </div>
                  </div>
                  <?php endif; ?>
                  <div class="pri-type-3 pri-type">
                      <div class="pri-type-left-3 pri-type-left">
                          <?php if($product['type']=='pack'): ?>
                          <!--<li><i class="fa fa-fire"></i> <?php echo app('translator')->getFromJson('home.Gas'); ?></li>-->
                          <div><i class="fa fa-fire"></i> <?php echo app('translator')->getFromJson('home.pricetab_gas'); ?></div>
                          <?php endif; ?>
                      </div>
                      <div class="pri-type-right-3 pri-type-right">
                          <?php if($product['type']=='pack'): ?>
                          <div><?php if($product['underlying_products']['gas']['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?></div>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="pri-type-4 pri-type">
                      <div class="pri-type-left-4 pri-type-left">
                          <?php if($product['type']=='electricity'): ?>
                              <div><i class="fa fa-bolt"></i> <?php echo app('translator')->getFromJson('home.Electricity'); ?> </div>
                          <?php endif; ?>
                      </div>
                      <div class="pri-type-right-4 pri-type-right">
                          <?php if($product['type']=='electricity'): ?>
                              <div><?php if($product['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?></div>
                          <?php endif; ?>
                      </div>
                  </div>
                  <div class="pri-type-5 pri-type">
                      <div class="pri-type-left-5 pri-type-left">
                          <?php if($product['type']=='gas'): ?>
                              <div><i class="fa fa-fire"></i> Aardgas</div>
                          <?php endif; ?>
                      </div>
                      <div class="pri-type-right-5 pri-type-right">
                          <?php if($product['type']=='gas'): ?>
                              <div><?php if($product['pricing_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php endif; ?></div>
                          <?php endif; ?>
                      </div>
                  </div>
                </div>
                    
                </div>
                <div class="contract-for">
                    <h5><?php echo app('translator')->getFromJson('home.Who_is_this'); ?></h5>
                    <?php if(Session::get('customer_type') == 'residential'): ?> 
                    
                        <?php                                               
                            if(Session::get('locale')=='fr'){

                            $string=$feature[2]['FR_description'];

                            }else{

                            $string=$feature[2]['NL_description'];


                            }

                            $replace = ['{duration}'];

                            $duration=$price['validity_period']['end'];

                            $info = [
                            'duration' => $duration,

                            ];

                        ?>

                        <p><?php echo app('translator')->getFromJson('home.This_contract_residential_users_only'); ?> <?php echo e(strtolower(trans('home.residential'))); ?> </p>
                        <?php if($parameters['values']['digital_meter']==1): ?>
                        <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[9]['FR_description']); ?> <?php else: ?><?php echo e($feature[9]['NL_description']); ?> <?php endif; ?></p>

                        <?php endif; ?>
                        <p><?php echo e($product['tariff_description']); ?></p>
                    <?php else: ?>
                        <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[3]['FR_description']); ?> <?php else: ?><?php echo e($feature[3]['NL_description']); ?> <?php endif; ?></p>
                    <?php endif; ?>


                   
                    <div class="contract-style">
                    <?php if($product['customer_condition']=='EV' ): ?> 
                        <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[5]['FR_description']); ?> <?php else: ?><?php echo e($feature[5]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($product['customer_condition']=='PV' ): ?>
                        <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[6]['FR_description']); ?> <?php else: ?><?php echo e($feature[6]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($product['customer_condition']=='CH' ): ?>
                        <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[7]['FR_description']); ?> <?php else: ?><?php echo e($feature[7]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($product['customer_condition']=='COMP' ): ?>
                        <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[8]['FR_description']); ?> <?php else: ?><?php echo e($feature[8]['NL_description']); ?> <?php endif; ?></p>
                    <?php else: ?>
                        <p></p>
                    <?php endif; ?> 

                    
                    
                    </div>
                    
                </div>
                <div class="documents">
                    <h5><?php echo app('translator')->getFromJson('home.Documents'); ?></h5>
                    <ul>

                        <?php if($product['type']=='pack'): ?> 
                            <li><a href="<?php echo e($product['underlying_products']['electricity']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Electricity'); ?></a></li>
                            <li><a href="<?php echo e($product['underlying_products']['gas']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Gas'); ?></a></li>
                            <li><a href="<?php echo e($product['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                        <?php elseif($product['type']=='electricity'): ?>
                            <li><a href="<?php echo e($product['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Electricity'); ?></a></li>
                            <li><a href="<?php echo e($product['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                        <?php elseif($product['type']=='gas'): ?>
                            <li><a href="<?php echo e($product['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Gas'); ?></a></li>
                            <li><a href="<?php echo e($product['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo e($product['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6">
                <div class="particular">
                    <h5><?php echo app('translator')->getFromJson('home.Particular_Conditions'); ?></h5>
                   <?php if($product['ff_pro_rata'] == 'Y'): ?>
                    
                    <ul class="parti">
                        <li class="info"><i class="fas fa-info-circle"></i></li>
                        
                        <?php if(Session::get('locale')=='fr'): ?>
                        <li> <?php echo e($feature[0]['FR_description']); ?> </li>
                        <?php else: ?> 
                        <li> <?php echo e($feature[0]['NL_description']); ?> </li>
                        <?php endif; ?>
                        
                    </ul>
                    
                     <?php else: ?>
                     
                     <ul class="parti">
                        <li class="info"><i class="fas fa-info-circle"></i></li>
                       
                        <?php if(Session::get('locale')=='fr'): ?>
                        <li> <?php echo e($feature[1]['FR_description']); ?> </li>
                        <?php else: ?> 
                        <li> <?php echo e($feature[1]['NL_description']); ?> </li>
                        <?php endif; ?>
                        
                    </ul>
                    
                    <?php endif; ?>
                  
                    <p>
                        <?php if(Session::get('locale')=='fr'): ?>
                            En principe, une redevance fixe vous sera chargée pro rata la durée de votre fourniture. Par exemple: si vous restez que 6 mois, la redevance fixe sera chargée pour la moitié.</br>

            Certain fournisseurs appliquent une autre règle pour la première année de fourniture.</br>
            En général il est râre que cela vaut la peine de changer de fournisseur en moins d’un an, mais si vous le souhaitez, tenez bien compte de cette règle. Plus d’info sur notre

                            <a class="parti-a" href="https://www.veriftarif.be/energie/faq" target="_blank">FAQ</a>
                        <?php else: ?> 
                            In principe wordt een vaste vergoeding pro rata de duurtijd van je leveringscontract aangerekend. Bijvoorbeeld: als je na 6 maanden vertrekt, wordt de vaste vergoeding voor de helft aangerekend.</br>

            Sommige leveranciers passen een andere regel toe voor het eerste leveringsjaar.</br> 
            In de praktijk is het zelden zinvol om binnen het eerste jaar opnieuw te veranderen, maar als de vaste vergoeding volledig wordt aangerekend hou je daar best rekening mee. Meer info in onze

                            <a class="parti-a" href="https://www.tariefchecker.be/energie/faq" target="_blank">FAQ</a>
                        <?php endif; ?>
                    
                    </p>
                    
                </div>
                <div class="service-limitations">
                    <h5><?php echo app('translator')->getFromJson('home.Service_limitations'); ?></h5>
                    <?php if($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'free'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[0]['FR_description']); ?> <?php else: ?><?php echo e($service[0]['NL_description']); ?><?php endif; ?> </p>
                    <?php elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'free'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[1]['FR_description']); ?> <?php else: ?><?php echo e($service[1]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($product['service_level_payment'] == 'prepaid'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[2]['FR_description']); ?> <?php else: ?><?php echo e($service[2]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'free'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[3]['FR_description']); ?> <?php else: ?><?php echo e($service[3]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'free'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[4]['FR_description']); ?> <?php else: ?><?php echo e($service[4]['NL_description']); ?><?php endif; ?></p>
                    <?php elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'online'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[5]['FR_description']); ?> <?php else: ?><?php echo e($service[5]['NL_description']); ?><?php endif; ?></p>
                    <?php elseif($product['service_level_payment'] == 'domi' && $product['service_level_invoicing'] == 'free' && $product['service_level_contact'] == 'online'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[6]['FR_description']); ?> <?php else: ?><?php echo e($service[6]['NL_description']); ?><?php endif; ?></p>
                    <?php elseif($product['service_level_payment'] == 'free' && $product['service_level_invoicing'] == 'email' && $product['service_level_contact'] == 'online'): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[7]['FR_description']); ?> <?php else: ?><?php echo e($service[7]['NL_description']); ?><?php endif; ?></p>
                    <?php else: ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[8]['FR_description']); ?> <?php else: ?><?php echo e($service[8]['NL_description']); ?><?php endif; ?></p>
                    

                    <?php endif; ?>
                </div>
                
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="request float-right">
                    
               <form action="<?php echo e(url('bevestiging')); ?>" method="get">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
            <input type="hidden" name="pro_id"  value="<?php echo e($product['id']); ?>">
            <input type="hidden" name="supplier"  value="<?php echo e($supplier['name']); ?>">
            <input type="hidden" name="product"  value="<?php echo e($product['name']); ?>">
            <input type="hidden" name="pro_type"  value="<?php echo e($parameters['values']['comparison_type']); ?>">
            <input type="hidden" name="type"  value="<?php echo e($customer_type); ?>">
            <input type="hidden" name="postalcode"  value="<?php echo e(Session::get('postal_code')); ?>">
            <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
            <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
            <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
            <?php if($packType=='elecrticity'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['electricity']['subscribe_url']">
            <?php elseif($packType=='gas'): ?>
            <input type="hidden" name="sub_url"  value="$product['underlying_products']['gas']['subscribe_url']">
            <?php else: ?>
            <input type="hidden" name="sub_url"  value="<?php echo e($product['subscribe_url']); ?>">
            <?php endif; ?>
            <input type="hidden" name="from" value="pack" >
            <input type="hidden" name="pr_type" id="pr_type" value="">
            <button type="submit" class="choose1"><?php echo app('translator')->getFromJson('home.To_Request'); ?></button>
                          </form>
                </div>
            </div>
            </div>
            </div>
            <div id="history-details<?php echo e($product['id']); ?>" class="tabcontent">
                  <input type="hidden" class="scenario<?php echo e($product['id']); ?>">

                  <div class="a1<?php echo e($product['id']); ?>" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                  <p>Het antwoord: <b>JA</b></p>
                  <p>De energiemarkten zijn eerder duurder geworden, en je huidige tarieven zijn scherper dan de beste aanbiedingen op dit moment. Er is dus geen actie vereist</p>
                  <p>Over drie maanden volgt je volgende check. </p>
                  </div>

                  <div class="a2<?php echo e($product['id']); ?>" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                  <p>Het antwoord: <b>JA</b></p>
                  <p>De energiemarkten zijn ietsje goedkoper geworden, maar als je nu overstapt verlies je de kortingen op je huidige contract, waardoor je uiteindelijk toch duurder zou uitkomen. Er is dus geen actie vereist.</p>
                  <p>Over drie maanden volgt je volgende check. </p>
                  </div>

                  <div class="b1<?php echo e($product['id']); ?>" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                  <p>Het antwoord: <b>JA</b></p>
                  <p>De scherpste aanbieding is goedkoper geworden dan je huidige tarieven, en aangezien de kortingen van je huidige contract pro rata zijn kan je overstappen zonder die kortingen te verliezen.</p>

                  <p>Het goedkoopste tarief op dit ogenblik is [PRODUCT NAME] van [SUPPLIER NAME] en is [IMPACT TOTAL] goedkoper dan je huidige tarieven. Klik hier [LINK] als je wil aangaan op het nieuwe aanbod. Het is geldig tot [VALIDITY].</p>
                  <p>Link niet klikbaar, kopieer de volgende link in je browser: [SIGNUP URL].</p>
                  <p>Als je opnieuw overstapt worden je data in onze systemen voor de kwartaalcheck gereset, en anders gaan we gewoon door met je huidige voor de volgende kwartaalcheck.
                  </p>
                  
                  </div>

                  <div class="b2<?php echo e($product['id']); ?>" style="display: none">
                  <p>Het is opnieuw tijd voor de kwartaalcheck van jouw energietarieven.</p>
                  <p>De vraag: <b>zit je nog goed?</b></p>
                 
                  <p>Het antwoord: NEEN, je kan [TOTAL IMPACT] euro besparen</p>
                  <p>De scherpste aanbieding is [IMPACT MARKET] euro goedkoper dan jouw huidige tarieven. De kortingen die bij je huidige contract horen zullen vervallen als je zou overstappen, maar de winst is groter dan het verlies.</p>
                  <p>Het goedkoopste tarief op dit ogenblik is [PRODUCT NAME] van [SUPPLIER NAME] en is [IMPACT TOTAL] goedkoper dan je huidige tarieven. Klik hier [LINK] als je wil aangaan op het nieuwe aanbod. Het is geldig tot [VALIDITY].</p>
                  <p>Link niet klikbaar, kopieer de volgende link in je browser: [SIGNUP URL].</p>
                  <p>Als je opnieuw overstapt worden je data in onze systemen voor de kwartaalcheck gereset, en anders gaan we gewoon door met je huidige voor de volgende kwartaalcheck.</p>

                  </div>

            </div>

            </div>
            </div>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>

            <div class="row part-last">
            <div class="col-md-6 compare">
            <input aria-label="compare" type="checkbox"  class="compare myCheck<?php echo e($product['id']); ?>" name="compare" value="<?php echo e($product['id']); ?>"> <?php echo app('translator')->getFromJson('home.Compare'); ?><br>
            </div>
            <div class="col-md-6 sec-3-btn more-det " data-id="<?php echo e($product['id']); ?>">
            <button id="myButton1" data-supplier="<?php echo e($supplier['name']); ?>" data-uuid="<?php echo e($parameters['uuid']); ?>" data-product="<?php echo e($product['name']); ?>"  class="more-details more1 "><i class="fas fa-sort-down"></i> <?php echo app('translator')->getFromJson('home.More_details'); ?></button>
            </div>
            </div>

            </div>
            <!-- End of listing-1 -->

            </div>


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

            $(".tool-tip-sec").click(function(){
            var id=$(this).data('id');
            $(".bulb"+id).toggleClass("see");
            });

            $(".disctab-active").click(function(event) {	
            event.preventDefault()
            $(".discountact").addClass('active')            
            });

            $(".activate-discount").click(function(){

            var id=$(this).data('id');
            alert(id);

            });
            });
            </script>                    