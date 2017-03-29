<?php $this->load->view('backend/product/head',$this->data); ?>
<div class="line"></div>

<div id="main_product" class="wrapper">
    <?php $this->load->view('backend/message',$this->data); ?>
    <div class="widget">

        <div class="title">
            <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
            <h6>
                Danh sách sản phẩm			</h6>
            <div class="num f12">Số lượng: <b> <?php echo $total_row ?> </b></div>
        </div>

        <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">

            <thead class="filter"><tr><td colspan="10">
                    <form method="get" action="" class="list_filter form">
                        <table width="80%" cellspacing="0" cellpadding="0"><tbody>

                            <tr>
                                <td style="width:40px;" class="label"><label for="filter_id">Mã số</label></td>
                                <td class="item"><input type="text" style="width:55px;" id="filter_id" value=" <?php echo $this->input->get('id') ?>" name="id"></td>

                                <td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
                                <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name') ?>" name="name"></td>

                                <td style="width:60px;" class="label"><label for="filter_status">Thể loại</label></td>
                                <td class="item">
                                    <select name="catalog">

                                   <!--  Lọc dữ liệu theo thể loại -->
                                        <option value=""></option>
                                        <!-- kiem tra danh muc co danh muc con hay khong -->
                                        <?php foreach ($catalog as $item)
                                        {
                                            if (count($item->subs)>1)
                                            {


                                        ?>
                                        <optgroup label="<?php echo $item->name ?>">
                                            <?php foreach ($item ->subs as $sub ): ?>
                                                <option value="<?php echo $sub->id ?>" <?php echo ($this->input->get('catalog') == $sub->id)? 'selected':'' ?> >
                                                    <?php echo $sub->name ?>
                                                </option>
                                                <?php endforeach;?>
                                        </optgroup>
                                        <?php }else{ ?>
                                                <option value="<?php echo $item->id ?>" <?php echo ($this->input->get('catalog') == $item->id)? 'selected':'' ?> > <?php echo $item->name ?></option>
                                        <?php
                                            }
                                        } ?>



                                    </select>
                                </td>

                                <td style="width:150px">
                                    <input type="submit" value="Lọc" class="button blueB">
                                    <input type="reset" onclick="window.location.href = '<?php echo admin_url("product") ?>'; " value="Reset" class="basic">
                                </td>

                            </tr>
                            </tbody></table>
                    </form>
                </td></tr></thead>

            <thead>
            <tr>
                <td style="width:21px;"><img src="<?php echo public_url('admin') ?>/images/icons/tableArrows.png"></td>
                <td style="width:60px;">Mã số</td>
                <td>Tên</td>
                <td>Giá</td>
                <td>Số lượng SP </td>
                <td style="width:75px;">Ngày tạo</td>
                <td style="width:120px;">Hành động</td>
            </tr>
            </thead>

            <tfoot class="auto_check_pages">
            <tr>
                <td colspan="10">
                    <div class="list_action itemActions">
                        <a url="<?php admin_url('product/deleteAll') ?>" class="button blueB" id="submit" href="#submit">
                            <span style="color:white;">Xóa hết</span>
                        </a>
                    </div>

                    <div class="pagination">
                        <?php
                            echo $this->pagination->create_links();
                        ?>
                    </div>
                </td>
            </tr>
            </tfoot>

            <tbody class="list_item">
            <?php foreach ($list as  $item ) { ?>
            <tr class="row_<?php echo $item -> id; ?>">
                <td><input type="checkbox" value="<?php echo $item -> id; ?>" name="id[]"></td>

                <td class="textC"><?php echo $item -> id; ?></td>

                <td>
                    <div class="image_thumb">
                        <img height="50" src="<?php echo base_url(); ?>Upload/shop151/images/product/<?php echo $item->image_link ?>">
                        <div class="clear"></div>
                    </div>

                    <a target="_blank" title="" class="tipS" href="">
                        <b><?php echo $item->name ?> </b>
                    </a>

                    <div class="f11">
                        Đã bán: <?php echo $item->buyed ?> | <?php echo $item->view ?>
                    </div>

                </td>

                <td class="textR">
                    <?php
                        if($item->discount >0)
                        {
                            $price_new = $item->price - $item->discount;

                    ?>
                            <b style="color: red;"> <?php echo number_format($price_new) ?></b>
                    <?php }else{ ?>

                            <b style="color: red;"> <?php echo number_format($item->price) ?></b>
                     <?php    } ?>


                </td>
                <td class="textC"> <?php echo $item->total?></td>


                <td class="textC"> <?php echo  get_date($item->created)?></td>

                <td class="option textC">
                    <a class="tipS" title="Chỉnh sửa" href="<?php echo admin_url('product/edit/'. $item->id) ?>">
                        <img src="<?php echo public_url('admin')?>/images/icons/color/edit.png">
                    </a>

                    <a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('product/delete/'. $item->id) ?>">
                        <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png">
                    </a>
                </td>
            </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>

</div>
