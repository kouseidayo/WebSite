<?php

// $_POST['username'];
// $_POST['password'];
session_start();

$Login = new LoginManage();
$Login->SetUserName($_POST['username']);
$Login->SetPassWord($_POST['password']);
$Login->RunSQL();

$result = $Login->GetResult();


if($result['result']){
    $_SESSION['isLogin'] = TRUE;
    header('Location: ./messageList.php');
    exit();
}else{
    $_SESSION['isLogin'] = FALSE;
    header('Location: ./LoginPage.html?message='.urlencode($result['message']));
    exit();
}


class LoginManage {

    // property
    public $username;
    public $password;

    public $query;
    public $result;
    public $return_message;

    // constructor
    public function __construct() {
        $pdo = new PDO('mysql:dbname=test;host=127.0.0.1;charset=utf8','root', 'kosei1211');
        $SQL = 'SELECT * FROM administrator WHERE username = :username'; // WHERE句の条件を修正
        $this->query = $pdo->prepare($SQL);

        $this->result = FALSE;
    }

    // method
    public function SetUserName($username) {
        $this->username = $username;
    }

    public function SetPassWord($password){
        $salt = 'kosei1211';
        // $this->password = password_hash($salt.$password, PASSWORD_DEFAULT);
        $this->password = $salt.$password;
    }

    //passwordの検証
    public function RunSQL(){
        $this->query->execute(array(
            ':username' => $this->username
        ));
        $qry_results = $this->query->fetchAll();
        if(empty($qry_results)){
            $this->return_message = 'ユーザーが見つかりません'; // 行末のセミコロンを追加
        } else {
            foreach($qry_results as $qry_result){
                if(password_verify($this->password, $qry_result['password'])){ 
                    $this->result = TRUE;
                    $this->return_message = 'successful';
                }
            }
        }
    }

    public function GetResult(){
        if($this->result == FALSE and empty($this->return_message)){
            $this->return_message = '正しいパスワードを入力してください'; // 行末のセミコロンを追加
        }
        $return_data = array('result' => $this->result, 'message' => $this->return_message); // ハイフンを矢印に修正
        return $return_data;
    }

}
