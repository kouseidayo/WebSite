<?php
    session_start;

    if($_SESSION['isLogin']){
        header('Location: ./LoginPage.html?message='.urlencode('ログインしてください'));
        exit();
    }
?>

<!DOCTYPE html>
<html>
  
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <link rel="stylesheet" href="css/form_style.css">
    <title>お問い合わせ</title>

</head>

<body>
    test
</html>           