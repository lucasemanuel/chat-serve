## Backend


## Install <a name = "install"></a>

Instalar Dependências
```
composer install
```

Fazer cópia do arquivo `.env.example` e nomear de `.env`
```
cp .env.example .env
```

Gerar chave
```
php artisan key:generate
```

Gerar secret do JWT
```
php artisan jwt:secret
```

Configurar o banco de dados, crie previamente o banco para essa aplicação e set essas variáveis no arquivo `.evn`
Recomendo usar mysql
```
DB_CONNECTION=[mysql, pgsql, sqlite...]
DB_HOST=[Ip do Host do Banco]
DB_PORT=[Porta do Banco]
DB_DATABASE=[Nome do Banco]
DB_USERNAME=[Usuário do Banco]
DB_PASSWORD=[Password do Banco]
```

Configurar variáveis pusher para o real-time
```
BROADCAST_DRIVER=pusher

PUSHER_APP_ID=[Id (Fica a seu critério)]
PUSHER_APP_KEY=[Key (Fica a seu critério)]
PUSHER_APP_SECRET=[Secret (Fica a seu critério)]
PUSHER_APP_HOST=[Ip do Host]
```

Executar as migração

```
php artisan migrate
```

Iniciar o servidor

```
php artisan serve
```

Startando Socket (em outra instância do terminal)

```
php artisan websocket:serve
```

