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
    ///
    /// push the right data to the database
    //$rows_events = [ 0 => [ "ev_loc" => "", "ev_link" => "", "ev_start_time" => "", "ev_end_time" => "", "ev_price" => "" ]];

    $row = $rows_accounts[0];

    $extra_elements['csrf_token'] = GenerateCSRF("profile_management.php" );
    //$extra_elements['select_pic'] = MakeSelect( $fkey = 'acc_id',
    //$value = $row['acc_id'] ,
    //$sql = "select acc_id, acc_prof_pic from accounts where acc_id=". $_GET['acc_id'] );

    //get template
    $template_accounts = file_get_contents("templates/form_profile.html");

    //$template_events = file_get_contents("templates/form_events.html");

    // merge data with templates
    $merge_accounts = MergeViewWithData($template_accounts, $rows_accounts);

    //$merge_events = MergeViewWithData($template_events, $rows_events);

    $merge_accounts = MergeViewWithExtraElements( $merge_accounts, $extra_elements );

    //$merge_events = MergeViewWithExtraElements( $merge_events, $extra_elements );

    $merge_accounts = MergeViewWithErrors( $merge_accounts, $errors );

    //$merge_events = MergeViewWithErrors( $merge_events, $errors );

    $merge_accounts = RemoveEmptyErrorTags( $merge_accounts, $rows_accounts );

    //$merge_events = RemoveEmptyErrorTags( $merge_events, $rows_events );


    print $merge_accounts;
    //print $merge_events;


    ?>





</section>


<?php
//print footer
PrintFooter();
?>


