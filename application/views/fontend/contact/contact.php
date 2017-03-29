<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="breadcrumb clearfix">
                    <ul>
                        <li itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="home">
                            <a title="Đến trang chủ" href="/" itemprop="url"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li class="icon-li"><strong>Liên hệ</strong> </li>
                    </ul>
                </div>
                <script type="text/javascript">
                    $(".link-site-more").hover(function () { $(this).find(".s-c-n").show(); }, function () { $(this).find(".s-c-n").hide(); });
                </script>
                <script src="http://maps.google.com/maps/api/js?key=AIzaSyBO93-_2pxx4UBTNduADxfoWpsFrHAFKsA&amp;sensor=true" type="text/javascript"></script>
                
                <!--Begin-->
                <div class="contact-content clearfix ng-scope" ng-controller="contactController" ng-init="initController('Shop','Maps')">
                    <h1 class="title">
                        <span>
                        Thông tin liên hệ
                        </span>
                    </h1>
                    <div class="contact-block clearfix">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="/">
                                <img class="img-responsive" src="<?php echo base_url(); ?>/upload/shop151/images/logo.png">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <?php 
                                    // lặp ra thông tin liên hệ 
                                    foreach ($list_info as $key => $value) :
                                 ?>
                                <div class="contact-info">
                                    <div class="docs"><b class="name ng-binding"> TÊN CÔNG TY :<?php echo $value->name ?></b></div>
                                    <div class="docs ng-binding">
                                        <i class="fa fa-map-marker"></i>
                                        <b>Địa chỉ:</b> <?php echo $value->address ?>
                                    </div>
                                    <div class="docs ng-binding">
                                        <i class="fa fa-phone"></i>
                                        <b>Điện thoại:</b> <?php echo $value->phone ?>
                                    </div>
                                    <div class="docs ng-binding">
                                        <i class="fa fa-mobile"></i>
                                        <b>Hotline</b> <?php echo $value->phone ?>
                                    </div>
                                    <div class="docs">
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:info@runtime.vn" class="ng-binding"><?php echo $value->email ?></a>
                                    </div>
                                </div>
                           
                            </div>
                        </div>
                        <hr class="">
                        <h3 class="title">Gửi thông tin liên hệ</h3>
                        <div class="description">
                            Xin vui lòng điền các yêu cầu vào mẫu dưới đây và gửi cho chúng tôi. Chúng tôi
                            sẽ trả lời bạn ngay sau khi nhận được. Xin chân thành cảm ơn!
                        </div>

                        <?php $this->load->view('fontend/teamplate/alert'); ?>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="contact-feedback">
                                    <form ng-submit="sendContact()" class="ng-pristine ng-invalid ng-invalid-required ng-valid-email" method="post" action=""> 
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon glyphicon-user"></i></span>
                                            <input type="text" placeholder="Họ tên" name="name" ng-model="Name" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                            <input type="text" placeholder="Địa chỉ" name="address" ng-model="Address" class="form-control ng-pristine ng-untouched ng-valid">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                            <input type="email" placeholder="Email" name="email" ng-model="Email" class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" required="">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                            <input type="text" placeholder="Điện thoại" name="phone" ng-model="Phone" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="">
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                            <input type="text" placeholder="Tiêu đề" name="title" ng-model="Title" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" required="">
                                        </div>
                                        <div class="form-group">
                                            <textarea placeholder="Nội dung" name="content" class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" rows="3" ng-model="Content" required=""></textarea>
                                        </div>
                                        <button class="btn btn-default" type="submit">Gửi</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.012349016358!2d105.77182491443656!3d21.072168991671948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552e28b6fa2f%3A0xa07244f1396a3d6f!2zVHLGsOG7nW5nIMSR4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1490637741840" width="350" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                                    <!-- ngIf: Maps.length>1 -->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    var map;
                    var infowindow;
                    var marker = new Array();
                    var old_id = 0;
                    var infoWindowArray = new Array();
                    var infowindow_array = new Array();
                    function initialize() {
                        var defaultLatLng = new google.maps.LatLng(10.845064529472292, 106.636744831799320);
                    
                        var myOptions = { zoom: 16, center: defaultLatLng, scrollwheel: true, mapTypeId: google.maps.MapTypeId.ROADMAP };
                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                        map.setCenter(defaultLatLng);
                    
                        if (Maps.length <= 0) {
                            var arrLatLng = new google.maps.LatLng(10.845064529472292, 106.636744831799320);
                            var myHtml = "<div class='map-description'> <strong>" + firstMap.Name + "</strong><br/>Địa chỉ: <span>" + firstMap.Address + "</span><br/>Điện thoại: <span>" + firstMap.Phone + "</span><br/></div>";
                            infoWindowArray[firstMap.Id] = myHtml;
                            loadMarker(arrLatLng, infoWindowArray[firstMap.Id], firstMap.Id);
                        }
                    
                        $.each(Maps, function (index, it) {
                            var arrLatLng = new google.maps.LatLng(it.PosX, it.PosY);
                            var myHtml = "<div class='map-description'> <strong>" + it.Name + "</strong><br/>Địa chỉ: <span>" + it.Address + "</span><br/>Điện thoại: <span>" + it.Phone + "</span><br/></div>";
                            infoWindowArray[it.Id] = myHtml;
                            loadMarker(arrLatLng, infoWindowArray[it.Id], it.Id);
                        });
                    
                    
                        moveToMaker(firstMap.Id);
                    }
                    function loadMarker(myLocation, myInfoWindow, id) {
                        marker[id] = new google.maps.Marker({ position: myLocation, map: map, visible: true });
                        var popup = myInfoWindow;
                        infowindow_array[id] = new google.maps.InfoWindow({ content: popup });
                        google.maps.event.addListener(marker[id], 'click', function () {
                            if (id == old_id) return;
                            if (old_id > 0)
                                infowindow_array[old_id].close();
                            infowindow_array[id].open(map, marker[id]);
                            old_id = id;
                        });
                        google.maps.event.addListener(infowindow_array[id], 'closeclick', function () { old_id = 0; });
                    }
                    function moveToMaker(id) {
                        var location = marker[id].position;
                        map.setCenter(location);
                        if (old_id > 0)
                            infowindow_array[old_id].close();
                        infowindow_array[id].open(map, marker[id]);
                        old_id = id;
                    }
                </script>
                <!--End-->
                
            </div>
            <div class="col-md-3">
                <div class="box-support-online ng-scope" ng-controller="moduleController" ng-init="initSupportOnlineController('Shop','SupportOnlines')">
                    <h3><span>Hỗ trợ trực tuyến</span></h3>
                    <div class="support-online-block">
                        <div class="support-hotline">
                            HOTLINE<br><span class="ng-binding"><?php echo $value->phone ?></span>
                        </div>
                        <!-- ngRepeat: item in SupportOnlines -->
                    </div>
                </div>
                <!--End-->
                           
            </div>
        </div>
    </div>
</div>
 <?php endforeach; ?>