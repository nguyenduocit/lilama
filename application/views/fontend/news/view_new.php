<div class="wrapper">
    <div class="main">
        <div class="container">
            <div class="row">
                <?php $this->load->view('fontend/news/left_new'); ?>
                <div class="col-md-9">

                    <div class="breadcrumb clearfix">
                        <ul>
                            <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                                <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                            </li>
                            <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="icon-li">
                                <a title="Tin tức" href="/tin-tuc.html" itemprop="url"><span itemprop="title">Tin tức</span></a>
                            </li>
                            <li class="icon-li"><strong>NHỮNG G&#211;C KHUẤT CỦA NGHỀ STYLIST CHO SAO HOLLYWOOD</strong> </li>
                        </ul>
                    </div>
                    <script type="text/javascript">
                        $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                    </script>

                    <div class="news-detail">
                        <div class="news-block">
                            <h1><?php echo $new->title ?></h1>
                            <div class="date"><p class="date"><?php echo  get_date($new->created)?></p></div>
                            <div class="content">
                                <?php echo $new->content ?>
                            </div>
                            <div class="social-group">
                                <!-- AddThis Button BEGIN -->
                                <div class="addthis_toolbox addthis_default_style">
                                    <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>


                                    <a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
                                    <a class="addthis_counter addthis_pill_style addthis_nonzero"></a>
                                </div>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5334d6387b03b532"></script>
                                <!-- AddThis Button END -->        </div>
                        </div>
                        <div class="news-other">
                            <h3><span>Tin tức liên quan</span></h3>
                            <ul>
                                <li><a href="">Minh Hằng gợi cảm trong v&#225;y kho&#233;t ngực (14:29 15/04/2015)</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="partner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <link href="/Scripts/owl-carousel/owl.carousel.css" rel="stylesheet" />
                    <link href="/Scripts/owl-carousel/owl.theme.css" rel="stylesheet" />
                    <script src="/Scripts/owl-carousel/owl.carousel.min.js"></script>
                    <script src="/app/services/moduleServices.js"></script>
                    <script src="/app/controllers/moduleController.js"></script>
                    <!--Begin-->
                    <div class="partner-content owl-carousel" ng-controller="moduleController" ng-init="initPartnerController('Partners')">
                        <div class="partner-block">
                            <div class="partner-item" ng-repeat="item in Partners">
                                <a href="{{item.Link}}" target="_blank" title="{{item.Name}}">
                                    <img ng-src="{{item.Logo}}" alt="{{item.Name}}" class="img-responsive" />
                                </a>
                            </div>
                        </div>
                        <div class="controls boxprevnext">
                            <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                            <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            var owl = $(".partner-block");
                            owl.owlCarousel({
                                autoPlay: true,
                                autoPlay: 5000,
                                items: 6,
                                slideSpeed: 1000,
                                pagination: false,
                                itemsDesktop: [1200, 6],
                                itemsDesktopSmall: [980, 5],
                                itemsTablet: [767, 4],
                                itemsMobile: [480, 2]
                            });
                            $(".partner-content .nextlogo").click(function () {
                                owl.trigger('owl.next');
                            });
                            $(".partner-content .prevlogo").click(function () {
                                owl.trigger('owl.prev');
                            });
                        });
                    </script>
                    <!--End-->
                    <script type="text/javascript">
                        window.Partners = [{"Id":241,"ShopId":151,"Name":"1","Link":"#","Logo":"/Uploads/shop151/images/adv/1.png","Index":1,"Inactive":false},{"Id":242,"ShopId":151,"Name":"2","Link":"#","Logo":"/Uploads/shop151/images/adv/2.png","Index":2,"Inactive":false},{"Id":243,"ShopId":151,"Name":"3","Link":"#","Logo":"/Uploads/shop151/images/adv/3.png","Index":3,"Inactive":false},{"Id":244,"ShopId":151,"Name":"4","Link":"#","Logo":"/Uploads/shop151/images/adv/4.png","Index":4,"Inactive":false},{"Id":245,"ShopId":151,"Name":"5","Link":"#","Logo":"/Uploads/shop151/images/adv/5.png","Index":5,"Inactive":false},{"Id":253,"ShopId":151,"Name":"6","Link":"#","Logo":"/Uploads/shop151/images/adv/8.png","Index":6,"Inactive":false}];
                    </script>                        </div>
            </div>
        </div>
    </div>


    <div class="footer">

        <div class="footer-content clearfix">
            <div class="container">
                <div class="row">
                    <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                <span>Giới thiệu</span>
                            </h3>
                        </div>
                        <ul>
                            <li>
                                <a href="/gioi-thieu.html">
                                    Về ch&#250;ng t&#244;i
                                </a>
                            </li>
                            <li>
                                <a href="/gioi-thieu.html">
                                    Tổng quan về c&#244;ng ty
                                </a>
                            </li>
                            <li>
                                <a href="/content/chuong-trinh-khuyen-mai.html">
                                    Chương tr&#236;nh khuyến m&#227;i
                                </a>
                            </li>
                            <li>
                                <a href="/content/cam-nam-mua-sam.html">
                                    Cẩm nam mua sắm
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                <span>Li&#234;n hệ - Hợp t&#225;c</span>
                            </h3>
                        </div>
                        <ul>
                            <li>
                                <a href="/content/danh-cho-doanh-nghiep.html">
                                    D&#224;nh ch&#242; doanh nghiệp
                                </a>
                            </li>
                            <li>
                                <a href="/lien-he.html">
                                    Li&#234;n hệ
                                </a>
                            </li>
                            <li>
                                <a href="/content/tuyen-dung.html">
                                    Tuyển  dụng
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-box box-address col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                Thông tin công ty
                            </h3>
                            <div class="box-address-content">
                                <b>C&#212;NG TY TNHH PH&#193;T TRIỂN C&#212;NG NGHỆ RUNTIME</b>
                                <p><i class="fa fa-map-marker"></i> 5/12A Quang Trung, P.14, Q.G&#242; Vấp, Tp.HCM</p>
                                <p>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:info@runtime.vn">info@runtime.vn</a>
                                </p>
                                <p>
                                    <i class="fa fa-phone"></i>
                                    Phone: (08) 66 85 85 38
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-box box-social col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                Facebook
                            </h3>
                            <div class="fb-like-box" data-href="https://www.facebook.com/runtime.vn" data-width="289"
                                 data-height="190" data-colorscheme="dark" data-show-faces="true" data-header="false"
                                 data-stream="false" data-show-border="false">
                            </div>
                            <div class="social-icon">
                                <ul>
                                    <li><a target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="https://www.facebook.com/runtime.vn" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    <li><a target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    <li><a target="_blank"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="footer-box box-letter col-md-3 col-sm-12 col-xs-12 hide">
                        <div class="item">
                            <h3>
                                Đăng ký nhận tin
                            </h3>
                            <div class="letter-title">
                                <span>Hộp thư</span><i class="icon-title"></i>
                            </div>
                            <div class="letter-content">
                                <div class="new-paper">
                                    <div class="input-box">
                                        <input type="text" name="email" id="txtNewsletter" class="input-text form-control" value="" placeholder="Your Emain Address" />
                                    </div>
                                    <div class="button text-center">
                                        <a class="btn btn-primary">Nhận tin</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Template--
        <div class="footer-content clearfix" ng-controller="moduleController" ng-init="initFooterController('Shop')">
            <div class="container">
                <div class="row">
                    <div class="footer-box col-md-3 col-sm-12 col-xs-12" ng-repeat="item in menus|filter: { ParentId: null }|limitTo:2">
                        <div class="item">
                            <h3>
                                <span>{{item.Name}}</span>
                            </h3>
                        </div>
                        <ul ng-if="(menus|filter: { ParentId: item.Id }).length>0">
                            <li ng-repeat="it in menus|filter: { ParentId: item.Id }">
                                <a href="/{{it.PageCode}}.html" ng-if="it.LinkType==LinkTypeConst.Page">
                                    {{it.Name}}
                                </a>
                                <a href="/{{it.PageCode}}/{{it.Code}}.html" ng-if="it.LinkType==LinkTypeConst.Content">
                                    {{it.Name}}
                                </a>
                                <a href="/san-pham/{{it.ProductGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupProduct">
                                    {{it.Name}}
                                </a>
                                <a href="/tin-tuc/{{it.NewsGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupNews">
                                    {{it.Name}}
                                </a>
                                <a href="/du-an/{{it.ProjectGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupProject">
                                    {{it.Name}}
                                </a>
                                <a href="/dich-vu/{{it.ServiceGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupService">
                                    {{it.Name}}
                                </a>
                                <a href="/san-giao-dich/{{it.ExchangeGroupCode}}" ng-if="it.LinkType==LinkTypeConst.GroupExchange">
                                    {{it.Name}}
                                </a>
                                <a href="{{it.Url}}" ng-if="it.LinkType==LinkTypeConst.Url">
                                    {{it.Name}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-box box-address col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                Thông tin công ty
                            </h3>
                            <div class="box-address-content">
                                <b>{{shop.Name}}</b>
                                <p><i class="fa fa-map-marker"></i> {{shop.Address}}</p>
                                <p>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:{{shop.Email}}">{{shop.Mail}}</a>
                                </p>
                                <p>
                                    <i class="fa fa-phone"></i>
                                    Phone: {{shop.Phone}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-box box-social col-md-3 col-sm-12 col-xs-12">
                        <div class="item">
                            <h3>
                                Facebook
                            </h3>
                            <div data-show-border="false" data-stream="false" data-header="false" data-show-faces="true" data-colorscheme="dark" data-height="190" data-width="289" data-href="{{shop.Fanpage}}" class="fb-like-box">
                            </div>
                            <div class="social-icon">
                                <ul>
                                    <li><a href="{{shop.Google}}"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="{{shop.Facebook}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{shop.Youtube}}"><i class="fa fa-youtube"></i></a></li>
                                    <li><a href="{{shop.Twitter}}"><i class="fa fa-twitter "></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom clearfix">
                <div class="container">
                    <div class="row">
                        &copy; 2015 Runtime Store. All Rights Reserved. Designed by <a target="_blank" href="http://runtime.vn">Runtime.vn</a>
                    </div>
                </div>
            </div>
        </div>
        --End-->
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".menu-quick-select ul").hide();
            $(".menu-quick-select").hover(function () { $(".menu-quick-select ul").show(); }, function () { $(".menu-quick-select ul").hide(); });
        });
    </script>
</div>


<div style="display: none;" id="loading-mask">
    <div id="loading_mask_loader" class="loader">
        <img alt="Loading..." src="/Images/ajax-loader-main.gif" />
        <div>
            Please wait...
        </div>
    </div>
</div>


</body>
</html>
<script type="text/javascript">
    $(".header-content").css({ "background": '' });
    $("html").addClass('');
    $(document).ready(function () {
        $("img.lazy-img").each(function () {
            $(this).attr("data-original", $(this).attr("src"));
            $(this).attr("src", "/Images/blank.gif");
        });
        $("img.lazy-img").lazyload({
            effect: "fadeIn",
            threshold: 200
        });
    });
</script>

