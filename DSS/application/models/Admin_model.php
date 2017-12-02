<?php
/**
 * Created by PhpStorm.
 * User: nghiaduongtrung
 * Date: 11/23/17
 * Time: 5:03 PM
 */

class Admin_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function check_exists($data){
    	
    	$this->db->where($data);
    	$query=$this->db->get('admin');
    	if($query->num_rows()>0){
    		return True;
    	}
    	else{
    		return false;
    	}

    }

}
?>