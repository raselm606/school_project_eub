@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Sub Categories</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="#addsubcat" class="btn btn-primary" data-toggle="modal" ><i class="fas fa-plus-circle"></i> Add Sub Catagory</a>
            </div>

            <div class="col-lg-12">
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
                                    <th>Category</th>
                                    <th>Name English</th>
                                    <th>Name Bangla</th>
                                    <th>URL</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Name English</th>
                                    <th>Name Bangla</th>
                                    <th>URL</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subcategory->categorytest->category_en}}</td>
                                    <td>{{$subcategory->subcategory_en}}</td>
                                    <td>{{$subcategory->subcategory_bn}}</td>
                                    <td><a href="{{route('category.show',[$subcategory->categorytest->category_slug],[$subcategory->subcategory_slug])}}" target="_blank">{{route('category.show',[$subcategory->categorytest->category_slug])}}/{{$subcategory->subcategory_slug}}</a></td>


                                    <td>{{$subcategory->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#editcat{{$subcategory->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deletecat{{$subcategory->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>

                                <!-- edit author Modal-->
                                <div class="modal fade" id="editcat{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Sub Categories</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.test.subcategory.update', [$subcategory->id])}}" method="post" >
                                                @csrf
                                                <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="category_id">Category</label>
                                                            <select name="category_id" id="category_id" class="form-control">
                                                                <option value="" disabled>Select a category</option>
                                                                    @foreach($categoriess as $category)
                                                                        <option value="{{$category->id}}" {{$category->id == $subcategory->category_id ? 'selected' : ''}}>{{$category->category_en}}</option>
                                                                    @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="subcategory_en">Categories name English</label>
                                                            <input class="form-control" id="subcategory_en" type="text" name="subcategory_en"   value="{{$subcategory->subcategory_en}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="subcategory_bn">Categories name Bangla</label>
                                                            <input class="form-control" id="subcategory_bn" type="text" name="subcategory_bn"   value="{{$subcategory->subcategory_bn}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="subcategory_slug">Categories Link</label>
                                                            <input class="form-control" id="subcategory_slug" type="text" name="subcategory_slug"   value="{{$subcategory->subcategory_slug}}">
                                                        </div>
                                                    </div>
                                                    <!-- Save changes button-->
                                                    <button type="submit" class="btn btn-primary" >Update Sub Categories</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- add author Modal-->

                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletecat{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Sub Categories?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.test.subcategory.destroy', [$subcategory->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$subcategory->name}}</label> will be deleted !!</h5>
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

    <!-- add addsubcat Modal-->
    <div class="modal fade" id="addsubcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Sub Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.test.subcategory.store')}}" method="post" >
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="category_id">Category Name</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="" >Select a category</option>
                                    @foreach($categoriess as $category)
                                        <option value="{{$category->id}}">{{$category->category_en}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="subcategory_en">Sub Category Name English</label>
                                <input class="form-control" id="subcategory_en" type="text" name="subcategory_en"   value="{{old('subcategory_en')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="subcategory_bn">Sub Category Name Bangla</label>
                                <input class="form-control" id="subcategory_bn" type="text" name="subcategory_bn"   value="{{old('subcategory_bn')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="subcategory_slug">Sub Category URL Text</label>
                                <input class="form-control" id="subcategory_slug" type="text" name="subcategory_slug"   value="{{old('subcategory_slug')}}">
                            </div>

                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Categories</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add addsubcat Modal-->







@endsection

