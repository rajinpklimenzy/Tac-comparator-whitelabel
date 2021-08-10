<?php
$landing_page_background_color=$site_colors->landing_page_background_color;
$landing_page_background_color_activate=$site_colors->landing_page_background_color_activate;
$landing_banner_text_color=$site_colors->landing_banner_text_color;
$form_text_color=$site_colors->form_text_color;
$langing_button_color=$site_colors->langing_button_color;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $locale="nl" ?> 
    <?php if( Session::get('locale')=="fr" ): ?>
    <title><?php echo e($doamin->title_fr); ?></title>
    <?php else: ?>

    <title><?php echo e($doamin->title); ?></title>
    <?php endif; ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if( Session::get('locale')=="fr" ): ?>
    <meta name="description" content="<?php echo e($doamin->meta_fr); ?>">
    <?php else: ?>
    <meta name="description" content="<?php echo e($doamin->meta); ?>">
    <?php endif; ?>
    <?php if( Session::get('locale')=="fr" ): ?>
     <meta name="keywords" content="<?php echo e($doamin->seo_key_fr); ?>" />
    <?php else: ?>
     <meta name="keywords" content="<?php echo e($doamin->seo_key); ?>" />
    <?php endif; ?>
    <link rel="icon" type="image/png" href="<?php echo e(url('uploads/fav-icon/'.$doamin->fav_icon)); ?>"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="<?php echo e(url('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('css/responsive.css')); ?>">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous">
    </script>

    <script>
    Userback = window.Userback || {};
    Userback.access_token = '3783|13144|joO0IGuxtmy9vBXjjARKh5s0WfPB00lw6wOMFeMUVGL4pwzibG';
    (function(id) {
       var s = document.createElement('script');
       s.async = 1;s.src = 'https://static.userback.io/widget/v1.js';
       var parent_node = document.head || document.body;parent_node.appendChild(s);
    })('userback-sdk');
    </script>

    <!-- tracking codes -->
    <?php echo $tracking_code->google_analytics; ?>
    <?php echo $tracking_code->facebook_pixel; ?>
    <?php echo $tracking_code->other_tracking_code; ?>

    <!-- tracking codes end -->
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>



<body>
 
<?php if(isset($_COOKIE['uuid'])): ?>
  <?php if(Session::get('locale')=='nl'): ?> 
    <div class="alert alert-warning alert-dismissible fade show text-center restoreSession" role="alert">
      <span><strong>Welkom terug!</strong> Wil je jouw laatste sessie hernemen?</span>
      <a href="https://<?php echo e($_SERVER['HTTP_HOST']); ?>/overzicht/pack/IMEA-IMEA?&po=2000&u=<?php echo e($_COOKIE['uuid']); ?>" type="button" class="btn btn-primary buttonYes">JA</a>
      <a href="<?php echo e(url('refresh_uuid')); ?>" type="button" class="btn btn-danger buttonNo">NEE</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  <?php endif; ?>
  <?php if(Session::get('locale')=='fr'): ?> 
    <div class="alert alert-warning alert-dismissible fade show text-center restoreSession" role="alert">
       <span><strong>Re-bonjour!</strong> Voulez-vous retourner à la dernière session?</span>
      <a href="https://<?php echo e($_SERVER['HTTP_HOST']); ?>/overzicht/pack/IMEA-IMEA?&po=2000&u=<?php echo e($_COOKIE['uuid']); ?>" type="button" class="btn btn-primary buttonYes">OUI</a>
      <a href="<?php echo e(url('refresh_uuid')); ?>" type="button" class="btn btn-danger buttonNo">NON</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
  <?php endif; ?>
