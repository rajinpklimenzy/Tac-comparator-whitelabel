APP-SIDEBAR-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="index.html">
           <h3>{{Request::getHost()}}</h3> 
           <!--  <img src="{{ url('images/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{ url('images/logo.png') }}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{ url('images/logo.png') }}" class="header-brand-img light-logo" alt="logo">
            <img src="{{ url('images/logo.png') }}" class="header-brand-img light-logo1" alt="logo"> -->
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                
              
                <img src="{{ url('images/winner.png') }}" alt="user-img" class="avatar-xl rounded-circle">
               
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark"> 
                   {{ Auth::user()->name}}
                   
                </h6>
                <span class="text-muted app-sidebar__user-name text-sm">administrator</span>
            </div>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
           
            {{-- <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Chat">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-mail"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Followers">
                <a class="nav-link text-center m-2">
                    <i class="fe fe-user"></i>
                </a>
            </li> --}}
            
        </ul>
    </div>
    <ul class="side-menu">
        <li><h3>Main</h3></li>
        <li class="slide">
            <a class="side-menu__item"   href="/home"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Home</span><i class="angle fa fa-angle-right"></i></a>
           
            
        </li>
        
        <li><h3><a href="cards.html" class="slide-item"> Deatails</a></h3></li>
       
        <li class="slide">
            <a class="side-menu__item"  href="{{ route('whitelabel')}}"><i class="side-menu__icon ti-layers"></i><span class="side-menu__label">Whitelabel apps</span><i class="angle fa fa-angle-right"></i></a>
            
        </li>
       
        {{-- <li><h3>Profile</h3></li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-bar-chart"></i><span class="side-menu__label">Edit profile</span><i class="angle fa fa-angle-right"></i></a>
            
        </li> --}}
        
        
        
    </ul>
</aside>
<!--/APP-SIDEBAR-->

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
            <a class="header-brand" href="index.html">
                <img src="../theme/assets/images/brand/logo.png" class="header-brand-img desktop-logo" alt="logo">
                <img src="../theme/assets/images/brand/logo-3.png" class="header-brand-img desktop-logo mobile-light" alt="logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                </button>
                <div class="dropdown profile-1">
                    <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                        <span>
                            <img src="../theme/assets/images/users/10.jpg" alt="profile-user" class="avatar  profile-user brround cover-image">
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <div class="drop-heading">
                            <div class="text-center">
                                <h5 class="text-dark mb-0">Elizabeth Dyer</h5>
                                <small class="text-muted">Administrator</small>
                            </div>
                        </div>
                        <div class="dropdown-divider m-0"></div>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                        </a>
                        <a class="dropdown-item" href="#">
                            <span class="float-right"></span>
                            <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">
                            <i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
                        </a>
                        <a class="dropdown-item" href="login.html">
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
                        </a>
                    </div>
                </div>
                <div class="dropdown d-md-flex header-settings">
                    <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                        <i class="fe fe-align-right"></i>
                    </a>
                </div><!-- SIDE-MENU -->
            </div>
        </div>
    </div>
</div>
<div class="mb-1 navbar navbar-expand-lg  responsive-navbar navbar-dark d-md-none bg-white">
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
        <div class="d-flex order-lg-2 ml-auto">
            <div class="dropdown d-sm-flex">
                <a href="#" class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-search"></i>
                </a>
                <div class="dropdown-menu header-search dropdown-menu-left">
                    <div class="input-group w-100 p-2">
                        <input type="text" class="form-control " placeholder="Search....">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary ">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div><!-- SEARCH -->
            <div class="dropdown d-md-flex">
                <a class="nav-link icon full-screen-link nav-link-bg">
                    <i class="fe fe-maximize fullscreen-button"></i>
                </a>
            </div><!-- FULL-SCREEN -->
            <div class="dropdown d-md-flex notifications">
                <a class="nav-link icon" data-toggle="dropdown">
                    <i class="fe fe-bell"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <div class="notifications-menu">
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <div class="fs-16 text-success mr-3">
                                <i class="fa fa-thumbs-o-up"></i>
                            </div>
                            <div class="">
                                <strong>Someone likes our posts.</strong>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <div class="fs-16 text-primary mr-3">
                                <i class="fa fa-commenting-o"></i>
                            </div>
                            <div class="">
                                <strong>3 New Comments.</strong>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <div class="fs-16 text-danger mr-3">
                                <i class="fa fa-cogs"></i>
                            </div>
                            <div class="">
                                <strong>Server Rebooted</strong>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">View all Notification</a>
                </div>
            </div><!-- NOTIFICATIONS -->
            <div class="dropdown d-md-flex message">
                <a class="nav-link icon text-center" data-toggle="dropdown">
                    <i class="fe fe-mail"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <div class="message-menu">
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="../theme/assets/images/users/1.jpg"></span>
                            <div>
                                <strong>Madeleine</strong> Hey! there I' am available....
                                <div class="small text-muted">
                                    3 hours ago
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="../theme/assets/images/users/12.jpg"></span>
                            <div>
                                <strong>Anthony</strong> New product Launching...
                                <div class="small text-muted">
                                    5 hour ago
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="../theme/assets/images/users/4.jpg"></span>
                            <div>
                                <strong>Olivia</strong> New Schedule Realease......
                                <div class="small text-muted">
                                    45 mintues ago
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item d-flex pb-3" href="#">
                            <span class="avatar avatar-md brround mr-3 align-self-center cover-image" data-image-src="../theme/assets/images/users/15.jpg"></span>
                            <div>
                                <strong>Sanderson</strong> New Schedule Realease......
                                <div class="small text-muted">
                                    2 days ago
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item text-center">See all Messages</a>
                </div>
            </div><!-- MESSAGE-BOX -->
        </div>
    </div>
</div>
<!-- /Mobile Header 