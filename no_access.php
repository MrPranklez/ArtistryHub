<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

$public_access = true;
require_once "lib/autoload.php";

PrintHead();
PrintJumbo( $title = "No Access" );
?>

<div class="container">
    <div class="row">

        <?php
        print "<div class='msgs'>You don''t hav access, try <a href=login.php>logging in</a></div>";
        ?>

    </div>
</div>

</body>
</html>