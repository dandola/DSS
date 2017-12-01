<?php
/**
 * Created by PhpStorm.
 * User: nghiaduongtrung
 * Date: 11/23/17
 * Time: 5:03 PM
 */

class School_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function get_all(){
        $this->db->select('*');
        $this->db->from('school');
        $data=$this->db->get();
        return $data->result();
    }

    public function add($data){
        if(!empty($data['name'])){
            $this->db->insert('school',$data);
            return true;
        }
        return false;
    }

    public function get_by_id($id){
        if(isset($id) && is_numeric($id)){
            $this->db->select('*');
            $this->db->from('school');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
        return false;
    }

    public function delete_by_id($id){
        if(!empty($id)){
            $this->db->where('id',$id);
            $this->db->delete('school');
            return true;
        }
        return false;
    }

    public function edit_by_id($data){
        if(!empty($data['id']) && !empty($data['name'])){
            $this->db->where('id',$data['id']);
            $this->db->update('school',$data);
            return true;
        }
        return false;
    }

}