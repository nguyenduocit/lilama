<?php
/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 12/07/2016
 * Time: 9:40 AM
 */
class MY_Controller extends CI_Controller
{
    public $data = array();
    public function __construct()
    {
        // kế thừa từ CI Controller
       parent::__construct();

        $contro = $this->uri->segment(1);
        switch ($contro)
        {
            case 'admin':
                // xủ lý truy cập vào trang admin
                $this->load->helper('admin');
                $this->check_login();
                break;
            default:
                // truy cập ngoài trang admin 
                $this->load->model('CatalogModel');
                $input= array();
                $input['where'] = array('parent_id'=>0);
                $input['order'] = array('sort_order','ASC');
                $catalog_list= $this->CatalogModel->get_list($input);
                foreach ($catalog_list as $item)
                {
                    $input['where'] = array('parent_id'=>$item->id ,'activel'=>0);
                    // lấy ra danh mục con
                    $sub = $this->CatalogModel->get_list($input);

                    // gán tất cả danh mục con vào biến sub lấy ra xong lại lưu lại 
                    $item->sub=$sub;
                }
                $this->data['catalog_list'] = $catalog_list;
                
                // kiểm tra xem thành viên đã đăng nhập chưa
                $user_login = $this->session->userdata('user_login');
                $this->data['user_login'] = $user_login;
                // nếu đã đăng nhạp thành công thì lấy thông tin thành viên
                if($user_login)
                {
                    $this->load->model('UserModel');
                    $user_info = $this->UserModel->get_info($user_login);
                    $this->data['user_info'] = $user_info;
                }

                $this->load->model('IntroModel');
                //lấy ra thông tin bảng giới thiệu
                $list_info = $this->IntroModel->get_list();
                $this->data['list_info'] = $list_info;

                $this->session->set_flashdata('list_info', $list_info );

                // goi toi thuw vien
                $this->load->library('cart');
                $this->data['total_item'] = $this->cart->total_items();

                break;
        }
    }

    private function check_login()
    {
        // lấy controller trên thanh địa chỉ
        $controler = $this->uri->rsegment('1');
        // chuyển về chữ thường và kiểm tra
        $controler = strtolower($controler);
        // gán biến session 
        $login = $this->session->userdata('login');
        // nếu chưa đăng nhạp và controller khác login
        if(!$login && $controler != 'login')
        {
            redirect(admin_url('login'));
        }
        // nếu admin đã đăng nhập thì không cho vào trang admin
        if($login && $controler =='login')
        {
            redirect(admin_url('home'));
        }


    }
}