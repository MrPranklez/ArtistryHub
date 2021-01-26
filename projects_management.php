<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

require_once 'lib/autoload.php';

//head printen
PrintHead();
//print navbar
PrintNav();
//print header
PrintHeader();

?>

<section class="container pt-3 pb-3 bg-dark text-white"><h2 class="ml-3">PROJECT MANAGEMENT</h2>
    <?php






    if ( count($old_post) > 0 )
    {
        $rows_projects = [ 0 => [
            "proj_acc_id" => $old_post['proj_acc_id'],
            "proj_name" => $old_post['proj_name'],
            "proj_desc" => $old_post['proj_desc'],
            "proj_date" => $old_post['proj_date']
        ]
        ];
    }
    else $rows_projects = [ 0 => [ "proj_acc_id" => "", "proj_name" => "", "proj_desc" => "", "proj_date" => "" ]];

    $data = GetData( "select * from projects where proj_acc_id=". $_GET['acc_id']);


    $extra_elements['csrf_token'] = GenerateCSRF("project_management.php" );
    $extra_elements['select_acc_id'] = $_SESSION['user']['acc_id'];


    //get template
    $template_projects = file_get_contents("templates/form_projects.html");


    // merge data with templates
    $merge_projects = MergeViewWithData($template_projects, $rows_projects);
    $merge_projects = MergeViewWithExtraElements( $merge_projects, $extra_elements );
    $merge_projects = MergeViewWithErrors( $merge_projects, $errors );
    $merge_projects = RemoveEmptyErrorTags( $merge_projects, $rows_projects );

    print $merge_projects;

    ?>

</section>

<?php
//print footer
PrintFooter();
?>


