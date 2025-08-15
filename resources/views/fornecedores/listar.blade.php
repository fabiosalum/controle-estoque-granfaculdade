@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="header-title">Fornecedores</h4>
                        <p class="text-muted mb-0">Gerencie os fornecedores cadastrados</p>
                    </div>
                    <a href="{{ route('fornecedores.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i> Novo Fornecedor
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-alert-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-centered table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Nome/Razão Social</th>
                                <th>CNPJ</th>
                                <th>Telefone</th>
                                <th>Cidade/Estado</th>
                                <th>Tipo</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($fornecedores as $fornecedor)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-light rounded-circle me-3">
                                                <span class="avatar-title text-primary fw-bold">
                                                    {{ strtoupper(substr($fornecedor->nome, 0, 2)) }}
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $fornecedor->nome }}</h6>
                                                @if($fornecedor->email)
                                                    <small class="text-muted">{{ $fornecedor->email }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($fornecedor->cnpj)
                                            <span class="text-muted">{{ $fornecedor->cnpj_formatado }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($fornecedor->telefone)
                                            <span class="text-muted">{{ $fornecedor->telefone_formatado }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($fornecedor->cidade)
                                            <span class="text-muted">{{ $fornecedor->cidade }}</span>
                                            @if($fornecedor->estado)
                                                <span class="text-muted">/{{ $fornecedor->estado }}</span>
                                            @endif
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($fornecedor->tipo)
                                            <span class="badge bg-info">{{ $fornecedor->tipo }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($fornecedor->status)
                                            <span class="badge bg-success">Ativo</span>
                                        @else
                                            <span class="badge bg-danger">Inativo</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('fornecedores.show', $fornecedor->id) }}">
                                                        <i class="mdi mdi-eye me-2"></i> Visualizar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('fornecedores.edit', $fornecedor->id) }}">
                                                        <i class="mdi mdi-pencil me-2"></i> Editar
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('fornecedores.toggle-status', $fornecedor->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="dropdown-item">
                                                            @if($fornecedor->status)
                                                                <i class="mdi mdi-pause-circle me-2"></i> Desativar
                                                            @else
                                                                <i class="mdi mdi-play-circle me-2"></i> Ativar
                                                            @endif
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">
                                                            <i class="mdi mdi-delete me-2"></i> Excluir
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="mdi mdi-information-outline fs-1"></i>
                                            <p class="mt-2">Nenhum fornecedor cadastrado</p>
                                            <a href="{{ route('fornecedores.create') }}" class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-plus"></i> Cadastrar Primeiro Fornecedor
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($fornecedores->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $fornecedores->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-hide alerts after 5 seconds
    setTimeout(function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);

    // Confirm delete
    document.querySelectorAll('.delete-form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            if (!confirm('Tem certeza que deseja excluir este fornecedor? Esta ação não pode ser desfeita.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endpush