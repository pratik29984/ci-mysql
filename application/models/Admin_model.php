<?php
class admin_model extends CI_Model
{
    function __construct() {
        $this->tblName = 'tbl_admin';
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
}