<?php
// echo APPPATH . 'libraries/REST_Controller.php';exit;
require APPPATH . 'libraries/REST_Controller.php';

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends REST_Controller {

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
	}
	
	public function index_get($id=0)
	{
		var_dump($id);exit;
		// $id = $this->input->get('id');
		// echo $id;exit;
		$response_array=[
			"status"=>"error"
		];
		
		if($response_array["status"]=="error")
			$this->response($response_array,self::HTTP_NOT_FOUND );
		else
			$this->response($response_array, 200);

	}
	public function index_post()
	{
		$postData = $this->input->post();
		var_dump($postData);exit;
		$this->response($data, 200);
	}
	public function index_put()
	{
		parse_str(file_get_contents("php://input"),$postData);

		var_dump($postData);exit;
		$this->response($postData, 200);
	}
	public function index_delete($id=0)
	{
		var_dump($id);exit;
		$this->response($postData, 200);
	}
	
}
