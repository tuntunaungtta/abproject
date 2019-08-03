<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('html');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Job Search System</title>
    <meta name="description" content="Description of your site goes here">
    <meta name="keywords" content="keyword1, keyword2, keyword3">

        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/datatable.min.js'); ?>"></script>
        <script>baseurl = "<?php print base_url(); ?>"</script>

    <?php
         echo link_tag('assets/css/mystyle.css');
         echo link_tag('assets/css/style.css');
         echo link_tag('assets/css/jquery-ui.css');
         echo link_tag('assets/css/jquery-ui.min.css');
        echo link_tag('assets/css/datatable.css');
    ?>
    <style>

    </style>

</head>
<body>
    <div class="wrapper">
        <div class="warpper-top">
            <div class="banner-area">
                <div class="banner-bg1">
                    <div class="nav-area">
                        <ul class="navigation">
                            <?php
                            echo '<li><a href="'.base_url("index.php").'"> Home </a></li>';
                            if(!empty($_SESSION['id'])){
                                echo '<li><a href="'.base_url("index.php/Job/job_list").'"> View Posted List </a></li>';
                                echo '<li><a href="'.base_url("index.php/Job/job_create").'"> Add New job Post </a></li>';
                                echo '<li><a href="'.base_url("index.php/User/profile_view").'">'.$_SESSION['name'].'</a><li>';
                                echo '<li><a href="'.base_url("index.php/User/logout").'"> Logout </a></li>';
                            }else{
                                echo '<li><a href="'.base_url("index.php/User/register").'"> User Register </a></li>';
                                echo '<li><a href="'.base_url("index.php/User/login").'"> Login </a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="nav-sh"></div>
                </div>
            </div>
        </div>

            <div class="warpper-mid">
            <div class="mid-gap"></div>
            <div class="mid-left">
            </div>



