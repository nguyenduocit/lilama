
<div class="box-center"><!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Kết quả tìm kiếm với giá <?php echo $price_from ?>  đến  <?php echo $price_to ?></h2>
    </div>
    <?php if(empty($list)): ?>
    <h2>Không có sản phẩm trong khoản giá trên</h2>
    <?php else: ?>
    <div class="box-content-center product"><!-- The box-content-center -->
        <?php foreach ($list as $item ): ?>
            <div class="product_item">
                <h3>
                    <a title="<?php echo $item->name ?>" href="<?php echo base_url('product/view/'.$item->id) ?>">
                        <?php echo $item->name ?>
                    </a>
                </h3>
                <div class="product_img">
                    <a title="<?php echo $item->name ?>" href="<?php echo base_url('product/view/'.$item->id) ?>">
                        <img alt="<?php echo $item->name ?>" src="<?php echo base_url(); ?>/upload/product/<?php echo $item->image_link ?>" width="150" height="100">
                    </a>
                </div>
                <p class="price">
                    <?php if($item ->discount > 0):?>
                        <?php $price_new = $item->price - $item->discount;
                        echo number_format($price_new);

                        ?>
                        <span class="price_old"> <?php  echo number_format($item->price);
                            ?> </span>
                    <?else: ?>

                    <?php endif; ?>
                </p>
                <center>
                    <div class='raty' style='margin:10px 0px' id='7' data-score='3.5'></div>
                </center>
                <div class="action">
                    <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $item->view ?></b></p>
                    <a title="Mua ngay" href="them-vao-gio-9.html" class="button">Mua ngay</a>
                    <div class="clear"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
    </div><!-- End box-content-center -->
    <?php endif;?>
</div>	<!-- End box-center product-->