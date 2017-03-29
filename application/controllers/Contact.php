<?php 
	class Contact extends MY_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('IntroModel');
			$this->load->model('ContactModel');

			// load ra libary validate 
			$this->load->library('form_validation');
	        $this->load->helper('form');
	        $this->load->helper('phpmailer_helper');
	        $this->load->helper('smtp_helper');

		}


		public function index()
		{

			
	        //lấy ra thông tin bảng giới thiệu
	        $list_info = $this->IntroModel->get_list();
	        $this->data['list_info'] = $list_info;


	        $data = array();
			if($this->input->post())
			{
				$this->form_validation->set_rules('title','Nhập vào tiêu đề .','required');
	            $this->form_validation->set_rules('name','Nhập vào tên  .','required');
	            $this->form_validation->set_rules('phone','Nhập vào số điện thoại .','required|numeric');
	            $this->form_validation->set_rules('email','Nhập vào email .','required|valid_email');
	            $this->form_validation->set_rules('address','Nhập vào địa chỉ .','required');
	            $this->form_validation->set_rules('content','Nhập vào nội dung muốn liên hệ . ','required');

	            if($this->form_validation->run())
	            {
	            	// lấy các giá trị từ form 
	            	$title = $this->input->post('title');
	                $name = $this->input->post('name');
	                $phone = $this->input->post('phone');
	                $email = $this->input->post('email');
	                $address = $this->input->post('address');
	                $content = $this->input->post('content');

	                // lưu vào mảng 
	                $data= array(
                    'title'         => $title,
                    'name'          => $name,
                    'phone'         => $phone,
                    'email'         => $email,
                    'address'       => $address,
                    'content'       => $content,
                    'created'       =>NOW(),
                    );


                    if($this->ContactModel->create($data))
	                {
	                    $this->session->set_flashdata('success','Cán ơn bạn đã liên hệ mới chúng tôi . Ban quản trị trang web sẽ liên lạc mới bạn sớm nhất có thể .');
	                }
	                else{
	                    $this->session->set_flashdata('error','Lỗi không thể gửi thông tin liên hệ');
	                }

	                //gửi thông báo tới mail .
	                $title =" Nguyễn Văn Dược";
	                $content ="Xin Chào " . $name;
	                $content .= " Cám ơn bạn đã liên hệ mới chúng tôi . Chúng tôi sẽ phản hồi cho bạn sớm nhất có thể";
	                $nTo = $name;
	                $mTo = $email;
	                sendMail($title, $content, $nTo, $mTo,$diachicc='');
	                // chuyển tới trang danh sách quản trị viên.
	                redirect(base_url('contact '));
		            }

			}

        	$this->session->set_flashdata('list_info', $list_info );
			$this->data['temp']= "fontend/contact/contact";
	        $this ->load ->view('fontend/details',$this->data);
		}

	}
?>