<?php endif; ?>


    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRBHG9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      <div class="container">
        <div class="main-header-sec">
          <div class="image-sec-outer">
            <?php if(Session::get('locale')=='nl'): ?> 
            <img src="<?php echo e(url('uploads/logos/'.$doamin->logo)); ?>" alt="tariefchecker">
            <?php else: ?>
            <img src="<?php echo e(url('uploads/logos/'.$doamin->logo_fr)); ?>" alt="tariefchecker">
            <?php endif; ?>
          </div>
          <div class="float-right-sec">
            <a href="nl" <?php if(Session::get('locale')=='nl'): ?> style="color:red" <?php endif; ?> >NL</a>/ <a href="fr" <?php if(Session::get('locale')=='fr'): ?> style="color:red" <?php endif; ?> >FR</a>
          </div>
        </div>
      </div>

     <div class="front-sec-2">
       <div class="container">  
      <div class="outer-title-sec text-center">
         <div class="header-title">

          <?php if(Session::get('locale')=='nl'): ?>
            <h1>
              <?php echo e($data->title); ?>

            </h1>
            <?php else: ?>
            <h1>
               <?php echo e($data->title_fr); ?>

            </h1>
          <?php endif; ?>
            
         </div>
         <div class="sub-heading">
          <?php if(Session::get('locale')=='nl'): ?>
           <h3> <?php echo e($data->subtitle); ?></h3>
           <?php else: ?>
           <h3><?php echo e($data->subtitle_fr); ?></h3>
           <?php endif; ?>
         </div>
      </div>
      <div class="outer_sec_left_right">
      <div class="left_content-sec">
        <div class="sub_title_1">
          <?php if(Session::get('locale')=='nl'): ?>
          <p><?php echo $data->title_above_form; ?></p>
          <?php else: ?>
          <p><?php echo $data->title_above_form_fr; ?></p>
          <?php endif; ?>
        </div>
        <form action="consumption-details" class="home_page_form" method="post">
          <div class="outer_sec_form">
              <?php echo e(csrf_field()); ?>

              <div class="form-group" data-target="el-1">
                <label for="elec" class="form-control_eleck" href="#">&nbsp;</label>
                <input type="checkbox" class="form-control home_page_form_input home_page_form_input_elec "  checked="checked" id="elec" value="electricity" placeholder="Enter password" name="elec">
                <span><?php if(Session::get('locale')=='nl'): ?> Elektriciteit <?php else: ?> Electricité  <?php endif; ?></span>
            </div>
            <!--<input type="checkbox"  checked="checked" id="elec" value="electricity" placeholder="Enter password" name="elec">-->
            <div class="form-group" data-target="el-0">
              <label for="gas" class="form-control_gas" href="#">&nbsp;</label>
              <input type="checkbox" class="form-control home_page_form_input home_page_form_input_gas" checked="checked" value="gas" id="gas" placeholder="Enter email" name="gas">
              <span ><?php if(Session::get('locale')=='nl'): ?> Gas <?php else: ?> Gaz  <?php endif; ?></span>
            </div>
             
              
              <div class="form-group" data-target="el-2">
              
                <?php if(Session::get('locale')=='nl'): ?>
                <input type="text" class="form-control po post_code_sec" required="required" id="po" placeholder="Postcode" name="po">
                <?php else: ?>
                <input type="text" class="form-control po post_code_sec" required="required" id="po" placeholder="Code postal" name="po">
                <?php endif; ?>
              
              </div>
            </div>
              <p class="po-error-msg" style="color:red;display:none;" ><?php echo app('translator')->getFromJson('home.invalid_post'); ?></p>
         
            <div class="text_and_button">
              <div class="text_left_sec_home">
                <?php if(Session::get('locale')=='nl'): ?>
                <p><?php echo $data->title_below_form; ?></p>
                <?php else: ?>
                <p><?php echo $data->ltitle_below_form_fr; ?></p>
                <?php endif; ?>
              </div>
              <div class="button_sec_right_home">
                 <?php if(Session::has('pin_code_error')): ?>
                    <p style="color:red;"> <?php echo e(Session::get('pin_code_error')); ?></p>
                  <?php endif; ?>
                  <button type="submit" id="submit1" class="choose"><?php if(Session::get('locale')=='nl'): ?> START NU <?php else: ?> COMPAREZ  <?php endif; ?></button>
              </div>
            </div>
            
        </form>
        <br/>
          <?php if(Session::has('message')): ?>

          <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>

          <?php endif; ?>
      </div>
      <div class="right_content_home_form">
          <div class="image_home_sec">
            <img src="/images/landing-page-image/<?php echo e($data->mascot_image); ?>">
          </div>
      </div>
    </div>





      
   </div>
   <div class="loading_sec_home" style="display: none;">
     <i class="fa fa-spinner fa-spin fa-3x"></i>
   </div>
   </div>
</body>
</htm>
<script type="text/javascript">
   // $('.radiobtn1-show').hide();
   $('.radiobtn2-show').hide();
   $( document ).ready(function() {

      $( ".home_page_form" ).submit(function( event ) {
        $('.loading_sec_home').show();
        
      });


      $('.radiobtn1').on('click', function() {
          $('.radiobtn2-show').hide();
          $('.radiobtn1-show').slideToggle();
      });
      $('.radiobtn2').on('click', function() {
          $('.radiobtn1-show').hide();
          $('.radiobtn2-show').slideToggle();
      });
   });

   $('.home_page_form_input_elec').change(function(){
    var c = this.checked ? '#f00' : '#09f';
    $('.form-control_eleck').toggleClass("e");
});
   $('.home_page_form_input_gas').change(function(){
    var c = this.checked ? '#f00' : '#09f';
    $('.form-control_gas').toggleClass("g");
});
</script>

