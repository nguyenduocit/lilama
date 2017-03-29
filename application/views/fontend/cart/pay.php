<?php  if (isset( $message)) { ?>
    <div class="nNote nInformation hideit">
        <p><strong>Thông Báo : </strong><?php echo $message ?></p>
    </div>

<?php } ?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <script src="<?php echo public_url() ?>/app/services/orderServices.js"></script>
                <script src="<?php echo public_url() ?>/app/myjava.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/orderController.js"></script>
                <div class="payment-content" ng-controller="orderController" ng-init="initCheckoutController()">
                    <h1 class="title"><span>Thanh toán</span></h1>
                    <div class="steps clearfix">
                        <ul class="clearfix">
                            <li class="payment active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>
                    <div class="payment-title text-center hidden">
                        <h3>
                            GIAO HÀNG TOÀN QUỐC - THANH TOÁN KHI NHẬN HÀNG - 15 NGÀY ĐỔI TRẢ MIỄN PHÍ
                        </h3>
                        <div>
                            Nếu gặp khó khăn trong việc đặt hàng xin hãy gọi<b class="hotline"> 0908 77 00 95 </b>
                            để được hỗ trợ tốt nhất.
                        </div>
                    </div>
                    <form class="payment-block clearfix" id="checkout-container" method="post" action="<?php echo base_url('order/check_out') ?>">
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step2">
                            <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                            <div class="step-preview clearfix">

                                <h2 class="title">Thông tin thanh toán</h2>
                                <?php if (isset($user_info)): ?>
                                <div class="info-user" ng-if="CustomerId>0">
                                    <label>Người nhận:<span>
                                            <input class="form-control" type="text" name="name" value="<?php echo $user_info ->user_name ?>" readonly=”readonly” />
                                        </span></label>
                                    <label>Điện thoại:<span>
                                            <input class="form-control"  type="text" name="phone" value="<?php echo $user_info ->phone ?>"   readonly=”readonly”  />
                                        </span></label>
                                    <label>Email:<span>
                                            <input class="form-control"  type="email" name="email" value="<?php echo $user_info ->email ?>" readonly=”readonly” />
                                        </span></label>
                                    <label>Địa chỉ:<span>

                                            <input class="form-control"  type="text" name="address" value="<?php echo $user_info ->address ?>" readonly=”readonly” />
                                        </span></label>
                                    <textarea class="form-control" rows="4" placeholder="Ghi chú đơn hàng" name="message"></textarea>
                                    <div class="edit-button">
                                        <a href="#modalAccount"><i class="fa fa-pencil-square-o"></i></a>
                                    </div>
                                </div>
                                <?php else:?>
                                    <div class="user-login"><a href="<?php echo base_url('user/register') ?>">Đăng ký tài khoản mua hàng</a><a href="<?php echo base_url('user/login') ?>">Đăng nhập</a></div>
                                    <div class="form-block" ng-if="CustomerId<=0">
                                        <label>Mua hàng không cần tài khoản</label>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Họ & Tên" type="text" name="name" value="<?php echo set_value('name') ?>"  required="true" />
                                            <div class="clear error" name="name_error"> <?php echo form_error('name') ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Số điện thoại" type="text" name="phone" value="<?php echo set_value('phone') ?>"  required="true" />
                                            <div class="clear error" name="name_error"> <?php echo form_error('phone') ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Email" type="email" name="email" value="<?php echo set_value('email') ?>"   required="true" />
                                            <div class="clear error" name="name_error"> <?php echo form_error('email') ?></div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Địa chỉ" type="text" name="address" value="<?php echo set_value('address') ?>"   required="true" />
                                            <div class="clear error" name="name_error"> <?php echo form_error('address') ?></div>
                                        </div>
                                        <textarea class="form-control" rows="4" placeholder="Ghi chú đơn hàng" name="message"><?php echo set_value('message') ?> </textarea>
                                    </div>
                                    <?php endif; ?>
