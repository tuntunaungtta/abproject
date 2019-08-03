<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Location extends CI_Migration {

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
        $this->dbforge->create_table('location');
        $data=array(
            array('id'=>"1",'name'=>"Yangon"),
            array('id'=>"2",'name'=>"Mandalay"),
            array('id'=>"3",'name'=>"Bago"),
            array('id'=>"4",'name'=>"Nay Pyay Taw"),
            array('id'=>"5",'name'=>"Magwe"),
        );
        $this->db->insert_batch('location', $data);
    }

    public function down()
    {
        $this->dbforge->drop_table('location');
    }
}
