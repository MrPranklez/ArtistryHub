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

function MergeViewWithData( $template, $data )
{
    $returnvalue = "";

    foreach ( $data as $row )
    {
        $output = $template;

        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $output = str_replace( "@$field@", $row["$field"], $output );
        }

        $returnvalue .= $output;
    }

    return $returnvalue;
}

