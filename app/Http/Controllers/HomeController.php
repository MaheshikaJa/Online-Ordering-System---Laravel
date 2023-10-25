<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\Order;
use App\Http\Controllers\comment;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Contracts\View\View;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
 





class HomeController extends Controller
{
  public function index()
  {  
    $Catagory1=Catagory::all();
    $product=product::all();
    return view('home.userpage',compact('product'),compact('Catagory1'));
  }



    public function redirect()
    {
      $userType=Auth::user()->userType;
       
       if($userType=='1')
       {   
           $total_product=product::all()->count();
           $total_ordert=Order::all()->count();
           $total_user=User::all()->count();
           $Order=Order::all();
           $total_revenue=0;

           foreach($Order as $Order){

                   $total_revenue=$total_revenue +$Order->price;
           }
           $total_delivered=Order::where('Dilivery_stutes','=','Delivered')->get()->count();
           
           $total_processing=Order::where('Dilivery_stutes','=','prosseing')->get()->count();
           return view('admin.home',compact('total_product','total_ordert','total_user','total_revenue','total_delivered','total_processing'));
       }
       else
       {   
          
           $product=product::all();
           return view('home.userpage',compact('product'));
       }
    } 

    public function add_Cart(Request $request ,$id){

       if(Auth::id()){
       $user=Auth::user();
       $userid=$user->id;

       $product=product::find($id);

       $product_exist_id=cart::where('product_id','=',$id)->where('use_id','=',$userid)->get('id')->first();

       if($product_exist_id!= null){

           $cart=cart::find($product_exist_id)->first();
           $Quantity=$cart->Quantity;

           $cart->Quantity=$Quantity;
           $cart->Quantity=$Quantity+ $request->quntity;

        
           $cart->price=$product->Price * $cart->Quantity;

           $cart->save();

           Alert::success('product Added Successfuly','We have addeed product to the cart ');
           return redirect()->back();

       }else
       {

        $cart=new cart;

        $cart->Name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->use_id=$user->id;
        $cart->Product_name=$product->Name;
        $cart->price=$product->Price;
        $cart->image=$product->image;
        $cart->product_id=$product->id;
        $cart->Quantity=$request->quntity;
        $cart->price=$product->Price*$request->quntity;
         
      $cart->save();
      Alert::success('product Added Successfuly','We have addeed product to the cart ');
      return redirect()->back();

       }     
       
      }

      else{

        return redirect('login');
      } 

    }

    public function show_cart(){

      if(Auth::id()){
       $id=Auth::user()->id;

       $cart=cart::where('use_id','=',$id)->get();
       
       return view('home.showCart',compact('cart'));
      }
      else{

        return redirect('login');
      }
  }

  public function remove_cart($id)
{
    $cart=cart::find($id);

    $cart->delete();
   return redirect()->back();

  
}

public function orderSave(){

  $user=Auth::user();
  $userid=$user->id;

  $data=cart::where('use_id','=',$userid)->get();

  foreach($data as $data){
    $Order=new Order;

      $Order->Name=$data->Name;
      $Order->email=$data->email;
      $Order->phone=$data->phone;
      $Order->address=$data->address;
      $Order->user_id=$data->id;
     
       $Order->Product_name=$data->Product_name;
       $Order->price=$data->price;
       $Order->image=$data->image;
       $Order->Quantity=$data->Quantity;
       $Order->product_id=$data->id;

       $Order->Dilivery_stutes="prosseing";

       $Order->save();
       
       $cart_id=$data->id;
       $cart=cart::find($cart_id);
       $cart->delete();


  }
  return view('home.pyment');

}

public function Product_search(Request $request){



$serach_text=$request->search;

$product=product::where('Name','LIKE',"%$serach_text%")->orwhere('Catagory','LIKE',"%$serach_text%")->get();

return view('home.allproduct',compact('product'));


}     
  

   

public function viewAllProduct(){

   $product=product::all();
   return View('home.allproduct',compact('product'));
 }


 public function show_orde(){

  if(Auth::id()){
    $user=Auth::user();

    $userid=$user->id;
    $cart=cart::where('use_id','=',$userid)->get();

    dd($cart);
    
    return view('home.order');
   }
   else{
     
     return redirect('login');
   }
   
 

 }
}
