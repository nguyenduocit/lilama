<?php $this->load->view('backend/slide/head',$this->data); ?>
<div class="line"></div>

<div id="main_product" class="wrapper">
    <?php $this->load->view('backend/message',$this->data); ?>
    <div class="widget">

        <div class="title">
            <h6>
                Danh sách slide
            </h6>
            <div class="num f12">Số lượng: <b> <?php echo $total_row ?> </b></div>
        </div>

        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

            <thead class="filter"><tr><td colspan="6">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0"><tbody>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>

                <td style="width:60px;">Mã số</td>
                <td>Tiêu đề</td>
                <td>Link</td>
                <td style="width:75px;">Thứ tự hiển thị</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="6">
                    <div class="list_actionss itemActions">
                        <a url="<?php admin_url('news/deleteAll') ?>" class="button blueB" id="submit" href="#submit">
                            <span style="color:white;">Xóa hết</span>
                        </a>
                    </div>

                    <div class="pagination">
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            <?php foreach ($list as  $item ) { ?>
                <tr class="row_<?php echo $item -> id; ?>">

                    <td class="textC"><?php echo $item -> id; ?></td>

                    <td>
                        <div class="image_thumb">
                            <img height="50" src="<?php echo  base_url('upload/shop151/images/slider/'.$item -> image_link); ?>">
                            <div class="clear"></div>
                        </div>

                        <a target="_blank" title="" class="tipS" href="#">
                            <b><?php echo $item->name ?> </b>
                        </a>


                    </td>

                    <td class="textC"> <?php echo $item->link?></td>
                    <td class="textC"> <?php echo $item->sort_order?></td>

                    <td class="option textC">

                        <a title="Xem chi tiết image" class="tipS" target="_blank" href="<?php echo $item->link ?>">
                            <img src="<?php echo public_url('admin')?>/images/icons/color/view.png">
                        </a>
                        <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('slide/edit/'. $item->id) ?>">
                            <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png">
                        </a>

                        <a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('slide/delete/'. $item->id) ?>">
                            <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png">
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>

</div>
