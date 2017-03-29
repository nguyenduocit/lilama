<?php
    // tạo ra các link trong  thư mục admin
    function admin_url($url='')
    {
        return base_url("admin/".$url);
    }
?>