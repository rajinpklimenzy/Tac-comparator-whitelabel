jQuery(document).ready(function() {

      
    $('#tabform2').submit(function() {
        $(".loading_section_sec").show();
    });

    $('#tabform1').submit(function() {
        $(".loading_section_sec").show();
    });


    $('.seperated').css('display', 'flex');

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
   

    $('.duration').click(function() {
        
      

        var proId = $("input[name='compare']:checked").val();
        var po = $('#po').val();
        var currentValue=$('#cur_invoice').val();
        

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


                   console.log(data);
            },
            error: function(e) {

                console.log(e.message);
            }
        });


    });


    $('.price_type').click(function() {

        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        var po = $('#po').val();
         var currentValue=$('#cur_invoice').val();

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


    $('.green').click(function() {

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



    $('.green_score').click(function() {
        
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
                //   console.log(e.message);
            }
        });
    });


    $('.ser_lim').click(function() {

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
                // console.log(e.message);
            }
        });
    });


    $('.disc').click(function() {
        
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
                console.log(e.message);
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
                
                 // reload-comparison
    
       
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
        
        

        
            if(year.length > 0 || price_type.length>0 || green.length>0 || green_score.length>0 || ser_lim.length>0){
        
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
                //   console.log(e.message);
            }
        });
            
                
            }
        
        
    
    // end-reload-comparison
    
    
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
                
                 // reload-comparison
    
       
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

        
            if(year.length!=0 || price_type.length!=0 || green.length!=0 || green_score.length!=0 || ser_lim.length!=0){
        
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
                //   console.log(e.message);
            }
        });
            
                
            }
        
        
    
    // end-reload-comparison
    
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
            contentType: 'application/html; charset=utf-8',
           
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
                
                
                 // reload-comparison
    
       
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

        
            if(year.length!=0 || price_type.length!=0 || green.length!=0 || green_score.length!=0 || ser_lim.length!=0){
        
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
                //   console.log(e.message);
            }
        });
            
                
            }
        
        
    
    // end-reload-comparison
    
    
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
                
                 // reload-comparison
    
       
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

        
            if(year.length!=0 || price_type.length!=0 || green.length!=0 || green_score.length!=0 || ser_lim.length!=0){
        
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
                //   console.log(e.message);
            }
        });
            
                
            }
        
        
    
    // end-reload-comparison
    
    
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
                
                 // reload-comparison
    
       
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

        
            if(year.length!=0 || price_type.length!=0 || green.length!=0 || green_score.length!=0 || ser_lim.length!=0){
        
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
                //   console.log(e.message);
            }
        });
            
                
            }
        
        
    
    // end-reload-comparison
    
    
            },
            error: function(e) {
                // console.log(e.message);
            }
        });
    });


    $('#packages').on('change', '.compare', function() {

        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        var pro_count = $("input[name='compare']:checked").length;
        if (pro_count) {
            $('.compare-sec').show();
        } else {
            $('.compare-sec').hide();
        }
        var proId = $("input[name='compare']:checked").val();
        var value = [];
        $.each($("input[name='compare']:checked"), function() {
            value.push($(this).val());
        });

        if (value.length > 0) {
            $.ajax({
                url: '/get_compare_button',
                type: 'GET',
                data: {
                    'ids': value
                },
                success: function(data) {
                    $('#comp-items').html(data);
                    //   console.log(data);
                },
                error: function(e) {
                    //   console.log(e.message);
                }
            });
        }

        if (pro_count >= 2) {
            $("#compareme").attr("disabled", false);
        } else {
            $("#compareme").attr("disabled", true);
        }
        if (pro_count == 3) {
            $('input.compare:not(:checked)').attr('disabled', 'disabled');
        } else {
            $('input.compare:not(:checked)').attr('disabled', false);
        }
    });


    $('#comp-items').on('click', '#compareme', function() {
        
        // $('.btnmonth').removeClass('active');
        // $('.btnyear').addClass('active');
        var year = $("input[name='year']:checked").val();
        var po = $('#po').val();
        var green = $("input[name='green']:checked").val();
        var price_type = $("input[name='price_type']:checked").val();
        var value = [];
        $.each($("input[name='compare']:checked"), function() {
            value.push($(this).val());
        });
        var ids = value.join(",");
        var progressTimer;
        $.ajax({
            url: '/get_compare',
            type: 'GET',
            data: {
                'ids': ids
            },
            success: function(data) {
                $('#slide-sec').html(data);
                $('.right-sec').hide();
                window.scrollTo(0, 350);
                // console.log(data);
            },
            error: function(e) {
                // console.log(e.message);
            }
        });
    });

    $('#slide-sec').on('click', '.delete-com', function() {
        
        
        var del_id = $(this).data('id');
        $(".myCheck" + del_id).prop("checked", false);
        var year = $("input[name='year']:checked").val();
        var po = $('#po').val();
        var green = $("input[name='green']:checked").val();
        var price_type = $("input[name='price_type']:checked").val();
        var values = [];
        $.each($("input[name='compare']:checked"), function() {
            values.push($(this).val());
        });
        values = jQuery.grep(values, function(value) {
            return value != del_id;
        });
        var ids = values.join(",");
        var progressTimer;
        $.ajax({
            url: '/get_compare',
            type: 'GET',
            data: {
                'ids': ids,
                'year': year
            },
            success: function(data) {
                $('#slide-sec').html(data);
                window.scrollTo(0, 0);
                //  console.log(data);
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
    });

    $('#comp-items').on('click', '.delete-coms', function() {

        var del_id = $(this).val();
        var year = $("input[name='year']:checked").val();
        var po = $('#po').val();
        var green = $("input[name='green']:checked").val();
        var price_type = $("input[name='price_type']:checked").val();
        var value = [];
        $.each($("input[name='compare']:checked"), function() {
            value.push($(this).val());
        });
        var ids = value.join(",");
        var progressTimer;
        $.ajax({
            url: '/get_compare',
            type: 'GET',
            data: {
                'ids': ids
            },
            success: function(data) {
                $('#slide-sec').html(data);
                //   console.log(data);
            },
            error: function(e) {
                //   console.log(e.message);
            }
        });
    });


    $('#tac-data').on('click', '.check-expl', function() {
        var id = $(this).data('id');
        $('#com-content-dis' + id).slideToggle();
    });

    $('#packages').on('change', '.compare', function() {
        var pro_count = $("input[name='compare']:checked").length;
        if (pro_count >= 2) {
            $("#compareme").attr("disabled", false);
        } else {
            $("#compareme").attr("disabled", true);
        }
    });


    $('#tac-data').on('click', '#back_plan', function() {
        $('#tac-data').html(data);
    });

    $('#packages').on('click', '.choose', function() {
        var id = $(this).data('id');
        $('#choose' + id).html("<i class='fa fa-check' aria-hidden='true'></i>GESELECTEERD");
        $('.choose').css('disabled', 'disabled');
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



    $('#packages').on('click', '.more-details', function() {

        var supplier = $(this).data('supplier');
        var product = $(this).data('product');
        var uuid = $(this).data('uuid');
        if ($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html("<i class='fas fa-sort-down'></i> Meer info");
        } else {
            $(this).closest('.section-3-sec').find('.more-tab > .tabcontent:first').show();
            $(this).closest('.section-3-sec').find('.tab > .tablinks:first').addClass('active');
            // window.history.pushState('obj', 'newtitle', '/details/pack/' + supplier + '/' + product+'?u='+uuid);
            $(this).addClass("less");
            $(this).html("<i class='fas fa-sort-up' ></i> Minder info");
        }
    });

    $('#tac-data').on('change', '.sorting', function() {
        var sort = $(this).val();
        if (sort != "") {

            $.ajax({
                url: '/get_sort',
                type: 'GET',
                data: {
                    'sort': sort
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

                    // console.log(data);                        
                },
                error: function(e) {
                    // console.log(e.message);
                }
            });
        }
    });


    $('.sorting').change(function() {
        
        $('.btnmonth').removeClass('active');
        $('.btnyear').addClass('active');
        var sort = $(this).val();
        if (sort != "") {

            $.ajax({
                url: '/get_sort',
                type: 'GET',
                data: {
                    'sort': sort
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

                    //   console.log(data);                    
                },
                error: function(e) {
                    //   console.log(e.message);
                }
            });

        }
    });

    $('#packages').on('click', '.sec-3-btn', function() {
        var a = $(this).data('id');
        jQuery('.more-contenta' + a).slideToggle();
    });
    $('.btn2').click(function() {
        $('.btn2').removeClass("active");
        var a = $(this).data('for');
        $('.btn' + a).addClass("active");
    });


    $(".recipient-name").keyup(function() {
        var email = $(".recipient-name").val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!filter.test(email)) {
            console.log('not valid');
            $(".error_email").html(email + " is geen geldig e-mailadres");
            $("#send").attr("disabled", true);
            email.focus;
        } else {
            console.log(' valid');
            $(".error_email").html("");
            $("#send").attr("disabled", false);
        }
        if (email == "") {
            $(".error_email").html("");
            $("#send").attr("disabled", true);
        }
    });



    $('#slide-sec').on('click', '.back-2', function() {
        $(".compare").prop("checked", false);
        jQuery('.slide-sec').removeClass("active-sec");
        $('.compare').attr('disabled', false);
        $('.right-sec').show();
        $('.compare-sec').hide();
    });

    jQuery('.com-button').click(function() {
        jQuery('.slide-sec').addClass("active-sec");
        jQuery("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    $('#comp-items').on('click', '.com-button', function() {

        jQuery('.slide-sec').addClass("active-sec");
        jQuery("html, body").animate({
            scrollTop: 0
        }, 500);
        return false;
    });
    
    
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
    
    
    // estimate cunsumption value update
    
  
    
    
    // end
    
    $('#know').click(function(){
        
        
        $('.estim').hide();
        
    });
    
    $('#estimate').click(function(){
        
        
        $('.estim').show();
        
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
    
    
        // reload-comparison
    
       
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
                //   console.log(e.message);
            }
        });
        
        
    
    // end-reload-comparison




});



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


function openCity2(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function openCity(evt, cityName) {
    $target = $(evt.currentTarget);
    $container = $target.closest('.more-tab');
    $container.find('.tablinks').removeClass('active');
    $container.find('.tabcontent').hide();
    $('#' + cityName).show();
    $target.addClass('active');
}


function removeParam(key, sourceURL) {
    var rtn = sourceURL.split("?")[0],
        param,
        params_arr = [],
        queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
    if (queryString !== "") {
        params_arr = queryString.split("&");
        for (var i = params_arr.length - 1; i >= 0; i -= 1) {
            param = params_arr[i].split("=")[0];
            if (param === key) {
                params_arr.splice(i, 1);
            }
        }
        rtn = rtn + "?" + params_arr.join("&");
    }
    return rtn;
}


$('.modal').on('shown.bs.modal', function(e) {
    $('html').addClass('freezePage');
    $('body').addClass('freezePage');
});
$('.modal').on('hidden.bs.modal', function(e) {
    $('html').removeClass('freezePage');
    $('body').removeClass('freezePage');
});


$(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
        $('.totop a').fadeIn();
    } else {
        $('.totop a').fadeOut();
    }
});