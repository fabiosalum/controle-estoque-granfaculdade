# 🎯 Sistema de Controle de Estoque

[![Laravel](https://img.shields.io/badge/Laravel-10.x-red.svg)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.1+-blue.svg)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange.svg)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-4.6+-purple.svg)](https://getbootstrap.com)

## 📚 Sobre o Projeto

Este projeto foi desenvolvido como **Trabalho de Conclusão de Curso (TCC)** para o curso de **Análise e Desenvolvimento de Sistemas** da **Faculdade Gran**.

### 🎓 **Objetivos do Projeto:**
- Demonstrar competências técnicas em desenvolvimento web
- Implementar um sistema completo de controle de estoque
- Aplicar conceitos de arquitetura de software e padrões de projeto
- Desenvolver interface responsiva e intuitiva
- Implementar validações robustas e segurança

---

## 🚀 Funcionalidades do Sistema

### 👥 **Módulo de Fornecedores**
- ✅ **CRUD Completo** (Create, Read, Update, Delete)
- ✅ **Validações robustas** com mensagens em português
- ✅ **Máscaras JavaScript** para CNPJ, telefone e CEP
- ✅ **Status ativo/inativo** com toggle
- ✅ **Paginação** na listagem
- ✅ **Relacionamento** com produtos

### 📦 **Módulo de Produtos**
- ✅ **CRUD Completo** com validações
- ✅ **Controle de estoque** com quantidade mínima
- ✅ **Cálculo automático** de margem de lucro
- ✅ **Ajuste de estoque** (entrada/saída)
- ✅ **Status ativo/inativo** com toggle
- ✅ **Alertas** de estoque baixo e sem estoque
- ✅ **Relacionamento** com fornecedores

### 🎨 **Dashboard Interativo**
- ✅ **Cards funcionais** com estatísticas em tempo real
- ✅ **Contadores** de fornecedores e produtos
- ✅ **Valor total** em estoque
- ✅ **Alertas visuais** para produtos com estoque baixo
- ✅ **Ações rápidas** para cadastros
- ✅ **Links diretos** para módulos

---

## 🛠️ Tecnologias Utilizadas

### **Backend:**
- **Laravel 10** - Framework PHP robusto e elegante
- **PHP 8.1+** - Linguagem de programação moderna
- **MySQL 8.0+** - Banco de dados relacional
- **Eloquent ORM** - Mapeamento objeto-relacional

### **Frontend:**
- **Bootstrap 4.6+** - Framework CSS responsivo
- **Material Design Icons** - Ícones consistentes
- **JavaScript ES6+** - Validações e interações
- **HTML5** - Estrutura semântica

### **Arquitetura:**
- **MVC Pattern** - Model-View-Controller
- **Repository Pattern** - Abstração de dados
- **Clean Code** - Código limpo e legível
- **SOLID Principles** - Princípios de design

---

## 📋 Pré-requisitos

### **Sistema:**
- Windows 10/11, macOS ou Linux
- PHP 8.1 ou superior
- Composer 2.0 ou superior
- MySQL 8.0 ou superior
- Apache/Nginx (ou servidor embutido do PHP)

### **Extensões PHP:**
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

---

## 🚀 Instalação e Configuração

### **1. Clone o Repositório**
```bash
git clone https://github.com/seu-usuario/controle-estoque.git
cd controle-estoque
```

### **2. Instale as Dependências**
```bash
composer install
```

### **3. Configure o Ambiente**
```bash
# Copie o arquivo de ambiente
cp .env.example .env

# Gere a chave da aplicação
php artisan key:generate
```

### **4. Configure o Banco de Dados**
Edite o arquivo `.env` com suas configurações:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=controle_estoque
DB_USERNAME=root
DB_PASSWORD=sua_senha
```

### **5. Execute as Migrações e Seeders**
```bash
# Crie as tabelas no banco
php artisan migrate:fresh --seed

# Ou use o comando personalizado
php artisan demo:seed
```

### **6. Inicie o Servidor**
```bash
php artisan serve
```

O sistema estará disponível em: `http://localhost:8000`

---

## 📊 Dados de Demonstração

### **4 Fornecedores Criados:**
1. **Tech Solutions Ltda** - Fornecedor de equipamentos
2. **Distribuidora Comercial S.A.** - Distribuidora de produtos
3. **Fábrica Nacional de Produtos** - Fabricante industrial
4. **Importadora Global Ltda** - Importadora de componentes

### **10 Produtos Criados:**
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

---

## 🎯 Como Usar o Sistema

### **Acessos Principais:**
- **Dashboard:** `/` - Visão geral com estatísticas
- **Fornecedores:** `/fornecedores` - Gerenciar fornecedores
- **Produtos:** `/produtos` - Gerenciar produtos

### **Funcionalidades Disponíveis:**
- ✅ **Cadastrar** novos fornecedores e produtos
- ✅ **Listar** com paginação e filtros
- ✅ **Editar** informações existentes
- ✅ **Visualizar** detalhes completos
- ✅ **Ajustar estoque** de produtos
- ✅ **Ativar/desativar** registros
- ✅ **Excluir** com confirmação

---

## 🔧 Comandos Artisan Disponíveis

### **Seeders:**
```bash
# Executar todos os seeders
php artisan db:seed

# Executar seeders específicos
php artisan db:seed --class=FornecedoresSeeder
php artisan db:seed --class=ProdutosSeeder

# Comando personalizado para dados de demonstração
php artisan demo:seed
```

### **Manutenção:**
```bash
# Limpar caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Otimizar aplicação
php artisan optimize
```

---

## 📁 Estrutura do Projeto

```
controle-estoque/
├── app/
│   ├── Http/Controllers/
│   │   ├── FornecedoresController.php
│   │   └── ProdutosController.php
│   ├── Models/
│   │   ├── Fornecedores.php
│   │   └── Produtos.php
│   └── Console/Commands/
│       └── SeedDemoData.php
├── database/
│   ├── migrations/
│   │   ├── create_fornecedores_table.php
│   │   └── create_produtos_table.php
│   └── seeders/
│       ├── FornecedoresSeeder.php
│       ├── ProdutosSeeder.php
│       └── DatabaseSeeder.php
├── resources/views/
│   ├── dashboard/
│   ├── fornecedores/
│   ├── produtos/
│   └── layouts/
├── routes/
│   └── web.php
└── README.md
```

---

## 🔒 Segurança e Validações

### **Validações Implementadas:**
- ✅ **Campos obrigatórios** com mensagens personalizadas
- ✅ **Formato de dados** (email, CNPJ, telefone, CEP)
- ✅ **Unicidade** de códigos e CNPJs
- ✅ **Relacionamentos** válidos
- ✅ **Valores numéricos** positivos
- ✅ **Tamanhos máximos** para campos de texto

### **Medidas de Segurança:**
- ✅ **CSRF Protection** em todos os formulários
- ✅ **Validação server-side** robusta
- ✅ **Sanitização** de dados de entrada
- ✅ **Confirmações** para ações destrutivas
- ✅ **Tratamento de erros** com try-catch

---

## 📱 Responsividade e UX

### **Interface Responsiva:**
- ✅ **Bootstrap 4** para layout adaptativo
- ✅ **Grid system** responsivo
- ✅ **Componentes mobile-friendly**
- ✅ **Navegação otimizada** para touch

### **Experiência do Usuário:**
- ✅ **Feedback visual** para todas as ações
- ✅ **Mensagens de sucesso/erro** claras
- ✅ **Confirmações** para ações importantes
- ✅ **Navegação intuitiva** com breadcrumbs
- ✅ **Ícones consistentes** (Material Design)

---

## 🎓 Sobre o Curso

### **Instituição:** Faculdade Gran
### **Curso:** Análise e Desenvolvimento de Sistemas
### **Modalidade:** Tecnólogo
### **Duração:** 2 anos
### **Tipo:** Trabalho de Conclusão de Curso (TCC)

### **Competências Desenvolvidas:**
- ✅ **Desenvolvimento Web** com Laravel
- ✅ **Banco de Dados** MySQL
- ✅ **Frontend** responsivo com Bootstrap
- ✅ **Arquitetura de Software** MVC
- ✅ **Padrões de Projeto** e Clean Code
- ✅ **Validações** e segurança
- ✅ **Versionamento** com Git
- ✅ **Documentação** técnica

---

## 🚀 Próximos Passos

### **Funcionalidades Futuras:**
- 🔲 **Sistema de usuários** e autenticação
- 🔲 **Relatórios** e gráficos
- 🔲 **Histórico de movimentações** de estoque
- 🔲 **Notificações** por email
- 🔲 **API REST** para integração
- 🔲 **Backup automático** do banco
- 🔲 **Logs de auditoria** detalhados
- 🔲 **Exportação** para Excel/PDF

### **Melhorias Técnicas:**
- 🔲 **Testes automatizados** (PHPUnit)
- 🔲 **Cache Redis** para performance
- 🔲 **Queue jobs** para tarefas pesadas
- 🔲 **API rate limiting**
- 🔲 **Documentação API** (Swagger)

---

## 👨‍💻 Desenvolvedor

**Nome:** [Seu Nome]  
**Curso:** Análise e Desenvolvimento de Sistemas  
**Instituição:** Faculdade Gran  
**Ano:** 2024  

### **Contato:**
- 📧 **Email:** [seu-email@exemplo.com]
- 🔗 **LinkedIn:** [linkedin.com/in/seu-perfil]
- 🐙 **GitHub:** [github.com/seu-usuario]

---

## 📄 Licença

Este projeto foi desenvolvido como trabalho acadêmico para o curso de Análise e Desenvolvimento de Sistemas da Faculdade Gran.

---

## 🙏 Agradecimentos

- **Faculdade Gran** pela oportunidade de aprendizado
- **Professores** pela orientação e conhecimento compartilhado
- **Colegas de curso** pelo apoio e colaboração
- **Comunidade Laravel** pela excelente documentação e ferramentas

---

## ⭐ Se este projeto te ajudou, considere dar uma estrela!

---

**Desenvolvido com ❤️ para conclusão do curso de Análise e Desenvolvimento de Sistemas**
