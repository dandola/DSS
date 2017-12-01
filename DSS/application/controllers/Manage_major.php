<?php
class Manage_major extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('major_model');
         $this->load->model('school_model');
	}

    public function list(){
        $this->data['majors']=$this->major_model->get_all();
        $this->load->view('major/danhsach',$this->data);
    }

    public  function add(){
        $this->data['schools']=$this->school_model->get_all();
        $this->load->view('major/them',$this->data);
 	}

    public  function post_add(){ 
        $name=$this->input->post("name");
        $sign=$this->input->post("sign");
        $reference_1=$this->input->post("reference_1");
        $reference_2=$this->input->post("reference_2");
        $amount=$this->input->post("amount");
        $work_opportunity=$this->input->post("work_opportunity");
        $rate_of_male=$this->input->post("rate_of_male");
        $logo=$this->input->post("logo");
        $school_id=$this->input->post("school_id");
        $this->major_model->add($name, $sign,$reference_1, $reference_2,$amount, $work_opportunity, $rate_of_male, $logo, $school_id);
         redirect('manage_major');
    }
 	public function edit($id){
        $this->data['schools']=$this->school_model->get_all();
        $this->data['majors']=$this->major_model->get_majors_by_ids($id);
         $this->load->view('major/sua',$this->data);
 		}
   
    public  function edit_major(){ 
        $id=$this->input->post("id");
        $name=$this->input->post("name");
        $sign=$this->input->post("sign");
        $reference_1=$this->input->post("reference_1");
        $reference_2=$this->input->post("reference_2");
        $amount=$this->input->post("amount");
        $work_opportunity=$this->input->post("work_opportunity");
        $rate_of_male=$this->input->post("rate_of_male");
        $logo=$this->input->post("logo");
        $school_id=$this->input->post("school_id");

        if(!empty($id) && !empty($school_id)){
            $this->major_model->edit_by_id($id,$name, $sign,$reference_1, $reference_2,$amount, $work_opportunity, $rate_of_male, $logo, $school_id);
        }
        redirect('manage_major');
    }


 	public function delete($id){
        if(isset($id) && is_numeric($id)){
            $data = $this->major_model->delete_by_id($id);
        }
        redirect('manage_major');
	}

}
