<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once "autoload.php";

$public_access = true;
SaveFormData();

function SaveFormData()
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

        $table = $pkey = $update = $insert = $where = $str_keys_values = "";

        //get important metadata
        if ( ! key_exists("table", $_POST)) die("Missing table");
        if ( ! key_exists("pkey", $_POST)) die("Missing pkey");

        $table = $_POST['table'];
        $pkey = $_POST['pkey'];

        //validation
        $sending_form_uri = $_SERVER['HTTP_REFERER'];
        CompareWithDatabase( $table, $pkey );

        if ( count($_SESSION['errors']) > 0 )
        {
            $_SESSION['OLD_POST'] = $_POST;
            header( "Location: " . $sending_form_uri ); exit();
        }

        if ( $table == "accounts" ) {
            ValidateUsrPassword($_POST['acc_pass']);
            CheckUniqueUsrEmail($_POST['acc_email']);
            ValidateUsrEmail($_POST['acc_email']);
        }

        //return error to user
        if ( count($_SESSION['errors']) > 0 ) { header( "Location: " . $sending_form_uri ); exit(); }

        //insert or update?
        if ( $_POST["$pkey"] > 0 ) $update = true;
        else $insert = true;

        if ( $update ) $sql = "UPDATE $table SET ";
        if ( $insert ) $sql = "INSERT INTO $table SET ";

        //make key-value string part of SQL statement
        $keys_values = [];

        foreach ( $_POST as $field => $value )
        {
            //skip non-data fields
            if ( in_array( $field, [ 'table', 'pkey', 'afterinsert', 'afterupdate', 'csrf' ] ) ) continue;

            //handle primary key field
            if ( $field == $pkey )
            {
                if ( $update ) $where = " WHERE $pkey = $value ";
                continue;
            }

            if ( $field == "acc_pass" ) //encrypt usr_password
            {
                $value = password_hash( $value, PASSWORD_BCRYPT );
                $keys_values[] = " $field = '$value' " ;
            }
            else //all other data-fields
            {
                $keys_values[] = " $field = '$value' " ;
            }
        }

        $str_keys_values = implode(" , ", $keys_values );

        //extend SQL with key-values
        $sql .= $str_keys_values;

        //extend SQL with WHERE
        $sql .= $where;

        //run SQL
        $result = ExecuteSQL( $sql );

        if ($result AND $table == "accounts"){
            $_SESSION['msgs'][] = "Congrats! You have successfully registered!";
        }
        if ($result AND $table == "projects"){
            $_SESSION['msgs'][] = "Congrats! Project successfully added!";
        }

        //output if not redirected
        print $sql ;
        print "<br>";
        print $result->rowCount() . " records affected";

        //redirect after insert or update
        if ( $insert AND $_POST["afterinsert"] > "" ) header("Location: ../" . $_POST["afterinsert"] );
        if ( $update AND $_POST["afterupdate"] > "" ) header("Location: ../" . $_POST["afterupdate"] );
    }
}