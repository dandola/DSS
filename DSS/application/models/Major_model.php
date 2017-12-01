<?php
/**
 * Created by PhpStorm.
 * User: nghiaduongtrung
 * Date: 11/23/17
 * Time: 5:03 PM
 */

class Major_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function get_all(){
        $this->db->select('*');
        $this->db->from('major');
        $data=$this->db->get();
        return $data->result();
    }

    public function get_list_by_school_id($school_id){
        if(!empty($school_id)){
            $this->db->select('*');
            $this->db->from('major');
            $this->db->where('school_id', $school_id);
            $this->db->order_by('id');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            } 
        }
        return false;
    }

    public function add($name, $sign,$reference_1, $reference_2,$amount, $work_opportunity, $rate_of_male, $logo, $school_id){
            $data = array(
                'school_id' => $school_id,
                'name' => $name,
                'sign' => $sign,
                'reference_1' => $reference_1,
                'reference_2' => $reference_2,
                'amount' => $amount,
                'work_opportunity' => $work_opportunity,
                'rate_of_male' => $rate_of_male,
                'logo' => $logo
            );
            $this->db->insert('major',$data);
        }
        public function edit_by_id($id,$name, $sign,$reference_1, $reference_2,$amount, $work_opportunity, $rate_of_male, $logo, $school_id){
            $data = array(
                'school_id' => $school_id,
                'name' => $name,
                'sign' => $sign,
                'reference_1' => $reference_1,
                'reference_2' => $reference_2,
                'amount' => $amount,
                'work_opportunity' => $work_opportunity,
                'rate_of_male' => $rate_of_male,
                'logo' => $logo
            );
            $this->db->where('id', $id);
            $this->db->update('major',$data);
        }

    public function get_majors_by_ids($ids){
        if(isset($ids)){
            $this->db->select('*');
            $this->db->from('major');
            $this->db->where_in('id', $ids);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
        return false;
    }
    public function delete_by_id($id){
        if(!empty($id)){
            $this->db->where('id', $id);
            $this->db->delete('major');
        }
        return false;
    }
}