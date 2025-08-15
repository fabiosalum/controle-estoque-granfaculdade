<?php

namespace App\Http\Controllers;

use App\Models\Produtos;
use App\Models\Fornecedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = Produtos::with('fornecedor')
            ->orderBy('nome')
            ->paginate(15);
        return view('produtos.listar', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fornecedores = Fornecedores::ativos()->orderBy('nome')->get();
        $categorias = $this->getCategorias();
        $unidadesMedida = $this->getUnidadesMedida();
        return view('produtos.cadastro', compact('fornecedores', 'categorias', 'unidadesMedida'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'codigo' => 'required|string|max:50|unique:produtos,codigo',
            'categoria' => 'required|string|max:100',
            'preco_custo' => 'required|numeric|min:0|max:999999.99',
            'preco_venda' => 'required|numeric|min:0|max:999999.99',
            'quantidade_estoque' => 'required|integer|min:0',
            'quantidade_minima' => 'required|integer|min:0',
            'unidade_medida' => 'required|string|max:50',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'observacoes' => 'nullable|string|max:1000',
            'status' => 'boolean'
        ], [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'codigo.required' => 'O código do produto é obrigatório.',
            'codigo.unique' => 'Este código já está sendo usado por outro produto.',
            'codigo.max' => 'O código não pode ter mais de 50 caracteres.',
            'categoria.required' => 'A categoria é obrigatória.',
            'preco_custo.required' => 'O preço de custo é obrigatório.',
            'preco_custo.numeric' => 'O preço de custo deve ser um número.',
            'preco_custo.min' => 'O preço de custo não pode ser negativo.',
            'preco_venda.required' => 'O preço de venda é obrigatório.',
            'preco_venda.numeric' => 'O preço de venda deve ser um número.',
            'preco_venda.min' => 'O preço de venda não pode ser negativo.',
            'quantidade_estoque.required' => 'A quantidade em estoque é obrigatória.',
            'quantidade_estoque.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade_estoque.min' => 'A quantidade não pode ser negativa.',
            'quantidade_minima.required' => 'A quantidade mínima é obrigatória.',
            'quantidade_minima.integer' => 'A quantidade mínima deve ser um número inteiro.',
            'quantidade_minima.min' => 'A quantidade mínima não pode ser negativa.',
            'unidade_medida.required' => 'A unidade de medida é obrigatória.',
            'fornecedor_id.required' => 'O fornecedor é obrigatório.',
            'fornecedor_id.exists' => 'O fornecedor selecionado não existe.',
            'descricao.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'observacoes.max' => 'As observações não podem ter mais de 1000 caracteres.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $produto = Produtos::create($request->all());
            
            return redirect()
                ->route('produtos.index')
                ->with('success', 'Produto cadastrado com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao cadastrar produto. Tente novamente.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produtos::with('fornecedor')->findOrFail($id);
        return view('produtos.visualizar', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produto = Produtos::findOrFail($id);
        $fornecedores = Fornecedores::ativos()->orderBy('nome')->get();
        $categorias = $this->getCategorias();
        $unidadesMedida = $this->getUnidadesMedida();
        return view('produtos.editar', compact('produto', 'fornecedores', 'categorias', 'unidadesMedida'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produto = Produtos::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:1000',
            'codigo' => [
                'required',
                'string',
                'max:50',
                Rule::unique('produtos', 'codigo')->ignore($id)
            ],
            'categoria' => 'required|string|max:100',
            'preco_custo' => 'required|numeric|min:0|max:999999.99',
            'preco_venda' => 'required|numeric|min:0|max:999999.99',
            'quantidade_estoque' => 'required|integer|min:0',
            'quantidade_minima' => 'required|integer|min:0',
            'unidade_medida' => 'required|string|max:50',
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'observacoes' => 'nullable|string|max:1000',
            'status' => 'boolean'
        ], [
            'nome.required' => 'O nome do produto é obrigatório.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'codigo.required' => 'O código do produto é obrigatório.',
            'codigo.unique' => 'Este código já está sendo usado por outro produto.',
            'codigo.max' => 'O código não pode ter mais de 50 caracteres.',
            'categoria.required' => 'A categoria é obrigatória.',
            'preco_custo.required' => 'O preço de custo é obrigatório.',
            'preco_custo.numeric' => 'O preço de custo deve ser um número.',
            'preco_custo.min' => 'O preço de custo não pode ser negativo.',
            'preco_venda.required' => 'O preço de venda é obrigatório.',
            'preco_venda.numeric' => 'O preço de venda deve ser um número.',
            'preco_venda.min' => 'O preço de venda não pode ser negativo.',
            'quantidade_estoque.required' => 'A quantidade em estoque é obrigatória.',
            'quantidade_estoque.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade_estoque.min' => 'A quantidade não pode ser negativa.',
            'quantidade_minima.required' => 'A quantidade mínima é obrigatória.',
            'quantidade_minima.integer' => 'A quantidade mínima deve ser um número inteiro.',
            'quantidade_minima.min' => 'A quantidade mínima não pode ser negativa.',
            'unidade_medida.required' => 'A unidade de medida é obrigatória.',
            'fornecedor_id.required' => 'O fornecedor é obrigatório.',
            'fornecedor_id.exists' => 'O fornecedor selecionado não existe.',
            'descricao.max' => 'A descrição não pode ter mais de 1000 caracteres.',
            'observacoes.max' => 'As observações não podem ter mais de 1000 caracteres.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $produto->update($request->all());
            
            return redirect()
                ->route('produtos.index')
                ->with('success', 'Produto atualizado com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao atualizar produto. Tente novamente.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produto = Produtos::findOrFail($id);
            $produto->delete();
            
            return redirect()
                ->route('produtos.index')
                ->with('success', 'Produto excluído com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir produto. Tente novamente.');
        }
    }

    /**
     * Altera o status do produto
     */
    public function toggleStatus(string $id)
    {
        try {
            $produto = Produtos::findOrFail($id);
            $produto->status = !$produto->status;
            $produto->save();
            
            $status = $produto->status ? 'ativado' : 'desativado';
            
            return redirect()
                ->back()
                ->with('success', "Produto {$status} com sucesso!");
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao alterar status do produto. Tente novamente.');
        }
    }

    /**
     * Ajusta o estoque do produto
     */
    public function ajustarEstoque(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'tipo_ajuste' => 'required|in:entrada,saida',
            'quantidade' => 'required|integer|min:1',
            'motivo' => 'required|string|max:255'
        ], [
            'tipo_ajuste.required' => 'O tipo de ajuste é obrigatório.',
            'tipo_ajuste.in' => 'O tipo de ajuste deve ser entrada ou saída.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser maior que zero.',
            'motivo.required' => 'O motivo do ajuste é obrigatório.',
            'motivo.max' => 'O motivo não pode ter mais de 255 caracteres.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $produto = Produtos::findOrFail($id);
            
            if ($request->tipo_ajuste === 'entrada') {
                $produto->quantidade_estoque += $request->quantidade;
            } else {
                if ($produto->quantidade_estoque < $request->quantidade) {
                    return redirect()
                        ->back()
                        ->with('error', 'Quantidade insuficiente em estoque para esta saída.');
                }
                $produto->quantidade_estoque -= $request->quantidade;
            }
            
            $produto->save();
            
            $tipo = $request->tipo_ajuste === 'entrada' ? 'adicionada' : 'removida';
            
            return redirect()
                ->back()
                ->with('success', "Quantidade {$tipo} com sucesso! Estoque atual: {$produto->quantidade_estoque}");
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao ajustar estoque. Tente novamente.');
        }
    }

    /**
     * Retorna lista de categorias de produtos
     */
    private function getCategorias()
    {
        return [
            'Eletrônicos' => 'Eletrônicos',
            'Periféricos' => 'Periféricos',
            'Monitores' => 'Monitores',
            'Impressoras' => 'Impressoras',
            'Armazenamento' => 'Armazenamento',
            'Memória' => 'Memória',
            'Placas de Vídeo' => 'Placas de Vídeo',
            'Fontes' => 'Fontes',
            'Processadores' => 'Processadores',
            'Placas-mãe' => 'Placas-mãe',
            'Gabinetes' => 'Gabinetes',
            'Coolers' => 'Coolers',
            'Redes' => 'Redes',
            'Áudio' => 'Áudio',
            'Outros' => 'Outros'
        ];
    }

    /**
     * Retorna lista de unidades de medida
     */
    private function getUnidadesMedida()
    {
        return [
            'Unidade' => 'Unidade',
            'Peça' => 'Peça',
            'Kit' => 'Kit',
            'Pacote' => 'Pacote',
            'Caixa' => 'Caixa',
            'Metro' => 'Metro',
            'Quilograma' => 'Quilograma',
            'Litro' => 'Litro',
            'Par' => 'Par',
            'Conjunto' => 'Conjunto'
        ];
    }
}
