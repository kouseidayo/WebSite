<?php
$salt = 'kosei1211';
$password = password_hash($salt.'satoyama1234', PASSWORD_DEFAULT);

$pdo = new PDO('mysql:dbname=test;host=127.0.0.1;charset=utf8','root', 'kosei1211');
$qry = $pdo->prepare(
    'INSERT INTO administrator(username,password) VALUES(:username,:password)');
    $qry->execute(array(
    ':username' => 'satoyama',
    ':password' => $password,
  ));