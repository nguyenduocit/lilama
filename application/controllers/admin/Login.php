<?php
    class Login extends MY_Controller
    {
        public function index()
        {
            // load ra các thư viện validate và session
            $this->load->library('form_validation');
            $this->load->library("session");
            $this->load->helper('form');
            // kiểm tra có tồn tại biến post
            if($this->input->post())
            {
                $this->form_validation->set_rules('login','login','callback_check_login');
                if($this->form_validation->run())
                {
                    $this->session->set_userdata('login',true);
                    redirect(admin_url('home'));
                }


            }
            $this->load->view('backend/login/index');
        }

        // hàm check login 
        function check_login()
        {
            // gán giá trị cho username  và pass word
            $username = $this->input->post('username');
            $passwod = $this->input->post('password');
            // load ra model admin 
             $this->load->model('AdminModel');
             // gán điều kiện 
            $where = array('username'=>$username , 'password'=>$passwod);
            // kiểm tra xem check trả về giá trị hoặc không có giá trị
            if($this->AdminModel->check_exists($where))
            {
                $input['where'] = array('username'=>$username ,'password'=>$passwod);
                $user = $this->AdminModel->get_list($input);
                

                $userdata = array();
                foreach ($user as $key => $value) {
                    # code...
                    $userdata[] = $value;
                }
                
                $this->session->set_userdata('userdata',$userdata);
                return true;
            }
            $this->form_validation->set_message(__FUNCTION__,'Thông tin tài khoản không chính xác');
            return false;


        }
    }
?>