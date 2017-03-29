<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 13/08/2016
 * Time: 9:35 PM
 */
class User extends  MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('UserModel');
        $this->load->library('form_validation');
        $this->load->helper('form');

    }

    /*
     *  Kiểm tra email đã tồn tại hay chưa
     */
    function check_email()
    {
        $email = $this->input->post('email');
        $where = array('email'=> $email);
        if($this->UserModel->check_exists($where))
        {
            // trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__,'Email khoản đã tồn tại');
            return false;

        }
        else{
            return true;
        }

    }

    /*
     * hàm đăng ký thành viên
     */

    function register()
    {

        // nếu có dữ liêu post lên thì kiểm tra

        if($this->input->post()) {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name', 'Tên tài khoản', 'required');
            $this->form_validation->set_rules('email', 'Email đăng nhập', 'required|callback_check_email');
            $this->form_validation->set_rules('password', 'Nhập vào mật khẩu', 'required|min_length[8]');
            $this->form_validation->set_rules('repassword', 'Mật khẩu không trùng khớp.', 'required|matches[password]');
            $this->form_validation->set_rules('user_name', 'Nhập vào họ và tên', 'required');
            $this->form_validation->set_rules('phone', 'Số điện thoai ở định dạng số', 'required|numeric');
            // nhâp liệu chính xác
            if ($this->form_validation->run()) {
                $name = $this->input->post('name');
                $username = $this->input->post('user_name');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $password = md5($password);
                $sex = $this->input->post('sex');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $data = array(
                    'user_name' => $username,
                    'name' => $name,
                    'email' => $email,
                    'password' => $password,
                    'sex' => $sex,
                    'phone' =>$phone,
                    'address' =>$address,
                    'created' =>NOW(),

                );
                if ($this->UserModel->create($data)) {
                    $user = $this->get_user_info();
                    $this->session->set_userdata('user_login',$user->id);
                    $this->session->set_flashdata('message', 'Đăng ký thành công ');
                } else {
                    $this->session->set_flashdata('error', ' Lồi không thể đăng ký tài khoản');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(base_url());
                // thêm vào csdl
            }
        }

        $this->data['temp'] = 'fontend/user/register';
        $this ->load ->view('fontend/details',$this->data);
    }

    /*
     * check login
     */

    function login()
    {


        if($this->input->post())
        {
            $this->form_validation->set_rules('email', 'Nhập vào email đăng nhập', 'required');
            $this->form_validation->set_rules('password', 'Nhập vào mật khẩu', 'required|min_length[8]');

            $this->form_validation->set_rules('login','login','callback_check_login');
            if($this->form_validation->run())
            {
                // lấy thông tin thành viên
                $user = $this->get_user_info();
                // gán session id thành viên đăng nhập
                $this->session->set_userdata('user_login',$user->id);
                $this->session->set_flashdata('message', 'Đăng nhâp thành công ');
                redirect(base_url());
            }
            else{
                $this->session->set_flashdata('error', ' Lồi không thể đăng nhập tài khoản');
            }


        }
        $this->data['temp'] = 'fontend/user/login';
        $this ->load ->view('fontend/details',$this->data);
    }

    function check_login()
    {
        //$user = $this->get_user_info();
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        $where = array('email'=>$email , 'password'=>$password);
        if($this ->UserModel->get_info_rule($where))
        {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__,'Thông tin tài khoản không chính xác');
        return false;


    }
    /*
     * lấy ra thông tin thành viên
     */
    function  get_user_info()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password = md5($password);
        $where = array('email'=>$email , 'password'=>$password);
        $user = $this ->UserModel->get_info_rule($where);
        return $user;

    }
    /*
     * chỉnh sứa thông tin thành viên
     */

    function  member()
    {
        if(!$this->session->userdata('user_login'))
        {
            redirect(base_url('user/login'));
        }
        $this->load->library('form_validation');
        $this->load->helper('form');
        $id = intval($this->uri->rsegment('3'));

        // nếu có dữ liêu post lên thì kiểm tra

        if($this->input->post()) {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('user_name', 'Nhập vào họ và tên', 'required');
            $this->form_validation->set_rules('phone', 'Số điện thoai ở định dạng số', 'required|numeric');
            // nhâp liệu chính xác
            if ($this->form_validation->run()) {
                $username = $this->input->post('user_name');
                $sex = $this->input->post('sex');
                $phone = $this->input->post('phone');
                $address = $this->input->post('address');
                $data = array(
                    'user_name' => $username,
                    'sex' => $sex,
                    'phone' =>$phone,
                    'address' =>$address,

                );
                if ($this->UserModel->update($id,$data)) {
                    $this->session->set_flashdata('message','Update thành công');
                } else {
                    $this->session->set_flashdata('error', ' Lồi không thể update tài khoản');
                }
                // chuyển tới trang danh sách quản trị viên.
                //redirect(base_url());
                // thêm vào csdl
            }
        }

        $this->data['temp'] = 'fontend/user/member';
        $this ->load ->view('fontend/details',$this->data);

    }

    function reset_password()
    {

        $this->load->library("session");
        $this->load->library('form_validation');
        $this->load->helper('form');
        echo $id = intval($this->uri->rsegment('3'));

        // nếu có dữ liêu post lên thì kiểm tra

        if($this->input->post()) {
            // vào system /language/english để sửa lỗi chũw

            $this->form_validation->set_rules('PasswordOld', 'Nhập vào mật khẩu cũ.', 'required|min_length[8]');
            $this->form_validation->set_rules('Password', 'Nhập mật khẩu mới .', 'required|min_length[8]');
            $this->form_validation->set_rules('RePassword', 'Nhập lại mật khẩu .', 'required|matches[Password]');
            // nhâp liệu chính xác
            if ($this->form_validation->run()) {
                echo " vao day";
                $PasswordOld = $this->input->post('PasswordOld');
                $PasswordOld = md5($PasswordOld);
                $user = $this->UserModel->get_info($id);
                //kiểm tra passwor có trùng khớp
                if($user ->password == $PasswordOld )
                {
                    echo " vao day";
                    $password = $this->input->post('Password');
                    $password = md5($password);

                    $data = array(

                        'password' => $password,

                    );
                    pre($data);
                    if ($this->UserModel->update($id,$data)) {
                        $user = $this->get_user_info();
                        $this->session->set_userdata('user_login', $user->id);
                        $this->session->set_flashdata('message', 'Thay đổi thành công ');
                    } else {
                        $this->session->set_flashdata('error', ' Mật khẩu không trùng khớp');
                    }
                    // chuyển tới trang danh sách quản trị viên.
                    redirect(base_url());

                }
                else{
                    echo ' Mật khẩu không trùng khớp';
                    $this->session->set_flashdata('error', ' Mật khẩu không trùng khớp');
                }

                // thêm vào csdl
            }
        }
        $this->data['temp'] = 'fontend/user/reset_password';
        $this ->load ->view('fontend/details',$this->data);

    }

    function logout()
    {
        if($this->session->userdata('user_login'))
        {
            $this->session->unset_userdata('user_login');
        }
        redirect(base_url('user/login'));
    }

}