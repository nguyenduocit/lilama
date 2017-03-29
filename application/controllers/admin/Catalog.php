<?php
/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 17/07/2016
 * Time: 9:59 AM
 */
class Catalog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CatalogModel');
    }

    function index()
    {
        $list = $this->CatalogModel->get_list();
        // lấy ra tổng số sản phẩm
        $total = $this->CatalogModel->get_total();
        $this->data['total'] = $total;
        $this->data['list'] = $list;
        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // load ra view
        $this->data['temp'] = 'backend/catalog/index';
        $this->load->view('backend/main',$this->data);
    }
    // thêm mới dữ liệu

    function add()
    {
        //kiểm tra dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        if($this->input->post())
        {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name','Nhập vào tên danh mục sản phẩm ','required');

            // nhâp liệu chính xác
            if($this->form_validation->run())
            {

                $name = $this->input->post('name');
                $icon = $this->input->post('icon');
                $sort_order = $this->input->post('sort_order');
                $parent_id = $this->input->post('parent_id');
                $active = $this->input->post('rdoStatus');
                $data= array(
                    'name'=> $name,
                    'sort_order'=>intval($sort_order),
                    'parent_id'=>$parent_id,
                    'icon' => $icon,
                    'activel' =>$active,

                );
                if($this->CatalogModel->create($data))
                {
                    $this->session->set_flashdata('message','Insert  thành công');
                }
                else{
                    $this->session->set_flashdata('message','Lỗi không thể insert dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('catalog'));
                // thêm vào csdl
            }
        }
         // lấy ra danh mục cha
        $input = array();
        $input['where'] = array('parent_id'=>0);
        $lists = $this->CatalogModel->get_list($input);
        $this->data['lists'] = $lists;

        $this->data['temp'] = 'backend/catalog/add';
        $this->load->view('backend/main',$this->data);

    }
    function edit()
    {

        //kiểm tra dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        // lấy ra dữ liệu để hiển thị
        $id = $this->uri->rsegment(3);
        $list = $this->CatalogModel->get_info($id);
        if(!$list)
        {
            $this->session->set_flashdata('message','Không tồn tại danh mục sản phẩm');
            redirect(admin_url('catalog'));
        }
        $this->data['list'] = $list;
        if($this->input->post())
        {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name','Nhập vào tên danh mục sản phẩm ','required');

            // nhâp liệu chính xác
            if($this->form_validation->run())
            {

                $name = $this->input->post('name');
                $sort_order = $this->input->post('sort_order');
                $parent_id = $this->input->post('parent_id');
                $icon = $this->input->post('icon');
                $data= array(
                    'name'=> $name,
                    'sort_order'=>$sort_order,
                    'parent_id'=>$parent_id,
                    'icon' => $icon,

                );
                if($this->CatalogModel->update($id,$data))
                {
                    $this->session->set_flashdata('message','Update  thành công');
                }
                else{
                    $this->session->set_flashdata('message','Lỗi không thể Update dữ liệu');
                }
                // chuyển tới trang danh sách quản trị viên.
                redirect(admin_url('catalog'));
                // thêm vào csdl
            }
        }
         // lấy ra danh mục cha
        $input = array();
        $input['where'] = array('parent_id'=>0);
        $lists = $this->CatalogModel->get_list($input);
        $this->data['lists'] = $lists;

        $this->data['temp'] = 'backend/catalog/edit';
        $this->load->view('backend/main',$this->data);

    }

    function delete()
    {
        $id = $this->uri->rsegment(3);
        $this->_del($id);
        $this->session->set_flashdata('message','Delet thành công danh mục sản phẩm');
        redirect(admin_url('catalog'));


    }
    /*
     * Xóa nhiều sản phẩm
     */
    public  function deleteAll()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id)
        {
            $this->_del($id,false);
        }
        $this->session->set_flashdata('message','Delet thành công danh mục sản phẩm');
        redirect(admin_url('catalog'));
    }

//POST http://localhost/www/CodeIgniter/admin/product/deleteAll

/*
 * Thực hiện xóa
 */
    private function _del($id , $rediect = true)
    {
        $info =$this->CatalogModel->get_info($id);
        if(!$info)
        {
            $this->session->set_flashdata('message','Không tồn tại danh mục sản phẩm');
            if ($rediect)
            {
                redirect(admin_url('catalog'));
            }
            else
            {
                return false;
            }
        }
        // kiểm tra xem danh mục này có sản phẩm không
        $this->load->model('ProductModel');
        $product = $this->ProductModel->get_info_rule(array('catalog_id'=>$id,'id'));
        if($product)
        {
            $this->session->set_flashdata('message','Không thể xóa danh mục sản phẩm ( thực hiện xóa danh mục sản phẩm trước)');
            if ($rediect)
            {
                redirect(admin_url('catalog'));
            }
            else
            {
                return false;
            }

        }
        $this->CatalogModel->delete($id);

    }


}