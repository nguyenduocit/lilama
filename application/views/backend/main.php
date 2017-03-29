<html>
    <head>
        <?php $this ->load->view('backend/head');?>
    </head>
    <bpdy>
        <div id="left_content">
            <?php $this->load->view('backend/left'); ?>
            </div>
        <div id="rightSide">
            <?php $this->load->view('backend/header'); ?>
<!--            content-->
                <?php $this->load->view($temp,$this->data); ?>
<!--            end content-->
            <?php $this->load->view('backend/footer'); ?>
            </div>
        <div class="clear"></div>


    </bpdy>
</html>