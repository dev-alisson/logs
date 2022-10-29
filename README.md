# Gerenciador de Logs

### Sistema de gerenciamento de logs desenvolvido com laravel 9.x

<br/>

## Requisitos

- PHP >= 7.4
- Composer
- MySQL

<br/>

## Instalação

- Faça o download do repositório
- Acesse a aplicação no seu editor de código favorito
- No terminal, execute o comando [ composer install ] para instalar as dependências do projeto
- Acesse uma ferramenta de gerenciamento de base de dados e defina uma base de dados com o nome 'logs'
- Ainda no terminal, execute o comando [ php artisan migrate ] para instalar a base de dados
- Feito a instalação do banco de dados, execute o comando [ php artisan serve ] para iniciar a aplicação

<br/>

## Base de dados:

Na raiz do projeto deixarei o arquivo database.sql para facilitar no processo de testes, pois já conta com registros de usuários fictícios

<br/>

## Acesso:

Também foi implementado um sistema de cadastro de usuário e autenticação, onde para acessar vc poderá se cadastrar com qualquer e-mail FAKE e assim poder efetuar login. Se você importou o arquivo database.sql, você poderá acessar com o usuário o usuário e senha abaixo.

e-mail: alissonpereira1993@gmail.com <br/>
senha: password

<br/>

## Guia de utilização:

<br/>

Acesse a pasta [ <strong>./storage</strong> ] que se encontra na raiz do projeto e dentro dela acesse a pasta [ <strong>tmp</strong> ]. Dentro dessa pasta, você encontrará 10 arquivos de logs.txt, utilize esses arquivos para faz uploads dentro da aplicação e assim poder popular a base de dados de logs.

<strong>

    ./storage/tmp
    
</strong>

<br/>

Utilizei o arquivo de logs que continha 100.000 logs e dividi esse arquivo em outros 10 arquivo logs.txt igualmente, ficando assim 10 arquivos cada um com 10.000 logs. Essa divisão de logs foi necessária para que vcs pudessem testar a aplicação sem precisar reajustar as configurações do PHP pois para que fosse possível subir uma grande quantidade de logs de uma só vez seria preciso uma configuração específica de ambiente PHP.

<strong>

    De qualquer forma, você poderá subir os 10 arquivos de logs.txt um por vez e ter da mesma forma 100.000 logs ao final das importações.
    
</strong>
