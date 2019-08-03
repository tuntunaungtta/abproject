<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Job_Function extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('job_function');
        $data=array(
            array('id'=>"1",'name'=>"software"),
            array('id'=>"2",'name'=>"hardware"),
            array('id'=>"3",'name'=>"FrontEnd Developer"),
            array('id'=>"4",'name'=>"BackEnd Developer"),
            array('id'=>"5",'name'=>"IT Technical"),
            array('id'=>"6",'name'=>" PHP Developer"),
        );
        $this->db->insert_batch('job_function' , $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('job_function');
    }
}
