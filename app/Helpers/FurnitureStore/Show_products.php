<?php
namespace App\Helpers\FurnitureStore;

use Illuminate\Support\Facades\DB;

class Show_products{

    public static function show_product_index($data){
        foreach ($data as $val){
            $id = $val['id'];
            $cat_id = $val['cat_id'];
            $name = $val['name'];
            $image = $val['image'];
            $price = number_format($val['selling_price'], 0, ',', '.');
            echo
            "
                <div class='col-lg-3 col-md-4 col-sm-6 grid-item $cat_id'>
                    <div class='grid-product'>
                        <div class='image bg-lightblue'>
                            <a href='chi-tiet-san-pham/$id'>
                                <img src='images/mark/mark_product.png' style='background-image: url(upload/sanpham/tieude/$image);background-size: cover' alt='Chair'>
                            </a>
                            <div class='addcart'>
                                <a href='shopping/add/$id'>Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                        <a href='chi-tiet-san-pham/$id' class='name'>$name</a>
                        <div class='price'>$price VNĐ</div>
                    </div>
                </div>
            ";
        }
    }
}
