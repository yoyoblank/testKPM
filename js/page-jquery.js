$( document ).ready(function() {
    var btn_add = document.getElementsByClassName("btn-add");
    var btn_delete = document.getElementsByClassName("btn-delete");
    Array.prototype.forEach.call(btn_add,function(child) {
        $(child).click(function(){
            var login = $(child).parent().parent().children(".user_login").text();
            $.ajax({
                url: '/add-freind.php',
                method: 'post',
                data: {login: login},
                success: function(){
                    document.location.href='../page.php';
                }
            });
        });
    });
    Array.prototype.forEach.call(btn_delete,function(child) {
        $(child).click(function(){
            var login = $(child).parent().parent().children(".user_login").text();
            $.ajax({
                url: '/delete-freind.php',
                method: 'post',
                data: {login: login},
                success: function(){
                    document.location.href='../page.php';
                }
            });
        });
    });
});