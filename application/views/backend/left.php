<div style="padding-top:30px;" id="leftSide">

    <!-- Account panel -->

    <div class="sideProfile">
        <a class="profileFace" title="" href="#"><img width="40" src="<?php echo public_url('admin') ?>/images/user.png"></a>
        <span>Xin chào: <strong>
            
        <?php 
                        
            if ($this->session->userdata('userdata')) {
                # code...
                $user = $this->session->userdata('userdata');
                //pre($user);
                foreach ($user as $key => $value) {
                    # code...
                    echo $value->username;
                }
            }
         ?>
        </strong></span>
        <span></span>
        <div class="clear"></div>
    </div>
    <div class="sidebarSep"></div>
    <!-- Left navigation -->

    <ul class="nav" id="menu">

        <li class="home">

            <a id="current" class="active" href="<?php echo admin_url('home')?>">
                <span>Bảng điều khiển</span>
                <strong></strong>
            </a>


        </li>
        <li class="tran">

            <a class=" exp" href="">
                <span>Quản lý bán hàng</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('transaction') ?>">
                        Giao dịch
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('order') ?>">
                        Đơn hàng sản phẩm
                    </a>
                </li>
            </ul>

        </li>
        <li class="product">

            <a class=" exp" href="<?php echo admin_url()?>">
                <span>Sản phẩm</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('product') ?>">
                        Sản phẩm
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('catalog') ?>">
                        Danh mục
                    </a>
                </li>
            </ul>

        </li>
        <li class="account">

            <a class=" exp" href="<?php echo admin_url()?>">
                <span>Tài khoản</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('admin') ?>">
                        Ban quản trị
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('user') ?>">
                        Thành viên
                    </a>
                </li>
            </ul>

        </li>
        <li class="support">

            <a class=" exp" href="admin/support.html">
                <span>Hỗ trợ và liên hệ</span>
                <strong>2</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="admin/support.html">
                        Hỗ trợ
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('contact') ?>">
                        Liên hệ
                    </a>
                </li>
            </ul>

        </li>
        <li class="content">

            <a class=" exp" href="admin/content.html">
                <span>Nội dung</span>
                <strong>3</strong>
            </a>

            <ul class="sub">
                <li>
                    <a href="<?php echo admin_url('slide') ?>">
                        Slide
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('news') ?>">
                        Tin tức
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('intro') ?>">
                        Thông tin && giới thiệu 
                    </a>
                </li>
            </ul>

        </li>

    </ul>

</div>
<div class="clear"></div>
