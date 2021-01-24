<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once 'lib/autoload.php';
//head printen
PrintHead();
?>

<body>
<?php
//print navbar
PrintNav();
//print header
PrintHeader();
?>



<!--- vanaf hier column's invoegen --->
<section class="container pt-3 pb-3 bg-dark text-white"><h2 class="ml-3">PROFILE MANAGEMENT</h2>
    <?php

    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    //                              ENKEL IN DE PAGINA GERAKEN MET LOGIN ID
    //                                  ZODAT DE JUISTE GEGEVENS ZICHTBAAR ZIJN VAN JE ACC_ID
    //
    //                         VOEG EEN ADD BUTTON TOE OM GEGEVENS TOE TE VOEGEN
    //                              DE SAFEBUTTON VERVANGT HIER GEGEWOON GEGEVENS
    //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


    //get the right data from the database


    $rows_projects = [ 0 => [ "proj_acc_id" => "", "proj_name" => "", "proj_desc" => "", "proj_date" => "" ]];


    $extra_elements['csrf_token'] = GenerateCSRF("project_management.php" );

    //get template

    $template_projects = file_get_contents("templates/form_projects.html");


    // merge data with templates

    $merge_projects = MergeViewWithData($template_projects, $rows_projects);
    $merge_projects = MergeViewWithExtraElements( $merge_projects, $extra_elements );
    $merge_projects = MergeViewWithErrors( $merge_projects, $errors );
    $merge_projects = RemoveEmptyErrorTags( $merge_projects, $rows_projects );



    print $merge_projects;



    ?>





</section>


<?php
//print footer
PrintFooter();
?>
<script src="./src/css/base/Icons/svgxuse.js"></script>
</body>
</html>


