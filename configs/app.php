<?php
$config['app'] = [
    'service' => [
        HtmlHelper::class
    ],
    'routeMiddleWare' => [
        'san-pham' => AuthMiddleWare::class
    ],
    'globalMiddleWare' => [
        ParamsMiddleWare::class
    ],
];