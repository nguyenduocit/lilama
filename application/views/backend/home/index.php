<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Bảng điều khiển</h5>
            <span>Trang quản lý hệ thống</span>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>

<div class="wrapper">

    <div class="widgets">
        <!-- Stats -->

        <!-- Amount -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url('admin') ?>/images/icons/dark/money.png">
                    <h6>Doanh số</h6>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
                    <tbody>

                    <tr>
                        <td class="fontB blue f13">Tổng doanh số</td>
                        <td style="width:120px;" class="textR webStatsLink red">
                            <?php
                                $S = 0;
                                foreach ($listtt  as $item)
                                {
                                    $S = $S + $item->amount;
                                }

                                echo number_format($S) ."đ";
                            ?>

                        </td>
                    </tr>

                    <tr>
                        <td class="fontB blue f13">Doanh số hôm nay</td>
                        <td style="width:120px;" class="textR webStatsLink red">
                            <?php
                            $S = 0;
                            foreach ($lists  as $item)
                            {
                                $S = $S + $item->amount;
                            }

                            echo number_format($S) ."đ";
                            ?>
                        </td>
                    </tr>

                    <tr>
                        <td class="fontB blue f13">Doanh số theo tháng</td>
                        <td style="width:120px;" class="textR webStatsLink red">
                            0 đ
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <!-- User -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url('admin') ?>/images/icons/dark/users.png">
                    <h6>Thống kê dữ liệu</h6>
                </div>

                <table width="100%" cellspacing="0" cellpadding="0" class="sTable myTable">
                    <tbody>

                    <tr>
                        <td>
                            <div class="left">Tổng số gia dịch</div>
                            <div class="right f11"><a href="admin/tran.html"></a></div>
                        </td>

                        <td class="textC webStatsLink">
                           <?php echo $total_row ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số sản phẩm</div>
                            <div class="right f11"><a href=""></a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo $total_row_pr ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số bài viết</div>
                            <div class="right f11"><a href="admin/news.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo $total_row_nw ?>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số thành viên</div>
                            <div class="right f11"><a href="admin/user.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">

                            <?php echo $total_row_us ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="left">Tổng số liên hệ</div>
                            <div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            0					</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="clear"></div>

        <!-- Giao dich thanh cong gan day nhat -->

        <div class="widget">
            <div class="title">
                <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
                <h6>Danh sách Giao dịch</h6>
            </div>

            <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">


                <thead>
                <tr>
                    <td style="width:10px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png"></td>
                    <td style="width:60px;">Mã số</td>
                    <td style="width:75px;">Thành viên</td>
                    <td style="width:90px;">Số tiền</td>
                    <td>Hình thức</td>
                    <td style="width:100px;">Giao dịch</td>
                    <td style="width:75px;">Ngày tạo</td>
                    <td style="width:55px;">Hành động</td>
                </tr>
                </thead>

                <tfoot class="auto_check_pages">
                </tfoot>

                <tbody class="list_item">
                <?php if (!empty($list)): ?>
                    <?php foreach ($list as $item): ?>
                    <tr>
                    <td><input type="checkbox" value="<?php echo $item->id ?>" name="id[]"></td>

                    <td class="textC"> <?php echo $item->id ?> </td>

                    <td>
                        <?php echo $item->user_name ?>
                    </td>

                    <td class="textR red"><?php echo number_format($item->amount) ?> đ</td>

                    <td>
                        <?php echo $item ->payment  ?>
                    </td>


                    <td class="status textC">
						<span class="pending">
						Chờ xử lý
                        </span>
                    </td>

                    <td class="textC"><?php echo  get_date($item->created)?></td>

                    <td class="option textC">

                        <a title="Xem chi tiết giao dịch" class="tipS" target="_blank" href="<?php echo admin_url('transaction/view/'. $item->id) ?>">
                            <img src="<?php echo public_url('admin')?>/images/icons/color/view.png">
                        </a>
                        <a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('transaction/delete/'. $item->id) ?>">
                            <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png">
                        </a>
                    </td>
                </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h1>Chưa tồn tại giao dịch</h1>
                <?php endif; ?>
                </tbody>

            </table>
        </div>

    </div>

</div>

<div class="clear mt30"></div>