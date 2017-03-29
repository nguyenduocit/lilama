<?php 
	/**
	* 
	*/
	class Contact extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('ContactModel');
		}

		public function index()
		{

			$list = $this->ContactModel->get_list();

			$this->data['list'] = $list;
			$this->data['temp'] = 'backend/contact/index';
        	$this->load->view('backend/main',$this->data);
		}
	}
?>