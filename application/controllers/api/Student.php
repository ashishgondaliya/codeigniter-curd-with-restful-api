<?php
require APPPATH . 'libraries/REST_Controller.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends REST_Controller {

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
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->model("student_model");
        
    }
	public function index_get($id=0)
	{
		// var_dump($id);exit;

		
		if(empty($id))
			$response_array["records"]=$this->student_model->getList();
		else
			$response_array["records"]=$this->student_model->getrowbyid($id);

		if(count($response_array["records"])>0){
			$response_array["status"]="success";
			$this->response($response_array, 200);
		}
		else{
			$response_array["status"]="error";
			$this->response($response_array,self::HTTP_NOT_FOUND );		
		}
		
	}

	public function index_post()
	{
		
		$postData = $this->input->post();
		// var_dump($postData);exit;
		
		if(empty($postData)){
			$response_array["status"]="error";
			$response_array["msg"]="Data is blank.";
			$this->response($response_array,self::HTTP_BAD_REQUEST );		
		}
		else{
			
			$insertedId=$this->student_model->insert($postData);			

			if(!empty($insertedId)){
				$response_array["status"]="success";
				$response_array["records"]=["id"=>$insertedId];
			}else{
				$response_array["status"]="error";
				$response_array["msg"]="Something is not error.";
			}

			$this->response($response_array, 200);
		}
		
		
	}

	public function index_put()
	{
		parse_str(file_get_contents("php://input"),$postData);
		// var_dump($postData);exit;
		

		if(empty($postData)){
			$response_array["status"]="error";
			$response_array["msg"]="Data is blank.";
			$this->response($response_array,self::HTTP_BAD_REQUEST );		
		}
		elseif(empty($postData["id"]))
		{
			$response_array["status"]="error";
			$response_array["msg"]="id is blank.";
			$this->response($response_array,self::HTTP_BAD_REQUEST );		
		}
		else{
			
			$affectedrow=$this->student_model->update($postData);			

			if(!empty($affectedrow)){
				$response_array["status"]="success";				
				$this->response($response_array, 200);
			}else{
				$response_array["status"]="error";
				$response_array["msg"]="Something is not error.";
				$this->response($response_array,self::HTTP_BAD_REQUEST );	
			}

			
		}
		
		
	}
	public function index_delete($id)
	{
		$affectedrow=$this->student_model->delete($id);

		if(!empty($affectedrow)){
			$response_array["status"]="success";				
			$this->response($response_array, 200);
		}else{
			$response_array["status"]="error";
			$response_array["msg"]="id is not avaliable.";
			$this->response($response_array,self::HTTP_BAD_REQUEST );	
		}
	}
}
