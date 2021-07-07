$( document ).ready(function() {
    $("#btn-aut").click(function(){
        var login = $("#btn-aut").parents().children("#login").val();
        var password = $("#btn-aut").parents().children("#password").val();
        $.ajax({
            url: '/aut-user.php',
            method: 'post',
            data: {login: login, password: password},
            success: function(data){
                if(data === ""){
                document.location.href='../page.php';
                }
                else{
                    alert(data);
                    document.location.href='../index.php';
                }                
            }
        });
    });
    $("input").keyup(function(event){
        if(event.keyCode == 13){
            $("#btn-aut").click();
        }
    });
});