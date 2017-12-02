<?php
class Manage_school extends MY_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('school_model');
    }
    public function list(){
        $this->data['schools']=$this->school_model->get_all();
        $this->load->view('school/danhsach',$this->data);
    }

    public  function add(){
        $this->load->view('school/them');
    }


    public function post_add(){
        $name=$this->input->post('name');
        $address=$this->input->post('address');
        $logo=$this->input->post('logo');
        if(isset($name) && isset($address)){
            $data=array(
                'name' =>$name,
                'address' => $address,
                'logo' => $logo
                );
            $this->school_model->add($data);
        }
        redirect('manage_school');
    }

    public function edit($id){
        if(isset($id)){
            $this->data['schools']= $this->school_model->get_by_id($id);
            return $this->load->view('school/sua',$this->data);
        }
        redirect('manage_school');
    }

    public function delete($id){
        if(isset($id)){
            $this->school_model->delete_by_id($id);
        }
        redirect('manage_school');
    }

    public function edit_school(){
        $id=$this->input->post('id');
        $name=$this->input->post('name');
        $address=$this->input->post('address');
        $logo=$this->input->post('logo');
        if(isset($id) && isset($name)){
            $data=array(
                'id' => $id,
                'name' =>$name,
                'address' => $address,
                'logo' => $logo
            );
            $this->school_model->edit_by_id($data);
        }
        redirect('manage_school');
    }

}


