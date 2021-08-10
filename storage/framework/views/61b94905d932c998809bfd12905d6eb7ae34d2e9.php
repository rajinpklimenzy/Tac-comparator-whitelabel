<!DOCTYPE html>
<?php echo $__env->make('home.includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



<!--end modal style-->
<div id="tac-data"> 
    <div class="container-fluid header-text-content" style="background-image: url('/images/<?php echo e($sort_banner_image->banner_image); ?>'); background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="header">
                        <div class="content text-center">
                          <?php
                          $x1=null;
                         $param=Session::get('getParameters');
                            $string = trans("home.sort_page");
                            $replace = ['{X1}','{X2}','{X3}'];
                            if($param['parameters']['values']['comparison_type']=='pack'){
                            $x1=trans("home.dual_fuel");
                            }elseif($param['parameters']['values']['comparison_type']=='electricity'){
                            $x1=trans("home.Electricity");
                            }elseif($param['parameters']['values']['comparison_type']=='gas'){
                            $x1=trans("home.Gas");
                            }
                            $month=date("F");
                            if($month=='January'){
                            $x2=trans("home.1");
                            }
                            if($month=='February'){
                            $x2=trans("home.2");
                            }
                            if($month=='March'){
                            $x2=trans("home.3");
                            }
                            if($month=='April'){
                            $x2=trans("home.4");
                            }
                            if($month=='May'){
                            $x2=trans("home.5");
                            }
                            if($month=='June'){
                            $x2=trans("home.6");
                            }
                            if($month=='July'){
                            $x2=trans("home.7");
                            }
                            if($month=='August'){
                            $x2=trans("home.8");
                            }
                            if($month=='September'){
                            $x2=trans("home.9");
                            }
                            if($month=='October'){
                            $x2=trans("home.10");
                            }
                            if($month=='November'){
                            $x2=trans("home.11");
                            }
                            if($month=='December'){
                            $x2=trans("home.12");
                            }
                            $x3=date("Y");
                            $info = [
                            'X1' => $x1,
                            'X2'  => $x2,
                            'X3'   => $x3,
                            ];
                          ?>
                            <h3><?php echo str_replace($replace, $info, $string); ?><br>
                          <?php
                            $string1 = trans("home.sort_banner");
                            $replace1 = ['{X4}'];
                            $info1 = [
                            'X4' => '450',
                            ];
                          ?>
                            <span class="banner-text-1"><?php echo e(str_replace($replace1, $info1, $string1)); ?></span><br>
                          <?php
                          $customer_type=Session::get('customer_type');
                            $string2 = trans("home.sort_banner_last");
                            $replace2 = ['{X5}','{X6}'];
                            if($customer_type =='residential'){
                            $x6= trans("home.x6_res");
                            $x5= trans("home.x5_res");
                            } else{
                            $x6= trans("home.x6_pro");
                            $x5= trans("home.x5_pro");
                            }
                            $info2 = [
                            'X5' => $x5,
                            'X6'  => $x6,                              
                            ];
                          ?>
                        <span class="banner-text-2"><?php echo e(str_replace($replace2, $info2, $string2)); ?></span>
                        </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-2">
        <div class="container" id="main-data">
            <div class="row sec-2">
                <?php echo $__env->make('home.includes.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <input type="hidden" value="<?php echo e($po); ?>" id="po" >
                <div class="col-md-9 col-lg-9 col-sm-9 right-sec">
                    <div id="seperated" style="display:none;">
                        <div class="row head-1">
                            <div class="col-md-3 col-3 electricity electric_tab" id="elec_tab" style="cursor: pointer;">
                                <h5><i class="fa fa-bolt"></i> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <span class="ele-no "><?php echo e(Session::get('elec_count')); ?></span></h5>
                            </div>
                            <div class="col-md-3 col-3  gas gas_tab" id="gas_tab" style="cursor: pointer;">
                                <h5><i class="fa fa-fire"></i> <?php echo app('translator')->getFromJson('home.Gas'); ?> <span class="gas-no "><?php echo e(Session::get('gas_count')); ?></span></h5>
                            </div>
                            <div class="col-md-5 text-right seperate-popup button-sec-2">
                                  <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal12"><i class="fa fa-envelope"></i> <?php echo app('translator')->getFromJson('home.Email_me'); ?></button>
                                    <div class="modal fade" id="exampleModal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                       <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->getFromJson('home.Email_me'); ?></h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                               <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                      <p class="modal-p">
                                      <?php echo app('translator')->getFromJson('home.Please_enter'); ?>
                                      </p>
                                          <form method="POST" action="<?php echo e(route('send-deals')); ?>" enctype="multipart/form-data">
                                          <?php echo e(csrf_field()); ?>

                                          <div class="modal-body">

                                          <div class="form-group">
                                          <label for="recipient-name" class="col-form-label"> <?php echo app('translator')->getFromJson('home.Email_Address'); ?></label>
                                          <input type="email" class="form-control recipient-name" id="recipient-name" name="recipient" value="<?php echo e(old('recipient')); ?>" required="required">
                                          
                                          </div>
                                            <p class="error_email" id="error_email" style="color: red;"></p>
                                          </div>

                                          <div class="checkbox-sec">
                                          <label class="container-1">
                                          <input aria-label="send deals" type="checkbox">
                                          <span class="checkmark"></span>
                                          </label>
                                          <p><?php echo app('translator')->getFromJson('home.I_would_like'); ?></p>
                                          </div>
                                          <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary" name="submit" id="send"><?php echo app('translator')->getFromJson('home.Send'); ?></button>
                                          </div>
                                          </form>
                                          <p class="text-center footer-p"><?php echo app('translator')->getFromJson('home.We_never_give'); ?></p>
                                          </div>
                                        </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row sec-hide" style="margin-bottom: 15px;">
                        <div class="col-md-8">
                            <div class="sec-hide">
                                <?php if($getParameters['parameters']['values']['comparison_type']=='gas'): ?>
                                 <h3><span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals_gas'); ?></h3>
                                <?php elseif($getParameters['parameters']['values']['comparison_type']=='electricity'): ?>
                                 <h3><span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals_elec'); ?></h3>
                                <?php else: ?>
                                
                                 <h3><span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals'); ?></h3>
                                <?php endif; ?>
                             
                              <input type="hidden" id="totalPages"  value="<?php echo e($totalPages); ?>" />
                              <input type="hidden" id="currentPage" value="<?php echo e($currentPage); ?>" />
                              <input type="hidden" id="TPage" value="<?php echo e($totalProducts); ?>" />
                            </div>
                            <div class=" second-sec sec-show" style="display: none;">
                              <div class=" second-sec-left">
                                <p class="electricity-title" style="display:none"><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                                <p class="gas-title" style="display:none" ><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                              </div>
                            </div>
                      </div>  
                      <div class="col-md-4">
                        <div class="second-sec-right text-right sec-show bunddle-sec" style="display: none;">
                          <div class="dropdown-sort" >
                            <p><b><?php echo app('translator')->getFromJson('home.SORT_BY'); ?></b>
                              <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                <option value="high"><?php echo app('translator')->getFromJson('home.Low_To_High'); ?></option>
                                <option value="low"><?php echo app('translator')->getFromJson('home.High_To_Low'); ?></option>
                                <option value="most" ><?php echo app('translator')->getFromJson('home.Most_chosen'); ?></option>
                              </select>
                            </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 button-sec-2 pack-popup text-right sec-hide">
                          <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope"></i> <?php echo app('translator')->getFromJson('home.Email_me'); ?></button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->getFromJson('home.Email_me'); ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                <p class="modal-p">
                                <?php echo app('translator')->getFromJson('home.Please_enter'); ?>
                                </p>
                                  <form method="POST" action="<?php echo e(route('send-deals')); ?>" enctype="multipart/form-data">
                                  <?php echo e(csrf_field()); ?>

                                  <div class="modal-body">
                                  <div class="form-group <?php echo e($errors->has('recipient') ? ' has-danger' : ''); ?>">
                                  <label for="recipient-name" class="col-form-label" id="email-label"> <?php echo app('translator')->getFromJson('home.Email_Address'); ?></label>
                                  <input type="email" class="form-control recipient-name" id="recipient-name" name="recipient" value="<?php echo e(old('recipient')); ?>" required="required">
                                  
                                  </div>
                                  <p class="error_email" id="error_email" style="color: red;"></p>
                                  </div>
                                  <div class="checkbox-sec">
                                  <label class="container-1">
                                  <input aria-label="send deals" type="checkbox">
                                  <span class="checkmark"></span>
                                  </label>
                                  <p><?php echo app('translator')->getFromJson('home.I_would_like'); ?></p>
                                  </div>
                                  <div class="modal-footer">
                                  <button type="submit" class="btn btn-primary" name="submit" id="send"><?php echo app('translator')->getFromJson('home.Send'); ?></button>
                                  </div>
                                  </form>
                                   <p class="text-center footer-p"><?php echo app('translator')->getFromJson('home.We_never_give'); ?></p>
                                 </div>
                                </div>
                            </div>
                          </div>
                       
                        </div>
                      </div>
                      </div>
                    <div class="row sec-show second-ele-gas" style="display: none;">
                        <div class="col-md-8">
                          <div class="sec-hide">
                            <h3><?php echo app('translator')->getFromJson('home.Found'); ?> <span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals_gas'); ?></h3>
                            <input type="hidden" id="totalPages"  value="<?php echo e($totalPages); ?>" />
                            <input type="hidden" id="currentPage" value="<?php echo e($currentPage); ?>" />
                            <input type="hidden" id="TPage" value="<?php echo e($totalProducts); ?>" />
                          </div>
                          <div class=" second-sec sec-show" style="display: none;">
                            <div class=" second-sec-left">
                              <div id="pro-select"></div>
                              <p class="electricity-title" style="display:none"><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                              <p class="gas-title" style="display:none" ><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                            </div>
                          </div>
                        </div> 
                    <div class="col-md-4">
                    <div class="second-sec-right text-right sec-show bunddle-sec" style="display: none;">
                            <div class="dropdown-sort dropdown-sort-2 " >
                                <p><b><?php echo app('translator')->getFromJson('home.SORT_BY'); ?></b>
                                    <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                        <option value="high"><?php echo app('translator')->getFromJson('home.Low_To_High'); ?></option>
                                        <option value="low"><?php echo app('translator')->getFromJson('home.High_To_Low'); ?></option>
                                        <option value="most" ><?php echo app('translator')->getFromJson('home.Most_chosen'); ?></option>
                                    </select>
                                </p>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 button-sec-2 text-right sec-hide">
                            <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-envelope"></i> <?php echo app('translator')->getFromJson('home.Email_me'); ?></button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                   <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel"><?php echo app('translator')->getFromJson('home.Email_me'); ?></h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                  <p class="modal-p">
                                  <?php echo app('translator')->getFromJson('home.Please_enter'); ?>
                                  </p>
                                      <form method="POST" action="<?php echo e(route('send-deals')); ?>" enctype="multipart/form-data">
                                      <?php echo e(csrf_field()); ?>

                                      <div class="modal-body">

                                      <div class="form-group">
                                      <label for="recipient-name" class="col-form-label"> <?php echo app('translator')->getFromJson('home.Email_Address'); ?></label>
                                      <input type="email" class="form-control recipient-name" id="recipient-name" name="recipient" value="<?php echo e(old('recipient')); ?>" required="required">
                                      
                                      </div>
                                        <p class="error_email" id="error_email" style="color: red;"></p>
                                      </div>

                                      <div class="checkbox-sec">
                                      <label class="container-1">
                                      <input aria-label="send deals" type="checkbox">
                                      <span class="checkmark"></span>
                                      </label>
                                      <p><?php echo app('translator')->getFromJson('home.I_would_like'); ?></p>
                                      </div>
                                      <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="submit" id="send"><?php echo app('translator')->getFromJson('home.Send'); ?></button>
                                      </div>
                                      </form>
                                      <p class="text-center footer-p"><?php echo app('translator')->getFromJson('home.We_never_give'); ?></p>
                                      </div>
                                    </div>
                              </div>
                        </div>
                        
                    </div>
                    </div>
                    </div>
                    <?php $getParameters=Session::get('getParameters');   ?>
                    <div class="row second-sec sec-hide">
                        <div class="col-md-8 col-sm-3 second-sec-left">  
                            <?php if($getParameters['parameters']['values']['comparison_type']=='gas'): ?>
                             <p class="gas-title" ><?php echo app('translator')->getFromJson('home.now_please_select_plan_for_gas'); ?></p>
                            <?php else: ?>                            
                             <p><?php echo app('translator')->getFromJson('home.do_not_wait_reuests'); ?></p>                             
                            <?php endif; ?>
                        </div>   
                        <div class="col-md-4 text-right" style="padding-right: 0;">
                          <div class="dropdown-sort" data-target="el-3">
                                <p><b><?php echo e(ucfirst(trans('home.SORT_BY'))); ?> :</b>
                                    <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                          <option value="high"><?php echo app('translator')->getFromJson('home.Low_To_High'); ?></option>
                                        <option value="low"><?php echo app('translator')->getFromJson('home.High_To_Low'); ?></option>
                                        <option value="most" ><?php echo app('translator')->getFromJson('home.Most_chosen'); ?></option>
                                        
                                    </select>
                                </p>
                            </div>
                        </div>                
                    </div>
                    <?php 
Session::put('uuid',$getParameters['parameters']['uuid']);
Session::put('customer_group',$getParameters['parameters']['values']['customer_group']);
Session::put('region',$getParameters['parameters']['values']['region']);
Session::put('usage_single',$getParameters['parameters']['values']['usage_single']);
Session::put('usage_day',$getParameters['parameters']['values']['usage_day']);
Session::put('usage_night',$getParameters['parameters']['values']['usage_night']);
Session::put('usage_excl_night',$getParameters['parameters']['values']['usage_excl_night']);
Session::put('usage_gas',$getParameters['parameters']['values']['usage_gas']);
Session::put('meter_type',$getParameters['parameters']['values']['meter_type']);
Session::put('comparison_type',$getParameters['parameters']['values']['comparison_type']);
                    ?>
                    <div id="packages">   
                        <?php $gas="0"; $elec="0"; $si="0"; $totalProducts=$totalProducts;
                          $postal_code=$getParameters['parameters']['values']['postal_code'];
                        ?>                      
                          <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php  $si++; 
                              ?>
                              <!-- Start of listing-1 -->
                              <?php echo \View::make('elements.product-item', compact('totalProducts','getdetails', 'customer_type', 'postal_code','si','packType','feature','min','service'))->render(); ?>

                              <!-- End of listing-1 -->
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                    </div>
                      <div class="row load-more" id="hideload">
                        <div class="col-md-12 load-more-sec">                           
                            <a href="#" id="loadMore" ><?php echo app('translator')->getFromJson('home.load_more_deals'); ?>...</a>
                                <button class="btn btn-primary load-more-sec more-loader" type="button" disabled style="display:none;">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                <?php echo app('translator')->getFromJson('home.load_more_deals'); ?>...
                                </button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</div>
<div class="slide-up">
        <div id="comp-items">
                    <div class="compare-sec" style="display:none;">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 sec-part-1">
                                  <span class="com-button">
                                  <?php echo app('translator')->getFromJson('home.Compare_plans'); ?> <i class="fa fa-chevron-up"></i>
                                  </span>
                                </div>
                                <div class="col-md-3 sec-part-2">
                                  <div class="selected-span">
                                    <span><?php echo app('translator')->getFromJson('home.select'); ?> "<?php echo app('translator')->getFromJson('home.Compare'); ?>" <?php echo app('translator')->getFromJson('home.above'); ?></span>	
                                  </div>
                                </div>
                                <div class="col-md-3 sec-part-3">
                                  <div class="selected-span">
                                    <span><?php echo app('translator')->getFromJson('home.select'); ?> "<?php echo app('translator')->getFromJson('home.Compare'); ?>" <?php echo app('translator')->getFromJson('home.above'); ?></span>	
                                  </div>
                                </div>
                                <div class="col-md-3 sec-part-4">
                                  <div class="selected-span">
                                  <span><?php echo app('translator')->getFromJson('home.select'); ?> "<?php echo app('translator')->getFromJson('home.Compare'); ?>" <?php echo app('translator')->getFromJson('home.above'); ?></span>	
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
          <div class="slide-sec" id="slide-sec">
      </div>
</div>


    <!--loading-->

<div id="loading" style="display:none;">
        <div class="animation-sec"  >
            <div class="container">
                <div class="row">
                    <div class="col-md-3 data-col">
                        <div class="data-sec">
                            <h2><?php echo app('translator')->getFromJson('home.Your_Data'); ?></h2>
                           



                           <div class="type">
                <span class="icon"><i class="fa fa-home"></i></span>
                <span>
                    <p>Type</p>
                     
                 
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
                                <span class="change-sec-btn"><?php echo app('translator')->getFromJson('home.change'); ?></span>
                            </div>
                        </div>

                        <div class="animation-1">
                            <div id="container">
                                <div id="seven"></div>
                                <div id="seven" class="seven"></div>
                                <div id="four"></div>
                                <div id="six"></div>
                                <div id="five"></div>
                                <div id="nine"></div>
                                <div id="ten"></div>
                                <div id="eleven"></div>
                                <div id="twelve"></div>
                                <div id="thirteen"></div>
                                <div id="fourteen"></div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 ani-sec">
                        <h4><?php echo app('translator')->getFromJson('home.loading_text'); ?></h4>
                        <div class="animation">
                            <div class="animationLoading">
                                <div id="container">
                                    <div id="seven"></div>
                                    <div id="one"></div>
                                    <div id="two"></div>
                                    <div id="three"></div>
                                    <div id="eight"></div>
                                </div>
                            </div>
                        </div>
                        <div class="animation">
                            <div class="animationLoading">
                                <div id="container">
                                    <div id="seven"></div>
                                    <div id="one"></div>
                                    <div id="two"></div>
                                    <div id="three"></div>
                                    <div id="eight"></div>
                                </div>
                            </div>
                        </div>
                        <div class="animation">
                            <div class="animationLoading">
                                <div id="container">
                                    <div id="seven"></div>
                                    <div id="one"></div>
                                    <div id="two"></div>
                                    <div id="three"></div>
                                    <div id="eight"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
</div>
    <!--loading end-->



  <?php $arr=Session::get('select-pro');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
Session::put('urls',$actual_link);
  ?>
    <?php echo $__env->make('home.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>
   <script type="text/javascript">
    // modal show
    $(document).ready(function() {
        $("#squarespaceModal").modal('show');
    }); 
    $(document).on('click','#orlando-field-submit', function(e) {
        e.preventDefault()
        var email = $('#orlando-field-email').val();
        $.ajax({
            url: '<?php echo e(url("modal-data/")); ?>',
            type: "GET",
            data: {
               "email" : email,
            },
            success: function(data) {
                console.log(data);
                // $("#squarespaceModal").modal('hide');
            },
            error: function(e) {
                console.log(e.message);
            }
        });
    });
    // end modal
    
    $('#month').click(function() {
        $('.month').addClass("active");
        $('.years').removeClass("active");
        $('.month').css('display', 'block');
        $('.years').css('display', 'none');
    });

    $('#years').click(function() {
        $('.years').addClass("active");
        $('.month').removeClass("active");
        $('.years').css('display', 'block');
        $('.month').css('display', 'none');
    });
   
    // $('.radiobtn1-show').hide();
    $('.radiobtn2-show').hide();
    $(document).ready(function() {
    $('.radiobtn1').on('click', function() {
    $('.radiobtn2-show').hide();
    $('.radiobtn1-show').slideToggle();
    });
    $('.radiobtn2').on('click', function() {
    $('.radiobtn1-show').hide();
    $('.radiobtn2-show').slideToggle();
    });
    });
   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
				}
	 });  
    
  function loadMoreData(nextPage){
        //   console.log(nextPage);
          var packtype=$('.load-type').val(); 
          $("#loadMore").hide();
          $(".more-loader").show();

          $.post('<?php echo e(route('loadmore')); ?>',{'page':nextPage,'packType':packtype},function(response){
            if(response.status == 'success') {
                  $('#packages').append(response.html);
                  $('#currentPage').val(parseInt($('#currentPage').val()) + 1);
                  $(".more-loader").hide();
                  $("#loadMore").show();
            }
          },'json')
    }
 
  
      // Load more content with jQuery
    $(function () {
        $(".pagemore").slice(0, 4).show();
            $("#loadMore").on('click', function (e) {
                e.preventDefault();
                nextPage = parseInt($('#currentPage').val()) + 1;
                totalPages = parseInt($('#totalPages').val());
                if(nextPage <= totalPages){
                   loadMoreData(nextPage);
                }
                if (nextPage == totalPages){
                    $("#hideload").hide();
                }
        });
    });

   
