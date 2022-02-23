 <!-- Sidenav -->
 <nav x-data="{ open: false }"  class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
     <div class="scrollbar-inner">
         <!-- Brand -->
         <div class="sidenav-header  align-items-center" style="margin-bottom: 40px;">
             <a class="navbar-brand" href="javascript:void(0)" style="font-size:40px; color:#5e03fc; font-weight:bold">
                 Scoat
             </a>
             <p style="margin-top: -30px">( School Attendance )</p>
         </div>
         <div class="navbar-inner">
             <!-- Collapse -->
             <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                 <!-- Nav items -->
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link {{ 'lecturer/dashboard' == request()->path() ? 'active' : '' }}" href="{{ url('lecturer/dashboard') }}">
                             <i class="ni ni-tv-2 text-primary"></i>
                             <span class="nav-link-text">{{ __('Dashboard') }}</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ 'courses/list' == request()->path() ? 'active' : '' }}" href="{{ url('courses/list') }}">
                             <i class="fa fa-book text-orange"></i>
                             <span class="nav-link-text">{{ __('Courses') }}</span>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link {{ 'attendances/att_list' == request()->path() ? 'active' : '' }}" href="{{ url('attendances/att_list') }}">
                             <i class="fa fa-users text-blue"></i>
                             <span class="nav-link-text">{{ __('Student Attendances') }}</span>
                         </a>
                     </li>
                </ul>

                <hr class="my-3">

<h6 class="navbar-heading p-0 text-muted">
<span class="docs-normal">Setting</span>
</h6>

<ul class="navbar-nav mb-md-3">
<li class="nav-item">
    <a class="nav-link {{ 'user/profile' == request()->path() ? 'active' : '' }}" href="{{ route('profile.show') }}">
        <i class="fa fa-user text-black"></i>
        <span class="nav-link-text">{{ __('Your Profile') }}</span>
    </a>
