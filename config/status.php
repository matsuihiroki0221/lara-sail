<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'order_product' => [
        1 => 1, //作成前
        2 => 2, //料理中
        3 => 3, //提供済・完了
        4 => 4,  //キャンセル
    ],
    
    'order_detail' => [
        1 => 1, //会計前
        2 => 2, //会計済
        3 => 3, //キャンセル
    ]

];
