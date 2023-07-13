<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::orderBy('id','desc')->get();
        return view('backend.pages.slider.index',compact('sliders'));
    }
    public function store(Request $request){
        $rules=[
            'image' => 'required',
        ];
        $request->validate($rules);

        $slider = new Slider();
        $slider->link = $request->link;
        $slider->status = $request->input('status') == TRUE ? '1':'0';
        //upload image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/upload/slider',$filename);
            $slider->image = $filename;
        }
        $slider->save();

        $notification = array(
            'msg' =>'Slider Added',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);

    }
    public function update(Request $request, $id){
        $slider = Slider::find($id);

        $rules=[
        ];
        $request->validate($rules);


        $slider->link = $request->link;

        $slider->status = $request->input('status') == TRUE ? '1':'0';
        //upload image
        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('asset/upload/slider',$filename);
            $slider->image = $filename;
        }
        $slider->update();

        $notification = array(
            'msg' =>'Slider Updated',
            'alert-type' =>'success',
        );
        return redirect()->back()->with($notification);

    }
    public function destroy($id){
        $slider = Slider::find($id);

        //delete the image
        if($slider->image){
            $path = 'asset/upload/category/'.$slider->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $slider->delete();

            $notification = array(
                'msg' =>'Slider deleted',
                'alert-type' =>'success',
            );
            return redirect()->back()->with($notification);
        }

    }
}
