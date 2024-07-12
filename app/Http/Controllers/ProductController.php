<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProduct()
    {
        // $products = [
        //     [
        //         "id"=> "1",
        //         "name"=> "Iphone 14"
        //     ],
        //     [
        //         "id"=> "2",
        //         "name"=> "Iphone 15"
        //     ]
        //     ];
        // return view('list-product')
        //     ->with(
        //         [
        //             'products'=> $products
        //         ]
        //     );


        // 1.Lay danh sach toan bo users ( select * from users)
        // $result = DB::table("users")->get();
        // dd($result);


        //2 Lay thong tin users co id = 4 ( select * from users where id = 4)
        //Cach 1
        // $result = DB::table("users")
        // ->where('id', '=', '4')
        // ->first();

        // //Cach 2
        // $result = DB::table("users")
        // ->find('4');
        // dd($result);



        //3 Lay thuoc tinh name co id = 16
        // $result = DB::table("users")
        //  ->where('id', '=', '4')
        //  ->value('name');
        // dd($result);


        //4 Lấy danh sách idUser của phòng ban 'Ban giám hiệu'
        // $idPhongBan = DB::table("phongban")
        //  ->where('ten_donvi', '=', 'Ban giám hiệu')
        //  ->value('id');
        //  $result = DB::table("users")
        //  ->where("phongban_id", "=", $idPhongBan)
        //  ->pluck("id");
        // dd($result);


        // 5. Tìm user có độ tuổi lớn nhất trong công ty 
        // $result = DB::table("users")
        // ->where('tuoi', DB::table("users")->max('tuoi'))
        // ->get();
        // dd($result);

        // 6. Tìm user có độ tuổi nhỏ nhất trong công ty
        // $result = DB::table("users")
        // ->where('tuoi', DB::table("users")->min('tuoi'))
        // ->get();
        // dd($result);

        // 7. Đếm xem phòng ban 'Ban giám hiệu' có bao nhiêu user 
        // $idPhongBan = DB::table("phongban")
        //  ->where('ten_donvi', '=', 'Ban giám hiệu')
        //  ->value('id');
        //  $result = DB::table("users")
        //  ->where("phongban_id", "=", $idPhongBan)
        //  ->count("id");
        // dd($result);

        // 8. Lấy danh sách tuổi các user 
        // $result = DB::table("users")
        // ->distinct()
        // ->pluck("tuoi"); //Lay theo mang tuoi

        // dd($result);

        // 9. Tìm danh sách user có tên 'Khải' hoặc có tên 'Thanh'
        // $result = DB::table("users")
        // ->where('name', 'like', '%Khải')
        // ->orwhere('name', 'like', '%Thanh')
        // ->get();

        // dd($result);

        // 10. Lấy danh sách user ở phòng ban 'Ban đào tạo'
        // $idPhongBan = DB::table("phongban")
        //     ->where('ten_donvi', '=', 'Ban đào tạo ')
        //     ->value('id');
        // $result = DB::table("users")
        //     ->where("phongban_id", "=", $idPhongBan)
        //     ->select('id', 'name', 'email')
        //     ->get(); //Lay toan bo
        // dd($result);


        // 11. Lấy danh sách user có tuổi lớn hơn hoặc bằng 30, danh sách sắp xếp tăng dần
        // $result = DB::table("users")
        // ->where("tuoi", ">=", "30")
        // ->orderBy("tuoi","asc") //asc tang dan , desc giam dan
        // ->get();
        // dd($result);


        // 12. Lấy danh sách 10 user sắp xếp giảm dần độ tuổi, bỏ qua 5 user đầu tiên
        // $result = DB::table("users")
        // ->orderBy("tuoi","desc")
        // ->limit(10) 
        // ->offset(5) // Bo qua 5 ngay
        // ->get();
        // dd($result);

    //     13.Thêm một user mới vào công ty
        // $data = [
        //     'name' => 'Hunghocdot',
        //     'email' => 'hunghocdot@gmail.com',
        //     'phongban_id'=> '1',
        //     'songaynghi'=> '0',
        //     'tuoi'=> '10',
        //     'created_at'=> Carbon::now(),
        //     'updated_at'=> Carbon::now(),
        // ];
        // // DB::table('users')->insert($data);
        // $userID =  DB::table('users')->insertGetId($data);

        // 15 Xóa user nghỉ quá 15 ngày
        // $result = DB::table("users")
        // ->where("songaynghi", ">", "15")
        // ->delete();
        // dd($result);

        // 14. Thêm chữ 'PĐT' sau tên tất cả user ở phòng ban 'Ban đào tạo' 
        $idPhongBan = DB::table("phongban")
         ->where('ten_donvi', '=', 'Ban đào tạo')
         ->value('id');
         $listUser = DB::table("users")
         ->where("phongban_id", "=", $idPhongBan)
         ->get();
        foreach($listUser as $value){
            DB::table('users')->where('id', '=', $value->id)
            ->update([
                'name' => $value->name . 'PĐT'
            ]);
        }
    }
    public function getProduct($id)
    {
        echo $id;
    }

    public function updateProduct(Request $request)
    {
        echo $request->id;
        echo '</br>';
        echo $request->name;
        echo 'Học thì ngu chứng khoán thì giỏi';
    }
}
