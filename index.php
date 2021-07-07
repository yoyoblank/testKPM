<?
include __DIR__ . "/database/db.php";
include __DIR__ . "/template/header.php";
?>
<div class="form__aut">
        <div class="form__aut-zag">
            Авторизация
        </div>
        <form>
            <input id="login" type="text" name="login" placeholder="Логин" required="required">
            <input id="password" type="password" name="password" placeholder="Пароль" required="required">
            <button id="btn-aut">Войти</button>
        </form>
        <a href="reg.php">Зергистрироваться</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script> 
<script src="js/aut-jquery.js"></script>
</body>
</html>
