<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <section class="product-content clearfix">

                    <div class="product-block product-grid row clearfix">
                        <?php foreach ($list  as $item ): ?>
                            <div class="col-md-3 col-sm-3 col-xs-12 product-resize product-item-box">
                                <div class="product-item">
                                    <div class="image image-resize">
                                        <a href="<?php echo base_url('product/view/'.$item->id) ?>" title="<?php echo $item->name ?>">
                                            <img src="<?php echo base_url(); ?>upload/shop151/images/product/<?php echo $item->image_link ?>" class="img-responsive" />
                                        </a>
                                        <a class="hover-image" href="<?php echo base_url('product/view/'.$item->id) ?>">
                                            <img src="<?php echo base_url(); ?>upload/shop151/images/product/<?php echo $item->image_link ?>" class="img-responsive" />
                                        </a>
                                        <div class="view-more clearfix">
                                            <a href="<?php echo base_url('product/view/'.$item->id) ?>" class="btn-quickview">Xem thêm</a>
                                        </div>
                                        <span class="promotion">-10%</span>
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
                                        <div class="box-inner clearfix">
                                            <ul class="add-to-links">
                                                <li> <a class="add-cart" href="<?php echo base_url('cart/add/'.$item->id) ?>"></a></li>
                                                <li><a class="add-wishlist" href="#"></a></li>
                                                <li><a class="add-compare" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </section>
                <!--Template--
                --End-->
            </div>

        </div>
    </div>
</div>