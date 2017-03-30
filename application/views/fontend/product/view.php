<script type="text/javascript">
    $(document).ready(function(){
        $('a.tab').click(function(){
            var an_di=$('a.selected').attr('rel');//lấy title của thẻ <a class='active'>
            $('div#'+an_di).hide();//ẩn thẻ <div id='an_di'>
            $('a.selected').removeClass('selected');
            $(this).addClass('selected');
            var hien_thi=$(this).attr('rel');//lấy title của thẻ <a> khi ta kick vào nó
            $('div#'+hien_thi).show();//hiện lên thẻ <div id='hien_thi'>
        });
    });
</script>

<!-- zoom image -->

<!-- end zoom image -->

<!-- Raty -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <script src="<?php echo public_url() ?>/app/services/moduleServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/moduleController.js"></script>
                <!--Begin-->
                <div class="box-sale-policy" ng-controller="moduleController" ng-init="initSalePolicyController('Shop')">
                    <h3><span>Chính sách bán hàng</span></h3>
                    <div class="sale-policy-block">
                        <ul>
                            <li>Giao hàng TOÀN QUỐC</li>
                            <li>Thanh toán khi nhận hàng</li>
                            <li>Đổi trả trong <span>15 ngày</span></li>
                            <li>Hoàn ngay tiền mặt</li>
                            <li>Chất lượng đảm bảo</li>
                            <li>Miễn phí vận chuyển:<span>Đơn hàng từ 3 món trở lên</span></li>
                        </ul>
                    </div>
                    <div class="buy-guide">
                        <h3>Hướng Dẫn Mua Hàng</h3>
                        <ul>
                            <li>
                                Mua hàng trực tiếp tại website
                                <b>lilama.com</b>
                            </li>
                            <li>
                                Gọi điện thoại <strong>
                                    01659020898
                                </strong> để mua hàng
                            </li>
                            <li>
                                Mua tại Trung tâm CSKH:<br />
                                <strong>Ngõ 487 Cổ Nhuế Từ Liêm Hà Nôi .</strong>
                            </li>
                            <li>
                                Mua sỉ/buôn xin gọi <strong>
                                   01659020898
                                </strong> để được
                                hỗ trợ.
                            </li>
                        </ul>
                    </div>
                </div>
                <!--End-->

                <div class="box-product">
                    <h3>
                        <span>
                            Sản phẩm Hot
                        </span>
                    </h3>
                    <div class="box-product-block">
                        <?php if(!empty($product_hot)): ?>
                            <?php foreach ($product_hot as $item): ?>
                                <div class="item">
                            <div class="image image-resize">
                                <a href="<?php echo base_url('product/view/'.$item->id) ?>" title="<?php echo $item->name ?>">
                                    <img src="<?php echo base_url(); ?>upload/shop151/images/product/<?php echo $item->image_link ?>" class="img-responsive" />
                                </a>
                                <div class="view-more clearfix">
                                    <a href="<?php echo base_url('product/view/'.$item->id) ?>" class="btn-quickview">Xem thêm</a>
                                </div>
                            </div>
                            <div class="right-block">
                                <h2 class="name">
                                    <a href="<?php echo base_url('product/view/'.$item->id) ?>" title="<?php echo $item->name ?>"><?php echo $item->name ?></a>
                                </h2>
                                <div class="ratings clearfix">
                                    <div class="rating-box">
                                        <div class="rating">
                                        </div>
                                    </div>
                                </div>
                                <div class="price">
                                    <?php if($item ->discount > 0):?>
                                        <?php
                                        $price_new = ($item->price*(100-$item->discount))/100;
                                        echo ' <span class="price-new">'.number_format($price_new).'&nbsp;₫</span>';
                                        ?>
                                        <span class="price-old"> <?php  echo number_format($item->price); ?>&nbsp;₫</span>
                                    <?else: ?>

                                    <?php endif; ?>

                                </div>
                                <div class="addtocart-button clearfix">
                                    <a href="<?php echo base_url('order/check_out') ?>" class="add-to-cart"><span></span>Mua ngay</a>
                                </div>
                            </div>
                        </div>
                            <?php endforeach; ?>
                            <?php ?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <div class="breadcrumb clearfix">
                    <ul>
                        <li  itemscope="" class="home">
                            <a title="Đến trang chủ" href="<?php echo base_url() ?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li  itemscope="" class="home">
                            <a title="<?php echo $catalog->name ?>" href="<?php echo base_url('product/catalog/'.$catalog->id) ?>" itemprop="url"><span itemprop="title"><?php echo $catalog->name ?></span></a>
                        </li>
                        <li class="productname icon-li"><strong><?php echo $product->name ?></strong> </li>
                    </ul>
                </div>


                <div class="product-detail clearfix ng-scope" ng-controller="productController" ng-init="initController(3373)">
                    <div class="product-block clearfix">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12 product-image clearfix">
                                <div class='product_view_img'>
                                    <a href="<?php  ?>" class="jqzoom" rel='gal1'  title="triumph" >
                                        <img  src="<?php echo base_url(); ?>Upload/shop151/images/product/<?php echo $product->image_link ?>" alt='<?php echo $item->name ?>' style='width:280px !important;' width="280">
                                    </a>
                                    <div class='clear' style='height:10px'></div>
                                    <div class="clearfix" >
                                        <ul id="thumblist" >

                                            <?php if(is_array($image_list)):?>
                                                <?php foreach ($image_list as $img ): ?>

                                                    <li>
                                                        <a  href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo base_url(); ?>Upload/shop151/images/product/<?php echo $img ?>',largeimage: '<?php echo base_url('upload/product/'.$img) ?>'}">
                                                            <img src='<?php echo base_url(); ?>Upload/shop151/images/product/<?php echo $img ?>' width="70">
                                                        </a>
                                                    </li>

                                                <?php endforeach; ?>
                                            <?php endif;?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                                <h2><?php echo $product->name ?></h2>
                                <div class="price">
                                    <?php if($product ->discount > 0):?>
                                        <?php
                                        $price_new = ($product->price*(100-$product->discount))/100;
                                        echo ' <span class="price-new">'.number_format($price_new).'&nbsp;₫</span>';
                                        ?>
                                        <span class="price-old"> <?php  echo number_format($product->price); ?>&nbsp;₫</span>
                                    <?else: ?>
                                    <?php endif; ?>

                                </div>
                                <div class="des" ng-bind-html="Summary|unsafe">
                                    <?php echo $product->specifications ?>
                                </div>
                                <div class="social">
                                    <!-- AddThis Button BEGIN -->
                                    <div class="addthis_toolbox addthis_default_style">
                                        <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>


                                        <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                        <a class="addthis_counter addthis_pill_style addthis_nonzero"></a>
                                    </div>
                                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5334d6387b03b532"></script>
                                    <!-- AddThis Button END -->
                                </div>
                                <div class="option" ng-repeat="item in ProductOptions">
                                </div>
                                <div class="quantity clearfix ">
                                        <label>Số lượng</label>
                                        <div class="quantity-input">
                                            <input type="number" value="1" class="text" ng-model="InputQuantity" ng-init="InputQuantity=1" />
                                        </div>
                                    <div class="clearfixs" style="margin-top: -20px; margin-left: 84px;">
                                        <label>Số Lượt Xem</label>
                                        <div class="quantity-input">
                                            <input type="number" value="<?php if(isset($product->view))echo $product->view ?>" class="text" readonly />
                                        </div>
                                    </div>


                                </div>
                                <div class="button" ng-if="IsTrackingInventory==false||AllowPurchaseWhenSoldOut==true || (IsTrackingInventory&&AllowPurchaseWhenSoldOut==false&&Quantity>0)">
                                    <a href="<?php echo base_url('cart/add/'.$product->id) ?>" ng-click="addToCard()" class="btn btn-primary"><i class="glyphicon glyphicon-shopping-cart"></i>Thêm giỏ hàng</a>
                              
                                </div>
                                <div class="button" ng-if="IsTrackingInventory==true&&AllowPurchaseWhenSoldOut==false&&Quantity<=0">
                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tabs">
                        <ul class="nav nav-tabs">
                            <!-- ngRepeat: item in ProductTabs --><li role="presentation" ng-class="{'active':$index==0}" ng-repeat="item in ProductTabs" class="ng-scope active">
                                <a data-toggle="tab" href="#tab1" class="ng-binding">Chi tiết sản phẩm</a>
                            </li><!-- end ngRepeat: item in ProductTabs -->
                        </ul>
                        <div class="tab-content">
                            <!-- ngRepeat: item in ProductTabs -->
                            <div class="tab-pane fade in ng-scope active" ng-class="{'active':$index==0}" id="tab1" ng-repeat="item in ProductTabs">
                                <div ng-bind-html="item.Content|unsafe" class="ng-binding">
                                    <?php echo $product->content ?>
                                </div>
                            </div><!-- end ngRepeat: item in ProductTabs -->
                        </div>
                    </div>
                    <div class="usual" id="usual1">
                        <ul>
                            <li><a title="Chi tiết sản phẩm" rel='tab2' href='javascript:void(0)' class="tab selected">Đánh giá về sản phẩm</a></li>
                            <li><a title="Hỏi đáp về sản phẩm" rel='tab4' href='javascript:void(0)' class="tab">Hỏi đáp về sản phẩm</a></li>
                        </ul>
                    </div>

                    <div class="usual-content">
                        <div id="tab2" style="display: block;">
                            <!-- comment facebook -->
                            <center>
                                <div id="fb-root"></div>
                                <script src="http://connect.facebook.net/en_US/all.js#appId=170796359666689&amp;xfbml=1"></script>
                                <div class="fb-comments" data-href="<?php echo current_url();  ?>" data-num-posts="5" data-width="550" data-colorscheme="light"></div>
                            </center>
                        </div>
                        <div id="tab3" style="display: none;">
                            <!-- the div chay video -->
                            <div id='mediaspace' style="margin:5px;"></div>
                        </div>

                        <div id="tab4" style="display: none;">
                            <div class='box-show-product'>
                                <!-- hiển thị danh sách comment và form comment -->
                                <div class="comments">
                                    <div class="title"><h3>THẢO LUẬN CỦA KHÁCH HÀNG <span class="yellow">(0)</span></h3><h4>Ý kiến khách hàng về Sản phẩm Tivi LG 520</h4></div>
                                    <br class="break">
                                    <div class="reviews">
                                        <div class="content">
                                        </div>
                                    </div>
                                </div>
                                <div class='clear'></div>


                                <style>
                                    .error{
                                        margin:15px 0px;
                                    }
                                </style>
                                <form name='send_comment' id='show_box_comment' class="t-form form_action" method='post' action='http://localhost/webphp/comment/add.html'>
                                    <table width="90%" cellspacing="0" cellpadding="0" border="0" style="margin:10px auto">
                                        <tbody>
                                        <tr>
                                            <td style='width:210px;padding-right:15px;vertical-align:top'>
                                                <input type="text" style="width:200px;" class='input' id="user_name" placeholder="Họ tên" value='' name="user_name">
                                                <div name="user_name_error" class="error"></div>
                                                <input type="text" style="width:200px;" id="user_email" class='input' placeholder="Email" value='' name="user_email">
                                                <div name="user_email_error" class="error"></div>
                                                <img id="imgsecuri"  src="http://localhost/webphp/captcha/three.html" style="margin-bottom: -6px;" _captcha="http://localhost/webphp/captcha/three.html" class="imgrefresh" >

                                                <input type="text"  class='input'   style="width:80px;" id="security_code" placeholder="Mã xác nhận" name="security_code">
                                                <div name="security_code_error" class="error"></div>
                                            </td>
                                            <td>
	                    <textarea id="content_comment" cols="50" rows="3" style='width:320px' class='input' placeholder='Nội dung phản hồi' name="content">
	                    </textarea>
                                                <div name="content_error" class="error"></div>
                                                <input type="hidden" name='product_id' value='9'>
                                                <input type="hidden" name='parent_id' id='comment_parent_id' value=''>
                                                <input type="submit" class="button button-border medium blue f" id=""   value="Gửi" name="_submit">
                                                <input type="reset" class="button button-border medium red f"  value='Nhập lại'>
                                                <div class='clear'></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </form>	       </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>
</div>