<?php

namespace App\Helpers\FurnitureStore;

use Illuminate\Support\Facades\DB;

class Show_products
{

    public static function show_product_index($data)
    {
        foreach ($data as $val) {
            $id = $val['id'];
            $cat_id = $val['cat_id'];
            $name = $val['name'];
            $image = $val['image'];
            $quantity = $val['quantity'];
            $promoted = $val['promoted_price'];
            $selling = $val['selling_price'];
            $price = number_format($val['selling_price'], 0, ',', '.');
            echo
            "
                <div class='col-lg-3 col-md-4 col-sm-6 grid-item $cat_id'>
                    <div class='grid-product'>
                        <div class='image bg-lightblue'>
                            <a href='chi-tiet-san-pham/$id'>
                                <img src='images/mark/mark_product.png' style='background-image: url(upload/sanpham/tieude/$image);background-size: cover' alt='Chair'>
                            </a>
                            ";
            if ($promoted != 0) {
                $percent = round(($promoted / $selling) * 100);
                echo "<div class='discount-product'>
                    <span>-";
                echo $percent;
                echo "%</span>
                </div>";
            }
            echo "<input type='number' name='qty' value='1' hidden>
                            ";
            if ($quantity == 0) {
                echo "
                                    <div class='addcart'>
                                        <p>Hết hàng</p>
                                    </div>";
            } else {
                echo "
                                        <div class='addcart'>
                                            <a href='shopping/them/$id'>Thêm vào giỏ hàng</a>
                                        </div>";
            }

            echo "</div>
                        <a href='chi-tiet-san-pham/$id' class='name'>$name</a>";
                        if ($promoted != 0){
                            $money = number_format($selling-$promoted, 0, ',', '.');
                            echo "
                            <div class='price' style='text-decoration: line-through;'>$price VNĐ</div>
                            <div class='price'>$money VNĐ</div>
                            ";
                        }else{
                            echo "<div class='price'>$price VNĐ</div>";
                        }
                        echo "
                    </div>
                </div>
            ";
        }
    }
}
