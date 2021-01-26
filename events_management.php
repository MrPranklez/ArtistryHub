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
    <h2 class="ml-3">EVENTS MANAGEMENT</h2>
    <?php

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //                              ENKEL IN DE PAGINA GERAKEN MET LOGIN ID
    //                                  ZODAT DE JUISTE GEGEVENS ZICHTBAAR ZIJN VAN JE ACC_ID
    //
    //                         VOEG EEN ADD BUTTON TOE OM GEGEVENS TOE TE VOEGEN
    //                              DE SAFEBUTTON VERVANGT HIER GEGEWOON GEGEVENS
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!



    if ( count($old_post) > 0 )
    {
        $rows_events = [ 0 => [
            "ev_acc_id" => $old_post['ev_acc_id'],
            "ev_loc" => $old_post['ev_loc'],
            "ev_typ_id" => $old_post['ev_typ_id'],
            "ev_link" => $old_post['ev_link'],
            "ev_price" => $old_post['ev_price']
        ]
        ];
    } else $rows_events = [ 0 => [ "ev_acc_id" => "", "ev_typ_id" => "", "ev_loc" => "", "ev_link" => "", "ev_start_time" => "", "ev_end_time" => "", "ev_price" => "" ]];

    $data = GetData( "select * from events where ev_acc_id=". $_GET['acc_id']);
    $row = $data[0];

    $extra_elements['csrf_token'] = GenerateCSRF("events_management.php" );
    $extra_elements['select_acc_id'] = $_SESSION['user']['acc_id'];
    $extra_elements['select_event'] = MakeSelect( $fkey = 'ev_typ_id',
        $value = $row['ev_typ_id'] ,
        $sql = "select typ_id, typ_desc from event_types" );
  ;


    //get template
    $template_events = file_get_contents("templates/form_events.html");


    // merge data with templates
    $merge_events = MergeViewWithData($template_events, $rows_events);
    $merge_events = MergeViewWithExtraElements( $merge_events, $extra_elements );
    $merge_events = MergeViewWithErrors( $merge_events, $errors );
    $merge_events = RemoveEmptyErrorTags( $merge_events, $rows_events );


    print $merge_events;



    ?>





</section>


<?php
//print footer
PrintFooter();
?>


