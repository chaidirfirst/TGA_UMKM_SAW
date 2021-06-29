<div class="az-header az-header-primary">
      <div class="container">
        <div class="az-header-left">
          <a href="{{ base_url('petugas') }}" class="az-logo">S<span>P</span>K</a>
          <a href="" id="azNavShow" class="az-header-menu-icon d-lg-none"><span></span></a>
        </div><!-- az-header-left -->
        <div class="az-header-right">
          <div class="dropdown az-profile-menu">
            <a href="" class="az-img-user"><img src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt=""></a>
            <div class="dropdown-menu">
              <div class="az-dropdown-header d-sm-none">
                <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
              </div>
              <div class="az-header-profile">
                <div class="az-img-user">
                  <img src="https://www.kindpng.com/picc/m/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="">
                </div><!-- az-img-user -->
                <h6>{{ $CI->session->userdata('nama_petugas') }}</h6>
                <span>Petugas</span>
              </div><!-- az-header-profile -->
              <a href="#" class="dropdown-item" data-toggle="modal" data-target="#setting" id="settingbtn" ><i class="typcn typcn-cog-outline"></i> Account Settings</a>
              <a href="{{ base_url('logout') }}" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Sign Out</a>
            </div><!-- dropdown-menu -->
          </div>
        </div><!-- az-header-right -->
      </div><!-- container -->
    </div><!-- az-header -->