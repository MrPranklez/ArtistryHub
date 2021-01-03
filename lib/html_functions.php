<?php

// functie om de head te printen van head.html
function PrintHead()
{
$head = file_get_contents("templates/head.html");
print $head;
}

// functie om navbar.html te printen
function PrintNav()
{
    $head = file_get_contents("templates/navbar.html");
    print $head;
}

// functie om header.html te printen
function PrintHeader()
{
    $head = file_get_contents("templates/header.html");
    print $head;
}

// functie om footer.html te printen
function PrintFooter()
{
    $head = file_get_contents("templates/footer.html");
    print $head;
}