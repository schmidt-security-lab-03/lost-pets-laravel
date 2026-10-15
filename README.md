# Laços de Volta

Portal PHP Laravel para consultar e organizar avisos de animais perdidos, encontrados e reencontrados. Interface em português, filtros por cidade, espécie e situação, banco SQLite e exemplos fictícios.

## Funcionalidades

- Consulta pública com busca, filtros e paginação de 12 avisos.
- Detalhe do animal com bairro, cidade, data e características.
- Cadastro, edição, mudança de situação e remoção de avisos.
- Área de edição protegida por HTTP Basic com credenciais de ambiente.
- Formulários com validação, escape de saída e proteção CSRF.

## Executar localmente

Requisitos: PHP 8.3 ou superior, Composer e extensões exigidas pelo Laravel, incluindo PDO SQLite e mbstring. A aplicação usa Laravel 13 e dispensa Node para suas telas atuais.

```sh
composer install
cp .env.example .env
php artisan key:generate
php -r "file_exists('database/database.sqlite') || touch('database/database.sqlite');"
php artisan migrate --seed
php artisan serve
```

No PowerShell, substitua `cp .env.example .env` por `Copy-Item .env.example .env`. Abra http://localhost:8000.

Para habilitar o cadastro e a edição, preencha `PORTAL_EDITOR_USER` e `PORTAL_EDITOR_PASSWORD` somente no arquivo local `.env` ou nas variáveis do ambiente. Não há credenciais padrão. Sem os dois valores, as rotas de edição retornam indisponibilidade; a consulta permanece acessível. Use HTTPS fora do desenvolvimento.

Os exemplos não incluem telefones, endereços particulares, imagens de pessoas ou dados de tutores. Nesta base, o contato com o responsável pelo portal ocorre fora da aplicação. O banco SQLite e `.env` não são versionados.

## Estrutura

- `app/Models/PetReport.php`: dados e situações dos avisos.
- `app/Http/Controllers/PetReportController.php`: consultas e operações.
- `app/Http/Requests`: validação dos formulários.
- `app/Http/Middleware`: autenticação da edição.
- `resources/views/pets`: páginas Blade.
- `database/migrations` e `database/seeders`: estrutura e exemplos fictícios.

## Estado desta entrega

Código inicial preparado sem execução local, pois PHP e Composer não estão instalados no ambiente de autoria. Nenhum teste foi adicionado ou executado. Após instalar as dependências, versione o `composer.lock` produzido para registrar as versões resolvidas.

Base de laboratório, sem hospedagem configurada. Antes de disponibilizar em produção, configure HTTPS, `APP_DEBUG=false`, `APP_KEY`, persistência, credenciais de edição e o processo de moderação. Não foram adicionados workflows nem alteradas configurações de segurança da organização.

## Origem da estrutura

Estrutura inicial derivada de [laravel/laravel, branch 13.x](https://github.com/laravel/laravel/tree/13.x), commit `9ffef3bc4241e3cc333ef267258a404d0d95f194`. Consulte `THIRD_PARTY_NOTICES.md` para atribuição do esqueleto e das dependências.

Referência: [Documentação oficial do Laravel](https://laravel.com/docs/13.x).
