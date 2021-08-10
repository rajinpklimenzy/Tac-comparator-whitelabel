
$(document).ready(function(){
$('#rtl').click(function (){
	
   $('link[href="../theme/assets/css/style.css"]').attr('href','../theme/assets/css/style1.css');
   $('link[href="../theme/assets/css/skin-modes.css"]').attr('href','../theme/assets/css/skin-modes1.css');
   $('link[href="../theme/assets/plugins/sidemenu/closed-sidemenu.css"]').attr('href','../theme/assets/plugins/sidemenu/closed-sidemenu1.css');
   $('link[href="../theme/assets/plugins/charts-c3/c3-chart.css"]').attr('href','../theme/assets/plugins/charts-c3/c3-chart1.css');
   $('link[href="../theme/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css"]').attr('href','../theme/assets/plugins/scroll-bar/jquery.mCustomScrollbar1.css');
   $('link[href="../theme/assets/css/icons.css"]').attr('href','../theme/assets/css/icons1.css');
   $('link[href="../theme/assets/plugins/sidebar/sidebar.css"]').attr('href','../theme/assets/plugins/sidebar/sidebar1.css');


});
$('#ltr').click(function (){
   $('link[href="../theme/assets/css/style1.css"]').attr('href','../theme/assets/css/style.css');
   $('link[href="../theme/assets/css/skin-modes1.css"]').attr('href','../theme/assets/css/skin-modes.css');
   $('link[href="../theme/assets/plugins/sidemenu/closed-sidemenu1.css"]').attr('href','../theme/assets/plugins/sidemenu/closed-sidemenu.css');
   $('link[href="../theme/assets/plugins/charts-c3/c3-chart1.css"]').attr('href','../theme/assets/plugins/charts-c3/c3-chart.css');
   $('link[href="../theme/assets/plugins/scroll-bar/jquery.mCustomScrollbar1.css"]').attr('href','../theme/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css');
   $('link[href="../theme/assets/css/icons1.css"]').attr('href','../theme/assets/css/icons.css');
   $('link[href="../theme/assets/plugins/sidebar/sidebar1.css"]').attr('href','../theme/assets/plugins/sidebar/sidebar.css');
});
});