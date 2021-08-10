<!-- APP-SIDEBAR -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="/admin/home">
          
             <img src="{{url('uploads/logos/'.$doamin->logo)}}" class="header-brand-img desktop-logo" alt="logo">
            <img src="{{url('uploads/logos/'.$doamin->logo)}}" class="header-brand-img toggle-logo" alt="logo">
            <img src="{{url('uploads/logos/'.$doamin->logo)}}" class="header-brand-img light-logo" alt="logo">
            <img src="{{url('uploads/logos/'.$doamin->logo)}}" class="header-brand-img light-logo1" alt="logo"> 
        </a><!-- LOGO -->
        <a aria-label="Hide Sidebar" class="app-sidebar__toggle ml-auto" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    </div>
    <div class="app-sidebar__user">
        <div class="dropdown user-pro-body text-center">
            <div class="user-pic">
                
             
      
        
                <img src="{{url('uploads/profile.png')}}" alt="user-img" class="avatar-xl rounded-circle">
               
            </div>
            <div class="user-info">
                <h6 class=" mb-0 text-dark"> 
                   {{$doamin->name}}
                   
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
      
        <li class="slide">
            <a class="side-menu__item"   href="/admin/home"><i class="side-menu__icon ti-home"></i><span class="side-menu__label">Home</span></a>
        </li>

  @if(Request::getHost()=='whitelable.wx.agency')

	<li class="slide">
	<a class="side-menu__item"  href="{{route('whitelabel')}}"><i class="side-menu__icon ti-layers"></i><span class="side-menu__label">Whitelabel apps</span><i class="angle fa fa-angle-right"></i></a>
	</li>

	

	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">CMS</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			
			<li><a href="{{route('whitelabel.landing-page')}}" class="slide-item">Landing page contents</a></li>
			<li><a href="{{route('whitelabel.header_content')}}" class="slide-item">Header contents Manage</a></li>
			<li><a href="{{route('footer.index')}}" class="slide-item">Footer contents Manage</a></li>
			<li><a href="{{route('banner-content.index')}}" class="slide-item">Banner contents Manage</a></li>
			<li><a href="{{route('page.index')}}" class="slide-item"> Language Translations Manage</a></li>
			<li><a href="{{route('feature.index')}}" class="slide-item">Contract Details Manage</a></li>
			<li><a href="{{route('tooltip.index')}}" class="slide-item">Tooltip contents Manage</a></li>
			<li><a href="{{route('request-content.create')}}" class="slide-item">Request page image and Contents</a></li>
			<li><a href="{{route('request-content.index')}}" class="slide-item">Request page other content</a></li>
			
		</ul>
	</li>

	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">Analytics</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a href="/whitelabel/analytics" class="slide-item">Analytics Manage</a></li>
		</ul>
	</li>

	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">Color Manage</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a href="/whitelabel/site-color" class="slide-item">Color Manage</a></li>
		</ul>
	</li>
    <li class="slide">
    <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">App Manage</span><i class="angle fa fa-angle-right"></i></a>
        <ul class="slide-menu">
            <li><a href="/whitelabel/edit" class="slide-item">Edit App</a></li>
        </ul>
    </li>

	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">Admins</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a href="/admin/admin-users" class="slide-item"> Admins details</a></li>
		</ul>
	</li>



  @else

	

	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">CMS</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			
			<li><a href="{{route('whitelabel.landing-page')}}" class="slide-item">Landing page contents</a></li>
			<li><a href="{{route('whitelabel.header_content')}}" class="slide-item">Header contents Manage</a></li>
			<li><a href="{{route('footer.index')}}" class="slide-item">Footer contents Manage</a></li>
			<li><a href="{{route('banner-content.index')}}" class="slide-item">Banner contents Manage</a></li>
            <li><a href="{{route('request-content.create')}}" class="slide-item">Request page image and Contents</a></li>
            <li><a href="{{route('request-content.index')}}" class="slide-item">Request page other content</a></li>
			
		
			
			
		</ul>
	</li>

	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">Analytics</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a href="/whitelabel/analytics" class="slide-item">Analytics Manage</a></li>
		</ul>
	</li>
	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">Color Manage</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a href="/whitelabel/site-color" class="slide-item">Color Manage</a></li>
		</ul>
	</li>
	<li class="slide">
	<a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon ti-receipt"></i><span class="side-menu__label">App Manage</span><i class="angle fa fa-angle-right"></i></a>
		<ul class="slide-menu">
			<li><a href="/whitelabel/edit" class="slide-item">Edit App</a></li>
		</ul>
	</li>

	







  @endif       
      

  
        
        
        
    </ul>
</aside>
<!--/APP-SIDEBAR-->

<!-- Mobile Header -->
<div class="mobile-header">
    <div class="container-fluid">
        <div class="d-flex">
            <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
            <a class="header-brand" href="index.html">
                <img src="{{url('uploads/logos/'.$doamin->logo)}}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{url('uploads/logos/'.$doamin->logo)}}" class="header-brand-img desktop-logo mobile-light" alt="logo">
            </a>
            <div class="d-flex order-lg-2 ml-auto header-right-icons">
                <button class="navbar-toggler navresponsive-toggler d-md-none" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fe fe-more-vertical text-white"></span>
                </button>
                
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
           
          
        </div>
    </div>
</div>
<!-- /Mobile Header 