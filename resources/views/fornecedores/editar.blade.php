@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="header-title">Editar Fornecedor</h4>
                        <p class="text-muted mb-0">Edite os dados do fornecedor</p>
                    </div>
                    <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">
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

                <form action="{{ route('fornecedores.update', $fornecedor->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-3">
                        <!-- Nome -->
                        <div class="col-md-12">
                            <label for="nome" class="form-label">Nome/Razão Social *</label>
                            <input type="text" 
                                   class="form-control @error('nome') is-invalid @enderror" 
                                   id="nome" 
                                   name="nome" 
                                   value="{{ old('nome', $fornecedor->nome) }}" 
                                   placeholder="Digite o nome ou razão social"
                                   required>
                            @error('nome')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email e Telefone -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email', $fornecedor->email) }}" 
                                   placeholder="exemplo@email.com">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" 
                                   class="form-control @error('telefone') is-invalid @enderror" 
                                   id="telefone" 
                                   name="telefone" 
                                   value="{{ old('telefone', $fornecedor->telefone) }}" 
                                   placeholder="(11) 99999-9999">
                            @error('telefone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- CNPJ e Tipo -->
                        <div class="col-md-6">
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input type="text" 
                                   class="form-control @error('cnpj') is-invalid @enderror" 
                                   id="cnpj" 
                                   name="cnpj" 
                                   value="{{ old('cnpj', $fornecedor->cnpj) }}" 
                                   placeholder="XX.XXX.XXX/XXXX-XX">
                            @error('cnpj')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tipo" class="form-label">Tipo</label>
                            <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo">
                                <option value="">Selecione o tipo</option>
                                <option value="Fornecedor" {{ old('tipo', $fornecedor->tipo) == 'Fornecedor' ? 'selected' : '' }}>Fornecedor</option>
                                <option value="Distribuidor" {{ old('tipo', $fornecedor->tipo) == 'Distribuidor' ? 'selected' : '' }}>Distribuidor</option>
                                <option value="Fabricante" {{ old('tipo', $fornecedor->tipo) == 'Fabricante' ? 'selected' : '' }}>Fabricante</option>
                                <option value="Importador" {{ old('tipo', $fornecedor->tipo) == 'Importador' ? 'selected' : '' }}>Importador</option>
                                <option value="Outro" {{ old('tipo', $fornecedor->tipo) == 'Outro' ? 'selected' : '' }}>Outro</option>
                            </select>
                            @error('tipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Endereço -->
                        <div class="col-md-12">
                            <label for="endereco" class="form-label">Endereço</label>
                            <input type="text" 
                                   class="form-control @error('endereco') is-invalid @enderror" 
                                   id="endereco" 
                                   name="endereco" 
                                   value="{{ old('endereco', $fornecedor->endereco) }}" 
                                   placeholder="Rua, número, bairro">
                            @error('endereco')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cidade, Estado e CEP -->
                        <div class="col-md-6">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" 
                                   class="form-control @error('cidade') is-invalid @enderror" 
                                   id="cidade" 
                                   name="cidade" 
                                   value="{{ old('cidade', $fornecedor->cidade) }}" 
                                   placeholder="Nome da cidade">
                            @error('cidade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select @error('estado') is-invalid @enderror" id="estado" name="estado">
                                <option value="">Selecione o estado</option>
                                @foreach($estados as $uf => $nome)
                                    <option value="{{ $uf }}" {{ old('estado', $fornecedor->estado) == $uf ? 'selected' : '' }}>
                                        {{ $nome }}
                                    </option>
                                @endforeach
                            </select>
                            @error('estado')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" 
                                   class="form-control @error('cep') is-invalid @enderror" 
                                   id="cep" 
                                   name="cep" 
                                   value="{{ old('cep', $fornecedor->cep) }}" 
                                   placeholder="00000-000">
                            @error('cep')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Inscrições -->
                        <div class="col-md-6">
                            <label for="inscricao_estadual" class="form-label">Inscrição Estadual</label>
                            <input type="text" 
                                   class="form-control @error('inscricao_estadual') is-invalid @enderror" 
                                   id="inscricao_estadual" 
                                   name="inscricao_estadual" 
                                   value="{{ old('inscricao_estadual', $fornecedor->inscricao_estadual) }}" 
                                   placeholder="Inscrição estadual">
                            @error('inscricao_estadual')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="inscricao_municipal" class="form-label">Inscrição Municipal</label>
                            <input type="text" 
                                   class="form-control @error('inscricao_municipal') is-invalid @enderror" 
                                   id="inscricao_municipal" 
                                   name="inscricao_municipal" 
                                   value="{{ old('inscricao_municipal', $fornecedor->inscricao_municipal) }}" 
                                   placeholder="Inscrição municipal">
                            @error('inscricao_municipal')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Site -->
                        <div class="col-md-12">
                            <label for="site" class="form-label">Site</label>
                            <input type="url" 
                                   class="form-control @error('site') is-invalid @enderror" 
                                   id="site" 
                                   name="site" 
                                   value="{{ old('site', $fornecedor->site) }}" 
                                   placeholder="https://www.exemplo.com">
                            @error('site')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Observações -->
                        <div class="col-md-12">
                            <label for="observacoes" class="form-label">Observações</label>
                            <textarea class="form-control @error('observacoes') is-invalid @enderror" 
                                      id="observacoes" 
                                      name="observacoes" 
                                      rows="3" 
                                      placeholder="Informações adicionais sobre o fornecedor">{{ old('observacoes', $fornecedor->observacoes) }}</textarea>
                            @error('observacoes')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" value="1" {{ old('status', $fornecedor->status) ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Fornecedor ativo
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">
                                    <i class="mdi mdi-close"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="mdi mdi-content-save"></i> Atualizar Fornecedor
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
    // Máscara para CNPJ
    const cnpjInput = document.getElementById('cnpj');
    if (cnpjInput) {
        cnpjInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 14) {
                value = value.replace(/^(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5');
                e.target.value = value;
            }
        });
    }

    // Máscara para telefone
    const telefoneInput = document.getElementById('telefone');
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                if (value.length === 11) {
                    value = value.replace(/^(\d{2})(\d{5})(\d{4})$/, '($1) $2-$3');
                } else if (value.length === 10) {
                    value = value.replace(/^(\d{2})(\d{4})(\d{4})$/, '($1) $2-$3');
                }
                e.target.value = value;
            }
        });
    }

    // Máscara para CEP
    const cepInput = document.getElementById('cep');
    if (cepInput) {
        cepInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 8) {
                value = value.replace(/^(\d{5})(\d{3})$/, '$1-$2');
                e.target.value = value;
            }
        });
    }
});
</script>
@endpush
