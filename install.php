<?php
    include("create_account.php");
    if (!file_exists("db"))
        mkdir("db");
	$admin = array("login" => "admin", "email" => "admin@admin.com", "passwd" => hash("whirlpool", "admin"), "lvl" => 1);
    $tab[] = $admin;
    file_put_contents("db/users", serialize($tab));    
?>