<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use DB;
use App\products;

class MainController extends Controller
{
    function login (){
        return view ('pages/login');
    }

    function check(Request $re){
        $re->validate([
         'email'=>'required|email',
         'password'=>'required|min:5|max:12',
        ]);
 
        $userInfo=Customer::where('email',$re->email)->first();
        if(!$userInfo){
           return back()->with('fail','We donnot recognize your email address');
        }else{
            if(Hash::check($re->password,$userInfo->password)){
               $re->session()->put('LoggedUser',$userInfo->id);
               return redirect('/dashboard');
            }else{
             return back()->with('fail','Incorrect password');
 
            }
        }
    }

    function register (){
        return view ('pages/register');
    }

    function save(Request $re){
        $re->validate([
            'name'=>'required',
            'email'=>'required|email|unique:customers',
            'password'=>'required|min:5|max:12',
        ]);
        
        $customer=new Customer;
        $customer->name=$re->name;
        $customer->email=$re->email;
        $customer->password= Hash::make($re->password);
        $save=$customer->save();
        if($save){
            return back()->with('success','New user has been successfully added to Database');
        }else{
         return back()->with('fail','Something went wrong, try again later');
        }
 
    }

    function logout(){
        if(session()->has('LoggedUser')){
         session()->pull('LoggedUser');
         return redirect('/login');
        }
    }

    function dashboard(){
        return view ('pages/dashboard');
    }

    function create_product(){
        return view ('pages/create_product');
    }

    function insert(Request $re){
        $re->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
            'image'=>'required',
        ]);

        $photo_name=$re->file('image')->getClientOriginalName();
        $re->file('image')->storeAs('public/images/', $photo_name);
        $product=new Product;
        $product->title=$re->title;
        $product->description=$re->description;
        $product->price=$re->price;
        $product->photo_name=$photo_name;
        $product->customer_id=session('LoggedUser');
        $save=$product->save();
        if($save){
            return back()->with('success','New product has been successfully added to Database');
        }else{
         return back()->with('fail','Something went wrong, try again later');
        }
    }

    function products(){
        $products=Product::where('customer_id',session('LoggedUser'))->get();
        return view('pages/products')->with('products',$products);
    }

    function read(Request $re, $id){
        $detail=Product::where('id',$id)->first();
        return view('pages/read')->with('detail', $detail);
    }

    function delete(Request $re, $id){
        $delete=Product::where('id',$id)->delete();
        return redirect()->back();
    }

    function update(Request $re, $id){
       $update=Product::where('id',$id)->first();
        return view('pages/update')->with('update',$update);
    }

    function insert_update( Request $re, $id){
        $re->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        
        $update=DB::table('products')->where('id',$id)->update([
            'title'=>$re->title,
            'description'=>$re->description,
            'price'=>$re->price,

        ]);
        if($update){
            return back()->with('success','New product has been successfully updated to Database');
        }else{
         return back()->with('fail','Something went wrong, try again later');
        }
    }
}