<!--                                    <h2 class="title">Thông tin giao hàng</h2>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label>-->
<!--                                            <input type="checkbox"  /> Giao hàng địa chỉ khác-->
<!--                                        </label>-->
<!--                                    </div>-->
<!--                                    <div class="form-block" id="showcheck">-->
<!--                                        <div class="form-group"><input class="form-control" placeholder="Họ & Tên" type="text" name="DeliveryName" required="true"/></div>-->
<!--                                        <div class="form-group"><input class="form-control" placeholder="Số điện thoại" type="text" name="DeliveryPhone" required="true"/></div>-->
<!--                                        <div class="form-group"><input class="form-control" placeholder="Email" type="text" name="DeliveryEmail" required="true"/></div>-->
<!--                                        <div class="form-group"><input class="form-control" placeholder="Địa chỉ" type="text" name="DeliveryAddress" required="true" /></div>-->
<!--                                        <textarea class="form-control" rows="4" placeholder="Ghi chú đơn hàng" name="messages"></textarea>-->
<!--                                    </div>-->
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step3">
                            <h4>2. Thanh toán và vận chuyển</h4>
                            <div class="step-preview clearfix">
                                <h2 class="title">Vận chuyển</h2>
                                <div class="form-group ">
                                    <select class="form-control" name="Transport">
                                        <option value="">Chọn hình thức nhận hàng</option>
                                        <option value="chuyen phat nhanh"> Chuyển phát nhanh</option>
                                        <option value="Giữ hàng">Giữ hàng</option>
                                    </select>
                                    <div class="clear error" name="name_error"> <?php echo form_error('Transport') ?></div>
                                </div>
                                <h2 class="title">Thanh toán</h2>
                                <div class="radio" ng-repeat="item in PaymentMethods">
                                    <label>
                                        <input type="radio" value="Sau_khi_nhan_duoc_hang" name="optionsRadios" checked  /> Sau khi nhận được hàng . <br>
                                        <input type="radio" value="ngan_luong" name="optionsRadios"  /> Qua tai khoản ngân lượng .

                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 payment-step step1">
                            <h4>3. Thông tin đơn hàng</h4>


                            <div class="step-preview">
                                <div class="cart-info">
                                    <?php if(!empty($cartss)): ?>
                                    <div class="cart-items">
                                        <?php
                                            $total_amount = 0;
                                            foreach ( $cartss as $item){
                                                $total_amount = $total_amount + $item['subtotal'] ;
                                            ?>



                                        <div class="cart-item clearfix" ng-repeat="item in OrderDetails">
                                            <span class="image pull-left" style="margin-right:10px;">
                                                <a href="<?php echo base_url('product/catalog/'.$item['id']) ?>">
                                                    <img src="<?php echo base_url(); ?>upload/shop151/images/product/<?php echo $item['image_link'] ?>" class="img-responsive" />
                                                </a>
                                            </span>
                                            <div class="product-info pull-left">
                                                <span class="product-name">
                                                    <a href=""> <?php echo $item['name'] ?></a> x <span><?php echo $total_item; ?></span>
                                                </span>
                                            </div>
                                            <span class="price"><?php echo number_format($item['subtotal']) ?> ₫</span>
                                        </div>
                                        <?php }?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="total-price">
                                        Thành tiền  <label>  <?php  echo number_format($total_amount) ?> ₫</label>
                                    </div>
                                    <div class="shiping-price">
                                        Phí vận chuyển  <label><?php echo $phivanchuyen = 0  ?> ₫</label>
                                    </div>
                                    <div class="btn-coupon hidden">
                                        <a href="#" class="btn btn-primary"><span></span>Sử dụng mã giảm giá </a>
                                    </div>
                                    <div class="use-coupon hidden">
                                        <div class="form-group">
                                            <input placeholder="Nhập mã giảm giá" class="coupon-code form-control" />
                                            <a class="btn btn-primary">Sử dụng</a>
                                        </div>
                                    </div>
                                    <div class="total-payment">
                                        Thanh toán <span> <?php

                                                $tong = $total_amount + $phivanchuyen;
                                                echo  number_format($tong);
                                            ?> ₫</span>
                                    </div>
                                    <div class="button-submit">
                                        <button class="btn btn-default" type="submit">Đặt hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Thanh toán</strong> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
