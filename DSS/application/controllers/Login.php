<?php
class Login extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index(){
    	if($this->input->post()){
    		$this->form_validation->set_rules('login','login','callback_check_login','check_login');
    		if($this->form_validation->run()){
    			$user=$this->input->post('account_name');
    			$this->session->set_userdata('login',$user);
    			redirect('main');
    		}
    	}
    	$this->load->view('home/login');
    }

    public function check_login(){
    	$account_name=$this->input->post('account_name');
    	$password=$this->input->post('password');
    	if(isset($account_name) && isset($password)){
    		$data=array('account_name' => $account_name,'password' => $password);
    		if($this->Admin_model->check_exists($data)){	
    			return True;
    		}else{
    			$this->form_validation->set_message('check_login','Tài khoản hoặc mật khẩu không đúng');
    			return false;
    		}

    	}
    }

    public function logout(){
    	if($this->session->userdata('login')){
    		$this->session->unset_userdata('login');
    		redirect('main');
    	}
    	return false;


    }


}
?>