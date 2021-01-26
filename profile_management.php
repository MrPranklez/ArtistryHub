<?php
require_once 'lib/autoload.php';
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

//print head
PrintHead();
//print navbar
PrintNav();
//print header
PrintHeader();

?>

<!--- vanaf hier column's invoegen --->
<section class="container pt-3 pb-3 bg-dark text-white">
    <h2 class="ml-3">PROFILE MANAGEMENT</h2>
    <?php


    //get the right data from the database
    $rows_accounts =GetData( "select * from accounts where acc_id=" . $_SESSION['user']['acc_id'] );

    $extra_elements['csrf_token'] = GenerateCSRF("profile_management.php" );

    //get template
    $template_accounts = file_get_contents("templates/form_profile.html");

    // merge data with templates
    $merge_accounts = MergeViewWithData($template_accounts, $rows_accounts);
    $merge_accounts = MergeViewWithExtraElements( $merge_accounts, $extra_elements );
    $merge_accounts = MergeViewWithErrors( $merge_accounts, $errors );
    $merge_accounts = RemoveEmptyErrorTags( $merge_accounts, $rows_accounts );


    print $merge_accounts;
    //print $merge_events;


    ?>

</section>


<?php
//print footer
PrintFooter();
?>


