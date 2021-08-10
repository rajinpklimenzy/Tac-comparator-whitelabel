<?php
header('Set-Cookie: cross-site-cookie=uuid; SameSite=None; Secure');

?>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
       @if($page=='request')
            @if(Session::get('locale')=='nl') 
                <title>Bevestigen</title>
            @else
                <title>Confirmation</title>
            @endif
        @else
            @if(Session::get('locale')=='nl')
                <title>Overzicht resultaten</title>
            @else
                <title>Aperçu des résultats</title>
            @endif
        @endif
            <meta name="description" content="Exclusieve Kortingen! Direct en zonder Boetes Switchen met Tariefchecker.be. Vergelijk GRATIS de Belgische Energieleveranciers en Bespaar op je Energiefactuur!">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{url('css/style.css')}}">
            <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="{{url('css/teriefchecker.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ url('css/tcrequest.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css')}}">
            <link rel="icon" type="image/png" href="{{url('uploads/fav-icon/'.$doamin->fav_icon)}}"/>
            <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
            
            <!-- Google Tag Manager -->
            
          <!-- This site is converting visitors into subscribers and customers with OptinMonster - https://optinmonster.com -->
<script type="text/javascript" src="https://a.omappapi.com/app/js/api.min.js" data-account="5149" data-user="29001" async></script>
<!-- / https://optinmonster.com -->

    </head>
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
    @if($banner_background_color_activate == 1)
        .header-text-content{
            background:{{$banner_background_color}}!important;  
        }
    @endif
    @if($request_banner_background_color_activate == 1)
        .tcrequest .container-fluid{
            background:{{$request_banner_background_color}}!important;  
        }
    @endif

    @if($button_color)
        .choose1, .choose, .twotabs .form-group.calculate>input, .req-btn-new{
            background: {{$button_color}}!important;
            border: none;
        }
    @endif
    @if($banner_text_color)
        .header-text-content h3, span.banner-text-2{
            color:{{$banner_text_color}}!important; 
            text-shadow: 0 0 {{$banner_text_color}} !important; 
        }
    @endif
    @if($change_your_data_backgorund_color)
        .data-sec{
            background-color:{{$change_your_data_backgorund_color}}!important;  
        }
    @endif
    @if($change_your_data_text_color)
        .data-sec .icon i,
        .data-sec h2,
        .data-sec .type h6, .data-sec .type h6 .light-font, .data-sec .type p {
            color:{{$change_your_data_text_color}}!important;  
        }
        .change-sec-btn{
            border-color: {{$change_your_data_button_color}}!important;
            color:{{$change_your_data_button_color}}!important;
        }
        button.btn.btn-primary.change-sec-btn:hover {
            background-color: transparent!important;
            color: {{$change_your_data_button_color}}!important;
            border: 2px solid {{$change_your_data_button_color}}!important;
            opacity: 0.8;
        }
    @endif  
    @if($navigation_menu_button_color)
        span.arrow-sec.arrow-sec-1 .top_tick_sec a i, .header-sec .arrow-sec i,
        span.two_sec_inner{
           color:{{$navigation_menu_button_color}}!important;  
        }
        span.arrow-sec.arrow-sec-2 .two-sec, span.arrow-request.arrow-sec .two-sec.two_sec_active{
           border-color:{{$navigation_menu_button_color}}!important;  
        }
        .header-sec .arrow,
        .header-sec .arrow:after,
        .header-sec .arrow:before{
           background:{{$navigation_menu_button_color}}!important;  
        }

    @endif
    @if($menuIconColor)
        .faq-sec i{
           color:{{$menuIconColor}}!important;  
        }
    @endif
    @if($menuTextColor)
        .faq-sec a{
           color:{{$menuTextColor}}!important;  
        }
    @endif
    @if($navigation_text_color)
        .arrow-request p{
           color:{{$navigation_text_color}}!important;  
        }
    @endif
    @if($navigation_text_inactive_color)
        span.arrow-sec.arrow-sec-1 p a, span.arrow-sec.arrow-sec-2 p a{
           color:{{$navigation_text_inactive_color}}!important;  
        }
         span.arrow-sec.arrow-sec-1 p a:hover, span.arrow-sec.arrow-sec-2 p a:hover{
           opacity: 0.8;  
        }
        .header-sec .start-sec .arrow-sec a, .active_3 {
          color:{{$navigation_text_inactive_color}}!important;      
        }
        .two-sec.two_sec_active{
            border-color:{{$navigation_text_inactive_color}}!important;
        }
    @endif
    @if($navigation_bar_color)
        .header-sec{
           background-color:{{$navigation_bar_color}}!important; 
        }
    @endif
    @if($navigation_text_color)
        .start-sec a, .arrow-request{
            color:{{$navigation_text_color}}!important;  
        }
        .two-sec-inactive{
        	border-color: {{$navigation_text_color}}!important;
        }
    @endif
    @if($menuIconColor_inactive)
        span.two_sec_inner_inactive{
            color:{{$menuIconColor_inactive}}!important;  
        }
        .arrow-request .two-sec{
            border-color: {{$menuIconColor_inactive}}!important;
        }
    @endif
    @if($listing_background_color)
        .featured-sec .featured, .featured-sec .featured .total_sec_last {
           background-color:{{$listing_background_color}}!important;  
        }
    @endif
    @if($listing_background_color_reg)
        .section-3-sec {
           background-color:{{$listing_background_color_reg}}!important;  
        }
    @endif
    @if($more_info_button_color)
       #myButton1{
           background-color:{{$more_info_button_color}}!important;  
        }
    @endif
    @if($more_info_text_color)
        #myButton1 {
           color:{{$more_info_text_color}}!important;  
        }
        #myButton1:hover{
            opacity: 0.8;
        }
    @endif
    @if($cta_button_color)
        .choose1, .choose, .twotabs .form-group.calculate>input, .req-btn-new{
            color:{{$cta_button_color}}!important;  
        }
    @endif
    @if($cta_text_color)
        .choose1, .choose{
            color:{{$cta_text_color}}!important;  
        }
    @endif
    @if($title_color)
       .tool-sec-1 button.sec-head-btn{
           color:{{$title_color}}!important;  
        }
    @endif
    @if($listing_text_color)
       .part p, .compare {
           color:{{$listing_text_color}}!important;  
        }
    @endif
    @if($listing_price_color)
       .col-md-2.col-sm-6.part-4 p.red{
           color:{{$listing_price_color}}!important;  
        }
    @endif
     @if($popularity_text_color)
       .part p.heart{
           color:{{$popularity_text_color}}!important;  
        }
    @endif
    @if($listing_icon_color)
       .part-2 p i, .heart i{
           color:{{$listing_icon_color}}!important;  
        }
    @endif
    @if($filter_section_color_button)
        #tab-1 .active, #tab-2 .active, .savings_per_year_sidebar select, .nav-pills .show>.nav-link, .twotabs .nav-pills .nav-link.active {
            background-color:{{$filter_section_color_button}}!important;  
        }
    @endif
    @if($filter_section_button_color)
        #tab-1 .active, #tab-2 .active, .savings_per_year_sidebar select, .nav-pills .show>.nav-link, .twotabs .nav-pills .nav-link.active {
            color:{{$filter_section_button_color}}!important;  
        }
    @endif
     @if($filter_section_color_checkbox)
        .widget input[type=checkbox]:checked, .container-1 input:checked~.checkmark, .container-2 input:checked~.checkmark-1{
            background:{{$filter_section_color_checkbox}}!important;  
        }
    @endif
    @if($more_tariffs_button_color)
        .load-more-sec{
            background-color:{{$more_tariffs_button_color}}!important;  
        }
    @endif
    @if($more_tariffs_text_color)
        .load-more-sec a{
            color:{{$more_tariffs_text_color}}!important;  
        }
        .load-more-sec a:hover{
            opacity: 0.8;  
        }
    @endif
    @if($footer_background_color)
        .Footer-main{
            background-color:{{$footer_background_color}}!important;  
        }
    @endif
    @if($footer_text_color)
        .Footer-main ul li a, .Footer-main .footer p{
            color:{{$footer_text_color}}!important;  
        }
        .Footer-main ul li a:hover{
            opacity: 0.8;
        }
    @endif
    @if($cheapest_border_color)
        .featured{
            border: 1px solid {{$cheapest_border_color}}!important;
        }
    @endif
    @if($cheapest_border_label_color)
        .featured .part-2 ul li p, .featured .energy ul li, .featured .total_sec_last .left_total{
            color: {{$cheapest_border_label_color}}!important;
        }
    @endif
    @if($active_tab_color)
        .tab .active{
            color: {{$active_tab_color}};
            border-bottom: 1px solid {{$active_tab_color}};
        }
    @endif
    @if($link_color)
        #packages a{
            color:{{$link_color}};
        }
    @endif
    @if($discount_sum_color)
        .red-text {
            color: {{$discount_sum_color}};
        }
    @endif

