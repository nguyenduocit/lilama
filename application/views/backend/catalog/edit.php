<?php $this->load->view('backend/catalog/head',$this->data) ?>
<div class="line" xmlns="http://www.w3.org/1999/html"></div>

<div class="wrapper">
    <div class="widget">
        <form enctype="multipart/form-data" method="post" action="" id="form" class="form">
            <fieldset>
                <div class="widget">
                    <div class="title">
                        <img class="titleIcon" src="<?php echo public_url('admin') ?>/images/icons/dark/add.png">
                        <h6>Thêm mới danh mục sản phẩm</h6>
                    </div>

                    <ul class="tabs">
                        <li><a href="#tab1">Thông tin chung</a></li>

                    </ul>

                    <div class="tab_container">
                        <div class="tab_content pd0" id="tab1">
                            <div class="formRow">
                                <label for="param_name" class="formLeft">Tên sản phẩm:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo $list->name  ?>" name="name"></span>
                                    <span class="autocheck" name="name_autocheck"></span>
                                    <div class="clear error" name="name_error"> <?php echo form_error('name') ?></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label for="param_sort_order" class="formLeft">Thứ tự hiển thị:<span class="req"></span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input type="text" _autocheck="true" id="param_sort_order" value="<?php echo $list->sort_order; ?>" name="sort_order"></span>
                                    <span class="autocheck" name="name_autocheck"></span>
                                    <div class="clear error" name="name_error"> <?php echo form_error('sort_order') ?></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label for="param_sort_order" class="formLeft">Icon:<span class="req"></span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input type="text" _autocheck="true" id="param_icon" value="<?php echo $list->icon; ?>" name="icon"></span>
                                    <span class="autocheck" name="name_autocheck"></span>
                                    <div class="clear error" name="name_error"> <?php echo form_error('icon') ?></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow hide"></div>

                            <div class="formRow">
                                <label for="param_parent_id" class="formLeft">Danh mục cha:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo">
                                        <select _autocheck="true" id="param_parent_id" name="parent_id">
                                            <option value="0"> Đây là danh mục cha</option>
                                            <?php
                                            foreach ($lists as $item)
                                            {
                                                ?>
                                                <option value="<?php echo $item->id; ?>"  <?php  if($item->id == $list->parent_id) echo"selected";?>><?php echo $item->name; $list->parent_id ;?></option>
                                            <?php } ?>

                                        </select>
                                    </span>
                                    <span class="autocheck" name="name_autocheck"></span>
                                    <div class="clear error" name="name_error"> <?php echo form_error('parent_id') ?></div>
                                </div>
                                <div class="clear"></div>

                            </div>
                            div class="formRow">
                            <label for="param_sort_order" class="formLeft">Trạng thái :<span class="req"></span></label>
                            <div class="formRight">
                                    <span class="oneTwo">
                                        <label class="radio-inline">
                                            <input name="rdoStatus" value="0" checked="" type="radio">Hiện
                                        </label>
                                        <label class="radio-inline">
                                            <input name="rdoStatus" value="1" type="radio">Ẩn
                                        </label>
                                    </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"> <?php echo form_error('icon') ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                        </div>
                    </div><!-- End tab_container-->

                    <div class="formSubmit">
                        <input type="submit" class="redB" value="Cập nhật">
                        <input type="reset" class="basic" value="Hủy bỏ">
                    </div>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>