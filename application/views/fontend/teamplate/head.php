<link rel="stylesheet" href="<?php echo public_url() ?>/js/jquery/autocomplete/css/smoothness/jquery-ui-1.8.16.custom.css" type="text/css">
<script src="<?php echo public_url() ?>/js/jquery/autocomplete/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
        $( "#text-search" ).autocomplete({
            source: "<?php echo site_url('product/search/1') ?>",
        });
    });
</script>
<script src="<?php echo public_url() ?>/Scripts/common/login.js" type="text/javascript"></script>
<section class="top-link clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav navbar-nav topmenu-contact">
                    <li>
                        <i class="fa fa-phone"></i>Hotline:
                        <?php
                            if($this->session->flashdata('list_info'))
                            {
                                $phone = $this->session->flashdata('list_info');
                                foreach ($phone as $key => $value) {
                                    echo $value ->phone;
                                }
                            }
                            else
                            {
                                echo " 016************";
                            }
                         ?>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right topmenu  hidden-xs hidden-sm">
                    <li class="hotline">
                        <a href="#">
                            <i class="fa fa-phone"></i>Hotline:
                            <?php
                                if($this->session->flashdata('list_info'))
                                {
                                    $phone = $this->session->flashdata('list_info');
                                    foreach ($phone as $key => $value) {
                                        echo $value ->phone;
                                    }
                                }
                                else
                                {
                                    echo " 016************";
                                }
                            ?>
                        </a>
                    </li>
                    <li class="order-cart"><a href="<?php echo base_url('cart') ?>"><i class="fa fa-shopping-cart"></i>Giỏ hàng <?php echo (isset($total_item))? $total_item : "" ?></a></li>
                    <?php if (isset($user_info)): ?>
                    <li class="webmaster"><a href="<?php echo base_url() ?>/admin/login"><i class="fa fa-gears"></i>Quản trị website</a></li>
                    <li class="account-info">
                        <a href="<?php echo base_url('user/member/'.$user_info->id) ?>"> Xin Chào <?php echo $user_info->user_name ?></a>
                        <a class="account-logout" id="btnLogOff" href="<?php echo base_url('user/logout') ?>" title="">[Thoát] </a>
                    </li>
                    <?php else: ?>
                    <li class="account-login"><a href="<?php echo base_url('user/login') ?>"><i class="fa fa-sign-in"></i>Đăng nhập </a></li>
                    <li class="account-register"><a href="<?php echo base_url('user/register') ?>"><i class="fa fa-key"></i>Đăng ký </a></li>
                    <?php endif; ?>
                </ul>
                <div class="show-mobile hidden-lg hidden-md">
                    <div class="quick-user">
                        <div class="quickaccess-toggle">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="inner-toggle">
                            <ul class="login links">
                                <?php if (isset($user_info)): ?>
                                <?php else: ?>
                                <li>
                                    <a href="<?php echo base_url('user/login') ?>"><i class="fa fa-sign-in"></i> Đăng ký</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('user/register') ?>"><i class="fa fa-key"></i>Đăng nhập</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="quick-access">
                        <div class="quickaccess-toggle">
                            <i class="fa fa-list"></i>
                        </div>
                        <div class="inner-toggle">
                            <ul class="links">
                                <li><a id="mobile-wishlist-total" href="/kiem-tra-don-hang.html" class="wishlist"><i class="fa fa-pencil-square-o"></i>Kiểm tra đơn hàng</a></li>
                                <li><a href="/gio-hang.html" class="shoppingcart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="header-content clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-12 col-sm-12 header-left text-center">
                <div class="logo">
                    <a href="/" title="">
                    <img alt="" src="<?php echo base_url(); ?>upload/shop151/images/logo.png" class="img-responsive" />
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-xs-12 col-sm-12 header-right pull-right">
                <div class="cart">
                    <div class="heading">
                        <a href="/gio-hang.html">
                        <span class="icon">icon</span><span id="cart-total">
                        0sp - 0đ
                        </span><i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="search hidden-sm hidden-xs">
                    <div class="input-cat form-search clearfix">
                        <form action="<?php echo site_url('product/search') ?>" method="get">
                            <div class="form-search-controls">
                                <input type="text" aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off"
                                    class="ui-autocomplete-input" placeholder="Tìm kiếm sản phẩm..."
                                    value="<?php  echo (isset($key))?$key :''?>" name="key-search" id="text-search">
                            </div>
                            <button class="btn btn-search" title="Search" type="submit" name="but" id="but" value="Search">
                            <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="social-group">
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $("#btnsearch").click(function () {
        SearchProduct();
    });
    $("#txtsearch").keydown(function (event) {
        if (event.keyCode == 13) {
            SearchProduct();
        }
    });
    function SearchProduct() {
        var key = $('#txtsearch').val();
        if (key == '' || key == 'Tìm kiếm...') {
            $('#txtsearch').focus();
            return;
        }
        var group = $('#lbgroup').val();
        window.location = '/tim-kiem.html?group=' + group + '&key=' + key;
    }
</script>