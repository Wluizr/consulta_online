# Consulta online
 - Este é um projeto que tem como finalidade registrar as consultas de um paciente com um médico em uma determinada cidade.

## Requisitos
* PHP 8.2 ou superior
* Laravel 11.31
* Composer
* Node.js 20 ou superior

## Como rodar o projeto
Antes de iniciar o projeto, é preciso que o arquivo .env seja preenchido com as informações para o banco de dados.

Acesse o diretório onde se encontra o docker-composer do projeto e execute o seguinte comando:
```
sail up -d
```

Com os containers rodando, execute o migrate para criação do banco de dados:
```
sail artisan migrate
```

Para parar os containers:
```
sail stop
```