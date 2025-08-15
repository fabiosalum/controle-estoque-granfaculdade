# Seeders de Dados de Demonstração

Este projeto inclui seeders para popular o banco de dados com dados de demonstração realistas.

## 📊 Dados Incluídos

### Fornecedores (4 registros)
- **Tech Solutions Ltda** - Fornecedor de equipamentos de informática
- **Distribuidora Comercial S.A.** - Distribuidora de produtos diversos
- **Fábrica Nacional de Produtos** - Fabricante de produtos industriais
- **Importadora Global Ltda** - Importadora de componentes eletrônicos

### Produtos (10 registros)
- Notebook Dell Inspiron 15
- Mouse Gamer Logitech G502
- Teclado Mecânico Corsair K70
- Monitor LG 24" Full HD
- Impressora HP LaserJet Pro
- Webcam Logitech C920
- SSD Samsung 500GB
- Memória RAM Kingston 8GB DDR4
- Placa de Vídeo NVIDIA GTX 1660
- Fonte Corsair 550W 80 Plus Bronze

## 🚀 Como Executar

### Opção 1: Comando Personalizado (Recomendado)
```bash
# Executar apenas os seeders
php artisan demo:seed

# Executar migrate:fresh + seeders
php artisan demo:seed --fresh
```

### Opção 2: Comandos Padrão do Laravel
```bash
# Executar todos os seeders
php artisan db:seed

# Executar seeders específicos
php artisan db:seed --class=FornecedoresSeeder
php artisan db:seed --class=ProdutosSeeder
```

### Opção 3: Comando de Migração + Seed
```bash
# Recriar banco e popular com dados
php artisan migrate:fresh --seed
```

## 🔧 Configuração

### Pré-requisitos
- Banco de dados configurado no `.env`
- Migrações executadas
- Modelos configurados corretamente

### Estrutura do Banco
Os seeders dependem das seguintes tabelas:
- `fornecedores` - Criada pela migração `2025_08_15_003512_create_fornecedores_table.php`
- `produtos` - Criada pela migração `2025_08_15_003520_create_produtos_table.php`

## 📝 Personalização

### Adicionar Novos Fornecedores
Edite o arquivo `database/seeders/FornecedoresSeeder.php` e adicione novos registros no array `$fornecedores`.

### Adicionar Novos Produtos
Edite o arquivo `database/seeders/ProdutosSeeder.php` e adicione novos registros no array `$produtos`.

### Modificar Dados Existentes
Altere os valores nos arrays dos seeders conforme necessário.

## 🎯 Relacionamentos

Os produtos estão vinculados aos fornecedores através do campo `fornecedor_id`:
- Produtos 1-3: Tech Solutions Ltda (ID: 1)
- Produtos 4-5, 10: Distribuidora Comercial S.A. (ID: 2)
- Produtos 6-7: Fábrica Nacional de Produtos (ID: 3)
- Produtos 8-9: Importadora Global Ltda (ID: 4)

## ⚠️ Importante

- **Nunca execute seeders em produção** sem revisar os dados
- Os seeders incluem dados fictícios para demonstração
- Sempre faça backup antes de executar `migrate:fresh`
- Os CNPJs e dados de contato são fictícios

## 🐛 Solução de Problemas

### Erro de Chave Estrangeira
Certifique-se de que as migrações foram executadas na ordem correta:
1. `create_fornecedores_table.php`
2. `create_produtos_table.php`

### Erro de Campos Obrigatórios
Verifique se os modelos têm os campos corretos no `$fillable` e se as migrações estão atualizadas.

### Dados Duplicados
Use `migrate:fresh` para limpar o banco antes de executar os seeders novamente.
