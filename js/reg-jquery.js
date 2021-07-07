$( document ).ready(function() {
    $("#btn-reg").click(function(){
        var login = $("#btn-reg").parents().children("#login").val();
        var password = $("#btn-reg").parents().children("#password").val();
        var passwordcheck = $("#btn-reg").parents().children("#passwordcheck").val();
        var email = $("#btn-reg").parents().children("#email").val();
        $.ajax({
            url: '/reg-user.php',
            method: 'post',
            data: {login: login, password: password, passwordcheck: passwordcheck, email: email},
            success: function(data){
                alert(data);
                if(data == "Вы успешно зарегистрировались"){
                    document.location.href='../index.php';
                }
                else{
                    document.location.href='../reg.php';
                }
            }
        });
    });
    $("input").keyup(function(event){
        if(event.keyCode == 13){
            $("#btn-reg").click();
        }
    });
});