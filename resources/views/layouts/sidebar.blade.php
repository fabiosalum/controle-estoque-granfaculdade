<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="" class="logo logo-light">
        <span class="logo-lg mt-2">
            <h3>Controle de Estoque</h3>
        </span>

    </a>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Menu</li>

            <li class="side-nav-item">
                <a href="{{ route('dashboard') }}" class="side-nav-link">
                    <i class="mdi mdi-view-dashboard"></i>
                    <span> Dashboard </span>
                </a>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarFornecedores" aria-expanded="false" aria-controls="sidebarFornecedores" class="side-nav-link">
                    <i class="mdi mdi-account-group"></i>
                    <span> Fornecedores </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarFornecedores">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('fornecedores.create') }}">Cadastrar Fornecedor</a>
                        </li>
                        <li>
                            <a href="{{ route('fornecedores.index') }}">Listar Fornecedores</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarProdutos" aria-expanded="false" aria-controls="sidebarProdutos" class="side-nav-link">
                    <i class="mdi mdi-package-variant"></i>
                    <span> Produtos </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarProdutos">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('produtos.create') }}">Cadastrar Produto</a>
                        </li>
                        <li>
                            <a href="{{ route('produtos.index') }}">Listar Produtos</a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
        <!--- End Sidemenu -->

        <div class="clearfix"></div>
    </div>
</div>