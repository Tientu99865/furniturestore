<?php
namespace App\Helpers\FurnitureStore;

use Illuminate\Support\Facades\DB;

class Show_products{

    public static function show_product_index($data){
        foreach ($data as $val){
            $id = $val['cat_id'];
            $name = $val['name'];
            $image = $val['image'];
            $price = number_format($val['selling_price'], 0, ',', '.');
            echo
            "
                <div class='col-lg-3 col-md-4 col-sm-6 grid-item $id'>
                    <div class='grid-product'>
                        <div class='image bg-lightblue'>
                            <a href='#'>
                                <img src='upload/sanpham/tieude/$image' alt='Chair'>
                            </a>
                            <div class='addcart'>
                                <a href='#'>Add to cart</a>
                            </div>
                        </div>
                        <a href='#' class='name'>$name</a>
                        <div class='price'>$price VNĐ</div>
                    </div>
                </div>
            ";
        }
    }
}
