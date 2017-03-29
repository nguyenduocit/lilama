
<div class="partner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <link href="<?php echo public_url() ?>/Scripts/owl-carousel/owl.carousel.css" rel="stylesheet" />
                <link href="<?php echo public_url() ?>/Scripts/owl-carousel/owl.theme.css" rel="stylesheet" />
                <script src="<?php echo public_url() ?>/Scripts/owl-carousel/owl.carousel.min.js"></script>
                <script src="<?php echo public_url() ?>/app/services/moduleServices.js"></script>
                <script src="<?php echo public_url() ?>/app/controllers/moduleController.js"></script>
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
                    window.Partners = [{"Id":241,"ShopId":151,"Name":"1","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/1.png","Index":1,"Inactive":false},{"Id":241,"ShopId":151,"Name":"1","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/1.png","Index":1,"Inactive":false},{"Id":242,"ShopId":151,"Name":"2","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/2.png","Index":2,"Inactive":false},{"Id":243,"ShopId":151,"Name":"3","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/3.png","Index":3,"Inactive":false},{"Id":244,"ShopId":151,"Name":"4","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/4.png","Index":4,"Inactive":false},{"Id":245,"ShopId":151,"Name":"5","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/5.png","Index":5,"Inactive":false},{"Id":253,"ShopId":151,"Name":"6","Link":"#","Logo":"<?php echo base_url(); ?>upload/shop151/images/adv/8.png","Index":6,"Inactive":false}];
                </script>                        </div>
        </div>
    </div>
</div>