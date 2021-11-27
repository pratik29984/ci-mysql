<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('loggedIn')){
			redirect(base_url());
		}

		$this->load->library('form_validation');
		$this->load->model('student_model');
	}

	public function student_list($rowno=0){
		$this->load->library('pagination');
        $rowperpage = 10;  
   
        if($rowno != 0){  
          $rowno = ($rowno-1) * $rowperpage;  
        }  
    
        $allcount = $this->student_model->getStudentCount();
   
        $this->db->limit($rowperpage, $rowno);  
        $record = $this->student_model->getStudents();  
    
        $config['base_url'] = base_url('student_list');
        $config['use_page_numbers'] = TRUE;  
        $config['total_rows'] = $allcount;  
        $config['per_page'] = $rowperpage;  
   
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';  
        $config['full_tag_close']   = '</ul></nav></div>';  
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';  
        $config['num_tag_close']    = '</span></li>';  
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';  
        $config['cur_tag_close']    = '</li>';  
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';  
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['prev_tag_close']  = '</span></li>';  
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';  
        $config['first_tag_close'] = '</span></li>';  
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';  
        $config['last_tag_close']  = '</span></li>';
   
        $this->pagination->initialize($config);
   
        $data['pagination'] = $this->pagination->create_links();  
        $data['result'] = $record;  
        $data['row'] = $rowno;   
        echo json_encode($data);  
  	}

	
    public function index()
	{
		if(!$this->session->userdata('loggedIn')){
			redirect(base_url());
		}
		$data = array();
		$data['student_list'] = $this->student_model->getStudents();
		$this->load->view('student',$data);
	}

	function student_save_ajax(){
		if($this->input->post()){
			$post_data = $this->input->post();
			if(isset($post_data['student_id'])){
				$student_id = $post_data['student_id'];
				unset($post_data['student_id']);
			}
			if(isset($post_data['hobby'])){
				$post_data['hobby'] = implode(',',$post_data['hobby']);
			}
			if(isset($post_data['date_of_birth'])){
				$post_data['date_of_birth'] = date('Y-m-d',strtotime($post_data['date_of_birth']));
			}
			$image = $_FILES["image"]["name"];
			if (!empty($image))
			{
				$config['upload_path'] = './upload/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['remove_spaces'] = TRUE;
				$this->load->library('upload', $config);
				$this->upload->do_upload('image');
				$data = array('upload_data' => $this->upload->data());
				$post_data['image'] = $data['upload_data']['file_name'];	
			}

			$post_data['created_on'] = date('Y-m-d H:i:s');
			if($student_id){
				$this->student_model->updateStudent($post_data,$student_id);
				echo json_encode(array('status'=>true,'message'=>'Student updated successfully!'));
			}else{
				$student_id = $this->student_model->addStudent($post_data);
				if($student_id){
					echo json_encode(array('status'=>true,'message'=>'Student added successfully!'));
				}else{
					echo json_encode(array('status'=>false,'message'=>'Student not added!'));
				}
			}
		}else{
			echo json_encode(array('status'=>false,'message'=>'Student not added!'));
		}
		die;
	}

	function delete_student(){
		$student_ids = $this->input->post('student_id');
		if($student_ids){
			$this->student_model->deleteStudent($student_ids);
			echo json_encode(array('status'=>true,'message'=>'Student deleled!'));
		}
	}

	function get_student(){
		$student_id = $this->input->post('student_id');
		$student_details = $this->student_model->getStudentById($student_id);
		$student_details->date_of_birth = date('d-m-Y',strtotime($student_details->date_of_birth));
		echo json_encode($student_details);
	}

	function unique_email(){
		$email = $this->input->post('email');
		$student_id = $this->input->post('student_id');
		$check = $this->student_model->checkEmail($email,$student_id);
		if($check){
			echo json_encode(false);
		}else{
			echo json_encode(true);
		}
	}

	function unique_phone_number(){
		$phone_number = $this->input->post('phone_number');
		$student_id = $this->input->post('student_id');
		$check = $this->student_model->checkPhoneNumber($phone_number,$student_id);
		if($check){
			echo json_encode(false);
		}else{
			echo json_encode(true);
		}
	}
}
