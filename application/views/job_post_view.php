<!DOCTYPE>
<html>
    <head>
        <title>Job Post View</title>
    </head>
    <body>
        <table>
            <?php echo form_open_multipart('Job/job_create')?>
            <label>Job Post</label>
                 <tr>
                    <td>
                        <?php
                            echo form_input(array(
                                'type'=>'file',
                                'name'=>'userfile'
                            ));
                            echo'<span>'.form_error('userfile').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Title:</td>
                    <td>
                        <?php
                            echo form_input(array(
                                'type'=>'text',
                                'name'=>'title',
                                'value'=>'',
                                'class'=>''
                            ));
                            echo'<span>*'.form_error('title').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td>
                        <?php
                            echo form_dropdown(
                                'location',
                                $location
                            );
                            echo'<span>*'.form_error('location').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Industry:</td>
                    <td>
                        <?php
                            echo form_dropdown(
                                'industry',
                                $industry
                            );
                            echo'<span>*'.form_error('industry').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Job Function:</td>
                    <td>
                        <?php
                            echo form_dropdown(
                                'job_function',
                                $job_function
                            );
                            echo'<span>*'.form_error('job_function').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Responsibilities:</td>
                    <td>
                         <?php
                            echo form_textarea(array(
                                'name'=>'responsible',
                                'value'=>'',
                                'class'=>''
                            ));
                            echo'<span>*'.form_error('responsible').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Requirement:</td>
                    <td>
                         <?php
                            echo form_textarea(array(
                                'name'=>'requirement',
                                'value'=>'',
                                'class'=>''
                            ));
                            echo'<span>*'.form_error('requirement').'</span>';
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
                            echo'<span>*'.form_error('description').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>How to apply</td>
                    <td>
                     <?php
                            echo form_input(array(
                                'type'=>'text',
                                'name'=>'howtoapply',
                                'value'=>'',
                                'class'=>''
                            ));
                            echo'<span>*'.form_error('howtoapply').'</span>';
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
                            'value'=>'Reset',
                            'class'=>''
                        ));
                        ?>
                    </td>
                </tr>
            <?php echo form_close();?>
        </table>
    </body>
</html>
