<?php
/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 13/07/2016
 * Time: 6:15 PM
 */
class Home extends MY_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TransactionModel');
        $this->load->model('NewModel');
        $this->load->model('ProductModel');
        $this->load->model('CatalogModel');
        $this->load->model('UserModel');
    }
    /*
     * Danh sách giao dich cua website
     */
    public  function index()
    {
        $total_row = $this->TransactionModel->get_total();
        $total_row_pr = $this->ProductModel->get_total();
        $total_row_nw = $this->NewModel->get_total();
        $total_row_us = $this->UserModel->get_total();
        $this->data['total_row_us'] = $total_row_us;
        $this->data['total_row_nw'] = $total_row_nw;
        $this->data['total_row_pr'] = $total_row_pr;
        $this->data['total_row'] = $total_row;
        $listtt = $this->TransactionModel->get_list();
        $this->data['listtt'] = $listtt;

        // lấy ra danh sách sản phẩm
        $input = array();
        $input['order'] = array('created','DESC');
        $input['limit'] = array(5,0);
        $list = $this->TransactionModel->get_list($input);
        $this->data['list'] = $list;

        // lấy ra doanh so ban theo ngay .

        $inputs = array();
        $inputs['where'] = array('created' => NOW());
        $lists = $this->TransactionModel->get_list($inputs);
        $this->data['lists'] = $lists;
        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        // load view
        $this->data['temp']='backend/home/index';
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
        redirect(admin_url('transaction'));

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
        $transaction = $this->TransactionModel->get_info($id);
        if(!$transaction)
        {

            $this->session->set_flashdata('message','Không tồn tại giao dịch');
            if ($rediect)
            {
                redirect(admin_url('transaction'));
            }
            else
            {
                return false;
            }
        }

        // thực hiện xóa giao dịch
        $this->TransactionModel->delete($id);


    }

}