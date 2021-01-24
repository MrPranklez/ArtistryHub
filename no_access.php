<?php

error_reporting( E_ALL);
ini_set( 'display_errors',1);

require_once "lib/autoload.php";

//head printen
PrintHead();
//print navbar
PrintNav();
?>

    <div class="container pt-3 pb-3 bg-dark text-white">
        <div class="bg-secondary pt-1 pb-1">

            <?php
            print "<div class='msgs'>You don't have access, try logging in <a href=login.php>here.</a></div>";
            ?>

        </div>
    </div>

<?php
//print footer
PrintFooter();
?>