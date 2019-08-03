<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE>
<html>
    <head>
        <title>Home Page</title>
        <script src="<?php echo base_url('assets/js/JobSearch.js'); ?>"></script>
    </head>
    <body>
        <table>
            <?php echo form_open_multipart('',array('id' => 'search-form')); ?>
                <tr>
                    <td>Job Title:</td>
                    <td>
                        <?php
                            echo form_input(array(
                                'type'   =>'text',
                                'name'   =>'jobtitle',
                                'value'  =>'',
                                'class'  =>''
                            ));
                        ?>
                    </td>
                    <td>Job Function:</td>

                    <td>
                      <?php
                            echo form_dropdown('jobfunction',$job_function);
                            echo'<span>*'.form_error('jobfunction').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Industry:</td>
                    <td>
                      <?php
                            echo form_dropdown('industry',$industry);
                            echo'<span>*'.form_error('industry').'</span>';
                        ?>
                    </td>
                    <td>Location:</td>
                    <td>
                        <?php
                            echo form_dropdown('location',$location);
                            echo'<span>*'.form_error('location').'</span>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo form_button(array(
                            'id'      =>'btn-search',
                            'name'    =>'submit',
                            'content' =>'Search',
                            'class'   =>''
                        ));
                        ?>
                    </td>
                    <td>
                        <?php
                        echo form_button(array(
                            'type'    =>'reset',
                            'name'    =>'reset',
                            'content' =>'Reset',
                            'class'   =>''
                        ));
                        ?>
                    </td>
                </tr>
            <?php echo form_close();?>
        </table>
        <hr>
        <table class="data-table" id="tbl-searchlist">
            <thead>
                <tr id="caption">
                    <th width="300px">Title</th>
                    <th width="300px">Industry</th>
                    <th width="300px">Posted Date</th>
                    <th width="300px">View Detail</th>
                </tr>
            </thead>
        </table>
    </body>
</html>
