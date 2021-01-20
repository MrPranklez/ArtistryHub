<?php
require_once 'lib/autoload.php';
//head printen
PrintHead();
?>

<body>
<?php
//print navbar
PrintNav();

// hier komt de band zijn profilebanner

?>
<?php
//get data
$data = GetData( "select * from accounts where acc_id = 2" ); //// voorlopige id

//get template
$template = file_get_contents("templates/header_profile.html");

//merge
$output = MergeViewWithData( $template, $data );
print $output;
?>

    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">PROJECTS</h6>
    </nav>
    <table class="table table-dark ml-1">
        <thead class="mb-0 pb-0">
        <tr class="text-secondary mb-0">
            <th class="mb-0 pb-0" scope="col">NAME</th>
            <th class="mb-0 pb-0" scope="col">DESCRIPTION</th>
            <th class="mb-0 pb-0" scope="col">RELEASE DATE</th>
        </tr>
        </thead>
        <tbody>
        <!--- appart omgegevens te kunnen herhalen via databank --->


        <?php
        //get data
        $data = GetData( "select * from projects where proj_acc_id = 2" ); /// voooorlopige id

        //get template
        $template = file_get_contents("templates/tbodyprojects_profile.html");

        //merge
        $output = MergeViewWithData( $template, $data );
        print $output;
        ?>


        <!--- appart omgegevens te kunnen herhalen via databank --->
        </tbody>
    </table>


    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">EVENTS</h6>
    </nav>
    <table class="table table-dark ml-1">
        <thead>
        <tr class="text-secondary">
            <th class="pb-0" scope="col">DATE</th>
            <th class="pb-0" scope="col">LOCATION</th>
            <th class="pb-0" scope="col">PRICE</th>
            <th class="pb-0" scope="col">LINK</th>
        </tr>
        </thead>
        <tbody>
        <!--- appart omgegevens te kunnen herhalen via databank --->
        <?php
        //get data
        $data = GetData( "select * from events where ev_acc_id = 2" ); /// voorlopig id 2

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