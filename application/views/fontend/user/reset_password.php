<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-account" ng-controller="accountController">
                    <h3>
        <span>
            Quản lý cá nhân
        </span>
                    </h3>
                    <ul>
                        <li class="active"><a href="<?php echo base_url('user/member/'.$user_info->id) ?>"><i class="glyphicon glyphicon-user"></i>Thông tin tài khoản</a></li>
                        <li><a href="/don-hang.html"><i class="glyphicon glyphicon-list-alt"></i>Đơn hàng của tôi</a></li>
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
                        <li class="icon-li"><strong>Thay đổi mật khẩu</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                </script>
                <script src="<?php echo public_url() ?>/app/services/accountServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/accountController.js"></script>
                <div class="change-password-content clearfix" ng-controller="accountController" ng-init="initController()">
                    <h1 class="title"><span>Thay đổi mật khẩu</span></h1>
                    <?php  if (isset( $error)) { ?>
                        <div ng-if="IsError" class="alert alert-danger fade in">
                            <button data-dismiss="alert" class="close"></button>
                            <i class="fa-fw fa fa-times"></i>
                            <strong>Error!</strong>
                            <span ng-bind-html="Message"><?php echo $error ?> </span>
                        </div>
                    <?php } ?>

                    <?php  if (isset( $message)) { ?>
                        <div ng-if="IsSuccess" class="alert alert-success fade in">
                            <button data-dismiss="alert" class="close"></button>
                            <i class="fa-fw fa fa-check"></i>
                            <strong>Success!</strong> <?php echo $message ?>
                        </div>

                    <?php } ?>
                    <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal" ng-submit="changePassword()" method="post" action="<?php base_url('user/reset_password') ?>">
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Mật khẩu cũ</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="PasswordOld" required="true"  />
                                    <div class="clear error" name="name_error"> <?php echo form_error('PasswordOld') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Mật khẩu mới</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="Password" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('Password') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-4 control-label">Nhập lại mật khẩu</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="RePassword" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('RePassword') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default">Cập nhật</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>