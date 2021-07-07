<?php
    include __DIR__ . "/database/db.php";
    include __DIR__ . "/template/User.php";
    function generateCode($length=6) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI";
        $code = "";
        $clen = strlen($chars) - 1;
        while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
        }
        return $code;
    }
    $db_table = "users";
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $user = new User();
    $err = $user->checkdateUser($login,$password,$mysqli,$db_table);
    if(strlen($err)>0){
        echo $err;
    }
    else{
        $hash = md5(generateCode(10));
        $user->addHash($login,$hash,$mysqli,$db_table);
        setcookie("hash", $hash, time()+3600*60*60);
        setcookie("login", $login, time()+3600*60*60);
        echo $err;
    }
?>