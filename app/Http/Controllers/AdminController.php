<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        
        $category->category_name = $request->category;

        $category->save();

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);

        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);

        $data->category_name = $request->category;

        $data->save();

        return redirect('/view_category');
    }

    public function add_product()
    {
        $categories = Category::all();

        return view('admin.add_product', compact('categories'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;

        $data->description = $request->description;

        $data->price = $request->price;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('images', $imagename); //Di chuyển ảnh gốc đến thư mục images

            $data->image = $imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function view_product()
    {
        $data = Product::all();

        return view('admin.view_product', compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('images/'.$data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $data->delete();

        return redirect()->back();
    }

    public function update_product( $id)
    {
        $data = Product::find($id);

        $category = Category::all();

        return view('admin.update_product', compact('data','category'));
    }

    public function edit_product(Request $request, $id)
    {
        $data = Product::find($id);

        $data->title = $request->title;

        $data->description = $request->description;

        $data->quantity = $request->quantity;

        $data->category = $request->category;

        $data->price = $request->price;

        $image = $request->image;
        if ($image) {

            $imagename = time().'.'.$image->getClientOriginalExtension();

            $request->image->move('products', $imagename);

            $data->image = $imagename;
        }
        $data->save();

        return redirect('./view_product');
    }

    public function view_orders()
    {
        $data = Order::all();

        return view('admin.view_orders',compact('data'));
    }

    public function on_the_way($id)
    {
        $data = Order::find($id);

        $data->status = 'On the way';

        $data->save();

        return redirect('/view_orders');
    }

    public function delivered($id)
    {
        $data = Order::find($id);

        $data->status = 'Delivered';

        $data->save();

        return redirect('/view_orders');
    }

}