<style>
   <?php if($landing_page_background_color_activate == 1): ?>
        .front-sec-2{
            background:<?php echo e($landing_page_background_color); ?>!important;  
        }
    <?php else: ?>

    .front-sec-2{
            background:url('images/landing-page-image/<?php echo e($data->background_image); ?>')!important;  
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
        }

    <?php endif; ?>
    <?php if($landing_banner_text_color): ?>
    	.header-title h1, .sub-heading h3{
    		color: <?php echo e($landing_banner_text_color); ?>!important;  
    	}
    <?php endif; ?>
    <?php if($form_text_color): ?>
    	.sub_title_1 p, .text_left_sec_home, form.home_page_form .form-group span{
    		color: <?php echo e($form_text_color); ?>!important;  
    	}
    <?php endif; ?>
    <?php if($langing_button_color): ?>
    	.button_sec_right_home .choose{
    		background:<?php echo e($langing_button_color); ?>!important;
    	}
    <?php endif; ?>

.send-button{
background: #54C7C3;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.g-button{
color: #fff !important;
border: 1px solid #EA4335;
background: #ea4335 !important;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
.my-input{
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
cursor: text;
padding: 8px 10px;
transition: border .1s linear;
}
.header-title{
margin: 5rem 0;
}
h1{
font-size: 31px;
line-height: 40px;
font-weight: 600;
color:#4c5357;
}
h2{
color: #5e8396;
font-size: 21px;
line-height: 32px;
font-weight: 400;
}
.login-or {
position: relative;
color: #aaa;
margin-top: 10px;
margin-bottom: 10px;
padding-top: 10px;
padding-bottom: 10px;
}
.span-or {
display: block;
position: absolute;
left: 50%;
top: -2px;
margin-left: -25px;
background-color: #fff;
width: 50px;
text-align: center;
}
.hr-or {
height: 1px;
margin-top: 0px !important;
margin-bottom: 0px !important;
}
@media  screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}
</style>


<script type="text/javascript">
  $(document).ready(function(){


      
            if($('#elec').prop("checked") == false){
                $('.form-control_eleck').addClass('e');
            }
            if($('#gas').prop("checked") == false){
                $('.form-control_gas').addClass('g');
            }
  

 $('.po').keyup(function(){

   
        
        var po=$(this).val();
        $('.po-error-msg').hide(); 
        $('.po-load').show();
        $.ajax({
            url: '<?php echo e(url('check-po')); ?>',
            type: 'GET',
            data: {'po':po},
            success: function(data) {
                
               // console.log(data['available']);
            
                  if(data['available']=='false'){

                  if(po==""){

                  $('.po-error-msg').hide(); 

                  }else{

                  $('.po-error-msg').show();
                  $('#submit1').prop('disabled', true);
                  $('#submit_pr').prop('disabled', true);

                  }
                  $('#sub-po').html('');
              }else{


                  if(data['sub']=='true'){
                  $('#sub-po').html(data['sub_po']);
                  $('#dropList').addClass('form-control');

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

            console.log(e.message);
            }
        });  
        
        
    }); 


    $('.close,.cookie-yes').click(function(){


    $('.alert').hide();
  


    });

            

    


  });
</script>

<script>var wpaugqy5szc7p3oc9tbt,wpaugqy5szc7p3oc9tbt_poll=function(){var r=0;return function(n,l){clearInterval(r),r=setInterval(n,l)}}();!function(e,t,n){if(e.getElementById(n)){wpaugqy5szc7p3oc9tbt_poll(function(){if(window['om_loaded']){if(!wpaugqy5szc7p3oc9tbt){wpaugqy5szc7p3oc9tbt=new OptinMonsterApp();return wpaugqy5szc7p3oc9tbt.init({"u":"29001.756505","staging":0,"dev":0,"beta":0});}}},25);return;}var d=false,o=e.createElement(t);o.id=n,o.src="https://a.omappapi.com/app/js/api.min.js",o.async=true,o.onload=o.onreadystatechange=function(){if(!d){if(!this.readyState||this.readyState==="loaded"||this.readyState==="complete"){try{d=om_loaded=true;wpaugqy5szc7p3oc9tbt=new OptinMonsterApp();wpaugqy5szc7p3oc9tbt.init({"u":"29001.756505","staging":0,"dev":0,"beta":0});o.onload=o.onreadystatechange=null;}catch(t){}}}};(document.getElementsByTagName("head")[0]||document.documentElement).appendChild(o)}(document,"script","omapi-script");</script>




<style>
.custom-el-drag { cursor:move}
form input {
  height: 60px;
  padding: 0 30px;
}
</style>








