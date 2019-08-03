<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Industry extends CI_Migration {

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
        $this->dbforge->create_table('industry');
        $data=array(
            array('id'=>"1",'name'=>"HR Department"),
            array('id'=>"2",'name'=>"Accounting"),
            array('id'=>"3",'name'=>"Computer IT"),
            array('id'=>"4",'name'=>"Banking"),
            array('id'=>"5",'name'=>"Financial"),
            array('id'=>"6",'name'=>"Security Department"),
        );
        $this->db->insert_batch('industry' , $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('industry');
    }
}
