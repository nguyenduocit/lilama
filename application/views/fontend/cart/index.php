<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Giỏ hàng</strong> </li>
                    </ul>
                </div>
                <div class="cart-content ng-scope" ng-controller="orderController" ng-init="initOrderCartController()">
                    <h1 class="title"><span>Giỏ hàng của tôi</span></h1>
                    <?php if($total_item > 0 ): ?>
                    <div class="steps clearfix">
                        <ul class="clearfix">
                            <li class="payment active col-md-2 col-xs-12 col-sm-4 col-md-offset-3 col-sm-offset-0 col-xs-offset-0"><span><i class="glyphicon glyphicon-shopping-cart"></i></span><span>Giỏ hàng của tôi</span><span class="step-number"><a>1</a></span></li>
                            <li class="payment col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-usd"></i></span><span>Thanh toán</span><span class="step-number"><a>2</a></span></li>
                            <li class="finish col-md-2 col-xs-12 col-sm-4"><span><i class="glyphicon glyphicon-ok"></i></span><span>Hoàn tất</span><span class="step-number"><a>3</a></span></li>
                        </ul>
                    </div>
                    <form action=" <?php echo base_url('cart/update_cart') ?>" method="post">
                        <div class="cart-block">
                        <div class="">
                                <table class="table product-list">
                                <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $total_amount = 0; ?>
                                    <?php
                                        if(!empty($carts))
                                        foreach ($carts as $item):
                                        $total_amount = $total_amount + $item['subtotal'] ;
                                    ?>
                                <!-- end ngRepeat: item in OrderDetails -->
                                <tr ng-repeat="item in OrderDetails" class="ng-scope">
                                    <td class="des">
                                        <h2 class="ng-binding"><?php echo $item['name'] ?></h2>
                                        <span class="ng-binding"></span>
                                    </td>
                                    <td class="image">
                                        <img  class="img-responsive" src="<?php echo base_url(); ?>upload/shop151/images/product/<?php echo $item['image_link'] ?>" alt="<?php echo $item['name'] ?>">
                                    </td>
                                    <td class="price ng-binding"><?php echo number_format($item['price']) ?>đ</td>
                                    <td class="quantity">
                                        <input type="number" value="<?php echo $item['qty'] ?>" class="text ng-pristine ng-untouched ng-valid" ng-model="item.Quantity" ng-change="updateItemCart(item)" name="qty_<?php echo $item['id'] ?>" >
                                    </td>
                                    <td class="amount ng-binding">
                                        <?php echo number_format($item['subtotal']) ?> đ
                                    </td>
                                    <td class="remove">
                                        <a href="<?php echo base_url('cart/delete/'.$item['id']) ?>">
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <!-- end ngRepeat: item in OrderDetails -->
                                </tbody>
                            </table>


                        </div>
                        <div class="">
                            <span><b>Tổng thanh toán:</b></span>
                            <span class="pay-price ng-binding">
                              <?php  echo number_format($total_amount) ?> đ
                            </span>
                        </div>
                        <div class="button text-right">
                            <input type="submit" value="Cập nhật" class="btn btn-default" >
                            <a class="btn btn-primary" href="<?php echo base_url('order/check_out') ?>">Tiến hành thanh toán</a>
                        </div>
                        <?php else: ?>
                            <h1>Không tồn tại sản phẩm nào trong giỏ hàng.</h1>
                        <?php endif; ?>

                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>