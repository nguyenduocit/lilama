<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 06/08/2016
 * Time: 9:52 PM
 */
class News extends MY_Controller
{
    public function __construct()
    {
       parent::__construct();
        $this->load->model('NewModel');
    }
    /*
     * Hiển thị danh sách bài viết
     */
    public  function index()
    {
        // lấy ra số lượng  bài viêt trên website
        $total_row = $this->NewModel->get_total();
        $this->data['total_row'] = $total_row;
        // thư viện phân trang
        $this->load->library('pagination');
        $config  = array();
        $config['total_rows'] =  $total_row; // tổng tất cả các sản phẩm trên website ;
        $config['base_url'] =  admin_url('new/index'); // link hiển thị dữ lieeu danh sách sản phẩm
        $config['per_page'] =  8; // số sản phẩm hiển thị trên 1 trang
        $config['uri_segment'] = 4; // phân đoạn hiển thị số trnag
        $config['next_link']= 'Next' ; //Nhãn tên của nút Next
        $config['prev_link']= 'Previous' ; //Nhãn tên của nút Previous
        // khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'],$segment );

        // kiem tra có thuc hiện lặp dứ liệu hay không
        $id = $this->input->get("id");
        $title = $this->input->get('title');
        $id = intval($id);
        $input['where'] = array();
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        if($title)
        {
            $input['like'] = array('title' , $title);
        }
        //lấy ra danh sách bài viết
        $list = $this->NewModel->get_list($input);
        $this->data['list'] = $list;

        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        // load view
        $this->data['temp'] = 'backend/news/index';
        $this->load->view('backend/main',$this->data);
    }

    /*
     * Thêm mới bài viết
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
            $this->form_validation->set_rules('title','title ','required');
            $this->form_validation->set_rules('content','content ','required');

            // nhâp liệu chính xác
            if($this->form_validation->run())
            {

                $title = $this->input->post('title');
                // lấy tên file ảnh được upload lên

                $this->load->library('upload_library');
                $upload_path ='./upload/news';
                $upload_data = $this->upload_library->upload($upload_path,'image');

                $link_img ='';
                if(isset($upload_data['file_name']))
                {
                    $link_img = $upload_data['file_name'];

                }


                $data= array(
                    'title'=> $title,
                    'image_link' =>  $link_img,
                    'meta_desc'     => $this->input->post('meta_desc'),
                    'meta_key'     => $this->input->post('meta_key'),
                    'content'     => $this->input->post('content'),
                    'created'       =>NOW(),

                );
                if($this->NewModel->create($data))
                {
                    $this->session->set_flashdata('message','Insert  thành công');
                }
                else{
                    $this->session->set_flashdata('message','Lỗi không thể insert dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('news'));
                // thêm vào csdl
            }
        }

        // load view
        $this->data['temp'] = 'backend/news/add';
        $this->load->view('backend/main',$this->data);
    }
    /*
     * Chỉnh sửa bài viết .
     */
    public function edit()
    {
        $id = $this->uri->rsegment('3');
        $new = $this->NewModel->get_info($id);
        if(!$new)
        {

            $this->session->set_flashdata('message','Bài viết không tồn tại ');
            //redirect(admin_url('product'));
        }
        $this->data['news'] = $new;
        $this->load->library('form_validation');
        $this->load->helper('form');

        if ($this->input->post()) {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('title', 'title ', 'required');
            $this->form_validation->set_rules('content', 'content ', 'required');

            // nhâp liệu chính xác
            if ($this->form_validation->run()) {

                $title = $this->input->post('title');
                // lấy tên file ảnh được upload lên

                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $link_img = '';
                if (isset($upload_data['file_name'])) {
                    $link_img = $upload_data['file_name'];

                }


                $data = array(
                    'title' => $title,
                    'meta_desc' => $this->input->post('meta_desc'),
                    'meta_key' => $this->input->post('meta_key'),
                    'content' => $this->input->post('content'),
                    'created' => NOW(),

                );

                if ($link_img != '') {
                    $data['image_link'] = $link_img;
                }
                echo $this->NewModel->update($id, $data);
                if ($this->NewModel->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Update  thành công');
                } else {
                    $this->session->set_flashdata('message', 'Lỗi không thể update dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('news'));

            }
        }

        // load view
        $this->data['temp'] = 'backend/news/edit';
        $this->load->view('backend/main', $this->data);

    }

    /*
     * Delete Bài viết
     */
    public function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message','Xóa thành công bài viết ');
        redirect(admin_url('news'));

    }

    /*
     * Xóa nhiều sản phẩm
     */
    public function deleteAll()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id ,false);
        }
    }

    private  function _del($id, $rediect = true)
    {
        $new = $this->NewModel->get_info($id);
        if(!$new)
        {

            $this->session->set_flashdata('message','Bài viết không tồn tại ');
            if ($rediect)
            {
                redirect(admin_url('news'));
            }
            else
            {
                return false;
            }
        }

        // thực hiện xóa sản phẩm .
        $this->NewModel->delete($id);

        // xóa ảnh sản phẩm
        $image_link = "./upload/product/".$new->image_link;
        if(file_exists($image_link))
        {
            unlink( $image_link);
        }

    }
}