<template>
    <div class="sidebar-wrapper">
        <div>
            <div class="logo-wrapper">
              <a href="index.html">
                <img class="img-fluid for-light" src="http://back_semiperu.test/assets/images/logo/logo.png" alt="">
                <img class="img-fluid for-dark" src="http://back_semiperu.test/assets/images/logo/logo_dark.png" alt="">
              </a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper">
              <a href="index.html">
                <img class="img-fluid" src="http://back_semiperu.test/assets/images/logo/logo-icon.png" alt="">
              </a>
            </div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1">Inicio</h6>
                            <p class="lan-2">Dashboard</p>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success">2</label>
                        <a class="sidebar-link sidebar-title" href="#">
                            <i data-feather="home"></i>
                            <span class="lan-3">Dashboard</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a class="lan-4" href="index.html">Default</a></li>
                            <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
                        </ul>
                    </li>
                </div>
                <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
        </div>
    </div>
</template>
<script>
export default {
    name : "Sidebar"
}
</script>
