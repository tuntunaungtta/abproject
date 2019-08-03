<!DOCTYPE>
<html>
    <head>
        <title class="eff1">Welcome to Login Page</title>
        <style>

        </style>
    </head>
    <body>
        <span><?php echo $show; ?></span>
        <table>
            <?php echo form_open('User/login')?>
                <tr>
                    <td>Email:</td>
                    <td>
                        <?php
                        echo form_input(array(
                            'type'=> 'email',
                            'name'=> 'txtemail',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:400px; height:25px;'
                        ));
                        echo'<span>*'.form_error('txtemail').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <?php
                        echo form_password(array(
                            'name'=>'loginpassword',
                            'value'=>'',
                            'class'=>'',
                            'style'=>'width:400px; height:25px;'
                        ));
                        echo'<span>*'.form_error('loginpassword').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <?php
                        echo form_submit('loginsubmit','Login',array('class'=>'btnlogin'));
                        ?>
                    </td>
                </tr>
            <?php echo form_close();?>
        </table>
        <a href="register">Create your JMS Account</a>
    </body>
</html>
