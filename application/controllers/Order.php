<?php
class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    /*
    * lấy thông tin khách hàng
    */
    function check_out()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        // thong tin gio hang
        $cartss = $this->cart->contents();
        $total_ac = 0;
        foreach ($cartss as $item)
        {
            $total_ac = $total_ac + $item['subtotal'];
        }
        // tong so san pahm
        $total_item = $this->cart->total_items();
        if($total_item <= 0)
        {
            redirect(base_url());
        }
        $user_id = 0;
        $user = "";
        if($this->session->userdata('user_login'))
        {
            $user_id = $this->session->userdata('user_login');
            $user = $this->UserModel->get_info($user_id);
        }

        $this->data['user'] = $user;


        // insert thông tin khách hàng vào csdl
        if($this->input->post()) {
            // vào system /language/english để sửa lỗi chũw
            $this->form_validation->set_rules('name', 'Tên tài khoản', 'required');
            $this->form_validation->set_rules('email', 'Email nhận hàng', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Số điện thoai ở định dạng số', 'required|numeric');
            $this->form_validation->set_rules('address', 'Nhập vào địa chỉ', 'required');
//            $this->form_validation->set_rules('DeliveryName', 'Tên tài khoản', 'required');
//            $this->form_validation->set_rules('DeliveryEmail', 'Email đăng nhập', 'required|callback_check_email');
//            $this->form_validation->set_rules('DeliveryPhone ', 'Số điện thoai ở định dạng số', 'required|numeric');
            //$this->form_validation->set_rules('addresss', 'Nhập vào địa chỉ', 'required');
            $this->form_validation->set_rules('Transport', 'Chọn hình thức vận chuyển', 'required');
            $this->form_validation->set_rules('optionsRadios', 'Chọn hình thức thanh toán', 'required');

            
            // nhâp liệu chính xác

                if ($this->form_validation->run()) {

                        $username = $this->input->post('name');
                        $email = $this->input->post('email');
                        $phone = $this->input->post('phone');
                        $address = $this->input->post('address');
                        $payment = $this->input->post('optionsRadios');// cổng thanh toán
                        $Transport = $this->input->post('Transport');
                        $message = $this->input->post('message');

                        $data = array(
                            'status' => 0,
                            'user_id' =>$user_id,
                            'user_name' => $username,
                            'user_email' => $email,
                            'user_phone' => $phone,
                            'address' => $address,// địa chỉ người nhận
                            'amount ' =>  $total_ac, // tong tien thanh toan
                            'payment' => $payment,// hình thức thanh toán
                            'Transport' => $Transport,// hìn thức vận chuyển
                            'message' => $message,// ghi chú cho đơn hàng
                            'created' => NOW(),

                        );
                    // thêm dữ liệu vào bảng Transaction
                    $this->load->model('TransactionModel');

                    $this->TransactionModel->create($data);
                    $transaction_id = $this->db->insert_id();// lấy ra id cua giao dịch

                    // thêm dữ liệu vào bảng order
                    $this->load->model('OrderModel');
                    foreach ($cartss as $row)
                    {
                        $data= array(
                            'transaction_id' => $transaction_id,
                            'product_id' => $row['id'],
                            'qty' => $row['qty'],
                            'name_pr' => $row['name'],
                            'price' => $row['price'],
                            'amount' => $row['subtotal'],
                            'status' => 0,

                        );

                        $this->OrderModel->create($data);




                    }

                    $this->cart->destroy();
                    if($payment == 'Sau_khi_nhan_duoc_hang')
                    {
                        echo "<script> alert(\"Đặt hàng thành công chúng tôi sẽ liên hệ sớm nhật mới bạn.\") </script>";

                }elseif ($payment == "ngan_luong")
                    {
                        echo "<script> alert(\" Chức năng chưa hoàn thành  \") </script>";
                    }

                     //chuyển tới trang chi tiết hóa đơn
                    redirect(base_url("order/view_order"));
                }


        }
        

        
        $this->data['cartss'] = $cartss;
        $this->data['total_item'] = $total_item;
        // nếu thành viên đăng nhập sẽ lấy ra thông tin thành viên
        $this->data['temp'] = 'fontend/cart/pay';
        $this ->load ->view('fontend/details',$this->data);
    }

    function view_order()
    {
        $cartss = $this->cart->contents();
        // thong tin gio hang
        $this->load->model('TransactionModel');
        $input = array();
        $input["order"] = array('id','DESC');
        $input['limit'] = array(1,0);
        $ma = $this->TransactionModel->get_list($input);
        $this->data['ma'] = $ma;
        foreach ($ma as $item)
        {
            $id_tran = $item->id;
        }
        $this->load->model('OrderModel');
        $inputs = array();
        $inputs['where'] = array('transaction_id'=>$id_tran);
        $product = $this->OrderModel->get_list($inputs);
        $this->data['product'] = $product;
        $this->data['temp'] = 'fontend/cart/view_order';
        $this ->load ->view('fontend/details',$this->data);
    }
    
    
}