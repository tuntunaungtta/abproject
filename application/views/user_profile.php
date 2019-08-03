<!DOCTYPE>
<html>
    <head>
        <title>User Profile Page</title>
        <script>
            $(function(){
                $('#tabs').tabs();
                $('#tabs').tabs('option','active','<?php echo $tab;?>');
            });
        </script>
    </head>
    <body>
        <label>User Profile</label>
        <div id="tabs" class="tab">
            <ul>
                <li><a href="#tab1">Profile</a></li>
                <li><a href="#tab2">Change Password</a></li>
            </ul>
            <div id="tab1">
        <table>
            <?php echo form_open('User/update_profile')?>
                <tr>
                    <td>First Name:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=> 'text',
                            'name'=> 'FirstName',
                            'value'=>set_value('FirstName',isset($show)?$show->first_name:''),
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                            echo'<span>*'.form_error('FirstName').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=>'text',
                            'name'=>'LastName',
                            'value'=>set_value('LastName',isset($show)?$show->last_name:''),
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('LastName').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=> 'email',
                            'name'=> 'Email',
                            'value'=>set_value('Email',isset($show)?$show->email:''),
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('Email').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Company Name:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=>'text',
                            'name'=>'company_name',
                            'value'=>set_value('company_name',isset($show)?$show->company_name:''),
                            'class'=>''
                        ));
                        echo'<span>*'.form_error('company_name').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <?php
                        echo form_textarea(array(
                            'name'=>'Description',
                            'value'=>set_value('Description',isset($show)?$show->description:''),
                            'class'=>''
                        ));
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo form_submit(array(
                            'name'=>'submit',
                            'value'=>'Update',
                            'class'=>''
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo form_reset(array(
                            'name'=>'reset',
                            'value'=>'reset',
                            'class'=>''
                        ));
                        ?>
                    </td>
                </tr>
            <?php echo form_close();?>
        </table>
        </div>

        <div id="tab2">
        <table>
            <?php echo form_open('User/update_password')?>
                <tr>
                    <td>Current Password:</td>
                    <td>
                        <?php
                        echo form_password(array(
                            'name'=> 'currentpassword',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:300px; height:25px;'
                        ));
                            echo'<span>*'.form_error('currentpassword').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Password:</td>
                    <td>
                        <?php
                        echo form_password(array(
                            'name'=>'newpassword',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:300px; height:25px;'
                        ));
                        echo'<span>*'.form_error('newpassword').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <?php
                        echo form_password(array(
                            'name'=> 'confirmpassword',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:300px; height:25px;'
                        ));
                        echo'<span>*'.form_error('confirmpassword').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo form_submit(array(
                            'name'=>'submit',
                            'value'=>'Change password',
                            'class'=>''
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo form_reset(array(
                            'name'=>'reset',
                            'value'=>'reset',
                            'class'=>''
                        ));
                        ?>
                    </td>
                </tr>
            <?php echo form_close();?>

        </table>
        </div>
    </div>
    </body>
</html>
