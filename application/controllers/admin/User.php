<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 03/10/2016
 * Time: 9:01 AM
 */
class User extends  MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }
    /*
     * LẤY RA DANH SÁCH ADMIN
     */
    function index()
    {
        $input = array();
        $list= $this->UserModel->get_list($input);
        $this->data['list'] = $list;
        $total = $this->UserModel->get_total();
        $this->data['total'] = $total;
        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'backend/user/index';
        $this->load->view('backend/main',$this->data);
    }

    /*
     *  Kiểm tra user name đã tồn tại hay chưa
     */
    function check_username()
    {
        $username = $this->input->post('username');
        $where = array('username'=> $username);
        if($this->AdminModel->check_exists($where))
        {
            // trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__,'Tài khoản đã tồn tại');
            return false;

        }
        else{
            return true;
        }

    }

    function delete()
    {
        $id= $this->uri->rsegment(3);
        $id = intval($id);
        // thực hiên xóa
        if($this->UserModel->delete($id))
        {
            $this->session->set_flashdata('message','Delete  thành công');
        }
        else{
            $this->session->set_flashdata('message','Lỗi không thể delete  dữ liệu');
        }

        // chuyển tới trang danh sách quản trị viên.
        redirect(admin_url('user'));

    }


}