</script>
<script src="<?php echo e(url('js/home.js')); ?>" type="text/javascript"></script>
<!-- This site is converting visitors into subscribers and customers with OptinMonster - https://optinmonster.com :: Campaign Title: WFL - popup - signup - NL --><div id="om-wpaugqy5szc7p3oc9tbt-holder"></div><script>var wpaugqy5szc7p3oc9tbt,wpaugqy5szc7p3oc9tbt_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){wpaugqy5szc7p3oc9tbt_poll(function(){if(window['om_loaded']){if(!wpaugqy5szc7p3oc9tbt){wpaugqy5szc7p3oc9tbt=new OptinMonsterApp();return wpaugqy5szc7p3oc9tbt.init({"u":"29001.756505","staging":0,"dev":0,"beta":0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="https://a.omappapi.com/app/js/api.min.js",o.async=true,o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;wpaugqy5szc7p3oc9tbt=new OptinMonsterApp();wpaugqy5szc7p3oc9tbt.init({"u":"29001.756505","staging":0,"dev":0,"beta":0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");</script><!-- / OptinMonster -->

<?php if($doamin->wizard==1): ?>
<!-- tour -->

<link rel="stylesheet" href="<?php echo e(url('tutorial/css/iGuider.css')); ?>">
<script src="<?php echo e(url('tutorial/js/jquery.iGuider.js')); ?>"></script>

