<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;
class Menus extends Model
{
    //
    protected $table = "Menus";

    public function categories(){
        return $this->belongsTo('App\Categories','cat_id','id');
    }

    public function menus(){
        return $this->belongsTo(self::class,'id','parent_id');
    }

    public function childrenMenus(){
        return $this->hasMany(self::class,'id','parent_id');
    }

    function menu_parent($data,$parent = 0,$str = "|---",$select=0){
        foreach ($data as $val){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($select != 0 && $id == $select){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                $this->menu_parent($data,$id,$str."|---");
            }
        }
    }

    function cat_parent($data,$parent = 0,$str = "|---",$select=0){
        foreach ($data as $val){
            $id = $val["id"];
            $name = $val["name"];
            if ($val["parent_id"] == $parent){
                if ($select != 0 && $id == $select){
                    echo "<option value='$id' selected='selected'>$str $name</option>";
                }else{
                    echo "<option value='$id'>$str $name</option>";
                }
                $this->cat_parent($data,$id,$str."|---");
            }
        }
    }

}
