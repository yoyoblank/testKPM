<?
include __DIR__ . "/database/db.php";
include __DIR__ . "/template/header.php";
include __DIR__ . "/template/User.php";
include __DIR__ . "/template/Freinds.php";
$db_table = "users";
if (isset($_COOKIE['login'])) {
    $login = $_COOKIE["login"];
    $sql = "SELECT * from users WHERE user_login = '$login'";
    $res = mysqli_query($mysqli, $sql);
    $data = mysqli_fetch_assoc($res);
    if($data['user_hash'] == $_COOKIE["hash"]){?>
        <b>Здравствуйте, </b> <?php print $data['user_login'] ?> 
        <button class="btn btn-danger" onclick="window.location.href = 'delcoockie.php'">Выйти</button>
    <?php
    }
    else{
    echo "<script>alert(\"Вам недоступна данная страница , авторизуйтесь... Переадресация\");</script>"; 
    echo '<script>window.location.href = "index.php";</script>';
    }   
    ?>
    <table class="table">
        <thead>
            <tr>
            <th>#</th>
            <th>Логин</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $users = new User();
            $freinds = new Freinds();
            $result = $users->getAllUsers($db_table,$mysqli);
            $row = 1;
            while($data = mysqli_fetch_assoc($result)){
                $check = 0;
                $id = $users->getMyID($mysqli,$db_table);
                $res = $freinds->checkFreinds($id,$mysqli);
                if(mysqli_num_rows($res) > 0){
                    while($datas = mysqli_fetch_assoc($res)){
                        if ($data['id'] === $datas['id_child']){
                            $check = 1;
                        }
                    }
                }
                if($data['user_login'] !== $_COOKIE['login'] && $check === 0){
                ?>
                <tr>
                <th scope="row"><? echo $row ?></th>
                <td class="user_login"><? echo $data['user_login'] ?></td>
                <td><button class="btn btn-success btn-add">Добавить в избранное</button></td>
                </tr>
                <?
                $row++;
                }
            }
        ?>
        </tbody>
    </table>
    <table class="table">
        <div class="zag">
            ИЗБРАННЫЕ КОНТАКТЫ
        </div>
        <thead>
            <tr>
            <th>#</th>
            <th>Логин</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = $freinds->checkFreinds($id,$mysqli);
            if(mysqli_num_rows($res) > 0){
                $row = 1;
                while($data = mysqli_fetch_assoc($res)){
                    $result = $freinds->getFreinds($mysqli,$data['id_child'],$db_table);
                    while($datas = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                        <th scope="row"><? echo $row ?></th>
                        <td class="user_login"><? echo $datas['user_login'] ?></td>
                        <td><button class="btn btn-dark btn-delete">Убрать из избранных</button></td>
                        </tr>
                        <?
                        $row ++;
                    }
                }
            }
            ?>  
        </tbody>
    </table>
<?
}
else{
    echo "<script>alert(\"Вам недоступна данная страница , авторизуйтесь... Переадресация\");</script>"; 
    echo '<script>window.location.href = "index.php";</script>';
} 
?>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script> 
<script src="js/page-jquery.js"></script>
</body>
</html>