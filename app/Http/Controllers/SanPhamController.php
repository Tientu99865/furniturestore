<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Manufacture;
use DemeterChain\C;
use Faker\Provider\File;
use Illuminate\Http\Request;
use App\Products;
use App\Categories;
class SanPhamController extends Controller
{
    //
    public function getThem(){
        $categories = Categories::all();
        $manufacture = Manufacture::all();
        return view('admin/sanpham/them',['categories'=>$categories,'manufacture'=>$manufacture]);
    }

    public function postThem(Request $request){
        $this->validate($request,
            [
                'cat_id'=>'required',
                'name'=>'required|min:2|max:100|unique:products,name',
                'pro_price'=>'required',
                'selling_price'=>'required',
                'pro_content'=>'required',
                'image'=>'required',
                'images'=>'required',
                'amount'=>'required|integer',
                'manu_id'=>'required'
            ],
            [
                'cat_id.required'=>'Bạn chưa chọn danh mục cho sản phẩm',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'name.unique'=>'Tên sản phẩm này đã tồn tại',
                'pro_price.required'=>'Bạn chưa nhập giá sản phẩm',
                'selling_price.required'=>'Bạn chưa nhập giá bán sản phẩm',
                'pro_content.required'=>'Bạn chưa nhập mô tả cho sản phẩm',
                'image.required'=>'Bạn chưa chọn ảnh tiêu đề sản phẩm',
                'images.required'=>'Bạn chưa chọn ảnh chi tiết cho sản phẩm',
                'amount.required'=>'Bạn chưa nhập số hàng nhập',
                'amount.integer'=>'Số hàng nhập phải số nguyên dương',
                'manu_id.required'=>'Bạn chưa chọn nơi sản xuất cho sản phẩm',
            ]);
        $product = new Products();
        $product->name = $request->name;
        $product->cat_id = $request->cat_id;

        //Anh tieu de
        if ($request->has('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                return redirect('admin/sanpham/them')->with('Loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName(); // ham lay ten hinh ra
            $Hinh = time()."_".$name;
            while (file_exists('upload/sanpham/tieude/'.$Hinh)){
                $Hinh = time()."_".$name;
            }
            $file->move('upload/sanpham/tieude',$Hinh);
            $product->image = $Hinh;
        }

        //Gia san pham
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
        $product->amount = $request->amount;
        $product->manu_id = $request->manu_id;
        $product->content = $request->pro_content;
        $product->save();

        //Anh chi tiet
        $product_id = $product->id;
        $pro_imgs = new Gallery();
        if ($request->has('images')){
            $imgs_array = array();
            foreach ($request->images as $item){
                if (isset($item)){
                    $duoi = $item->getClientOriginalExtension();
                    if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                        return redirect('admin/sanpham/them')->with('Loi','Bạn chỉ được chọn file ảnh có đuôi jpg,png,jpeg,gif');
                    }
                    $imgs_array[] = $item->getClientOriginalName();
                    $item->move('upload/sanpham/chitiet/',$item->getClientOriginalName());
                }
            }
            $pro_imgs->product_imgs = implode(',',$imgs_array);
            $pro_imgs->id_product = $product_id;
            $pro_imgs->save();
        }

        return redirect('admin/sanpham/them')->with('ThongBao','Bạn đã thêm thành công');
    }

    public function getDanhsach(){
        $product = Products::paginate(10);
        return view('admin/sanpham/danhsach',['product'=>$product]);
    }

    public function getXoa($id){
        $product = Products::find($id);
        $gallery = Gallery::where('id_product',$id)->delete();
        $product->delete();

        return redirect('admin/sanpham/danhsach')->with('ThongBao','Bạn đã xóa thành công');
    }

    public function getSua($id){
        $categories = Categories::all();
        $manufacture = Manufacture::all();
        $gallery = Gallery::where('id_product',$id)->get();
        $product = Products::find($id);

        return view('admin/sanpham/sua',['categories'=>$categories,'product'=>$product,'manufacture'=>$manufacture,'gallery'=>$gallery]);
    }

    public function postSua(Request $request,$id){
        $this->validate($request,
            [
                'cat_id'=>'required',
                'name'=>'required|min:2|max:100',
                'pro_price'=>'required',
                'selling_price'=>'required',
                'pro_content'=>'required',
                'amount'=>'required|integer',
                'manu_id'=>'required'
            ],
            [
                'cat_id.required'=>'Bạn chưa chọn danh mục cho sản phẩm',
                'name.required'=>'Bạn chưa nhập tên sản phẩm',
                'name.min'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'name.max'=>'Tên sản phẩm phải có độ dài từ 2 đến 100 ký tự',
                'pro_price.required'=>'Bạn chưa nhập giá sản phẩm',
                'selling_price.required'=>'Bạn chưa nhập giá bán sản phẩm',
                'pro_content.required'=>'Bạn chưa nhập mô tả cho sản phẩm',
                'amount.required'=>'Bạn chưa nhập số hàng nhập',
                'amount.integer'=>'Số hàng nhập phải số nguyên dương',
                'manu_id.required'=>'Bạn chưa chọn nơi sản xuất cho sản phẩm',
            ]);
        $product = Products::find($id);
        $product->name = $request->name;
        $product->cat_id = $request->cat_id;
        if ($request->has('image')){
            $file = $request->file('image');
            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif'){
                return redirect('admin/sanpham/sua')->with('Loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg,gif');
            }
            $name = $file->getClientOriginalName(); // ham lay ten hinh ra
            $Hinh = time()."_".$name;
            while (file_exists('upload/sanpham/tieude/'.$Hinh)){
                $Hinh = time()."_".$name;
            }
            $file->move('upload/sanpham/tieude',$Hinh);
            unlink('upload/sanpham/tieude/'.$product->image);//ham xoa file
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
        $product->amount = $request->amount;
        $product->manu_id = $request->manu_id;
        $product->content = $request->pro_content;
        $product->save();

        //Anh chi tiet
        $pro_imgs = Gallery::where('id_product',$id)->get();
        if ($request->has('images')) {
            $imgs_array = array();
            //vong foreach xoa anh
            foreach (explode(',',$pro_imgs[0]->product_imgs) as $img){
                if (file_exists('upload/sanpham/chitiet/'.$img)){
                    unlink('upload/sanpham/chitiet/'.$img);//ham xoa file
                }
            }
            //vong foreach thay the anh
            foreach ($request->images as $item) {
                if (isset($item)) {
                    $duoi = $item->getClientOriginalExtension();
                    if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'gif') {
                        return redirect('admin/sanpham/them')->with('Loi', 'Bạn chỉ được chọn file ảnh có đuôi jpg,png,jpeg,gif');
                    }
                    $imgs_array[] = $item->getClientOriginalName();
                    $item->move('upload/sanpham/chitiet/', $item->getClientOriginalName());
                }
            }
            $pro_imgs[0]->product_imgs = implode(',', $imgs_array);
            $pro_imgs[0]->update([
                'id_product'=>$id,
                'product_imgs'=>$pro_imgs[0]->product_imgs
            ]);
        }
        return redirect('admin/sanpham/chitiet/'.$id)->with('ThongBao','Bạn đã sửa thành công');
    }

    public function getChiTiet($id){
        $categories = Categories::all();
        $manufacture = Manufacture::all();
        $gallery = Gallery::where('id_product',$id)->get();
        $product = Products::find($id);

        return view('admin/sanpham/chitiet',['categories'=>$categories,'product'=>$product,'manufacture'=>$manufacture,'gallery'=>$gallery]);
    }
}
