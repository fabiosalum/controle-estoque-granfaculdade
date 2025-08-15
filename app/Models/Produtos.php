<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'codigo',
        'categoria',
        'preco_custo',
        'preco_venda',
        'quantidade_estoque',
        'quantidade_minima',
        'unidade_medida',
        'fornecedor_id',
        'status',
        'observacoes'
    ];

    protected $casts = [
        'preco_custo' => 'decimal:2',
        'preco_venda' => 'decimal:2',
        'quantidade_estoque' => 'integer',
        'quantidade_minima' => 'integer',
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Relacionamento com fornecedor
     */
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedores::class, 'fornecedor_id');
    }

    /**
     * Scope para produtos ativos
     */
    public function scopeAtivos($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope para produtos inativos
     */
    public function scopeInativos($query)
    {
        return $query->where('status', false);
    }

    /**
     * Scope para produtos com estoque baixo
     */
    public function scopeEstoqueBaixo($query)
    {
        return $query->where('quantidade_estoque', '<=', 'quantidade_minima');
    }

    /**
     * Scope para produtos sem estoque
     */
    public function scopeSemEstoque($query)
    {
        return $query->where('quantidade_estoque', 0);
    }

    /**
     * Calcula a margem de lucro
     */
    public function getMargemLucroAttribute()
    {
        if ($this->preco_custo > 0) {
            return (($this->preco_venda - $this->preco_custo) / $this->preco_custo) * 100;
        }
        return 0;
    }

    /**
     * Formata o preço de custo para exibição
     */
    public function getPrecoCustoFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->preco_custo, 2, ',', '.');
    }

    /**
     * Formata o preço de venda para exibição
     */
    public function getPrecoVendaFormatadoAttribute()
    {
        return 'R$ ' . number_format($this->preco_venda, 2, ',', '.');
    }

    /**
     * Verifica se o produto está com estoque baixo
     */
    public function getEstoqueBaixoAttribute()
    {
        return $this->quantidade_estoque <= $this->quantidade_minima;
    }

    /**
     * Verifica se o produto está sem estoque
     */
    public function getSemEstoqueAttribute()
    {
        return $this->quantidade_estoque == 0;
    }
}
