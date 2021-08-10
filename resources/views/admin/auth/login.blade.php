<!DOCTYPE html>
<html lang="en">

  <!-- begin::Head -->
  <head>
    <meta charset="utf-8" />
    <title>Admin - {{$doamin->name}}</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('/admin-style/css/demo1/pages/login/login-1.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('/admin-style/vendors/global/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->
    <link href="{{ asset('/admin-style/css/demo1/skins/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/skins/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/skins/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/admin-style/css/demo1/skins/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->
    <link rel="icon" type="image/png" href="{{url('uploads/fav-icon/'.$doamin->fav_icon)}}"/>
  </head>
  <!-- end::Head -->
  <!-- begin::Body -->
  <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
      <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

          <!--begin::Aside-->
            <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(./admin-style/media//bg/bg-4.jpg);">
              <div class="kt-grid__item">
                <a href="#" class="kt-login__logo">
                    <img src="{{'uploads/logos/'.$doamin->logo}}" width="150">
                </a>
              </div>
              <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                <div class="kt-grid__item kt-grid__item--middle">
                    <h3 class="kt-login__title">{{$doamin->name}} Comparison App Admin.</h3>
                </div>
              </div>
              <
            </div>

          <!--begin::Aside-->
          <!--begin::Content-->
          <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
            <!--begin::Body-->
            <div class="kt-login__body">
              <!--begin::Signin-->
              <div class="kt-login__form">
                <!-- error message -->
@if (\Session::has('error'))
  <div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Sorry!.. </strong> {!! \Session::get('error') !!} 
</div>
@endif

@if (\Session::has('success'))
   <div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Success!..</strong> {!! \Session::get('success') !!} 
   </div>
@endif
<!-- error message -->
                <div class="kt-login__title">
                  <h3>Sign In</h3>
                </div>
                <!--begin::Form-->
                <form class="kt-form" method="POST" action="{{ url('/admin/login') }}">
                   {{ csrf_field() }}
                  <div class="form-group">
                    <input class="form-control" required="" type="text" placeholder="E-Mail Address"  name="email" value="{{ old('email') }}" autocomplete="off">
                  </div>
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                  <div class="form-group">
                    <input class="form-control" required="" type="password"  placeholder="Password" name="password">
                  </div>
                   @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
                                    </span>
                   @endif
                  <div class="kt-login__actions">
                    <button type="submit" id="kt_login_signin_submit" class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
                  </div>
                </form>
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- end:: Page -->

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

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{ asset('/admin-style/vendors/global/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('/admin-style/js/demo1/scripts.bundle.js')}}" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('/admin-style/js/demo1/pages/login/login-1.js')}}" type="text/javascript"></script>

    <!--end::Page Scripts -->
  </body>

  <!-- end::Body -->
</html>