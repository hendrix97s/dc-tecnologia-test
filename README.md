# Test dc tecnologia

## Versão das tecnolonias utilizadas
- Docker 20.10.21
- Docker-compose 1.29.2
- Node v16.18.0
- Npm 8.19.2
- Composer 2.2.6
- Laravel 9.0


## Instruções para rodar o projeto

 1. Clonar o projeto `git clone git@github.com:hendrix97s/dc-tecnologia-test.git`
 2. Copiar o .env `cp .env.example .env`
 3. Executar o composer `composer install`
 4. Executar o build docker `./vendor/bin/sail build`
 5. Executar o up docker `./vendor/bin/sail up -d`
 6. Executar o migrate `./vendor/bin/sail artisan migrate:fresh --seed`
 7. Executar o npm `./vendor/bin/sail npm install`
 8. Executar o npm `./vendor/bin/sail npm run dev`
 9. Acessar o projeto `http://localhost/`

