<?php
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
