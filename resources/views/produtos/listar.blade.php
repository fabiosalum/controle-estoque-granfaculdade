@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="header-title">Produtos</h4>
                        <p class="text-muted mb-0">Gerencie os produtos cadastrados</p>
                    </div>
                    <a href="{{ route('produtos.create') }}" class="btn btn-primary">
                        <i class="mdi mdi-plus"></i> Novo Produto
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
                                <th>Produto</th>
                                <th>Código</th>
                                <th>Categoria</th>
                                <th>Preços</th>
                                <th>Estoque</th>
                                <th>Fornecedor</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produtos as $produto)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm bg-light rounded-circle me-3">
                                                <span class="avatar-title text-primary fw-bold">
                                                    {{ strtoupper(substr($produto->nome, 0, 2)) }}
                                                </span>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $produto->nome }}</h6>
                                                @if($produto->descricao)
                                                    <small class="text-muted">{{ Str::limit($produto->descricao, 50) }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $produto->codigo }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $produto->categoria }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <small class="text-muted">Custo: {{ $produto->preco_custo_formatado }}</small>
                                            <strong class="text-success">Venda: {{ $produto->preco_venda_formatado }}</strong>
                                            <small class="text-info">Margem: {{ number_format($produto->margem_lucro, 1) }}%</small>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-start">
                                            <span class="fw-bold {{ $produto->estoque_baixo ? 'text-warning' : 'text-success' }}">
                                                {{ $produto->quantidade_estoque }} {{ $produto->unidade_medida }}
                                            </span>
                                            @if($produto->estoque_baixo)
                                                <small class="text-warning">
                                                    <i class="mdi mdi-alert"></i> Estoque baixo
                                                </small>
                                            @endif
                                            @if($produto->sem_estoque)
                                                <small class="text-danger">
                                                    <i class="mdi mdi-close-circle"></i> Sem estoque
                                                </small>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        @if($produto->fornecedor)
                                            <span class="text-muted">{{ $produto->fornecedor->nome }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($produto->status)
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
                                                    <a class="dropdown-item" href="{{ route('produtos.show', $produto->id) }}">
                                                        <i class="mdi mdi-eye me-2"></i> Visualizar
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('produtos.edit', $produto->id) }}">
                                                        <i class="mdi mdi-pencil me-2"></i> Editar
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ajustarEstoqueModal{{ $produto->id }}">
                                                        <i class="mdi mdi-package-variant me-2"></i> Ajustar Estoque
                                                    </a>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('produtos.toggle-status', $produto->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="dropdown-item">
                                                            @if($produto->status)
                                                                <i class="mdi mdi-pause-circle me-2"></i> Desativar
                                                            @else
                                                                <i class="mdi mdi-play-circle me-2"></i> Ativar
                                                            @endif
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                                            <i class="mdi mdi-delete me-2"></i> Excluir
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal para Ajustar Estoque -->
                                <div class="modal fade" id="ajustarEstoqueModal{{ $produto->id }}" tabindex="-1" aria-labelledby="ajustarEstoqueModalLabel{{ $produto->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ajustarEstoqueModalLabel{{ $produto->id }}">
                                                    Ajustar Estoque - {{ $produto->nome }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('produtos.ajustar-estoque', $produto->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="tipo_ajuste{{ $produto->id }}" class="form-label">Tipo de Ajuste *</label>
                                                        <select class="form-select" id="tipo_ajuste{{ $produto->id }}" name="tipo_ajuste" required>
                                                            <option value="">Selecione o tipo</option>
                                                            <option value="entrada">Entrada (Adicionar)</option>
                                                            <option value="saida">Saída (Remover)</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="quantidade{{ $produto->id }}" class="form-label">Quantidade *</label>
                                                        <input type="number" class="form-control" id="quantidade{{ $produto->id }}" name="quantidade" min="1" required>
                                                        <small class="text-muted">Estoque atual: {{ $produto->quantidade_estoque }} {{ $produto->unidade_medida }}</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="motivo{{ $produto->id }}" class="form-label">Motivo *</label>
                                                        <input type="text" class="form-control" id="motivo{{ $produto->id }}" name="motivo" placeholder="Ex: Compra, Venda, Ajuste de inventário" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Confirmar Ajuste</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="mdi mdi-information-outline fs-1"></i>
                                            <p class="mt-2">Nenhum produto cadastrado</p>
                                            <a href="{{ route('produtos.create') }}" class="btn btn-primary btn-sm">
                                                <i class="mdi mdi-plus"></i> Cadastrar Primeiro Produto
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($produtos->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $produtos->links() }}
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
            if (!confirm('Tem certeza que deseja excluir este produto? Esta ação não pode ser desfeita.')) {
                e.preventDefault();
            }
        });
    });
});
</script>
@endpush
