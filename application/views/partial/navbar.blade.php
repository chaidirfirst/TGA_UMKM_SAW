<div class="az-navbar az-navbar-two az-navbar-dashboard-eight">
      <div class="container">
        <div><a href="{{ base_url('petugas/') }}" class="az-logo">S<span>P</span>K</a></div>
    
        <ul class="nav">
          <li class="nav-label">Main Menu</li>
          <li class="nav-item {{ is_path('Petugas',1) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/') }}" class="nav-link"><i class="typcn typcn-clipboard"></i>Dashboard</a>
          </li><!-- nav-item -->
          <li class="nav-item {{ is_path('masyarakat',2) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/masyarakat') }}" class="nav-link"><i class="typcn typcn-group"></i>Masyarakat</a>
          </li><!-- nav-item -->
          <li class="nav-item {{ is_path('kriteria',2) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/kriteria') }}" class="nav-link"><i class="typcn typcn-th-list"></i>Kriteria</a>
          </li><!-- nav-item -->
          <li class="nav-item {{ is_path('bidang_usaha',2) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/bidang_usaha') }}" class="nav-link"><i class="typcn typcn-th-list"></i>Bidang Usaha</a>
          </li><!-- nav-item -->
          <li class="nav-item {{ is_path('petugas_view',2) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/petugas_view') }}" class="nav-link"><i class="typcn typcn-user-outline"></i>Petugas</a>
          </li><!-- nav-item -->
          <li class="nav-item {{ is_path('spk_saw',2) ? 'active':'' }} {{ is_path('Spk_saw',1) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/spk_saw') }}" class="nav-link"><i class="typcn typcn-flow-merge"></i>SPK Saw</a>
          </li><!-- nav-item -->
          {{-- <li class="nav-item {{ is_path('upload_file',2) ? 'active':'' }}">
            <a href="{{ base_url('Petugas/upload_file') }}" class="nav-link"><i class="typcn typcn-cloud-storage"></i>Upload File</a>
          </li><!-- nav-item --> --}}
        </ul><!-- nav -->
      </div><!-- container -->
    </div><!-- az-navbar -->