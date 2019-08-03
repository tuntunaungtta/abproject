<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class User_Model extends CI_Model
    {
        public function insert($data)
        {
            $this->db->insert('user',$data);
                return true;
        }

        public function check_user($data)
        {
            $this->db->where('email', $data['txtemail']);
            $this->db->where('password', $data['txtpassword']);

            return $this->db->get('user')->row();
        }
        public function getByUserId($id)
        {
            $this->db->where('id',$id);
            return $this->db->get('user')->row();
        }
        public function update($data,$id)
        {
            $this->db->where('id',$id);
            $this->db->update('user',$data);
        }
        public function check_OldPassword($password,$id)
        {
            $this->db->where('id',$id);
            $this->db->where('password',$password);

            return $this->db->get('user')->row();
        }
    }
