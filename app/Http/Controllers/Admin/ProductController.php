<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = Product::paginate(10);
        return view('admin.products.list-product')
        ->with([
            'listProduct'=> $listProduct
        ]);
    }

    public function addProduct(){
        return view('admin.products.add-product');
    }
    public function addPostProduct(Request $req){
        $linkImage = null;
        if($req->hasFile('imageSP')){
            $image = $req->file('imageSP');
            $newName = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('imageSP/'), $newName);

            $linkImage = 'imageSP/' .$newName;
        }
        $data = [
            'name'=> $req->nameProduct,
            'price'=> $req->priceProduct,
            'view'=> $req->viewProduct,
            'description'=> $req->descriptionProduct,
            'image' => $linkImage
        ];
        Product::create($data);
        return redirect()->route('admin.products.listProduct')->with(['message' => 'Them moi thanh cong']);
    }

    // public function deleteProduct($idPd){
    //     $product = Product::find($idPd);
    //     if($product->image != null){
    //         File::delete(public_path($product->image)); //Xoa anh

    //         $product->delete();
            
    //     }
    //     return redirect()->route('admin.products.listProduct')->with(['message'=> 'Xoa thanh cong']);
    // }
    public function deleteProduct($idPd)
{
    $product = Product::find($idPd);
    if ($product) {
        // Kiểm tra xem sản phẩm có hình ảnh không
        if ($product->image) {
            // Xóa hình ảnh
            File::delete(public_path($product->image));
        }

        // Xóa sản phẩm
        $product->delete();

        return redirect()->route('admin.products.listProduct')->with(['message' => 'Xóa thành công']);
    } else {
        // Xử lý nếu không tìm thấy sản phẩm
        return redirect()->route('admin.products.listProduct')->with(['message' => 'Không tìm thấy sản phẩm']);
    }
}

    public function updateProduct($idPd){
        $product = Product::find($idPd);
        return view('admin.products.update-product')->with('product', $product);
    }
    public function updatePostProduct($idPd, Request $req){
        $linkImage = null;
        if($req->hasFile('imageSP')){
            $image = $req->file('imageSP');
            $newName = time().'.'. $image->getClientOriginalExtension();
            $image->move(public_path('imageSP/'), $newName);

            $linkImage = 'imageSP/' .$newName;
        }
        $data = [
            'name'=> $req->nameProduct,
            'price'=> $req->priceProduct,
            'view'=> $req->viewProduct,
            'description'=> $req->descriptionProduct,
            'image' => $linkImage,
            'updated_at' => Carbon::now()
        ];
        Product::where('product_id', $idPd)->update($data);
        return redirect()->route('admin.products.listProduct')->with(['message' => 'Sửa thành công']);
    }
}
