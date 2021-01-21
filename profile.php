<?php
require_once 'lib/autoload.php';
//head printen
PrintHead();
?>

<body>
<?php
//print navbar
PrintNav();


?>
<?php
// account data merge with template, user banner is included
//get data


//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//                                  AANPASSEN IN DE TOEKOMST
//                          OP JE PROFIEL GERAKEN MET JE LOGIN ID
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if ( ! is_numeric( $_GET['acc_id']) ) die("Ongeldig argument " . $_GET['acc_id'] . " opgegeven");

$data = GetData( "select * from accounts where acc_id =" . $_GET['acc_id'] );

//get template
$template = file_get_contents("templates/header_profile.html");

//merge
$output = MergeViewWithData( $template, $data );
print $output;
?>

        <!--- appart omgegevens te kunnen herhalen via databank --->


        <?php
        Printnavbarproject();
        //get data

        $data = GetData( "select * from projects where proj_acc_id =" . $_GET['acc_id'] ); /// voooorlopige id

        //get template
        $template = file_get_contents("templates/tbodyprojects_profile.html");

        //merge
        $output = MergeViewWithData( $template, $data );
        print $output;
        ?>


        <!--- appart omgegevens te kunnen herhalen via databank --->
        </tbody>
    </table>


        <!--- appart omgegevens te kunnen herhalen via databank --->
        <?php
        Printnavbarevents();
        //get data
        $data = GetData( "select * from events where ev_acc_id = ". $_GET['acc_id'] ); /// voorlopig id 2

        //get template
        $template = file_get_contents("templates/tbodyevents_profile.html");

        //merge
        $output = MergeViewWithData( $template, $data );
        print $output;
        ?>
        <!--- appart omgegevens te kunnen herhalen via databank --->
        </tbody>
    </table>


</section>
<!--- hier start de footer --->






<?php
//print footer
PrintFooter();

?>
<script src="./src/css/base/Icons/svgxuse.js"></script>
</body>
</html>