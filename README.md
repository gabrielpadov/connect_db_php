# connect_db_php
Singleton Conexão db MySQL com PHP

Objetivo: entender aplicação de uma classe sigleton para conexão em banco de dados MySQL utilzando PHP.

O Padrão Singleton tem como definição garantir que uma classe tenha apenas uma instância de si mesma e que forneça um ponto global de acesso a ela.

Arquivo "conn_1.php"
Utiliza a extensão MYSQL_CONNECT, método menos indicado para conexão. Versões 5.5 ou superior do PHP exigem PDO ou mysqli para realizar conexões a bancos MySQL.
Compatibilidade: PHP 4, 5.2 5.3 e 5.4

Arquivo "conn_2.php"
Utiliza a extensão PDO, método mais indicado para conexão, pois é considerado mais seguro.
Compatibilidade: PHP 5.2, 5.3, 5.4, 5.5, 5.6 e 7.0
