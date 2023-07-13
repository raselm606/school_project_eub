@extends('backend.layouts.app')
@section('main-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Products</h1>



        <div class="row">

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
            </div>

        </div>

        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Form Row-->
                <!-- Form Group (first name)-->
                    <div class="card mb-4">
                        <div class="card-header">Add Product Details</div>
                        <div class="card-body">
                            <div class="row gx-3 mb-3">
                                <div class="col-md-2 mb-3">
                                    <label class="small mb-1" for="cate_id">Product Category <span class="text-danger">*</span></label>
                                    <select name="cate_id" id="cate_id" class="form-control">
                                        <option value="" >Select a Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('cate_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-5 mb-3">
                                    <label class="small mb-1" for="name">Product Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5 mb-3">
                                    <label class="small mb-1" for="slug">Product Slug <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>



                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="original_price">Big Price </label>
                                    <input type="text" class="form-control" id="original_price" name="original_price" value="{{old('original_price')}}">
                                    @error('original_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="selling_price">Selling Price <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="selling_price" name="selling_price" value="{{old('selling_price')}}">
                                    @error('selling_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="discount">Discount Percentage </label>
                                    <input type="text" class="form-control" id="discount" name="discount" value="{{old('discount')}}">
                                    @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="quantity">Quantity </label>
                                    <input type="text" class="form-control" id="quantity" name="quantity" value="{{old('quantity')}}">
                                    @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="image">Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="image">Video </label>
                                    <input type="text" class="form-control" id="video" name="video" value="{{old('video')}}">
                                    @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="delivery_in">Delivery Price inside Dhaka </label>
                                    <input type="text" class="form-control" id="delivery_in" name="delivery_in" value="{{old('delivery_in')}}">
                                    @error('delivery_in')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="small mb-1" for="delivery_out">Delivery Price outside Dhaka </label>
                                    <input type="text" class="form-control" id="delivery_out" name="delivery_out" value="{{old('delivery_out')}}">
                                    @error('delivery_out')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="small mb-1" for="small_description">Product small description</label>
                                    <textarea  id="small_description" class="form-control editorck" cols="30" rows="3" name="small_description">{{old('small_description')}}</textarea>
                                    @error('small_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="small mb-1" for="description">Product  Description</label>
                                    <textarea  id="description" class="form-control editorck2" cols="30" rows="3" name="description">{{old('description')}}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="meta_title">Meta Title </label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{old('meta_title')}}">
                                    @error('meta_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="meta_keywords">Meta Keywords </label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{old('meta_keywords')}}">
                                    @error('meta_keywords')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="small mb-1" for="meta_description">Meta Description </label>
                                    <textarea  id="meta_description" class="form-control editorck3" cols="30" rows="3" name="meta_description">{{old('meta_description')}}</textarea>
                                    @error('meta_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mt-3">
                                    <div class="form-check">
                                        <input class="form-check-input" name="status" id="status" type="checkbox" >
                                        <label class="form-check-label text-dark" for="status">Hide Product</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" name="trending" id="trending" type="checkbox" >
                                        <label class="form-check-label text-dark" for="trending">Trending Product</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <!-- Save changes button-->
                                    <button type="submit" class="btn btn-lg btn-block btn-primary mt-3" >Add Product</button>
                                </div>
                        </div>
                    </div>
             </div>


            </div>
        </form>

    </div>
    <!-- /.container-fluid -->
</div>

@endsection

