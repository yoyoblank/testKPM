<?
include __DIR__ . "/database/db.php";
include __DIR__ . "/template/header.php";
?>
<div class="form__aut">
        <div class="form__aut-zag">
            Регистрация
        </div>
        <div class="form-reg">
            <input id="login" type="text" placeholder="Введите Логин" required>
            <input id='password' type="password"  placeholder="Введите Пароль" required>
            <input id="passwordcheck" type="password"  placeholder="Повторите Пароль" required>
            <input id="email" type="email"  placeholder="Введите email" required>
            <button id="btn-reg">Зарегистрироваться</button>
        </div>
        <a href="index.php">Уже есть аккаунт?</a>
    </div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script> 
<script src="js/reg-jquery.js"></script>
</body>
</html>
