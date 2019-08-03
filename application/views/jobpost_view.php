<!DOCTYPE html>
<html>
  <head>
    <style>
        span{
            color:red;
        }
      </style>
    </head>
     <body>
<!--       <h1>JOB POST</h1>-->

         <?php  echo form_open_multipart('Job/jobcreate') ?>

         <div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">JOB POST</label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab"></label>
        <div class="login-form">
                                <?php $data = array(
                                    'name' => 'userfile',
                                    'type' => 'file'
                                   );
                                echo form_input($data);
                                ?>
                <div class="group">
                    <label for="user" class="label">Title</label>
<!--                    <input id="user" type="text" class="input">-->
                    <?php
                                $data = array(
                                    'name' => 'txttitle',
                                    'id'   => 'user',
                                    'type'  => 'text',
                                    'class' => 'input'
                                );

                                echo form_input($data);
                                echo '<span>'. form_error('txttitle'). '*' .'</span>';
                            ?>
                </div>
                <div class="group">
                    <label for="user" class="label">Location</label>
<!--                    <input id="user" type="text" class="input">-->
                   <?php echo form_dropdown ('locate',$location,array('id'=>'soflow'));
                                echo '<span>'. form_error('locate'). '*' .'</span>';
                         ?>
                </div>
                <div class="group">
                    <label for="user" class="label">Industry</label>
<!--                    <input id="user" type="text" class="input">-->
                   <?php echo form_dropdown ('indus',$industry,array('class'=>'dp'));
                                echo '<span>'. form_error('indus'). '*' .'</span>';
                    ?>

                </div>
                <div class="group">
                    <label for="user" class="label">Job Function</label>
<!--                    <input id="user" type="text" class="input">-->
                   <?php echo form_dropdown ('job_fun',$job_function,array('class'=>'dp'));
                                echo '<span>'. form_error('job_fun'). '*' .'</span>';
                    ?>

                </div>

                <div class="group">
                    <label for="pass" class="label">Responsibilities</label>
<!--                    <input id="pass" type="text" class="input">-->
                     <?php
                               $data = array(
                                   'name' => 'txtres',
                                   'id'   => 'pass',
                                   'class' => 'input',
                                   'type' => 'textarea'
                               );
                                echo form_textarea($data);
                            ?>
                </div>
                <div class="group">
                    <label for="pass" class="label">Requirement</label>
<!--                    <input id="pass" type="text" class="input">-->
                     <?php
                               $data = array(
                                   'name' => 'txtreq',
                                   'id'   => 'pass',
                                   'class' => 'input',
                                   'type' => 'textarea'
                               );
                                echo form_textarea($data);
                            ?>
                </div>
                <div class="group">
                    <label for="pass" class="label">Description</label>
<!--                    <input id="pass" type="text" class="input">-->
                     <?php
                               $data = array(
                                   'name' => 'txtdesc',
                                   'id'   => 'pass',
                                   'class' => 'input',
                                   'type' => 'textarea'
                               );
                                echo form_textarea($data);
                            ?>
                </div>
                <div class="group">
                    <label for="user" class="label">How to apply</label>
<!--                    <input id="user" type="text" class="input">-->
                    <?php
                                $data = array(
                                    'name' => 'txtapply',
                                    'id'   => 'user',
                                    'type'  => 'text',
                                    'class' => 'input'
                                );

                                echo form_input($data);
                            ?>
                </div>
                <div class="group">
<!--                    <input type="submit" class="button" value="Sign Up">-->
                    <?php
                               $data = array(
                                   'name' => 'username',
                                   'class'   => 'button',
                                   'value' => 'Save',
                                   'type' => 'submit'
                               );

                                echo form_submit($data);
                            ?>
                </div>
                <div class="group">
<!--                    <input type="submit" class="button" value="Sign Up">-->
                    <?php
                               $data = array(
                                   'name' => 'username',
                                   'class'   => 'button',
                                   'value' => 'Reset',
                                   'type' => 'Reset'
                               );

                                echo form_reset($data);
                            ?>
                </div>

            </div>
            <div class="sign-up-htm">

                <div class="hr"></div>
                <div class="foot-lnk">
                    <label for="tab-1">Already Member?</a>
                </div>
            </div>
        </div>

    </div>
</div>
<?php  echo form_close() ?>
     </body>
</html>
