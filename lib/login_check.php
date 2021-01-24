<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "autoload.php";

if ( LoginCheck() )
{
    print "Successfully logged in!";
}
else
{
    print "Too bad, something went wrong!";
}

function LoginCheck()
{
    if ( $_SERVER['REQUEST_METHOD'] == "POST" )
    {
        //controle CSRF token
        if ( ! key_exists("csrf", $_POST)) die("Missing CSRF");
        if ( ! hash_equals( $_POST['csrf'], $_SESSION['latest_csrf'] ) ) die("Problem with CSRF");

        $_SESSION['latest_csrf'] = "";

        //sanitization
        $_POST = StripSpaces($_POST);
        $_POST = ConvertSpecialChars($_POST);

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];

        //validation for login form
        if ( true )
        {
            if ( ! key_exists("acc_email", $_POST ) OR strlen($_POST['acc_email']) < 5 )
            {
                $_SESSION['errors']['acc_pass'] = "Please enter a password";
            }
            if ( ! key_exists("acc_pass", $_POST ) OR strlen($_POST['acc_pass']) < 8 )
            {
                $_SESSION['errors']['acc_pass'] = "This password is incorrect";
            }
        }

        //return error to user
        if ( key_exists("errors" , $_SESSION ) AND count($_SESSION['errors']) > 0 )
        {
            $_SESSION['OLD_POST'] = $_POST;
            header( "Location: " . $sending_form_uri ); exit();
        }

        //search user in database
        $email = $_POST['acc_email'];
        $ww = $_POST['acc_pass'];

        $sql = "SELECT * FROM accounts WHERE acc_email='$email' ";
        $data = GetData($sql);

        if ( count($data) > 0 )
        {
            foreach ( $data as $row )
            {
                if ( password_verify( $ww, $row['acc_pass'] ) ) return true;
            }
        }

        return false;
    }
}