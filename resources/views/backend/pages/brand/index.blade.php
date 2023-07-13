@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Brand</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="{{route('admin.add.brand')}}" class="btn btn-primary"  ><i class="fas fa-plus-circle"></i> Add Brand</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Brand</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Brand Name EN</th>
                                    <th>Brand Name BN</th>
                                    <th>Slug</th>
                                    <th>Images</th>
                                    <th>Link</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Brand Name EN</th>
                                    <th>Brand Name BN</th>
                                    <th>Slug</th>
                                    <th>Images</th>
                                    <th>Link</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->brand_name_en}}</td>
                                    <td>{{$brand->brand_name_bn}}</td>
                                    <td>{{$brand->slug_en}}</td>
                                    <td><img width="100" src="{{asset($brand->brand_image)}}" alt=""></td>
                                    <td><a href="{{$brand->brand_url}}">{{$brand->brand_url}}</a></td>
                                    <td>{{$brand->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('brand.edit', [$brand->id])}}"  class="btn btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deletebrand{{$brand->id}}" data-toggle="modal"  class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>



                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletebrand{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Brand?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.delete.brand', [$brand->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$brand->brand_name_en}}</label> will be deleted !!</h5>
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

