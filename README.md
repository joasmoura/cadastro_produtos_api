## Api projeto de cadastro de produto

- Criar arquivo .env
- Copiar os dados do arquivo .env.example e colar no arquivo .env
- Inserir dados do banco de dados DB_DATABASE, DB_USERNAME e DB_PASSWORD
# Rodar
- composer install
- php artisan key:generate
- pap artisan migrate
- php artisan db:seed
- php artisan serve