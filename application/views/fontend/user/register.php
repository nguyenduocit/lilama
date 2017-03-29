<div class="main">
    <div class="container">
        <div class="row">
            <?php $this->load->view('fontend/user/left_acc'); ?>
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="<?php echo base_url() ?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đăng ký tài khoản</strong> </li>
                    </ul>
                </div>
                <script src="<?php echo public_url() ?>/app/services/accountServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/accountController.js"></script>
                <form method="post" action="<?php echo base_url('user/register') ?>" >
                    <div class="register-content clearfix" ng-controller="accountController" ng-init="initRegisterController()">
                    <h1 class="title"><span>Đăng ký tài khoản</span></h1>
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
                    <!--<div ng-if="InValid" class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close"></button>
                        <i class="fa-fw fa fa-times"></i>
                        <strong>Error!</strong>
                        <span ng-bind-html="Message"></span>
                    </div>-->
                    <div class="col-md-8 col-md-offset-2 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal" ng-submit="register()">
                            <h2><span>Thông tin tài khoản</span></h2>
                            <div class="form-group">
                                <label for="Code" class="col-sm-3 control-label">Tài khoản<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" value="<?php echo set_value('name') ?>" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('name') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-3 control-label">Email<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" value="<?php echo set_value('email') ?>" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('email') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="col-sm-3 control-label">Mật khẩu<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password" value="<?php echo set_value('password') ?>" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('password') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="RePassword" class="col-sm-3 control-label">Nhập lại mật khẩu<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="repassword"  required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('repassword') ?></div>
                                </div>
                            </div>
                            <h2>Thông tin cá nhân</h2>
                            <div class="form-group">
                                <label for="Name" class="col-sm-3 control-label">Họ tên<span class="warning">(*)</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="user_name" value="<?php echo set_value('user_name') ?>" required="true" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('user_name') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Điện thoại</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo set_value('phone') ?>" name="phone" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('phone') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-3 control-label">Địa chỉ</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php echo set_value('address') ?>" name="address" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Giới tính</label>
                                <div class="col-sm-9">
                                    <input type="radio" class="" name="sex" value="0" checked /> Nữ

                                    <input type="radio" class="" name="sex" value="1"/> Nam
                                </div>
                            </div>
                            <br> <br> <br>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default">Đăng ký</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>