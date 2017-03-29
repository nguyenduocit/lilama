<div class="wrapper">
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="breadcrumb clearfix"> 
                        <ul>
                            <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                            </li>
                            <li class="icon-li"><strong>Hoàn tất</strong> </li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                    </script>
                    <div class=" payment-end">
                        <div class="">
                            <div class="alert alert-success fade in">
                                <i class="fa-fw fa fa-check"></i>
                                <strong>Success! </strong>
                                <span>Đơn hàng của bạn đã được mua thành công</span>
                            </div>
                        </div>

                        <div class="payment-order clearfix">
                            <?php foreach ($ma as $item): ?>
                            <h3>Mã đơn hàng của bạn: <b><?php echo $item->id ?> </b></h3>
                            <p><b>Ngày đặt:</b> <i><?php echo  get_date($item->created)?></i></p>
                            <p><b>Phương thức thanh toán:  </b> <i><?php echo $item->payment ?> </i></p>
                            <?php endforeach; ?>
                            <h1>Thông tin đơn hàng</h1>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phâm</th>
                                    <th>Đơn giá</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!empty($product)): ?>
                                    <?php
                                    $stt = 0;
                                    foreach ( $product as $item){

                                        ?>
                                        <tr>
                                            <td><?php echo $stt = $stt +1; ?></td>
                                            <td>
                                                <span><?php echo $item->name_pr ?> </span>
                                                <p class="note"></p>
                                            </td>
                                            <td><?php echo number_format($item->price) ?> ₫</td>
                                            <td><?php echo $item->qty ?></td>
                                            <td><?php  echo number_format($item->amount) ?> ₫</td>
                                        </tr>
                                    <?php }?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4" class="text-right label-payment"><b>Tổng thanh toán:</b></td>
                                    <td class="total-payment"><?php
                                        $total_amount = 0;
                                        foreach ($product as $item)
                                        {
                                            $total_amount = $total_amount + $item->amount;
                                        }
                                        echo number_format($total_amount);
                                        ?> ₫</td>
                                </tr>
                                <?php else: ?>
                                    <h1> Không có sản phẩm nào trong hóa đơn.</h1>
                                <?php endif; ?>
                                </tfoot>
                            </table>
                            <span class="print-order"><a href="#"><i class="fa fa-print"></i>In đơn hàng</a></span>
                        </div>
                        <div class="clearfix col-md-12">
                            <div class="button text-right">
                                <a class="btn btn-default" href="/">Tiếp tục mua hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





