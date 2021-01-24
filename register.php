<?php

error_reporting( E_ALL);
ini_set( 'display_errors',1);

require_once "lib/autoload.php";

PrintHead();
PrintNav();

?>
<!--- Registration Form --->
<div class="container pt-3 pb-3 bg-dark text-white">
    <div class='d-flex bg-secondary mt-0 pt-1 pb-1'>
        <?php
        //get data
        if ( count($old_post) > 0 )
        {
            $data = [ 0 => [
                "acc_email" => $old_post['acc_email'],
                "acc_name" => $old_post['acc_name'],
                "acc_password" => $old_post['acc_password'],
                "acc_art_typ_id" => $old_post['acc_art_typ_id'],
                "acc_bio" => $old_post['acc_bio'],
                "acc_desc" => $old_post['acc_desc'],
                "acc_prof_pic" => $old_post['acc_prof_pic']
            ]
            ];
        }
        else $data = [ 0 => [ "acc_email" => "", "acc_name" => "", "acc_password" => "", "acc_art_typ_id" => "", "acc_bio" => "", "acc_desc" => "", "acc_prof_pic" => ""]];

        //get template
        $output = file_get_contents("templates/register.html");

        //add extra elements
        $extra_elements['csrf_token'] = GenerateCSRF( "register.php"  );

        //merge
        $output = MergeViewWithData( $output, $data );
        $output = MergeViewWithExtraElements( $output, $extra_elements );
        $output = MergeViewWithErrors( $output, $errors );
        $output = RemoveEmptyErrorTags( $output, $data );

        print $output;
        ?>

    </div>
</div>
<!--- hier start de footer --->

<?php
PrintFooter();
?>
