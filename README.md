# 📋 Todo List API - DDD Laravel

Uma API RESTful moderna para gerenciamento de tarefas (Todo List) construída com **Laravel 12** seguindo os princípios de **Domain-Driven Design (DDD)** e **Clean Architecture**.

## 🚀 Sobre o Projeto

Este projeto foi desenvolvido como uma demonstração prática de conceitos avançados de arquitetura de software, aplicando padrões de **Clean Code** e **DDD** em uma aplicação Laravel real. A API oferece funcionalidades completas de autenticação e gerenciamento de tarefas.

### ✨ Características Principais

-   🏗️ **Arquitetura DDD** - Separação clara entre Domain, Application e Infrastructure
-   🔐 **Autenticação JWT** - Utilizando Laravel Sanctum
-   📡 **API RESTful** - Endpoints versionados (v1)
-   📝 **Clean Code** - Código limpo e bem estruturado
-   🔄 **Migrations** - Controle de versão do banco de dados

## 🛠️ Tecnologias Utilizadas

-   **PHP** 8.2+
-   **Laravel** 12.0
-   **Laravel Sanctum** 4.2 (Autenticação API)
-   **MySQL** (Banco de dados)
-   **Laravel Pint** (Code Style)

## 🏗️ Arquitetura DDD

O projeto segue uma estrutura de Domain-Driven Design organizada da seguinte forma:

```
app/
├── Application/        # Casos de uso e serviços de aplicação
│   ├── Todo/
│   └── User/
├── Domain/            # Entidades e regras de negócio
│   ├── Todo/
│   └── User/
├── Http/              # Controllers e Requests (Interface)
│   ├── Controllers/
│   └── Requests/
├── Infrastructure/    # Implementações concretas
│   └── Repositories/
└── Models/           # Eloquent Models (Adaptadores)
```

## 📋 Funcionalidades

### 🔐 Autenticação

-   `POST /api/v1/auth/register` - Registro de usuário
-   `POST /api/v1/auth/login` - Login de usuário

### ✅ Gerenciamento de Tarefas

-   `GET /api/v1/todos` - Listar todas as tarefas do usuário
-   `POST /api/v1/todos` - Criar nova tarefa
-   `GET /api/v1/todos/{id}` - Visualizar tarefa específica
-   `PUT /api/v1/todos/{id}` - Atualizar tarefa
-   `DELETE /api/v1/todos/{id}` - Remover tarefa

## 🚀 Como Executar

### Pré-requisitos

-   PHP 8.2 ou superior
-   Composer
-   MySQL
-   Node.js (opcional, para assets)

### Instalação

1. **Clone o repositório**

    ```bash
    git clone https://github.com/flpdev/todo-ddd-laravel.git
    cd todo-ddd-laravel
    ```

2. **Instale as dependências**

    ```bash
    composer install
    ```

3. **Configure o ambiente**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure o banco de dados**

    Edite o arquivo `.env` com suas credenciais:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel_todo_ddd
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Execute as migrations**

    ```bash
    php artisan migrate
    ```

6. **Inicie o servidor**
    ```bash
    php artisan serve
    ```

A API estará disponível em `http://localhost:8000`

## 📡 Exemplos de Uso da API

### Registro de Usuário

```bash
curl -X POST http://localhost:8000/api/v1/auth/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "João Silva",
    "email": "joao@example.com",
    "password": "password123",
    "password_confirmation": "password123"
  }'
```

### Login

```bash
curl -X POST http://localhost:8000/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "joao@example.com",
    "password": "password123"
  }'
```

### Criar Tarefa

```bash
curl -X POST http://localhost:8000/api/v1/todos \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer {seu_token}" \
  -d '{
    "title": "Estudar DDD",
    "description": "Aprofundar conhecimentos em Domain-Driven Design",
    "completed": false
  }'
```

## 📚 Padrões e Conceitos Aplicados

-   **Domain-Driven Design (DDD)** - Organização do código focada no domínio do negócio
-   **Clean Architecture** - Separação de responsabilidades em camadas
-   **Repository Pattern** - Abstração da camada de dados
-   **Use Cases** - Encapsulamento da lógica de negócio
-   **Dependency Injection** - Inversão de dependências
-   **API Versioning** - Versionamento de endpoints
-   **Token-based Authentication** - Autenticação stateless

## 🎯 Objetivos de Aprendizado

Este projeto demonstra competências em:

-   ✅ Arquitetura de software moderna
-   ✅ Princípios SOLID
-   ✅ Design Patterns
-   ✅ APIs RESTful
-   ✅ Autenticação e autorização
-   ✅ Clean Code

## 📈 Próximas Implementações

-   [ ] Documentação OpenAPI/Swagger
-   [ ] Cache com Redis
-   [ ] Rate Limiting
-   [ ] Logs estruturados
-   [ ] Docker containerization
-   [ ] CI/CD Pipeline

## 🤝 Contribuições

Contribuições são bem-vindas! Sinta-se à vontade para:

1. Fazer um fork do projeto
2. Criar uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abrir um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👨‍💻 Autor

**Felipe Developer**

-   GitHub: [@flpdev](https://github.com/flpdev)

---

⭐ Se este projeto te ajudou de alguma forma, considere dar uma estrela!
