<?php

    define('HOST', '127.0.0.1');
    define('USER', 'root');
    define('PASS', '');
    define('BASE', 'imobiliaria');

    $mysqli = new MySQLI(HOST, USER, PASS, BASE) or die ("Nao foi possivel conectar-se ao banco de dados");
?>