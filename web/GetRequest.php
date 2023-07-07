<?php
    $name = $_REQUEST('name');
    $TEL = $_REQUEST('TEL');
    $email = $_REQUEST('email');
    $text = $_REQUEST('text');

    $pdo = new PDO('mysql:dbname=test;host=127.0.0.1;charset=utf8','root', 'kosei1211');
    $qry = $pdo->prepare(
        'INSERT INTO message(name,TEL,email,text) VALUES(:name,:TEL,:email,:text)');
    $qry->execute(array(
        ':name' => $name,
        ':TEL' => $TEL,
        ':email' => $email,
        ':text' => $text
    ));

  