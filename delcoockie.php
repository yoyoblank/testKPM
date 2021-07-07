<?php
    setcookie("login", "" , time() - 3600*24*30*12, "/",null,null,true);
    setcookie("hash", "", time() - 3600*24*30*12, "/",null,null,true);
    header("Location: /"); 
?>