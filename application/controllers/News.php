<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 30/09/2016
 * Time: 3:13 PM
 */
class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('NewModel');

    }
    function index()
    {
        // lấy danh sách bài viết mới
        $input= array();
        // lấy ra số lượng bài viết
        $total_row = $this->NewModel->get_total();
        $this->data['total_row'] = $total_row;
        // thư viện phân trang
        $this->load->library('pagination');
        $config  = array();
        $config['total_rows'] =  $total_row; // tổng tất cả các bài viết ;
        $config['base_url'] =  base_url('news/index'); // link hiển thị dữ lieeu danh sách bài viết
        $config['per_page'] = 4; // số sản phẩm hiển thị trên 1 trang
        $config['uri_segment'] = 4; // phân đoạn hiển thị số trnag
        $config['next_link']= 'Next' ; //Nhãn tên của nút Next
        $config['prev_link']= 'Previous' ; //Nhãn tên của nút Previous
        // khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input['limit'] = array($config['per_page'],$segment );

        $new_list = $this->NewModel->get_list($input);
        $this->data['news'] = $new_list;

        $this->load->model('IntroModel');
        //lấy ra thông tin bảng giới thiệu
        $list_info = $this->IntroModel->get_list();
        $this->data['list_info'] = $list_info;

        $this->session->set_flashdata('list_info', $list_info );

        $this->data['temp']= "fontend/news/index";
        $this ->load ->view('fontend/details',$this->data);
    }

    function news()
    {
        $input = array();
        $input['order'] = array('count_view','DESC');
        $input['limit'] = array(5,0);
        $new_list = $this->NewModel->get_list($input);
        pre($new_list);
        $this->data['new_list'] = $new_list;
        $this->data['temp']= "fontend/news/left_new";
        $this ->load ->view('fontend/details',$this->data);
    }

    function view()
    {
        $id = intval($this->uri->rsegment('3'));
        $id = intval($id);
        $new = $this->NewModel->get_info($id);
        $this->data['new'] = $new;
        $this->data['temp']= "fontend/news/view_new";
        $this ->load ->view('fontend/details',$this->data);
    }


}