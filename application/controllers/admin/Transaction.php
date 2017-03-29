<?php

/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 07/10/2016
 * Time: 11:54 PM
 */
class Transaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('TransactionModel');
        $this->load->model('CatalogModel');
    }
    /*
     * Danh sách giao dich cua website
     */
    public  function index()
    {
        // lấy ra số lượng các giao dich trên website
        $total_row = $this->TransactionModel->get_total();
        $this->data['total_row'] = $total_row;
        // thư viện phân trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_row; // tổng tất cả các sản phẩm trên website ;
        $config['base_url'] = admin_url('transaction/index'); // link hiển thị dữ lieeu danh sách sản phẩm
        $config['per_page'] = 8; // số sản phẩm hiển thị trên 1 trang
        $config['uri_segment'] = 4; // phân đoạn hiển thị số trnag
        $config['next_link'] = 'Next'; //Nhãn tên của nút Next
        $config['prev_link'] = 'Previous'; //Nhãn tên của nút Previous
        // khởi tạo cấu hình phân trang
        $this->pagination->initialize($config);

        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        // kiem tra có thuc hiện lặp dứ liệu hay không
        $id = $this->input->get("id");

        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['id'] = $id;
        }

        // lấy ra danh sách sản phẩm
        $list = $this->TransactionModel->get_list($input);
        $this->data['list'] = $list;
        
        // lấy ra nội dung của biến message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        // load view
        $this->data['temp'] = 'backend/transaction/index';
        $this->load->view('backend/main', $this->data);
    }

    /*
     * xem chi tiết hóa đơn :
     */
    function order()
    {
        
        $this->data['temp'] = 'backend/transaction/view_order';
        $this->load->view('backend/main', $this->data);
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