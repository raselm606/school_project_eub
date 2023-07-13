@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Categories</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="#addcat" class="btn btn-primary" data-toggle="modal" ><i class="fas fa-plus-circle"></i> Add Categories</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Popular</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Trending</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td><img src="{{url('asset/upload/category/'.$category->image)}}" width="100" alt=""></td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        @if($category->status)
                                            <div class="badge badge-danger"><i class="fa fa-times"></i> Off</div>
                                        @else
                                            <div class="badge badge-success"> <i class="fa fa-check"></i> Live</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($category->popular)
                                            <div class="badge badge-success"> <i class="fa fa-check"></i> Trending</div>
                                        @else
                                            <div class="badge badge-danger"><i class="fa fa-times"></i> not trending</div>
                                        @endif
                                    </td>
                                    <td>{{$category->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#editcat{{$category->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deletecat{{$category->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>

                                <!-- edit author Modal-->
                                <div class="modal fade" id="editcat{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Categories</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.category.update', [$category->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                     @method('PUT');
                                                <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="name">Categories name</label>
                                                            <input class="form-control" id="name" type="text" name="name"   value="{{$category->name}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="slug">Categories Slug</label>
                                                            <input class="form-control" id="slug" type="text" name="slug"   value="{{$category->slug}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="description">Categories Description</label>
                                                            <textarea  id="description" class="form-control" cols="30" rows="3" name="description">{{$category->description}}</textarea>
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="status" id="status" type="checkbox" {{$category->status == "1" ? 'checked': ''}}>
                                                                <label class="form-check-label text-dark" for="status">Categories Off</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="popular" id="popular" type="checkbox" {{$category->popular == "1" ? 'checked': ''}}>
                                                                <label class="form-check-label text-dark" for="popular">Categories Trending</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt-3">
                                                            <label class="small mb-1" for="meta_title">Categories meta_title</label>
                                                            <input class="form-control" id="meta_title" type="text" name="meta_title"   value="{{$category->meta_title}}">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="meta_descrip">Categories meta_descrip</label>
                                                            <textarea  id="meta_descrip" class="form-control" cols="30" rows="2" name="meta_descrip">{{$category->meta_descrip}}</textarea>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="meta_keywords">Categories meta_keywords</label>
                                                            <input class="form-control" id="meta_keywords" type="text" name="meta_keywords"   value="{{$category->meta_keywords}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="image">Image</label>
                                                            <input class="form-control" id="image" type="file" name="image"   value="{{$category->image}}">
                                                            @if($category->image)
                                                                <img width="100" src="{{url('asset/upload/category/'.$category->image)}}" alt="">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!-- Save changes button-->
                                                    <button type="submit" class="btn btn-primary" >Save Categories</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- add author Modal-->

                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletecat{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">আপনি কি ক্যাটাগরি ডিলিট করতে চান? </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.category.destroy', [$category->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$category->name}}</label> will be deleted !!</h5>
                                                    <button type="submit" class="btn btn-danger" >Yes Delete Categories</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- delete author Modal-->
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- add Publishyer Modal-->
    <div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="name">Categories name</label>
                                <input class="form-control" id="name" type="text" name="name"   value="{{old('name')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="slug">Categories Slug</label>
                                <input class="form-control" id="slug" type="text" name="slug"   value="{{old('slug')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="description">Categories Description</label>
                                <textarea  id="description" class="form-control" cols="30" rows="3" name="description">{{old('description')}}</textarea>
                            </div>

                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" id="status" type="checkbox" >
                                    <label class="form-check-label text-dark" for="status">Categories Off</label>
                                </div>
                            </div>

                            <div class="col-md-6 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="popular" id="popular" type="checkbox" >
                                    <label class="form-check-label text-dark" for="popular">Categories Trending</label>
                                </div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <label class="small mb-1" for="meta_title">Categories meta_title</label>
                                <input class="form-control" id="meta_title" type="text" name="meta_title"   value="{{old('meta_title')}}">
                            </div>

                            <div class="col-md-12">
                                <label class="small mb-1" for="meta_descrip">Categories meta_descrip</label>
                                <textarea  id="meta_descrip" class="form-control" cols="30" rows="2" name="meta_descrip">{{old('meta_descrip')}}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="meta_keywords">Categories meta_keywords</label>
                                <input class="form-control" id="meta_keywords" type="text" name="meta_keywords"   value="{{old('meta_keywords')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="image">Image</label>
                                <input class="form-control" id="image" type="file" name="image"   value="{{old('image')}}">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Categories</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add author Modal-->







@endsection

