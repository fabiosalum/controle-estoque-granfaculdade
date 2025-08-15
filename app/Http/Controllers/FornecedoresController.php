<?php

namespace App\Http\Controllers;

use App\Models\Fornecedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FornecedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fornecedores = Fornecedores::orderBy('nome')->paginate(15);
        return view('fornecedores.listar', compact('fornecedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $estados = $this->getEstados();
        return view('fornecedores.cadastro', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255|unique:fornecedores,email',
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'cep' => 'nullable|string|max:10',
            'cnpj' => [
                'nullable',
                'string',
                'max:18',
                'unique:fornecedores,cnpj',
                'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'
            ],
            'inscricao_estadual' => 'nullable|string|max:20',
            'inscricao_municipal' => 'nullable|string|max:20',
            'site' => 'nullable|url|max:255',
            'observacoes' => 'nullable|string|max:1000',
            'tipo' => 'nullable|string|max:50',
            'status' => 'boolean'
        ], [
            'nome.required' => 'O nome do fornecedor é obrigatório.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.email' => 'Digite um e-mail válido.',
            'email.unique' => 'Este e-mail já está sendo usado por outro fornecedor.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'cnpj.regex' => 'O CNPJ deve estar no formato XX.XXX.XXX/XXXX-XX.',
            'site.url' => 'Digite uma URL válida para o site.',
            'observacoes.max' => 'As observações não podem ter mais de 1000 caracteres.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $fornecedor = Fornecedores::create($request->all());
            
            return redirect()
                ->route('fornecedores.index')
                ->with('success', 'Fornecedor cadastrado com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao cadastrar fornecedor. Tente novamente.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedor = Fornecedores::findOrFail($id);
        return view('fornecedores.visualizar', compact('fornecedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fornecedor = Fornecedores::findOrFail($id);
        $estados = $this->getEstados();
        return view('fornecedores.editar', compact('fornecedor', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedor = Fornecedores::findOrFail($id);
        
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('fornecedores', 'email')->ignore($id)
            ],
            'telefone' => 'nullable|string|max:20',
            'endereco' => 'nullable|string|max:255',
            'cidade' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:2',
            'cep' => 'nullable|string|max:10',
            'cnpj' => [
                'nullable',
                'string',
                'max:18',
                Rule::unique('fornecedores', 'cnpj')->ignore($id),
                'regex:/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/'
            ],
            'inscricao_estadual' => 'nullable|string|max:20',
            'inscricao_municipal' => 'nullable|string|max:20',
            'site' => 'nullable|url|max:255',
            'observacoes' => 'nullable|string|max:1000',
            'tipo' => 'nullable|string|max:50',
            'status' => 'boolean'
        ], [
            'nome.required' => 'O nome do fornecedor é obrigatório.',
            'nome.max' => 'O nome não pode ter mais de 255 caracteres.',
            'email.email' => 'Digite um e-mail válido.',
            'email.unique' => 'Este e-mail já está sendo usado por outro fornecedor.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'cnpj.regex' => 'O CNPJ deve estar no formato XX.XXX.XXX/XXXX-XX.',
            'site.url' => 'Digite uma URL válida para o site.',
            'observacoes.max' => 'As observações não podem ter mais de 1000 caracteres.'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $fornecedor->update($request->all());
            
            return redirect()
                ->route('fornecedores.index')
                ->with('success', 'Fornecedor atualizado com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao atualizar fornecedor. Tente novamente.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $fornecedor = Fornecedores::findOrFail($id);
            $fornecedor->delete();
            
            return redirect()
                ->route('fornecedores.index')
                ->with('success', 'Fornecedor excluído com sucesso!');
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao excluir fornecedor. Tente novamente.');
        }
    }

    /**
     * Altera o status do fornecedor
     */
    public function toggleStatus(string $id)
    {
        try {
            $fornecedor = Fornecedores::findOrFail($id);
            $fornecedor->status = !$fornecedor->status;
            $fornecedor->save();
            
            $status = $fornecedor->status ? 'ativado' : 'desativado';
            
            return redirect()
                ->back()
                ->with('success', "Fornecedor {$status} com sucesso!");
                
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Erro ao alterar status do fornecedor. Tente novamente.');
        }
    }

    /**
     * Retorna lista de estados brasileiros
     */
    private function getEstados()
    {
        return [
            'AC' => 'Acre',
            'AL' => 'Alagoas',
            'AP' => 'Amapá',
            'AM' => 'Amazonas',
            'BA' => 'Bahia',
            'CE' => 'Ceará',
            'DF' => 'Distrito Federal',
            'ES' => 'Espírito Santo',
            'GO' => 'Goiás',
            'MA' => 'Maranhão',
            'MT' => 'Mato Grosso',
            'MS' => 'Mato Grosso do Sul',
            'MG' => 'Minas Gerais',
            'PA' => 'Pará',
            'PB' => 'Paraíba',
            'PR' => 'Paraná',
            'PE' => 'Pernambuco',
            'PI' => 'Piauí',
            'RJ' => 'Rio de Janeiro',
            'RN' => 'Rio Grande do Norte',
            'RS' => 'Rio Grande do Sul',
            'RO' => 'Rondônia',
            'RR' => 'Roraima',
            'SC' => 'Santa Catarina',
            'SP' => 'São Paulo',
            'SE' => 'Sergipe',
            'TO' => 'Tocantins'
        ];
    }
}
