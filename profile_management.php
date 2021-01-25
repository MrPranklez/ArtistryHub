<?php
require_once 'lib/autoload.php';

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

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //                              ENKEL IN DE PAGINA GERAKEN MET LOGIN ID
    //                                  ZODAT DE JUISTE GEGEVENS ZICHTBAAR ZIJN VAN JE ACC_ID
    //
    //                         VOEG EEN ADD BUTTON TOE OM GEGEVENS TOE TE VOEGEN
    //                              DE SAFEBUTTON VERVANGT HIER GEGEWOON GEGEVENS
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    if ( ! is_numeric( $_GET['acc_id']) ) die("Ongeldig argument " . $_GET['acc_id'] . " opgegeven");

    //get the right data from the database
    $rows_accounts = GetData( "select * from accounts where acc_id =" . $_GET['acc_id'] );///// tijdelijk op 1 gezet om te testen

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


