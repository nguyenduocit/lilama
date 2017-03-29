<html>
    <head>
        <script src="<?php echo public_url() ?>/Scripts/angularJS/angular.min.js"></script>
        <script src="<?php echo public_url() ?>/Scripts/angularJS/angular-sanitize.min.js"></script>
        <script src="<?php echo public_url() ?>/app/appMain.js"></script>
        <script src="<?php echo public_url() ?>/app/directives/directive.js"></script>
        <script src="<?php echo public_url() ?>/app/directives/angular-summernote.js"></script>
        <script src="<?php echo public_url() ?>/app/directives/paging.js"></script>
        <script src="<?php echo public_url() ?>/app/services/ajaxServices.js"></script>
        <script src="<?php echo public_url() ?>/app/services/alertsServices.js"></script>
        <?php $this->load->view('fontend/teamplate/header'); ?>
    </head>
    <body ng-app="appMain" style="">
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=227481454296289";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="wraper">
        <div class="header">
            <?php $this->load->view('fontend/teamplate/head'); ?>
            <?php $this->load->view('fontend/teamplate/menu', $this->data); ?>
        </div>
        <div id="container">
            <?php $this->load->view('fontend/teamplate/slide', $this->data); ?>
            <?php $this->load->view('fontend/teamplate/adv', $this->data); ?>

            <?php $this->load->view($temp,$this->data); ?>
<!--            --><?php //$this->load->view('fontend/right',$this->data); ?>
            <div class="clear"></div>
            </div>
        <?php $this->load->view('fontend/teamplate/partner.php'); ?>
        <?php $this->load->view('fontend/teamplate/footer.php'); ?>
        </div>
    </body>
</html>