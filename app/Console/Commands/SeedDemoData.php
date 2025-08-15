<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeedDemoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:seed {--fresh : Executar migrate:fresh antes de popular}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Popula o banco de dados com dados de demonstração';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🎯 Iniciando população do banco de dados com dados de demonstração...');

        if ($this->option('fresh')) {
            $this->info('🔄 Executando migrate:fresh...');
            $this->call('migrate:fresh');
        }

        $this->info('👥 Criando fornecedores...');
        $this->call('db:seed', ['--class' => 'FornecedoresSeeder']);

        $this->info('📦 Criando produtos...');
        $this->call('db:seed', ['--class' => 'ProdutosSeeder']);

        $this->info('✅ Dados de demonstração criados com sucesso!');
        $this->info('');
        $this->info('📊 Resumo dos dados criados:');
        $this->info('   • 4 fornecedores');
        $this->info('   • 10 produtos');
        $this->info('');
        $this->info('🚀 Você pode agora acessar o sistema e visualizar os dados!');
    }
}
