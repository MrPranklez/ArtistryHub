<?php

error_reporting( E_ALL);
ini_set( 'display_errors',1);

$public_access = true;
require_once 'lib/autoload.php';

//head printen
PrintHead();

//print navbar
PrintNav();


?>
<?php
// account data merge with template, user banner is included
//get data


//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//                                  AANPASSEN IN DE TOEKOMST
//                          OOK OP JE PROFIEL GERAKEN MET JE LOGIN ID
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if ( ! is_numeric( $_GET['acc_id'])) die("Ongeldig argument " . $_GET['acc_id'] . " opgegeven");


    //get data
    $dataAccounts = GetData( "select * from accounts where acc_id =" . $_GET['acc_id'] );
    $dataProjects = GetData( "select * from projects where proj_acc_id =" . $_GET['acc_id'] );
    $dataEvents = GetData( "select * from events where ev_acc_id = ". $_GET['acc_id'] );

    //get template
    $templateAccounts = file_get_contents("templates/header_profile.html");
    $templateProjects = file_get_contents("templates/tbodyprojects_profile.html");
    $templateEvents = file_get_contents("templates/tbodyevents_profile.html");

    //merge
    $outputAccounts = MergeViewWithData( $templateAccounts, $dataAccounts );
    $outputProjects = MergeViewWithData( $templateProjects, $dataProjects );
    $outputEvents = MergeViewWithData( $templateEvents, $dataEvents );


    print $outputAccounts;
    Printnavbarproject();
    print $outputProjects;
    ?>

        </tbody> <!-- kan niet mee in template gestoken worden door herhaling van templates -->
    </table>

    <?php
    Printnavbarevents();
    print $outputEvents;
    ?>
        </tbody>
    </table>
</section>


<?php
//print footer
PrintFooter();

?>