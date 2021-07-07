<?
Class User{
    public function addUser($login,$password,$email,$mysqli,$db_table){
        $password = md5($password."dlfgsdgdfh12354");
        $result = $mysqli->query("INSERT INTO ".$db_table." (user_login, user_password, user_mail) VALUES ('$login','$password','$email')");
    }
    public function checkdateUser($login,$password,$mysqli,$db_table){
        $result = $mysqli->query("SELECT * FROM ".$db_table." WHERE user_login = '$login'");
        $data = mysqli_fetch_assoc($result);
        $row = mysqli_num_rows($result);
        if($row === 0){
            return "Пользователя с таким логином не существует";
        }
        else{
            $password = md5($password."dlfgsdgdfh12354");
            if($password === $data['user_password']){
                return "";
            }
            else{
                return "Введен неверный пароль";
            }
        }
    }
    public function addHash($login,$hash,$mysqli,$db_table){
        $result = $mysqli->query("UPDATE ".$db_table." SET user_hash='".$hash."' WHERE user_login = '$login'");
    }
    public function checkdateValidation($login,$password,$passwordcheck,$email,$mysqli,$db_table){
        $err = [];
        if(!preg_match('/^[a-zA-Z0-9]+$/',$login))
        {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
        if(strlen($login) < 6 or strlen($login) > 30)
        {
            $err[] = "Логин должен быть не меньше 6-х символов и не больше 30";
        }
        if(strlen($password) < 8 or strlen($password) > 30)
        {
            $err[] = "Пароль должен быть не меньше 8-х символов и не больше 30, и может состоять только из букв английского алфавита и цифр";
        }
        if(!preg_match('/^[a-zA-Z0-9]+$/',$password))
        {
            $err[] = "Логин может состоять только из букв английского алфавита и цифр";
        }
        if(!preg_match('/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/',$email))
        {
            $err[] = "Введите корректный mail";
        }
        if($password != $passwordcheck)
        {
            $err[] = "Пароли не совпадают";
        }
        $sql = "SELECT id from ".$db_table." WHERE user_login = '$login'";
        $res = mysqli_query($mysqli, $sql);
        if(mysqli_num_rows($res) > 0)
        {
            $err[] = "Пользователь с таким логином уже существует в базе данных";
        }
        return $err;
    }
    public function getAllUsers($db_table,$mysqli){
        $result = $mysqli->query("SELECT * FROM ".$db_table."");
        return $result;
    }
    public function getMyID($mysqli,$db_table){
        $hash = $_COOKIE['hash'];
        $result = $mysqli->query("SELECT * FROM ".$db_table." WHERE user_hash = '$hash'");
        $data = mysqli_fetch_assoc($result);
        return $data['id'];
    }
}
?>