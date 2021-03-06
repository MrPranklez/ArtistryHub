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
    $navbar = file_get_contents("templates/navbar.html");

    $username = $_SESSION['user']['acc_name'] . " " . $_SESSION['user']['acc_name'];
    $navbar = str_replace("@username@", $username, $navbar );

    print $navbar;
}
function Printnavbarproject()
{
    $head = file_get_contents("templates/navbarproject_profile.html");
    print $head;
}
function Printnavbarevents()
{
    $head = file_get_contents("templates/navbarevents_profile.html");
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
function PrintNavbarMusic()
{
    $head = file_get_contents("templates/navbarmusic_index.html");
    print $head;
}
function PrintNavbarArtists()
{
    $head = file_get_contents("templates/navbarartists_index.html");
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

function MergeViewWithExtraElements( $template, $elements )
{
    foreach ( $elements as $key => $element )
    {
        $template = str_replace( "@$key@", $element, $template );
    }
    return $template;
}

function MergeViewWithErrors( $template, $errors )
{
    foreach ( $errors as $key => $error )
    {
        $template = str_replace( "@$key@", "<p style='color:red'>$error</p>", $template );
    }
    return $template;
}

function RemoveEmptyErrorTags( $template, $data )
{
    foreach ( $data as $row )
    {
        foreach( array_keys($row) as $field )  //eerst "img_id", dan "img_title", ...
        {
            $template = str_replace( "@$field" . "_error@", "", $template );
        }
    }

    return $template;
}
