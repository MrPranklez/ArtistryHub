<?php

require_once "lib/autoload.php";

if(!key_exists('acc_id',$_SESSION['user'])){
    GoToNoAccess();
}

unset($_SESSION['user']);
session_destroy();
session_regenerate_id();

header("Location: login.php?logout=true");