<!DOCTYPE html>


<html lang="en">

  <!-- begin::Head -->
  <head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>Admin - Tariefchecker</title>
    <meta name="description" content="Contacts datatable listing">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {
          "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
        },
        active: function() {
          sessionStorage.fonts = true;
        }
      });
    </script>

    <!--end::Fonts -->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ asset('/admin-style/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('/admin-style/vendors/general/tether/dist/css/tether.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/select2/dist/css/select2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/nouislider/distribute/nouislider.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/summernote/dist/summernote.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/animate.css/animate.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/toastr/build/toastr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/morris.js/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/sweetalert2/dist/sweetalert2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/socicon/css/socicon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/custom/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/custom/vendors/flaticon/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/custom/vendors/flaticon2/flaticon.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/vendors/general/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('/admin-style/css/demo1/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('/admin-style/css/demo1/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    

    <!--end::Layout Skins -->
    <link rel="shortcut icon" href="/uploads/fav-icon/{{$domain->fav_icon}}" />
    
    <!-- intro.js -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/introjs.css')}}">
  </head>

  <!-- end::Head -->

  <!-- begin::Body -->
  <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->

    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
      <div class="kt-header-mobile__logo">
        <a href="/admin/home">
          <img alt="Logo" width="200px;" src="./admin/logo.png" />
        </a>
      </div>
      <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
      </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

        <!-- begin:: Aside -->
        <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
        <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

          <!-- begin:: Aside -->
          <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
            <div class="kt-aside__brand-logo">
              <a href="/admin/home">
              <h3  class="kt-widget19__title kt-font-light">Tariefchecker</h3> 
              </a>
            </div>
            <div class="kt-aside__brand-tools">
              <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                      <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                      <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                    </g>
                  </svg></span>
                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                      <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" id="Path-94" fill="#000000" fill-rule="nonzero" />
                      <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" id="Path-94" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
                    </g>
                  </svg></span>
              </button>

              <!--
      <button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
      -->
            </div>
          </div>

          <!-- end:: Aside -->

 


   @include('admin.includes.header')

   @include('admin.includes.sidebar')

       
      
      @yield('content')

     

    @include('admin.includes.footer')





    <!-- end:: Footer -->
        </div>
      </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
      <i class="fa fa-arrow-up"></i>
    </div>

    <!-- end::Scrolltop -->

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
      var KTAppOptions = {
        "colors": {
          "state": {
            "brand": "#5d78ff",
            "dark": "#282a3c",
            "light": "#ffffff",
            "primary": "#5867dd",
            "success": "#34bfa3",
            "info": "#36a3f7",
            "warning": "#ffb822",
            "danger": "#fd3995"
          },
          "base": {
            "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
            "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
          }
        }
      };
    </script>

    <!-- end::Global Config -->

    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('/admin-style/vendors/general/jquery/dist/jquery.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/popper.js/dist/umd/popper.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/js-cookie/src/js.cookie.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/moment/min/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/tooltip.js/dist/umd/tooltip.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/sticky-js/dist/sticky.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/wnumb/wNumb.js')}}" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{ asset('/admin-style/vendors/general/jquery-form/dist/jquery.form.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/block-ui/jquery.blockUI.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/bootstrap-datepicker.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/bootstrap-timepicker.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-select/dist/js/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/bootstrap-switch.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/ion-rangeslider/js/ion.rangeSlider.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/typeahead.js/dist/typeahead.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/handlebars/dist/handlebars.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/inputmask/dist/jquery.inputmask.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/nouislider/distribute/nouislider.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/owl.carousel/dist/owl.carousel.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/autosize/dist/autosize.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/clipboard/dist/clipboard.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/summernote/dist/summernote.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/markdown/lib/markdown.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/bootstrap-markdown.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/bootstrap-notify/bootstrap-notify.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/bootstrap-notify.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/jquery-validation/dist/jquery.validate.js')}}" type="text/javascript"></script>
    <script src="./assets/vendors/general/jquery-validation/dist/additional-methods.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/jquery-validation.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/toastr/build/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/raphael/raphael.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/morris.js/morris.js')}}" type="text/javascript"></script>
    <script src="./assets/vendors/general/chart.js/dist/Chart.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/waypoints/lib/jquery.waypoints.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/counterup/jquery.counterup.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/es6-promise-polyfill/promise.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/custom/js/vendors/sweetalert2.init.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/jquery.repeater/src/lib.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/jquery.repeater/src/jquery.input.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/jquery.repeater/src/repeater.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/vendors/general/dompurify/dist/purify.js')}}" type="text/javascript"></script>

    <!--end:: Global Optional Vendors -->
    
    <!--intro.js script-->
    <script src="{{ asset('js/intro.js')}}" type="text/javascript"></script>

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('/admin-style/js/demo1/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/common.js')}}" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    @include('helpers.notification.message')
        <script>
       $.ajaxSetup({
              headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                   beforeSend: function(xhr, type) {
                       if (!type.crossDomain) {
                           xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'));
                       }
                   },
         });
        $('div.alert').delay(3000).fadeOut(350);
        
    </script>
        @stack('scripts')
        <script>
            Userback = window.Userback || {};
            Userback.access_token = '2638|3663|QovNQoBmjcIdSEGeBYPJ6Nb2HQ2tDdxE4PnmsOPP1MqHbdHpRX';

            (function(id) {
                if (document.getElementById(id)) {return;}
                var s = document.createElement('script');
                s.id = id;
                s.async = 1;
                s.src = 'https://static.userback.io/widget/v1.js';
                var parent_node = document.head || document.body;
                parent_node.appendChild(s);
            })('userback-sdk');
            
            var SummernoteDemo = function () {
                var demos = function () {
                    $('#summernote').summernote({
                        height: 150,
                        toolbar: [
                            ["style", ["style"]],
                            ["font", ["bold", "underline", "clear"]],
                            ["fontname", ["fontname"]],
                            ["color", ["color"]],
                            ["para", ["ul", "ol", "paragraph"]],
                            ["table", ["table"]],
                            ["view", ["fullscreen", "codeview", "help"]]
                        ],
                    });
                    $('#summernote').on('summernote.keydown', function (we, e) {
                        var code = $('#summernote').summernote('code');
                        code = code.replace(/(<([^>]+)>)/ig, "");
                        code = code.replace(/&nbsp;/g, '');
                        var key = e.keyCode;
                        var text_max = 255;
                        var text_length = code.length;
                        var text_remaining = text_max - text_length;
                        $('#message_count').html(text_remaining + ' characters remaining');
                        allowed_keys = [8, 37, 38, 39, 40, 46, 32, 13]
                        if ($.inArray(key, allowed_keys) != -1)
                            return true
                        else if (code.length >= 255) {
                            e.preventDefault();
                            e.stopPropagation()
                        }
                    });
                }
                return {
                    init: function () {
                        demos();
                    }
                };
            }();
            jQuery(document).ready(function () {
                SummernoteDemo.init();
            });
        </script>
    <!--end::Page Scripts -->
    <!--Tooltip functionality-->
    <script type="text/javascript">
	$(document).ready(function(){
	    $("[rel=tooltip]").tooltip({ placement: 'top'});
	});
    </script>
  </body>

  <!-- end::Body -->
</html>