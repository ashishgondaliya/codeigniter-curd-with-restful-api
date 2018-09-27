<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		$this->load->model("student_model");
        
    }
	public function index()
	{
		if(!empty($this->session->flashdata('error'))){
			$this->data["message"]["error"]=$this->session->flashdata('error');
		}
		if(!empty($this->session->flashdata('success'))){
			$this->data["message"]["success"]=$this->session->flashdata('success');
		}
		
		$this->data["records"]=$this->student_model->getList();
		// print_f($this->data["records"]);exit;
		$this->load->view('student/student_list',$this->data);
		
	}
	public function create()
	{
		$this->data["title"]="Add Student";
		$this->data["action"]=base_url("student/store");
		$this->load->view('student/student_add',$this->data);
	}
	public function store()
	{
		// var_dump($this->input->post());
		
		$this->student_model->insert($this->input->post());
		$this->session->set_flashdata('success', 'Recored added sucessfully !!');
		redirect(base_url("student"));
		// var_dump($this->input->get());
		// exit;
	}
	public function edit($id=0)
	{
		
		$this->data["title"]="Edit Student";
		$this->data["action"]=base_url("student/update");
		$record=$this->student_model->getrowbyid($id);
		// print_r($record);exit;
		$this->data["fields"]= $record;
		$this->load->view('student/student_add',$this->data);
	}
	public function update()
	{
		$this->student_model->update($this->input->post());
		$this->session->set_flashdata('success', 'Recored updated sucessfully !!');
		redirect(base_url("student"));
	}
	public function delete($id)
	{
		$this->student_model->delete($id);
		$this->session->set_flashdata('success', 'Recored deleted sucessfully !!');
		redirect(base_url("student"));
	}
}
