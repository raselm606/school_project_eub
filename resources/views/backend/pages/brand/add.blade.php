@extends('backend.layouts.app')
@section('main-content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Add Brand</h1>



        <div class="row">

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
            </div>

        </div>

        <form action="{{route('admin.add.brand')}}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Form Row-->
            <div class="row gx-3 mb-3">
                <!-- Form Group (first name)-->
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <label class="small mb-1" for="brand_name_en">Brand Name English</label>
                                <input type="text" class="form-control" id="brand_name_en" name="brand_name_en" value="{{old('brand_name_en')}}">
                                @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="brand_name_bn">Brand Name Bangla</label>
                                <input type="text" class="form-control" id="brand_name_bn" name="brand_name_bn" value="{{old('brand_name_bn')}}">
                                @error('brand_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="slug_en">Brand slug En</label>
                                <input type="text" class="form-control" id="slug_en" name="slug_en" value="{{old('slug_en')}}">
                                @error('brand_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="brand_image">Brand Image</label>
                                <input type="file" class="form-control" id="brand_image" name="brand_image" value="{{old('brand_image')}}">
                                @error('brand_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="brand_url">Brand URL</label>
                                <input type="text" class="form-control" id="brand_url" name="brand_url" value="{{old('brand_url')}}">
                                @error('brand_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                                <div class="col-md-12">
                                    <!-- Save changes button-->
                                    <button type="submit" class="btn btn-primary mt-3" >Add Brand</button>
                                </div>
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

