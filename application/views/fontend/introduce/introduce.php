<?php foreach($list as $value): ?>
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="menu-about">
                    <h3>
                        <span title=" Giới thiệu ">
                        Giới thiệu
                        </span>
                    </h3>
                    <ul>
                        <li><a href="<?php echo base_url('introduce')?>">Về Chúng Tôi</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong title =" <?php echo $value->title; ?> "><?php echo $value->title; ?></strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                </script>
                <div class="about-detail">
                    <div class="about-block">
                        <h1>Về chúng tôi .</h1>
                        <div class="content">

                           <!--  Lấy ra nội dung giới thiệu  -->
                            <?php echo $value->content; ?>

                            
                        </div>
                        <div class="social-group">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>