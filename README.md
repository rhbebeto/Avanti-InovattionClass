# Sistema de Gerenciamento de Estoque - Teste Técnico Avanti

Projeto desenvolvido como parte do teste técnico para o programa **Innovation Class** da Avanti. O objetivo é um sistema web funcional e organizado para gerenciamento de estoque de produtos com autenticação de usuários.

## 📋 Funcionalidades Implementadas

O sistema foi desenvolvido para cumprir todos os requisitos obrigatórios e inclui os seguintes recursos:

* **Autenticação de Usuários:**
    * Tela de login centralizada com validação de credenciais.
    * Mensagens de erro para logins inválidos.
    * Sessão de usuário segura e funcionalidade de Logout.

* **Gerenciamento de Produtos (CRUD Completo):**
    * **Dashboard Principal:** Exibe uma tabela com todos os produtos cadastrados, com busca funcional por nome.
    * **Adicionar Produto:** Abre um formulário em modal para inserir um novo produto, incluindo a opção de upload de imagem.
    * **Editar Produto:** Abre um formulário em modal pré-preenchido com os dados do item. Apenas o usuário que criou o produto pode editá-lo.
    * **Excluir Produto:** Abre um modal de confirmação antes da remoção. Apenas o usuário que criou o produto pode excluí-lo.

* **Design e UX:**
    * **Interface Moderna:** Layout limpo e profissional, seguindo as diretrizes de design.
    * **Operações em Modais:** Todas as ações de CRUD são realizadas em modais, proporcionando uma experiência de usuário fluida e sem recarregamentos de página.
    * **Design Responsivo:** A interface se adapta para garantir uma boa usabilidade em dispositivos móveis.

## 💻 Tecnologias Utilizadas

O projeto foi construído utilizando a stack definida nos requisitos técnicos[cite: 6]:

* **Front-end:** HTML, CSS, JavaScript 
* **Back-end:** PHP 
* **Banco de Dados:** MySQL 

## 🚀 Como Executar o Projeto

Para rodar este projeto localmente, siga os passos abaixo.

### Pré-requisitos

* Um ambiente de servidor local (XAMPP, WAMP, etc.) com PHP e MySQL.
* Um gerenciador de banco de dados (phpMyAdmin, DBeaver, etc.).

### Passos para Instalação

1.  **Clone o repositório:**
    ```bash
        git clone [https://github.com/rhbebeto/Avanti-InovattionClass.git](https://github.com/rhbebeto/Avanti-InovattionClass.git)

    ```

2.  **Banco de Dados:**
    * Crie um novo banco de dados no seu MySQL chamado `estoque`.
    * Importe o arquivo `sql/schema.sql` para criar as tabelas `usuarios` e `produtos` com a estrutura correta.

3.  **Configuração:**
    * Abra o arquivo `app/core/Database.php`.
    * Altere as credenciais (`$host`, `$db_name`, `$username`, `$password`) para corresponder à sua configuração local do MySQL.

4.  **Crie um Usuário de Teste:**
    * No seu terminal, na pasta raiz do projeto, execute o script `cria_user.php` para criar um usuário padrão.
    ```bash
    php cria_user.php
    ```
    * Isso criará um usuário com as seguintes credenciais: **Usuário:** `admin` / **Senha:** `admin`, para criar um diferente usuario basta alterar essa varíaveis.
    * *Opcional: Por segurança, você pode deletar o arquivo `cria_user.php` após a execução.*

5.  **Inicie o Servidor:**
    * Navegue até a pasta raiz do projeto no seu terminal.
    * Execute o servidor embutido do PHP apontando para a pasta `public`:
    ```bash
    php -S localhost:8000 -t public
    ```

6.  **Acesse a Aplicação:**
    * Abra seu navegador e acesse: `http://localhost:8000/login`

---

Desenvolvido por **Roberto Henrique Duarte**