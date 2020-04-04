<?php

namespace App\Http\Controllers;

use App\Discounts;
use Illuminate\Http\Request;

class MaGiamGiaController extends Controller
{
    //
    public function getThem(){
        return view('admin/magiamgia/them');
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:2|unique:discounts',
                'code'=>'required|min:6|unique:discounts',
                'dis_price'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên mã giảm giá',
                'name.min'=>'Tên mã giảm giá phải có độ dài trên 2 ký tự',
                'name.unique'=>'Tên mã giảm giá này đã tồn tại',
                'code.required'=>'Bạn chưa nhập code mã giảm giá',
                'code.min'=>'code mã giảm giá phải có độ dài trên 6 ký tự',
                'code.unique'=>'Tên mã giảm giá này đã tồn tại',
                'dis_price'=>'Bạn chưa nhập số tiền giảm giá cho mã giảm giá này!',
            ]);
        $discounts = new Discounts();
        $discounts->name = $request->name;
        $discounts->code = $request->code;
        if ($request->has('dis_price')){
            if ($request->dis_price < 0){
                return redirect('admin/magiamgia/them')->with('Loi','Số tiền giảm giá không thể nhỏ hơn 0');
            }else{
                $discounts->dis_price = $request->dis_price;
            }
        }
        $discounts->save();

        return redirect('admin/magiamgia/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $discounts = Discounts::paginate(10);
        return view('admin/magiamgia/danhsach',['discounts'=>$discounts]);
    }

    public function getXoa($id){
        $discounts = Discounts::find($id);
        $discounts->delete();

        return redirect('admin/magiamgia/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }
    public function getSua($id){
        $discounts = Discounts::all()->find($id);

        return view('admin/magiamgia/sua',['discounts'=>$discounts]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:2',
                'code'=>'required|min:6',
                'dis_price'=>'required'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên mã giảm giá',
                'name.min'=>'Tên mã giảm giá phải có độ dài trên 2 ký tự',
                'code.required'=>'Bạn chưa nhập code mã giảm giá',
                'code.min'=>'code mã giảm giá phải có độ dài trên 6 ký tự',
                'dis_price'=>'Bạn chưa nhập số tiền giảm giá cho mã giảm giá này!',
            ]);
        $discounts = Discounts::all()->find($id);
        $discounts->name = $request->name;
        $discounts->code = $request->code;
        if ($request->has('dis_price')){
            if ($request->dis_price < 0){
                return redirect('admin/magiamgia/them')->with('Loi','Số tiền giảm giá không thể nhỏ hơn 0');
            }else{
                $discounts->dis_price = $request->dis_price;
            }
        }
        $discounts->save();

        return redirect('admin/magiamgia/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }
}
