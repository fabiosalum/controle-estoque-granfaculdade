@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="header-title">Detalhes do Produto</h4>
                        <p class="text-muted mb-0">Informações completas do produto</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">
                            <i class="mdi mdi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Informações Principais -->
                    <div class="col-md-8">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Informações Principais</h5>
                            </div>
                            
                            <div class="col-md-12">
                                <label class="form-label fw-bold">Nome do Produto</label>
                                <p class="form-control-plaintext">{{ $produto->nome }}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Código</label>
                                <p class="form-control-plaintext">
                                    <span class="badge bg-light text-dark">{{ $produto->codigo }}</span>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Categoria</label>
                                <p class="form-control-plaintext">
                                    <span class="badge bg-info">{{ $produto->categoria }}</span>
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status</label>
                                <p class="form-control-plaintext">
                                    @if($produto->status)
                                        <span class="badge bg-success">Ativo</span>
                                    @else
                                        <span class="badge bg-danger">Inativo</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de Cadastro</label>
                                <p class="form-control-plaintext">{{ $produto->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Informações de Preço -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Informações de Preço</h5>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Preço de Custo</label>
                                <p class="form-control-plaintext text-muted">{{ $produto->preco_custo_formatado }}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Preço de Venda</label>
                                <p class="form-control-plaintext text-success fw-bold">{{ $produto->preco_venda_formatado }}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Margem de Lucro</label>
                                <p class="form-control-plaintext">
                                    <span class="badge bg-info">{{ number_format($produto->margem_lucro, 1) }}%</span>
                                </p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Informações de Estoque -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Informações de Estoque</h5>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Quantidade em Estoque</label>
                                <p class="form-control-plaintext">
                                    <span class="fw-bold {{ $produto->estoque_baixo ? 'text-warning' : 'text-success' }}">
                                        {{ $produto->quantidade_estoque }} {{ $produto->unidade_medida }}
                                    </span>
                                </p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Quantidade Mínima</label>
                                <p class="form-control-plaintext">{{ $produto->quantidade_minima }} {{ $produto->unidade_medida }}</p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Unidade de Medida</label>
                                <p class="form-control-plaintext">{{ $produto->unidade_medida }}</p>
                            </div>

                            <div class="col-md-12">
                                @if($produto->estoque_baixo)
                                    <div class="alert alert-warning" role="alert">
                                        <i class="mdi mdi-alert me-2"></i>
                                        <strong>Atenção:</strong> Este produto está com estoque baixo!
                                    </div>
                                @endif

                                @if($produto->sem_estoque)
                                    <div class="alert alert-danger" role="alert">
                                        <i class="mdi mdi-close-circle me-2"></i>
                                        <strong>Crítico:</strong> Este produto está sem estoque!
                                    </div>
                                @endif
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Fornecedor -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Fornecedor</h5>
                            </div>

                            <div class="col-md-12">
                                @if($produto->fornecedor)
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h6 class="mb-1">{{ $produto->fornecedor->nome }}</h6>
                                                    <p class="text-muted mb-1">
                                                        <i class="mdi mdi-map-marker me-1"></i>
                                                        {{ $produto->fornecedor->cidade }}/{{ $produto->fornecedor->estado }}
                                                    </p>
                                                    @if($produto->fornecedor->email)
                                                        <p class="text-muted mb-0">
                                                            <i class="mdi mdi-email me-1"></i>
                                                            <a href="mailto:{{ $produto->fornecedor->email }}">{{ $produto->fornecedor->email }}</a>
                                                        </p>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 text-end">
                                                    <span class="badge bg-info">{{ $produto->fornecedor->tipo }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted">Nenhum fornecedor associado</p>
                                @endif
                            </div>
                        </div>

                        @if($produto->descricao)
                            <hr class="my-4">
                            
                            <!-- Descrição -->
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <h5 class="text-primary mb-3">Descrição</h5>
                                    <p class="form-control-plaintext">{{ $produto->descricao }}</p>
                                </div>
                            </div>
                        @endif

                        @if($produto->observacoes)
                            <hr class="my-4">
                            
                            <!-- Observações -->
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <h5 class="text-primary mb-3">Observações</h5>
                                    <p class="form-control-plaintext">{{ $produto->observacoes }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Sidebar com Ações -->
                    <div class="col-md-4">
                        <div class="card border">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Ações Rápidas</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">
                                        <i class="mdi mdi-pencil me-2"></i> Editar Produto
                                    </a>
                                    
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ajustarEstoqueModal">
                                        <i class="mdi mdi-package-variant me-2"></i> Ajustar Estoque
                                    </button>
                                    
                                    <form action="{{ route('produtos.toggle-status', $produto->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-info w-100">
                                            @if($produto->status)
                                                <i class="mdi mdi-pause-circle me-2"></i> Desativar
                                            @else
                                                <i class="mdi mdi-play-circle me-2"></i> Ativar
                                            @endif
                                        </button>
                                    </form>

                                    <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                            <i class="mdi mdi-delete me-2"></i> Excluir
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card border mt-3">
                            <div class="card-header bg-light">
                                <h6 class="mb-0">Informações do Sistema</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-2">
                                    <div class="col-6">
                                        <small class="text-muted">ID</small>
                                        <p class="mb-0 fw-bold">#{{ $produto->id }}</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Status</small>
                                        <p class="mb-0">
                                            @if($produto->status)
                                                <span class="badge bg-success">Ativo</span>
                                            @else
                                                <span class="badge bg-danger">Inativo</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">Criado em</small>
                                        <p class="mb-0">{{ $produto->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">Última atualização</small>
                                        <p class="mb-0">{{ $produto->updated_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Ajustar Estoque -->
<div class="modal fade" id="ajustarEstoqueModal" tabindex="-1" aria-labelledby="ajustarEstoqueModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ajustarEstoqueModalLabel">
                    Ajustar Estoque - {{ $produto->nome }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('produtos.ajustar-estoque', $produto->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tipo_ajuste" class="form-label">Tipo de Ajuste *</label>
                        <select class="form-select" id="tipo_ajuste" name="tipo_ajuste" required>
                            <option value="">Selecione o tipo</option>
                            <option value="entrada">Entrada (Adicionar)</option>
                            <option value="saida">Saída (Remover)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantidade" class="form-label">Quantidade *</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" min="1" required>
                        <small class="text-muted">Estoque atual: {{ $produto->quantidade_estoque }} {{ $produto->unidade_medida }}</small>
                    </div>
                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo *</label>
                        <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Ex: Compra, Venda, Ajuste de inventário" required>
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
