<?php $this->load->view('backend/admin/head',$this->data); ?>
<div class="line"></div>

<div class="wrapper">
    <?php $this->load->view('backend/message',$this->data); ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
            <h6>Danh sách thành viên</h6>
            <div class="num f12">Tổng số: <?php  echo $total ?> <b>0</b></div>
        </div>
            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
                <thead>
                <tr>
                    <td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png" /></td>
                    <td style="width:80px;">Mã số</td>
                    <td>Tên Đăng Nhập</td>
                    <td>Tên Thật </td>
                    <td>Email</td>
                    <td style="width:100px;">Hành động</td>
                </tr>
                </thead>

                <tfoot>
                <tr>
                    <td colspan="7">
                        <div class="list_action itemActions">
                            <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
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
                foreach($list as $item)
                {
                    $stt = $stt +1;
                    ?>

                <tr>
                    <td><input type="checkbox" name="id[]" value="19" /></td>

                    <td class="textC"><?php echo $stt; ?>  </td>

                    <td>
                        <span title="" class="tipS">
							<?php echo $item->username; ?>
                        </span>
                    </td>
                    <td>
                        <span title="" class="tipS">
							<?php echo $item->name; ?>
                        </span>
                    </td>


                    <td>
                        <span title="hoangvantuyencnt@gmail.com" class="tipS">
							<?php echo $item->email; ?>
                        </span>
                    </td>
                    <td class="option">
                        <a href="<?php echo admin_url('admin/edit/'.$item->id) ?>" title="Chỉnh sửa" class="tipS ">
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
                        </a>

                        <a href="<?php echo admin_url('admin/delete/'.$item->id) ?>" title="Xóa" class="tipS verify_action" >
                            <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
                        </a>
                    </td>
                </tr>
                <?php
                }
                ?>

                </tbody>
            </table>

    </div>
</div>
<div class="clear mt30"></div>
