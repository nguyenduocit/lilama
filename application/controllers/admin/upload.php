<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 01/08/2016
 * Time: 3:00 PM
 */
class Upload extends  MY_Controller
{
    function index()
    {
        if($this->input->post('submit'))
        {
            $this->load->library('upload_library');
            $upload_path ='./upload/user';
            $data= $this->upload_library->upload($upload_path,'image');

        }
        $this->data['temp'] = 'backend/upload/index';
        $this->load->view('backend/main',$this->data);
    }

    function upload_file()
    {

        if($this->input->post('submit')) {
            $this->load->library('upload_library');
            $upload_path ='./upload/user';
            $data= $this->upload_library->upload_file($upload_path,'image');
            //pre($data);
        }
        $this->data['temp'] = 'backend/upload/upload_file';
        $this->load->view('backend/main',$this->data);
    }
}