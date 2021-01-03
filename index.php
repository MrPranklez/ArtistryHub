<?php
require_once 'lib/html_functions.php';
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
<section class="container pt-3 pb-3 bg-dark text-white">
    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">MUSICIAN PROFILES</h6>
    </nav>
    <div class="container mb-3">
        <div class="row">
            <div class="col-sm bg-dark p-1">
                <div class="divincol bg-secondary p-2">
                    <img class="incolumn img-fluid" src="./img/greta%20van%20fleet%20profile%20pic.jpg">
                    <h6 class="mb-0 mt-2">GRETA VAN FLEET</h6>
                    <p class="pt-0 mb-0">Led zepplin-like rockband</p>
                </div>
            </div>
            <div class="col-sm bg-dark p-1">
                <div class="divincol bg-secondary p-2">
                    <img class="incolumn img-fluid" src="./img/muse%20profile%20pic.jpg">
                    <h6 class="mb-0 mt-2">MUSE</h6>
                    <p class="pt-0 mb-0">English rockband</p>
                </div>
            </div>
            <div class="col-sm bg-dark p-1">
                <div class="divincol bg-secondary p-2">
                    <img class="incolumn img-fluid" src="./img/guitar%20profile%20pic.jpg">
                    <h6 class="mb-0 mt-2">ERIC MEYER</h6>
                    <p class="pt-0 mb-0">Spanish guitar player</p>
                </div>
            </div>
        </div>
    </div>
    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">ARTISTS PROFILES</h6>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm bg-dark p-1">
                <div class="divincol bg-secondary p-2">
                    <img class="incolumn img-fluid" src="./img/artist%20profile%20pic.jpg">
                    <h6 class="mb-0 mt-2">SARAH VELOCCI</h6>
                    <p class="pt-0 mb-0">pop-art</p>
                </div>
            </div>
            <div class="col-sm bg-dark p-1">
                <div class="divincol bg-secondary p-2">
                    <img class="incolumn img-fluid" src="./img/dali%20profile%20pic.jpg">
                    <h6 class="mb-0 mt-2">SALVADOR DALI</h6>
                    <p class="pt-0 mb-0">Surrealism</p>
                </div>
            </div>
            <div class="col-sm bg-dark p-1">
                <div class="divincol bg-secondary p-2">
                    <img class="incolumn img-fluid" src="./img/van%20gogh%20profile%20pic.jpg">
                    <h6 class="mb-0 mt-2">VAN GOGH</h6>
                    <p class="pt-0 mb-0">Post-impressionism</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--- hier start de footer --->




<?php
//print footer
PrintFooter();
?>
<script src="./src/css/base/Icons/svgxuse.js"></script>
</body>
</html>
