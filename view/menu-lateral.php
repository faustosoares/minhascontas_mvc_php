<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">MinhasContas</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
    <a class="nav-link" href="index.html">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Cadastros
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Componentes</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Básico:</h6>
        <a id="categoria" class="collapse-item" href="/listar-categorias">Categoria</a>
        <a id="pessoa" class="collapse-item" href="/listar-pessoas">Pessoa</a>
        <a id="cartao" class="collapse-item" href="/listar-cartoes">Cartão</a>
        <a id="compra" class="collapse-item" href="/listar-compras">Compra</a>
        <a id="fatura" class="collapse-item" href="/listar-faturas">Fatura</a>
        </div>
    </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Manutenção</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Acesso ao Sistema:</h6>
        <a class="collapse-item" href="utilities-color.html">Usuário</a>
        <a class="collapse-item" href="utilities-other.html">Perfil</a>
        </div>
    </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    Relatórios
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Gerar Relatórios</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">PDF</h6>
        <a class="collapse-item" href="login.html">Faturas</a>
        <a class="collapse-item" href="register.html">Compras por Fatura</a>
        <a class="collapse-item" href="forgot-password.html">Compras por Pessoa</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Tela</h6>
        <a class="collapse-item" href="blank.html">Usuários</a>
        <a class="collapse-item" href="blank.html">Faturas de Cartões</a>
        </div>
    </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Gráficos</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle" onClick="javascript:ativarItem()"></button>
    </div>

</ul>
<!-- End of Sidebar -->