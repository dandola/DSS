<?php
class Manage_env_var extends CI_Controller{
	 public function __construct(){
        parent::__construct();
        $this->load->model('env_var_model');
    	}
    public function list(){
                $this->data['env_vars']=$this->env_var_model->get_all();
                $this->load->view('env_var/danhsach',$this->data);
     }

    public  function add(){
             $this->load->view('env_var/them');
        }
    public  function post_add(){ 
        $name=$this->input->post("name");
        $type=$this->input->post("type");
        $weight=$this->input->post("weight");
        if(isset($name) && isset($type) && isset($weight)){
             $this->env_var_model->add($name, $type,$weight);
        }
        redirect('manage_env_var');
    }
    public function edit($id){
        if(isset($id)){
          $this->data['env_vars']=$this->env_var_model->get_env_vars_by_ids($id);
        }
        $this->load->view('env_var/sua',$this->data);

        }
    public function edit_env_var(){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $type=$this->input->post('type');
        $weight=$this->input->post('weight');
        if(isset($id) && isset($name) && isset($type) && isset($weight)){
            $data=array(
              'id' => $id,
              'name' => $name,
              'type' => $type,
              'weight' => $weight
            );
            $this->env_var_model->edit($data);
        }
        redirect('manage_env_var');

    }
    public function delete($id){
      if(isset($id)){
            $data=$this->env_var_model->delete_by_id($id);
      }
      redirect('manage_env_var');
    }

}

?>