<?php

namespace App\Helpers\FurnitureStore;

use Illuminate\Support\Facades\DB;

class Product_images
{

    public static function main_pic($data)
    {
        foreach ($data as $val) {
            $imgs = $val['product_imgs'];
            $array_imgs = explode(',', $imgs);
            $count = count($array_imgs);
            for ($i = 0; $i < $count; $i++) {
                echo "<img src='images/mark/mark_main_pic.png' alt='' style='background-image: url(upload/sanpham/chitiet/$array_imgs[$i]);background-size: cover;width: 100%'>";
            }
        }
    }

    public static function sub_pic($data)
    {
        foreach ($data as $val) {
            $imgs = $val['product_imgs'];
            $array_imgs = explode(',', $imgs);
            $count = count($array_imgs);
            for ($i = 0; $i < $count; $i++) {
                echo "
                <div class='list_images--image'>
                    <img src='images/mark/mark_sub_pic.png'
                         style='background-image: url(upload/sanpham/chitiet/$array_imgs[$i]);background-size: cover;'
                         alt=''>
                </div>
                ";
            }
        }
    }
}
