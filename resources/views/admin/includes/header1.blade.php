
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

    <!-- begin:: Header Menu -->
    <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
    <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
        <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
            <!--<div style="margin-top: 25px" ><a href="https://tariefchecker.wx.agency/" target="_blank" rel="tooltip" title="Click here to reach tariefchecker">Go to Site</a> </div>-->
        </div>
    </div>

    <!-- end:: Header Menu -->

    <!-- begin:: Header Topbar -->
    <div class="kt-header__topbar">
        <!--begin: Quick panel toggler -->
        <!--              <div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip" title="Quick panel" data-placement="right">
                        <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
                          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect id="bound" x="0" y="0" width="24" height="24" />
                              <rect id="Rectangle-7" fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                              <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                            </g>
                          </svg> </span>
                      </div>-->

        <!--end: Quick panel toggler -->

        
        <!--begin: User Bar -->
        <div class="kt-header__topbar-item kt-header__topbar-item--user">
            
            <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px" rel="tooltip" title="Profile">
                <div class="kt-header__topbar-user">
                    <span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <span class="kt-header__topbar-welcome kt-hidden-mobile"> 
                        <h6 class="kt-badge--bold kt-font-success"> {{ ucfirst(Auth::guard('admin')->user()->name) }}</h6>
                    </span>

<!--<img class="kt-hidden" alt="Pic" src="./assets/media/users/300_25.jpg" />-->

                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <!--<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"></span>-->
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(./assets/media/misc/bg-1.jpg)">


                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <div class="kt-badge--rounded kt-badge--bold kt-font-success"><h5>{{ ucfirst(Auth::guard('admin')->user()->name) }}</h5></div>

                </div>

                <!--end: Head -->

                <!--begin: Navigation -->
                <div class="kt-notification">
                    <a href="{{route('profile.index')}}" class="kt-notification__item">
                        <div class="kt-notification__item-icon">
                            <i class="flaticon2-calendar-3 kt-font-success"></i>
                        </div>
                        <div class="kt-notification__item-details">
                            <div class="kt-notification__item-title kt-font-bold">
                                My Profile
                            </div>

                        </div>
                    </a>
                    <div class="kt-notification__custom kt-space-between">
                        <a href="admin/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>

                    </div>
                </div>

                <!--end: Navigation -->
            </div>
        </div>

        <!--end: User Bar -->
    </div>

    <!-- end:: Header Topbar -->
</div>
    <!--Tooltip functionality-->
    <script type="text/javascript">
	$(document).ready(function(){
	    $("[rel=tooltip]").tooltip({ placement: 'top'});
	});
    </script>

<!-- end:: Header
