<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 19/07/2016
 * Time: 7:19 AM
 */
class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ProductModel');
        $this->load->model('CatalogModel');
    }
   public  function index()
    {
        // lấy ra số lượng các sản phẩm trên website
        $total_row = $this->ProductModel->get_total();
        $this->data['total_row'] = $total_row;
        // thư viện phân trang
        $this->load->library('pagination');
        $config  = array();
        $config['total_rows'] =  $total_row; // tổng tất cả các sản phẩm trên website ;
        $config['base_url'] =  admin_url('product/index'); // link hiển thị dữ lieeu danh sách sản phẩm
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
        // lấy ra biến id trên url để lọc
        $id = $this->input->get("id");
        $name = $this->input->get('name');
        $id = intval($id);
        $input['where'] = array();
        // nếu có biến id thì tìm theo id
        if($id > 0)
        {
            $input['where']['id'] = $id;
        }
        if($name)
        {
            $input['like'] = array('name' , $name);
        }
        $cata = $this->input->get('catalog');
        $cata = intval($cata);
        if ($cata >0 )
        {
            $input['where']['catalog_id'] = $cata;
        }
        // lấy ra danh sách sản phẩm
        $list = $this->ProductModel->get_list($input);
        $this->data['list'] = $list;
        $input = array();
        // lấy ra danh mục sản phẩm có parent_id = 0
        $input['where'] = array('parent_id'=>0);
        // truy vấn
        $catalog = $this->CatalogModel->get_list($input);
        // lặp danh mục
        foreach ($catalog as $item)
        {
            //lấy ra các danh mục con
            $input['where'] = array('parent_id'=>$item->id);
            $subs = $this->CatalogModel->get_list($input);
            $item->subs = $subs;
        }
        // gửi danh mục con sang bên view 
        $this->data['catalog'] =  $catalog;

        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        // load view
        $this->data['temp'] = 'backend/product/index';
        $this->load->view('backend/main',$this->data);
    }
    /*
     * Add sản phẩm
     */
   public function add()
    {
        // lấy ra danh sách sản phẩm
        $input = array();
        $input['where'] = array('parent_id'=>0);
        $catalog = $this->CatalogModel->get_list($input);
        foreach ($catalog as $item)
        {
            $input['where'] = array('parent_id'=>$item->id);
            $subs = $this->CatalogModel->get_list($input);
            $item->subs = $subs;
        }
        $this->data['catalog'] =  $catalog;
        //kiểm tra dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        if($this->input->post())
        {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name','Nhập vào tên sản phẩm','required');
            $this->form_validation->set_rules('price','Nhập vào giá sản phẩm ','required');
            $this->form_validation->set_rules('discount','Nhập vào % giảm giá  ','required');
            $this->form_validation->set_rules('cat','Chọn danh mục sản phẩm ','required');
            $this->form_validation->set_rules('total','Tổng số sản phẩm nhập vào','required');

            // nhâp liệu chính xác
            if($this->form_validation->run())
            {

                $name = $this->input->post('name');
                $price = $this->input->post('price');
                $price = str_replace(',','',$price);
                $cat = $this->input->post('cat');
                $total = $this->input->post('total');

                // lấy tên file ảnh được upload lên 

                $this->load->library('upload_library');
                $upload_path ='./Upload/shop151/images/product/';
                $upload_data = $this->upload_library->upload($upload_path,'image');

                $link_img =$upload_data['file_name'];
                if(isset($upload_data['file_name']))
                {
                    $link_img = $upload_data['file_name'];

                }

               
                $image_list = array();
                $image_list= $this->upload_library->upload_file($upload_path,'image_list');
                $image_list = json_encode($image_list);
                $data= array(
                    'name'=> $name,
                    'price'=>intval($price),
                    'catalog_id'=>$cat,
                    'image_link' =>  $link_img,
                    'image_list' => $image_list,
                    'total' => $total,
                    'discount'     => $this->input->post('discount'),
                    'warranty'     => $this->input->post('warranty'),
                    'gifts'     => $this->input->post('gifts'),
                    'site_title'     => $this->input->post('site_title'),
                    'meta_desc'     => $this->input->post('meta_desc'),
                    'meta_key'     => $this->input->post('meta_key'),
                    'content'     => $this->input->post('content'),
                    'specifications'     => $this->input->post('specifications'),
                    'created'       =>NOW(),

                );
                if($this->ProductModel->create($data))
                {
                    $this->session->set_flashdata('message','Insert  thành công');
                }
                else{
                    $this->session->set_flashdata('message','Lỗi không thể insert dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('product'));
                // thêm vào csdl
            }
        }

        // load view
        $this->data['temp'] = 'backend/product/add';
        $this->load->view('backend/main',$this->data);
    }

    /*
     *  edit sản phẩm
     */
    public function edit()
     {
         $id = $this->uri->rsegment('3');
         $product = $this->ProductModel->get_info($id);
         if(!$product)
         {

             $this->session->set_flashdata('message','Sản phẩm không tồn tại ');
             //redirect(admin_url('product'));
         }
         $this->data['product'] =  $product;
         $input = array();
         $input['where'] = array('parent_id'=>0);
         $catalog = $this->CatalogModel->get_list($input);
         foreach ($catalog as $item)
         {
             $input['where'] = array('parent_id'=>$item->id);
             $subs = $this->CatalogModel->get_list($input);
             $item->subs = $subs;
         }
         $this->data['catalog'] =  $catalog;

         //kiểm tra dữ liệu
         $this->load->library('form_validation');
         $this->load->helper('form');

         if($this->input->post())
         {
             // vào system /language/english để sửa lỗi chũw
             $this->form_validation->set_rules('name','name ','required');
             $this->form_validation->set_rules('price','price ','required');
             $this->form_validation->set_rules('discount','discount ','required');
             $this->form_validation->set_rules('cat','Catagory ','required');

             // nhâp liệu chính xác
             if($this->form_validation->run())
             {

                 $name = $this->input->post('name');
                 $price = $this->input->post('price');
                 $price = str_replace(',','',$price);
                 $cat = $this->input->post('cat');

                 // lấy tên file ảnh được upload lên

                 $this->load->library('upload_library');
                 $upload_path ='./Upload/shop151/images/product/';
                 $upload_data = $this->upload_library->upload($upload_path,'image');

                 $link_img ='';
                 if(isset($upload_data['file_name']))
                 {
                     $link_img = $upload_data['file_name'];

                 }


                 $image_list = array();
                 $image_list= $this->upload_library->upload_file($upload_path,'image_list');
                 $image_list_json = json_encode($image_list);
                 $data= array(
                     'name'=> $name,
                     'price'=>intval($price),
                     'catalog_id'=>$cat,
                     'discount'     => $this->input->post('discount'),
                     'warranty'     => $this->input->post('warranty'),
                     'gifts'     => $this->input->post('gifts'),
                     'site_title'     => $this->input->post('site_title'),
                     'meta_desc'     => $this->input->post('meta_desc'),
                     'meta_key'     => $this->input->post('meta_key'),
                     'content'     => $this->input->post('content'),
                     'specifications'     => $this->input->post('specifications'),


                 );

                 if($link_img !='')
                 {
                     $data['image_link'] = $link_img;
                 }

                 if(!empty($image_list))
                 {
                     $data['image_list'] = $image_list_json;
                 }
                 if($this->ProductModel->update($id,$data))
                 {
                     $this->session->set_flashdata('message','Update thành công');
                 }
                 else{
                     $this->session->set_flashdata('message','Lỗi không thể Update dữ liệu');
                 }
                 // chuyển tới trang danh sách quản trị viên.
                 redirect(admin_url('product'));
                 
             }
         }

         // load view
         $this->data['temp'] = 'backend/product/edit';
         $this->load->view('backend/main',$this->data);
     }

    /*
     * delete sản phẩm
     */

    public function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message','Xóa thành công sản phẩm  ');
        redirect(admin_url('product'));

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
        $product = $this->ProductModel->get_info($id);
        if(!$product)
        {

            $this->session->set_flashdata('message','Sản phẩm không tồn tại ');
            if ($rediect)
            {
                redirect(admin_url('product'));
            }
            else
            {
                return false;
            }
        }

        // thực hiện xóa sản phẩm .
        $this->ProductModel->delete($id);

        // xóa ảnh sản phẩm
        $image_link = "./upload/product/".$product->image_link;
        if(file_exists($image_link))
        {
            unlink( $image_link);
        }

        // xóa các ảnh kem theo .
        $image_list = json_decode($product->image_list);
        if(is_array($image_list))
        {
            foreach ($image_list as $item)
            {
                $image_link = "./upload/product/".$item;
                if(file_exists($image_link))
                {
                    unlink( $image_link);
                }
            }
        }
    }

}

