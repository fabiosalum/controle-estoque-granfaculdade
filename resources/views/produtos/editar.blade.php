@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="header-title">Editar Produto</h4>
                        <p class="text-muted mb-0">Edite os dados do produto</p>
                    </div>
                    <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                        <i class="mdi mdi-arrow-left"></i> Voltar
                    </a>
                </div>
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-alert-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('produtos.update', $produto->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-3">
                        <!-- Nome e Código -->
                        <div class="col-md-8">
                            <label for="nome" class="form-label">Nome do Produto *</label>
                            <input type="text" 
                                   class="form-control @error('nome') is-invalid @enderror" 
                                   id="nome" 
                                   name="nome" 
                                   value="{{ old('nome', $produto->nome) }}" 
                                   placeholder="Digite o nome do produto"
                                   required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="codigo" class="form-label">Código *</label>
                            <input type="text" 
                                   class="form-control @error('codigo') is-invalid @enderror" 
                                   id="codigo" 
                                   name="codigo" 
                                   value="{{ old('codigo', $produto->codigo) }}" 
                                   placeholder="Ex: NB-DELL-001"
                                   required>
                            @error('codigo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Categoria e Fornecedor -->
                        <div class="col-md-6">
                            <label for="categoria" class="form-label">Categoria *</label>
                            <select class="form-select @error('categoria') is-invalid @enderror" id="categoria" name="categoria" required>
                                <option value="">Selecione a categoria</option>
                                @foreach($categorias as $key => $categoria)
                                    <option value="{{ $key }}" {{ old('categoria', $produto->categoria) == $key ? 'selected' : '' }}>
                                        {{ $categoria }}
                                    </option>
                                @endforeach
                            </select>
                            @error('categoria')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="fornecedor_id" class="form-label">Fornecedor *</label>
                            <select class="form-select @error('fornecedor_id') is-invalid @enderror" id="fornecedor_id" name="fornecedor_id" required>
                                <option value="">Selecione o fornecedor</option>
                                @foreach($fornecedores as $fornecedor)
                                    <option value="{{ $fornecedor->id }}" {{ old('fornecedor_id', $produto->fornecedor_id) == $fornecedor->id ? 'selected' : '' }}>
                                        {{ $fornecedor->nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fornecedor_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Preços -->
                        <div class="col-md-6">
                            <label for="preco_custo" class="form-label">Preço de Custo *</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" 
                                       class="form-control @error('preco_custo') is-invalid @enderror" 
                                       id="preco_custo" 
                                       name="preco_custo" 
                                       value="{{ old('preco_custo', $produto->preco_custo) }}" 
                                       placeholder="0,00"
                                       step="0.01"
                                       min="0"
                                       required>
                                @error('preco_custo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="preco_venda" class="form-label">Preço de Venda *</label>
                            <div class="input-group">
                                <span class="input-group-text">R$</span>
                                <input type="number" 
                                       class="form-control @error('preco_venda') is-invalid @enderror" 
                                       id="preco_venda" 
                                       name="preco_venda" 
                                       value="{{ old('preco_venda', $produto->preco_venda) }}" 
                                       placeholder="0,00"
                                       step="0.01"
                                       min="0"
                                       required>
                                @error('preco_venda')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Quantidades -->
                        <div class="col-md-4">
                            <label for="quantidade_estoque" class="form-label">Quantidade em Estoque *</label>
                            <input type="number" 
                                   class="form-control @error('quantidade_estoque') is-invalid @enderror" 
                                   id="quantidade_estoque" 
                                   name="quantidade_estoque" 
                                   value="{{ old('quantidade_estoque', $produto->quantidade_estoque) }}" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            @error('quantidade_estoque')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="quantidade_minima" class="form-label">Quantidade Mínima *</label>
                            <input type="number" 
                                   class="form-control @error('quantidade_minima') is-invalid @enderror" 
                                   id="quantidade_minima" 
                                   name="quantidade_minima" 
                                   value="{{ old('quantidade_minima', $produto->quantidade_minima) }}" 
                                   placeholder="0"
                                   min="0"
                                   required>
                            @error('quantidade_minima')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="unidade_medida" class="form-label">Unidade de Medida *</label>
                            <select class="form-select @error('unidade_medida') is-invalid @enderror" id="unidade_medida" name="unidade_medida" required>
                                <option value="">Selecione</option>
                                @foreach($unidadesMedida as $key => $unidade)
                                    <option value="{{ $key }}" {{ old('unidade_medida', $produto->unidade_medida) == $key ? 'selected' : '' }}>
                                        {{ $unidade }}
                                    </option>
                                @endforeach
                            </select>
                            @error('unidade_medida')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Descrição -->
                        <div class="col-md-12">
                            <label for="descricao" class="form-label">Descrição</label>
                            <textarea class="form-control @error('descricao') is-invalid @enderror" 
                                      id="descricao" 
                                      name="descricao" 
                                      rows="3" 
                                      placeholder="Descreva o produto detalhadamente">{{ old('descricao', $produto->descricao) }}</textarea>
                            @error('descricao')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Observações -->
                        <div class="col-md-12">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control @error('observacoes') is-invalid @enderror" 
                                      id="observacoes" 
                                      name="observacoes" 
                                      rows="2" 
                                      placeholder="Informações adicionais sobre o produto">{{ old('observacoes', $produto->observacoes) }}</textarea>
                            @error('observacoes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" {{ old('status', $produto->status) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Produto ativo
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                                    <i class="mdi mdi-close"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save"></i> Atualizar Produto
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Máscara para preços
    const precoCustoInput = document.getElementById('preco_custo');
    const precoVendaInput = document.getElementById('preco_venda');
    
    [precoCustoInput, precoVendaInput].forEach(input => {
        if (input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value;
                if (value < 0) {
                    e.target.value = 0;
                }
            });
        }
    });

    // Máscara para quantidades
    const quantidadeEstoqueInput = document.getElementById('quantidade_estoque');
    const quantidadeMinimaInput = document.getElementById('quantidade_minima');
    
    [quantidadeEstoqueInput, quantidadeMinimaInput].forEach(input => {
        if (input) {
            input.addEventListener('input', function(e) {
                let value = e.target.value;
                if (value < 0) {
                    e.target.value = 0;
                }
            });
        }
    });

    // Validação de preço de venda maior que preço de custo
    precoVendaInput.addEventListener('input', function() {
        const precoCusto = parseFloat(precoCustoInput.value) || 0;
        const precoVenda = parseFloat(this.value) || 0;
        
        if (precoVenda < precoCusto) {
            this.setCustomValidity('O preço de venda deve ser maior ou igual ao preço de custo');
        } else {
            this.setCustomValidity('');
        }
    });

    precoCustoInput.addEventListener('input', function() {
        const precoCusto = parseFloat(this.value) || 0;
        const precoVenda = parseFloat(precoVendaInput.value) || 0;
        
        if (precoVenda > 0 && precoVenda < precoCusto) {
            precoVendaInput.setCustomValidity('O preço de venda deve ser maior ou igual ao preço de custo');
        } else {
            precoVendaInput.setCustomValidity('');
        }
    });
});
</script>
@endpush
