<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#userpanel" aria-expanded="false" aria-controls="userpanel">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Update Details
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="userpanel" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('admin.viewProfileUpdatePage')}}">Edit Details</a>
                            <a class="nav-link" href="{{route('admin.viewPasswordUpdatePage')}}">Change Password</a>
                            <a class="nav-link" href="{{route('admin.registerUser')}}">Add New User</a>
                        </nav>
                    </div>
                    
                    
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                 {{Auth::user()->name}}
            </div>
        </nav>
    </div>