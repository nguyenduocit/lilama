<?php
    class Product extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('ProductModel');

        }
        public function index()
        {
            $this->load->model('SlideModel');
            $slide_list = $this->SlideModel->get_list();

            // lấy ra danh sách sản phẩm mới .
            $this->load->model('ProductModel');
            $input = array();
            if ($this->input->get('limit') && $this->input->get('limit') > 0  )
            {
                $number = $this->input->get('limit');
            }
            else
            {
                $number = 4;
            }
            $number = intval($number);

            $input['limit'] = array($number,0);
            $this->data['number'] = $number;
            $input['order'] = array('buyed','DESC');
            $product_by = $this->ProductModel->get_list($input);
            $this->data['product_by'] = $product_by;
            // lấy ra danh sách số sản phẩm và danh mục
            $this->load->model('CatalogModel');
            $inputs = array();
            $inputs['where'] = array('parent_id'=>0);
            $inputs['order'] = array('id','ASC');
            $catalog_lists= $this->CatalogModel->get_list($inputs);
            foreach ($catalog_lists as $items)
            {
                // lay ra danh muc con
                $inputs['where'] = array('parent_id'=>$items->id);
                $cata_sub = $this->CatalogModel->get_list($inputs);
                $items->subs=$cata_sub;
                foreach ($cata_sub as $item )
                {
                    if ($this->input->get('limits') && $this->input->get('limits') > 0 && $this->input->get('cta') > 0 )
                    {
                        $numbers = $this->input->get('limits');
                        $cata = $this->input->get('cta');
                    }
                    else
                    {
                        $numbers = 4;
                        $cata = '';
                    }
                    $numbers = intval($numbers);
                    $inputs['limit'] = array($numbers,0);
                    $this->data['numbers'] = $numbers;
                    $inputs['where'] = array('catalog_id'=>$item->id , );
                    $sub = $this->ProductModel->get_list($inputs);
                    $item->subPro = $sub;
                }

            }
            
            $this->data['catalog_lists'] = $catalog_lists;

            $this->data['slide'] = $slide_list;
            $this->data['temp']= "fontend/product/index";
            $this ->load ->view('fontend/details',$this->data);
        }
        // hien thi danh sach san pham theo danh muc
        function catalog()
        {
            $id = intval($this->uri->rsegment('3'));
             // lay ra thong tin cua the loai với biến id 
            $this->load->model('CatalogModel');
            // 
            $catalog = $this->CatalogModel->get_info($id);

            if(!$catalog )
            {
                redirect(base_url());
            }

            // gửi thông tin biến cata log qua view hiển thị 
            $this->data['catalog'] = $catalog;
            $catalog_sub= '';
            $this->data['catalog_sub']=$catalog_sub;
            $input = array();
            // kiểm tra xem đây là danh mục con hay danh mục cha nếu parent_id == 0
            if($catalog ->parent_id == 0)
            {
                // lấy ra id của danh mục con danh mục hiện tại
                $input_ca = array();
                // điều kiện danh mục cha 
                $input_ca['where'] = array('parent_id'=> $id);
                $catalog_sub = $this->CatalogModel->get_list($input_ca);
                $this->data['catalog_sub'] = $catalog_sub ;
                if(!empty($catalog_sub)) // nếu danh mục hiện tại có danh mục con
                {
                    // lấy ra id thuộc danh mục con
                    $catalog_sub_id=array();
                    foreach ($catalog_sub as $sub) {
                        // lưu id danh mục con vào mảng
                        $catalog_sub_id[] = $sub->id;
                    }
                    // lấy tất cả sản phẩm thuộc danh mục con thuộc catalog_sub
                    $this->db->where_in('catalog_id',$catalog_sub_id);
                }else{
                    $input['where'] = array('catalog_id'=>$id);
                }
            }else
            {
                $input['where'] = array('catalog_id'=>$id);
            }


            // lấy ra số lượng các sản phẩm trên website
            $total_row = $this->ProductModel->get_total($input);
            $this->data['total_row'] = $total_row;
            // thư viện phân trang
            $this->load->library('pagination');
            $config  = array();
            $config['total_rows'] =  $total_row; // tổng tất cả các sản phẩm trên website ;
            $config['base_url'] =  base_url('product/catalog/'.$id); // link hiển thị dữ lieeu danh sách sản phẩm
            $config['per_page'] =  12; // số sản phẩm hiển thị trên 1 trang
            $config['uri_segment'] = 4; // phân đoạn hiển thị số trnag
            $config['next_link']= 'Next' ; //Nhãn tên của nút Next
            $config['prev_link']= 'Previous' ; //Nhãn tên của nút Previous
            // khởi tạo cấu hình phân trang
            $this->pagination->initialize($config);

            $segment = $this->uri->segment(4);
            $segment = intval($segment);
            $input['limit'] = array($config['per_page'],$segment );

            // lấy ra danh sách sản phẩm
            if(isset($catalog_sub_id))
            {
                $this->db->where_in('catalog_id', $catalog_sub_id);
            }
            $list = $this->ProductModel->get_list($input);
            $this->data['list'] = $list;

            // hiển thị ra phần view trang catalog
            $this->data['temp'] = 'fontend/product/catalog';
            $this ->load ->view('fontend/details',$this->data);

        }

        /*
         * hiển thị chi tiết sản phẩm
         */

        function view()
        {
            // lấy id của sản phẩm muốn xem
            $id = intval($this->uri->rsegment('3'));
            $product = $this->ProductModel->get_info($id);
            if(!$product)
            {
                redirect();
            }
            $this->data['product'] = $product;
            // lấy ra ảnh sản phẩm
            $image_list = json_decode($product->image_list);
            $this->data['image_list'] = $image_list;

            // cập nhập lai lượt xem sản phẩm
            $data = array();
            $data['view'] = $product ->view +1 ;
            $this->ProductModel->update($product->id,$data);

            // lấy ra thông tin của danh mục sản phẩm
            $this->load->model('CatalogModel');
            $catalog = $this->CatalogModel->get_info($product->catalog_id);
            $this->data['catalog'] = $catalog;
            // lay ra san pham hot
            $input = array();
            $input['limit'] = array(5,0);
            $input['order'] = array('view','DESC');
            $product_hot = $this->ProductModel->get_list($input);
            $this->data['product_hot'] = $product_hot;

            // hiển thị ra phần view
            $this->data['temp'] = 'fontend/product/view';
            $this ->load ->view('fontend/details',$this->data);
        }

        // tìm kiếm theo tên
        function search()
        {
            if ($this->uri->rsegment('3') == 1)
            {
                // lấy dữ liệu từ automatic complete
                $key = $this->input->get('term');
            }
            else{
                $key = $this->input->get('key-search');
            }

            $this->data['key'] = trim($key);
              $input = array();
            $input['like'] = array('name',$key);
            $list = $this->ProductModel->get_list($input);

            $this->data['list'] = $list;

            if ($this->uri->rsegment('3') == 1)
            {
                // xử lý autocomplete
                $result = array();
                foreach ($list as $row)
                {
                    $item = array();
                    $item['id'] = $row ->id;
                    $item['lable'] = $row->name;
                    $item['value'] = $row->name;
                    $result[] = $item;
                }
                // du lieu tra ve
                die(json_encode($result));
            }
            
            // hiển thị ra phần view
            $this->data['temp'] = 'fontend/product/search';
            $this ->load ->view('fontend/details',$this->data);

        }

        /*
     * Tìm kiếm theo giá sản phẩm
     */

        function search_price()
        {
                
            $price_from = intval($this->input->get('price_from'));
            $price_to = intval($this->input->get('price_to'));
            $this->data['price_from'] = $price_from;
            $this->data['price_to'] = $price_to;
            $input = array();
            $input['where'] = array('price >=' =>$price_from, 'price <='=> $price_to);
            $list = $this->ProductModel ->get_list($input);
            $this->data['list'] = $list;
            $this->data['temp'] = 'fontend/product/search_price';
            $this ->load ->view('fontend/layout',$this->data);

        }
    }

?>