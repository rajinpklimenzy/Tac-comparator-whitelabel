<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TRBHG9');</script>
<!-- End Google Tag Manager -->
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<body style="background-image: url('images/bg1.png');background-repeat: no-repeat;">
    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRBHG9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

   <div class="container">
       <div class="float-right"><a href="locale/en" @if(App::getLocale()=='en') style="color:red;" @endif >EN</a>/<a href="locale/nl" @if(App::getLocale()=='nl') style="color:red;" @endif>NL</a>/<a href="locale/fr" @if(App::getLocale()=='fr') style="color:red;" @endif>FR</a></div>
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
              Tarif checker
            </h1>
         
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
                <form action="consumption-details" method="post">
                  {{ csrf_field()}}
                <div class="form-group">
                  <label for="email">Gas:</label>
                  <input type="checkbox" class="form-control" checked="checked" value="gas" placeholder="Enter email" name="gas">
                </div>
                <div class="form-group">
                  <label for="pwd">Elektriciteit:</label>
                  <input type="checkbox" class="form-control" checked="checked" value="electricity" placeholder="Enter password" name="elec">
                </div>
                  
                  <div class="form-group">
                  <label for="pwd">Postcode:</label>
                  <input type="text" class="form-control po" required="" id="pwd" placeholder="Voer postcode in" name="po">
                </div>
                  <p class="po-error-msg" style="color:red;display:none;" >@lang('home.invalid_post')</p>
                <!-- <div id="sub-po" >-->
                            
                <!--</div>-->
                @if(Session::has('pin_code_error'))
                        <p style="color:red;"> {{ Session::get('pin_code_error') }}</p>
                @endif
                <button type="submit" class="btn btn-default">voorleggen</button>
                </form>
            </div>
         </div>
      </div>
   </div>
</body>
<script type="text/javascript">
   // $('.radiobtn1-show').hide();
   $('.radiobtn2-show').hide();
   $( document ).ready(function() {
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



<style>
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
@media screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}
</style>
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
  

 $('.po').keyup(function(){
        
        var po=$(this).val();
        $('.po-error-msg').hide(); 
        $('.po-load').show();
        $.ajax({
            url: '{{url('check-po')}}',
            type: 'GET',
            data: {'po':po},
            success: function(data) {
                
                console.log(data['available']);
            
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
                  
                  //var html_content=data['sub_po'];
                 // alert('true');
                  
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


  });
</script>