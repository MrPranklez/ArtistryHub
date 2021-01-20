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
<header class="header container pt-3 bg-dark">
    <div class="banner">
        <img class="img-fluid" src="./img/banner%20muse.jpg">
    </div>
    <div class="d-flex mt-2">
        <div class="profilepic col-4 p-1 bg-danger">
            <img class="img-fluid" src="./img/muse%20profile%20pic.jpg">
        </div>
        <div class="artistname align-self-end text-white ml-2 mt-4">
            <h1 class="mb-0 pb-0">MUSE</h1>
        </div>
    </div>
</header>



<!--- vanaf hier column's invoegen --->
<section class="container pt-3 pb-3 bg-dark text-white">

    <nav class="unlinkednavbar">
        <h6 class="text-white pb-0" href="#">BIOGRAPHY</h6>
    </nav>
    <div class='col-sm-12  mt-0 pt-1 pb-1'>
        <P>De biografie van Muse, ze worden benoemd als de beste liveband van deze tijd,
        samen met enkel een band van 3 leden spelen ze maandelijks voetbalstadions vol.
        Alles is altijd snel uitverkocht dus aarzel niet!</P>
    </div>
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
        <tr>
            <td>SIMULATION THEORY</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <td>DRONES</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
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
        <tr>
            <th scope="row">-</th>
            <td>SIMULATION THEORY</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">-</th>
            <td>DRONES</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
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