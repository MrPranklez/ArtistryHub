<?php

error_reporting( E_ALL);
ini_set( 'display_errors',1);

require_once "lib/autoload.php";

//head printen
PrintHead();
//print navbar
PrintNav();
?>

<!--- Login Form --->
<div class="container pt-3 pb-3 bg-dark text-white">
<div class='d-flex bg-secondary mt-0 pt-1 pb-1 bgc-'>

    <?php
    //get data
    $data = [ 0 => [ "acc_email" => "", "acc_pass" => "" ]];

    //get template
    $output = file_get_contents("templates/login.html");

    //add extra elements
    $extra_elements['csrf_token'] = GenerateCSRF( "login.php"  );

    //merge
    $output = MergeViewWithData( $output, $data );
    $output = MergeViewWithExtraElements( $output, $extra_elements );

    print $output;
    ?>

</div>
</div>
<!--- hier start de footer --->

<?php
//print footer
PrintFooter();
?>
