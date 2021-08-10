                                                    <div class="mobile-filter">
                                                        <div class="filter-bg">
                                                            <div class="row ">
                                                                <div class="col-md-10 col-8 done-sec">
                                                                    <h4><?php echo app('translator')->getFromJson('home.Filter_the_results'); ?></h4>
                                                                </div>
                                                                <div class="col-md-2 col-4 done-sec-right">
                                                                    <div class="close-filter"><?php echo app('translator')->getFromJson('home.Done'); ?></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!--<div class="filter-sec">-->	
                <div class="filter-sec historical_outer">
                      <h6><!-- <?php echo app('translator')->getFromJson('home.Estimated_Savings'); ?> -->Kwartaalcheck</h6><!--Change title to Kwartaalcheck-->
                    <!-- <div class="historical_check_outer">
                      <div class="historical_check_input_mobile">
                          <input aria-label="Historical Check" type="date" name="historicalcheck" max="2021-12-31" 
                  min="2017-01-01" class="form-control historicalcheck" value="<?php echo e(Session::get('currentValue')); ?>" min="0" name="historicalcheck" id="historicalcheck" >
                      </div>
                      <div class="savings_button">
                          <img id="ajax-loader"   src="<?php echo e(url('images/progress.gif')); ?>" >
                      </div>
                    </div> -->

              <div class="historical_check_outer">
                <div class="historical_check_input_mobile">
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
             <?php $getParameters=Session::get('getParameters');   ?>                                             
             <?php if($getParameters['parameters']['values']['usage_single']>0 && $getParameters['parameters']['values']['usage_gas']>0 && $getParameters['parameters']['values']['usage_excl_night']==0): ?>
                <div class="">  
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
                    <h6><?php echo app('translator')->getFromJson('home.Estimated_Savings'); ?></h6>
                  <div class="savings_per_year_sidebar">
                         <input aria-label="Current Invoice" class="saving-per-year" type="number" value="<?php echo e(Session::get('currentValue')); ?>"    min="0" name="currentInvoice" id="cur_invoice" placeholder="<?php echo app('translator')->getFromJson('home.Current_invoice'); ?>">
                         <select aria-label="Year or month" name="cur_invoice_moth_year" id="cur_invoice_moth_year">
                             <?php if(Session::get('cur_invoice_moth_year')=='year'): ?>
                             <option value="year"><?php echo app('translator')->getFromJson('home.Year'); ?></option>
                             <option value="month"><?php echo app('translator')->getFromJson('home.Month'); ?></option>
                             <?php else: ?>
                            <option value="month"><?php echo app('translator')->getFromJson('home.Month'); ?></option>
                            <option value="year"><?php echo app('translator')->getFromJson('home.Year'); ?></option>
                            <?php endif; ?>
                        </select>
                        </div>
                </div>
                &nbsp;
                
                <div class="widget">
                    <h6><?php echo app('translator')->getFromJson('home.Discounts'); ?></h6>
                    <form action="">
                        <ul>
                             <?php if(Session::get('promo')=='true'): ?>
                             <li><label for="muhRadio1"><input type="checkbox" checked style="cursor: pointer;" class="disc"  name="disc" value="promo"/><?php echo app('translator')->getFromJson('home.For_commercial'); ?></label></li>
                            <?php else: ?>
                            <li><label for="muhRadio1"><input type="checkbox" id="promo-check" style="cursor: pointer;" class="disc"  name="disc" value="promo"/><?php echo app('translator')->getFromJson('home.For_commercial'); ?></label></li>
                             <?php endif; ?>
                             
                             <?php if(Session::get('domi')=='true'): ?>
                            <li><label for="muhRadio2"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="domi"/><?php echo app('translator')->getFromJson('home.For_automated_payment'); ?></label></li>
                            <?php else: ?>
                            <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="domi"/><?php echo app('translator')->getFromJson('home.For_automated_payment'); ?></label></li>
                            <?php endif; ?>
                            
                            <?php if(Session::get('email')=='true'): ?>
                            <li><label for="muhRadio3"><input type="checkbox" checked style="cursor: pointer;" class="disc" name="disc" value="email"/><?php echo app('translator')->getFromJson('home.For_digital_invoicing'); ?></label></li>
                            <?php else: ?>
                            <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="disc" name="disc" value="email"/><?php echo app('translator')->getFromJson('home.For_digital_invoicing'); ?></label></li>
                            <?php endif; ?>
                        </ul>
                        <!--<ul>-->
                        <!--    <li><label for="muhRadio1"><input type="checkbox" style="cursor: pointer;" class="disc"  name="promo" value="promo" id="promo"/><?php echo app('translator')->getFromJson('home.For_commercial'); ?></label></li>-->
                        <!--    <li><label for="muhRadio2"><input type="checkbox" style="cursor: pointer;" class="disc" name="domi" value="domi" id="domi"/><?php echo app('translator')->getFromJson('home.For_automated_payment'); ?></label></li>-->
                        <!--    <li><label for="muhRadio3"><input type="checkbox" style="cursor: pointer;" class="disc" name="email" value="email" id="email"/><?php echo app('translator')->getFromJson('home.For_digital_invoicing'); ?></label></li>-->
                        <!--</ul>-->
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
    $('.modal').on('shown.bs.modal', function (e) {
  $('html').addClass('freezePage'); 
  $('body').addClass('freezePage');
});
$('.modal').on('hidden.bs.modal', function (e) {
  $('html').removeClass('freezePage');
  $('body').removeClass('freezePage');
});
</script>