<html>
    <head>
        <title>Posted Job List Page</title>
        <script>
            function ConfirmDelete()
            {
                var x = confirm("Are you sure want to delete?");
                    if(x){
                        return true;
                    }else{
                        return false;
                    }
            }
        </script>
    </head>
    <body>
        <table class="joblisttbl">
            <tr>
                <th>Job Title</th>
                <th>Location</th>
                <th>Industry</th>
                <th>Job Function</th>
                <th>Responsibilities</th>
                <th>Apply Method</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th colspan="3">Option</th>
            </tr>
                <?php
                    foreach($results as $row){
                        echo '<tr>';
                            echo '<td>'.$row->title.'</td>';
                            echo '<td>'.$row->location.'</td>';
                            echo '<td>'.$row->industry.'</td>';
                            echo '<td>'.$row->job_function.'</td>';
                            echo '<td>'.$row->responsibilities.'</td>';
                            echo '<td>'.$row->apply_method.'</td>';
                            echo '<td>'.$row->create_date.'</td>';
                            echo '<td>'.$row->update_date.'</td>';
                            echo '<td><a href="'.base_url("index.php/Job/edit_job_post?id=").$row->jpid.'">Edit</a></td>';
                            echo '<td><a href="'.base_url("index.php/Job/Job_Delete?id=").$row->jpid.'" onclick="return ConfirmDelete()">Delete</a></td>';
                            echo '<td><a href="'.base_url("index.php/Job/job_detail?id=").$row->jpid.'">View Detail</a></td>';
                        echo '</tr>';
                    }
                ?>
        </table>
        <?php echo $pagination; ?>
    </body>
</html>
