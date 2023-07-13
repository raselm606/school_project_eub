@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Products</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="{{route('admin.product.store')}}" class="btn btn-primary"  ><i class="fas fa-plus-circle"></i> Add Product</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-center table-striped table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Trending</th>
                                    <th>Updated</th>
                                    <th width="6%">Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Trending</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td><img width="100" src="{{url('asset/upload/products/'.$product->image)}}" alt=""></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->selling_price}}  টাকা </td>
                                    <td>{{$product->quantity}} টা </td>
                                    <td>
                                        @if($product->status)
                                            <div class="badge badge-danger"> <i class="fa fa-times"></i> Off</div>
                                        @else
                                            <div class="badge badge-success"> <i class="fa fa-check"></i> Live</div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->trending)
                                            <div class="badge badge-success"><i class="fa fa-check"></i> Trending</div>
                                            @else
                                            <div class="badge badge-danger"> <i class="fa fa-times"></i> not trending</div>
                                            @endif
                                    </td>
                                    <td>{{$product->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('admin.product.edit', [$product->id])}}"  class="btn btn-sm btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deleteproduct{{$product->id}}" data-toggle="modal"  class="btn btn-sm btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>



                                <!-- delete author Modal-->
                                <div class="modal fade" id="deleteproduct{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Product?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.product.destroy', [$product->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$product->name}}</label> will be deleted !!</h5>
                                                    <button type="submit" class="btn btn-danger" >Delete Brand</button>
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









@endsection

