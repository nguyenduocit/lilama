<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 07/08/2016
 * Time: 4:40 PM
 */
class Slide extends  MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SlideModel');
    }
    /*
     * Hiển thị danh sách
     */
    public  function index()
    {
        // lấy ra số lượng  Slide trên website
        $total_row = $this->SlideModel->get_total();
        $this->data['total_row'] = $total_row;

        $input = array();
        
        //lấy ra danh sách Slide
        $list = $this->SlideModel->get_list($input);
        $this->data['list'] = $list;

        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        // load view
        $this->data['temp'] = 'backend/slide/index';
        $this->load->view('backend/main',$this->data);
    }

    /*
     * Thêm mới slide
     *
     */
    public function add()
    {

        //kiểm tra dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        if($this->input->post())
        {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name','name','required');

            // nhâp liệu chính xác
            if($this->form_validation->run())
            {

                $name = $this->input->post('name');
                // lấy tên file ảnh được upload lên

                $this->load->library('upload_library');
                $upload_path ='./upload/shop151/images/slider';
                $upload_data = $this->upload_library->upload($upload_path,'image');

                $link_img ='';
                if(isset($upload_data['file_name']))
                {
                    $link_img = $upload_data['file_name'];

                }


                $data= array(
                    'name'=> $name,
                    'image_link' =>  $link_img,
                    'link'     => $this->input->post('link'),
                    'info'     => $this->input->post('info'),
                    'sort_order'     => $this->input->post('sort_order'),

                );
                if($this->SlideModel->create($data))
                {
                    $this->session->set_flashdata('message','Insert  thành công');
                }
                else{
                    $this->session->set_flashdata('message','Lỗi không thể insert dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('slide'));
                // thêm vào csdl
            }
        }

        // load view
        $this->data['temp'] = 'backend/slide/add';
        $this->load->view('backend/main',$this->data);
    }

    /*
     * Edit slide
     */

    public function edit()
    {
        $id = $this->uri->rsegment('3');
        $slide = $this->SlideModel->get_info($id);
        if(!$slide)
        {

            $this->session->set_flashdata('message','Slide không tồn tại ');
            redirect(admin_url('slide'));
        }

        $this->data['slide'] = $slide;
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name','name','required');

            // nhâp liệu chính xác
            if($this->form_validation->run())
            {

                $name = $this->input->post('name');
                // lấy tên file ảnh được upload lên

                $this->load->library('upload_library');
                $upload_path ='./upload/shop151/images/slider';
                $upload_data = $this->upload_library->upload($upload_path,'image');

                $link_img ='';
                if(isset($upload_data['file_name']))
                {
                    $link_img = $upload_data['file_name'];

                }


                $data= array(
                    'name'=> $name,
                    'link'     => $this->input->post('link'),
                    'info'     => $this->input->post('info'),
                    'sort_order'     => $this->input->post('sort_order'),

                );

                if ($link_img != '') {
                    $data['image_link'] = $link_img;
                }
                if($this->SlideModel->update($id,$data))
                {
                    $this->session->set_flashdata('message','Update  thành công');
                }
                else{
                    $this->session->set_flashdata('message','Lỗi không thể update dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('slide'));
                // thêm vào csdl
            }
        }

        // load view
        $this->data['temp'] = 'backend/slide/edit';
        $this->load->view('backend/main', $this->data);

    }

    /*
     * Xóa Slide
     */
    public function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message','Xóa thành công slide ');
        redirect(admin_url('slide'));

    }

    private  function _del($id, $rediect = true)
    {
        $slide = $this->SlideModel->get_info($id);
        if(!$slide)
        {

            $this->session->set_flashdata('message','Slide không tồn tại ');
            if ($rediect)
            {
                redirect(admin_url('slide'));
            }
            else
            {
                return false;
            }
        }

        // thực hiện xóa sản phẩm .
        $this->SlideModel->delete($id);

        // xóa ảnh sản phẩm
        $image_link = "./upload/shop151/images/slider/".$slide->image_link;
        if(file_exists($image_link))
        {
            unlink( $image_link);
        }

    }
}