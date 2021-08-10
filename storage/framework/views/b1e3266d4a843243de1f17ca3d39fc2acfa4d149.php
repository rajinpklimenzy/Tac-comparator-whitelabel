<div class="col-md-3 col-lg-3 col-sm-3 data-side">
    <div class="data-sec" data-target="el-1">    
    <a data-toggle="modal" data-target="#exampleModal1" class="data_sec_link" style="cursor: pointer;"></a>    
        <h2><?php echo app('translator')->getFromJson('home.Your_Data'); ?></h2>
             <div class="type">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Type'); ?></p>
                    
                    
                    
                     <?php $getParameters=Session::get('getParameters');   ?>
                 
                    <h6 style="text-transform: capitalize"><?php if($getParameters['parameters']['values']['customer_group']=='residential'): ?> <?php echo app('translator')->getFromJson('home.residential'); ?> <?php else: ?> <?php echo app('translator')->getFromJson('home.Professional'); ?> <?php endif; ?></h6>
                </span>
            </div>
            <div class="type">
                <span class="icon"><i class="fa fa-map-marker-alt"></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Postal_Code'); ?></p>
                   
                    <h6><?php echo e($getParameters['parameters']['values']['postal_code']); ?></h6>
                </span>
            </div>


            
            <?php if($getParameters['parameters']['values']['includeE']==1): ?>
            <?php if($getParameters['parameters']['values']['meter_type']=='single' || $getParameters['parameters']['values']['meter_type']=='single_excl_night' || $getParameters['parameters']['values']['usage_single']>0): ?>
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Electricity'); ?></p>
                    <h6><strong><?php echo e(round($getParameters['parameters']['values']['usage_single'])); ?></strong> <span class="light-font"> kWh/<?php echo app('translator')->getFromJson('home.Year'); ?> </span></h6>
                </span>
                
            </div>
            <?php endif; ?>
            <?php if($getParameters['parameters']['values']['meter_type']=='double' || $getParameters['parameters']['values']['meter_type']=='double_excl_night'|| $getParameters['parameters']['values']['usage_day']>0): ?>
            <div class="type">
                <span class="icon"><i class="fa fa-sun"></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php echo app('translator')->getFromJson('home.day'); ?></p>
                    <h6><strong><?php echo e(round($getParameters['parameters']['values']['usage_day'])); ?></strong> <span class="light-font"> kWh/<?php echo app('translator')->getFromJson('home.Year'); ?> </span></h6>
                </span>
            </div>
            <?php endif; ?>
             <?php if($getParameters['parameters']['values']['meter_type']=='double' || $getParameters['parameters']['values']['meter_type']=='double_excl_night' || $getParameters['parameters']['values']['usage_night']): ?>
            <div class="type">
                <span class="icon"><i class="fa fa-moon"></i></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php echo app('translator')->getFromJson('home.night'); ?></p>
                    <h6><strong><?php echo e(round($getParameters['parameters']['values']['usage_night'])); ?></strong> <span class="light-font"> kWh/<?php echo app('translator')->getFromJson('home.Year'); ?> </span></h6>
                </span>
            </div>
            <?php endif; ?>
            <?php if($getParameters['parameters']['values']['meter_type']=='single_excl_night' || $getParameters['parameters']['values']['meter_type']=='double_excl_night' || $getParameters['parameters']['values']['usage_excl_night']): ?>
            <div class="type">
                <span class="icon"><i class="fa fa-bolt"></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Electricity'); ?> <?php echo app('translator')->getFromJson('home.excl_night'); ?></p>
                    <h6><strong><?php echo e(round($getParameters['parameters']['values']['usage_excl_night'])); ?></strong> <span class="light-font"> kWh/<?php echo app('translator')->getFromJson('home.Year'); ?> </span></h6>
                </span>
            </div>
            <?php endif; ?>
            
            <?php endif; ?>
            <?php if($getParameters['parameters']['values']['includeG']==1): ?>
            <div class="type">
                <span class="icon"><i class="fas fa-fire"></i></span>
                <span class="icon_content">
                    <p><?php echo app('translator')->getFromJson('home.Gas'); ?></p>
                    <h6><strong><?php echo e(round($getParameters['parameters']['values']['usage_gas'])); ?></strong> <span class="light-font">kWh/<?php echo app('translator')->getFromJson('home.Year'); ?></span> </h6>
                </span>
            </div>
            <?php endif; ?>
           

        <div class="button-change">
            <button type="button" class="btn btn-primary change-sec-btn" data-toggle="modal" data-target="#exampleModal1" rel="tooltip" title="<?php echo app('translator')->getFromJson('home.change_data_change'); ?>">
               <?php echo app('translator')->getFromJson('home.change'); ?> 
           </button>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-center" id="exampleModalLabel"><?php echo app('translator')->getFromJson('home.Change_your_data'); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                         
                        <div class="modal-body">
                            <section id="tabs" class="twotabs">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 ">
                                        <div class="Maintabs">
                                            <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                                                <li class="nav-item  nav-link-1">
                                                    <a class="nav-link <?php if($getParameters['parameters']['values']['customer_group']=='residential'): ?> active <?php endif; ?>" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><?php echo app('translator')->getFromJson('home.Private'); ?></a>
                                                </li>
                                                <li class="nav-item nav-link-2">
                                                    <a class="nav-link <?php if($getParameters['parameters']['values']['customer_group']=='professional'): ?> active <?php endif; ?>" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo app('translator')->getFromJson('home.Professional'); ?></a>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">

                                                <!--Private tab start-->             

    <div class="tab-pane fade show <?php if($getParameters['parameters']['values']['customer_group']=='residential'): ?> active <?php endif; ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="Tabsection1">
            <div class="row">   
                <div class="col-md-12">
                    <form action="<?php echo e(route('find-packages')); ?>" method="post" class="tabform1" id="tabform1" onsubmit="return myFunctionCalculate()">
                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="customer_type" value="RES">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 top-checkboxs">
                                <div class="checkbox-sec">
                                    
                                    <label class="container-1">
                                        <input aria-label="first_res" type="checkbox" <?php if($getParameters['parameters']['values']['first_residence']): ?> ==1) checked  <?php endif; ?> id="first_res" name="first_res" value="1">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p> <?php echo app('translator')->getFromJson('home.Primary_home'); ?></p>
                                </div>
                            </div> 
                                    <div class="col-md-6">
                                        <div class="form-group por">  
                                            <label> <?php echo app('translator')->getFromJson('home.Postal_Code'); ?> <span style="color:red;">*</span></label>
                                            <input type="text" class="po required" name="postal" required="required" value="<?php echo e($getParameters['parameters']['values']['postal_code']); ?>" autocomplete="off" id="postId" ><br>
                                            <img class="po-loader" src="<?php echo e(url('images/progress.gif')); ?>"  style="display:none;width: 194px;height: 5px;">
                                        </div>
                                         <p class="po-error-msg" style="color:red;display:none;" ><?php echo app('translator')->getFromJson('home.invalid_post'); ?></p>
                                    </div>
                                    <div class="col-md-6" style="display:none;">
                                        <div class="form-group">
                                            <label> <?php echo app('translator')->getFromJson('home.Family_Size'); ?> </label>
                                            <select id = "dropList" name="family_size">
                                                <?php if($getParameters['parameters']['values']['residents']): ?>
                                                 <option value ="<?php echo e($getParameters['parameters']['values']['residents']); ?>"><?php echo e($getParameters['parameters']['values']['residents']); ?></option>
                                                <?php endif; ?>
                                                <option value = "1">1</option>
                                                <option value = "2">2</option>
                                                <option value = "3">3</option>
                                                <option value = "4">4</option>
                                                <option value = "5">5+</option>
                                            </select><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                   <div id="sub-po" class="col-md-12">
                                        <input type="hidden" value="<?php echo e($getParameters['parameters']['values']['municipality']); ?>" class="mun"> 
                                   
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 top-checkboxs">
                                <div class="checkbox-sec">
                                    <label class="container-1">
                                        <input aria-label="Electricity" type="checkbox" <?php if($getParameters['parameters']['values']['includeE']): ?>==1) checked <?php endif; ?> id="electricity" name="electricity" value="true">
                                        <span class="checkmark"></span>
                                    </label>
                                    <p style="text-transform: capitalize;"><?php echo app('translator')->getFromJson('home.Electricity'); ?></p>
                                </div>
                            </div> 
                            
             <?php 
             if(Session::get('isolation_level') && Session::get('residence') && Session::get('building_type') && Session::get('heating_system')){
             
             $button=1;
             
             }else{
             
             $button=0;
             }
             
             ?>
             
                                                                        
              <div id="elec-pri" class="col-lg-12 col-sm-12" <?php if($getParameters['parameters']['values']['includeE']): ?>==1 )  <?php else: ?> style="display:none;" <?php endif; ?>>


                <!-- digital or analog -->

                        <div class="radio1 col-lg-12 col-sm-12" id="radios">
                            <div class="row">
                                <?php if($getParameters['parameters']['values']['digital_meter']!=1): ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.analog_meter'); ?>
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" value="analog" type="radio"  checked  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>

                                <?php else: ?>
                                
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.analog_meter'); ?> 
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" value="analog" type="radio"  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                <?php endif; ?>
                                <?php if($getParameters['parameters']['values']['digital_meter']==1): ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.digital_meter'); ?>
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" type="radio" value="digital"  checked />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>

                                <?php else: ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.digital_meter'); ?>
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" type="radio" value="digital"/>
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                <?php endif; ?>
                            </div>
                        </div>

                <!-- digital or analog end -->



                        <div class="radio1 col-lg-12 col-sm-12" id="radios">
                            <div class="row">
                                <?php if(session::get('group1')=="know_consuption" || session::get('group1')==""): ?>
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.I_know_my'); ?>
                                        <input name="group1" id="know" class="radiobtn1" data-button="<?php echo e($button); ?>" value="know_consuption" type="radio"  checked  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                <?php else: ?>
                                
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.I_know_my'); ?> 
                                        <input name="group1" id="know" class="radiobtn1" data-button="<?php echo e($button); ?>" value="know_consuption" type="radio"  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                <?php endif; ?>
                                <?php if(session::get('group1')=="estimate_consuption"): ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.Estimate_my'); ?>
                                        <input name="group1" id="estimate" class="radiobtn2" data-button="<?php echo e($button); ?>" type="radio" value="estimate_consuption" <?php if(session::get('group1')=='estimate_consuption'): ?> checked <?php endif; ?> />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>

                                <?php else: ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.Estimate_my'); ?>
                                        <input name="group1" id="estimate" class="radiobtn2" data-button="<?php echo e($button); ?>" type="radio" value="estimate_consuption"/>
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                <?php endif; ?>
                            </div>
                        </div>
                        
        <div class="col-lg-12 col-sm-12" >
            <div class="row">
        <div class="col-lg-12 col-sm-12 estim <?php if(session::get('group1')=='know_consuption'): ?> radiobtn2-show <?php else: ?>  <?php endif; ?>" style="display:none"  >
            <div class="row">
                
                 
                <div class="col-md-6">
                    <div class="form-group">
                    <label>Aantal bewoners</label>    
                        <select id = "dropList" class="esti estiresidence" name="residence">
                            
                            
                            
                            
                            <?php if(Session::get('residence')): ?><option value = "<?php echo e(Session::get('residence')); ?>"><?php if(Session::get('residence')=='2 or less'): ?> 2 of minder <?php elseif(Session::get('residence')=='3-4 people'): ?>  3-4 bewoners   <?php else: ?> 5 of meer <?php endif; ?></option><?php else: ?>
                            <option value = "3-4 people">3-4 bewoners</option>
                            <?php endif; ?>
                            <option value = "2 or less">2 of minder</option>
                            <option value = "3-4 people">3-4 bewoners</option>
                            <option value = "5 or more">5 of meer</option>
                        </select><br>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">   
                    <label>Gebouwtype</label> 
                        <select id = "dropList" class="esti building_type" name="building_type">
                          
                            <?php if(Session::get('building_type')): ?><option value = "<?php echo e(Session::get('building_type')); ?>"> <?php if(Session::get('building_type')=="Appartement"): ?> Appartement <?php endif; ?>
                            <?php if(Session::get('building_type')=="lesser200"): ?> Huis < 200 m² <?php endif; ?>
                            <?php if(Session::get('building_type')=="greater200"): ?> Huis > 200 m² <?php endif; ?></option><?php else: ?>
                            <option value = "lesser200">Huis < 200 m²</option>
                            <?php endif; ?>
                            <option value = "Appartement">Appartement</option>
                            <option value = "lesser200">Huis < 200 m²</option>
                            <option value = "greater200">Huis > 200 m²</option>
                          
                        </select><br>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">   
                    <label>Isolatieniveau</label> 
                        <select id = "dropList" class="esti isolation_level" name="isolation_level">
                          
                            <?php if(Session::get('isolation_level')): ?><option value = "<?php echo e(Session::get('isolation_level')); ?>"> <?php if(Session::get('isolation_level')=="more than 15 years old, not isolated"): ?> Meer dan 15 jaar oud, niet/weinig geïsoleerd <?php endif; ?>
                            <?php if(Session::get('isolation_level')=="less then 15 years old, or re-isolated"): ?> Minder dan 15 jaar oud of isolatie vernieuwd <?php endif; ?>
                            <?php if(Session::get('isolation_level')=="Passive house"): ?> Passiefwoning of sterk geïsoleerd <?php endif; ?></option><?php else: ?>
                            <option value = "more than 15 years old, not isolated">Meer dan 15 jaar oud, niet/weinig geïsoleerd</option>
                            <?php endif; ?>
                            <option value = "more than 15 years old, not isolated">Meer dan 15 jaar oud, niet/weinig geïsoleerd</option>
                            <option value = "less then 15 years old, or re-isolated">Minder dan 15 jaar oud of isolatie vernieuwd</option>
                            <option value = "Passive house">Passiefwoning of sterk geïsoleerd</option>
                           
                        </select><br>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">   
                    <label>Verwarming</label> 
                        <select id = "dropList" class="esti heating_system" name="heating_system">
                          
                            <?php if(Session::get('heating_system')): ?><option value = "<?php echo e(Session::get('heating_system')); ?>"> <?php if(Session::get('heating_system')=="CH on gas"): ?> Centrale verwarming op gas <?php endif; ?>
                            <?php if(Session::get('heating_system')=="CH on oil"): ?> Centrale verwarming op mazout <?php endif; ?>
                            <?php if(Session::get('heating_system')=="heatpump"): ?> Warmtepomp <?php endif; ?>
                            <?php if(Session::get('heating_system')=="communal heating"): ?> Gemeenschappelijke stookplaats (appartementsgebouw) <?php endif; ?></option><?php else: ?>
                            <!--<option value = "">Verwarming</option>-->
                            <?php endif; ?>
                            <option value = "CH on gas">Centrale verwarming op gas</option>
                            <option value = "CH on oil">Centrale verwarming op mazout</option>
                            <option value = "heatpump">Warmtepomp</option>
                            <option value = "communal heating">Gemeenschappelijke stookplaats (appartementsgebouw)</option>

                        </select><br>
                    </div>
                </div>
                
                
                
            </div>
        </div>
            </div>
            <img class="ec-loader" src="<?php echo e(url('images/progress.gif')); ?>"  style="display:none;width: 100%;height: 15px;">

            <div class="row" id="meter-details">
                <div class="col-md-12">
                    <div class="form-group meterr">
                        <label> <?php echo app('translator')->getFromJson('home.Meter_Type'); ?><span style="color:red;">*</span></label>
                        <select id = "dropList resident-meter" class="meter required" name="meter_type1" required="">
                            <?php if($getParameters['parameters']['values']['meter_type']): ?> 
                            <option value = "<?php echo e($getParameters['parameters']['values']['meter_type']); ?>">
                            <?php if($getParameters['parameters']['values']['meter_type']=="double"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> <?php endif; ?>
                            <?php if($getParameters['parameters']['values']['meter_type']=="single" || $getParameters['parameters']['values']['meter_type']=="Single Meter"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> <?php endif; ?>
                            <?php if($getParameters['parameters']['values']['meter_type']=="single_excl_night"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                            <?php if($getParameters['parameters']['values']['meter_type']=="double_excl_night"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                            </option>
                            <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                            <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                            <option value = "single_excl_night"><?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option> 
                            <option value = "double_excl_night"><?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option>
                            <?php else: ?>
                            <option value = ""><?php echo app('translator')->getFromJson('home.Meter_Type'); ?></option>
                            <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                            <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                            <option value = "single_excl_night"><?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option> 
                            <option value = "double_excl_night"><?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option>
                            <?php endif; ?>
                  
                        </select><br>
                    </div>
                </div>

            <div class="col-lg-12 col-sm-12 ">
            <div class="row double" <?php if($getParameters['parameters']['values']['meter_type']=='double'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1r">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Day'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_day_elec1" <?php if($getParameters['parameters']['values']['usage_day']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_day']); ?>" <?php endif; ?> class="consuption_day_elec1" autocomplete="off" min="0" name="consuption_day_elec1" ><br><?php echo e($getParameters['parameters']['values']['digital_meter']); ?>

                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1r">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_night_elec1" <?php if($getParameters['parameters']['values']['usage_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_night']); ?>" <?php endif; ?> class="consuption_night_elec1" autocomplete="off" min="0" name="consuption_night_elec1" ><br>
                    </div>
                </div>    
            </div>
            
             <div class="row single" <?php if($getParameters['parameters']['values']['meter_type']=='single'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-12">
                    <div class="form-group consuption1r">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption1" <?php if($getParameters['parameters']['values']['usage_single']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_single']); ?>" <?php endif; ?> class="consuption1 " autocomplete="off" min="0" name="consuption1" ><br>
                    </div>
                </div> 
                   
            </div>
             
              <div class="row single_excl_night" <?php if($getParameters['parameters']['values']['meter_type']=='single_excl_night'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
                  
                <div class="col-md-6">
                    <div class="form-group consuption1ser">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption1" <?php if($getParameters['parameters']['values']['usage_single']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_single']); ?>" <?php endif; ?> class="consuption1se required" autocomplete="off" min="0" name="consuption1se" ><br>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group consuption_excl_nightser">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_excl_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_excl_night" <?php if($getParameters['parameters']['values']['usage_excl_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_excl_night']); ?>" <?php endif; ?> class="consuption_excl_nightse required" autocomplete="off" min="0" name="consuption_excl_nightse" ><br>
                    </div>
                </div>    
            </div>
            
            <div class="row double_excl_night" <?php if($getParameters['parameters']['values']['meter_type']=='double_excl_night'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
                  
                 <div class="col-md-6">
                    <div class="form-group consuption_day_elec1der">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Day'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_day_elec1" <?php if($getParameters['parameters']['values']['usage_day']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_day']); ?>" <?php endif; ?> class="consuption_day_elec1de required" autocomplete="off" min="0" name="consuption_day_elec1de" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1der">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_night_elec1" <?php if($getParameters['parameters']['values']['usage_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_night']); ?>" <?php endif; ?> class="consuption_night_elec1de required" autocomplete="off" min="0" name="consuption_night_elec1de" ><br>
                    </div>
                </div> 
              
                <div class="col-md-12">
                    <div class="form-group consuption_excl_nightder">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_excl_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_excl_night" <?php if($getParameters['parameters']['values']['usage_excl_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_excl_night']); ?>" <?php endif; ?> class="consuption_excl_nightde required" autocomplete="off" min="0" name="consuption_excl_nightde" ><br>
                    </div>
                </div>    
            </div> 
        </div>
                   
        </div>
        </div>                                          
    
        <div class="col-md-12">
            <div class="form-group">
              <label><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></label>
              <select name="current_tariff_elec_1" <?php if($getParameters['parameters']['values']['current_supplier_name_electricity'] == null): ?> id="supplier_res_e" <?php endif; ?> class="elec-supply"> 
                   
                    <option value =""><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></option>
                   
                    <?php 
                    $suppliers = [];
                    foreach($all_suppliers as $all_supplier){
                    $suppliers[] = $all_supplier['supplier']['name'];
                    }
                    sort($suppliers);
                    
                    ?>
                    
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($getParameters['parameters']['values']['current_supplier_name_electricity'] == $supplier): ?> selected <?php endif; ?> value ="<?php echo e($supplier); ?>"><?php echo e($supplier); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              </select>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec">
                <label class="container-1">
                <input aria-label="dec_pro"  type="checkbox"  <?php if($getParameters['parameters']['values']['decentralise_production']!=false): ?> checked else  <?php endif; ?>  id="dec_pro" name="dec_pro" value="true">
                <span class="checkmark"></span>
                </label>
                <p><?php echo app('translator')->getFromJson('home.Decentralised_production'); ?></p>

            </div>       
        </div>
        <div id="dec_pro_data" class="col-md-12" <?php if($getParameters['parameters']['values']['decentralise_production']!=false): ?>  <?php else: ?>  style="display:none;" <?php endif; ?>>
            <div class="form-group second-field-sec">
              <label><?php echo app('translator')->getFromJson('home.Capacity'); ?></label>

              <select name="capacity_decen_pro" class="capacity_decen_pro" > 
                     
                    <?php if($getParameters['parameters']['values']['decentralise_production']!=false): ?>
                    <option value ="<?php echo e($getParameters['parameters']['values']['capacity_decentalise']); ?>"><?php echo e($getParameters['parameters']['values']['capacity_decentalise']); ?></option>
                    <?php else: ?>
                    <option value="" selected="selected"><?php echo app('translator')->getFromJson('home.Capacity'); ?></option>
                    <?php endif; ?>
                    <option value = "1">1</option>
                    <option value = "2">2</option>
                    <option value = "3">3</option>
                    <option value = "4">4</option>
                    <option value = "5">5</option>
                    <option value = "6">6</option>
                    <option value = "7">7</option>
                    <option value = "8">8</option>
                    <option value = "9">9</option>
                    <option value = "10">10</option>
              </select>
            </div>
        </div>

        <!-- injection meter -->

            
            <div class="col-md-12 digital_content"  <?php if($getParameters["parameters"]["values"]["digital_meter"]!=1): ?> style="display: none;" <?php endif; ?>>
                <div class="form-group meterr">
                    <label> <?php echo app('translator')->getFromJson('home.digital_meter'); ?><span style="color:red;">*</span></label>
                    <select id = "dropList resident-meter" class="meter_inj " name="meter_type1_inj" required="">
                        <?php if($getParameters['parameters']['values']['meterTypeInj']): ?> 
                        <option value = "<?php echo e($getParameters['parameters']['values']['meterTypeInj']); ?>">
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="double"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> <?php endif; ?>
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="single" || $getParameters['parameters']['values']['meterTypeInj']=="Single Meter"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> <?php endif; ?>
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="single_excl_night"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="double_excl_night"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                        </option>
                        <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                        <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                        
                        <?php else: ?>
                        <!-- <option value = ""><?php echo app('translator')->getFromJson('home.digital_meter'); ?></option> -->
                        <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                        <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                       
                        <?php endif; ?>
              
                    </select><br>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 digital_content" <?php if($getParameters['parameters']['values']['digital_meter']!=1): ?> style="display:none;" <?php endif; ?>>
            <div class="row double_inj" <?php if($getParameters['parameters']['values']['meterTypeInj']=='double'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1r">    
                        <label> <?php echo app('translator')->getFromJson('home.injection_day'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_day_elec1_inj" <?php if($getParameters['parameters']['values']['injectionDay']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['injectionDay']); ?>" <?php endif; ?> class="consuption_day_elec1_inj" autocomplete="off" min="0" name="consuption_day_elec1_inj" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1r">    
                        <label> <?php echo app('translator')->getFromJson('home.injection_night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_night_elec1_inj" <?php if($getParameters['parameters']['values']['injectionNight']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['injectionNight']); ?>" <?php endif; ?> class="consuption_night_elec1_inj" autocomplete="off" min="0" name="consuption_night_elec1_inj" ><br>
                    </div>
                </div>    
            </div>
            
             <div class="row single_inj digital_content"  <?php if($getParameters['parameters']['values']['meterTypeInj']=='single'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-12">
                    <div class="form-group consuption1r">    
                        <label> <?php echo app('translator')->getFromJson('home.injection_normal'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption1_inj" <?php if($getParameters['parameters']['values']['injectionNormal']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['injectionNormal']); ?>" <?php endif; ?> class="consuption1_inj " autocomplete="off" min="0" name="consuption1_inj" ><br>
                    </div>
                </div> 
                   
            </div>
             
            
           
        </div>
                   
       

        <!-- injection meter end -->



        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec checkbox_gas">
                <label class="container-1">
                <input aria-label="gas"  type="checkbox" <?php if($getParameters['parameters']['values']['includeG']==1): ?> checked else  <?php endif; ?> id="gas" name="gas" value="true">
                <span class="checkmark"></span>
                </label>
                <p><?php echo app('translator')->getFromJson('home.Gas'); ?></p>
            </div>       
        </div>
        
        <div class="row" style="display: contents;">
            <div class="col-md-12">  
                <div class="row">                                                          
                    <div class="col-md-6 gas-sel" <?php if($getParameters['parameters']['values']['includeG']==1): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
                        <div class="form-group consumtion_gas1r">  
                            <label> <?php echo app('translator')->getFromJson('home.Consumption'); ?> <span style="color:red;">*</span></label>
                            <input type="number" min="0" class="<?php if($getParameters['parameters']['values']['usage_gas']!=-1): ?> required <?php endif; ?>" value="<?php if($getParameters['parameters']['values']['usage_gas']!=-1): ?><?php echo e($getParameters['parameters']['values']['usage_gas']); ?><?php endif; ?>" autocomplete="off" id="consumtion_gas1" name="consumtion_gas1" value=""><br>
                        </div>
                    </div>
                       
                    <div class="col-md-6 gas-sel"   <?php if($getParameters['parameters']['values']['includeG']==1): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?> >
                        <div class="form-group third-field-sec">
                          <label><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></label>
                          <select name="current_tariff_gas" id="supplier_res_g" class="gas-supply"> 
                                
                                <option value =""><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></option>

                                <?php 
                                $suppliers = [];
                                foreach($all_suppliers as $all_supplier){
                                $suppliers[] = $all_supplier['supplier']['name'];
                                }
                                sort($suppliers);
                                
                                ?>
                            
                                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option <?php if($getParameters['parameters']['values']['current_supplier_name_gas'] == $supplier): ?> selected <?php endif; ?> value ="<?php echo e($supplier); ?>"><?php echo e($supplier); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group"> 

                <label> <?php echo app('translator')->getFromJson('home.Email'); ?> </label>
                <input type="email" autocomplete="on" class="email" name="email" value="<?php echo e($getParameters['parameters']['values']['email']); ?>">

            </div>
           
            <p id="error_email" style="color: red;"></p>
        </div>
                                                                        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group calculate">
            <div id="submit1_msg" style="display:none;color:red;" class="alert alert-danger">
            <?php echo app('translator')->getFromJson('home.request_page_submit_error'); ?>
            </div>
                <input type="submit" id="submit1"   disabled="disabled" value="<?php echo app('translator')->getFromJson('home.Calculate'); ?>">
            </div>
            <div>
               
            </div>
        </div>

                                                                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

                                                <!--Private tab end-->               


  <div class="tab-pane fade <?php if($getParameters['parameters']['values']['customer_group']=='professional'): ?>show active <?php endif; ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                               
    <div class="Tabsection2">
        <div class="row">   
            <div class="col-md-12">
                             
                <form action="<?php echo e(route('change-data-prefosional')); ?>" id="tabform2" method="post" onsubmit="return myFunctionCalculate1()">
                    <?php echo e(csrf_field()); ?>

                     <input type="hidden" name="customer_type" value="PRO">
                    <div class="row">
                        <div class="col-md-12 por">
                            <div class="form-group public_sec">  
                                <label> <?php echo app('translator')->getFromJson('home.Postal_Code'); ?> <span style="color:red;">*</span></label>
                                <input type="text" autocomplete="off" class="po" id="post_pr" required="required"  value="<?php echo e($getParameters['parameters']['values']['postal_code']); ?>"  name="postal"><br>
                            </div>
                            <div style="color:red;" id="calculationResult"></div>
                            <p class="po-error-msg" style="color:red;display:none;" ><?php echo app('translator')->getFromJson('home.invalid_post'); ?></p>
                        </div>
                        <div id="" class="col-md-12 sub-po">
                            <input type="hidden" value="<?php echo e($getParameters['parameters']['values']['municipality']); ?>" class="mun"> 
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="checkbox-sec">
                                <label class="container-1">
                                    <input aria-label="Electricity professional" class="electricity_pr1p" type="checkbox" <?php if($getParameters['parameters']['values']['includeE']==1): ?> checked else  <?php endif; ?> id="electricity_pr1" value="true" name="electricity_pr1p">
                                    <span class="checkmark"></span>
                                </label>
                                <p><?php echo app('translator')->getFromJson('home.Electricity'); ?></p>
                            </div>

                <!-- digital or analog -->

                        <div class="radio1 col-lg-12 col-sm-12" id="radios">
                            <div class="row">
                                <?php if($getParameters['parameters']['values']['digital_meter']!=1): ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.analog_meter'); ?>
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" value="analog" type="radio"  checked  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>

                                <?php else: ?>
                                
                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.analog_meter'); ?> 
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" value="analog" type="radio"  />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                <?php endif; ?>
                                <?php if($getParameters['parameters']['values']['digital_meter']==1): ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.digital_meter'); ?>
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" type="radio" value="digital"  checked />
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>

                                <?php else: ?>

                                <div class="col-lg-6 col-sm-6">
                                    <label class="container-2"><?php echo app('translator')->getFromJson('home.digital_meter'); ?>
                                        <input name="digital" id="digital" class="digital" data-button="<?php echo e($button); ?>" type="radio" value="digital"/>
                                        <span class="checkmark-1"></span>
                                    </label>
                                </div>
                                
                                <?php endif; ?>
                            </div>
                        </div>

                <!-- digital or analog end -->
                        
                        <div id="pro-ele"  <?php if($getParameters['parameters']['values']['includeE']): ?>==1 )  <?php else: ?> style="display:none;" <?php endif; ?>>
                        <div class="col-lg-12 col-sm-12"  >
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group meterr">
                                        <label> <?php echo app('translator')->getFromJson('home.Meter_Type'); ?> <span style="color:red;">*</span></label>
                                       
                                            
                                        <select id = "dropList resident-meter" class="meter required" name="meter_type1" required="">
                                        <?php if($getParameters['parameters']['values']['meter_type']): ?> 
                                            <option value = "<?php echo e($getParameters['parameters']['values']['meter_type']); ?>">
                                            <?php if($getParameters['parameters']['values']['meter_type']=="double"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> <?php endif; ?>
                                            <?php if($getParameters['parameters']['values']['meter_type']=="single"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> <?php endif; ?>
                                            <?php if($getParameters['parameters']['values']['meter_type']=="single_excl_night"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                                            <?php if($getParameters['parameters']['values']['meter_type']=="double_excl_night"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                                            </option>
                                            <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                                            <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                                            <option value = "single_excl_night"><?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option> 

                                            <option value = "double_excl_night"><?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option>
                                            <?php else: ?>
                                            <option value = ""><?php echo app('translator')->getFromJson('home.Meter_Type'); ?></option>
                                            <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                                            <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                                            <option value = "single_excl_night"><?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option> 

                                            <option value = "double_excl_night"><?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?></option>
                                        <?php endif; ?>

                                        </select><br>
                                    </div>
                                </div>
                                   
                            </div>
                        </div>
                       <div class="col-lg-12 col-sm-12 ">
                           
                           
            <div class="row double" <?php if($getParameters['parameters']['values']['meter_type']=='double'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1rp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Day'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" <?php if($getParameters['parameters']['values']['usage_day']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_day']); ?>" <?php endif; ?> class="consuption_day_elec1p" autocomplete="off" min="0" name="consuption_day_elec1" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1rp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" <?php if($getParameters['parameters']['values']['usage_night']==-1): ?> value="0" <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_night']); ?>" <?php endif; ?> class="consuption_night_elec1p" autocomplete="off" min="0" name="consuption_night_elec1" ><br>
                    </div>
                </div>    
            </div>         
            <div class="row single" <?php if($getParameters['parameters']['values']['meter_type']=='single'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
                <div class="col-md-12">
                    <div class="form-group consuption1rp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" <?php if($getParameters['parameters']['values']['usage_single']==-1): ?> value="0" <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_single']); ?>" <?php endif; ?> class="consuption1p required <?php if($getParameters['parameters']['values']['meter_type']=='single'): ?> required <?php endif; ?>" autocomplete="off" min="0" name="consuption1" ><br>
                    </div>
                </div> 

            </div>
             
              <div class="row single_excl_night" <?php if($getParameters['parameters']['values']['meter_type']=='single_excl_night'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
                  
                <div class="col-md-6">
                    <div class="form-group consuption1serp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption1" <?php if($getParameters['parameters']['values']['usage_single']==-1): ?> value="0" <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_single']); ?>" <?php endif; ?> class="consuption1sep required" autocomplete="off" min="0" name="consuption1se" ><br>
                    </div>
                </div>
              
                <div class="col-md-6">
                    <div class="form-group consuption_excl_nightserp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_excl_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" <?php if($getParameters['parameters']['values']['usage_excl_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_excl_night']); ?>" <?php endif; ?> class="consuption_excl_nightsep required" autocomplete="off" min="0" name="consuption_excl_nightse" ><br>
                    </div>
                </div>    
            </div>
                            
                <div class="row double_excl_night" <?php if($getParameters['parameters']['values']['meter_type']=='double_excl_night'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
                  
                 <div class="col-md-6">
                    <div class="form-group consuption_day_elec1derp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Day'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_day_elec1" <?php if($getParameters['parameters']['values']['usage_day']==-1): ?> value="0" <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_day']); ?>" <?php endif; ?> class="consuption_day_elec1dep required" autocomplete="off" min="0" name="consuption_day_elec1de" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1derp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_night_elec1" <?php if($getParameters['parameters']['values']['usage_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_night']); ?>" <?php endif; ?> class="consuption_night_elec1dep required" autocomplete="off" min="0" name="consuption_night_elec1de" ><br>
                    </div>
                </div> 
              
                <div class="col-md-12">
                    <div class="form-group consuption_excl_nightderp">    
                        <label> <?php echo app('translator')->getFromJson('home.Consumption_excl_Night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" id="consuption_excl_night" <?php if($getParameters['parameters']['values']['usage_excl_night']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['usage_excl_night']); ?>" <?php endif; ?> class="consuption_excl_nightdep required" autocomplete="off" min="0" name="consuption_excl_nightde" ><br>
                    </div>
                </div>    
            </div>
         </div>
                        
         <div class="col-md-12">
                    <div class="form-group">
                      <label><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></label>
                      <select name="current_tariff_elec_1" <?php if($getParameters['parameters']['values']['current_supplier_name_electricity'] == null): ?> id="supplier_prof_e" <?php endif; ?> class="elec-supply"> 
                      
                            <option value =""><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></option>
                           
                            <?php 
                            $suppliers = [];
                            foreach($all_suppliers as $all_supplier){
                            $suppliers[] = $all_supplier['supplier']['name'];
                            }
                            sort($suppliers);
                            
                            ?>
                            
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if($getParameters['parameters']['values']['current_supplier_name_electricity'] == $supplier): ?> selected <?php endif; ?> value ="<?php echo e($supplier); ?>"><?php echo e($supplier); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                      </select>
                    </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
               <div class="checkbox-sec">
                <label class="container-1">
                <input aria-label="dec_pro" id="dec_pro1" name="dec_pro" type="checkbox"  <?php if($getParameters['parameters']['values']['decentralise_production']!=false): ?> checked <?php endif; ?>  id="dec_pro" name="dec_pro" value="true">
                <span class="checkmark"></span>
                </label>
                <p><?php echo app('translator')->getFromJson('home.Decentralised_production'); ?></p>
               </div>       
            </div>
            <div class="col-md-12" id="dec_pro_data1"  <?php if($getParameters['parameters']['values']['decentralise_production']!=false): ?>  <?php else: ?>  style="display:none;" <?php endif; ?>>
                <div class="form-group">
                  <label><?php echo app('translator')->getFromJson('home.Capacity'); ?></label>
                  <select  name="capacity_decen_pro" class="capacity_decen_pro1"> 
                       
                        <?php if($getParameters['parameters']['values']['decentralise_production']!=false): ?>
                        <option value ="<?php echo e($getParameters['parameters']['values']['capacity_decentalise']); ?>"><?php echo e($getParameters['parameters']['values']['capacity_decentalise']); ?></option>
                        <?php else: ?>
                        <option selected="selected" value=""><?php echo app('translator')->getFromJson('home.Capacity'); ?></option>
                        
                        <?php endif; ?>
                        <option value = "1">1</option>
                        <option value = "2">2</option>
                        <option value = "3">3</option>
                        <option value = "4">4</option>
                        <option value = "5">5</option>
                         <option value = "6">6</option>
                        <option value = "7">7</option>
                        <option value = "8">8</option>
                        <option value = "9">9</option>
                        <option value = "10">10</option>
                  </select>
                </div>
            </div>     
        </div>

         <!-- injection meter -->

            
            <div class="col-md-12 digital_content"  <?php if($getParameters["parameters"]["values"]["digital_meter"]!=1): ?> style="display: none;" <?php endif; ?>>
                <div class="form-group meterr">
                    <label> <?php echo app('translator')->getFromJson('home.digital_meter'); ?><span style="color:red;">*</span></label>
                    <select id = "dropList resident-meter" class="meter_inj" name="meter_type1_inj" required="">
                        <?php if($getParameters['parameters']['values']['meterTypeInj']): ?> 
                        <option value = "<?php echo e($getParameters['parameters']['values']['meterTypeInj']); ?>">
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="double"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> <?php endif; ?>
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="single" || $getParameters['parameters']['values']['meterTypeInj']=="Single Meter"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> <?php endif; ?>
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="single_excl_night"): ?> <?php echo app('translator')->getFromJson('home.single'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                        <?php if($getParameters['parameters']['values']['meterTypeInj']=="double_excl_night"): ?> <?php echo app('translator')->getFromJson('home.double'); ?> + <?php echo app('translator')->getFromJson('home.excl_night'); ?> <?php endif; ?>
                        </option>
                        <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                        <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                        
                        <?php else: ?>
                        <!-- <option value = ""><?php echo app('translator')->getFromJson('home.digital_meter'); ?></option> -->
                        <option value = "single"><?php echo app('translator')->getFromJson('home.single'); ?></option>
                        <option value = "double"><?php echo app('translator')->getFromJson('home.double'); ?></option>
                       
                        <?php endif; ?>
              
                    </select><br>
                </div>
            </div>

            <div class="col-lg-12 col-sm-12 digital_content" <?php if($getParameters['parameters']['values']['digital_meter']!=1): ?> style="display:none;" <?php endif; ?>>
            <div class="row double_inj" <?php if($getParameters['parameters']['values']['meterTypeInj']=='double'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-6">
                    <div class="form-group consuption_day_elec1r">    
                        <label> <?php echo app('translator')->getFromJson('home.injection_day'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_day_elec1_inj" <?php if($getParameters['parameters']['values']['injectionDay']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['injectionDay']); ?>" <?php endif; ?> class="consuption_day_elec1_inj" autocomplete="off" min="0" name="consuption_day_elec1_inj" ><br>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="form-group consuption_night_elec1r">    
                        <label> <?php echo app('translator')->getFromJson('home.injection_night'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption_night_elec1_inj" <?php if($getParameters['parameters']['values']['injectionNight']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['injectionNight']); ?>" <?php endif; ?> class="consuption_night_elec1_inj" autocomplete="off" min="0" name="consuption_night_elec1_inj" ><br>
                    </div>
                </div>    
            </div>
            
             <div class="row single_inj digital_content" <?php if($getParameters['parameters']['values']['meterTypeInj']=='single'): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
               <div class="col-md-12">
                    <div class="form-group consuption1r">    
                        <label> <?php echo app('translator')->getFromJson('home.injection_normal'); ?> <span style="color:red;">*</span></label>
                        <input type="number" min="0" id="consuption1_inj" <?php if($getParameters['parameters']['values']['injectionNormal']==-1): ?> value="0"  <?php else: ?> value="<?php echo e($getParameters['parameters']['values']['injectionNormal']); ?>" <?php endif; ?> class="consuption1_inj " autocomplete="off" min="0" name="consuption1_inj" ><br>
                    </div>
                </div> 
                   
            </div>
             
            
           
        </div>
                   
       

        <!-- injection meter end -->
                        
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="checkbox-sec">
                <label class="container-1">
                <input aria-label="gas"  type="checkbox" <?php if($getParameters['parameters']['values']['includeG']==1): ?> checked else  <?php endif; ?> id="gas_p" name="gasp" value="true">
                <span class="checkmark"></span>
                </label>
                <p>Gas</p>
            </div>       
        </div>                                                      
        <div class="col-md-6 gas-sel-p" <?php if($getParameters['parameters']['values']['includeG']==1): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
            <div class="form-group consumtion_gas1r">  
                <label> <?php echo app('translator')->getFromJson('home.Consumption'); ?> <span style="color:red;">*</span></label>
                <input type="number" class="consumtion_gas1p <?php if($getParameters['parameters']['values']['usage_gas']!=-1): ?> required <?php endif; ?>" value="<?php if($getParameters['parameters']['values']['usage_gas']!=-1): ?><?php echo e($getParameters['parameters']['values']['usage_gas']); ?><?php endif; ?>" autocomplete="off" id="consumtion_gas1" name="consumtion_gas1" value=""><br>
            </div>
        </div>
        <div class="col-md-6 gas-sel-p" <?php if($getParameters['parameters']['values']['includeG']==1): ?>   <?php else: ?>  style="display:none;"  <?php endif; ?>>
            <div class="form-group">
              <label><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></label>
              <select name="current_tariff_gas" id="supplier_prof_g" class="gas-supply"> 
                    <option value =""><?php echo app('translator')->getFromJson('home.Current_Tariff'); ?></option>

                    <?php 
                    $suppliers = [];
                    foreach($all_suppliers as $all_supplier){
                    $suppliers[] = $all_supplier['supplier']['name'];
                    }
                    sort($suppliers);
                    
                    ?>
                
                    <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if($getParameters['parameters']['values']['current_supplier_name_gas'] == $supplier): ?> selected <?php endif; ?> value ="<?php echo e($supplier); ?>"><?php echo e($supplier); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
              </select>
            </div>
        </div>        
         <div class="col-md-12">
            <div class="form-group">  
                <label> <?php echo app('translator')->getFromJson('home.Email'); ?> </label>
                <input type="email" autocomplete="on" id="email" name="email" value="<?php echo e($getParameters['parameters']['values']['email']); ?>"><br>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="form-group calculate">
                
                <div id="submit_pr_msg" style="display:none;color:red;" class="alert alert-danger">
                Vul alstublieft het formulier in
                </div>
                <input type="submit" id="submit_pr" value="<?php echo app('translator')->getFromJson('home.Calculate'); ?>">
            </div>
        </div>
                                        
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>
            <div class="loading_section_sec" style="display: none;">
             <i class="fa fa-spinner fa-spin fa-3x"></i>
            </div>
        </div>
        
     </div>
     
 </div>
</div>
      
</div>
</div>
				<div class="widget">
				    <h6><!-- <?php echo app('translator')->getFromJson('home.Estimated_Savings'); ?> -->Kwartaalcheck</h6><!--Change title to Kwartaalcheck-->
					<div class="historical_check_outer">
						<div class="historical_check_input">
                            

                           
                           

						    <input aria-label="Historical Check" type="date" name="historicalcheck" max="2021-12-31" 
        min="2016-01-01" class="form-control historicalcheck" value="<?php echo e(Session::get('currentValue')); ?>" min="0" name="historicalcheck" id="historicalcheck" placeholder="<?php echo app('translator')->getFromJson('home.Current_invoice'); ?>" required="">
        					<button class="btn historical_submit" id="history-check"> Submit</button> 
						</div>
                        <p class="his-sub-error red" style="display: none;color: red;">Please input a date</p>
						<div class="savings_button">
						    <img id="ajax-loader"   src="<?php echo e(url('images/progress.gif')); ?>" >
						</div>
					</div>
				</div>

				
<h4 class="filter-head"><?php echo app('translator')->getFromJson('home.Filter_the_results'); ?></h4>  
           <?php if($getParameters['parameters']['values']['usage_single']>0 && $getParameters['parameters']['values']['usage_gas']>0 && $getParameters['parameters']['values']['usage_excl_night']==0): ?>
                <div class="filter-sec">  
                    <h6><?php echo app('translator')->getFromJson('home.Display_Results'); ?></h6>
                    <div class="tab-1" id="tab-1">
                        <button class="btn bundle b-1-sec <?php if(!Session::get('seperate')): ?> active <?php endif; ?>"> <?php echo app('translator')->getFromJson('home.Bundle'); ?></button>
                        <button class="btn seperate b-2-sec <?php if(Session::get('seperate')): ?> active <?php endif; ?>" id="sep" data-sep="<?php echo e(Session::get('seperate')); ?>"> <?php echo app('translator')->getFromJson('home.separately'); ?></button> 
                     
                    </div>
                </div>
             <?php endif; ?>
              <?php if($getParameters['parameters']['values']['usage_day']>0 && $getParameters['parameters']['values']['usage_night']>0 && $getParameters['parameters']['values']['usage_gas']>0 && $getParameters['parameters']['values']['usage_excl_night']==0): ?>
                <div class="filter-sec">  
                    <h6><?php echo app('translator')->getFromJson('home.Display_Results'); ?></h6>
                    <div class="tab-1" id="tab-1">
                        <button class="btn bundle b-1-sec <?php if(!Session::get('seperate')): ?> active <?php endif; ?>"> <?php echo app('translator')->getFromJson('home.Bundle'); ?></button>
                        <button class="btn seperate b-2-sec <?php if(Session::get('seperate')): ?> active <?php endif; ?>" id="sep" data-sep="<?php echo e(Session::get('seperate')); ?>"> <?php echo app('translator')->getFromJson('home.separately'); ?></button> 
                    </div>
                </div>
             <?php endif; ?>
              <?php if($getParameters['parameters']['values']['usage_day']>0 && $getParameters['parameters']['values']['usage_night']>0 && $getParameters['parameters']['values']['usage_excl_night']>0 && $getParameters['parameters']['values']['usage_gas']>0): ?>
                <div class="filter-sec">  
                    <h6><?php echo app('translator')->getFromJson('home.Display_Results'); ?></h6>
                    <div class="tab-1" id="tab-1">
                       <button class="btn bundle b-1-sec <?php if(!Session::get('seperate')): ?> active <?php endif; ?>"> <?php echo app('translator')->getFromJson('home.Bundle'); ?></button>
                        <button class="btn seperate b-2-sec <?php if(Session::get('seperate')): ?> active <?php endif; ?>" id="sep" data-sep="<?php echo e(Session::get('seperate')); ?>"> <?php echo app('translator')->getFromJson('home.separately'); ?></button> 
                    </div>
                </div>
             <?php endif; ?>
             
             <?php if($getParameters['parameters']['values']['usage_single']>0 && $getParameters['parameters']['values']['usage_excl_night']>0 && $getParameters['parameters']['values']['usage_gas']>0): ?>
            
                <div class="filter-sec">  
                    <h6><?php echo app('translator')->getFromJson('home.Display_Results'); ?></h6>
                    <div class="tab-1" id="tab-1">
                         <button class="btn bundle b-1-sec <?php if(!Session::get('seperate')): ?> active <?php endif; ?>"> <?php echo app('translator')->getFromJson('home.Bundle'); ?></button>
                        <button class="btn seperate b-2-sec <?php if(Session::get('seperate')): ?> active <?php endif; ?>" id="sep" data-sep="<?php echo e(Session::get('seperate')); ?>"> <?php echo app('translator')->getFromJson('home.separately'); ?></button> 
                    </div>
                </div>
            
             <?php endif; ?>
               
                <div class="cost-sec">  
                    <h6><?php echo app('translator')->getFromJson('home.Cost_per'); ?></h6>
                    <div class="tab-2" id="tab-2">
                        <button class="btn2 btnyear active" data-for="year" id="years"> <?php echo app('translator')->getFromJson('home.filter_year'); ?></button>
                        <button class="btn2 btnmonth" data-for="month" id="month"> <?php echo app('translator')->getFromJson('home.Month'); ?></button>
                        
                    </div>
                </div>

                <div class="widget">
                    <h6><?php echo e(ucfirst(trans('home.Discounts'))); ?></h6>
                    <form action="">
                        <ul>
                             <?php if(Session::get('promo')=='true'): ?>
                             <li><label for="muhRadio1"><input type="checkbox" checked style="cursor: pointer;" class="disc"  name="disc" value="promo"/><?php echo app('translator')->getFromJson('home.For_commercial'); ?></label></li>
                            <?php else: ?>
                            <li><label for="muhRadio1"><input type="checkbox" id="promo-check" style="cursor: pointer;" class="disc"  name="disc" value="promo"/><?php echo app('translator')->getFromJson('home.For_commercial'); ?></label></li>
                             <?php endif; ?>
                             
                            <?php if(Session::get('locale')=='nl'): ?>
                             <?php if(Session::get('domi')=='true'): ?>
                            <li><label for="muhRadio2"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="domi"/>Beperkte dienstverlening</label></li>
                            <?php else: ?>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="domi"/>Beperkte dienstverlening</label></li>
                            <?php endif; ?>
                            <?php else: ?>
                            <?php if(Session::get('domi')=='true'): ?>
                            <li><label for="muhRadio2"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="domi"/>Service digitalisé</label></li>
                            <?php else: ?>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="domi"/>Service digitalisé</label></li>
                            <?php endif; ?>
                            
                            <?php endif; ?>
                            
                            <?php if(Session::get('email')=='true'): ?>
                            <li><label for="muhRadio3"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="email"/><?php echo app('translator')->getFromJson('home.For_digital_invoicing'); ?></label></li>
                            <?php else: ?>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="email"/><?php echo app('translator')->getFromJson('home.For_digital_invoicing'); ?></label></li>
                            <?php endif; ?>
                        </ul>
                        
                    </form>
                </div>


                <div class="widget">
                    <h6><?php echo app('translator')->getFromJson('home.Serviced_level'); ?></h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="none"/><?php echo app('translator')->getFromJson('home.full'); ?></label></li>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="domi"/><?php echo app('translator')->getFromJson('home.Automated_payment'); ?></label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="email"/><?php echo app('translator')->getFromJson('home.Digital_invoicing'); ?></label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="ser_lim" name="ser_lim" value="online"/><?php echo app('translator')->getFromJson('home.Digital_communication'); ?></label></li>
                        </ul>
                    </form>
                </div>
                
                <div class="widget contarct-sec-ad">
                    <h6><?php echo app('translator')->getFromJson('home.Contract_duration'); ?></h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;"  class="duration" name="year" data-value="1" value="1"/> 1 <?php echo app('translator')->getFromJson('home.Year'); ?> </label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="2" value="2"/> 2 <?php echo app('translator')->getFromJson('home.Year'); ?> </label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="3" value="3"/> 3 <?php echo app('translator')->getFromJson('home.Year'); ?></label></li>
                            <li><label for="muhRadio4"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="4" value="4"/> 4 <?php echo app('translator')->getFromJson('home.Year'); ?></label></li>
                            <li><label for="muhRadio4"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="5" value="5"/> 5 <?php echo app('translator')->getFromJson('home.Year'); ?></label></li>
                            <li><label for="muhRadio5"><input type="checkbox" style="cursor: pointer;" class="duration" name="year" data-value="indefinite" value="indefinite"/> <?php echo app('translator')->getFromJson('home.Indefinitely'); ?></label></li>
                        </ul>
                    </form>
                </div>
                <div class="widget">
                    <h6><?php echo app('translator')->getFromJson('home.Rate_type'); ?></h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio6"><input type="checkbox" style="cursor: pointer;" class="price_type" name="price_type" value="fixed"/><?php echo app('translator')->getFromJson('home.Fixed_price'); ?></label></li>
                            <li><label for="muhRadio7"><input type="checkbox" style="cursor: pointer;" class="price_type" name="price_type" value="variable"/><?php echo app('translator')->getFromJson('home.Variable_price'); ?></label></li>
                            <li><label for="muhRadio8"><input type="checkbox" style="cursor: pointer;" class="price_type" name="price_type" value="combinatioin"/><?php echo app('translator')->getFromJson('home.combinatioin_of_both'); ?></label></li>
                        </ul>
                    </form>
                </div>
                
                

                <div class="widget">
                    <h6><?php echo app('translator')->getFromJson('home.Green_power'); ?></h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="green" name="green" value="100"/> <?php echo app('translator')->getFromJson('home.Yes'); ?> </label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="green" name="green" value="50"/><?php echo app('translator')->getFromJson('home.Yes_and_Belgian'); ?> </label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="green" name="green" value="0"/><?php echo app('translator')->getFromJson('home.No'); ?></label></li>
                        </ul>
                    </form>
                </div>
                <div class="widget">
                    <h6><?php echo app('translator')->getFromJson('home.Greenpeace_green'); ?></h6>
                    <form action="">
                        <ul>
                            <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="green_score" name="green_score" value="0.5"/> <?php echo app('translator')->getFromJson('home.At_least'); ?> 10/20 </label></li>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="green_score" name="green_score" value="0.75"/> <?php echo app('translator')->getFromJson('home.At_least'); ?> 15/20 </label></li>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="green_score" name="green_score" value="1"/> <?php echo app('translator')->getFromJson('home.At_least'); ?> 20/20</label></li>
                        </ul>
                    </form> 
                </div>
            </div>




            <script type="text/javascript">
                $(".form-group").on("click", function(event) {
                event.stopPropagation();
                $(".form-group>label").addClass("label_colors");
                });
                $(function () 
                {
                var onClass = "on";
                var showClass = "show";

                $("input, select")
                .bind("checkval", function () 
                {
                var label = $(this).prev("label");

                if (this.value !== "")
                label.addClass(showClass);

                else
                label.removeClass(showClass);
                })
                .on("keyup", function () 
                {
                $(this).trigger("checkval");
                })
                .on("focus", function () 
                {
                $(this).prev("label").addClass(onClass);
                })
                .on("blur", function () 
                {
                $(this).prev("label").removeClass(onClass);
                })
                .trigger("checkval");

                $("select")
                .on("change", function ()
                {
                var $this = $(this);

                if ($this.val() == "")
                $this.addClass("watermark");

                else
                $this.removeClass("watermark");

                $this.trigger("checkval");
                })
                .change();
                });
            </script>

            <script>
            $(document).ready(function(){
                // meter
                
                  var meterType=$('.meter').val();
                  var meterTypeInj=$('.meter_inj').val(); 
                  var digital=$('.digital').val(); 
                   
                  
                  if(meterType=='single'){
                       
                         $('.single').show();
                         $('.double').hide();
                         $('.single_excl_night').hide();
                         $('.double_excl_night').hide();
                      
                   }

                   if(meterTypeInj=='single'){
                       
                         $('.single_inj').show();
                         $('.double_inj').hide();
                         
                      
                   }

                  if(meterType=='double'){
                       
                        $('.double').show();
                        $('.single').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();
                  }
                  if(meterTypeInj=='double'){
                       
                        $('.double_inj').show();
                        $('.single_inj').hide();
                       
                  }
                  if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                  }
                   
                    if(meterType=='single_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.single_excl_night').show();
                        $('.double_excl_night').hide();
                        
                        
                  }

                  // if(digital=='digital'){

                  //   $('.digital_content').show();

                  // }else{

                  //   $('.digital_content').hide();

                  // }
                
                // end meter
                
                
                

                 var gas = $("input[name='gas']:checked").val();
                 var electricity = $("input[name='electricity']:checked").val();
               
                            if($('#gas').prop("checked") != true || $('#electricity').prop("checked") != true){
                            $("#submit1").attr('disabled', 'disabled'); 
                            }
                            if(gas=='true'||electricity!='true'){
                                    $("#submit1").attr('disabled', false); 
                            }else{
                                    $("#submit1").attr('disabled', true); 
                            }

                            if(gas=="true"){ 
                                 $(".meter").attr("required",false);
                            $("#consumtion_gas1").attr("required","required"); 
                            }

                            if(!gas){                        
                            $("#consumtion_gas1").removeAttr('required'); 

                            }  

                            if(electricity=="true"){
                                 $(".meter").attr("required",true);
                            }

                
            $('#electricity').change(function(){  
                    var electricity = $("input[name='electricity']:checked").val();              
                    if(electricity!=""){   
                         $(".meter").attr("required",true);
                        $('#elec-pri').show();
                    }
                    
                    if(typeof electricity==="undefined"){ 
                        $(".meter").attr("required",false); 
                         $('#elec-pri').hide();
                        
                    } 
            });
            
                
            $(document).on('click','#gas', function(){
                    var gas = $("input[name='gas']:checked").val(); 
                    console.log('gas',$(this).is(':checked'));
                        if($(this).is(':checked')){  
                            $('.gas-sel').show();
                           $("#consumtion_gas1").attr("required","required");
                           $("#select-gSupplier").attr("required","required");
                        }                    
                        else{     
                             $('.gas-sel').hide();
                           $("#consumtion_gas1").removeAttr('required');
                           $("#select-gSupplier").removeAttr('required');
                        }
            });


            $(document).on('click','#gas_p', function(){
                    var gas = $("input[name='gas']:checked").val(); 
                    console.log('gas',$(this).is(':checked'));
                        if($(this).is(':checked')){  
                            $('.gas-sel-p').show();
                           $(".consumtion_gas1p").attr("required","required");
                           $("#supplier_prof_g").attr("required","required");
                        }                    
                        else{     
                             $('.gas-sel-p').hide();
                           $(".consumtion_gas1p").removeAttr('required');
                           $("#supplier_prof_g").removeAttr('required');
                        }
            });
                
            $('#know').click(function(){
                    
                    $(".meter").attr("required","required");
                    $(".meter_type2").removeAttr('required');
                    var know = $("input[name='group1']:checked").val();                
                    if(know=="know_consuption"){                        
                        $("#consuption_day_elec2").removeAttr('required');
                        $("#consuption_night_elec2").removeAttr('required');                        
                        $("#consuption_day_elec1").attr("required","required");
                        $("#consuption_night_elec1").attr("required","required");                        
                    }
                    
                    if(know!="know_consuption"){                        
                       $("#consuption_day_elec1").removeAttr('required');
                       $("#consuption_night_elec1").removeAttr('required');                        
                        
                    }                   
                    
            });
                
            $('#knowpr').click(function(){
                    
                        $(".meter_pr_1").attr("required","required");
                        $(".meter_pr_2").removeAttr('required');
                        var know = $("input[name='group1_pr']:checked").val(); 
                    if(know=="know"){                        
                       $("#consuption_day_elecpr2").removeAttr('required');
                       $("#consuption_night_elecpr2").removeAttr('required');
                       $("#consuption_excl_nightpr2").removeAttr('required');
                       $("#consuptionpr2").removeAttr("required");                        
                       $("#consuption_day_elecpr1").attr("required","required");
                       $("#consuption_night_elecpr1").attr("required","required");
                        
                    }
                    
                    if(know!="know"){                        
                       $("#consuption_day_elecpr1").removeAttr('required');
                       $("#consuption_night_elecpr1").removeAttr('required'); 
                    }
                    
                    
            });
                
            $('#estimate').click(function(){
                    
                     $(".meter_type2").attr("required","required");
                     $(".meter").removeAttr('required');                    
                     var know = $("input[name='group1']:checked").val();                
                    if(know=="estimate_consuption"){                        
                       $("#consuption_day_elec1").removeAttr('required');
                       $("#consuption_night_elec1").removeAttr('required');                        
                       $("#consuption_day_elec2").attr("required","required");
                       $("#consuption_night_elec2").attr("required","required");                        
                    }
                    
                    if(know!="estimate_consuption"){                        
                       $("#consuption_day_elec2").removeAttr('required');
                       $("#consuption_night_elec2").removeAttr('required');
                    } 
            });
                
            $('#estimatepr').click(function(){

                     $(".meter_pr_2").attr("required","required");
                     $(".meter_pr_1").removeAttr('required');                    
                     var know = $("input[name='group1_pr']:checked").val();                
                     if(know=="estimate"){                        
                       $("#consuption_day_elecpr1").removeAttr('required');
                       $("#consuption_night_elecpr1").removeAttr('required');
                       $("#consuption_excl_nightpr1").removeAttr('required');
                       $("#consuptionpr1").removeAttr("required");                        
                       $("#consuption_day_elecpr2").attr("required","required");
                       $("#consuption_night_elecpr2").attr("required","required");                        
                     }
                    
                    if(know!="estimate"){                        
                       $("#consuption_day_elecpr2").removeAttr('required');
                       $("#consuption_night_elecpr2").removeAttr('required');
                       $("#consuptionpr1").removeAttr("required");
                       $("#consuption_excl_nightpr1").removeAttr('required');                       
                        
                    }                    
                    
            });

            $('.digital').click(function(){

                var myMeter=$(this).val();

                if(myMeter=='digital'){

                    $('.digital_content').show();

                }else{

                    $('.digital_content').hide();

                }
            });
                
               
            $('#electricity_pr1').change(function(){                    
                    
                    var electricity = $("input[name='electricity_pr1']:checked").val();
                    var gas = $("input[name='gas3']:checked").val();                
                    if(electricity!=""){
                        
                        $('#pro-ele').show();
                        $(".meter_pr_1").attr("required","required");
                      $("#consuption_day_elec1").attr("required","required");
                      $("#consuption_night_elec1").attr("required","required");
                        
                    }                    
                    if(!electricity){
                        $('#pro-ele').hide();
                      $(".meter_pr_1").removeAttr('required');
                      $("#consuption_day_elecpr1").removeAttr('required');
                      $("#consuption_night_elecpr1").removeAttr('required');                       
                        
                    }                    
                    if(gas=="" && electricity=="" ){
                    $("#submit_pr").attr('disabled','disabled'); 
                    }else{
                    $("#submit_pr").removeAttr('disabled');
                    }
                    
            }); 
            
             $('.electricity_pr1p').change(function(){                    
                    
                    var electricity = $("input[name='electricity_pr1p']:checked").val();
                    var gas = $("input[name='gasp']:checked").val();                
                    if(electricity!=""){
                        
                        $('#pro-ele').show();
                        $(".meter_pr_1").attr("required","required");
                      $("#consuption_day_elec1").attr("required","required");
                      $("#consuption_night_elec1").attr("required","required");
                        
                    }                    
                    if(!electricity){
                        $('#pro-ele').hide();
                      $(".meter_pr_1").removeAttr('required');
                      $("#consuption_day_elecpr1").removeAttr('required');
                      $("#consuption_night_elecpr1").removeAttr('required');                       
                        
                    }                    
                    if(gas=="" && electricity=="" ){
                    $("#submit_pr").attr('disabled','disabled'); 
                    }else{
                    $("#submit_pr").removeAttr('disabled');
                    }
                    
            });

            $('#gas3').change(function(){                  

            var gas = $("input[name='gas3']:checked").val();
            var electricity = $("input[name='electricity_pr1']:checked").val();                
            if(gas!=""){ 
            $('#pro-gas').show();
            $(".gas_cons_pr").attr("required","required");                        
            }                    
            if(!gas){ 
            $('#pro-gas').hide();
            $(".gas_cons_pr").removeAttr('required');
            }
            if(gas=="" && electricity=="" ){                      
            $("#submit_pr").attr('disabled',true);                     
            }else{
            $("#submit_pr").removeAttr('disabled');
            } 
            });                
                
        $('#cur_invoice').keyup(function(event){
        var currentValue=$('#cur_invoice').val();
        var cur_invoice_moth_year=$('#cur_invoice_moth_year').val();
        var po = $('#po').val();

        var year = [];
        $.each($("input[name='year']:checked"), function() {
            year.push($(this).val());
        });

        var price_type = [];
        $.each($("input[name='price_type']:checked"), function() {
            price_type.push($(this).val());
        });

        var green = [];
        $.each($("input[name='green']:checked"), function() {
            green.push($(this).val());
        });

        var green_score = [];
        $.each($("input[name='green_score']:checked"), function() {
            green_score.push($(this).val());
        });

        var ser_lim = [];
        $.each($("input[name='ser_lim']:checked"), function() {
            ser_lim.push($(this).val());
        });

        var disc = [];
        $.each($("input[name='disc']:checked"), function() {
            disc.push($(this).val());
        });



        $.ajax({
            url: '/get-data',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'currentValue':currentValue,
                'cur_invoice_moth_year':cur_invoice_moth_year
            },
            beforeSend: function() {

                // $("#main-data").hide();
                $("#ajax-loader").show();

            },
            complete: function() {

                // $("#main-data").show();
                $("#ajax-loader").hide();

            },
            success: function(data) {
                $('#packages').html(data);
                var count = $('.count').val();
                $('.tot_count').html(count);
                $('#Tpages').html(count);
                var pages = Math.ceil(count / 7);
                $('#totalPages').val(pages);
                $('#currentPage').val(1);

                if (pages == 1 || pages == 0) {
                    $('#hideload').hide();
                } else {
                    $('#hideload').show();
                }
                
               
            },
            error: function(e) {


            }
        });
                         
                                       
        });  
                
        $('.meter').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   
                   
                   if(meterType=='single'){
                       
                        $('.single').show();
                        $('.double').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();
                      
                   }
                   if(meterType=='double'){
                       
                        $('.double').show();
                        $('.single').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();
                   }
                   if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                        
                   }
                   
                    if(meterType=='single_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.single_excl_night').show();
                        $('.double_excl_night').hide();
                        
                        
                   }
                    
            });

        $('.meter_inj').change(function(){                    
                    
                   var meterTypeInj=$(this).val(); 
                   
                   
                   if(meterTypeInj=='single'){
                       
                        $('.single_inj').show();
                        $('.double_inj').hide();
                       
                      
                   }
                   if(meterTypeInj=='double'){
                       
                        $('.double_inj').show();
                        $('.single_inj').hide();
                        
                   }
                 
                    
            });
            
            
              $('.meterp').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   
                   
                   if(meterType=='single'){
                       
                        $('.single').show();
                        $('.double').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();
                      
                   }
                   if(meterType=='double'){
                       
                        $('.double').show();
                        $('.single').hide();
                        $('.single_excl_night').hide();
                        $('.double_excl_night').hide();
                   }
                   if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                        
                        
                   }
                    
            });
                
                
            $('.meter_pr_1').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   if(meterType=='single'){
                      
                        $('.single_pr1').show();
                        $('.double_pr1').hide();
                        $('.excl_night_pr1').hide();

                        $("#consuption_day_elecpr1").removeAttr('required');
                        $("#consuption_night_elecpr1").removeAttr('required');

                        $("#consuption_excl_nightpr1").removeAttr('required');
                        $("#consuptionpr1").attr("required","required");
                      
                   }
                   if(meterType=='double'){
                       
                        $('.double_pr1').show();
                        $('.single_pr1').hide();
                        $('.excl_night_pr1').hide();

                        $("#consuption_day_elecpr1").attr("required","required");
                        $("#consuption_night_elecpr1").attr("required","required");                      
                        $("#consuption_excl_nightpr1").removeAttr('required');
                        $("#consuptionpr1").removeAttr('required');
                   }
                   if(meterType=='excl_night'){
                       
                        $('.double_pr1').hide();
                        $('.single_pr1').hide();
                        $('.excl_night_pr1').show();

                        $("#consuption_day_elecpr1").removeAttr('required');
                        $("#consuption_night_elecpr1").removeAttr('required');                      
                        $("#consuption_excl_nightpr1").attr("required","required"); 
                        $("#consuptionpr1").removeAttr('required');
                   }
                    
            }); 
                
            $('.meter_type2').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   if(meterType=='single'){                      
                    $('.single_pr2').show();
                    $('.double_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elec2").removeAttr('required');
                    $("#consuption_night_elec2").removeAttr('required');
                    $("#consuption_excl_night2").removeAttr('required');
                    $("#consuption2").attr("required","required");
                      
                   }
                   if(meterType=='double'){
                       
                    $('.double_pr2').show();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elec2").attr("required","required");
                    $("#consuption_night_elec2").attr("required","required");                      
                    $("#consuption_excl_night2").removeAttr('required');
                    $("#consuption2").removeAttr('required');
                   }
                   if(meterType=='excl_night'){
                       
                    $('.double_pr2').hide();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').show();
                    $("#consuption_day_elec2").removeAttr('required');
                    $("#consuption_night_elec2").removeAttr('required');                      
                    $("#consuption_excl_night2").attr("required","required"); 
                    $("#consuption2").removeAttr('required');
                   }
                    
            });                
                
            $('.meter_pr_2').change(function(){                    
                    
                   var meterType=$(this).val(); 
                   if(meterType=='single'){                      
                    $('.single_pr2').show();
                    $('.double_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elecpr2").removeAttr('required');
                    $("#consuption_night_elecpr2").removeAttr('required');
                    $("#consuption_excl_nightpr2").removeAttr('required');
                    $("#consuptionpr2").attr("required","required");
                      
                   }
                   if(meterType=='double'){
                       
                    $('.double_pr2').show();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').hide();
                    $("#consuption_day_elecpr2").attr("required","required");
                    $("#consuption_night_elecpr2").attr("required","required");                      
                    $("#consuption_excl_nightpr2").removeAttr('required');
                    $("#consuptionpr2").removeAttr('required');

                   }
                   if(meterType=='excl_night'){                       
                    $('.double_pr2').hide();
                    $('.single_pr2').hide();
                    $('.excl_night_pr2').show();
                    $("#consuption_day_elecpr2").removeAttr('required');
                    $("#consuption_night_elecpr2").removeAttr('required');                      
                    $("#consuption_excl_nightpr2").attr("required","required"); 
                    $("#consuptionpr2").removeAttr('required');
                   }
                    
            }); 
                
                    $(".widget").click(function(){                      
                    }).find('li').click(function(e){                     
                    var chk=$(this).hasClass("active-bold");
                    if(chk==true){
                    $(this).removeClass('active-bold');
                    }else{ 
                    $(this).addClass('active-bold');
                    }                     
                    });
    });    
                
           
    
    jQuery(document).ready(function() { 
        
        
       // municipality check
        
          var po=$('.po').val();
          var mun=$('.mun').val();
          
          
         
            $('.po-error-msg').hide(); 
            $('.po-load').show();
            $.ajax({
                url: '<?php echo e(url('check-po')); ?>',
                type: 'GET',
                data: {'po':po,'mun':mun},
                beforeSend: function() {

                // $("#main-data").hide();
                $('.po-error-msg').hide();
                 $(".po-loader").show();
                 

            },
            complete: function() {
                $(".po-loader").hide();
                // $("#main-data").show();
                // $("#ajax-loader").hide();

            },
                success: function(data) {                    
                  //  console.log(data['available']);                
              if(data['available']=='false'){                  
                    if(po==""){
                    $('.po-error-msg').hide(); 
                    $('#submit1').prop('disabled', false);
                    }else{

                    $('.po-error-msg').show();
                    $('#submit1').prop('disabled', true);
                    $('#submit_pr').prop('disabled', true);                
                    }

                    $('#sub-po').html('');
                    $('.sub-po').html('');
              }else{
                    if(data['sub']=='true'){                         
                        $('#sub-po').html(data['sub_po']); 
                        $('.sub-po').html(data['sub_po']);
                    }else{   
                        $('#sub-po').html('');                      
                    }
                        $('.po-error-msg').hide();
                        $('#submit1').prop('disabled', false);
                        $('#submit_pr').prop('disabled', false);                   
              }
                
                $('.po-load').hide();
                },
                error: function(e) {
                // console.log(e.message);
                }
            });
        
        // municipality -check end
        
        
        $('#dec_pro').on('change', function() {
        var val = this.checked ? this.value : '';
      
         if(val){
          $('#dec_pro_data').show(); 
            }else{
                
                $('#dec_pro_data').hide();
                $('.capacity_decen_pro').val("0");
                
            }
        });
        
        $('#dec_pro1').on('change', function() {
        var val = this.checked ? this.value : '';
      
         if(val){
          $('#dec_pro_data1').show(); 
            }else{
                
                $('#dec_pro_data1').hide();
                $('.capacity_decen_pro1').val("0");
                
            }
        });

          $('.po').keyup(function(event){        
            var po=$(this).val();
            $('.po-error-msg').hide(); 
            $('.po-load').show();
            $.ajax({
                url: '<?php echo e(url('check-po')); ?>',
                type: 'GET',
                data: {'po':po},
                beforeSend: function() {

                // $("#main-data").hide();
                $('.po-error-msg').hide();
                 $(".po-loader").show();
                 

            },
            complete: function() {
                $(".po-loader").hide();
                // $("#main-data").show();
                // $("#ajax-loader").hide();

            },
                success: function(data) {                    
                  //  console.log(data['available']);                
              if(data['available']=='false'){                  
                    if(po==""){
                    $('.po-error-msg').hide(); 
                    $('#submit1').prop('disabled', false);
                    }else{

                    $('.po-error-msg').show();
                    $('#submit1').prop('disabled', true);
                    $('#submit_pr').prop('disabled', true);                
                    }

                    $('#sub-po').html('');
                    $('.sub-po').html('');
              }else{
                    if(data['sub']=='true'){                         
                        $('#sub-po').html(data['sub_po']); 
                        $('.sub-po').html(data['sub_po']);
                    }else{   
                        $('#sub-po').html('');  
                        $('.sub-po').html('');
                    }
                        $('.po-error-msg').hide();
                        $('#submit1').prop('disabled', false);
                        $('#submit_pr').prop('disabled', false);                   
              }
                
                $('.po-load').hide();
                },
                error: function(e) {
                // console.log(e.message);
                }
            });  
        
        
         }); 

       $("[rel=tooltip]").tooltip({ placement: 'top'});
       
       $('#submit_pr').click(function(e){
           
           var electricity = $("input[name='electricity_pr1p']:checked").val();
           var gas = $("input[name='gasp']:checked").val();
           
           
             var postalcode=$('.po').val();
            
            
            var includeE=$('#electricity_pr1p').val();
            
            var meterType=$('.meterp').val();
            
            var single=$('.consuption1p').val();
            
            var day=$('.consuption_day_elec1p').val();
            var night=$('.consuption_night_elec1p').val();
            
            var single_excl=$('.consuption1sep').val();
            var excl_night_single=$('.consuption_excl_nightsep').val();
            
            
            var day_excl=$('.consuption_day_elec1dep').val();
            var night_excl=$('.consuption_night_elec1dep').val();
            var excl_night_double=$('.consuption_excl_nightdep').val();
            
            var includeG=$('#gas_p').val();
            var gas_cunsum=$('#consumtion_gas1p').val();
            
      
            
            if(!postalcode){
                
                $('.por').addClass('required-red');
                e.preventDefault();
            }
            
            
            if(electricity=='true'){
                    
                    if(meterType=='single' && electricity=='true'){
                        
                        if(!single){
                            
                             $('.consuption1rp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                   
                    if(meterType=='double' && electricity=='true'){
                        
                        if(!day){
                            
                             $('.consuption_day_elec1rp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night){
                            
                             $('.consuption_night_elec1rp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                    
                    if(meterType=='single_excl_night'  && electricity=='true'){
                        
                        if(!single_excl){
                            
                             $('.consuption1serp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_single){
                            
                             $('.consuption_excl_nightserp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                    
                     if(meterType=='double_excl_night'  && electricity=='true'){
                        
                        if(!day_excl){
                            
                             $('.consuption_day_elec1derp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night_excl){
                            
                             $('.consuption_night_elec1derp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_double){
                            
                             $('.consuption_excl_nightderp').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }
                
                
                
            }
            
           
            if(gas=='true'){
                
                if(!gas_cuns=="" && gas=='true'){
                    $('.consumtion_gas1rp').addClass('required-red');
                            e.preventDefault();
                    
                }
                
                
                
            }
           
          
        });


        $('#submit1').click(function(e){
            
            
            var postalcode=$('.po').val();
            
            
            var includeE=$('#electricity').val();
            
            var meterType=$('.meter').val();

            var meterTypeInj=$('.meter_inj').val();
            
            var single=$('.consuption1').val();
            var single_inj=$('.consuption1_inj').val();
            
            var day=$('.consuption_day_elec1').val();
            var night=$('.consuption_night_elec1').val();

            var day_inj=$('.consuption_day_elec1_inj').val();
            var night_inj=$('.consuption_night_elec1_inj').val();
            
            var single_excl=$('.consuption1se').val();
            var excl_night_single=$('.consuption_excl_nightse').val();
            
            
            var day_excl=$('.consuption_day_elec1de').val();
            var night_excl=$('.consuption_night_elec1de').val();
            var excl_night_double=$('.consuption_excl_nightde').val();
            
            var includeG=$('#gas').val();
            var gas_cunsum=$('#consumtion_gas1').val();
            
                var electricity = $("input[name='electricity']:checked").val();
          var gas = $("input[name='gas']:checked").val();  
            
            // .required-red
            
            if(!postalcode){
                
                $('.por').addClass('required-red');
                e.preventDefault();
            }
            
            
            if(electricity=='true'){
                
               
                   
                    if(meterType=='single' && electricity=='true'){
                        
                        if(!single){
                            
                             $('.consuption1r').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }

                    if(meterTypeInj=='single' && electricity=='true'){
                        
                        if(!single_inj){
                            
                             $('.consuption1r_inj').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        
                    }


                   
                    if(meterType=='double' && electricity=='true'){
                        
                        if(!day){
                            
                             $('.consuption_day_elec1r').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night){
                            
                             $('.consuption_night_elec1r').addClass('required-red');
                            e.preventDefault();
                        }
                    }

                    if(meterTypeInj=='double' && electricity=='true'){
                        
                        if(!day_inj){
                            
                             $('.consuption_day_elec1r_inj').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night_inj){
                            
                             $('.consuption_night_elec1r_inj').addClass('required-red');
                            e.preventDefault();
                        }
                    }
                    
                    if(meterType=='single_excl_night'  && electricity=='true'){
                        if(!single_excl){
                             $('.consuption1ser').addClass('required-red');
                            e.preventDefault();
                        }
                        if(!excl_night_single){
                            
                             $('.consuption_excl_nightser').addClass('required-red');
                            e.preventDefault();
                        }
                    }
                    
                     if(meterType=='double_excl_night'  && electricity=='true'){
                        
                        if(!day_excl){
                            
                             $('.consuption_day_elec1der').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!night_excl){
                            
                             $('.consuption_night_elec1der').addClass('required-red');
                            e.preventDefault();
                            
                        }
                        if(!excl_night_double){
                            
                             $('.consuption_excl_nightder').addClass('required-red');
                            e.preventDefault();
                        }
                    }
            }
           
            if(gas==true){
                
                if(!gas_cuns=="" && gas==true){
                    $('.consumtion_gas1r').addClass('required-red');
                            e.preventDefault();
                    
                }
            }
         });
    });
    </script>
    
        <script>
        function myFunctionCalculate() {
        var x,text;
        x = document.getElementById("postId").value;

        if (x == "") {
        text = "Postcode is verplicht";
        document.getElementById("calculationMessage").innerHTML = text;
        document.getElementById("calculationMessage").style.display = "block";
        return false;
        }  

        }
        var input = document.getElementById('postId');
        var div = document.getElementById('calculationMessage');
        input.addEventListener('keypress', function() {
        div.style.display = "none";
        });

        </script>
    
        <script>

        function myFunctionCalculate1() {
        var y,text;
        y = document.getElementById("post_pr").value;
        if (y == "") {
        text = "Postcode is verplicht";
        document.getElementById("calculationResult").innerHTML = text;
        document.getElementById("calculationResult").style.display = "block";
        return false;
        } 
        }

        var input = document.getElementById('post_pr');
        var div = document.getElementById('calculationResult');
        input.addEventListener('keypress', function() {
        div.style.display = "none";
        });
        $('.modal').on('shown.bs.modal', function (e) {
        $('html').addClass('freezePage'); 
        $('body').addClass('freezePage');
        });
        $('.modal').on('hidden.bs.modal', function (e) {
        $('html').removeClass('freezePage');
        $('body').removeClass('freezePage');
        });

        $(document).on('change','#supplier_res_e', function(){ 
        var esupply = $(this).val();
        console.log(esupply);
        if ($(this).hasClass('watermark') == false) {
        $('#supplier_res_g').removeClass('watermark').val(esupply);

        }
        });
        $(document).on('change','#supplier_prof_e', function(){ 
        var supplyp = $(this).val();
        console.log(supplyp);
        if ($(this).hasClass('watermark') == false) {
        $('#supplier_prof_g').removeClass('watermark').val(supplyp);

        }
        });

         $(document).on('click','#history-check', function(){

             var date=$('#historicalcheck').val();
            // $('.history_date').val(date);
            // if(date){
            // alert(date);
            // }
            // $("#tabform1").submit();
            $('.his-sub-error').hide();
            $('.historicalPriceError').hide();
            $('.historicalPrice').hide();
            if(date){

            var locale=$('.locale').val();
            var postalCode=$('.postalCode').val();
            var customerGroup=$('.customerGroup').val();
            var first_residence=$('.first_residence').val();

            var IncludeG=$('.IncludeG').val();
            var IncludeE=$('.IncludeE').val();

            var meterType=$('.meterType').val();

            var registerNormal=$('.registerNormal').val();
            var registerDay=$('.registerDay').val();
            var registerNight=$('.registerNight').val();
            var registerExclNight=$('.registerExclNight').val();

            var registerG=$('.registerG').val();



            
            
            var uuid=$('.uuid').val();

            // var history_date='2021-02-10';
            var history_date=$('#historicalcheck').val();

            $('.part-2').removeClass('col-md-5');
            $('.part-2').addClass('col-md-3');
            $('.part-3').show();
            


            var inputs = $(".histProId");
            for(var i = 0; i < inputs.length; i++){
            
                var product_id=$(inputs[i]).val();
                

                    $.ajax({
                    url: '/get-history',
                    type: 'GET',
                    data: {
                        'locale': locale,
                        'postalCode': postalCode,
                        'customerGroup': customerGroup,
                        'first_residence': first_residence,
                        'registerNormal': registerNormal,
                        'registerDay': registerDay,
                        'registerNight': registerNight,
                        'registerExclNight': registerExclNight,
                        'registerG': registerG,
                        'meterType': meterType,
                        'IncludeG':IncludeG,
                        'IncludeE':IncludeE,
                        'uuid':uuid,
                        'history_date':history_date,
                        'product_id':product_id
                    },
                    beforeSend: function() {

                        // $("#main-data").hide();
                        $('.historicalPrice'+product_id).hide();
                         $(".historicalLoading"+product_id).show();

                    },
                    complete: function() {

                        // $("#main-data").show();
                        

                    },
                    success: function(data) {
                       
                            if(data.price){
                                $('.historicalPrice'+data.product_id).show();
                                   $('.b'+data.product_id).html(data.price[1]);
                                 $('.a'+data.product_id).html(data.price[0]);
                                 $('.historicalLoading'+data.product_id).hide();

                                 var impact_evolution_market_live=$('.impact_evolution_market_live'+data.product_id).val();

                                 var im_ev_market_final=(impact_evolution_market_live-(data.sn['impact_evolution_market']).toFixed(2)).toFixed(2);
                                 

                                 var total_impact=im_ev_market_final+data.sn['impact_fixed_fee']+data.sn['impact_discount'];


                                 if(im_ev_market_final>=0){

                                    var sen="A1";
                                    $('.a1'+data.product_id).show();
                                    $('.a2'+data.product_id).hide();
                                    $('.b1'+data.product_id).hide();
                                    $('.b2'+data.product_id).hide();

                                 }else if(im_ev_market_final<0 && total_impact>0){

                                    var sen="A1";
                                    $('.a1'+data.product_id).hide();
                                    $('.a2'+data.product_id).show();
                                    $('.b1'+data.product_id).hide();
                                    $('.b2'+data.product_id).hide();

                                 }else if(im_ev_market_final<0 && total_impact<0 && data.sn['impact_discount']==0){

                                    var sen="B1";
                                    $('.a1'+data.product_id).hide();
                                    $('.a2'+data.product_id).hide();
                                    $('.b1'+data.product_id).show();
                                    $('.b2'+data.product_id).hide();

                                 }else if(im_ev_market_final<0 && total_impact<0 && data.sn['impact_discount']!=0){

                                    var sen="B2";
                                    $('.a1'+data.product_id).hide();
                                    $('.a2'+data.product_id).hide();
                                    $('.b1'+data.product_id).hide();
                                    $('.b2'+data.product_id).show();
                                 }

                                $('.scenario'+data.product_id).val(sen);
                                console.log(data.price);
                            }else{
                                $('.historicalLoading'+data.product_id).hide();
                                $('.herror'+data.product_id).show();
                                $('.a1'+data.product_id).hide();
                                $('.a2'+data.product_id).hide();
                                $('.b1'+data.product_id).hide();
                                $('.b2'+data.product_id).hide();
                            }
                       
                    },
                    error: function(e) {


                    }
                    });

            }

            }else{

            $('.his-sub-error').show();
        }

            

         });


        </script>
    