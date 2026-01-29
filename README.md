# Desafio Técnico

Sistema de Gestão para Mercado.

## Ferramentas

#### Backend

- php - 8.1.29
- composer - 2.7.6
- postgres

#### Frontend

- vue - 3.4.18
- npm - 9.6.7
- typescript - 4.5.4
- quasar - 2.16.0

## Banco de Dados

- Execute o pg_restore do arquivo dump.sql , que está na raiz do projeto

## Backend

- Acesse api/main/config/database.php e altere as informações
- Execute dentro da pasta api:

```bash
composer install
composer serve
```

#### OBS: O comando "composer serve" roda o servidor nativo do php com o comando php -S localhost:8000 que foi solicitado

## Frontend

- Execute dentro da pasta app:

```bash
npm install
npm run dev
```
