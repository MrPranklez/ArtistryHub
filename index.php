<?php

error_reporting( E_ALL);
ini_set( 'display_errors',1);

$public_access = true;
require_once 'lib/autoload.php';
//head printen
PrintHead();

//print navbar
PrintNav();
//print header
PrintHeader();

//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
//                                          PAGINA KLAAR
//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
?>

            <?php

            //get data
            $dataMusic = GetData( "select * from accounts where acc_art_typ_id = 1" );
            $dataArt = GetData( "select * from accounts where acc_art_typ_id = 2" );

            //get template
            $templateMusic = file_get_contents("templates/columnsindex.html");
            $templateArt = file_get_contents("templates/columnsindex.html");

            //merge
            $outputMusic = MergeViewWithData( $templateMusic, $dataMusic );
            $outputArt = MergeViewWithData( $templateArt, $dataArt );

            foreach ( $msgs as $msg){
                print '<div class="container bg-dark pt-5 pb-1 mb-0">
                        <div class="msgs alert alert-success" role="alert">' . $msg . '</div>
                         </div>';}

            PrintNavbarMusic();
            print $outputMusic;
            PrintNavbarArtists();
            print $outputArt;
            ?>

        </div>  <!-- kan niet mee in template gestoken worden door herhaling van templates -->
    </div>
</section>


<?php
//print footer
PrintFooter();
?>
