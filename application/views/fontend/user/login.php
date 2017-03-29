<div class="main">
    <div class="container">
        <div class="row">
            <?php $this->load->view('fontend/user/left_acc'); ?>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Đăng nhập</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                </script>
                <script src="<?php echo public_url() ?>/app/services/accountServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/accountController.js"></script>
                <div class="login-content clearfix" ng-controller="accountController" ng-init="initController()">
                    <h1 class="title"><span>Đăng nhập hệ thống</span></h1>

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
                    <?php echo form_error('user_login'); ?>

                    <div class="col-md-6 col-md-offset-3 col-xs-12 col-sm-12 col-xs-offset-0 col-sm-offset-0">
                        <form class="form-horizontal" method="post" action="<?php echo site_url('user/login') ?>">
                            <div class="form-group">
                                <label for="Email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" ng-required='true'  value="<?php echo set_value('email') ?>" />
                                    <div class="clear error" name="name_error"> <?php echo form_error('email') ?></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Password" class="col-sm-4 control-label">Mật khẩu</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" ng-required='true' />
                                    <div class="clear error" name="name_error"> <?php echo form_error('password') ?></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default">Đăng nhập</button>
                                    <a href="/quen-mat-khau.html">Quên mật khẩu</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>