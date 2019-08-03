<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_User extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'first_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => FALSE,
            ),
            'last_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => FALSE,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => FALSE,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => FALSE,
            ),
            'confirm_password' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => FALSE,
            ),
             'type' => array(
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ),
            'company_name' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => 'FALSE',
            ),
            'description'=>array(
                'type'=>'VARCHAR',
                'constraint'=>'500',
                'null'=>FALSE,
            ),
            'create_date'=>array(
                'type'=>'date',
                'null'=>FALSE,
            ),
            'update_date'=>array(
                'type'=>'date',
                'null'=>FALSE,
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user');
    }

    public function down()
    {
        $this->dbforge->drop_table('user');
    }
}
