<?php
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

    //get the right data from the database
    $rows_accounts = GetData( "select * from accounts where acc_id = 1");///// tijdelijk op 1 gezet om te testen
    $rows_projects = GetData( "select * from projects where proj_id = 1");
    $rows_events = GetData( "select * from events where ev_id = 1");

    //get template
    $template_accounts = file_get_contents("templates/form_profile.html");
    $template_projects = file_get_contents("templates/form_projects.html");
    $template_events = file_get_contents("templates/form_events.html");

    // merge data with templates
    $merge_accounts = MergeViewWithData($template_accounts, $rows_accounts);
    $merge_projects = MergeViewWithData($template_projects, $rows_projects);
    $merge_events = MergeViewWithData($template_events, $rows_events);

    print $merge_accounts;
    print $merge_projects;
    print $merge_events;


    ?>





</section>


<?php
//print footer
PrintFooter();
?>
<script src="./src/css/base/Icons/svgxuse.js"></script>
</body>
</html>


