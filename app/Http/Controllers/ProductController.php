<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function listProduct(){
        $listProduct = DB::table('product')->
        join('category', 'product.category_id', '=', 'category.id')
        ->select('product.id', 'product.name', 'product.category_id', 'category.name_dm', 'product.view', 'product.price')->
        orderBy('product.view', 'desc')->
        get();
        
        return view('product/listProduct')->with(['listProduct'=>$listProduct]);
    }

    public function addProduct(){
        $category = DB::table('category')->select('id', 'name_dm')->get();

        return view('product/addProduct')->with(['category'=>$category]);
    }

    public function addPostProduct(Request $req){
        $data = [
            'name' => $req->name,
            'category_id' =>$req->category,
            'price' =>$req->price,
            'view' => $req->view,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.listProduct');
    }

    public function deleteProduct($proId){
        DB::table('product')->where('id', $proId)->delete();
        return redirect()->route('product.listProduct');
    }

    public function updateProduct($proId){
        $category = DB::table('category')->select('id', 'name_dm')->get();
        $product = DB::table('product')->where('id', $proId)->first();
        return view('product/updateProduct')->with([
            'category'=> $category,
            'product' => $product
        ]);
    }

    public function updatePostProduct(Request $req){
        $data = [
            'name' => $req->name,
            'category_id' =>$req->category,
            'price' =>$req->price,
            'view' => $req->view,
            'updated_at' => Carbon::now(),
        ];
        DB::table('product')->where('id', $req->id)->update($data);
        return redirect()->route('product.listProduct');
    }

    public function search(Request $request){
        $query = $request->input('query');
        $listProduct = DB::table('product')
            ->join('category', 'product.category_id', '=', 'category.id')
            ->select('product.id', 'product.name', 'product.category_id', 'category.name_dm', 'product.view', 'product.price')
            ->where('product.name', 'LIKE', "%{$query}%")
            ->orderBy('product.view', 'desc')
            ->get();

        return view('product.search')->with(['listProduct' => $listProduct, 'query' => $query]);
    }
    
}
