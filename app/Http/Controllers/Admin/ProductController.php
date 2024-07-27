<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function deleteProduct($idPd){
        $product = Product::find($idPd);
        if($product->image != null){
            File::delete(public_path($product->image)); //Xoa anh

            $product->delete();
            
        }
        return redirect()->route('admin.products.listProduct')->with(['message'=> 'Xoa thanh cong']);
    }
    public function updateProduct($idPd){
        $product = Product::find($idPd);
        return view('admin.products.update-product')->with('product', $product);
    }
    public function updatePostProduct($idPd, Request $req){
    }
}
