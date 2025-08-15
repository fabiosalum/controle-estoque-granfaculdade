<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produtos;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produtos = [
            [
                'nome' => 'Notebook Dell Inspiron 15',
                'descricao' => 'Notebook Dell Inspiron 15 polegadas, Intel Core i5, 8GB RAM, 256GB SSD',
                'codigo' => 'NB-DELL-001',
                'categoria' => 'Eletrônicos',
                'preco_custo' => 2500.00,
                'preco_venda' => 3200.00,
                'quantidade_estoque' => 15,
                'quantidade_minima' => 5,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 1, // Tech Solutions
                'status' => true,
                'observacoes' => 'Produto com garantia de 12 meses'
            ],
            [
                'nome' => 'Mouse Gamer Logitech G502',
                'descricao' => 'Mouse gamer com sensor óptico de alta precisão, 11 botões programáveis',
                'codigo' => 'MOU-LOG-002',
                'categoria' => 'Periféricos',
                'preco_custo' => 120.00,
                'preco_venda' => 180.00,
                'quantidade_estoque' => 45,
                'quantidade_minima' => 10,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 1, // Tech Solutions
                'status' => true,
                'observacoes' => 'Mouse com RGB personalizável'
            ],
            [
                'nome' => 'Teclado Mecânico Corsair K70',
                'descricao' => 'Teclado mecânico com switches Cherry MX Red, retroiluminação RGB',
                'codigo' => 'TEC-COR-003',
                'categoria' => 'Periféricos',
                'preco_custo' => 350.00,
                'preco_venda' => 480.00,
                'quantidade_estoque' => 25,
                'quantidade_minima' => 8,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 1, // Tech Solutions
                'status' => true,
                'observacoes' => 'Teclado com teclas de mídia dedicadas'
            ],
            [
                'nome' => 'Monitor LG 24" Full HD',
                'descricao' => 'Monitor LG 24 polegadas, resolução 1920x1080, painel IPS',
                'codigo' => 'MON-LG-004',
                'categoria' => 'Monitores',
                'preco_custo' => 450.00,
                'preco_venda' => 620.00,
                'quantidade_estoque' => 30,
                'quantidade_minima' => 12,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 2, // Distribuidora Comercial
                'status' => true,
                'observacoes' => 'Monitor com design ultrafino'
            ],
            [
                'nome' => 'Impressora HP LaserJet Pro',
                'descricao' => 'Impressora laser monocromática, velocidade de 20 ppm, WiFi',
                'codigo' => 'IMP-HP-005',
                'categoria' => 'Impressoras',
                'preco_custo' => 680.00,
                'preco_venda' => 890.00,
                'quantidade_estoque' => 18,
                'quantidade_minima' => 6,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 2, // Distribuidora Comercial
                'status' => true,
                'observacoes' => 'Impressora com tampa de entrada automática'
            ],
            [
                'nome' => 'Webcam Logitech C920',
                'descricao' => 'Webcam Full HD 1080p, autofoco, microfone integrado',
                'codigo' => 'WEB-LOG-006',
                'categoria' => 'Periféricos',
                'preco_custo' => 180.00,
                'preco_venda' => 250.00,
                'quantidade_estoque' => 35,
                'quantidade_minima' => 15,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 3, // Fábrica Nacional
                'status' => true,
                'observacoes' => 'Ideal para reuniões online e streaming'
            ],
            [
                'nome' => 'SSD Samsung 500GB',
                'descricao' => 'SSD Samsung 500GB, leitura 560MB/s, escrita 510MB/s',
                'codigo' => 'SSD-SAM-007',
                'categoria' => 'Armazenamento',
                'preco_custo' => 220.00,
                'preco_venda' => 320.00,
                'quantidade_estoque' => 50,
                'quantidade_minima' => 20,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 3, // Fábrica Nacional
                'status' => true,
                'observacoes' => 'SSD com tecnologia V-NAND'
            ],
            [
                'nome' => 'Memória RAM Kingston 8GB DDR4',
                'descricao' => 'Memória RAM Kingston 8GB DDR4, 2666MHz, CL19',
                'codigo' => 'RAM-KIN-008',
                'categoria' => 'Memória',
                'preco_custo' => 95.00,
                'preco_venda' => 140.00,
                'quantidade_estoque' => 60,
                'quantidade_minima' => 25,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 4, // Importadora Global
                'status' => true,
                'observacoes' => 'Memória com dissipador de calor'
            ],
            [
                'nome' => 'Placa de Vídeo NVIDIA GTX 1660',
                'descricao' => 'Placa de vídeo NVIDIA GTX 1660, 6GB GDDR5, 1408 CUDA cores',
                'codigo' => 'GPU-NVI-009',
                'categoria' => 'Placas de Vídeo',
                'preco_custo' => 1200.00,
                'preco_venda' => 1650.00,
                'quantidade_estoque' => 12,
                'quantidade_minima' => 4,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 4, // Importadora Global
                'status' => true,
                'observacoes' => 'Ideal para jogos em 1080p'
            ],
            [
                'nome' => 'Fonte Corsair 550W 80 Plus Bronze',
                'descricao' => 'Fonte de alimentação Corsair 550W, certificação 80 Plus Bronze',
                'codigo' => 'FON-COR-010',
                'categoria' => 'Fontes',
                'preco_custo' => 280.00,
                'preco_venda' => 380.00,
                'quantidade_estoque' => 28,
                'quantidade_minima' => 10,
                'unidade_medida' => 'Unidade',
                'fornecedor_id' => 2, // Distribuidora Comercial
                'status' => true,
                'observacoes' => 'Fonte modular para melhor organização dos cabos'
            ]
        ];

        foreach ($produtos as $produto) {
            Produtos::create($produto);
        }
    }
}
