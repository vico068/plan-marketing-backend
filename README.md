![enter image description here](https://www.planmkt.com.br/public/images/logo-plan.png)
# Plan marketing Back End Test!

Esta aplicação foi criada para o processo seletivo da Grupo Plan Marketing.
A aplicação foi feita utilizando o framework laravel  8.0 , a aplicação conta com uma 
api para criar , editar , exluir e visualizar produtos , construida utilizando todas as boas
praticas e conceitos atuais como **S.O.L.I.D** **, CLEAN CODE** , **TEST UNIT** entre outros 


# Primeiros passos

Aqui estara descrito todos os passos para executar a aplicação com excito . 

## 1) Instalação das dependências

Para instalar todas as dependencias necessarias para o projeto execute o seguinte comando:

    composer install

## 2) Instalação de banco de dados via Docker

A aplicação conta com um script **Docker** para subir um container com o banco de dados **MySq**l

    docker-compose up


## 3) Copiando o .env.example
A aplicação conta com um DOT.ENV pré configurado com tudo necessário para a execução. Para copiaro env de exemplo digite o comando :

    cp env.example .env


## 4) Executando as migrations

Para estruturar nosso banco de dados e necessario executar as migrations para isso
execute o comando:

    php artisan migrate

## 5) Executando as seeder

Para popular nosso banco de dados com os dados necessários para rodar a aplicação execute o comando :

    php artisan db:seed


## 6) Opa ! estamos quase  lá 
Para finalmente executar aplicacao execute o comando:

    php artisan serve
   
Nossa já pode ser acessado através do link ao lado: [Acessar aplicacao](http://localhost:8000)
# Documentacao da Api 
![enter image description here](https://i.ibb.co/pZBfnYr/swagger.png)

Toda as rotas foram documentadas atraves da lib SWAGGER para acessar 
clique no link [http://localhost:8000/swagger](http://localhost:8000/swagger)

# Testes 
Para executar os testes use o comando:

    php artisan test


