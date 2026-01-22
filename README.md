# SwitchGames - Backend

O SwitchGames é uma plataforma de reviews de jogos desenvolvida em Laravel 10. O sistema permite que usuários autenticados busquem informações sobre jogos através da API externa TheGamesDB, visualizem detalhes e registrem suas próprias avaliações (reviews) com notas e comentários.

## Funcionalidades

*   Autenticação de Usuários: Sistema completo de login e registro via Laravel Breeze.
*   Integração com API Externa: Consumo de dados em tempo real da API TheGamesDB.
*   Sistema de Reviews: Usuários podem criar, visualizar e gerenciar suas avaliações de jogos.
*   Arquitetura Limpa: Uso de Services para isolar a lógica de negócio e Form Requests para validação robusta de dados.
*   Interface Blade: Frontend integrado utilizando o motor de templates Blade do Laravel.

## Tecnologias Utilizadas

*   Framework: Laravel 10.x
*   Linguagem: PHP 8.1+
*   Banco de Dados: MySQL / PostgreSQL
*   Autenticação: Laravel Breeze / Sanctum
*   HTTP Client: Guzzle (para consumo da API externa)

## Instalação e Configuração

Siga os passos abaixo para rodar o projeto localmente:

### 1. Clonar o Repositório
```bash
git clone https://github.com/brunoPP29/game-reviews-backend.git
cd game-reviews-backend
```

### 2. Instalar Dependências
```bash
composer install
npm install && npm run dev
```

### 3. Configurar o Ambiente (.env)
Copie o arquivo de exemplo e configure suas credenciais:
```bash
cp .env.example .env
```

No arquivo .env, configure o banco de dados e a sua chave da API:
```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=switchGames
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha

# Chave Privada da API TheGamesDB
API_KEY=sua_chave_privada_aqui
```

### 4. Gerar Chave da Aplicação e Migrar
```bash
php artisan key:generate
php artisan migrate
```

### 5. Iniciar o Servidor
```bash
php artisan serve
```
Acesse em: http://127.0.0.1:8000

## Estrutura de Pastas Relevante

*   app/Http/Controllers: Gerenciamento das rotas e fluxo de dados.
*   app/Http/Services: Lógica de integração com a API externa e regras de negócio de reviews.
*   app/Http/Requests: Validação de formulários (StoreReviewRequest).
*   app/Models: Definição dos modelos User e Review com seus respectivos relacionamentos.
*   resources/views: Templates Blade para renderização das páginas.

## Licença

Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

---
Desenvolvido por brunoPP29 (https://github.com/brunoPP29)
