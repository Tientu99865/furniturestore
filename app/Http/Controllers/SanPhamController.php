<?php

namespace App\Http\Controllers;

use DemeterChain\C;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
class SanPhamController extends Controller
{
    //
    public function getThem(){
        $categories = Categories::all();
        return view('admin/sanpham/them',['categories'=>$categories]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'cat_id'=>'required',
                'name'=>'required|min:2|max:100|unique:products,name',
                'pro_price'=>'required',
                'selling_price'=>'required',
                'introduce'=>'required',
                'image'=>'required'
            ],
            [
                'cat_id.required'=>'Bạn chưa chọn danh mục cho sản phẩm',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'name.unique'=>'Tên sản phẩm này đã tồn tại',
                'pro_price.required'=>'Bạn chưa nhập giá sản phẩm',
                'selling_price.required'=>'Bạn chưa nhập giá bán sản phẩm',
                'introduce.required'=>'Bạn chưa nhập mô tả cho sản phẩm',
                'image.required'=>'Bạn chưa chọn ảnh tiêu đề sản phẩm'
            ]);
        $product = new Products();
        $product->name = $request->name;
        $product->cat_id = $request->cat_id;
        if ($request->has('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                return redirect('admin/sanpham/them')->with('Loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName(); // ham lay ten hinh ra
            $Hinh = time()."_".$name;
            while (file_exists('upload/sanpham/'.$Hinh)){
                $Hinh = time()."_".$name;
            }
            $file->move('upload/sanpham',$Hinh);
            $product->image = $Hinh;
        }
        if ($request->has('pro_price') && $request->has('selling_price'))
        {
            $pro_price = $request->pro_price;
            $selling_price = $request->selling_price;
            if ($pro_price < 0 || $selling_price < 0){
                return redirect('admin/sanpham/them')->with('Loi','Giá sản phẩm và giá bán không thế nhỏ hơn 0');
            }
            if ($pro_price < $selling_price){
                return redirect('admin/sanpham/them')->with('Loi','Giá bán sản phẩm không thế lớn hơn giá sản phẩm');
            }else{
                $product->selling_price = $selling_price;
                $product->pro_price = $pro_price;
            }
        }
        $product->introduce = $request->introduce;
        $product->save();

        return redirect('admin/sanpham/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $product = Products::all();
        return view('admin/sanpham/danhsach',['product'=>$product]);
    }

    public function getXoa($id){
        $product = Products::find($id);
        $product->delete();

        return redirect('admin/sanpham/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $categories = Categories::all();
        $product = Products::find($id);

        return view('admin/sanpham/sua',['categories'=>$categories,'product'=>$product]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'cat_id'=>'required',
                'name'=>'required|min:2|max:100',
                'pro_price'=>'required',
                'selling_price'=>'required',
                'introduce'=>'required',
            ],
            [
                'cat_id.required'=>'Bạn chưa chọn danh mục cho sản phẩm',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'pro_price.required'=>'Bạn chưa nhập giá sản phẩm',
                'selling_price.required'=>'Bạn chưa nhập giá bán sản phẩm',
                'introduce.required'=>'Bạn chưa nhập mô tả cho sản phẩm',
            ]);
        $product = Products::find($id);
        $product->name = $request->name;
        $product->cat_id = $request->cat_id;
        if ($request->has('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                return redirect('admin/sanpham/them')->with('Loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName(); // ham lay ten hinh ra
            $Hinh = time()."_".$name;
            while (file_exists('upload/sanpham/'.$Hinh)){
                $Hinh = time()."_".$name;
            }
            $file->move('upload/sanpham',$Hinh);
            unlink('upload/sanpham/'.$product->image);
            $product->image = $Hinh;
        }
        if ($request->has('pro_price') && $request->has('selling_price'))
        {
            $pro_price = $request->pro_price;
            $selling_price = $request->selling_price;
            if ($pro_price < 0 || $selling_price < 0){
                return redirect('admin/sanpham/sua/'.$id)->with('Loi','Giá sản phẩm và giá bán không thế nhỏ hơn 0');
            }
            if ($pro_price < $selling_price){
                return redirect('admin/sanpham/sua/'/$id)->with('Loi','Giá bán sản phẩm không thế lớn hơn giá sản phẩm');
            }else{
                $product->selling_price = $selling_price;
                $product->pro_price = $pro_price;
            }
        }
        $product->introduce = $request->introduce;
        $product->save();

        return redirect('admin/sanpham/sua/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }
}
