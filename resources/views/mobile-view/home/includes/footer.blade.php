<div class="Footer-main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <div class="banner-footer">
                        @php
                               $string = trans("home.sort_page");
                               $replace = ['{X1}','{X2}','{X3}'];
                              
                             if($elec!="" && $gas!=""){
                             $x1=trans("home.dual_fuel");
                             }elseif($elec){
                             $x1=trans("home.Electricity");
                             }elseif($gas){
                             $x1=trans("home.Gas");
                             }
                             $month=date("F");
                            
                             $x2=trans($month);
                             $x3=date("Y");
                               
                               $info = [
                               'X1' => $x1,
                               'X2'  => $x2,
                               'X3'   => $x3,
                               ];
                               @endphp
			<p>@lang('home.Kies_hieronder')<br>{{str_replace($replace, $info, $string)}}</p>
			 @php

                               $string1 = trans("home.sort_banner");
                               $replace1 = ['{X4}'];
                               $info1 = [
                               'X4' => '450',
                               ];

                           
                               @endphp
			<b>{{str_replace($replace1, $info1, $string1)}}</b><br>
                         @php
                               $string2 = trans("home.sort_banner_last");
                               $replace2 = ['{X5}','{X6}'];
                              
                           
                            if($customer_type=='residential'){
                            
                            $x6= trans("home.x6_res");
                            $x5= trans("home.x5_res");
                            }else{
                            
                            $x6= trans("home.x6_pro");
                            $x5= trans("home.x5_pro");
                            }
                           
                               
                               $info2 = [
                               'X5' => $x5,
                               'X6'  => $x6,                              
                               ];
                               @endphp
			<p>{{str_replace($replace2, $info2, $string2)}}</p>
                    </div>
                    <ul>
                        <li><a href="#">@lang('home.Terms_conditions')</a></li>
                        <li><a href="#">@lang('home.Contact')</a></li>
                        <li><a href="#">@lang('home.Frequently_asked')</a></li>
                        <li><a href="http://www.tariefchecker.be">@lang('home.Powered_by') www.tariefchecker.be</a></li>
                    </ul>
                    <P>@lang('home.Copyright') {{date('Y')}}</P>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/5371eb2245.js"></script>
<!--<script src="{{url('js/5371eb2245.js')}}"></script>-->

<script>
   Userback = window.Userback || {};
   Userback.access_token = '3783|13144|joO0IGuxtmy9vBXjjARKh5s0WfPB00lw6wOMFeMUVGL4pwzibG';
   (function(id) {
       var s = document.createElement('script');
       s.async = 1;s.src = 'https://static.userback.io/widget/v1.js';
       var parent_node = document.head || document.body;parent_node.appendChild(s);
   })('userback-sdk');
</script>
<script type="text/javascript" src="https://a.opmnstr.com/app/js/api.min.js" data-campaign="ttplwii7vwuroim8y2ek" data-user="29001" async></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TRBHG9');</script>
<!-- End Google Tag Manager -->


<script type="text/javascript">
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
</script>
<script type="text/javascript">

   $( document ).ready(function() {
      $(document).on('click', function (e) {
            
            if ($(e.target).closest(".mobile-filter.active").length === 0) {
                if ($(e.target).closest(".mob-filter").length === 0) {
                    $(".mobile-filter").removeClass("active");
                    $("body").removeClass("active-filter");
                }
            }
        });
   });