</li>
            </ul>


                  
             </div>
         </div>
     </div>
 </nav>
 <!-- Main content -->
 <div class="main-content" id="panel">
     <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
         <div class="container-fluid">
             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                 <!-- Search form -->
                 <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                     <div class="form-group mb-0">
                         <div class="input-group input-group-alternative input-group-merge">
                             <div class="input-group-prepend">
                                 <span class="input-group-text"><i class="fas fa-search"></i></span>
                             </div>
                             <input class="form-control" placeholder="Search" type="text">
                         </div>
                     </div>
                     <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main"
                         aria-label="Close">
                         <span aria-hidden="true">×</span>
                     </button>
                 </form>
                 <!-- Navbar links -->
                 <ul class="navbar-nav align-items-center  ml-md-auto ">
                     <li class="nav-item d-sm-none">
                         <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                             <i class="ni ni-zoom-split-in"></i>
                         </a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                             <i class="ni ni-bell-55"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                             <!-- Dropdown header -->
                             <div class="px-3 py-3">
                                 <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong>
                                     notifications.</h6>
                             </div>
                             <!-- List group -->
                             <div class="list-group list-group-flush">
                                 <a href="#!" class="list-group-item list-group-item-action">
                                     <div class="row align-items-center">
                                         <div class="col-auto">
                                             <!-- Avatar -->
                                             <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg"
                                                 class="avatar rounded-circle">
                                         </div>
                                         <div class="col ml--2">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div>
                                                     <h4 class="mb-0 text-sm">John Snow</h4>
                                                 </div>
                                                 <div class="text-right text-muted">
                                                     <small>2 hrs ago</small>
                                                 </div>
                                             </div>
                                             <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="#!" class="list-group-item list-group-item-action">
                                     <div class="row align-items-center">
                                         <div class="col-auto">
                                             <!-- Avatar -->
                                             <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg"
                                                 class="avatar rounded-circle">
                                         </div>
                                         <div class="col ml--2">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div>
                                                     <h4 class="mb-0 text-sm">John Snow</h4>
                                                 </div>
                                                 <div class="text-right text-muted">
                                                     <small>3 hrs ago</small>
                                                 </div>
                                             </div>
                                             <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="#!" class="list-group-item list-group-item-action">
                                     <div class="row align-items-center">
                                         <div class="col-auto">
                                             <!-- Avatar -->
                                             <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg"
                                                 class="avatar rounded-circle">
                                         </div>
                                         <div class="col ml--2">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div>
                                                     <h4 class="mb-0 text-sm">John Snow</h4>
                                                 </div>
                                                 <div class="text-right text-muted">
                                                     <small>5 hrs ago</small>
                                                 </div>
                                             </div>
                                             <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="#!" class="list-group-item list-group-item-action">
                                     <div class="row align-items-center">
                                         <div class="col-auto">
                                             <!-- Avatar -->
                                             <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg"
                                                 class="avatar rounded-circle">
                                         </div>
                                         <div class="col ml--2">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div>
                                                     <h4 class="mb-0 text-sm">John Snow</h4>
                                                 </div>
                                                 <div class="text-right text-muted">
                                                     <small>2 hrs ago</small>
                                                 </div>
                                             </div>
                                             <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                         </div>
                                     </div>
                                 </a>
                                 <a href="#!" class="list-group-item list-group-item-action">
                                     <div class="row align-items-center">
                                         <div class="col-auto">
                                             <!-- Avatar -->
                                             <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg"
                                                 class="avatar rounded-circle">
                                         </div>
                                         <div class="col ml--2">
                                             <div class="d-flex justify-content-between align-items-center">
                                                 <div>
                                                     <h4 class="mb-0 text-sm">John Snow</h4>
                                                 </div>
                                                 <div class="text-right text-muted">
                                                     <small>3 hrs ago</small>
                                                 </div>
                                             </div>
                                             <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                         </div>
                                     </div>
                                 </a>
                             </div>
                             <!-- View all -->
                             <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View
                                 all</a>
                         </div>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                             <i class="ni ni-ungroup"></i>
                         </a>
                         <div
                             class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                             <div class="row shortcuts px-4">
                                 <a href="#!" class="col-4 shortcut-item">
                                     <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                         <i class="ni ni-calendar-grid-58"></i>
                                     </span>
                                     <small>Calendar</small>
                                 </a>
                                 <a href="#!" class="col-4 shortcut-item">
                                     <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                         <i class="ni ni-email-83"></i>
                                     </span>
                                     <small>Email</small>
                                 </a>
                                 <a href="#!" class="col-4 shortcut-item">
                                     <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                         <i class="ni ni-credit-card"></i>
                                     </span>
                                     <small>Payments</small>
                                 </a>
                                 <a href="#!" class="col-4 shortcut-item">
                                     <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                         <i class="ni ni-books"></i>
                                     </span>
                                     <small>Reports</small>
                                 </a>
                                 <a href="#!" class="col-4 shortcut-item">
                                     <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                         <i class="ni ni-pin-3"></i>
                                     </span>
                                     <small>Maps</small>
                                 </a>
                                 <a href="#!" class="col-4 shortcut-item">
                                     <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                         <i class="ni ni-basket"></i>
                                     </span>
                                     <small>Shop</small>
                                 </a>
                             </div>
                         </div>
                     </li>
                 </ul>
                 <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                 <li class="nav-item d-xl-none">
                         <!-- Sidenav toggler -->
                         <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin"
                             data-target="#sidenav-main">
                             <div class="sidenav-toggler-inner">
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                                 <i class="sidenav-toggler-line"></i>
                             </div>
                         </div>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                             aria-expanded="false">
                             <div class="media align-items-center">
                                 <span class="avatar avatar-sm rounded-circle">
                                     <img alt="Image placeholder" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxHWFss7T4f3QifjwCTUJ-VGqffPBBDI1VlQ&usqp=CAU">
                                 </span>
                                 <div class="media-body  ml-2  d-none d-lg-block">
                                     <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                                 </div>
                             </div>
                         </a>
                         <div class="dropdown-menu  dropdown-menu-right ">
                             <div class="dropdown-header noti-title">
                                 <h6 class="text-overflow m-0">Welcome!</h6>
                             </div>
                             <a href="{{ route('profile.show') }}" class="dropdown-item">
                                 <i class="ni ni-single-02"></i>
                                 <span>{{ __('Profile') }}</span>
                             </a>

                             <div class="dropdown-divider"></div>

                             <!-- Authentication -->
                             <form method="POST" class="dropdown-item" action="{{ route('logout') }}">
                                 @csrf
                                 <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                     <i class="ni ni-user-run"></i>
                                     {{ __('Log Out') }}
                                 </a>
                             </form>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </nav>



                