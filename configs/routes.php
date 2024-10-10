<?php
$routes['default_controller'] = 'home';

// Đường dẫn ảo => đường dẫn thật
$routes['san-pham'] = 'product/list_product';
$routes['trang-chu'] = 'home';
$routes['tin-tuc/.+-(\d+).html'] = 'news/category/$1';
$routes['chi-tiet-san-pham/.+-(\d+).html'] = 'product/detail/$1';
