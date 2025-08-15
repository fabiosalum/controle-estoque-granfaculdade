@extends('layouts.master')

@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Bem Vindo ao Sistema de Controle de Estoque!</h4>
                <p class="text-muted">Gerencie seus produtos e fornecedores de forma eficiente</p>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <!-- Card de Fornecedores -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-purple">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-group widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Fornecedores">Total de Fornecedores</h6>
                    <h2 class="my-2">{{ App\Models\Fornecedores::count() }}</h2>
                    <p class="mb-0 text-white-50">
                        <span class="text-success me-2">
                            <i class="mdi mdi-arrow-up-bold"></i> {{ App\Models\Fornecedores::ativos()->count() }} ativos
                        </span>
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-light btn-sm">
                            <i class="mdi mdi-eye me-1"></i> Ver Todos
                        </a>
                        <a href="{{ route('fornecedores.create') }}" class="btn btn-light btn-sm ms-1">
                            <i class="mdi mdi-plus me-1"></i> Novo
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <!-- Card de Produtos -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-info">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-package-variant widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Produtos">Total de Produtos</h6>
                    <h2 class="my-2">{{ App\Models\Produtos::count() }}</h2>
                    <p class="mb-0 text-white-50">
                        <span class="text-warning me-2">
                            <i class="mdi mdi-alert me-1"></i> {{ App\Models\Produtos::estoqueBaixo()->count() }} estoque baixo
                        </span>
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('produtos.index') }}" class="btn btn-light btn-sm">
                            <i class="mdi mdi-eye me-1"></i> Ver Todos
                        </a>
                        <a href="{{ route('produtos.create') }}" class="btn btn-light btn-sm ms-1">
                            <i class="mdi mdi-plus me-1"></i> Novo
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <!-- Card de Estoque -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-success">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-warehouse widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Estoque">Valor em Estoque</h6>
                    <h2 class="my-2">R$ {{ number_format(App\Models\Produtos::sum('preco_custo'), 2, ',', '.') }}</h2>
                    <p class="mb-0 text-white-50">
                        <span class="text-light me-2">
                            <i class="mdi mdi-package me-1"></i> {{ App\Models\Produtos::sum('quantidade_estoque') }} unidades
                        </span>
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('produtos.index') }}" class="btn btn-light btn-sm">
                            <i class="mdi mdi-chart-line me-1"></i> Relatórios
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->

        <!-- Card de Alertas -->
        <div class="col-xxl-3 col-sm-6">
            <div class="card widget-flat text-bg-warning">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-alert widget-icon"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Alertas">Alertas</h6>
                    <h2 class="my-2">{{ App\Models\Produtos::estoqueBaixo()->count() + App\Models\Produtos::semEstoque()->count() }}</h2>
                    <p class="mb-0 text-white-50">
                        <span class="text-danger me-2">
                            <i class="mdi mdi-close-circle me-1"></i> {{ App\Models\Produtos::semEstoque()->count() }} sem estoque
                        </span>
                    </p>
                    <div class="mt-3">
                        <a href="{{ route('produtos.index') }}" class="btn btn-light btn-sm">
                            <i class="mdi mdi-alert me-1"></i> Ver Alertas
                        </a>
                    </div>
                </div>
            </div>
        </div> <!-- end col-->
    </div>

    <!-- Ações Rápidas -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="mdi mdi-lightning-bolt me-2"></i>
                        Ações Rápidas
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <a href="{{ route('produtos.create') }}" class="btn btn-primary w-100 p-3">
                                <i class="mdi mdi-plus-circle fs-1 d-block mb-2"></i>
                                <strong>Novo Produto</strong>
                                <small class="d-block text-white-50">Cadastrar produto no sistema</small>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('fornecedores.create') }}" class="btn btn-success w-100 p-3">
                                <i class="mdi mdi-account-plus fs-1 d-block mb-2"></i>
                                <strong>Novo Fornecedor</strong>
                                <small class="d-block text-white-50">Cadastrar fornecedor</small>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('produtos.index') }}" class="btn btn-info w-100 p-3">
                                <i class="mdi mdi-package-variant fs-1 d-block mb-2"></i>
                                <strong>Gerenciar Produtos</strong>
                                <small class="d-block text-white-50">Ver todos os produtos</small>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('fornecedores.index') }}" class="btn btn-warning w-100 p-3">
                                <i class="mdi mdi-account-group fs-1 d-block mb-2"></i>
                                <strong>Gerenciar Fornecedores</strong>
                                <small class="d-block text-white-50">Ver todos os fornecedores</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Produtos com Estoque Baixo -->
    @if(App\Models\Produtos::estoqueBaixo()->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0 text-warning">
                        <i class="mdi mdi-alert me-2"></i>
                        Produtos com Estoque Baixo
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Produto</th>
                                    <th>Estoque Atual</th>
                                    <th>Mínimo</th>
                                    <th>Fornecedor</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(App\Models\Produtos::estoqueBaixo()->with('fornecedor')->take(5)->get() as $produto)
                                <tr>
                                    <td>
                                        <strong>{{ $produto->nome }}</strong>
                                        <br><small class="text-muted">{{ $produto->codigo }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-warning">{{ $produto->quantidade_estoque }} {{ $produto->unidade_medida }}</span>
                                    </td>
                                    <td>{{ $produto->quantidade_minima }} {{ $produto->unidade_medida }}</td>
                                    <td>
                                        @if($produto->fornecedor)
                                            <small>{{ $produto->fornecedor->nome }}</small>
                                        @else
                                            <small class="text-muted">-</small>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="mdi mdi-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center mt-3">
                        <a href="{{ route('produtos.index') }}" class="btn btn-warning">
                            <i class="mdi mdi-alert me-1"></i> Ver Todos os Alertas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>

@endsection

@push('scripts')
<style>
.widget-icon {
    font-size: 3rem;
    opacity: 0.8;
}

.card.widget-flat {
    transition: transform 0.2s;
}

.card.widget-flat:hover {
    transform: translateY(-5px);
}

.btn.p-3 {
    transition: all 0.2s;
}

.btn.p-3:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
</style>
@endpush