<link rel="stylesheet" href="<?php echo e(url('tutorial/themes/material/iGuider-theme-material.css')); ?>">
<script src="<?php echo e(url('tutorial/themes/material/iGuider-theme-material.js')); ?>"></script>  

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
$(window).on('load',function(){

  var preseOpt = {
    
    tourTitle:'Tariefchecker',
    
    overlayColor:'#111626',
    loc:'',
    
    intro:{
     
    },
    lang:{
      introTitle:'Welcome to Tariefchecker',
      introContent:'Now this tour will tell you about Tariefchecker'
    },
    steps:[
    {
      title:'Comparison details',     
      content:'Comparison parameters are showing in this section.',        
      target:'el-1'
    },{
      title:'Sorting',     
      content:'We can sort compared tariff.',       
      target:'el-3'
     // overlayColor:'#ff8a00'
    },
    {
      title:'Tariff details',        
      content:'All details include discount and durations are showing in this section.', 
      target:'el-2',
      width:500
    }
    ],
    debug:false
  }
  function myTour(){
    iGuider(preseOpt);
  }
  
  $('.start-tour').on('click',function(){
    myTour();
    return false;
  });
  iGuider('button',preseOpt);
  myTour();
  
  $('.custom-el-drag').draggable({
    drag: function( event, ui ) {
      iGuider('update');  
    } 
  });

  $('.add-new-item-1').on('click',function(){
    if(!$('.add-new-item-2').length){
      setTimeout(function(){
        $('.add-new-item-1').after('<span class="custom-element add-new-item-2"> New element </span>');
      },1000);
    }
  });
})
</script> 
<style>
.custom-el-drag { cursor:move}
form input {
  height: 60px;
  padding: 0 30px;
}
</style>

<!-- tour end -->

<?php endif; ?>

</body>