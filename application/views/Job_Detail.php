<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE>
<html>
    <head>
        <title>View Post Job Detail Page</title>
        <style>

        </style>
    </head>
    <body>
        <?php
            foreach( $results as $row){ ?>

                <h3>Image</h3>
                <?php echo'<p><img src="'.base_url().'uploads/'.$row->img_loc.'"></p><hr><br><br>';?>
        <?php }
        ?>

         <div class="JobDetail">Web Developer</div>
        <table>
            <?php
            foreach( $results as $row){ ?>

                <h3>Location</h3>
                 <?php echo'<hr><p>'. $row->location.'</p>';?>

                <h3>Industry</h3>
                 <?php echo'<hr></p>' .$row->industry.'</p>';?>

                <h3>Description</h3>
                <?php echo'<hr></p>' .$row->description.'</p>'?>

                <h3>Responsibilities</h3>
                 <?php echo'<hr><p>'. $row->responsibilities.'</p>';?>

                <h3>Requirement</h3>
                <?php echo'<hr><p>'. $row->requirement.'</p>';?>

                <h3>Other Information</h3>
                <?php echo'<hr><p>'. $row->other_information.'</p>';?>

                <h3>Apply Method</h3>
                <?php echo'<hr><p>'. $row->apply_method.'</p>';?>

        <?php }
        ?>
        </table>
    </body>
</html>