</script>





 <script>
            $(document).ready(function(){
                
                
                 $('.digital').click(function(){

                var myMeter=$(this).val();

                if(myMeter=='digital'){

                    $('.digital_content').show();

                }else{

                    $('.digital_content').hide();

                }
              });

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
                
                // end meter
                
                
                

                 var gas = $("input[name='gas']:checked").val();
                 var electricity = $("input[name='electricity']:checked").val();
                
                            if($('#gas').prop("checked") != true || $('#electricity').prop("checked") != true){
                            $("#submit1").attr('disabled', 'disabled'); 
                            }
                            if(gas!=''||electricity!=''){
                                    $("#submit1").attr('disabled', false); 
                            }else{
                                    $("#submit1").attr('disabled', true); 
                            }

                            if(gas!=""){                        
                            $("#consumtion_gas1").attr("required","required"); 
                            }

                            if(!gas){                        
                            $("#consumtion_gas1").removeAttr('required'); 

                            }  

                           
                
                
            $('#electricity').change(function(){  
                    var electricity = $("input[name='electricity']:checked").val();              
                    if(electricity!=""){   
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
                           $(".consumtion_gas1p").addClass("required");
                           $("#supplier_prof_g").attr("required");
                        }
                        else{     
                             $('.gas-sel-p').hide();
                           $(".consumtion_gas1p").removeAttr('required');
                            $(".consumtion_gas1p").removeClass("required");
                           $("#supplier_prof_g").removeAttr('required');
                        }
            });
            
           
                
            $('#know').click(function(){
                    
                    $(".meter").attr("required","required");
                    $(".meter_type2").removeAttr('required');
                    var know = $("input[name='group1']:checked").val();   
                    
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
                
            $('#save-update').click(function(event){
                
                       
                            
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

                $("#main-data").hide();
                $("#loading").show();

            },
            complete: function() {

                $("#main-data").show();
                $("#loading").hide();

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
                     if(meterType=='single_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.single_excl_night').show();
                        $('.double_excl_night').hide();
                        
                        
                        
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
                    if(meterType=='double_excl_night'){
                       
                        $('.double').hide();
                        $('.single').hide();
                        $('.double_excl_night').show();
                        $('.single_excl_night').hide();
                       
                        
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
                url: '{{url('check-po')}}',
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
                url: '{{url('check-po')}}',
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

        //   $('.required').each(function(e) {
        //   if($(this).val() == '') {
        //   $(this).css('background-color' , 'rgb(245, 158, 158)');
        //   e.preventDefault();
          
        //               }
        //   });
           
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
            
        //         var electricity = $("input[name='electricity']:checked").val();
        //   var gas = $("input[name='gas']:checked").val();  
            
            // .required-red
            
            if(!postalcode){
                
                $('.por').addClass('required-red');
                e.preventDefault();
            }
            
            
            if(electricity=='true'){
                
                // if(!meterType && includeE=='true'){
                    
                //     $('.meterr').addClass('required-red');
                //          e.preventDefault();
                    
                //     }
                    
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
    
  
     <script type="text/javascript">
        var form = document.getElementById('tabform2'); // form has to have ID: <form id="formID">
form.noValidate = true;
form.addEventListener('submit', function(event) { // listen for form submitting
        if (!event.target.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
            //alert('Please, fill the form'); // error message 
             $('#submit_pr_msg').show();
        }
    }, false);


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
            $('.mobile-filter').removeClass('active');

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


    @php

    $button_color=$site_colors->button_color;
    $banner_background_color=$site_colors->banner_background_color;
    $banner_text_color=$site_colors->banner_text_color;
    $change_your_data_backgorund_color=$site_colors->change_your_data_backgorund_color;

    $navigation_menu_button_color=$site_colors->navigation_menu_button_color;
    $navigation_text_color=$site_colors->navigation_text_color;
    $header_text_color=$site_colors->header_text_color;
    $sidebar_background_color=$site_colors->sidebar_background_color;
    $listing_background_color=$site_colors->listing_background_color;
    $filter_section_color_button=$site_colors->filter_section_color_button;
    $filter_section_color_checkbox=$site_colors->filter_section_color_checkbox;
    $cta_button_color=$site_colors->cta_button_color;
    $more_info_button_color=$site_colors->more_info_button_color;
    $more_tariffs_button_color=$site_colors->more_tariffs_button_color;
    $footer_background_color=$site_colors->footer_background_color;


    $change_your_data_text_color=$site_colors->change_your_data_text_color;
    $change_your_data_button_color=$site_colors->change_your_data_button_color;
    $listing_background_color_reg=$site_colors->listing_background_color_reg;
    $navigation_icon_color=$site_colors->navigation_icon_color;
    $navigation_bar_color=$site_colors->navigation_bar_color;
    $navigation_text_inactive_color=$site_colors->navigation_text_inactive_color;
    $listing_background_color_reg=$site_colors->listing_background_color_reg;
    $more_info_text_color=$site_colors->more_info_text_color;
    $filter_section_button_color=$site_colors->filter_section_button_color;
    $more_tariffs_text_color=$site_colors->more_tariffs_text_color;
    $footer_text_color=$site_colors->footer_text_color;


    $title_color=$site_colors->title_color;
    $listing_text_color=$site_colors->listing_text_color;
    $listing_price_color=$site_colors->listing_price_color;
    $cta_text_color=$site_colors->cta_text_color;
    $popularity_text_color=$site_colors->popularity_text_color;
    $listing_icon_color=$site_colors->listing_icon_color;

    $landing_page_background_color=$site_colors->landing_page_background_color;
    $landing_page_background_color_activate=$site_colors->landing_page_background_color_activate;
    $banner_background_color_activate=$site_colors->banner_background_color_activate;
    $request_banner_background_color=$site_colors->request_banner_background_color;
    $request_banner_background_color_activate=$site_colors->request_banner_background_color_activate;
    $request_banner_text_color=$site_colors->request_banner_text_color;

    $menuTextColor=$site_colors->navigation_text_color_step3;
    $menuIconColor=$site_colors->navigation_text_inactive_color_step3;
    $menuIconColor_inactive=$site_colors->navigation_text_inactive_color_step3_inactive;

    $cheapest_border_color=$site_colors->cheapest_border_color;
    $cheapest_border_label_color=$site_colors->cheapest_border_label_color;
    $active_tab_color=$site_colors->active_tab_color;
    $link_color=$site_colors->link_color;
    $discount_sum_color=$site_colors->discount_sum_color;
    @endphp

<style type="text/css">

    @if($button_color)
        .choose1, .choose{
            background: {{$button_color}}!important;
        }
    @endif
    @if($button_color)
        .header-text-content{
            background:{{$banner_background_color}}!important;  
        }
    @endif
    @if($banner_text_color)
        .header-text-content h3{
            color:{{$banner_text_color}}!important;  
        }
    @endif
    @if($change_your_data_backgorund_color)
        .data-sec{
            background-color:{{$change_your_data_backgorund_color}}!important;  
        }
    @endif
    @if($navigation_menu_button_color)
        .faq-sec i{
           color:{{$navigation_menu_button_color}}!important;  
        }
    @endif
    @if($navigation_text_color)
        .faq-sec a, .start-sec a{
            color:{{$navigation_text_color}}!important;  
        }
    @endif
    @if($listing_background_color)
        .featured, .featured .total_sec_last {
           background-color:{{$listing_background_color}}!important;  
        }
    @endif
    @if($filter_section_color_button)
        #tab-1 .active, #tab-2 .active, .savings_per_year_sidebar select {
            background-color:{{$filter_section_color_button}}!important;  
        }
    @endif
     @if($filter_section_color_checkbox)
        .widget input[type=checkbox]:checked{
            background:{{$filter_section_color_checkbox}}!important;  
        }
    @endif
    @if($cta_button_color)
        .choose1, .choose{
            color:{{$cta_button_color}}!important;  
        }
    @endif
    @if($more_info_button_color)
       #myButton1{
           background-color:{{$more_info_button_color}}!important;  
        }
    @endif
    @if($more_tariffs_button_color)
        .load-more-sec{
            color:{{$more_tariffs_button_color}}!important;  
        }
    @endif
    @if($footer_background_color)
        .Footer-main{
            background-color:{{$footer_background_color}}!important;  
        }
    @endif
    @if($cheapest_border_color)
        .featured{
              border: 1px solid {{$cheapest_border_color}}!important;
        }
    @endif
    @if($cheapest_border_label_color)
        .featured .part-2 ul li p, .featured .energy ul li, .featured .total_sec_last .left_total{
              color:{{$cheapest_border_label_color}}!important;
        }
    @endif
    @if($active_tab_color)
        .more-tab .btn-link:hover{
          color: {{$active_tab_color}}!important;
        }
    @endif 
    @if($link_color)
      .more-content a{
           color:{{$link_color}}!important; 
      } 
    @endif 
    @if($discount_sum_color)
      .red-text{
           color:{{$discount_sum_color}}!important; 
      } 
    @endif 

    .total_sec_last{
      padding-left: 0;
      padding-bottom: 0;
    } 
</style>


    