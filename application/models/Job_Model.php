<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Job_Model extends CI_Model
    {
        public function insert($data)
        {
            $this->db->insert('job_post',$data);
                return true;
        }
        public function getlocation($unselected=true)
        {
            if($unselected === true){
                $data = array(''=>'select location');
            }
            $query  = $this->db->get('location');
            $result = $query->result();
            foreach($result as $row){
                $data[$row->id] = $row->name;
            }
            return $data;
        }
        public function getindustry($unselected=true)
        {
            if($unselected === true){
                $data=array(''=>'select industry');
            }
            $query  = $this->db->get('industry');
            $result = $query->result();
            foreach($result as $row){
                $data[$row->id] = $row->name;
            }
            return $data;
        }
        public function getjob_function($unselected=true)
        {
            if($unselected === true){
                $data = array(''=>'select job function');
            }
            $query  = $this->db->get('job_function');
            $result = $query->result();
            foreach($result as $row){
                $data[$row->id] = $row->name;
            }
            return $data;
        }
        public function getJobPostData($id,$limit,$page)
        {
            $this->db->select('*,location.name as location,industry.name as
                                industry,job_function.name as job_function,job_post.id as jpid');
            $this->db->from('job_post');
            $this->db->join('location','location.id=job_post.location');
            $this->db->join('industry','industry.id=job_post.industry');
            $this->db->join('job_function','job_function.id=job_post.job_function');

            $this->db->where('user_id',$id);
            $this->db->limit($limit,$page);
            $query = $this->db->get();
            return $query->result();
        }
        public function get_job_post_count($id)
        {
            $this->db->select('*');
            $this->db->from('job_post');
            $this->db->where('user_id',$id);
            return $this->db->count_all_results();
        }
        public function DeleteJobPostData($id)
        {
            $this->db->where('id',$id);
            $this->db->delete('job_post');
            return true;
        }
        public function edit($id,$userid)
        {
            $this->db->where('user_id',$userid);
            $this->db->where('id',$id);
            return $this->db->get('job_post')->row();
        }
        public function update($id,$data)
        {
            $this->db->where('id',$id);
            $this->db->update('job_post',$data);
            return true;
        }
        public function Detail($id)
        {
            $this->db->select('*,location.name as location,industry.name as
                                industry,job_function.name as job_function,job_post.id as jpid');
            $this->db->from('job_post');
            $this->db->join('location','location.id=job_post.location');
            $this->db->join('industry','industry.id=job_post.industry');
            $this->db->join('job_function','job_function.id=job_post.job_function');
            $this->db->join('user','user.id=job_post.user_id');

            $this->db->where('job_post.id',$id);
            $query = $this->db->get();
            return $query->result();
        }

        public function getJob($limit,$start,$search)
        {
            $this->db->select('job_post.id, job_post.title, industry.name, job_post.create_date');
            $this->db->from('job_post');
            $this->db->join('location','location.id=job_post.location','left');
            $this->db->join('industry','industry.id=job_post.industry','left');
            $this->db->join('job_function','job_function.id=job_post.job_function','left');
            if($search['userJf']!=0){
                $this->db->where('job_function',$search['userJf']);
            }
            if($search['userInd']!=0){
                $this->db->where('industry',$search['userInd']);
            }
            if($search['userLoc']!=0){
                $this->db->where('location',$search['userLoc']);
            }
            if($search['userTt']!=""){
                $this->db->where('title',$search['userTt'],'both');
            }
            $this->db->limit($limit, $start);
            $query=$this->db->get();
            return $query->result();
        }
        public function get_count($search)
        {
            if($search['userJf']!=0){
                $this->db->where('job_function',$search['userJf']);
            }
            if($search['userInd']!=0){
                $this->db->where('industry',$search['userInd']);
            }
            if($search['userLoc']!=0){
                $this->db->where('location',$search['userLoc']);
            }
            if($search['userTt']!=""){
                $this->db->where('title',$search['userTt'],'both');
            }
            return $this->db->count_all_results('job_post');
        }
    }
