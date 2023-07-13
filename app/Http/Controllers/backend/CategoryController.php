<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function Index(){
        $categories = Categories::orderBy('id','desc')->get();
        return view('backend.pages.categories.index',compact('categories'));
    }
    //store
    public function store(Request $request){
        $rules=[
            'name' => 'required',
            'slug' => 'nullable|unique:categories',
            'description' => 'nullable',
            'image' => 'nullable',
        ];
        $request->validate($rules);
        $categories = new Categories();
        $categories->name = $request->name;
        $categories->slug = $request->slug;
        if(empty($request->slug)){
            $categories->slug = str::slug($request->name);
        }else{
            $categories->slug = str::slug($request->slug);
        }
        $categories->description = $request->description;
        $categories->status = $request->input('status') == TRUE ? '1':'0';
        $categories->popular = $request->input('popular') == TRUE ? '1' : '0';
        $categories->meta_title = $request->meta_title;
        $categories->meta_descrip = $request->meta_descrip;
        $categories->meta_keywords = $request->meta_keywords;

        //upload image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/upload/category',$filename);
            $categories->image = $filename;
        }
        $categories->save();

        $notification = array(
            'msg' =>'Category Added',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }

    //update category
    public function update(Request $request, $id){
        $categories = Categories::find($id);
        $rules=[
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ];
        $request->validate($rules);


        $categories->name = $request->name;
        $categories->slug = $request->slug;
        if(empty($request->slug)){
            $categories->slug = str::slug($request->name);
        }else{
            $categories->slug = str::slug($request->slug);
        }
        $categories->description = $request->description;
        $categories->status = $request->input('status') == TRUE ? '1':'0';
        $categories->popular = $request->input('popular') == TRUE ? '1' : '0';
        $categories->meta_title = $request->meta_title;
        $categories->meta_descrip = $request->meta_descrip;
        $categories->meta_keywords = $request->meta_keywords;

        //update image with delete previous image.
        if($request->hasFile('image')){
            //delete previous image
            $path = 'asset/upload/category/'.$categories->image;
            if(File::exists($path)){
                File::delete($path);
            }
            //upload new image
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/upload/category',$filename);
            $categories->image = $filename;
        }
        $categories->Update();

        $notification = array(
            'msg' =>'Category Updated',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);
    }
    public function destroy($id){
        $categories = Categories::find($id);
        //delete the image
        if($categories->image){
            $path = 'asset/upload/category/'.$categories->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $categories->delete();

            $notification = array(
                'msg' =>'Category Deleted',
                'alert-type' =>'success',
            );
            return redirect()->back()->with($notification);
        }
    }
}
