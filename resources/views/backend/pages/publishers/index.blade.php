@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Publishers</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="#addpublishers" class="btn btn-primary" data-toggle="modal" ><i class="fas fa-plus-circle"></i> Add Publishers</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All publishers</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Address</th>
                                    <th>Outlet</th>
                                    <th>Description</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Address</th>
                                    <th>Outlet</th>
                                    <th>Description</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($publishers as $publisher)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$publisher->name}}</td>
                                    <td><a href="{{$publisher->link}}">{{$publisher->link}}</a></td>
                                    <td>{{$publisher->address}}</td>
                                    <td>{{$publisher->outlet}}</td>
                                    <td>{{$publisher->description}}</td>
                                    <td>{{$publisher->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#editpublish{{$publisher->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deletepublish{{$publisher->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>

                                <!-- edit author Modal-->
                                <div class="modal fade" id="editpublish{{$publisher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Author</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.publishers.update', [$publisher->id])}}" method="post" >
                                                @csrf
                                                <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="name">Publisher name</label>
                                                            <input class="form-control" id="name" type="text" name="name"   value="{{$publisher->name}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="link">Publisher Link</label>
                                                            <input class="form-control" id="link" type="text" name="link"   value="{{$publisher->link}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="address">Publisher Address</label>
                                                            <input class="form-control" id="address" type="text" name="address"   value="{{$publisher->address}}">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="outlet">Publisher Outlet</label>
                                                            <input class="form-control" id="outlet" type="text" name="outlet"   value="{{$publisher->outlet}}">
                                                        </div>
                                                        <!-- Form Group (last name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="description">Author Details</label>
                                                            <textarea  id="description" class="form-control" cols="30" rows="5" name="description">{{$publisher->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Save changes button-->
                                                    <button type="submit" class="btn btn-primary" >Save Publisher</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- add author Modal-->

                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletepublish{{$publisher->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Publishers?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.publishers.destroy', [$publisher->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$publisher->name}}</label> will be deleted !!</h5>
                                                    <button type="submit" class="btn btn-danger" >Yes Delete Publisher</button>
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
    <div class="modal fade" id="addpublishers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Publisher</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.publishers.store')}}" method="post" >
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="name">Publisher name</label>
                                <input class="form-control" id="name" type="text" name="name"   value="{{old('name')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="link">Publisher Link</label>
                                <input class="form-control" id="link" type="text" name="link"   value="{{old('link')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="address">Publisher Address</label>
                                <input class="form-control" id="address" type="text" name="address"   value="{{old('address')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="outlet">Publisher Outlet</label>
                                <input class="form-control" id="outlet" type="text" name="outlet"   value="{{old('outlet')}}">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="description">Publisher Details</label>
                                <textarea  id="description" class="form-control" cols="30" rows="5" name="description">{{old('description')}}</textarea>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Publisher</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add author Modal-->







@endsection

