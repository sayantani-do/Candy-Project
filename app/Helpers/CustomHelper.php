<?php

function generateSKU(){
    $randnum    = rand(1111,9999);
    $curdate    = date('Ymd');
    $sku = 'SKU-'.$randnum.'-'.$curdate;
    return $sku;
}