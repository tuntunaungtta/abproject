<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Job_Post extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => FALSE,
            ),
            'location' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => FALSE,
            ),
            'industry' => array(
                'type' => 'INT',
                'constraint' => 5,
                'null' => FALSE,
            ),
            'responsibilities' => array(
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => FALSE,
            ),
             'requirement' => array(
                'type' => 'VARCHAR',
                'constraint' => '1000',
                'null' => FALSE,
            ),
            'other_information'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'1000',
                'null'=>'FALSE',
            ),
            'user_id'=>array(
                'type'=>'INT',
                'constraint'=>10,
                'null'=>'FALSE',
            ),
            'apply_method'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'400',
                'null'=>'FALSE',
            ),
            'img_loc'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'50',
                'null'=>'FALSE',
            ),
            'job_function'=>array(
                'type'=>'INT',
                'constraint'=>10,
                'null'=>'FALSE',
            ),
            'create_date'=>array(
                'type'=>'date',
                'null'=>'FALSE',
            ),
            'update_date'=>array(
                'type'=>'date',
                'null'=>'FALSE',
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('job_post');
    }

    public function down()
    {
        $this->dbforge->drop_table('job_post');
    }
}
