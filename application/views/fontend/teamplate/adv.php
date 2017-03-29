<div class="adv">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <link href="<?php echo public_url() ?>/Scripts/owl-carousel/owl.carousel.css" rel="stylesheet" />
                <link href="<?php echo public_url() ?>/Scripts/owl-carousel/owl.theme.css" rel="stylesheet" />
                <script src="<?php echo public_url() ?>/Scripts/owl-carousel/owl.carousel.min.js"></script>
                <script src="<?php echo public_url() ?>/app/services/moduleServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/moduleController.js"></script>
                <!--Begin-->
                <div class="adv-content row" ng-controller="moduleController" ng-init="initAdvSlideController('AdvSlides')">
                    <div class="owl-carousel">
                        <ul id="adv-content">
                            <li ng-repeat="item in AdvSlides">
                                <a href="{{item.Link}}"><img ng-src="{{item.Image}}" alt="{{it.Name}}" class="img-responsive" /></a>
                            </li>
                        </ul>
                        <div class="controls boxprevnext">
                            <a class="prev prevlogo"><i class="fa fa-angle-left"></i></a>
                            <a class="next nextlogo"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        var owladv = $(".adv-content ul");
                        owladv.owlCarousel({
                            autoPlay: true,
                            autoPlay: 5000,
                            items: 3,
                            slideSpeed: 1000,
                            pagination: false,
                            itemsDesktop: [1200, 3],
                            itemsDesktopSmall: [980, 3],
                            itemsTablet: [767, 1],
                            itemsMobile: [480, 1]
                        });
                        $(".adv-content .nextlogo").click(function () {
                            owladv.trigger('owl.next');
                        })
                        $(".adv-content .prevlogo").click(function () {
                            owladv.trigger('owl.prev');
                        })
                    });
                </script>
                <!--End-->
                <script type="text/javascript">
                    window.AdvSlides = [{"Id":350,"ShopId":151,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"1","Image":"<?php echo base_url(); ?>upload/shop151/images/adv/adv1.jpg","ImageThumbnai":"<?php echo base_url(); ?>upload/shop151/_thumbs/images/adv/adv1.jpg","Link":"#","IsVideo":false,"Index":1,"Inactive":false,"Timestamp":"AAAAAAAYxVY="},{"Id":351,"ShopId":151,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"2","Image":"<?php echo base_url(); ?>upload/shop151/images/adv/adv2.jpg","ImageThumbnai":"<?php echo base_url(); ?>upload/shop151/_thumbs/images/adv/adv2.jpg","Link":"#","IsVideo":false,"Index":2,"Inactive":false,"Timestamp":"AAAAAAAYxVc="},{"Id":352,"ShopId":151,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"3","Image":"<?php echo base_url(); ?>upload/shop151/images/adv/adv3.png","ImageThumbnai":"<?php echo base_url(); ?>upload/shop151/_thumbs/images/adv/adv3.png","Link":"#","IsVideo":false,"Index":3,"Inactive":false,"Timestamp":"AAAAAAAYxVg="},{"Id":353,"ShopId":151,"AdvType":2,"AdvTypeName":"Chạy ngang","Name":"4","Image":"<?php echo base_url(); ?>upload/shop151/images/adv/adv4.png","ImageThumbnai":"<?php echo base_url(); ?>upload/shop151/_thumbs/images/adv/adv4.png","Link":"#","IsVideo":false,"Index":4,"Inactive":false,"Timestamp":"AAAAAAAYxVk="}];
                </script>
            </div>
        </div>
    </div>
</div>