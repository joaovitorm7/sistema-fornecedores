Sistema de Fornecedores

Sistema CRUD completo para gerenciamento de fornecedores, desenvolvido com Laravel e PostgreSQL, com foco em boas práticas, validação de dados e experiência do usuário.

Funcionalidades:
- Cadastro de fornecedores
- Listagem de fornecedores
- Edição de dados
- Exclusão de registros
- Validação de CNPJ e telefone
- Relatório com filtro por nome
- Exportação de relatório em PDF
- Interface com Bootstrap
- Mensagens de feedback ao usuário

Tecnologias Utilizadas:
- PHP 8+
- Laravel
- PostgreSQL
- Bootstrap
- DomPDF

Como Instalar o Projeto:

1 - Clone o repositório:
git clone https://github.com/joaovitorm7/sistema-fornecedores.git

2 - Acesse a pasta do projeto:
cd sistema-fornecedores

3 - Instale as dependências:
composer install

4 - Crie o arquivo .env:
cp .env.example .env

5 - Configure o banco de dados no .env:

Exemplo:
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=seu_banco
DB_USERNAME=postgres
DB_PASSWORD=sua_senha

6 - Gere a chave da aplicação:
php artisan key:generate

7 - Execute as migrations:
php artisan migrate

8 - Como rodar o projeto:
php artisan serve

Depois acesse no navegador:

http://127.0.0.1:8000

9 - Relatório

Acesse:

/relatorio/fornecedores

Funcionalidades:
- Filtro por nome
- Contagem total
- Exportação em PDF

10- Exportação PDF:

No relatório, clique em:

Exportar PDF:
    - O sistema irá gerar e baixar automaticamente o relatório.


Observações:
Certifique-se de que o PostgreSQL está rodando
Verifique se as credenciais do banco estão corretas no .env

Autor:
Desenvolvido por João Vitor Maia Ribeiro

Considerações:
Este projeto foi desenvolvido com foco em aprendizado e demonstração de habilidades para oportunidades de estágio e desenvolvimento web.