</style>
<body>
    
<!-- Google Tag Manager (noscript) -->
<!--<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRBHG9"-->
<!--height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>-->
<!-- End Google Tag Manager (noscript) -->

<div class="tharief-checker">
    <div class="header-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-3 logo-com">
                    @if(Session::get('locale')=='nl')
                <a href="/"><img src="{{url('uploads/logos/'.$doamin->logo)}}" alt="tariefchecker"></a>
                @else
                 <a href="/"><img src="{{url('uploads/logos/'.$doamin->logo_fr)}}" alt="tariefchecker"></a>
                @endif
                </div>
                <div class="col-md-6 start-sec">
                                
                  <span class="arrow-sec arrow-sec-1">
                        <p><a href="{{url('/')}}"><div class="top_tick_sec"><i class="fa fa-check-circle"></i></div> @lang('home.start')</a></p>
                    <div>                          
                         <label for="animation1">
                       <div class="arrow"></div>
                         </label>
                    </div>
                  </span>
                   @if($page=='request')   
                   
                   
                    <span class="arrow-sec arrow-sec-2">
                        <p><a href="{{Session::get('actual_link')}}"><div class="top_tick_sec"><i class="fa fa-check-circle"></i></div> @lang('home.Compare_suppliers')</a></p>
                            <div>                           
                                 <label for="animation1">
                               <div class="arrow"></div>
                                 </label>
                            </div>
                    </span>
                    @else  
                    @php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
                    Session::put('actual_link',$actual_link);
                    @endphp
                  
                     <span class="arrow-sec arrow-sec-2">
                        <p><a href="{{Session::get('actual_link')}}"><div class="two-sec"><span class="two_sec_inner">2</span></div> @lang('home.Compare_suppliers')</a></p>
                            <div>
                                 <label for="animation1">
                               <div class="arrow-1"></div>
                                 </label>
                            </div>
                    </span>                
                    @endif                 
                    @if($page=='request')
                    <span class="arrow-request arrow-sec">
                         <p><div class="two-sec two_sec_active"><span class="two_sec_inner two_sec_inner_active">3</span></div><div class="active_3"> @lang('home.Request')</div></p>
                    </span>                
                    @else
                     <span class="arrow-request">
                        <p><div class="two-sec two-sec-inactive"><span class="two_sec_inner_inactive">3</span></div> @lang('home.Request')</p>
                    </span>                
                    @endif                
                </div> 
                <div class="col-md-3 faq-sec">
                    <p>
                        <span class="faq">
                        @if(Session::get('locale')=='nl')
                            <a href="{{$header->faq_link}}" target="_blank"><?php echo $header->faq_icon;  ?> {{$header->faq_text}}</a>
                        @else
                            <a href="{{$header->faq_link_fr}}" target="_blank"><?php echo $header->faq_icon;  ?> {{$header->faq_text_fr}}</a>
                        @endif
                        </span>
                        <span class="mail">
                        @if(Session::get('locale')=='nl')
                            <a href="{{$header->email_link}}" target="_blank"><?php echo $header->email_icon;  ?> {{$header->email_text}}</a>
                        @else
                            <a href="{{$header->email_link_fr}}" target="_blank"><?php echo $header->email_icon;  ?> {{$header->email_text_fr}}</a>
                        @endif
                        </span>
                    </p>
                </div>
        </div>
    </div>
</div>

