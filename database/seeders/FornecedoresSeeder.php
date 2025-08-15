<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedores;

class FornecedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fornecedores = [
            [
                'nome' => 'Tech Solutions Ltda',
                'email' => 'contato@techsolutions.com.br',
                'telefone' => '(11) 99999-9999',
                'endereco' => 'Rua das Tecnologias, 123 - Vila Madalena',
                'cidade' => 'São Paulo',
                'estado' => 'SP',
                'cep' => '01234-567',
                'cnpj' => '12.345.678/0001-90',
                'inscricao_estadual' => '123456789',
                'inscricao_municipal' => '987654321',
                'site' => 'https://www.techsolutions.com.br',
                'tipo' => 'Fornecedor',
                'observacoes' => 'Fornecedor especializado em equipamentos de informática e tecnologia. Parceiro há mais de 5 anos.',
                'status' => true,
            ],
            [
                'nome' => 'Distribuidora Comercial S.A.',
                'email' => 'vendas@distribuidora.com.br',
                'telefone' => '(21) 88888-8888',
                'endereco' => 'Av. Comercial, 456 - Centro',
                'cidade' => 'Rio de Janeiro',
                'estado' => 'RJ',
                'cep' => '20000-000',
                'cnpj' => '98.765.432/0001-10',
                'inscricao_estadual' => '987654321',
                'inscricao_municipal' => '123456789',
                'site' => 'https://www.distribuidora.com.br',
                'tipo' => 'Distribuidor',
                'observacoes' => 'Distribuidora de produtos diversos para revenda. Atende todo o Sudeste do Brasil.',
                'status' => true,
            ],
            [
                'nome' => 'Fábrica Nacional de Produtos',
                'email' => 'fabricacao@fabricanacional.com.br',
                'telefone' => '(31) 77777-7777',
                'endereco' => 'Rua Industrial, 789 - Distrito Industrial',
                'cidade' => 'Belo Horizonte',
                'estado' => 'MG',
                'cep' => '30000-000',
                'cnpj' => '11.222.333/0001-44',
                'inscricao_estadual' => '111222333',
                'inscricao_municipal' => '333222111',
                'site' => 'https://www.fabricanacional.com.br',
                'tipo' => 'Fabricante',
                'observacoes' => 'Fabricante de produtos industriais e comerciais. Produção própria com controle de qualidade.',
                'status' => true,
            ],
            [
                'nome' => 'Importadora Global Ltda',
                'email' => 'importacao@importadoraglobal.com.br',
                'telefone' => '(41) 66666-6666',
                'endereco' => 'Av. Internacional, 321 - Portão',
                'cidade' => 'Curitiba',
                'estado' => 'PR',
                'cep' => '80000-000',
                'cnpj' => '55.666.777/0001-88',
                'inscricao_estadual' => '555666777',
                'inscricao_municipal' => '777666555',
                'site' => 'https://www.importadoraglobal.com.br',
                'tipo' => 'Importador',
                'observacoes' => 'Importadora de produtos internacionais. Especializada em componentes eletrônicos.',
                'status' => true,
            ]
        ];

        foreach ($fornecedores as $fornecedor) {
            Fornecedores::create($fornecedor);
        }
    }
}
