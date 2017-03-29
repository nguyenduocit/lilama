<?php $this->load->view('backend/catalog/head',$this->data); ?>

<div class="wrapper">
    <?php $this->load->view('backend/message',$this->data); ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
            <h6>Danh sách sản phẩm</h6>
            <div class="num f12">Tổng số: <?php  echo $total ?> <b>0</b></div>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png" /></td>
                <td style="width:80px;">Mã số</td>
                <td style="width:80px;">Thứ tự hiển thị</td>
                <td>Tên Danh Mục</td>
                <td style="width:100px;">Hành động</td>
            </tr>
            </thead>

            <tfoot>
            <tr>
                <td colspan="7">
                    <div class="list_actions itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="<?php admin_url('catalog/deleteAll/deleteAll') ?>">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    <div class='pagination'>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody>
            <!-- Filter -->
            <?php
            $stt = 0;
            if(isset($list) && !empty($list))
            {
                foreach($list as $item) {
                    $stt = $stt + 1;
                    ?>

                    <tr class="row_<?php echo $item -> id; ?>">
                        <td><input type="checkbox" name="id[]" value="<?php echo $item -> id; ?>"/></td>

                        <td class="textC"><?php echo $stt; ?>  </td>
                        <td>
                        <span title="" class="tipS">
							<?php echo $item->sort_order; ?>
                        </span>
                        </td>
                        <td>
                        <span title="" class="tipS">
							<?php echo $item->name; ?>
                        </span>
                        </td>

                        <td class="option">
                            <a href="<?php echo admin_url('catalog/edit/' . $item->id) ?>" title="Chỉnh sửa"
                               class="tipS ">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png"/>
                            </a>

                            <a href="<?php echo admin_url('catalog/delete/' . $item->id) ?>" title="Xóa"
                               class="tipS verify_action">
                                <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png"/>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }else
            {
                $this->session->set_flashdata('message','Không tồn tại danh mục sản phẩm !');
            }
            ?>

            </tbody>
        </table>

    </div>
</div>
<div class="clear mt30"></div>

