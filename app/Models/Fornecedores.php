<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedores extends Model
{
    use HasFactory;

    protected $table = 'fornecedores';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep',
        'cnpj',
        'inscricao_estadual',
        'inscricao_municipal',
        'site',
        'observacoes',
        'status',
        'tipo'
    ];

    protected $casts = [
        'status' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Scope para fornecedores ativos
     */
    public function scopeAtivos($query)
    {
        return $query->where('status', true);
    }

    /**
     * Scope para fornecedores inativos
     */
    public function scopeInativos($query)
    {
        return $query->where('status', false);
    }

    /**
     * Formata o CNPJ para exibição
     */
    public function getCnpjFormatadoAttribute()
    {
        if (!$this->cnpj) return null;
        
        $cnpj = preg_replace('/[^0-9]/', '', $this->cnpj);
        return substr($cnpj, 0, 2) . '.' . 
               substr($cnpj, 2, 3) . '.' . 
               substr($cnpj, 5, 3) . '/' . 
               substr($cnpj, 8, 4) . '-' . 
               substr($cnpj, 12, 2);
    }

    /**
     * Formata o telefone para exibição
     */
    public function getTelefoneFormatadoAttribute()
    {
        if (!$this->telefone) return null;
        
        $telefone = preg_replace('/[^0-9]/', '', $this->telefone);
        
        if (strlen($telefone) === 11) {
            return '(' . substr($telefone, 0, 2) . ') ' . 
                   substr($telefone, 2, 5) . '-' . 
                   substr($telefone, 7, 4);
        }
        
        if (strlen($telefone) === 10) {
            return '(' . substr($telefone, 0, 2) . ') ' . 
                   substr($telefone, 2, 4) . '-' . 
                   substr($telefone, 6, 4);
        }
        
        return $this->telefone;
    }

    /**
     * Formata o CEP para exibição
     */
    public function getCepFormatadoAttribute()
    {
        if (!$this->cep) return null;
        
        $cep = preg_replace('/[^0-9]/', '', $this->cep);
        return substr($cep, 0, 5) . '-' . substr($cep, 5, 3);
    }
}
