<!DOCTYPE>
<html>
    <head>
        <title>Job Post View</title>
    </head>
    <body>
        <table>
            <?php echo form_open_multipart('Job/edit_job_post')?>
            <label>Job Post</label>
                 <tr>
                    <td>
                        <?php
                            if(!empty($show->img_loc)){
                                echo '<img src="'.base_url().'uploads/'.$show->img_loc.'">';
                            }else{
                                echo form_input(array(
                                    'type'=>'file',
                                    'name'=>'userfile'
                                ));
                            }
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
                                'value'=>set_value('title',isset($show)?$show->title:''),
                                'class'=>''
                            ));
                            echo'<span>*'.form_error('title').'</span>';
                        ?>
                        <?php
                            echo form_hidden('hiddenid', isset($show)?$show->id:'');
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Location:</td>
                    <td>
                        <?php
                            echo form_dropdown(
                                'location',
                                $location,
                                set_value('location',isset($show)?$show->location:'')
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
                                $industry,
                                set_value('industry',isset($show)?$show->industry:'')
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
                                $job_function,
                                set_value('job_function',isset($show)?$show->job_function:'')
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
                                'value'=>set_value('responsible',isset($show)?$show->responsibilities:''),
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
                                'value'=>set_value('requirement',isset($show)?$show->requirement:''),
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
                                'value'=>set_value('description',isset($show)?$show->other_information:''),
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
                                'value'=>set_value('howtoapply',isset($show)?$show->apply_method:''),
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
                            'value'=>'Update',
                            'class'=>''
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                            echo '<a href="'.base_url("index.php/Job/job_list").'"> Back </a>';
                        ?>
                    </td>
                </tr>
            <?php echo form_close();?>
        </table>
    </body>
</html>
