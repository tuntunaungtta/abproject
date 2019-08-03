<!DOCTYPE>
<html>
    <head>
        <title>User Register Page</title>
        <style>

        </style>
    </head>
    <body>
        <table>
            <label>Create User</label>
            <?php echo form_open('User/register')?>
                <tr>
                    <td>First Name:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=> 'text',
                            'name'=> 'txt-first-name',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                            echo'<span>*'.form_error('txt-first-name').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=>'text',
                            'name'=>'txt-last-name',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('txt-last-name').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Company Name:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=> 'text',
                            'name'=> 'txt-company-name',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('txt-company-name').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=>'email',
                            'name'=>'email',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('email').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=>'password',
                            'name'=>'password',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('password').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=>'password',
                            'name'=>'txtpassword',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:500px; height:25px;'
                        ));
                        echo'<span>*'.form_error('txtpassword').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <?php
                        echo form_textarea(array(
                            'name'=>'description',
                            'value'=>'',
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
                            'value'=>'Save',
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
    </body>
</html>
