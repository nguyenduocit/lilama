<?php $this->load->view('backend/product/head',$this->data); ?>
<div class="line"></div>

<div class="wrapper">

    <!-- Form -->
    <form enctype="multipart/form-data" method="post" action="<?php echo admin_url('product/add') ?>" id="form" class="form">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img class="titleIcon" src="<?php echo public_url('admin') ?>/images/icons/dark/add.png">
                    <h6>Thêm mới Sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
                    <li><a href="#tab2">SEO Onpage</a></li>
                    <li><a href="#tab3">Bài viết</a></li>
                    <li><a href="#tab4">Thông só kỹ thuật</a></li>

                </ul>

                <div class="tab_container">
                    <div class="tab_content pd0" id="tab1">
                        <div class="formRow">
                            <label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" _autocheck="true" id="param_name" name="name" value="<?php echo set_value('name') ?> ">
                                </span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('name') ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left">
                                    <input type="file" name="image" id="image">
                                   
                                </div>
                                <div class="clear error" name="image_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft">Ảnh kèm theo:</label>
                            <div class="formRight">
                                <div class="left"><input type="file" multiple="" name="image_list[]" id="image_list"></div>
                                <div class="clear error" name="image_list_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_price" class="formLeft">
                                Giá :
                                <span class="req">*</span>
                            </label>
                            <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" _autocheck="true" class="format_number" id="param_price" style="width:100px" name="price" value="<?php echo set_value('price') ?>">
                                <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Giá bán sử dụng để giao dịch" class="tipS">
                            </span>
                                <span class="autocheck" name="price_autocheck"></span>
                                <div class="clear error" name="price_error"> <?php echo form_error('price') ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <!-- Price -->
                        <div class="formRow">
                            <label for="param_discount" class="formLeft">
                                Giảm giá (%)
                                <span></span>:
                            </label>
                            <div class="formRight">
                            <span>
                                <input type="text" class="format_number" id="param_discount" style="width:100px" name="discount" value="<?php echo set_value('discount') ?>">
                                <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Số tiền giảm giá" class="tipS">
                            </span>
                                <span class="autocheck" name="discount_autocheck"></span>
                                <div class="clear error" name="discount_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_discount" class="formLeft">
                                Tổng số sản phẩm nhập vào :
                                <span></span>:
                            </label>
                            <div class="formRight">
                            <span>
                                <input type="text" class="format_number" id="param_discount" style="width:100px" name="total" value="<?php echo set_value('discount') ?>">
                                <img src="<?php echo public_url('admin') ?>/crown/images/icons/notifications/information.png" style="margin-bottom:-8px" title="Số tiền giảm giá" class="tipS">
                            </span>
                                <span class="autocheck" name="discount_autocheck"></span>
                                <div class="clear error" name="discount_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow">
                            <label for="param_cat" class="formLeft">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <select class="left" id="param_cat" _autocheck="true" name="cat">

                                    <option value="">Lựa chọn danh mục</option>
                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                    <?php foreach ($catalog as $item)
                                    {
                                        if (!empty($item ->subs))
                                        {


                                            ?>
                                            <optgroup label="<?php echo $item->name ?>">
                                                <?php foreach ($item ->subs as $sub ): ?>
                                                    <option value="<?php echo $sub->id ?>" >
                                                        <?php echo $sub->name ?>
                                                    </option>
                                                <?php endforeach;?>
                                            </optgroup>
                                        <?php }else{ ?>
                                            <option value="<?php echo $item->id ?>" > <?php echo $item->name ?></option>
                                            <?php
                                        }
                                    } ?>


                                </select>
                                <span class="autocheck" name="cat_autocheck"></span>
                                <div class="clear error" name="cat_error"><?php echo form_error('cat') ?></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <!-- warranty -->
                        <div class="formRow">
                            <label for="param_warranty" class="formLeft">
                                Bảo hành :
                            </label>
                            <div class="formRight">
                                <span class="oneFour"><input type="text" id="param_warranty" name="warranty" value="<?php echo set_value('warranty') ?>"></span>
                                <span class="autocheck" name="warranty_autocheck"></span>
                                <div class="clear error" name="warranty_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_sale" class="formLeft">Tặng quà:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" id="param_sale" name="gifts"><?php echo set_value('gifts') ?></textarea> </span>
                                <span class="autocheck" name="sale_autocheck"></span>
                                <div class="clear error" name="sale_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>					         <div class="formRow hide"></div>
                    </div>

                    <div class="tab_content pd0" id="tab2">

                        <div class="formRow">
                            <label for="param_site_title" class="formLeft">Title:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_site_title" name="site_title"><?php echo set_value('site_title') ?></textarea></span>
                                <span class="autocheck" name="site_title_autocheck"></span>
                                <div class="clear error" name="site_title_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_desc" class="formLeft">Meta description:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_desc" name="meta_desc"><?php echo set_value('meta_desc') ?></textarea></span>
                                <span class="autocheck" name="meta_desc_autocheck"></span>
                                <div class="clear error" name="meta_desc_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_meta_key" class="formLeft">Meta keywords:</label>
                            <div class="formRight">
                                <span class="oneTwo"><textarea cols="" rows="4" _autocheck="true" id="param_meta_key" name="meta_key"><?php echo set_value('meta_key') ?></textarea></span>
                                <span class="autocheck" name="meta_key_autocheck"></span>
                                <div class="clear error" name="meta_key_error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>

                    <div class="tab_content pd0" id="tab3">
                        <div class="formRow">
                            <label class="formLeft">Nội dung:</label>
                            <div class="formRight">
                                <textarea class="" id="param_content" name="content"><?php echo set_value('content') ?></textarea>
                                <div class="clear error" name="content_error"></div>
                                <script type="text/javascript"> ckeditor ('content')</script>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>
                    <div class="tab_content pd0" id="tab4">
                        <div class="formRow">
                            <label class="formLeft">Thông số kỹ thuật</label>
                            <div class="formRight">
                                <textarea class="editors" id="param_content" name="specifications"><?php echo set_value('Specifications') ?></textarea>
                                <div class="clear error" name="content_error"></div>
                                <script type="text/javascript"> ckeditor ('specifications')</script>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>


                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" class="redB" value="Thêm mới">
                    <input type="reset" class="basic" value="Hủy bỏ">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>