<?
Class Freinds{
    public function getFreinds($mysqli,$id,$db_table){
        $result = $mysqli->query("SELECT * FROM ".$db_table." WHERE id = '$id'");
        return $result;
    }
    public function addFreind($mysqli, $login_freind,$db_table){
        $result = $mysqli->query("SELECT * FROM ".$db_table." WHERE user_login = '$login_freind'");
        $data = mysqli_fetch_assoc($result);
        $id_freind = $data['id'];
        $hash = $_COOKIE['hash'];
        $result = $mysqli->query("SELECT * FROM ".$db_table." WHERE user_hash = '$hash'");
        $data = mysqli_fetch_assoc($result);
        $myId = $data['id'];
        $result = $mysqli->query("INSERT INTO users_relation (id_parent, id_child) VALUES ('$myId','$id_freind')");
    }
    public function deleteFreind($mysqli, $login_freind,$db_table){
        $result = $mysqli->query("SELECT * FROM ".$db_table." WHERE user_login = '$login_freind'");
        $data = mysqli_fetch_assoc($result);
        $id_freind = $data['id'];
        $result = $mysqli->query("DELETE FROM users_relation WHERE id_child = '$id_freind'");
    }
    public function checkFreinds($id,$mysqli){
        $result = $mysqli->query("SELECT * FROM users_relation WHERE id_parent = '$id'");
        return $result;
    }
}