<?php

require_once "lib/autoload.php";

unset($_SESSION['user']);
session_destroy();
session_regenerate_id();

header("Location: login.php?logout=true");