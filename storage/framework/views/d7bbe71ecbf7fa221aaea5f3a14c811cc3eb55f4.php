<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
      <?php if($page=='request'): ?>
            <?php if(Session::get('locale')=='nl'): ?> 
                <title>Bevestigen</title>
            <?php else: ?>
                <title>Confirmation</title>
            <?php endif; ?>
        <?php else: ?>
            <?php if(Session::get('locale')=='nl'): ?>
                <title>Overzicht resultaten</title>
            <?php else: ?>
                <title>Aperçu des résultats</title>
            <?php endif; ?>
        <?php endif; ?>
  <meta name="description" content="Exclusieve Kortingen! Direct en zonder Boetes Switchen met Tariefchecker.be. Vergelijk GRATIS de Belgische Energieleveranciers en Bespaar op je Energiefactuur!">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRBHG9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php echo $__env->make('mobile-view/home/includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('mobile-view/home/includes/sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php $getParameters=Session::get('getParameters');   ?>
                                        <div class="filter-sec-mob">
                                            <div class="row">
                                                <div class="col-md-6 col-6 filter-sec-1">
                                                    <span class="mob-filter"><img src="<?php echo e(url('images/filter-icon.png')); ?>" alt="tariefchecker"> <?php echo app('translator')->getFromJson('home.filters'); ?></span>
                                                    <!-- <button class="mob-filter">Filter</button> -->
                                                </div>
                                                <div class="col-md-6 col-6 sort-sec-1">
                                                    <div class="dropdown">
                                                        <span class="mob-sort"><img src="<?php echo e(url('images/sort-icon.png')); ?>" alt="tariefchecker"></span>
                                                        
                              <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                <option value="" ><?php echo app('translator')->getFromJson('home.SORT_BY'); ?></option>
                                <option value="most" ><?php echo app('translator')->getFromJson('home.Most_chosen'); ?></option>
                                <option value="low"><?php echo app('translator')->getFromJson('home.High_To_Low'); ?></option>
                                <option value="high"><?php echo app('translator')->getFromJson('home.Low_To_High'); ?></option>
                              </select>
                           
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
<?php echo $__env->make('mobile-view/home/includes/filter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                    <div class="section-2">
                                                        <div class="container" id="main-data">
                                                            <div class="row sec-2">
                                                                <div class="col-md-3 .col-lg-3 .col-sm-3">
                                                                </div>
                                                                <div class="col-md-9 .col-lg-9 .col-sm-9 right-sec mob-dec-bundle">
                                                                    
                                                        <div id="seperated" style="display:none;">
                                                            <div class="row head-1">   
                                                                <div class="col-6  col-lg-3 electricity electric_tab" id="elec_tab" style="cursor: pointer;">
                                                                    <h5><i class="fa fa-bolt"></i> <?php echo app('translator')->getFromJson('home.Electricity'); ?> <span class="ele-no "><?php echo e(Session::get('elec_count')); ?></span></h5>
                                                                </div>
                                                                <div class="col-6 col-lg-3 gas gas_tab" id="gas_tab" style="cursor: pointer;">
                                                                    <h5><i class="fa fa-fire"></i> <?php echo app('translator')->getFromJson('home.Gas'); ?> <span class="gas-no "><?php echo e(Session::get('gas_count')); ?></span></h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         
                                                                    <div class="row">
                                                                        <div class="col-md-6 col-sm-3 col-lg-6 button-sec-2">
                                                                            <button type="button" class="btn-2 btn-primary" data-toggle="modal" data-target="#exampleModal1">Email me these deals</button>
                                                                            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title" id="exampleModalLabel">Email me these deals</h5>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <p class="modal-p">
                                                                                            <?php echo app('translator')->getFromJson('home.Please_select'); ?>
                                                                                        </p>
                                                                                        <div class="modal-body">
                                                                                            <form>
                                                                                                <div class="form-group">
                                                                                                    <label for="recipient-name" class="col-form-label">Email Address</label>
                                                                                                    <input type="email" class="form-control" id="recipient-name" name="recipient" value="<?php echo e(old('recipient')); ?>" required="required">
                                                                                                    <label id="error_email" style="color: red;"></label>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                        <div class="checkbox-sec">
                                                                                            <label class="container-1">
                                                                                                <input type="checkbox">
                                                                                                <span class="checkmark"></span>
                                                                                            </label>
                                                                                            <p><?php echo app('translator')->getFromJson('home.I_would_like'); ?></p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-primary">Send</button>
                                                                                        </div>
                                                                                        <p class="text-center footer-p"><?php echo app('translator')->getFromJson('home.We_never_give'); ?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <div class="row second-sec">
                                                                        <div class="col-md-6 col-sm-12 col-12 second-sec-left">
                                                                              <?php if($getParameters['parameters']['values']['comparison_type']=='gas'): ?>
                                 <h5><span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals_gas'); ?></h5>
                                <?php elseif($getParameters['parameters']['values']['comparison_type']=='electricity'): ?>
                                 <h5><span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals_elec'); ?></h5>
                                <?php else: ?>
                                
                                 <h5><span class="tot_count"><?php echo e($totalProducts); ?></span> <?php echo app('translator')->getFromJson('home.Deals'); ?></h5>
                                <?php endif; ?>
                                                                              <div id="pro-select">
                          
                                                                              </div>
                                                                             <p class="electricity-title" style="display:none"><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                                                                             <p class="gas-title" style="display:none" ><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                                                                        </div>
                                                                        <div class="col-md-6 col-sm-3 col-lg-6 second-sec-right text-right">
                                                                            <div class="dropdown">

                                                <p><b><?php echo app('translator')->getFromJson('home.SORT_BY'); ?></b>
                              <select aria-label="Sorting" id="sort" class="sorting" name="sort">
                                <!--<option value="" ><?php echo app('translator')->getFromJson('home.Choose'); ?>nnn</option>-->
                                <option value="most" ><?php echo app('translator')->getFromJson('home.Most_chosen'); ?></option>
                                <option value="low"><?php echo app('translator')->getFromJson('home.High_To_Low'); ?></option>
                                <option value="high"><?php echo app('translator')->getFromJson('home.Low_To_High'); ?></option>
                              </select>
                            </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- liting-1 -->
                                                                    
                                                                    
                                                                    
                                                                    <div class="section-green sec-hide">
                                                                        <p><?php echo app('translator')->getFromJson('home.Please_select'); ?></p>
                                                                    </div>
                                                                    
                                                                    
                 <div id="packages">  
                        <?php $getParameters=Session::get('getParameters');   ?>
                        <?php $gas="0"; $elec="0"; $si="0"; $totalProducts=$totalProducts; 
                        $postal_code=$getParameters['parameters']['values']['postal_code'];
                        ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $getdetails): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <?php  $si++; ?>
                         <!-- Start of listing-1 -->
                                <?php echo \View::make('mobile-view.home.elements.product-item', compact('totalProducts','getdetails', 'customer_type', 'postal_code','si','packType','feature','min','service'))->render(); ?>

                        <!-- End of listing-1 -->
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                        </div>
                        </div>
                        <!-- End of listing-1 -->
                        </div>
                        
                            <input type="hidden" id="totalPages"  value="<?php echo e($totalPages); ?>" />
                            <input type="hidden" id="currentPage" value="<?php echo e($currentPage); ?>" />
                            <input type="hidden" id="TPage" value="<?php echo e($totalProducts); ?>" />

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
                                                    
                                                      <?php $arr=Session::get('select-pro');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
Session::put('urls',$actual_link);

  ?>
  
  
   <!--loading-->

<div id="loading" style="display:none;">
        <div class="animation-sec"  >
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12 ani-sec">
                        <!--<h4><?php echo app('translator')->getFromJson('home.loading_text'); ?></h4>-->
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
  
  
  
  
                                                      <?php echo $__env->make('mobile-view.home.includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                </div>
                                                
                                                
                                                
                          
                                                
                                                
                                                
                                                
                </body>
                                                
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("tab-1");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("tab-2");
var btns = header.getElementsByClassName("btn2");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<script>
  function openCity2(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none"; }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
    }

    function openCity(evt, cityName) {
        $target  = $(evt.currentTarget);
        $container = $target.closest('.more-tab');
        $container.find('.tablinks').removeClass('active');
        $container.find('.tabcontent').hide();
        $('#'+cityName).show();
        $target.addClass('active');
    }
</script>

<script type="text/javascript">
  jQuery(document).ready(function(){
            


 $('#tabform2').submit(function() {
        $(".loading_section_sec").show();
    });

$('#tabform1').submit(function() {
        $(".loading_section_sec").show();
    });



           
    // getAccordion("#tabs",768);
 $('#packages').on('click', '.sec-3-btn', function(){
       var id=$(this).data('id');
       
    jQuery('.more-content'+id).slideToggle();
    // jQuery('.part-last').slideUp();
  });
});
</script>

<script type="text/javascript">
  
  jQuery('.mob-filter').click(function(){
    jQuery('.mobile-filter').toggleClass("active");
    jQuery('body').toggleClass("active-filter");
});
    jQuery('.close-filter').click(function(){
    jQuery('.mobile-filter').toggleClass("active");
    jQuery('body').toggleClass("active-filter");

    
});
    $('.modal').on('shown.bs.modal', function (e) {
  $('html').addClass('freezePage'); 
  $('body').addClass('freezePage');
});
$('.modal').on('hidden.bs.modal', function (e) {
  $('html').removeClass('freezePage');
  $('body').removeClass('freezePage');
});
    
</script>
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




<script type="text/javascript">

    
    jQuery(document).ready(function () {
    

    var originalURL = window.location.pathname;
        var change_url=$('.changeurl').val();
    if(originalURL=='/overzicht' || originalURL=='/find-packages'){
            
             window.history.pushState('obj', 'newtitle',change_url);
        }
    

        $('.seperated').css('display', 'flex');
        
        $('#month').click(function(){

                $('.month').addClass("active");
                $('.years').removeClass("active");
                $('.month').css('display', 'block');
                $('.years').css('display', 'none');
        });
        
        $('#years').click(function(){
            
                $('.years').addClass("active");
                $('.month').removeClass("active");
                $('.years').css('display', 'block');
                $('.month').css('display', 'none');
        });
    

        $('.close-filter').click(function(){ 

            var proId = $("input[name='compare']:checked").val();
            var currentValue=$('#cur_invoice').val();
            var cur_invoice_moth_year=$('#cur_invoice_moth_year').val();
            
            var year = [];
            $.each($("input[name='year']:checked"), function(){
            year.push($(this).val());
            }); 
            var price_type = [];
            $.each($("input[name='price_type']:checked"), function(){
            price_type.push($(this).val());
            });
            var green = [];
            $.each($("input[name='green']:checked"), function(){
            green.push($(this).val());
            });
            var green_score = [];
            $.each($("input[name='green_score']:checked"), function(){
            green_score.push($(this).val());
            }); 
            var ser_lim = [];
            $.each($("input[name='ser_lim']:checked"), function(){
            ser_lim.push($(this).val());
            });
            var disc = [];
            $.each($("input[name='disc']:checked"), function(){
            disc.push($(this).val());
            });

                var po = $('#po').val();

                        var progressTimer;
                     $(document).ajaxStart(function () {
                         $("#main-data").hide();
                         $("#loading").show();
                         clearTimeout(progressTimer);
                     }).ajaxStop(function () {
                         progressTimer = setTimeout(function () {
                            $("#loading").hide();
                         $("#main-data").show();
                         window.scrollTo(0, 350);
                         }, 500)
                     });
     

                $.ajax({
                url: '<?php echo e(url('get-data')); ?>',
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
                        success: function(data) {

                        $('#packages').html(data);
                        var count=$('.count').val();
                        $('.tot_count').html(count);
                        $('#Tpages').html(count);
                        var pages=Math.ceil( count/7 );
                        $('#totalPages').val(pages);            
                        $('#currentPage').val(1);          
                       if(pages==1 || pages==0){
                           $('#hideload').hide();
                        }else{               
                            $('#hideload').show();   
                        }  
                        // console.log(data);
                        },
                        error: function(e) {

                        // console.log(e.message);
                        }
                });
        });
        
        
        
          $('.disc').click(function(){ 

            var proId = $("input[name='compare']:checked").val();
            var currentValue=$('#cur_invoice').val();
            var cur_invoice_moth_year=$('#cur_invoice_moth_year').val();
            
            var year = [];
            $.each($("input[name='year']:checked"), function(){
            year.push($(this).val());
            }); 
            var price_type = [];
            $.each($("input[name='price_type']:checked"), function(){
            price_type.push($(this).val());
            });
            var green = [];
            $.each($("input[name='green']:checked"), function(){
            green.push($(this).val());
            });
            var green_score = [];
            $.each($("input[name='green_score']:checked"), function(){
            green_score.push($(this).val());
            }); 
            var ser_lim = [];
            $.each($("input[name='ser_lim']:checked"), function(){
            ser_lim.push($(this).val());
            });
            var disc = [];
            $.each($("input[name='disc']:checked"), function(){
            disc.push($(this).val());
            });

                var po = $('#po').val();

                        var progressTimer;
                     $(document).ajaxStart(function () {
                         $("#main-data").hide();
                         $("#loading").show();
                         clearTimeout(progressTimer);
                     }).ajaxStop(function () {
                         progressTimer = setTimeout(function () {
                            $("#loading").hide();
                         $("#main-data").show();
                         window.scrollTo(0, 350);
                         }, 500)
                     });
     

                $.ajax({
                url: '<?php echo e(url('get-data')); ?>',
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
                        success: function(data) {

                        $('#packages').html(data);
                        var count=$('.count').val();
                        $('.tot_count').html(count);
                        $('#Tpages').html(count);
                        var pages=Math.ceil( count/7 );
                        $('#totalPages').val(pages);            
                        $('#currentPage').val(1);          
                       if(pages==1 || pages==0){
                           $('#hideload').hide();
                        }else{               
                            $('#hideload').show();   
                        }  
                        // console.log(data);
                        },
                        error: function(e) {

                        // console.log(e.message);
                        }
                });
        });
    
      
     $('#packages').on('click','.disc-activate', function() {
       
        
        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        var po = $('#po').val();

        var year = [];
         var currentValue=$('#cur_invoice').val();
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
        
            disc.push('promo');
        


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
                'activateDisc':'activate',
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
                $('#promo-check').attr('checked');
                $(".disc").prop("checked", true);

                if (pages == 1 || pages == 0) {
                    $('#hideload').hide();
                } else {
                    $('#hideload').show();
                }

                //   console.log(data);
            },
            error: function(e) {
                console.log(e.message);
            }
        });

    });
    
    
    
      $('.bundle').click(function() {

        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        var po = $('#po').val();

        var year = [];
         var currentValue=$('#cur_invoice').val();
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
            url: '/get-data-pack',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'refresh': '1',
                'currentValue':currentValue
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
                $('#seperated').css('display', 'none');
                $('#pro-select').html("");
                $('.bundle').addClass("active");
                $('.seperate').removeClass("active");
                $('#pills-home').addClass("active");
                $("#pills-home-tab").addClass('active');
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
                $('.sec-hide').show();
                $('.sec-show').hide();

                // console.log(data);
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });

    });
    
    
    
     var sep=$('#sep').data('sep');
    
   
    
    if(sep=='seperate'){
        
        //   $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        $('#elec_tab').addClass("active");
        $('#gas_tab').removeClass("active");
        $('.electricity-title').show();
        $('.gas-title').hide();
        var po = $('#po').val();
        var year = [];
         var currentValue=$('#cur_invoice').val();
         
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
            url: '/get-data-elec',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'sep':'sep',
                'type': 'electricity',
                'currentValue':currentValue
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
                $('#seperated').css('display', 'block');
                $('.seperate').addClass("active");
                $('.bundle').removeClass("active");
                $('#pills-home').addClass("active");
                $("#pills-home-tab").addClass('active');
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

                //   console.log(data);
                $('.sec-hide').hide();
                $('.sec-show').show();
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
        
    }
    
    $('.seperate').click(function() {
        
        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        $('#elec_tab').addClass("active");
        $('#gas_tab').removeClass("active");
        $('.electricity-title').show();
        $('.gas-title').hide();
        var po = $('#po').val();
        var year = [];
         var currentValue=$('#cur_invoice').val();
         
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
            url: '/get-data-elec',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'sep':'sep',
                'type': 'electricity',
                'currentValue':currentValue
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
                $('#seperated').css('display', 'block');
                $('.seperate').addClass("active");
                $('.bundle').removeClass("active");
                $('#pills-home').addClass("active");
                $("#pills-home-tab").addClass('active');
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

                //   console.log(data);
                $('.sec-hide').hide();
                $('.sec-show').show();
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
    });
    
    
        $('.electric_tab').click(function() {
        
        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        $('#elec_tab').addClass("active");
        $('#gas_tab').removeClass("active");
        $('.electricity-title').show();
        $('.gas-title').hide();
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
            url: '/get-data-elec',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'type': 'electricity'
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
                $('#seperated').css('display', 'block');
                $('.seperate').addClass("active");
                $('.bundle').removeClass("active");
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

                //  console.log(data);
            },
            error: function(e) {
                //  console.log(e.message);
            }
        });
    });
    
        $('.gas_tab').click(function() {

        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        $('#gas_tab').addClass("active");
        $('#elec_tab').removeClass("active");
        $('.electricity-title').hide();
        $('.gas-title').show();
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
            url: '/get-data-gas',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'type': 'gas'
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
                $('#seperated').css('display', 'block');
                $('.seperate').addClass("active");
                $('.bundle').removeClass("active");
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

                // console.log(data);
            },
            error: function(e) {
                // console.log(e.message);
            }
        });
    });
    
   
                $('#packages').on('change', '.compare', function(){       

                            var pro_count = $("input[name='compare']:checked").length;    
                            if(pro_count){        
                                $('.compare-sec').show();
                            }else{       
                               $('.compare-sec').hide();
                            }        
                              var proId = $("input[name='compare']:checked").val();
                              var value = [];
                            $.each($("input[name='compare']:checked"), function(){
                            value.push($(this).val());
                            });
                                $.ajax({
                                     url: '<?php echo e(url('get_compare_button')); ?>',
                                    type: 'GET',
                                    data: {'ids':value},
                                    success: function(data) {
                                    $('#comp-items').html(data);
                                    console.log(data);
                                    },
                                    error: function(e) {
                                    // console.log(e.message);
                                    }
                            }); 
                            if (pro_count >= 2){
                            $("#compareme").attr("disabled", false);
                            } else{
                            $("#compareme").attr("disabled", true);
                            }
                            if (pro_count == 3){    
                             $('input.compare:not(:checked)').attr('disabled', 'disabled');
                            }else{        
                              $('input.compare:not(:checked)').attr('disabled', false);  
                            }
                });
    
                $('#comp-items').on('click', '#compareme', function(){
                            var year = $("input[name='year']:checked").val();
                            var po = $('#po').val();
                            var green = $("input[name='green']:checked").val();
                            var price_type = $("input[name='price_type']:checked").val();
                            var value = [];
                            $.each($("input[name='compare']:checked"), function(){
                            value.push($(this).val());
                            });
                            var ids = value.join(",");
                            var progressTimer;
                            $.ajax({
                            url: '<?php echo e(url('get_compare')); ?>',
                                    type: 'GET',
                                    data: {'ids':ids, 'year':year, 'po':po, 'price_type':price_type, 'green':green},
                                    success: function(data) {

                                    $('#slide-sec').html(data);
                                    window.scrollTo(0, 350);          
                                    console.log(data);
                                    },
                                    error: function(e) {
                                    // console.log(e.message);
                                    }
                            });
            });
    
                $('#slide-sec').on('click', '.delete-com', function(){
                            var del_id=$(this).data('id');
                            $(".myCheck"+del_id).prop("checked", false);
                            var year = $("input[name='year']:checked").val();
                            var po = $('#po').val();
                            var green = $("input[name='green']:checked").val();
                            var price_type = $("input[name='price_type']:checked").val();
                            var values = [];
                            $.each($("input[name='compare']:checked"), function(){
                            values.push($(this).val());
                            });
                            values = jQuery.grep(values, function(value) {
                            return value != del_id;
                            });
                            var ids = values.join(",");
                            var progressTimer;
                            $.ajax({
                            url: '<?php echo e(url('get_compare')); ?>',
                                   type: 'GET',
                                   data: {'ids':ids, 'year':year, 'po':po, 'price_type':price_type, 'green':green},
                                   success: function(data) {

                                   $('#slide-sec').html(data);
                                   window.scrollTo(0, 0);
                                   console.log(data);
                                   },
                                   error: function(e) {

                                //   console.log(e.message);
                                   }
                            });


                });

                $('#comp-items').on('click', '.delete-coms', function(){

                            var del_id=$(this).val();
                            var year = $("input[name='year']:checked").val();
                            var po = $('#po').val();
                            var green = $("input[name='green']:checked").val();
                            var price_type = $("input[name='price_type']:checked").val();
                            var value = [];
                            $.each($("input[name='compare']:checked"), function(){
                            value.push($(this).val());
                            });
                            var ids = value.join(",");    
                            var progressTimer;
                            $.ajax({
                            url: '<?php echo e(url('get_compare')); ?>',
                                type: 'GET',
                                data: {'ids':ids, 'year':year, 'po':po, 'price_type':price_type, 'green':green},
                                success: function(data) {
                                $('#slide-sec').html(data);
                                console.log(data);
                                },
                                error: function(e) {
                                // console.log(e.message);
                                }
                            });
                });
      
                $('#tac-data').on('click', '.check-expl', function(){
                                var id=$(this).data('id');    
                                $('#com-content-dis'+id).slideToggle();
                }); 
                
                $('#packages').on('change', '.compare', function(){
                                var pro_count = $("input[name='compare']:checked").length;
                                if (pro_count >= 2){
                                $("#compareme").attr("disabled", false);
                                } else{
                                $("#compareme").attr("disabled", true);
                                }
                });
    
    
                $('#tac-data').on('click','#back_plan', function(){
                           $ ('#tac-data').html(data);
                });
    
     $('#packages').on('click','.choose', function(){

       var id=$(this).data('id');
       $('#choose'+id).html('<i class="fa fa-check" aria-hidden="true"></i>GESELECTEERD');
       $('.choose').css('disabled','disabled');

    });
    
      $('#packages').on('click', '.getchoose', function() {
$('.btnmonth').removeClass('active');
        $('.btnyear').addClass('active');
        var id = $(this).data('id');
        var type = $(this).data('type');
        var supplier = $(this).data('supplier');
        var product = $(this).data('product');
        var url = $(this).data('url');
        var pid = $(this).data('pid');
        var egid = $(this).data('egid');




        $.ajax({
                url: '/product_select',
            type: 'GET',
            data: {
                'id': id,
                'type': type,
                'supplier': supplier,
                'product': product,
                'url': url,
                'pid': pid,
                'egid': egid
            },
            success: function(data) {

                if (type == 'electricity') {
                    $('#pro-select').html(data);
                    $('#gas_tab').addClass("active");
                    $('#elec_tab').removeClass("active");
                    $('.electricity-title').hide();
                    $('.gas-title').show();
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
                    $.ajax({
                        url: '/get-data-sep',
                        type: 'GET',
                        data: {
                            'year': year,
                            'po': po,
                            'price_type': price_type,
                            'green': green,
                            'green_score': green_score,
                            'ser_lim': ser_lim,
                            'disc': disc,
                            'type': 'gas',
                            'dual': 'dual'
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
                            $('#seperated').css('display', 'block');
                            $('.seperate').addClass("active");
                            $('.bundle').removeClass("active");
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
                            //   console.log(data);
                        },
                        error: function(e) {
                            //   console.log(e.message);
                        }
                    });

                } else {
                    $('#pro-select').html(data);
                    $('#elec_tab').addClass("active");
                    $('#gas_tab').removeClass("active");
                    $('.electricity-title').show();
                    $('.gas-title').hide();
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
                        url: '/get-data-elec',
                        type: 'GET',
                        data: {
                            'year': year,
                            'po': po,
                            'price_type': price_type,
                            'green': green,
                            'green_score': green_score,
                            'ser_lim': ser_lim,
                            'disc': disc,
                            'type': 'electricity',
                            'dual': 'dual'
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
                            $('#seperated').css('display', 'block');
                            $('.seperate').addClass("active");
                            $('.bundle').removeClass("active");
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

                            //   console.log(data);
                        },
                        error: function(e) {
                            //   console.log(e.message);
                        }
                    });
                }

            }
        });

        $('#getchoose' + id).html("<i class='fa fa-check' aria-hidden='true'></i>GESELECTEERD");

    });
    
       $('#pro-select').on('click', '#close-select', function() {
$('.btnmonth').removeClass('active');
        $('.btnyear').addClass('active');
        $('#pro-select').html('');
        $('#elec_tab').addClass("active");
        $('#gas_tab').removeClass("active");
        $('.electricity-title').show();
        $('.gas-title').hide();
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
            url: '/get-data-elec',
            type: 'GET',
            data: {
                'year': year,
                'po': po,
                'price_type': price_type,
                'green': green,
                'green_score': green_score,
                'ser_lim': ser_lim,
                'disc': disc,
                'type': 'electricity',
                'refresh': '1',
                'delete':'delete'
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

                $('#seperated').css('display', 'block');
                $('.seperate').addClass("active");
                $('.bundle').removeClass("active");
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

                //   console.log(data);
                $('.sec-hide').hide();
                $('.sec-show').show();
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
    });
    
   
       
     $('#packages').on('click','.more-details', function(){
         
           
  var supplier=$(this).data('supplier');
   var product=$(this).data('product');

  
   

      if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html("<i class='fas fa-sort-down'></i> Meer info");
		} else {
		    
		 $(this).closest('.section-3-sec').find('.more-tab > .tabcontent:first').show();
        $(this).closest('.section-3-sec').find('.tab > .tablinks:first').addClass('active');
                    window.history.pushState('obj', 'newtitle', '/details/pack/'+supplier+'/'+product);
			$(this).addClass("less");
			$(this).html("<i class='fas fa-sort-up' ></i> Minder info");
		}
    });
    
       
 $('.sorting').change(function(){
     
  
     var sort=$(this).val();
     
      
       if(sort!=""){
 
        $.ajax({
            url: '<?php echo e(url('get_sort')); ?>',
            type: 'GET',
            data: {'sort':sort},
            success: function(data) {

            $('#packages').html(data);
             var count=$('.count').val();
            $('.tot_count').html(count);
            $('#Tpages').html(count);
            var pages=Math.ceil( count/7 );
            $('#totalPages').val(pages);            
            $('#currentPage').val(1);           
            if(pages==1 || pages==0){
               $('#hideload').hide();
            }else{               
                $('#hideload').show();   
            }
           
            // console.log(data);
            
            },
            error: function(e) {

            // console.log(e.message);
            }
        });
       }
        
        
     
        
    });
    
    // estimate consumption
    
    if ($("#estimate").prop("checked")) {
      
      $('.estim').show();
  }else{
      
      $('.estim').hide();
  }
        $('.esti,#estimate,.meter').change(function() {

        var residence = $('.estiresidence').val();
        var building_type = $('.building_type').val();
        var isolation_level = $('.isolation_level').val();
        var heating_system = $('.heating_system').val();
       
     //   $('.capacity_decen_pro').val("0");
        
        if ($("#estimate").prop("checked")) {
    var est = "estmate";
            }else{
                
    var est ="not"            
            }

        
       
      

if(residence && building_type && isolation_level && heating_system && est=="estmate"){
        $.ajax({
            url: '/estimate-consumption',
            type: 'GET',
            data: {
                'residence': residence,
                'building_type': building_type,
                'isolation_level': isolation_level,
                'heating_system': heating_system,
                
            },
            beforeSend: function() {
            },
            complete: function() {
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                
                $('#consuption1').val(obj['E_mono']);
                $('.consuption1se').val(obj['E_mono']);
                $('#consuption_day_elec1').val(obj['E_day']);
                $('#consuption_night_elec1').val(obj['E_night']);
                $('#consuption_excl_night').val(obj['E_excl_night']);
                $('#consumtion_gas1').val(obj['G']);
                $('.consuption_day_elec1de').val(obj['E_day']);
                $('.consuption_night_elec1de').val(obj['E_night']);
                $('.consuption_excl_nightde').val(obj['E_excl_night']);
                   console.log(obj['E_mono']);
                   
                   
         consuption1=$('#consuption1').val();
         consuption1se=$('.consuption1se').val();
         consuption_day_elec1=$('#consuption_day_elec1').val();
         consuption_night_elec1=$('#consuption_night_elec1').val();
         consuption_excl_night=$('#consuption_excl_night').val();
         consumtion_gas1=$('#consumtion_gas1').val();
         consuption_day_elec1de=$('.consuption_day_elec1de').val();
         consuption_night_elec1de=$('.consuption_night_elec1de').val();
         consuption_excl_nightde=$('.consuption_excl_nightde').val();
         
         
         
         
         
           var capacity_decen_pro=$('.capacity_decen_pro').val();
       if ($('#dec_pro').prop('checked')){
           
           if(capacity_decen_pro!=""){
               
               $.ajax({
            url: '/estimate-consumption-cal',
            type: 'GET',
            data: {
                'capacity_decen_pro': capacity_decen_pro,
                'consuption1':consuption1,
                'consuption1se': consuption1se,
                'consuption_day_elec1': consuption_day_elec1,
                'consuption_night_elec1': consuption_night_elec1,
                'consuption_excl_night': consuption_excl_night,
                'consumtion_gas1': consumtion_gas1,
                'consuption_day_elec1de': consuption_day_elec1de,
                'consuption_night_elec1de': consuption_night_elec1de,
                'consuption_excl_nightde': consuption_excl_nightde,
                
            },
            beforeSend: function() {
               // $('#meter-details').hide();
               //  $('.ec-loader').show();
                
            },
            complete: function() {
               // $('#meter-details').show();
              //  $('.ec-loader').hide();
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                
                if(obj['consuption1']<=0){
                    var consuption1=0;
                }else{
                    
                     var consuption1=obj['consuption1'];
                }
                
                if(obj['consuption1se']<=0){
                    var consuption1se=0;
                }else{
                    
                     var consuption1se=obj['consuption1se'];
                }
                
                if(obj['consuption_day_elec1']<=0){
                    var consuption_day_elec1=0;
                }else{
                    
                     var consuption_day_elec1=obj['consuption_day_elec1'];
                }
                
                if(obj['consuption_night_elec1']<=0){
                    var consuption_night_elec1=0;
                }else{
                    
                     var consuption_night_elec1=obj['consuption_night_elec1'];
                }
                
                if(obj['consuption_excl_night']<=0){
                    var consuption_excl_night=0;
                }else{
                    
                     var consuption_excl_night=obj['consuption_excl_night'];
                }
                
                if(obj['consumtion_gas1']<=0){
                    var consumtion_gas1=0;
                }else{
                    
                     var consumtion_gas1=obj['consumtion_gas1'];
                }
                
                if(obj['consuption_day_elec1de']<=0){
                    var consuption_day_elec1de=0;
                }else{
                    
                     var consuption_day_elec1de=obj['consuption_day_elec1de'];
                }
                
                if(obj['consuption_night_elec1de']<=0){
                    var consuption_night_elec1de=0;
                }else{
                    
                     var consuption_night_elec1de=obj['consuption1'];
                }
                
                if(obj['consuption_excl_nightde']<=0){
                    var consuption_excl_nightde=0;
                }else{
                    
                     var consuption_excl_nightde=obj['consuption_excl_nightde'];
                }
                
                
                
                $('#consuption1').val(consuption1);
                $('.consuption1se').val(consuption1se);
                $('#consuption_day_elec1').val(consuption_day_elec1);
                $('#consuption_night_elec1').val(consuption_night_elec1);
                $('#consuption_excl_night').val(consuption_excl_night);
                $('#consumtion_gas1').val(consumtion_gas1);
                $('.consuption_day_elec1de').val(consuption_day_elec1de);
                $('.consuption_night_elec1de').val(consuption_night_elec1de);
                $('.consuption_excl_nightde').val(consuption_excl_nightde);
                //   console.log(obj['E_mono']);
                
         
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
           }
            
        }else{
            
        
            
            
               $('#consuption1').val(consuption1);
                $('.consuption1se').val(consuption1se);
                $('#consuption_day_elec1').val(consuption_day_elec1);
                $('#consuption_night_elec1').val(consuption_night_elec1);
                $('#consuption_excl_night').val(consuption_excl_night);
                $('#consumtion_gas1').val(consumtion_gas1);
                $('.consuption_day_elec1de').val(consuption_day_elec1de);
                $('.consuption_night_elec1de').val(consuption_night_elec1de);
                $('.consuption_excl_nightde').val(consuption_excl_nightde);
            
            
            
        } 
         
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
        
}
        
        
        
        
       
        
    });
    
        var consuption1=$('#consuption1').val();
        var consuption1se=$('.consuption1se').val();
        var consuption_day_elec1=$('#consuption_day_elec1').val();
        var consuption_night_elec1=$('#consuption_night_elec1').val();
        var consuption_excl_night=$('#consuption_excl_night').val();
        var consumtion_gas1=$('#consumtion_gas1').val();
        var consuption_day_elec1de=$('.consuption_day_elec1de').val();
        var consuption_night_elec1de=$('.consuption_night_elec1de').val();
        var consuption_excl_nightde=$('.consuption_excl_nightde').val();
        
        $('.esti,#estimate,.meter').change(function() {
            
         consuption1=$('#consuption1').val();
         consuption1se=$('.consuption1se').val();
         consuption_day_elec1=$('#consuption_day_elec1').val();
         consuption_night_elec1=$('#consuption_night_elec1').val();
         consuption_excl_night=$('#consuption_excl_night').val();
         consumtion_gas1=$('#consumtion_gas1').val();
         consuption_day_elec1de=$('.consuption_day_elec1de').val();
         consuption_night_elec1de=$('.consuption_night_elec1de').val();
         consuption_excl_nightde=$('.consuption_excl_nightde').val();
            
        });
        
        $(":input").bind('keyup', function () {
       // $('.capacity_decen_pro').val("0");
         consuption1=$('#consuption1').val();
         consuption1se=$('.consuption1se').val();
         consuption_day_elec1=$('#consuption_day_elec1').val();
         consuption_night_elec1=$('#consuption_night_elec1').val();
         consuption_excl_night=$('#consuption_excl_night').val();
         consumtion_gas1=$('#consumtion_gas1').val();
         consuption_day_elec1de=$('.consuption_day_elec1de').val();
         consuption_night_elec1de=$('.consuption_night_elec1de').val();
         consuption_excl_nightde=$('.consuption_excl_nightde').val();          
        });
    
     
    
    $('#dec_pro,.capacity_decen_pro').change(function(){
        
        var capacity_decen_pro=$('.capacity_decen_pro').val();
        
     
        
        
        
       if ($('#dec_pro').prop('checked')) {
           
           if(capacity_decen_pro!=""){
               
                if ($("#estimate").prop("checked")) {
               
               $.ajax({
            url: '/estimate-consumption-cal',
            type: 'GET',
            data: {
                'capacity_decen_pro': capacity_decen_pro,
                'consuption1':consuption1,
                'consuption1se': consuption1se,
                'consuption_day_elec1': consuption_day_elec1,
                'consuption_night_elec1': consuption_night_elec1,
                'consuption_excl_night': consuption_excl_night,
                'consumtion_gas1': consumtion_gas1,
                'consuption_day_elec1de': consuption_day_elec1de,
                'consuption_night_elec1de': consuption_night_elec1de,
                'consuption_excl_nightde': consuption_excl_nightde,
                
            },
            beforeSend: function() {
               // $('#meter-details').hide();
               //  $('.ec-loader').show();
                
            },
            complete: function() {
               // $('#meter-details').show();
              //  $('.ec-loader').hide();
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                
                if(obj['consuption1']<=0){
                    var consuption1=0;
                }else{
                    
                     var consuption1=obj['consuption1'];
                }
                
                if(obj['consuption1se']<=0){
                    var consuption1se=0;
                }else{
                    
                     var consuption1se=obj['consuption1se'];
                }
                
                if(obj['consuption_day_elec1']<=0){
                    var consuption_day_elec1=0;
                }else{
                    
                     var consuption_day_elec1=obj['consuption_day_elec1'];
                }
                
                if(obj['consuption_night_elec1']<=0){
                    var consuption_night_elec1=0;
                }else{
                    
                     var consuption_night_elec1=obj['consuption_night_elec1'];
                }
                
                if(obj['consuption_excl_night']<=0){
                    var consuption_excl_night=0;
                }else{
                    
                     var consuption_excl_night=obj['consuption_excl_night'];
                }
                
                if(obj['consumtion_gas1']<=0){
                    var consumtion_gas1=0;
                }else{
                    
                     var consumtion_gas1=obj['consumtion_gas1'];
                }
                
                if(obj['consuption_day_elec1de']<=0){
                    var consuption_day_elec1de=0;
                }else{
                    
                     var consuption_day_elec1de=obj['consuption_day_elec1de'];
                }
                
                if(obj['consuption_night_elec1de']<=0){
                    var consuption_night_elec1de=0;
                }else{
                    
                     var consuption_night_elec1de=obj['consuption1'];
                }
                
                if(obj['consuption_excl_nightde']<=0){
                    var consuption_excl_nightde=0;
                }else{
                    
                     var consuption_excl_nightde=obj['consuption_excl_nightde'];
                }
                
                
                
                $('#consuption1').val(consuption1);
                $('.consuption1se').val(consuption1se);
                $('#consuption_day_elec1').val(consuption_day_elec1);
                $('#consuption_night_elec1').val(consuption_night_elec1);
                $('#consuption_excl_night').val(consuption_excl_night);
                $('#consumtion_gas1').val(consumtion_gas1);
                $('.consuption_day_elec1de').val(consuption_day_elec1de);
                $('.consuption_night_elec1de').val(consuption_night_elec1de);
                $('.consuption_excl_nightde').val(consuption_excl_nightde);
                //   console.log(obj['E_mono']);
                
         
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
        
                }
           }
            
        }else{
            
        
            
            
               $('#consuption1').val(consuption1);
                $('.consuption1se').val(consuption1se);
                $('#consuption_day_elec1').val(consuption_day_elec1);
                $('#consuption_night_elec1').val(consuption_night_elec1);
                $('#consuption_excl_night').val(consuption_excl_night);
                $('#consumtion_gas1').val(consumtion_gas1);
                $('.consuption_day_elec1de').val(consuption_day_elec1de);
                $('.consuption_night_elec1de').val(consuption_night_elec1de);
                $('.consuption_excl_nightde').val(consuption_excl_nightde);
            
            
            
        } 
        
        
    });
    
    
    // pro
    
         consuption1=$('.consuption1p').val();
         consuption1se=$('.consuption1sep').val();
         consuption_day_elec1=$('.consuption_day_elec1p').val();
         consuption_night_elec1=$('.consuption_night_elec1p').val();
         consuption_excl_night=$('.consuption_excl_nightsep').val();
         consumtion_gas1=$('.consumtion_gas1p').val();
         consuption_day_elec1de=$('.consuption_day_elec1dep').val();
         consuption_night_elec1de=$('.consuption_night_elec1dep').val();
         consuption_excl_nightde=$('.consuption_excl_nightdep').val();
    
      $('#dec_pro1,.capacity_decen_pro1').change(function(){
        
        var capacity_decen_pro=$('.capacity_decen_pro1').val();
        
        
       
        
        
       if ($('#dec_pro1').prop('checked')) {
           
           if(capacity_decen_pro!=""){
               
               $.ajax({
            url: '/estimate-consumption-cal',
            type: 'GET',
            data: {
                'capacity_decen_pro': capacity_decen_pro,
                'consuption1':consuption1,
                'consuption1se': consuption1se,
                'consuption_day_elec1': consuption_day_elec1,
                'consuption_night_elec1': consuption_night_elec1,
                'consuption_excl_night': consuption_excl_night,
                'consumtion_gas1': consumtion_gas1,
                'consuption_day_elec1de': consuption_day_elec1de,
                'consuption_night_elec1de': consuption_night_elec1de,
                'consuption_excl_nightde': consuption_excl_nightde,
                
            },
            beforeSend: function() {
               // $('#meter-details').hide();
               //  $('.ec-loader').show();
                
            },
            complete: function() {
               // $('#meter-details').show();
              //  $('.ec-loader').hide();
            },
            success: function(data) {
                var obj = jQuery.parseJSON(data);
                
                if(obj['consuption1']<=0){
                    var consuption1=0;
                }else{
                    
                     var consuption1=obj['consuption1'];
                }
                
                if(obj['consuption1se']<=0){
                    var consuption1se=0;
                }else{
                    
                     var consuption1se=obj['consuption1se'];
                }
                
                if(obj['consuption_day_elec1']<=0){
                    var consuption_day_elec1=0;
                }else{
                    
                     var consuption_day_elec1=obj['consuption_day_elec1'];
                }
                
                if(obj['consuption_night_elec1']<=0){
                    var consuption_night_elec1=0;
                }else{
                    
                     var consuption_night_elec1=obj['consuption_night_elec1'];
                }
                
                if(obj['consuption_excl_night']<=0){
                    var consuption_excl_night=0;
                }else{
                    
                     var consuption_excl_night=obj['consuption_excl_night'];
                }
                
                if(obj['consumtion_gas1']<=0){
                    var consumtion_gas1=0;
                }else{
                    
                     var consumtion_gas1=obj['consumtion_gas1'];
                }
                
                if(obj['consuption_day_elec1de']<=0){
                    var consuption_day_elec1de=0;
                }else{
                    
                     var consuption_day_elec1de=obj['consuption_day_elec1de'];
                }
                
                if(obj['consuption_night_elec1de']<=0){
                    var consuption_night_elec1de=0;
                }else{
                    
                     var consuption_night_elec1de=obj['consuption1'];
                }
                
                if(obj['consuption_excl_nightde']<=0){
                    var consuption_excl_nightde=0;
                }else{
                    
                     var consuption_excl_nightde=obj['consuption_excl_nightde'];
                }
                
                
                
                $('.consuption1p').val(consuption1);
                $('.consuption1sep').val(consuption1se);
                $('.consuption_day_elec1p').val(consuption_day_elec1);
                $('.consuption_night_elec1p').val(consuption_night_elec1);
                $('.consuption_excl_nightsep').val(consuption_excl_night);
                $('.consumtion_gas1p').val(consumtion_gas1);
                $('.consuption_day_elec1dep').val(consuption_day_elec1de);
                $('.consuption_night_elec1dep').val(consuption_night_elec1de);
                $('.consuption_excl_nightdep').val(consuption_excl_nightde);
                //   console.log(obj['E_mono']);
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
           }
            
        }else{
            
        
            
            
                $('.consuption1p').val(consuption1);
                $('.consuption1sep').val(consuption1se);
                $('.consuption_day_elec1p').val(consuption_day_elec1);
                $('.consuption_night_elec1p').val(consuption_night_elec1);
                $('.consuption_excl_nightsep').val(consuption_excl_night);
                $('.consumtion_gas1p').val(consumtion_gas1);
                $('.consuption_day_elec1dep').val(consuption_day_elec1de);
                $('.consuption_night_elec1dep').val(consuption_night_elec1de);
                $('.consuption_excl_nightdep').val(consuption_excl_nightde);
            
            
            
        } 
        
        
    });
    
    
    // estimate cunsumption value update
    
  
    
    
    // end
    
    $('#know').click(function(){
        
        
        $('.estim').hide();
        
    });
    
    $('#estimate').click(function(){
        
        
        $('.estim').show();
        
    });
    
    // end estimate consumption

 $(window).resize(function(){
   var x = $('.mobile-menu').height();   // or any changing value

   $('.filter-sec-mob').css({'top' : x + 'px'});
});


    
 var x = $('.mobile-menu').height();   // or any changing value

   $('.filter-sec-mob').css({'top' : x + 'px'});
    
    });
    
</script>

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
   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
				}
	      });  
    
  function loadMoreData(nextPage){
        console.log(nextPage);
 
 $("#loadMore").hide();
     $(".more-loader").show();
      var packtype=$('.load-type').val(); 

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
            
        // $(".pagemore:hidden").slice(0, 4).slideDown();
        // if ($(".pagemore:hidden").length == 0) {
        //     $("#load").fadeOut('slow');
        // }
        // $('html,body').animate({
        //     scrollTop: $(this).offset().top
        // }, 1500);
    });
});

// $('a[href=#top]').click(function () {
//     $('body,html').animate({
//         scrollTop: 0
//     }, 300);
//     return false;
// });

// $(window).scroll(function () {
//     if ($(this).scrollTop() > 50) {
//         $('.totop a').fadeIn();
//     } else {
//         $('.totop a').fadeOut();
//     }
// });  
    
</script>
<script type="text/javascript">
		
         $('#slide-sec').on('click', '.back-2', function(){       
//	jQuery('.back-2').click(function(){

            $(".compare").prop("checked", false);
	    jQuery('.slide-sec').removeClass("active-sec"); 
            $('.compare').attr('disabled', false);
            $('.compare-sec').hide();
	});

	jQuery('.com-button').click(function () {
		jQuery('.slide-sec').addClass("active-sec");
        jQuery("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
     $('#comp-items').on('click', '.com-button', function(){
   
		jQuery('.slide-sec').addClass("active-sec");
        jQuery("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
    //     <!--Email Validation -->

        $("#recipient-name").keyup(function(){
         var email = $("#recipient-name").val();
         var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
         if (!filter.test(email)) {
           //alert('Please provide a valid email address');
           console.log('not valid');
           $("#error_email").html(email+" is geen geldig e-mailadres");
           email.focus;
           //return false;
        } else {
            console.log(' valid');
            $("#error_email").html("");
        }
     });
    var offsetHeight = document.getElementById('.mobile-menu').offsetHeight;
   
</script>

