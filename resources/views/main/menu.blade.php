
<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ asset('/') }}">
            <img src="/assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="oPregador">
            <span class="ms-1 font-weight-bold text-white">oPregador</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white {{ session('currentPage') === 'dashboard' ? 'active bg-gradient-info' : '' }}"
                    href="{{ asset('/') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ session('currentPage') === 'esbocos' ? 'active bg-gradient-info' : '' }}"
                    href="{{ asset('esbocos') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-file-lines"></i>
                    </div>
                    <span class="nav-link-text ms-1">Esboço</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ session('currentPage') === 'sermons' ? 'active bg-gradient-info' : '' }}"
                    href="{{ asset('sermons') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <span class="nav-link-text ms-1">Pregação</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ session('currentPage') === 'profiles' ? 'active bg-gradient-info' : '' }}"
                    href="{{ asset('/profiles') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-regular fa-address-card"></i>
                    </div>
                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-warning font-weight-bolder opacity-8">Úteis</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white {{ session('currentPage') === 'donations' ? 'active bg-gradient-info' : '' }}"
                    href="{{ asset('donations') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <span class="nav-link-text ms-1">Doação</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ session('currentPage') === 'suggestions' ? 'active bg-gradient-info' : '' }}"
                    href="{{ asset('suggestions') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-people-pulling"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sugestão</span>
                </a>
            </li>

            {{-- ====================== MENU EXCLUSIVO PARA ADMIN =================== --}}
            @if ($admin)
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-warning font-weight-bolder opacity-8">Administrativo
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ session('currentPage') === 'suggestions' ? 'active bg-gradient-info' : '' }}"
                        href="{{ asset('suggestions/indexAdmin') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sugestões</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ session('currentPage') === 'donations' ? 'active bg-gradient-info' : '' }}"
                        href="{{ asset('donations') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <span class="nav-link-text ms-1">Usuários</span>
                    </a>
                </li>
            @endif
            {{-- ================ FIM DO MENU EXCLUSIVO PARA ADMIN =========================== --}}

            <li class="nav-item">
                <a class="nav-link text-white" href="{{ asset('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sair</span>
                </a>

                <form id="logout-form" action="{{ asset('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
</aside>
