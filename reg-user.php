<?php
    include __DIR__ . "/database/db.php";
    include __DIR__ . "/template/User.php";
    $db_table = "users";
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $password = $_POST['password'];
    $passwordcheck = $_POST['passwordcheck'];
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
    $user = new User();
    $err = $user->checkdateValidation($login,$password,$passwordcheck,$email,$mysqli,$db_table);
    if(count($err) == 0){
        $user->addUser($login,$password,$email,$mysqli,$db_table);
        echo "Вы успешно зарегистрировались";
    }
    else{
        foreach($err AS $error)
        {
            echo "$error. \r\n";
        }
    }
?>