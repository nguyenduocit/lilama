<div class="col-md-3">

    <div class="menu-news">
        <h3>
            <span>
                Tin tức
            </span>
        </h3>
        <ul class='level0'><li><a href='/tin-tuc/tin-thi-truong'><i class='fa fa-arrow-circle-o-right'></i>Tin thị trường</a></li>
            <li><a href='/tin-tuc/tin-khuyen-mai'><i class='fa fa-arrow-circle-o-right'></i>Tin khuyến mãi</a></li>
        </ul class='level0'>
    </div>

    <div class="box-news">
        <h3>
        <span>
            Tin tức nổi bật
        </span>
        </h3>
        <div class="news-content">
            <div class=" news-block clearfix">
                <?php if (!empty($new_list)): ?>
                    <?php foreach ($new_list as $item): ?>
                        <div class="news-item clearfix">
                    <div class="col-md-4 col-sm-4 col-xs-4 image"><a href="<?php echo base_url('news/view/'.$item->id) ?>"><img class="img-responsive" src="<?php echo base_url(); ?>upload/news/<?php echo $item->image_link ?>" alt="<?php echo $item->title ?>" title="NHỮNG G&#211;C KHUẤT CỦA NGHỀ STYLIST CHO SAO HOLLYWOOD"/></a></div>
                    <div class="col-md-8 col-sm-8 col-xs-8 news-info ">
                        <h2 class="name"><a href="/">NHỮNG G&#211;C KHUẤT CỦA NGHỀ STYLIST CHO SAO HOLLYWOOD</a></h2>

                    </div>
                </div>
                    <?php endforeach; ?>
                <?else:?>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>