<?php
    session_start();

    if($_SESSION['isLogin'] != TRUE){
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
    <table>
        <th>
            <p>名前</p>
        </th>
        <th>
            <p>電話番号</p>
        </th>
        <th>
            <p>メールアドレス</p>
        </th>
        <th>
            <p>内容</p>
        </th>

        <?php

        $pdo = new PDO('mysql:dbname=test;host=127.0.0.1;charset=utf8','root', 'kosei1211');
        $qry = $pdo->prepare(
            'SELECT * FROM message');
        $qry->execute();
        $results = $qry->fetchAll();
        foreach($results as $result){
            echo "<tr>";
                echo "<td>".htmlspecialchars($result['name'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($result['TEL'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($result['email'], ENT_QUOTES, 'UTF-8')."</td>";
                echo "<td>".htmlspecialchars($result['text'], ENT_QUOTES, 'UTF-8')."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>           