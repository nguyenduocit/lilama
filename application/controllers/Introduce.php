<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 04/09/2016
 * Time: 1:41 PM
 */
class Introduce extends  MY_Controller
{
	public function __construct()
	{
		 parent::__construct();
		$this->load->model("IntroModel");
	}

    function index()
    {
    	$list = $this->IntroModel->get_list();
        $this->data['list'] = $list;

        $this->data['temp']= "fontend/introduce/introduce";
        $this ->load ->view('fontend/details',$this->data);
    }


}