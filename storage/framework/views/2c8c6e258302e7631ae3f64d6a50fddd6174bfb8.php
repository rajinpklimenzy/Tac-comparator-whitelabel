<!-- PAGE-HEADER -->
<div class="page-header">
    <a aria-label="Hide Sidebar" class="app-sidebar__toggle close-toggle" data-toggle="sidebar" href="#"></a><!-- sidebar-toggle-->
    <div>
        <?php if(isset($page)){

            $page=$page;
        }else{
            $page='Home';
        }
        ?>
        <h1 class="page-title"><?php echo e($page); ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">admin</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($page); ?></li>
        </ol>
    </div>
    <div class="d-flex  ml-auto header-right-icons header-search-icon">
       
        <div class="dropdown d-md-flex">
            <a class="nav-link icon full-screen-link nav-link-bg">
                <i class="fe fe-maximize fullscreen-button"></i>
            </a>
        </div><!-- FULL-SCREEN -->
        
   
        <div class="dropdown profile-1">
            <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                <span>
                    <img src="<?php echo e(url('uploads/profile.png')); ?>" alt="profile-user" class="avatar  profile-user brround cover-image">
                  
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                <div class="drop-heading">
                    <div class="text-center">
                        <h5 class="text-dark mb-0"> <?php if(Auth::check()): ?> <?php echo e(Auth::user()->name); ?> <?php endif; ?></h5>
                        <small class="text-muted">Administrator</small>
                    </div>
                </div>
                <div class="dropdown-divider m-0"></div>
                
               
                <div class="dropdown-divider"></div>
                
               

                <a class="dropdown-item" href="<?php echo e(route('admin-logout')); ?>" >
                 <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
             </a>

            


            </div>
        </div>
        
    </div>
   
</div>
<!-- PAGE-HEADER END -->