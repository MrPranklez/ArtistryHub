<?php
session_start();

$request_uri = explode("/", $_SERVER['REQUEST_URI']);
$app_root = "/" . $request_uri[1] . "/" . $request_uri[2];

require_once "connection_data.php";
require_once "pdo.php";
require_once "html_functions.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";
require_once "access_control.php";

$errors = [];

if ( key_exists( 'errors', $_SESSION ) AND is_array( $_SESSION['errors']) )
{
    $errors = $_SESSION['errors'];
}

//alert messages
$msgs = [];

if ( key_exists( 'msgs', $_SESSION ) AND is_array( $_SESSION['msgs']) )
{
    $msgs = $_SESSION['msgs'];
}

//initialize $old_post
$old_post = [];

if ( key_exists( 'OLD_POST', $_SESSION ) AND is_array( $_SESSION['OLD_POST']) )
{
    $old_post = $_SESSION['OLD_POST'];
}

$_SESSION['msgs'] = [];
$_SESSION['errors'] = [];
$_SESSION['OLD_POST'] = [];