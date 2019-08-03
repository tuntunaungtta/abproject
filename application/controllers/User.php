<?php
    class User extends CI_Controller
{
        public function __construct()
        {
            parent:: __construct();
            $this->load->library('form_validation');
            $this->load->model('User_Model');
            $this->load->database();
        }
        public function login()
        {
             $this->form_validation->set_rules('txtemail', 'Email', 'required');
             $this->form_validation->set_rules('loginpassword', 'Password', 'required');

            if($this->form_validation->run() === false){
                $error['show']='';
                $this->load->view('header');
                $this->load->view('user_login',$error);
                $this->load->view('footer');
            }else{
                $data=array(
                    'txtemail'            =>$this->input->post('txtemail'),
                    'txtpassword'         =>$this->input->post('loginpassword'),
                 );
                $result=$this->User_Model->check_user($data);
    //            print_r($result);exit;
            if($result){
                $sessionData=array(
                'id'=>$result->id,
                'name' => $result->first_name ." ". $result->last_name
                );
                $this->session->set_userdata($sessionData);
                redirect('');
            }else{
                $error['show']='Invalid email & Password';
                $this->load->view('header');
                $this->load->view('user_login',$error);
                $this->load->view('footer');
            }
            }

        }
        public function logout(){
            $this->session->sess_destroy();
            redirect('User/login');
        }
        public function register()
        {
            $this->form_validation->set_rules('txt-first-name', 'first name', 'required');
            $this->form_validation->set_rules('txt-last-name', 'last name', 'required');
            $this->form_validation->set_rules('txt-company-name', 'company name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required|is_unique[user.email]', array('is_unique'=>"This %s already exists."));
            $this->form_validation->set_rules('password', 'password', 'required');
            $this->form_validation->set_rules('txtpassword', 'confirm
            password', 'required|matches[password]');

        if ($this->form_validation->run() === false){
            $this->load->view('header');
            $this->load->view('user_register');
            $this->load->view('footer');
        } else {
            $result=array(
                'first_name'        =>$this->input->post('txt-first-name'),
                'last_name'         =>$this->input->post('txt-last-name'),
                'company_name'      =>$this->input->post('txt-company-name'),
                'email'             =>$this->input->post('email'),
                'password'          =>$this->input->post('password'),
                'confirm_password'  =>$this->input->post('txtpassword'),
                'description'       =>$this->input->post('description'),
                'create_date'       =>date('Y-m-d')
        );
                $this->User_Model->insert($result);
                redirect('User/login');
            }
        }
        public function profile_view()
        {
            if(empty($_SESSION['id'])){
                redirect('User/login');
            }
            $data['tab']=0;
            $data['show']=$this->User_Model->getByUserId($_SESSION['id']);
            $this->load->view('header');
            $this->load->view('user_profile',$data);
            $this->load->view('footer');
        }
        public function update_profile()
        {
            $this->form_validation->set_rules('FirstName', 'first name', 'required');
            $this->form_validation->set_rules('LastName', 'last name', 'required');
            $this->form_validation->set_rules('company_name', 'company name', 'required');
            $this->form_validation->set_rules('Email', 'email', 'required');

        if ($this->form_validation->run() === false){
            $data['tab']=0;
            $this->load->view('header');
            $this->load->view('user_profile',$data);
            $this->load->view('footer');
        } else {
            $result=array(
                'first_name'        =>$this->input->post('FirstName'),
                'last_name'         =>$this->input->post('LastName'),
                'company_name'      =>$this->input->post('company_name'),
                'email'             =>$this->input->post('Email'),
                'description'       =>$this->input->post('Description'),
                'update_date'       =>date('Y-m-d')
        );
                $this->User_Model->update($result,$_SESSION['id']);
                redirect('User/logout');
        }
    }
        public function update_password()
        {
            $this->form_validation->set_rules('currentpassword', 'Current Password', 'required|callback_change');
            $this->form_validation->set_rules('newpassword', 'New Password', 'required');
            $this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|matches[newpassword]');

            if ($this->form_validation->run() === false){
                $data['tab']=1;
                $this->load->view('header');
                $this->load->view('user_profile',$data);
                $this->load->view('footer');
            }else{
                $result=array(
                'password'          =>$this->input->post('newpassword'),
                'confirm_password'  =>$this->input->post('confirmpassword'),
                'update_date'       =>date('Y-m-d')
            );
                $this->User_Model->update($result,$_SESSION['id']);
                redirect('User/logout');
            }
        }

        public function change($pass)
        {
           $result = $this->User_Model->check_OldPassword($pass,$_SESSION['id']);
        if(!empty($result)){
            return true;
        }else{
            $this->form_validation->set_message('change', 'Wrong Password');
            return false;
        }
    }
}
