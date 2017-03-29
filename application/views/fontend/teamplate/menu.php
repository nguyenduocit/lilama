<section class="navigation-menu clearfix">
    <div class="container">
        <div class="menu-top">
            <div class="row">
                <div class="col-md-3">
                    <div class="menu-cate menu-quick-select">
                        <div class="menu-cate-title">
                            <span><i class="fa fa-th-list"></i><a href="<?php echo base_url() ?>">Danh mục sản phẩm</a></span>
                            <i class="fa fa-chevron-circle-down"></i>
                        </div>
                        <ul class="menu-cate-content">
                            <?php foreach ($catalog_list as $item): ?>
                                <li>
                                    <a title="<?php echo $item->name ?>" href="<?php echo base_url('product/catalog/'.$item->id) ?>"<i class="<?php echo $item->icon ?>"></i>&nbsp;&nbsp;<?php echo $item->name ?><span class="arrow-menu"><i class="fa fa-chevron-right "></i></span></a>
                                    <!-- lay danh sach danh muc con -->
                                    <?php if(!empty($item ->sub)):?>
                                        <div class="sub-menu hidden-xs">
                                            <?php foreach ($item->sub as $sub): ?>
                                                    <ul class="colum0" >
                                                        <li>
                                                            <a title=" Acer" href="<?php echo base_url('product/catalog/'.$sub->id) ?>">
                                                                <?php echo $sub->name ?>
                                                            </a>
                                                        </li>

                                                    </ul>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9 ">
                    <nav class="navbar nav-menu">
                        <div class="navbar-header">
                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#mobile-menu" aria-controls="mobile-menu" aria-expanded="false">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <nav id="mobile-menu" class="mobile-menu collapse navbar-collapse">
                            <ul class='menu nav navbar-nav'><li class="level0"><a class='' href='<?php echo base_url() ?>'><span>Trang chủ</span></a></li>
                                <li class="level0"><a class='' href='<?php echo base_url('introduce')?>'><span>Giới thiệu</span></a></li>
                                <li class="level0"><a class='' href='<?php echo base_url('product')?>'><span>Sản phẩm</span></a></li>
                                <li class="level0"><a class='' href='<?php echo base_url('news')?>'><span>Tin tức</span></a></li>
                                <li class="level0"><a class='' href='<?php echo base_url('contact')?>'><span>Liên hệ</span></a></li>
                            </ul class='menu nav navbar-nav'>
                        </nav>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</section>
<script type="text/javascript">
    $(document).ready(function () {
        var str = location.href.toLowerCase();
        $("ul.menu li a").each(function () {
            if (str.indexOf(this.href.toLowerCase()) >= 0) {
                $("ul.menu li").removeClass("active");
                $(this).parent().addClass("active");
            }
        });
    });
</script>