<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::orderBy('id', 'desc')->get();
        return view('backend.pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        return view('backend.pages.products.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'cate_id' => 'required',
            'name' => 'required',
            'selling_price' => 'required',
            'image' => 'required',
        ];
        $request->validate($rules);

        $products = new Products();

        $products->cate_id = $request->cate_id;
        $products->name = $request->name;
        if(empty($request->slug)){
            $products->slug = str::slug($request->name);
        }else{
            $products->slug = str::slug($request->slug);
        }
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->discount = $request->discount;
        $products->quantity = $request->quantity;
        //upload image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/upload/products', $filename);
            $products->image = $filename;
        }
        $products->video = $request->video;
        $products->delivery_in = $request->delivery_in;
        $products->delivery_out = $request->delivery_out;

        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->status = $request->input('status')== TRUE ? '1':'0';
        $products->trending = $request->input('trending')== TRUE ? '1':'0';
        $products->meta_title = $request->meta_title;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->save();

        $notification = array(
            'msg' =>'Product Added',
            'alert-type' =>'success',
        );
        return redirect()->route('admin.all.product')->with($notification);
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::orderBy('id', 'desc')->get();
        $products = Products::where('id',$id)->first();
        return view('backend.pages.products.edit', compact('categories','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Products::where('id',$id)->first();
        $rules = [
            'cate_id' => 'required',
            'name' => 'required',
            'selling_price' => 'required',
            'image'=>'nullable'
        ];
        $request->validate($rules);

        $products->cate_id = $request->cate_id;
        $products->name = $request->name;
        if(empty($request->slug)){
            $products->slug = str::slug($request->name);
        }else{
            $products->slug = str::slug($request->slug);
        }
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;



        if(empty($request->discount)){
            if(!empty($products->original_price)){
                //discount calculation
                $disSub = $products->original_price - $products->selling_price ;
                $disMalti = $disSub * 100 ;
                $disDiv = $disMalti / $products->original_price;
                $request->discount = $disDiv;

                $products->discount = $request->discount;
            }else{
                $products->discount = 0;
                $products->discount = $request->discount;
            }
        }else{
            $products->discount = $request->discount;
        }

        $products->quantity = $request->quantity;
        //upload image
        if ($request->hasFile('image')) {
            //delete previous image
            $path = 'asset/upload/products/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('asset/upload/products', $filename);
            $products->image = $filename;
        }
        $products->video = $request->video;
        $products->delivery_in = $request->delivery_in;
        $products->delivery_out = $request->delivery_out;
        $products->status = $request->input('status')== TRUE ? '1':'0';
        $products->trending = $request->input('trending')== TRUE ? '1':'0';
        $products->meta_title = $request->meta_title;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->update();

        $notification = array(
            'msg' =>'Product updated',
            'alert-type' =>'success',
        );
        return redirect()->route('admin.all.product')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        //delete the image
        if($products->image){
            $path = 'asset/upload/products/'.$products->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $products->delete();

            $notification = array(
                'msg' =>'Product Deleted',
                'alert-type' =>'success',
            );
            return redirect()->back()->with($notification);
        }
    }
}
