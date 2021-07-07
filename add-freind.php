<?php
include __DIR__ . "/database/db.php";
include __DIR__ . "/template/Freinds.php";
$db_table = "users";
$login_freind = $_POST['login'];
$freind = new Freinds();
$freind->addFreind($mysqli,$login_freind,$db_table);
?>