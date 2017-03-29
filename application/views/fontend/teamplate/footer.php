
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
                            <a href="<?php echo base_url('introduce')?>">
                                Về chúng tôi .
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('introduce')?>">
                                Tổng quan về công ty
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Chương trình khuyến mãi.
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="footer-box col-md-3 col-sm-12 col-xs-12">
                    <div class="item">
                        <h3>
                            <span>Liên hệ hợp tác.</span>
                        </h3>
                    </div>
                    <ul>
                        <li>
                            <a href="">
                                Dành cho doanh nghiệp
                            </a>
                        </li>
                        <li>
                            <a href="">
                                Liên hệ
                            </a>
                        </li>
                        <li>
                            <a href="">
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

                         <?php
                            if($this->session->flashdata('list_info'))
                            {
                                $phone = $this->session->flashdata('list_info');
                                foreach ($phone as $key => $value)
                                {

                            }
                            
                         ?>
                            <b><?php echo $value ->name; ?></b>
                            <p><i class="fa fa-map-marker"></i> <?php echo $value ->address; ?> </p>
                            <p>
                                <i class="fa fa-envelope"><?php echo $value ->email; ?></i>
                                <a href=""></a>
                            </p>
                            <p>
                                <i class="fa fa-phone"></i>
                                Phone: <?php echo $value ->phone; ?>
                            </p>

                        <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="footer-box box-social col-md-3 col-sm-12 col-xs-12">
                    <div class="item">
                        <h3>
                            Facebook
                        </h3>
                        <div class="fb-like-box" data-href="" data-width="289"
                             data-height="190" data-colorscheme="dark" data-show-faces="true" data-header="false"
                             data-stream="false" data-show-border="false">
                        </div>
                        <div class="social-icon">
                            <ul>
                                <li><a href="https://plus.google.com/u/0/112015411401740713155" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="https://www.facebook.com/nguyenvan.duoc.9083" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCpYjQXsOUcy0-k8M2seigAA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="https://twitter.com/nguyenduoc1994" target="_blank"><i class="fa fa-twitter "></i></a></li>
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
                            <a href="{{it.url}}" ng-if="it.LinkType==LinkTypeConst.url">
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