# Configurações:

## Pré-requisitos:
- PHP
- MySQL
- Composer
- node

## Passo a passo

### - Criar uma cópia do arquivo ".env.example" chamada ".env"
    - cp .env.example .env


### - Configurar o banco de dados no arquivo ".env"
    - alterar informações:
        - DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=api_crud_todo
          DB_USERNAME=root
          DB_PASSWORD=


### - Instalar depedências com npm:
    - npm install

### - Instalar depedências com composer:
    - composer install

### - Gerar chave com o artisan:
    - php artisan key:generate

