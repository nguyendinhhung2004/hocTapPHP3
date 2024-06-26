<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser(){
        $users = [
            [
                'id' => '1',
                'name' => 'hung'
            ],
            [
                'id' => '2',
                'name' => 'chung'
            ],
            ];
        return view('list-user')->with(['users' => $users]);
    }
    function getUser($id, $name =""){
        echo $id;
        echo $name;
    }
    function updateUser(Request $request){
        echo $request->id;
    }
    function showSv(){
        $sv = [
                'hoten' => 'Nguyễn Đình Hưng',
                'namsinh' => 2004,
                'quequan' => 'Hà Nội',
        ];
        return view('view-Sv')->with(['sv'=>$sv]);
    }
}
