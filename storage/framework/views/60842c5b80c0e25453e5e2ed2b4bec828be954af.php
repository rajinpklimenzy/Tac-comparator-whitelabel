<?php
    /*Just for your server-side code*/
    //header('Content-Type: text/html; charset=ISO-8859-1');
    header('Content-Type:text/html; charset=UTF-8');
?>
<div class="compare-sec-1">
			<div class="container">
				<div class="row">
					<div class="col-md-3 sec-part-1">
						<a href="#" class="back-2"><i class="fa fa-arrow-left"></i> <?php echo app('translator')->getFromJson('home.Back_to_plans'); ?></a>
						<h5><?php echo app('translator')->getFromJson('home.Compare_your'); ?></h5>
					</div>         
                    <?php
                    $si="0"; ?>   
                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $si++;  
                    ?>        
					<div class="col-md-3 sec-part-2">
						<div class="selected">
							<div class="row">
								<div class="col-md-6">
									<img src="<?php echo e($logo['supplier']['logo']); ?>">
								</div>
								<div class="col-md-6 close-sec">
									<?php if(count($res)!=1): ?><i data-id="<?php echo e($logo['product']['id']); ?>" class="fa fa-times-circle delete-com"></i><?php endif; ?>
								</div>
							</div>
							<p><?php echo e($logo['supplier']['name']); ?> - <?php echo e($logo['product']['name']); ?></p>
                                                        
                                        <form action="<?php echo e(url('bevestiging')); ?>" method="get">
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="pri_save" class="pri_save<?php echo e($si); ?>">
                                        <input type="hidden" name="pro_id"  value="<?php echo e($logo['product']['id']); ?>">
                                        <input type="hidden" name="supplier"  value="<?php echo e($logo['supplier']['name']); ?>">
                                        <input type="hidden" name="product"  value="<?php echo e($logo['product']['name']); ?>">
                                         <input type="hidden" name="pro_type"  value="<?php echo e($logo['parameters']['values']['comparison_type']); ?>">
                                        <input type="hidden" name="type"  value="<?php echo e(Session::get('customer_type')); ?>">
                                        <input type="hidden" name="postalcode"  value="<?php echo e(Session::get('postal_code')); ?>">
                                        <input type="hidden" name="elect_day" id="" <?php if(isset($usage_elec_day)): ?> value="<?php echo e($usage_elec_day); ?>" <?php endif; ?>>
                                        <input type="hidden" name="elect_night" <?php if(isset($usage_elec_night)): ?> value="<?php echo e($usage_elec_night); ?>" <?php endif; ?> >
                                        <input type="hidden" name="gas_cons" <?php if(isset($usage_gas)): ?> value="<?php echo e($usage_gas); ?>" <?php endif; ?>>
                                        
                                        <input type="hidden" name="sub_url"  value="<?php echo e($logo['product']['subscribe_url']); ?>">
                                       
                                        <input type="hidden" name="from" value="pack" >
                                        <input type="hidden" name="pr_type" id="pr_type" value="">
					                    <button id="choose<?php echo e($logo['product']['id']); ?>" data-id="<?php echo e($logo['product']['id']); ?>" type="submit" class="choose1"><?php echo app('translator')->getFromJson('home.To_Request'); ?></button>
                                        </form>
                                        </div>
					</div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
					
					
				</div>
			</div>
		</div>

		<!-- Contract Details -->


		<div class="com-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2><?php echo app('translator')->getFromJson('home.Contract_Details'); ?></h2>
					</div>
				</div>
                            
				<div class="row duration-sec">
                                    
					<div class="col-md-3 col-3">
						<h5><?php echo app('translator')->getFromJson('home.Duration'); ?></h5>
					</div>
                                    
					<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $duration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<div class="col-md-3 col-3">
						<p class="duration-p2">
						    <?php if(Session::get('locale')=='nl'): ?> 
                                <?php if($duration['product']['contract_duration']=='123'): ?> <?php echo app('translator')->getFromJson('home.123year'); ?><?php elseif($duration['product']['contract_duration']=='13'): ?> <?php echo app('translator')->getFromJson('home.13year'); ?><?php elseif($duration['product']['contract_duration']=='0'): ?> <?php echo app('translator')->getFromJson('home.Undetermined'); ?><?php else: ?> <?php echo e($duration['product']['contract_duration']); ?> <?php echo app('translator')->getFromJson('home.Year'); ?><?php endif; ?>
                            <?php else: ?>
                                <?php if($duration['product']['contract_duration']=='123'): ?> <?php echo app('translator')->getFromJson('home.123year'); ?><?php elseif($duration['product']['contract_duration']=='13'): ?> <?php echo app('translator')->getFromJson('home.13year'); ?><?php elseif($duration['product']['contract_duration']=='0'): ?> <?php echo app('translator')->getFromJson('home.Undetermined'); ?><?php else: ?> <?php echo e($duration['product']['contract_duration']); ?> <?php echo app('translator')->getFromJson('home.Year'); ?><?php endif; ?>
                            <?php endif; ?> 
						</p>
					</div>
                                        
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
				</div>   
                               
                                <div class="row">
	<?php if($duration['product']['type']=='pack'): ?>
          </div>
		<div class="com-price">
			<h5><?php echo app('translator')->getFromJson('home.price_type'); ?></h5>
			<div class="row">
				<div class="col-md-3 col-3">
					<ul>
						<li><?php echo app('translator')->getFromJson('home.Electricity'); ?></li>
						<li><?php echo app('translator')->getFromJson('home.Gas'); ?></li>
						<li><?php echo app('translator')->getFromJson('home.Source_Power'); ?></li>
					</ul>
				</div>

        <?php endif; ?>
        
          <?php if($duration['product']['type']!='pack'): ?>
        </div>
		<div class="com-price">
			<h5><?php echo app('translator')->getFromJson('home.Price_type'); ?></h5>
			<div class="row">
				<div class="col-md-3 col-3">
					<ul>
						<li><?php echo e($duration['product']['pricing_type']); ?></li>
					<?php if($duration['product']['type'] =='electricity'): ?>	
						<li><?php echo app('translator')->getFromJson('home.Source_Power'); ?></li>
					<?php endif; ?>
					</ul>
				</div>
        <?php endif; ?>                           
                                            
	<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pricing_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            
            <?php if($pricing_type['product']['type']=='pack'): ?>
            
           <div class="col-md-3 col-3">
	    <ul>
                <li><?php if($pricing_type['product']['underlying_products']['electricity']['pricing_type']== 'variable'): ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></li>
                <li><?php if($pricing_type['product']['underlying_products']['gas']['pricing_type']=='variable'): ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php else: ?>  <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></li>
                <li>
            <?php if($pricing_type['product']['green_percentage'] > '0' && $pricing_type['product']['origin'] == 'BE'): ?>
                <img src="/images/bel-flag.png"><?php echo e($pricing_type['product']['green_percentage']); ?> % <?php echo app('translator')->getFromJson('home.green_from_Belgium'); ?>
           <?php else: ?>

                <?php echo e($pricing_type['product']['green_percentage']); ?> % <?php echo app('translator')->getFromJson('home.green'); ?>
           <?php endif; ?>
                </li>                       
            </ul>
           </div>
        <?php endif; ?>
        
        <?php if($pricing_type['product']['type']!='pack' && $pricing_type['product']['type']=='electricity'): ?>
            
           <div class="col-md-3 col-3">
					<ul>
						<li><?php if($pricing_type['product']['pricing_type'] == 'variable'): ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></li>
						<li>
            <?php if($pricing_type['product']['green_percentage'] > '0' && $pricing_type['product']['origin'] == 'BE'): ?>
                <img src="/images/bel-flag.png"><?php echo e($pricing_type['product']['green_percentage']); ?> % <?php echo app('translator')->getFromJson('home.green_from_Belgium'); ?>
           <?php else: ?>

                <?php echo e($pricing_type['product']['green_percentage']); ?> % <?php echo app('translator')->getFromJson('home.green'); ?>
           <?php endif; ?>

            </li>                       
					</ul>
				        </div>
       <?php endif; ?>
       
       <?php if($pricing_type['product']['type']!='pack' && $pricing_type['product']['type']=='gas'): ?>
            
            <div class="col-md-3 col-3">
            <ul>
            <li><?php if($pricing_type['product']['pricing_type'] == 'variable'): ?> <?php echo app('translator')->getFromJson('home.variable'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></li>

            </ul>
            </div>
       <?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                          
						
					</div>
				</div>


                <div class="contactor-detail">
                	<div class="row">
                		<div class="col-md-3 col-3">
                			<h5><?php echo app('translator')->getFromJson('home.Who_is_this'); ?>    </h5>
                		</div>
                                            
                                            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cont_for): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                		<div class="col-md-3 col-3">
                                  <?php if(Session::get('customer_type') == 'residential'): ?> 
                                                    
                <?php                                               
                if(Session::get('locale')=='fr'){
                $string=$feature[2]['FR_description'];
                }else{
                $string=$feature[2]['NL_description'];
                }

                $replace = ['{duration}'];
                $duration=$cont_for['price']['validity_period']['end'];
                $info = [
                'duration' => $duration,
                ];

                ?>
                                                          
                    <p><?php echo app('translator')->getFromJson('home.This_contract_residential_users_only'); ?> <?php echo app('translator')->getFromJson('home.residential'); ?></p>
                    <p><?php echo e($cont_for['product']['tariff_description']); ?></p>
                    <?php else: ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[3]['FR_description']); ?> <?php else: ?><?php echo e($feature[3]['NL_description']); ?> <?php endif; ?></p>
                    <?php endif; ?>
                    <div class="contract-style">
                    <?php if($cont_for['product']['customer_condition']=='EV' ): ?> 
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[5]['FR_description']); ?> <?php else: ?><?php echo e($feature[5]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($cont_for['product']['customer_condition']=='PV' ): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[6]['FR_description']); ?> <?php else: ?><?php echo e($feature[6]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($cont_for['product']['customer_condition']=='CH' ): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[7]['FR_description']); ?> <?php else: ?><?php echo e($feature[7]['NL_description']); ?> <?php endif; ?></p>
                    <?php elseif($cont_for['product']['customer_condition']=='COMP' ): ?>
                    <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($feature[8]['FR_description']); ?> <?php else: ?><?php echo e($feature[8]['NL_description']); ?> <?php endif; ?></p>
                    <?php else: ?>
                    <p></p>
                    <?php endif; ?>
                    </div>
                	</div>
                                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		
                		
                	</div>
                </div>
				<div class="particular-sec">
					<div class="row">
						<div class="col-md-3 col-3">
							<h5><?php echo app('translator')->getFromJson('home.Particular_Conditions'); ?></h5>
						</div>
                                            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $par_cond): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
						                            <div class="col-md-3 col-3 under-sec">
						               
                                                
                                                    <?php if($par_cond['product']['ff_pro_rata'] == 'Y'): ?>
                                                    <p>
                                                       <?php if(Session::get('locale')=='fr'): ?>
                                                            <?php echo e($feature[0]['FR_description']); ?> 
                                                            <a class="parti-a" href="https://www.veriftarif.be/faq-foire-aux-questions/les-particuliers-et-petits-consommateurs-professionnels-ne-paieront-plus-de-frais-de-resiliation-de-leurs-contrats-d-energie" target="_blank">FAQ</a>
                                                        <?php else: ?> 
                                                            <?php echo e($feature[0]['NL_description']); ?>

                                                            <a class="parti-a" href="https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s" target="_blank">FAQ</a>
                                                        <?php endif; ?>
                                                    </p>
                                                    <?php else: ?>
                                                    <p>
                                                       <?php if(Session::get('locale')=='fr'): ?>
                                                            <?php echo e($feature[1]['FR_description']); ?> 
                                                            <a class="parti-a" href="https://www.veriftarif.be/faq-foire-aux-questions/les-particuliers-et-petits-consommateurs-professionnels-ne-paieront-plus-de-frais-de-resiliation-de-leurs-contrats-d-energie" target="_blank">FAQ</a>
                                                        <?php else: ?> 
                                                            <?php echo e($feature[1]['NL_description']); ?> 
                                                            <a class="parti-a" href="https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s" target="_blank">FAQ</a>
                                                        <?php endif; ?> 
                                                    </p>
                                                    <?php endif; ?>
                                                    
						 </div> 
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						
					</div>
					
				</div>


				<div class="service-sec">
					<div class="row">
						<div class="col-md-3 col-3">
							<h5><?php echo app('translator')->getFromJson('home.Service_limitations'); ?></h5>
						</div>
                                            
                                             <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ser_limit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 col-3">
				        	<?php if($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'free'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[0]['FR_description']); ?> <?php else: ?><?php echo e($service[0]['NL_description']); ?><?php endif; ?> </p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'free'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[1]['FR_description']); ?> <?php else: ?><?php echo e($service[1]['NL_description']); ?> <?php endif; ?></p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'prepaid'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[2]['FR_description']); ?> <?php else: ?><?php echo e($service[2]['NL_description']); ?> <?php endif; ?></p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'free'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[3]['FR_description']); ?> <?php else: ?><?php echo e($service[3]['NL_description']); ?> <?php endif; ?></p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'free'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[4]['FR_description']); ?> <?php else: ?><?php echo e($service[4]['NL_description']); ?><?php endif; ?></p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'online'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[5]['FR_description']); ?> <?php else: ?><?php echo e($service[5]['NL_description']); ?><?php endif; ?></p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'domi' && $ser_limit['product']['service_level_invoicing'] == 'free' && $ser_limit['product']['service_level_contact'] == 'online'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[6]['FR_description']); ?> <?php else: ?><?php echo e($service[6]['NL_description']); ?><?php endif; ?></p>
                                           <?php elseif($ser_limit['product']['service_level_payment'] == 'free' && $ser_limit['product']['service_level_invoicing'] == 'email' && $ser_limit['product']['service_level_contact'] == 'online'): ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[7]['FR_description']); ?> <?php else: ?><?php echo e($service[7]['NL_description']); ?><?php endif; ?></p>
                                           <?php else: ?>
                                           <p><?php if(Session::get('locale')=='fr'): ?><?php echo e($service[8]['FR_description']); ?> <?php else: ?><?php echo e($service[8]['NL_description']); ?><?php endif; ?></p>

                            <?php endif; ?>
						</div>                                            
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					</div>
				</div>



				<div class="document-sec">
					<div class="row">
						<div class="col-md-3 col-3">
							<h5><?php echo app('translator')->getFromJson('home.Documents'); ?></h5>
						</div>
                                            
                                             <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pdf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-md-3 col-3">
						<ul>
                                                        <?php if($pdf['product']['type']=='pack'): ?> 
                                                            <li><a href="<?php echo e($pdf['product']['underlying_products']['electricity']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Electricity'); ?></a></li>
                                                            <li><a href="<?php echo e($pdf['product']['underlying_products']['gas']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Gas'); ?></a></li>
                                                            <li><a href="<?php echo e($pdf['product']['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                                                        <?php elseif($pdf['product']['type']=='electricity'): ?>
                                                            <li><a href="<?php echo e($pdf['product']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Electricity'); ?></a></li>
                                                            <li><a href="<?php echo e($pdf['product']['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                                                        <?php elseif($pdf['product']['type']=='gas'): ?>
                                                            <li><a href="<?php echo e($pdf['product']['terms_url_dynamic']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_Gas'); ?></a></li>
                                                            <li><a href="<?php echo e($pdf['product']['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                                                        <?php else: ?>
                                                            <li><a href="<?php echo e($pdf['product']['terms_url']); ?>" target="_block"><img src="<?php echo e(url('images/pdf-image.png')); ?>">&nbsp <?php echo app('translator')->getFromJson('home.Tariff_card_General_conditions'); ?></a></li>
                                                        <?php endif; ?>
                                                    </ul>
						</div>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
						
						
					</div>
				</div>
			</div>
		</div>
                        </div>
                </div>

		<!-- Product Description -->

		<div class="Product-com-sec">
			<div class="container">
				<h2><?php echo app('translator')->getFromJson('home.Product_Description'); ?></h2>
				<div class="row">
					<div class="col-md-3 col-3">
						
					</div>
                                    
                                    
                                     <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-3 col-3">
						<h5><?php echo e($descr['supplier']['name']); ?> - <?php echo e($descr['product']['name']); ?></h5>
						<ul>                       
                        <?php 
                        $desc=explode(" - ",$descr['product']['description']);
                        ?>
                                                
                                                 <?php $__currentLoopData = $desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                        <div class="row">
                            <div class="col-md-12 col-10">
                                <p><?php echo $descs ?></p>
                            </div>
                        </div>
                        </li>                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
					</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
				</div>
			</div>
		</div>

		<!-- Discount -->
   
		<div class="discount-sec-com">
			<div class="container">
				<h2><?php echo app('translator')->getFromJson('home.Discounts'); ?></h2>
                                
				<div class="row p-sec-dis">
                                    
                                    <div class="col-md-3">
						
					</div> 
                                    
				<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discSub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<?php                                               
						$string = trans('home.switch_to');
						$replace = ['{SUPPLIER}','{PRODUCT}','{VALIDITYDATE}'];

						$info = [
						'SUPPLIER' => $discSub['supplier']['name'],
						'PRODUCT' => $discSub['product']['name'],
						'VALIDITYDATE' => Carbon\Carbon::parse($discSub['price']['validity_period']['end'])->format('d/m/Y'),
						];
				?> 

				<?php if($discSub['price']['totals']['year']['incl_promo']!=$discSub['price']['totals']['year']['excl_promo']): ?>		                                   
				<div class="col-md-3">
					<p>
						<?php echo str_replace($replace, $info, $string); ?>
					</p>
				</div>

				<?php else: ?>
				
				<div class="col-md-3">
					<p>
						
					</p>
				</div>
				
				<?php endif; ?>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                                    
				</div>
                                
			<div class="com-bg">
				<div class="row pad-com">                                            
                   <div class="col-md-3">						
					</div>    
                                            
                                     <?php  $disc_total="0"; $i="0"; 
                                     
                                                $discPromo=false;
                                                $discService=false;
                                                $discloyalty=false;
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
                                                          
                                     $posFlag=0;
                                     ?>       
                                        <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                                        
                                       <?php $i=$i+1; $posFlag=$posFlag+1;                          
                                        ?>
  
						<?php  $discounts['price']['breakdown']['discounts'] ?>
                                                
                                               
                                                <?php  $disc_total="0"; $i="0"; ?>
                                                
                        <div class="col-md-3 com-elec">
							<div class="row"> 
                                                            <?php $s="0"; 
                                                            
                                                              
                                                            ?>
                                                            
                                                            
                                                            <?php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                    
                                                    ?>
                                               
                                               
                                               
                                               
                             <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                      
                                        $discountE=$discountE+$discountss['amount'];
                                        ?>
                                                <?php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; ?>

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<img class="online_web online_web_compare" src="<?php echo e(url('images/loyality.png')); ?>">
<?php else: ?>
<?php if($discountss['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> 

<?php endif; ?>
										
										<div>
											<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<p class="mode amt">Beperkte dienstverlening</p>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<p class="mode amt">Getrouwheidskorting</p>
<?php else: ?>
<p class="mode amt"><?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php else: ?>  <?php endif; ?> <?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

<?php endif; ?>
											<p class="check-p1" data-id="<?php echo e($discountss['id']); ?>" id="check-p1"><?php echo app('translator')->getFromJson('home.Explanation'); ?>  <i class="fa fa-sort-down disc-arrow<?php echo e($discountss['id']); ?>"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; <?php echo e(number_format($discountss['amount'],2,',', '.')); ?></p>
									<p class="checkp2"><?php if($discountss['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>
									<?php if($discountss['parameters']['unit']=='eurocent'): ?>
<p class="checkp2"><?php echo e(number_format($discountss['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
									<?php endif; ?>
									
				<?php if($discountss['parameters']['unit']=='pct'): ?>
<p class="checkp2"><?php echo e($discountss['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
									<?php endif; ?>
									
								</div>
                                               
								<div class="col-12 com-content-dis cont<?php echo e($discountss['id']); ?>" id="com-content-dis">
									<h6>
										<?php echo e($discountss['name']); ?>

									</h6>
									<p>
										<?php echo e($discountss['description']); ?>

									</p>
								</div>      

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                
                                     <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountG=$discountG+$discountss['amount'];
                                        ?>
                                                <?php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; ?>

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<img class="online_web online_web_compare" src="<?php echo e(url('images/loyality.png')); ?>">
<?php else: ?>
<?php if($discountss['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> 

<?php endif; ?>
										
										<div>
											<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<p class="mode amt">Beperkte dienstverlening</p>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<p class="mode amt">Getrouwheidskorting</p>
<?php else: ?>
<p class="mode amt"><?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php else: ?>  <?php endif; ?> <?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

<?php endif; ?>
											<p class="check-p1" data-id="<?php echo e($discountss['id']); ?>" id="check-p1"><?php echo app('translator')->getFromJson('home.Explanation'); ?>  <i class="fa fa-sort-down disc-arrow<?php echo e($discountss['id']); ?>"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; <?php echo e(number_format($discountss['amount'],2,',', '.')); ?></p>
									<p class="checkp2"><?php if($discountss['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>
									<?php if($discountss['parameters']['unit']=='eurocent'): ?>
<p class="checkp2"><?php echo e(number_format($discountss['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
									<?php endif; ?>
									
				<?php if($discountss['parameters']['unit']=='pct'): ?>
<p class="checkp2"><?php echo e($discountss['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
									<?php endif; ?>
									
								</div>
                                              
								<div class="col-12 com-content-dis cont<?php echo e($discountss['id']); ?>" id="com-content-dis">
									<h6>
										<?php echo e($discountss['name']); ?>

									</h6>
									<p>
										<?php echo e($discountss['description']); ?>

									</p>
								</div>
                                                   

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountG=$discountG+$discountss['amount'];
                                        ?>
                                                <?php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; ?>

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<img class="online_web online_web_compare" src="<?php echo e(url('images/loyality.png')); ?>">
<?php else: ?>
<?php if($discountss['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> 

<?php endif; ?>
										
										<div>
											<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<p class="mode amt">Beperkte dienstverlening</p>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<p class="mode amt">Getrouwheidskorting</p>
<?php else: ?>
<p class="mode amt"><?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php else: ?>  <?php endif; ?> <?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

<?php endif; ?>
											<p class="check-p1" data-id="<?php echo e($discountss['id']); ?>" id="check-p1"><?php echo app('translator')->getFromJson('home.Explanation'); ?>  <i class="fa fa-sort-down disc-arrow<?php echo e($discountss['id']); ?>"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; <?php echo e(number_format($discountss['amount'],2,',', '.')); ?></p>
									<p class="checkp2"><?php if($discountss['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>
									<?php if($discountss['parameters']['unit']=='eurocent'): ?>
<p class="checkp2"><?php echo e(number_format($discountss['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
									<?php endif; ?>
									
				<?php if($discountss['parameters']['unit']=='pct'): ?>
<p class="checkp2"><?php echo e($discountss['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
									<?php endif; ?>
									
								</div>
                                               
								<div class="col-12 com-content-dis cont<?php echo e($discountss['id']); ?>" id="com-content-dis">
									<h6>
										<?php echo e($discountss['name']); ?>

									</h6>
									<p>
										<?php echo e($discountss['description']); ?>

									</p>
								</div>
                                        

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                     <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountS=$discountS+$discountss['amount'];
                                        ?>
                                                <?php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; ?>

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<img class="online_web online_web_compare" src="<?php echo e(url('images/loyality.png')); ?>">
<?php else: ?>
<?php if($discountss['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> 

<?php endif; ?>
										
										<div>
											<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<p class="mode amt">Beperkte dienstverlening</p>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<p class="mode amt">Getrouwheidskorting</p>
<?php else: ?>
<p class="mode amt"><?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php else: ?>  <?php endif; ?> <?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

<?php endif; ?>
											<p class="check-p1" data-id="<?php echo e($discountss['id']); ?>" id="check-p1"><?php echo app('translator')->getFromJson('home.Explanation'); ?>  <i class="fa fa-sort-down disc-arrow<?php echo e($discountss['id']); ?>"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; <?php echo e(number_format($discountss['amount'],2,',', '.')); ?></p>
									<p class="checkp2"><?php if($discountss['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>
									<?php if($discountss['parameters']['unit']=='eurocent'): ?>
<p class="checkp2"><?php echo e(number_format($discountss['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
									<?php endif; ?>
									
				<?php if($discountss['parameters']['unit']=='pct'): ?>
<p class="checkp2"><?php echo e($discountss['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
									<?php endif; ?>
									
								</div>
                                         
								<div class="col-12 com-content-dis cont<?php echo e($discountss['id']); ?>" id="com-content-dis">
									<h6>
										<?php echo e($discountss['name']); ?>

									</h6>
									<p>
										<?php echo e($discountss['description']); ?>

									</p>
								</div>
                                      

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                     <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                        <?php 
                                        $s++;
                                        if($s % 2 == 0)
                                        {
                                        $pos="even";
                                        }
                                        else
                                        {
                                        $pos="odd";
                                        }
                                        
                                        $discountL=$discountL+$discountss['amount'];
                                        ?>
                                                <?php  $disc_total=$disc_total+$discountss['amount']; $i=$i+1; ?>

								<div class="col-md-7 col-7 com-pad ">
									<div class="check">
<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<span class="online_web online_web_compare"><i class="fas fa-at"></i></span>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<img class="online_web online_web_compare" src="<?php echo e(url('images/loyality.png')); ?>">
<?php else: ?>
<?php if($discountss['parameters']['fuel_type']=='gas'): ?><i class="fa fa-fire"></i> <?php else: ?> <i class="fa fa-bolt"></i> <?php endif; ?> 

<?php endif; ?>
										
										<div>
											<?php if($discountss['parameters']['discount_type']=='servicelevel'): ?>
<p class="mode amt">Beperkte dienstverlening</p>
<?php elseif($discountss['parameters']['discount_type']=='loyalty'): ?>
<p class="mode amt">Getrouwheidskorting</p>
<?php else: ?>
<p class="mode amt"><?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php else: ?>  <?php endif; ?> <?php if($discountss['parameters']['fuel_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>

<?php endif; ?>
											<p class="check-p1" data-id="<?php echo e($discountss['id']); ?>" id="check-p1"><?php echo app('translator')->getFromJson('home.Explanation'); ?>  <i class="fa fa-sort-down disc-arrow<?php echo e($discountss['id']); ?>"></i></p>
										</div>
									</div>
								</div>
								<div class="col-md-5 col-5 com-euro com-pad">
									<p class="checkp1">&#8364; <?php echo e(number_format($discountss['amount'],2,',', '.')); ?></p>
									<p class="checkp2"><?php if($discountss['parameters']['value_type']=='fixed'): ?> <?php echo app('translator')->getFromJson('home.fixed'); ?> <?php endif; ?></p>
									<?php if($discountss['parameters']['unit']=='eurocent'): ?>
<p class="checkp2"><?php echo e(number_format($discountss['parameters']['value'],2,',', '.')); ?> €c/kWh </p>
									<?php endif; ?>
									
				<?php if($discountss['parameters']['unit']=='pct'): ?>
<p class="checkp2"><?php echo e($discountss['parameters']['value']*100); ?> % <?php echo app('translator')->getFromJson('home.on_consumption'); ?></p>
									<?php endif; ?>
									
								</div>
                                        
								<div class="col-12 com-content-dis cont<?php echo e($discountss['id']); ?>" id="com-content-dis">
									<h6>
										<?php echo e($discountss['name']); ?>

									</h6>
									<p>
										<?php echo e($discountss['description']); ?>

									</p>
								</div>
                                         
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                                
                                                
                                                
                                                
							</div>
						</div>
                                                    
                                                    
                                        
                                            
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
						
					</div>

				</div>
                                
                                

			



				
			</div>
		</div>


		<!-- Pricing -->

		<div class="pricing-sec-com">
			<div class="container">
				<h2><?php echo app('translator')->getFromJson('home.PRICING'); ?></h2>
                                
                       <?php if($res[0]['product']['type']=='electricity' || $res[0]['product']['type']=='pack'): ?>
				<div class="row">
					<div class="col-md-12 com-electricity">
						<h4><i class="fa fa-bolt"></i> <?php echo app('translator')->getFromJson('home.Electricity'); ?></h4>
					</div>
				</div>

				<div class="energy-cost-com">
					<h5><?php echo app('translator')->getFromJson('home.Energy_Cost'); ?></h5>
					<div class="fixed-cost-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Fixed_cost'); ?></p>
							</div>
                                                    
                                                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fixed_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($fixed_cost['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100,2,',', '.')); ?></p>
							</div>
							
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
                                                    
						</div>
					</div>

					<div class="consumption-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Consumption'); ?></p>
							</div>
                                                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consump): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($consump['price']['breakdown']['electricity']['energy_cost']['single']/100+$consump['price']['breakdown']['electricity']['energy_cost']['day']/100+$consump['price']['breakdown']['electricity']['energy_cost']['night']/100+$consump['price']['breakdown']['electricity']['energy_cost']['excl_night']/100,2,',', '.')); ?></p>
							</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							
						</div>
					</div>

					<div class="certificates-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Certificates'); ?></p>
							</div>
                                                    
                                                     <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $certif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($certif['price']['breakdown']['electricity']['energy_cost']['certificates']/100,2,',', '.')); ?></p>
							</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</div>
					</div>
					


					<div class="discount-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo e(ucfirst(trans('home.Discounts'))); ?></p>
							</div>
                                                    <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0"; ?>                                                    
                                                   
                                                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <?php $getTotal="0";  ?> 
                                               <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $loyalty_disc="0";
                                                    $all_discTotal="0";
                                                    $promo_discAll=0;
                                                    
                                                    $test_disc=0;
                                                    
                                                    
                                                    
                                                foreach($discs['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                               
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                                                 
							<div class="col-md-3 col-3">
							     <?php if((Session::get('promo')=='true' && $discs['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discs['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discs['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
								 <?php
                                                            $fixF=$discs['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discs['price']['breakdown']['electricity']['energy_cost']['single']/100+$discs['price']['breakdown']['electricity']['energy_cost']['day']/100+$discs['price']['breakdown']['electricity']['energy_cost']['night']/100+$discs['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discs['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            }
                                                            
                                                            ?>
								<p class="dis-com">- &#8364; <?php echo e(number_format($promo_discE,2,',', '.')); ?></p>
							
								<?php else: ?>
								<p class="dis-com">- &#8364; 0,00</p>
								
								<?php endif; ?>
							</div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</div>
					</div>
					
				</div>

				<div class="net-cost-com">
					<h5><?php echo app('translator')->getFromJson('home.Net_costs'); ?></h5>
					<div class="distribution-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Distribution'); ?></p>
							</div>
                                                      <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($distri['price']['breakdown']['electricity']['distribution_and_transport']['distribution']/100,2,',', '.')); ?></p>
							</div>							
						      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>

					<div class="transport-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Transport'); ?></p>
							</div>
                                                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3">
								<p>&#8364; <?php echo e(number_format($distri['price']['breakdown']['electricity']['distribution_and_transport']['transport']/100,2,',', '.')); ?></p>
							</div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</div>
					</div>
				</div>


				<div class="taxing-com">
					<h5><?php echo app('translator')->getFromJson('home.Taxing'); ?></h5>
					<div class="taxing-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Taxing'); ?></p>
							</div>
                                                    
                                                     <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3">
								<p>&#8364; <?php echo e(number_format($taxing['price']['breakdown']['electricity']['taxes']['tax']/100,2,',', '.')); ?></p>
							</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
						</div>
					</div>

				</div>
                                
                             <?php endif; ?>   

				<!-- gas -->
                                
                                
 <?php if($res[0]['product']['type']=='gas'|| $res[0]['product']['type']=='pack'): ?>

				<div class="row">
					<div class="col-md-12 com-electricity">
						<h4><i class="fa fa-fire"></i> <?php echo app('translator')->getFromJson('home.Gas'); ?></h4>
					</div>
				</div>

				<div class="energy-cost-com">
					<h5><?php echo app('translator')->getFromJson('home.Energy_Cost'); ?></h5>
					<div class="fixed-cost-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Fixed_cost'); ?></p>
							</div>
                                                    
                                                    
							<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fixed_cost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($fixed_cost['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100,2,',', '.')); ?></p>
							</div>
							
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							
						</div>
					</div>

					<div class="consumption-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Consumption'); ?></p>
							</div>
                                                    
                                                    
					             <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consump): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($consump['price']['breakdown']['gas']['energy_cost']['usage']/100,2,',', '.')); ?></p>
							</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							
						</div>
					</div>
					
				

					<div class="discount-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo e(ucfirst(trans('home.Discounts'))); ?></p>
							</div>                                                    
                                                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    
						          <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $loyalty_disc="0";
                                                    $all_discTotal="0";
                                                    
                                                    $test_disc=0;
                                                    
                                                    
                                                    
                                                foreach($dis['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                                               
                                               
                                               
							<div class="col-md-3 col-3 fix-p">
							    <?php if((Session::get('promo')=='true' && $dis['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $dis['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $dis['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
								<?php
                                                            $fixF=$dis['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$dis['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            ?>
								<p class="dis-com">- &#8364; <?php if(count($dis['price']['breakdown']['discounts']) >0): ?> <?php echo e(number_format($promo_discG,2,',', '.')); ?> <?php else: ?> 0,00 <?php endif; ?></p>
								
						<?php else: ?>
						<p class="dis-com">- &#8364; 0,00</p>
					
						
						<?php endif; ?>
							</div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							
						</div>
					</div>
					
				</div>
<?php endif; ?>
				<div class="net-cost-com">
					<h5><?php echo app('translator')->getFromJson('home.Net_costs'); ?></h5>
                                         <?php if($res[0]['product']['type']=='gas' || $res[0]['product']['type']=='pack'): ?>
					<div class="distribution-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Distribution'); ?></p>
							</div>
                                                    
							<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $distri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($distri['price']['breakdown']['gas']['distribution_and_transport']['distribution']/100,2,',', '.')); ?></p>
							</div>							
						      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							
						</div>
					</div>
                                         <?php endif; ?>
                                         
  <?php if($res[0]['product']['type']=='gas' || $res[0]['product']['type']=='pack'): ?>
					<div class="transport-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Transport'); ?></p>
							</div>
                                                    
							<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($distri['price']['breakdown']['gas']['distribution_and_transport']['transport']/100,2,',', '.')); ?></p>
							</div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
							
							
						</div>
					</div>
  <?php endif; ?>
				</div>
 
 

  <?php if($res[0]['product']['type']=='gas' || $res[0]['product']['type']=='pack'): ?>
				<div class="taxing-com">
					<h5><?php echo app('translator')->getFromJson('home.Taxing'); ?></h5>
					<div class="taxing-net">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Taxing'); ?></p>
							</div>
                                                    
							<?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3 fix-p">
								<p>&#8364; <?php echo e(number_format($taxing['price']['breakdown']['gas']['taxes']['tax']/100,2,',', '.')); ?></p>
							</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    
							
							
						</div>
					</div>

				</div>
  <?php endif; ?>

				<div class="total-com">
					<h5><?php echo app('translator')->getFromJson('home.Total'); ?></h5>
					<div class="total-com-gas-ele">
						<div class="row">
							<div class="col-md-3 col-3">
								 <?php if($res[0]['product']['type']=='pack'): ?>
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Gas'); ?> + <?php echo app('translator')->getFromJson('home.Electricity'); ?></p>
								<?php endif; ?>
								 <?php if($res[0]['product']['type']=='electricity'): ?>
								 <p class="pricing-head-com"> <?php echo app('translator')->getFromJson('home.Electricity'); ?></p>
								<?php endif; ?>
								 <?php if($res[0]['product']['type']=='gas'): ?>
								 <p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Gas'); ?></p>
								<?php endif; ?>

							</div>
                                                    <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $total): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3">
							    
								<p>&#8364; <?php echo e(number_format($total['price']['totals']['year']['excl_promo']/100,2,',', '.')); ?></p>
							</div>
							
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>

					<div class="total-com-discount">
						<div class="row">
						    
						    <?php $disc_total="0"; 
						     $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    $promo_discAll=0;
						    ?>
                            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <!--discount-->
                                     
                                       
                                        <?php
                                                    
                                                   
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                                                
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<div class="col-md-3 col-3">
								<?php if(($promo_discG+$promo_discE+$promo_discAll)>0): ?><p class="pricing-head-com">Welkomstkortingen</p><?php endif; ?>
								<?php if($sl_disc>0): ?><p class="pricing-head-com">Beperkte dienstverlening</p><?php endif; ?>
								<?php if($loyalty_disc>0): ?><p class="pricing-head-com">Getrouwheidskortingen</p><?php endif; ?>
							</div>
                            <?php $disc_total="0"; ?>
                            <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <!--discount-->
                                     
                                       
                                        <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $promo_discAll="0";
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                            
                            
                            <!--discount end-->
                            
                            <?php $discs=$discounts['price']['totals']['year']['excl_promo']-$discounts['price']['totals']['year']['incl_promo'];  ?>
							<div class="col-md-3 col-3">
							    <?php if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
							
							
							     <?php 
                                                            $fixF=$discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discs['price']['breakdown']['electricity']['energy_cost']['day']/100+$discs['price']['breakdown']['electricity']['energy_cost']['night']/100+$discs['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            } 
								                            
								                            
								                            
								                            $fixF=$discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                ?>
                                                            
                                                            
								<?php if($promo_discE+$promo_discG+$promo_discAll>0): ?><p class="dis-com-1">- &#8364; <?php echo e(number_format($promo_discE+$promo_discG+$promo_discAll,2,',', '.')); ?></p><?php endif; ?>
								<?php if($sl_disc>0): ?><p class="dis-com-1">- &#8364; <?php echo e(number_format($sl_disc,2,',', '.')); ?></p><?php endif; ?>
							    <?php if($loyalty_disc>0): ?><p class="dis-com-1">- &#8364; <?php echo e(number_format($loyalty_disc,2,',', '.')); ?></p><?php endif; ?>
								<?php else: ?>
								<?php endif; ?>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					            
						</div>
					</div>
					<div class="total-com-total">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Total'); ?></p>
							</div>
                                                     <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $totals): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     
                                                     
                                                     <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE="0";
                                                    $promo_discG="0";
                                                    $promo_discAll="0";
                                                    
                                                foreach($totals['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                                                
                                                
							<div class="col-md-3 col-3">
							    <?php if((Session::get('promo')=='true' && $totals['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $totals['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $totals['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
								
									  <?php 
                                                            $fixF=$totals['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$totals['price']['breakdown']['electricity']['energy_cost']['single']/100+$discs['price']['breakdown']['electricity']['energy_cost']['day']/100+$discs['price']['breakdown']['electricity']['energy_cost']['night']/100+$discs['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$totals['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            } 
								                            
								                            
								                            
								                            $fixF=$totals['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$totals['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
							?>
								
								
								<p class="dis-com-1">&#8364; <?php echo e(number_format(($totals['price']['totals']['year']['excl_promo']/100)-($promo_discE+$promo_discG+$promo_discAll+$sl_disc+$loyalty_disc),2,',', '.')); ?></p>
								
								<?php else: ?>
								<p class="dis-com-1">&#8364; <?php echo e(number_format($totals['price']['totals']['year']['excl_promo']/100,2,',', '.')); ?></p>
								<?php endif; ?>
							</div>
                                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
                                                    
						</div>
					</div>
				</div>

 <?php $parameters=Session::get('getParameters'); ?>
				<div class="unite-com">
					<h5><?php echo app('translator')->getFromJson('home.Unit_Prices'); ?></h5>
					
					 <?php if($res[0]['parameters']['values']['comparison_type']=='pack'): ?>
					 
					<div class="unit-price-elec">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Electricity'); ?></p>
							</div>
							
						
							 <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 
						
                                    <!--discount-->
                            
                                    <?php $s="0"; 
                                                            
                                                              
                                                            ?>
                                                            
                                                            
                                                            <?php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0; $discountAll="0"; 
                                                    ?>
                                                    
                                       <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php   $discountE=$discountE+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountG=$discountG+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountAll=$discountAll+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php  $discountS=$discountS+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                       <?php   $discountL=$discountL+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       
                                        <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    $promo_discAll=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discAll=$promo_discAll+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                            
                            
                            <!--discount end-->
							
							 
							 	<?php
                                                          $totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                                                            $totalgas=$discounts['parameters']['values']['usage_gas'];
                                                            
                                                            ?>
							 
							 
                                                            <div class="col-md-3 col-3">
                             <?php if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                                                       <?php
                                                            $fixF=$discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            }
                                                            
                                                            ?>
                                                            
                                                          
                                                     
                                                        <?php if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> 

                                                        <?php if($totalElec>0): ?>
                                                         <?php echo e(number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100)-($promo_discE))/$totalElec)*100,2,',', '.')); ?> &#8364;c/kWh <?php endif; ?>
                                                         <?php endif; ?>
                                                        <?php else: ?>
                                                        <?php if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])): ?>

                                                        <?php if($totalElec>0): ?>

                                                          <?php echo e(number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100))/$totalElec)*100,2,',', '.')); ?> &#8364;c/kWh <?php endif; ?>
                                                        <?php endif; ?>
                                                           
                                                        <?php endif; ?>
                                                        
                                                        </div>
                                                            
						
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						</div>
					</div>
					<?php endif; ?>
					
					 <?php if($res[0]['parameters']['values']['comparison_type']=='pack'): ?>
					<div class="unit-price-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Gas'); ?></p>
							</div>
							 <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 
							  <!--discount-->
                            
                                    <?php $s="0"; 
                                                            
                                                              
                                                            ?>
                                                            
                                                            
                                                            <?php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; $discountAll="0"; 
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0; $discountAll="0";  
                                                    ?>
                                                    
                                       <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php   $discountE=$discountE+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountG=$discountG+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountAll=$discountAll+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php  $discountS=$discountS+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                       <?php   $discountL=$discountL+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <!--discount end-->
							 
							  <?php $getTotal=null; ?>
						     <?php $__currentLoopData = $discounts['price']['breakdown']['discounts']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                               
                                               <?php if($disc['parameters']['fuel_type']=='gas'): ?>
                                               
                                               <?php $getTotal=$getTotal+$disc['amount'];
                                               
                                               
                                               ?>
                                               
                                               <?php endif; ?>
                                               
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                               
                                             <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
							 
							<?php 
							$totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                            $totalgas=$discounts['parameters']['values']['usage_gas'];
                            ?>
							    <div class="col-md-3 col-3">
                             <?php if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                                           
                                                            
                                                            <?php
                                                            $fixF=$discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            ?>
                                           
                                            <?php if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost'])): ?>  
                                            <?php if($totalgas>0): ?>
                                            <?php echo e(number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')); ?> &#8364;c/kWh  <?php endif; ?> <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost'])): ?> 
                                                            <?php if($totalgas>0): ?>
                                                             <?php echo e(number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')); ?> &#8364;c/kWh  <?php endif; ?> <?php endif; ?>
                                                        
                                                        <?php endif; ?>
                                                        
                                                        </div>
							     
							      
							     
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						</div>
					</div>
					 <?php endif; ?>
					
					
					
					
                     <?php if($res[0]['parameters']['values']['comparison_type']=='gas'): ?>
					<div class="unit-price-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php echo app('translator')->getFromJson('home.Gas'); ?></p>
							</div>
							 <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 
							    <!--discount-->
                            
                                    <?php $s="0"; 
                                                            
                                                              
                                                            ?>
                                                            
                                                            
                                                            <?php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; $discountAll=0;
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0;  
                                                    ?>
                                                    
                                       <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php   $discountE=$discountE+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountG=$discountG+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountAll=$discountAll+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php  $discountS=$discountS+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                       <?php   $discountL=$discountL+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       
                                            <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                            
                            
                            <!--discount end-->
							 
							<?php 
							$totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                            $totalgas=$discounts['parameters']['values']['usage_gas'];
                            ?>
							     <div class="col-md-3 col-3">
                             <?php if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                                            
                                              
                                                            
                                                            <?php
                                                            $fixF=$discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['gas']['energy_cost']['usage']/100;
                                                            if((($fixF+$cun)-($promo_discG))<=0){
                                                            
                                                            $promo_discG=$fixF+$cun;
                                                            $activeStar=true;
                                                            }
                                                            
                                                            ?>
                                            <?php if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost'])): ?>  <?php echo e(number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100)-($promo_discG))/$totalgas)*100,2,',', '.')); ?> &#8364;c/kWh  <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if(isset($discounts['price']['breakdown']['gas']['unit_cost']['energy_cost'])): ?>  <?php echo e(number_format(((($discounts['price']['breakdown']['gas']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['gas']['energy_cost']['usage']/100))/$totalgas)*100,2,',', '.')); ?> &#8364;c/kWh  <?php endif; ?>
                                                        
                                                        <?php endif; ?>
                                                        
                                                        </div>
							     
							       
							     
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						</div>
					</div>
					 <?php endif; ?>
					 
					 <?php if($res[0]['parameters']['values']['comparison_type']=='electricity'): ?>
					 
					 <?php $type=$res[0]['parameters']['values']['comparison_type']; ?>
					<div class="unit-price-gas">
						<div class="row">
							<div class="col-md-3 col-3">
								<p class="pricing-head-com"><?php if($res[0]['parameters']['values']['comparison_type']=='gas'): ?> <?php echo app('translator')->getFromJson('home.Gas'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php endif; ?></p>
							</div>
							 <?php $__currentLoopData = $res; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 
							  <!--discount-->
                            
                                    <?php $s="0"; 
                                                            
                                                              
                                                            ?>
                                                            
                                                            
                                                            <?php  $disc_total="0"; $discountE=0; $discountG=0; $discountS=0; $discountL=0; $checkPlus=0; $i="0"; $discountAll=0;
                                                    
                                                    
                                                    if($discPromo==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='electricity' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredE=$filtered->all();
                                                    
                                                    }
                                                    
                                                     if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='gas' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredG=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                              if($discPromo==true){
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='all' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    }else{
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['fuel_type']=='unknown' && $value['parameters']['discount_type']!='servicelevel' && $value['parameters']['discount_type']!='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredAll=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discService==true){
                                                    
                                                     $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='servicelevel'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredS=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    if($discloyalty==true){
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='loyalty'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    }else{
                                                    
                                                    $filtered = collect($discounts['price']['breakdown']['discounts'])->filter(function ($value, $key) {
                                                    $s=0;
                                                    if($value['parameters']['discount_type']=='unknown'){
                                                        $s++;
                                                        }
                                                        return $s;
                                                        });

                                                    $filteredL=$filtered->all();
                                                    
                                                    
                                                    }
                                                    
                                                    
                                                  $discountE=0; $discountG=0; $discountS=0; $discountL=0;  
                                                    ?>
                                                    
                                       <?php $__currentLoopData = $filteredE; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php   $discountE=$discountE+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       <?php $__currentLoopData = $filteredG; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountG=$discountG+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php $__currentLoopData = $filteredAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                         <?php $discountAll=$discountAll+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                        <?php  $discountS=$discountS+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       <?php $__currentLoopData = $filteredL; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $discountss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                       
                                       <?php   $discountL=$discountL+$discountss['amount']; ?>
                                        
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                       
                                        <?php
                                                    
                                                    $ele_disc="0";
                                                    $gas_disc="0";
                                                    $all_disc="0";
                                                    $sl_disc="0";
                                                    $promo_disc="0";
                                                    $loyalty_disc="0";
                                                    $promo_discE=0;
                                                    $promo_discG=0;
                                                    
                                                foreach($discounts['price']['breakdown']['discounts'] as $disc){
                                                    
                                                    if($disc['parameters']['fuel_type']=='electricity'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discE=$promo_discE+$disc['amount'];
                                                            }
                                                    
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                    
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $ele_disc=$ele_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='gas'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                                $promo_discG=$promo_discG+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $gas_disc=$gas_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                    
                                                    if($disc['parameters']['fuel_type']=='all'){
                                                    
                                                            if($discPromo=='true' && $disc['parameters']['discount_type']=='promo'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $promo_disc=$promo_disc+$disc['amount'];
                                                            }
                                                            if($discService=='true' && $disc['parameters']['discount_type']=='servicelevel'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $sl_disc=$sl_disc+$disc['amount'];
                                                            }
                                                            if($discloyalty==true && $disc['parameters']['discount_type']=='loyalty'){
                                                                $all_disc=$all_disc+$disc['amount'];
                                                                $loyalty_disc=$loyalty_disc+$disc['amount'];
                                                            }
                                                    }
                                                     
                                                }
                                                  
                                            
                                                    
                                                ?>
                            
                            
                            <!--discount end-->
							   <?php
							   $totalElec=$discounts['parameters']['values']['usage_single']+$discounts['parameters']['values']['usage_day']+$discounts['parameters']['values']['usage_night']+$discounts['parameters']['values']['usage_excl_night'];
                            
							   ?>
							        <div class="col-md-3 col-3">
                             <?php if((Session::get('promo')=='true' && $discounts['parameters']['values']['promo_discount']['promo']=='promo') || (Session::get('domi')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelPayment']=='domi') || (Session::get('email')=='true' && $discounts['parameters']['values']['promo_discount']['discount_serviceLevelInvoicing']=='email')): ?>
                                                  <?php
                                                            $fixF=$discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100;
                                                            $cun=$discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100;
                                                            $cer=$discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100;
                                                            
                                                            if((($fixF+$cun+$cer)-($promo_discE))<=0){
                                                            $activeStar=true;
                                                            $promo_discE=$fixF+$cun+$cer;
                                                            }
                                                            
                                                            ?>
                                                            
                                                           
                                                
                                                
                                                       <?php if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> <?php echo e(number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100)-($promo_discE))/$totalElec)*100,2,',', '.')); ?> &#8364;c/kWh <?php endif; ?>
                                                        <?php else: ?>
                                                        <?php if(isset($discounts['price']['breakdown']['electricity']['unit_cost']['energy_cost'])): ?> <?php echo e(number_format(((($discounts['price']['breakdown']['electricity']['energy_cost']['fixed_fee']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['single']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['day']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['night']/100+$discounts['price']['breakdown']['electricity']['energy_cost']['excl_night']/100)+($discounts['price']['breakdown']['electricity']['energy_cost']['certificates']/100))/$totalElec)*100,2,',', '.')); ?> &#8364;c/kWh <?php endif; ?>
                                                           
                                                        <?php endif; ?>
                                                        
                                                        </div>
							  
						    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
						</div>
					</div>
					 <?php endif; ?>
					
					
					
				</div>

			</div>
		</div>

		<!-- bottom content -->

		<div class="bottom-content-com">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php                                               
$string = trans("home.These_prices_comp");
$replace = ['{X1}','{X2}','{X3}','{X6}'];

$month=date("F");
$month = strtolower($month);
$year=date("Y");
$x1=strtolower(trans('home.Electricity'));
$p_type=Session::get('p_type');
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
$x1 = trans('home.x5_res');
$x6=trans('home.x6_res');
}
if($customer_type=='professional'){
$x1 = trans('home.x5_pro');
$x6=trans('home.x6_pro');
}
$info = [
    'X1' => $x1,
    'X2'  => $x2,
    'X3'   => $year,
    'X6'      => $x6,
   
];

?>
                                                
                                                <p><?php echo str_replace($replace, $info, $string); ?></p>
					</div>
				</div>
			</div>
		</div>
                
                 <script>
$(document).ready(function(){
 $(".check-p1").click(function(){
     
     var id=$(this).data('id');
     $('.disc-arrow'+id).toggleClass('rotate');
   $(".cont"+id).slideToggle();
 });
});
</script>
<script>
$(document).ready(function(){
 $("#check-p11").click(function(){
     
   $("#com-content-dis1").slideToggle();
 });
});