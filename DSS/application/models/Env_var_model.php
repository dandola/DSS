<?php
/**
 * Created by PhpStorm.
 * User: nghiaduongtrung
 * Date: 11/23/17
 * Time: 5:03 PM
 */

class Env_var_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function get_all(){
            $this->db->select('*');
            $this->db->from('env_var');
            $data=$this->db->get();
            return $data->result();
    }
    public function edit($data){
            if(!empty($data['id'])){
                $this->db->where('id',$data['id']);
                $this->db->update('env_var',$data);
            }
        }

    public function add($name,$type,$weight){
            if(!empty($name) && !empty($type) && !empty($weight)){
                $data=array(
                    'name'=> $name,
                    'type'=> $type,
                    'weight'=>$weight
                );
                $this->db->insert('env_var',$data);
            }

    }
    public function get_by_id($id){
        if(isset($id)){
            $this->db->select('*');
            $this->db->from('env_var');
            $this->db->where('id', $id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result;
            }
        }
        return false;
    }
    public function get_weights_by_types($types){
        if(isset($types)){
            $this->db->select('id, name, weight');
            $this->db->from('env_var');
            $this->db->where_in('type', $types);
            $this->db->order_by('id', 'asc');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }
        }
        return false;
    }

     public function get_env_vars_by_ids($ids){
        if(isset($ids)){
            $this->db->select('*');
            $this->db->from('env_var');
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
            $this->db->delete('env_var');
        }
        return false;
    }
}