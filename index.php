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

<section class="container pt-3 pb-3 bg-dark text-white">
    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">MUSICIAN PROFILES</h6>
    </nav>
    <div class="container mb-3">
        <div class="row">


            <?php
            // columns van Musicians
            //get data
            $data = GetData( "select * from accounts where acc_art_typ_id = 1" );

            //get template
            $template = file_get_contents("templates/columnsindex.html");

            //merge
            $output = MergeViewWithData( $template, $data );
            print $output;
            ?>



        </div>
    </div>
    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">ARTISTS PROFILES</h6>
    </nav>
    <div class="container">
        <div class="row">


            <?php
            //get data
            $data = GetData( "select * from accounts where acc_art_typ_id = 2" );

            //get template
            $template = file_get_contents("templates/columnsindex.html");

            //merge
            $output = MergeViewWithData( $template, $data );
            print $output;
            ?>



        </div>
    </div>
</section>




<?php
//print footer
PrintFooter();
?>
<script src="./src/css/base/Icons/svgxuse.js"></script>
</body>
</html>
