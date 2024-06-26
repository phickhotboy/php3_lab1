<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    public function thongtinsv(){
        $sinhviens = [
            [
                "ten"=> "Nguyen Ngoc Quang",
                "tuoi"=> "20",
                "mssv"=> "PH40029",
                'email'=> "quangnph40029@fpt.edu.vn"
            ]
        ];
        return view('list-sv')
            ->with(
                [
                    'sinhvienfpt'=> $sinhviens
                ]
            );
    }
}
