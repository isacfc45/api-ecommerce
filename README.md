<p align="center">
  <a href="https://github.com/seu-usuario/ecommerce-api/actions">
    <img src="https://github.com/seu-usuario/ecommerce-api/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

# E-commerce API

Esta é uma API RESTful desenvolvida com Laravel para um sistema de e-commerce. A API permite o gerenciamento de usuários, produtos, carrinho de compras, pedidos e pagamentos fictícios.

## Tecnologias Utilizadas

-   **PHP 8+**
-   **Laravel 10+**
-   **MySQL**
-   **JWT Authentication (Sanctum)**
-   **Repository & Service Pattern**
-   **Swagger (para documentação da API)**

## Instalação

```sh
# Clone o repositório
git clone https://github.com/seu-usuario/ecommerce-api.git
cd ecommerce-api

# Instale as dependências
composer install

# Configure o ambiente
cp .env.example .env
php artisan key:generate

# Configure o banco de dados no arquivo .env e rode as migrations
php artisan migrate --seed

# Inicie o servidor
php artisan serve
```

## Rotas Principais

### Autenticação

```sh
POST /api/register # Cadastro de usuário
POST /api/login    # Autenticação de usuário
```

### Produtos

```sh
GET /api/products        # Listar produtos
POST /api/products       # Criar um novo produto
GET /api/products/{id}   # Detalhes de um produto
```

### Carrinho

```sh
POST /api/cart        # Adicionar produto ao carrinho
GET /api/cart         # Listar itens do carrinho
DELETE /api/cart/{id} # Remover item do carrinho
```

### Pedidos

```sh
POST /api/orders        # Criar um pedido
GET /api/orders         # Listar pedidos do usuário
GET /api/orders/{id}    # Detalhes de um pedido
```

### Pagamentos

```sh
POST /api/payments    # Processar pagamento fictício
```

## Autenticação

A API usa **Laravel Sanctum** para autenticação via token. Após o login, inclua o token no cabeçalho Authorization:

```sh
Authorization: Bearer {token}
```

## Testes

Para rodar os testes, use o comando:

```sh
php artisan test
```

## Documentação

A API inclui documentação gerada com Swagger.

Para visualizar, rode a API e acesse:

```sh
http://127.0.0.1:8000/api/documentation
```

## Licença

Este projeto está sob a licença MIT. Sinta-se à vontade para usá-lo e modificá-lo.
