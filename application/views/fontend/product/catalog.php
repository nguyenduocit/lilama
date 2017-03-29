<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="<?php echo base_url() ?>" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="category17 icon-li">
                            <div class="link-site-more">
                                <a title="" href="<?php echo base_url('product/catalog/'.$catalog->id) ?>" itemprop="url">
                                    <span itemprop="title"><?php echo $catalog ->name ?></span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                </script>

                <section class="product-content clearfix">
                    <h1 class="title clearfix"><span><?php echo $catalog ->name ?> ( Có <?php echo $total_row ?> sản phẩm)</span></h1>
                    <nav class="navbar navbar-default product-filter">
                        <ul class="display">
                            <li id="grid" class="active grid"><a href="#" title="Grid"><i class="fa fa-th-large"></i></a></li>
                            <li id="list" class="list"><a href="#" title="List"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                        <div class="limit">
                            <span>Sản phẩm/trang</span>
                            <select id="lblimit" name="lblimit" class="nb_item" onchange="window.location.href = this.options[this.selectedIndex].value">
                                <option value="?limit=4"></option>
                                <option value="?limit=4">4</option>
                                <option value="?limit=8">8</option>
                                <option value="?limit=12">12</option>
                            </select>
                        </div>
                    </nav>
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
                                                <li> <a class=" add-cart" href="<?php echo base_url('cart/add/'.$item->id) ?>" onclick="AddToCard(3329,1)"></a></li>
                                                <li><a class="add-wishlist" href="#"></a></li>
                                                <li><a class="add-compare" href="#"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <div class="navigation">
                        <ul class="pagination">
                            <?php
                            echo $this->pagination->create_links();
                            ?>
                        </ul>
                    </div>
                </section>
                <!--Template--
                --End-->
            </div>
            <?php if(!empty($catalog_sub)): ?>
            <div class="col-md-2">

                <div class="menu-product">
                    <h3>
                        <span class="uppercase">
                            <?php echo $catalog ->name ?>
                        </span>
                    </h3>
                    <ul class='level0'>
                        <?php foreach ($catalog_sub as $item): ?>
                        <li><span><a href="<?php echo base_url('product/catalog/'.$item->id.'/'.safe_title($item->name).'html') ?>"><i class='fa fa-check'></i><?php  echo $item->name ?></a></span></li>
                        <?php endforeach; ?>
                    </ul class='level0'>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('.menu-product li.child .open-close').on('click', function () {
                            $(this).removeAttr('href');
                            var element = $(this).parent('li');
                            if (element.hasClass('open')) {
                                element.removeClass('open');
                                element.children('ul').slideUp();
                            }
                            else {
                                element.addClass('open');
                                element.children('ul').slideDown();
                            }
                        });
                    });
                </script>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

