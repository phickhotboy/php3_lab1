<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SPController extends Controller
{
    
    public function listProducts(){
        $listProducts = DB::table('products')
            ->join('category', 'products.category_id', '=', 'category.id')
            ->select('products.id', 'products.name', 'products.price', 'products.view', 'category.name as category_name')
            ->get();

        return view('products.listProducts')->with([
            'listProducts' => $listProducts
        ]);
    }

    public function addProducts(){
        $category = DB::table('category')
        ->select('id', 'name')
        ->get();
        return view('products/addProducts')->with([
            'category' => $category
        ]);
    }

    public function addPostProducts(Request $req){
        $data = [
            'name' => $req->name, // $req->name <=> $_POST['name]
            'category_id' => $req->category_id,
            'price' => $req->price,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()
        ];
        DB::table('products')->insert($data);

        return redirect()->route('products.listProducts');
    }


    public function deleteProducts($productId){
        DB::table('products')->where('id', $productId)->delete();
        return redirect()->route('products.listProducts');
    }

    public function updateProducts($productId){
        $category = DB::table('category')
        ->select('id', 'name')
        ->get();
        $product = DB::table('products')->where('id', $productId)->first();

        return view('products/updateProducts')->with([
            'category' => $category,
            'product' => $product
        ]);
    }

    public function updatePostProducts(Request $req){
        $data = [
            'name' => $req->name, // $req->name <=> $_POST['name]
            'category_id' => $req->category_id,
            'price' => $req->price,
            'view' => $req->view,
            'create_at' => Carbon::now(),
            'update_at' => Carbon::now()

        ];
        DB::table('products')->where('id', $req-> productId)->update( $data);
        return redirect()->route('products.listProducts');
    }
}
