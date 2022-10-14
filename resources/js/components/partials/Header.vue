<template>
    <div class="app-header-content">
    <div class="row justify-content-between align-items-center">
        <div class="col-auto">
            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
            </a>
            <div class="sidepanel-toggler d-none d-xl-block">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16" color="#d26d69">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
                Saldo Pendiente
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16" color="#eebf41">
                    <circle cx="8" cy="8" r="8"/>
                </svg>
                En Proceso
            </div>
        </div>
        <div class="app-utilities col-auto">
            <div class="app-utility-item">
                <label class="form-label">
                    <span class="d-none d-xl-block"></span></label>
                <label class="form-label">
                    <span class="badge bg-danger"></span>
                </label>
                <label class="form-label">
                    <span class="badge bg-warning"></span>
                </label>
            </div>

            <div class="app-utility-item app-user-dropdown dropdown">
                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <img src="/images/guest.png"  alt="user profile" style="object-fit: cover;">
                </a>
                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                    <li><a class="dropdown-item" href="#">Perfil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#">
                        </a>

                        <form id="logout-form" action="#" method="POST" class="d-none">

                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

</template>
<script>
export default {
    name : "Header"
}
</script>
