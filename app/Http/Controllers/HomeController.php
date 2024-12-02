<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Types\Relations\Car;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function home(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }

        return view('home.index', compact('product','count'));
    }

    public function login_home(){
        $product = Product::all();

        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        return view('home.index', compact('product', 'count'));
    }

    public function add_cart($id){
        $product_id = $id;
        $user = Auth::user();

        $user_id = $user->id;
        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();

        return redirect()->back();
    }
    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
            $cart = Cart::where('user_id', $userid)->get();
        }
        else{
            $count = '';
        }
        return view('home.mycart',compact('count','cart'));
    }
    public function delete_cart($id){
        $cartid = $id;
        $user = Auth::user();
        $userid = $user->id;

        $cart_item = Cart::where('user_id', $userid)->where('id', $cartid)->first();

        if ($cart_item) {
            $cart_item->delete();
        }

        return redirect()->back();
    }

    public function comfirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userid = Auth::user()->id;
        $cart = Cart::where('user_id', $userid)->get();

        foreach($cart as $carts){
            $order = new Order();
            $order->name=$name;
            $order->phone=$phone;
            $order->address=$address;
            $order->user_id=$userid;
            $order->product_id=$carts->product_id;

            $order->save();
        }

        $remove_cart = Cart::where('user_id', $userid)->get();
        foreach($remove_cart as $rm){
            $rm->delete();
        }
        return redirect()->back();

    }
    public function myorders(){
        $orders = Order::all();
        // cnt
        if(Auth::id()){
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        }
        else{
            $count = '';
        }
        //
        return view('home.myorders', compact('orders', 'count'));
    }
    //Search GPT
//     public function search_product(Request $request)
// {
//     $query = Product::query();

//     // Tìm kiếm theo từ khóa
//     if ($request->has('search') && !empty($request->search)) {
//         $query->where('title', 'LIKE', '%' . $request->search . '%');
//     }

//     // Lọc theo danh mục
//     if ($request->has('category') && is_array($request->category)) {
//         $query->whereIn('category', $request->category);
//     }

//     // Lọc theo màu sắc
//     if ($request->has('color') && is_array($request->color)) {
//         $query->whereIn('color', $request->color);
//     }

//     // Lọc theo giá
//     if ($request->has('price') && $request->price != 'all') {
//         switch ($request->price) {
//             case 'under_20000':
//                 $query->where('price', '<', 20000);
//                 break;
//             case 'between_20000_30000':
//                 $query->whereBetween('price', [20000, 30000]);
//                 break;
//             case 'above_30000':
//                 $query->where('price', '>', 30000);
//                 break;
//         }
//     }
//    // Lấy danh sách sản phẩm sau khi lọc
//     $product = $query->get();

//     // Đếm sản phẩm trong giỏ hàng
//     if (Auth::id()) {
//         $user = Auth::user();
//         $userid = $user->id;
//         $count = Cart::where('user_id', $userid)->count();
//     } else {
//         $count = '';
//     }

//     return view('home.index', compact('product', 'count'));
// }


public function search_product(Request $request) {
    $search = $request->search;
    $category = $request->category;
    $color = $request->color;
    $price = $request->price;

    $query = Product::query();

    if ($search) {
        $query->where('title', 'LIKE', '%' . $search . '%');
    }

    if ($category) {
        $query->whereIn('category', $category);
    }

    if ($color) {
        $query->whereIn('color', $color);
    }

    if ($price && $price!='all') {
        switch ($price) {
            case 'under_20000':
                $query->where('price', '<', 20000);
                break;
            case 'between_20000_30000':
                $query->whereBetween('price', [20000, 30000]);
                break;
            case 'above_30000':
                $query->where ('price', '>', 30000);
                break;
        }
    }

    $product = $query->get();

    if (Auth::id()) {
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id', $userid)->count();
    } else {
        $count = '';
    }

    return view('home.index', compact('product', 'count'));
}

}
