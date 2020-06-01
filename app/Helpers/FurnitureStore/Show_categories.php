<?php
namespace App\Helpers\FurnitureStore;

use Illuminate\Support\Facades\DB;

class Show_categories{

    public static function show_categories_index($data){
        foreach ($data as $val){
            $id = $val['id'];
            $name = $val['name'];
            echo "<li><span data-filter='.$id'>$name</span></li>";
        }
    }
}
