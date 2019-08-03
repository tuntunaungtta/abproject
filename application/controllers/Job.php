<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Job extends CI_Controller
    {
         public function __construct()
        {
            parent:: __construct();
            $this->load->library('form_validation');
            $this->load->model('Job_Model');
            $this->load->library('upload');
             $this->load->library('pagination');
            $this->load->database();
        }

        public function job_create()
        {
            if(empty($_SESSION['id'])){
                redirect('User/register');
            }
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('responsible', 'Responsible', 'required');
            $this->form_validation->set_rules('requirement', 'Requirement', 'required');
            $this->form_validation->set_rules('description', 'Descriptoin', 'required');
            $this->form_validation->set_rules('howtoapply', 'Apply');
            $this->form_validation->set_rules('location', 'Location','required');
            $this->form_validation->set_rules('industry', 'Industry','required');
            $this->form_validation->set_rules('job_function', 'Job Function','required');

            if ($this->form_validation->run() === false){
                $data['location']=$this->Job_Model->getlocation();
                $data['industry']=$this->Job_Model->getindustry();
                $data['job_function']=$this->Job_Model->getjob_function();
                $this->load->view('header');
                $this->load->view('job_post_view', $data);
                $this->load->view('footer');
            }else {
            $result=array(
                'title'             =>$this->input->post('title'),
                'responsibilities'  =>$this->input->post('responsible'),
                'requirement'       =>$this->input->post('requirement'),
                'other_information' =>$this->input->post('description'),
                'apply_method'      =>$this->input->post('howtoapply'),
                'location'          =>$this->input->post('location'),
                'industry'          =>$this->input->post('industry'),
                'job_function'      =>$this->input->post('job_function'),
                'user_id'           =>$_SESSION['id'],
                'create_date'       =>date('Y-m-d'),
            );
            $image = $this->doUpload();

            if($image!= ""){
                $result['img_loc'] = $image;
            }
            $this->Job_Model->insert($result);
            redirect('Job/job_list');
            }
        }
        public function doUpload()
        {
            $config['upload_path']   = './uploads/';
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $this->upload->initialize($config);

            if(!$this->upload->do_upload('userfile')) {
                $data['msg'] = $this->upload->display_errors();
            }else{
                $upload_data = $this->upload->data();
                $config['source_image']   = $upload_data['full_path'];
                $config['maintain_ratio'] = true;
                $config['width']  = 300;
                $config['height'] = 300;
                $this->load->library('image_lib',$config);
                $this->image_lib->resize();
            }
            return $upload_data['file_name'];
        }
        public function job_list()
        {
            if(empty($_SESSION['id'])){
                redirect('User/login');
            }else{
                $config['base_url']    = site_url('Job/job_list');
                $config['total_rows']  = $this->Job_Model->get_job_post_count($_SESSION['id']);
                $config['per_page']=2;
                $config['uri_segment'] = 3;
                $current_page=($this->uri->segment(3))?$this->uri->segment(3):1;
                $page=$config['per_page']*($current_page-1);

                $config['num_tag_open']     = '&nbsp;&nbsp;';
                $config['num_tag_close']    = '&nbsp;&nbsp;';
                $config['use_page_numbers'] = true;

                $config['next_link'] = 'Next ';
                $config['prev_link'] = 'Prev ';
                $this->pagination->initialize($config);

                $data['pagination'] = $this->pagination->create_links();

               $data['results'] = $this->Job_Model->getJobPostData($_SESSION['id'], $config['per_page'], $page);
               $this->load->view('header');
               $this->load->view('Job_List',$data);
               $this->load->view('footer');
            }

        }
        public function Job_Delete()
        {
            $data = $this->input->get('id');
            $this->Job_Model->DeleteJobPostData($data);
            redirect('Job/job_list');
        }
         public function edit_job_post()
        {
            if(empty($_SESSION['id'])){
                redirect('User/login');
            }else{
               $data['show'] = $this->Job_Model->edit($this->input->get('id'),$_SESSION['id']);

                $data['location']     = $this->Job_Model->getlocation();
                $data['industry']     = $this->Job_Model->getindustry();
                $data['job_function'] = $this->Job_Model->getjob_function();
            }
            $this->load->view('header');
            $this->load->view('Edit_Job_Post',$data);
            $this->load->view('footer');
            if(!empty($this->input->post('hiddenid'))){
                $result=array(
                'title'             =>$this->input->post('title'),
                'responsibilities'  =>$this->input->post('responsible'),
                'requirement'       =>$this->input->post('requirement'),
                'other_information' =>$this->input->post('description'),
                'apply_method'      =>$this->input->post('howtoapply'),
                'location'          =>$this->input->post('location'),
                'industry'          =>$this->input->post('industry'),
                'job_function'      =>$this->input->post('job_function'),
                'user_id'           =>$_SESSION['id'],
                'update_date'       =>date('Y-m-d'),
            );
                $image = $this->doUpload();
                if($image!= ""){
                $result['img_loc'] = $image;
            }

                $this->Job_Model->update($this->input->post('hiddenid'),$result);
                redirect('Job/job_list');
            }
         }
        public function job_detail()
        {
            $result=$this->input->get('id');
            $data['results'] = $this->Job_Model->Detail($result);
            $this->load->view('header');
            $this->load->view('Job_Detail',$data);
            $this->load->view('footer');
        }
        public function HomeSearch()
        {
            $data['location']     = $this->Job_Model->getlocation();
            $data['industry']     = $this->Job_Model->getindustry();
            $data['job_function'] = $this->Job_Model->getjob_function();

            $this->load->view('header');
            $this->load->view('Home',$data);
            $this->load->view('footer');
        }
        public function load_data()
        {

        $limit=$this->input->get_post('length',true);
        $start=$this->input->get_post('start',true);
        $draw=$this->input->get_post('draw',true);

        $search['userJf']=$this->input->post('jobfunction',true);
        $search['userInd']=$this->input->post('industry',true);
        $search['userLoc']=$this->input->post('location',true);
        $search['userTt']=$this->input->post('jobtitle',true);

        $count=$this->Job_Model->get_count($search);
        $data=$this->Job_Model->getJob($limit, $start, $search);
        $response=array(
            'recordsTotal'=>$count,
            'recordsFiltered'=>$count,
            'data'=>array(),
        );
        foreach($data as $row){
            $response['data'][]=array(
                $row->title,
                $row->name,
                $row->create_date,
                $row->id,
            );
        }
        header('Content-Type:application/json');
        echo json_encode($response);
        }
    }

