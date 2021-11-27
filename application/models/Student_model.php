<?php
class student_model extends CI_Model
{
    function __construct() {
        $this->tblName = 'tbl_students';
    }

    function addStudent($data)
    {
        $this->db->insert($this->tblName, $data);
        return $this->db->insert_id();
    }

    function updateStudent($update_data,$student_id)
    {
        $this->db->where('student_id', $student_id)->update($this->tblName, $update_data);
    }

    function deleteStudent($student_ids)
    {
        $this->db->where_in('student_id', $student_ids);
        $delete = $this->db->delete($this->tblName);
        return $delete?true:false;
    }

    function login($uemail, $password){
        $this->db->group_start()
                ->where('username', $uemail)
                ->or_where('email', $uemail)
                ->group_end()
                ->where('password', $password);
        $query = $this->db->get('tbl_admin');
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }
    }

    function getStudents()
    {
        return $this->db->get($this->tblName)->result();
    }

    function getStudentById($student_id){
        return $this->db->where('student_id', $student_id)->get($this->tblName)->row();
    }


    function getStudentCount(){
        return $this->db->count_all($this->tblName);
    }

    function checkEmail($email,$student_id)
    {
      $this->db->where('email', $email);
      if($student_id){
          $this->db->where('student_id!=', $student_id);
      }
      $query = $this->db->get($this->tblName);
      if ($query->num_rows() > 0){
          return true;
      }
      else
      {
          return false;
      }
    }

    function checkPhoneNumber($phone_number,$student_id)
    {
        $this->db->where('phone_number', $phone_number);
        if($student_id){
          $this->db->where('student_id!=', $student_id);
        }
        $query = $this->db->get($this->tblName);
        if ($query->num_rows() > 0){
            return true;
        }
        else
        {
            return false;
        }
    }
}