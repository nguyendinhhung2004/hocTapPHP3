<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //function showUser(){
        // $users = [
        //     [
        //         'id' => '1',
        //         'name' => 'hung'
        //     ],
        //     [
        //         'id' => '2',
        //         'name' => 'chung'
        //     ],
        //     ];
        // return view('list-user')->with(['users' => $users]);

        // $result = DB::table('users')
        // ->select('id', 'name', 'email')
        // ->get();

        // $result = DB::table('users')->where('id', '=', '4')->first();

        // $result = DB::table('users')->where('id', '=', 16)->value('name');

        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like' , 'Ban giám hiệu')
        //     ->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->pluck('id');

        // $result = DB::table('users')->where('tuoi' ,DB::table('users')->max('tuoi'))->get();

        // $result = DB::table('users')->where('tuoi' ,DB::table('users')->min('tuoi'))->get();

        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like' , 'Ban giám hiệu')
        //     ->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->count();

        // $result = DB::table('users')->distinct()->pluck('tuoi');

        // $result = DB::table('users')->where('name', 'like' , '%Khải')->orWhere('name', 'like' , '%Thanh')->get();

        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like' , 'Ban đào tạo')
        //     ->value('id');
        // $result = DB::table('users')->where('phongban_id', $idPhongBan)->get();

        // $result = DB::table('users')->where('tuoi', '>=', 30)->orderBy('tuoi', 'asc')->get();

        // $result = DB::table('users')->orderBy('tuoi', 'desc')->offset(5)->limit(10)->get();

        // $data = [
        //     'name' => 'Nguyễn Văn B',
        //     'email' => 'abc@gmail.com',
        //     'phongban_id' => '1',
        //     'songaynghi' => '0',
        //     'tuoi' => '20',
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ];
        // // DB::table('users')->insert($data);
        // $userId = DB::table('users')->insertGetId($data);
        // $result = DB::table('users')->find($userId);
        // dd($result);

        // $idPhongBan = DB::table('phongban')->where('ten_donvi', 'like' , 'Ban đào tạo')
        //     ->value('id');
        // $listUser = DB::table('users')->where('phongban_id', $idPhongBan)->get();
        // foreach($listUser as $value){
        //     DB::table('users')->where('id', '=', $value->id)
        //     ->update([
        //         'name' => $value->name . ' PĐT'
        //     ]);
        // }

        // DB::table('users')->where('songaynghi', '>', 15)->delete();
    //}
    // function getUser($id, $name =""){
    //     echo $id;
    //     echo $name;
    // }
    // function updateUser(Request $request){
    //     echo $request->id;
    // }
    // function showSv(){
    //     $sv = [
    //             'hoten' => 'Nguyễn Đình Hưng',
    //             'namsinh' => 2004,
    //             'quequan' => 'Hà Nội',
    //     ];
    //     return view('view-Sv')->with(['sv'=>$sv]);
    // }
    
    public function listUsers(){
        $listUsers = DB::table('users')->
        join('phongban', 'users.phongban_id', '=', 'phongban.id')
        ->select('users.id', 'users.name', 'users.email', 'users.phongban_id', 'phongban.ten_donvi')->
        get();
        
        return view('users/listUsers')->with(['listUsers'=>$listUsers]);
    }

    public function addUsers(){
        $phongban = DB::table('phongban')->select('id', 'ten_donvi')->get();

        return view('users/addUsers')->with(['phongban'=>$phongban]);
    }

    public function addPostUsers(Request $req){
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' =>$req->phongban,
            'tuoi' =>$req->tuoiUser,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->insert($data);
        return redirect()->route('users.listUsers');
    }

    public function deleteUsers($userId){
        DB::table('users')->where('id', $userId)->delete();
        return redirect()->route('users.listUsers');
    }

    public function updateUsers($userId){
        $phongban = DB::table('phongban')->select('id', 'ten_donvi')->get();
        $user = DB::table('users')->where('id', $userId)->first();
        return view('users/updateUsers')->with([
            'user'=> $user,
            'phongban' => $phongban
    
        ]);
    }

    public function updatePostUsers(Request $req){
        $data = [
            'name' => $req->nameUser,
            'email' => $req->emailUser,
            'phongban_id' =>$req->phongban,
            'tuoi' =>$req->tuoiUser,
            'songaynghi' =>$req->songaynghi,
            'updated_at' => Carbon::now(),
        ];
        DB::table('users')->where('id', $req->id)->update($data);
        return redirect()->route('users.listUsers');
    }
}
