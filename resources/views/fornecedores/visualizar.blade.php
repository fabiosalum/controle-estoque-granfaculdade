@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="header-title">Detalhes do Fornecedor</h4>
                        <p class="text-muted mb-0">Informações completas do fornecedor</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-primary">
                            <i class="mdi mdi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">
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
                                <label class="form-label fw-bold">Nome/Razão Social</label>
                                <p class="form-control-plaintext">{{ $fornecedor->nome }}</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Tipo</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->tipo)
                                        <span class="badge bg-info">{{ $fornecedor->tipo }}</span>
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Status</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->status)
                                        <span class="badge bg-success">Ativo</span>
                                    @else
                                        <span class="badge bg-danger">Inativo</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">CNPJ</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->cnpj)
                                        {{ $fornecedor->cnpj_formatado }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de Cadastro</label>
                                <p class="form-control-plaintext">{{ $fornecedor->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Informações de Contato -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Informações de Contato</h5>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">E-mail</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->email)
                                        <a href="mailto:{{ $fornecedor->email }}">{{ $fornecedor->email }}</a>
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Telefone</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->telefone)
                                        {{ $fornecedor->telefone_formatado }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">Site</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->site)
                                        <a href="{{ $fornecedor->site }}" target="_blank">{{ $fornecedor->site }}</a>
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Endereço -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Endereço</h5>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-bold">Endereço Completo</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->endereco)
                                        {{ $fornecedor->endereco }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Cidade</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->cidade)
                                        {{ $fornecedor->cidade }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">Estado</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->estado)
                                        {{ $fornecedor->estado }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label fw-bold">CEP</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->cep)
                                        {{ $fornecedor->cep_formatado }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Inscrições -->
                        <div class="row g-3">
                            <div class="col-md-12">
                                <h5 class="text-primary mb-3">Inscrições</h5>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Inscrição Estadual</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->inscricao_estadual)
                                        {{ $fornecedor->inscricao_estadual }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Inscrição Municipal</label>
                                <p class="form-control-plaintext">
                                    @if($fornecedor->inscricao_municipal)
                                        {{ $fornecedor->inscricao_municipal }}
                                    @else
                                        <span class="text-muted">Não informado</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        @if($fornecedor->observacoes)
                            <hr class="my-4">
                            
                            <!-- Observações -->
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <h5 class="text-primary mb-3">Observações</h5>
                                    <p class="form-control-plaintext">{{ $fornecedor->observacoes }}</p>
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
                                    <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="btn btn-primary">
                                        <i class="mdi mdi-pencil me-2"></i> Editar Fornecedor
                                    </a>
                                    
                                    <form action="{{ route('fornecedores.toggle-status', $fornecedor->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-warning w-100">
                                            @if($fornecedor->status)
                                                <i class="mdi mdi-pause-circle me-2"></i> Desativar
                                            @else
                                                <i class="mdi mdi-play-circle me-2"></i> Ativar
                                            @endif
                                        </button>
                                    </form>

                                    <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">
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
                                        <p class="mb-0 fw-bold">#{{ $fornecedor->id }}</p>
                                    </div>
                                    <div class="col-6">
                                        <small class="text-muted">Status</small>
                                        <p class="mb-0">
                                            @if($fornecedor->status)
                                                <span class="badge bg-success">Ativo</span>
                                            @else
                                                <span class="badge bg-danger">Inativo</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">Criado em</small>
                                        <p class="mb-0">{{ $fornecedor->created_at->format('d/m/Y H:i') }}</p>
                                    </div>
                                    <div class="col-12">
                                        <small class="text-muted">Última atualização</small>
                                        <p class="mb-0">{{ $fornecedor->updated_at->format('d/m/Y H:i') }}</p>
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

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
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
