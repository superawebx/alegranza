<!-- Layout sidenav -->
<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <img src="{{ asset('img/logo.png') }}" width="40" height="20">
        <a href="#" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Adm Eventos</a>
    </div>

    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Constrole de Usuarios s -->

        <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon ion ion-ios-albums"></i>
                <div>Usuários </div>
            </a>

            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="<?= url('usuario/editar/'.Auth::user()->id ); ?>" class="sidenav-link">
                        <div>Meus Dados </div>
                    </a>
                </li>

                <li class="sidenav-item">
                    <a href="layouts_helpers.html" class="sidenav-link">
                        <div>Mensagens </div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="<?= url('usuario/novo'); ?>" class="sidenav-link">
                        <div>Novo Usuário </div>
                    </a>
                </li>

            </ul>
        </li>

        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">MENU</li>

        <li class="sidenav-item">
            <a href="<?= url('/home'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Home</div>
            </a>
        </li>

        @if (Auth::user()->master != 0)
        <li class="sidenav-item">
            <a href="<?= url('/empresa/listar'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Empresas </div>
            </a>
        </li>
        @endif

        <li class="sidenav-item">
            <a href="<?= url('/clientes/listar'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Clientes</div>
            </a>
        </li>

        <li class="sidenav-item">
            <a href="<?= url('/parceiros/listar'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Parceiros</div>
            </a>
        </li>

        <!--
        <li class="sidenav-item">
            <a href="<?= url('/textocontrato/listar'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Texto Contrato</div>
            </a>
        </li>
        -->

        <li class="sidenav-item">
            <a href="<?= url('/contratos/listar'); ?>" class="sidenav-link">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Gerar Contrato</div>
            </a>
        </li>

        <!-- UI elements -->
        <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon ion ion-md-cube"></i>
                <div>Financeiro</div>
            </a>

            <ul class="sidenav-menu">

                <li class="sidenav-item">
                    <a href="<?= url('/financeiro/listar'); ?>" class="sidenav-link">
                        <div>Contas à Receber</div>
                    </a>
                </li>

                <li class="sidenav-item">
                    <a href="<?= url('/tipolancamento/listar'); ?>" class="sidenav-link">
                        <div>Tipo Lançamento </div>
                    </a>
                </li>

                <li class="sidenav-item">
                    <a href="<?= url('/contas/listar'); ?>" class="sidenav-link">
                        <div>Contas à Pagar / Receitas </div>
                    </a>
                </li>


            </ul>
        </li>

        <!-- Forms -->
        <li class="sidenav-item">
            <a href="javascript:void(0)" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon ion ion-md-switch"></i>
                <div>Relatórios</div>
            </a>

            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <a href="<?= url('/clientes/report'); ?>" class="sidenav-link">
                        <div>Clientes</div>
                    </a>
                </li>
                <li class="sidenav-item">
                    <a href="<?= url('contratos/calendar'); ?>" class="sidenav-link">
                        <div>Agenda</div>
                    </a>
                </li>


            </ul>
        </li>

        <li class="sidenav-divider mb-1"></li>

    </ul>
</div>
<!-- / Layout sidenav -->