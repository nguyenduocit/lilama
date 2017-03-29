<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <script src="<?php echo public_url() ?>/app/services/accountServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/accountController.js"></script>
                <div class="menu-account" ng-controller="accountController">
                    <h3>
        <span>
            Quản lý cá nhân
        </span>
                    </h3>
                    <ul>
                        <li class="active"><a href="<?php echo base_url('user/member/'.$user_info->id) ?>"><i class="glyphicon glyphicon-user"></i>Thông tin tài khoản</a></li>
                        <li><a href="/don-hang.html"><i class="glyphicon glyphicon-list-alt"></i>Đơn hàng của tôi</a></li>
                        <li><a href="<?php echo base_url('user/reset_password/'.$user_info->id) ?>"><i class="fa fa-key"></i>Thay đổi mật khẩu</a></li>
                        <li><a href="<?php echo base_url('user/logout') ?>" ng-click="signOut()"><i class="glyphicon glyphicon-log-out"></i>Thoát</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="<?php echo base_url() ?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Thông tin tài khoản</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                </script>
                <div class="comunication-content clearfix" ng-controller="accountController" ng-init="initPersonalController()">
                    <h1 class="title"><span>Thông tin tài khoản</span></h1>
                    <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <?php if (isset($user_info)): ?>

                            <h2>Thông tin tài khoản</h2>
                            <div class="form-group">
                                <label for="Email" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-9">
                                    <label class="control-label"><?php echo $user_info ->email ?></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-3 control-label">Mật khẩu</label>
                                <div class="col-sm-9">
                                    <label class="control-label">********</label>
                                    <a href=""><i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                            <h2>Thông tin cá nhân</h2>
                            <form class="form-horizontal" method="post" action="<?php echo base_url('user/member/'.$user_info->id) ?>">
                            <div class="form-group">
                                <label for="Name" class="col-sm-3 control-label">Họ tên</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="user_name" value="<?php echo $user_info ->user_name ?>" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('user_name') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Giới tính</label>
                                <div class="col-sm-9">
                                    <input type="radio" class="" name="sex" value="0" <?php echo ($user_info->sex == 0)? 'checked':'' ?> /> Nữ

                                    <input type="radio" class="" name="sex" value="1" <?php echo ($user_info->sex == 1)? 'checked':'' ?> /> Nam
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $user_info ->phone ?>" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('phone') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" value="<?php echo $user_info ->address ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <a href="<?php echo base_url('user/member/'.$user_info->id) ?>"> <button type="submit" class="btn btn-default">Cập nhật</button></a>
                                </div>

                            </div>
                        </form>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>