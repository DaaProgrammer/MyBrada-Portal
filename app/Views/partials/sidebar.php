 
 <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="" href="#" target="_blank">
        <img src="../assets/img/logo2.png"  class="img-fluid" alt="MyBrada">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto mb-4" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'dashboard') ? 'active' : ''?>" href="/dashboard">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'responders')  ? 'active' : ''?>" href="/responders">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-user-run text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Responders</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'newsfeeds')  ? 'active' : ''?>" href="/newsfeeds">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-notification-70 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Newsfeeds</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'alerts')  ? 'active' : ''?>" href="/alerts">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-bell-55 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Alerts</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'notices')  ? 'active' : ''?>" href="/notices">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Notices</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'professional_support')  ? 'active' : ''?>" href="/professional_support">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Professional Support</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?= ($activePage === 'personal_diary')  ? 'active' : ''?>" href="/personal_diary">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Personal Diary</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      <a class="btn btn-primary btn-sm mb-0 w-100" href="/logout" type="button" style="color:#000">Sign Out</a>
    </div>
  </aside>