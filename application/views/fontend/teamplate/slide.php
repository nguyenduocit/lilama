<div class="slideshow">
	<div class="container">
		<div class="row">
			<div class="col-md-3">

			</div>

			<div class="col-md-9 ">
				<script src="<?php echo public_url() ?>/app/services/moduleServices.js"></script>
				<script src="<?php echo public_url() ?>/app/controllers/moduleController.js"></script>
				<!--Begin-->
				<link href="<?php echo public_url() ?>/Scripts/flexSlider/flexslider.css" rel="stylesheet" type="text/css" />
				<script src="<?php echo public_url() ?>/Scripts/flexSlider/jquery.flexslider-min.js" type="text/javascript"></script>
				<div class="flexslider slideshow-content" id="bannerheaderhome" ng-controller="moduleController" ng-init="initSlideshowController('Slideshows')">
					<ul class="slides">
						<li ng-repeat="item in Slideshows">
							<a title="{{item.Name}}" href="{{item.Link}}">
								<img alt="{{item.Name}}" ng-src="{{item.Image}}" src="{{item.Image}}" />
							</a>
						</li>
					</ul>

				</div>
				<script type="text/javascript">
					$(document).ready(function () {
						$('#bannerheaderhome').flexslider({
							directionNav: true,
							controlNav: false,
							animation: "slide",
							itemHeigh: 250,
							itemMargin: 0,
							animationSpeed: 700,
							slideshowSpeed: 3000
						});
					});
				</script>
				<!--End-->
				<script type="text/javascript">
					window.Slideshows = [
						{"Id":714,"ShopId":151,"Name":"2","Image":"<?php echo base_url(); ?>upload/shop151/images/slider/Thang-OPPO-800-300-5.png","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAASXH4="},
						{"Id":714,"ShopId":151,"Name":"2","Image":"<?php echo base_url(); ?>upload/shop151/images/slider/Tao-Moi-Gia-Hoi-800-300.png","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAASXH4="},
						{"Id":714,"ShopId":151,"Name":"2","Image":"<?php echo base_url(); ?>upload/shop151/images/slider/Phu-Kien-Giam-20-800-300.png","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAASXH4="},
						{"Id":714,"ShopId":151,"Name":"2","Image":"<?php echo base_url(); ?>upload/shop151/images/slider/HTC-One-Me-vs-E9-Dual-800-300.png","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAASXH4="},
						{"Id":714,"ShopId":151,"Name":"2","Image":"<?php echo base_url(); ?>upload/shop151/images/slider/Galaxy-Tab-A6-800-300.png","Link":"#","Index":2,"Inactive":false,"Timestamp":"AAAAAAASXH4="}
					];
				</script>

			</div>
		</div>
	</div>
</div>