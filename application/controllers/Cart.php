<?php
/**
 * Created by PhpStorm.
 * User: NguyenVan
 * Date: 10/08/2016
 * Time: 9:55 PM
 */
class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

    }
    function add()
    {
        $id = $this->uri->rsegment('3');
        $this->load->model('ProductModel');
        $product = $this->ProductModel->get_info($id);
        if(!$product )
        {
            redirect();
        }
        // Tong so san pham
        $qty = 1;
        $price = $product->price;
        if($product->discount >0 )
        {
            $price = ($product->price*(100-$product->discount))/100;
        }
        // thong tin insert vao gio hang
        $data = array();
        $data['id'] = $product->id;
        $data['qty'] = $qty;
        $data['name'] = url_title($product->name);
        $data['image_link'] = $product->image_link;
        $data['price'] = $price;
        $this->cart->insert($data);

        // chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));

    }
    /*
     * Hien thi tat ca cac san pham co trong gio hang
     */
    function  index()
    {
        // thong tin gio hang
        $carts = $this->cart->contents();
        // tong so san pahm
        $total_item = $this->cart->total_items();
        $this->data['carts'] = $carts;
        $this->data['total_item'] = $total_item;
        $this->data['temp'] = 'fontend/cart/index';
        $this ->load ->view('fontend/details',$this->data);



    }
    /*
     * cap nhat gio hang
     */

    function update_cart()
    {
        // thong tin gio hang
        $carts = $this->cart->contents();

        foreach ($carts as $key => $item)
        {
//            lấy ra tổng số lượng sản phẩm
            $total_qty = $this->input->post('qty_'.$item['id']);
            $data = array();
            $data['rowid'] = $key;
            $data['qty'] = $total_qty;
            $this->cart->update($data);


        }
        // chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));

    }

    /*
     * Xoa San pham trong gio hang
     */
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        // truowngf hợp xóa 1 sản phẩm nào đó trong giỏ hang
        if($id >0 )
        {
            // thong tin gio hang
            $carts = $this->cart->contents();

            foreach ($carts as $key => $item)
            {
//
                if($item['id'] == $id)
                {
                    //lấy ra tổng số lượng sản phẩm
                    $data = array();
                    $data['rowid'] = $key;
                    $data['qty'] = 0;
                    $this->cart->update($data);
                }


            }

        }else{
            // xóa toàn bộ giỏ hàng
            $this->cart->destroy();
        }

        // chuyen sang trang danh sach san pham trong gio hang
        redirect(base_url('cart'));
    }
   
}