
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 mb-3 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">

<div class="container-fluid py-1 px-3">

    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            <div class="input-group">
                <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="tapez quelque chose...">
            </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link font-weight-bold px-0 text-body">
                    <i class="fa fa-user me-sm-1" aria-hidden="true"></i>
                    <span class="d-sm-inline d-none">Profile</span>
                </a>
            </li>

            <li class="nav-item px-3 d-flex align-items-center">
                <a href="<?php echo base_url('controller/deconnectClient'); ?>" class="nav-link p-0 text-body">
                    <i class="fa fa-sign-out fixed-plugin-button-nav cursor-pointer" aria-hidden="true"></i>
                </a>
            </li>

        </div>
    </div>
</nav>