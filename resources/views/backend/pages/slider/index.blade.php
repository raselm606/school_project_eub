@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Manage Slider</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="#addcat" class="btn btn-primary" data-toggle="modal" ><i class="fas fa-plus-circle"></i> Add Slider</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Slider</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>image</th>
                                    <th>link</th>
                                    <th>Status</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>image</th>
                                    <th>link</th>
                                    <th>Status</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{url('asset/upload/slider/'.$slider->image)}}" width="200" alt=""></td>
                                    <td>{{$slider->link}}</td>
                                    <td>
                                        @if($slider->status)
                                            <div class="badge badge-danger"><i class="fa fa-times"></i> Off</div>
                                        @else
                                            <div class="badge badge-success"> <i class="fa fa-check"></i> Live</div>
                                        @endif

                                    </td>
                                    <td>{{$slider->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#editcat{{$slider->id}}" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"> </i> </a>
                                        <a href="#deletecat{{$slider->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>

                                <!-- edit author Modal-->
                                <div class="modal fade" id="editcat{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('admin.slider.update', [$slider->id])}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                     @method('PUT')
                                                <!-- Form Row-->
                                                    <div class="row gx-3 mb-3">
                                                        <!-- Form Group (first name)-->
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="image">Image</label>
                                                            <input class="form-control" id="image" type="file" name="image"   value="{{$slider->image}}">
                                                            @if($slider->image)
                                                                <img width="100" src="{{url('asset/upload/slider/'.$slider->image)}}" alt="">
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label class="small mb-1" for="link">Slider Link</label>
                                                            <input class="form-control" id="link" type="text" name="link"   value="{{$slider->link}}">
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <div class="form-check">
                                                                <input class="form-check-input" name="status" id="status" type="checkbox" {{$slider->status == "1" ? 'checked': ''}}>
                                                                <label class="form-check-label text-dark" for="status">Slider Off</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Save changes button-->
                                                    <button type="submit" class="btn btn-primary" >Save Slider</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- add author Modal-->

                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletecat{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">আপনি কি Slider ডিলিট করতে চান? </h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.slider.destroy', [$slider->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5>slider will be deleted !!</h5>
                                                    <button type="submit" class="btn btn-danger" >Yes Delete slider</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Slider</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="image">Image</label>
                                <input class="form-control" id="image" type="file" name="image"   value="{{old('image')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="link">Slider link</label>
                                <input class="form-control" id="link" type="text" name="link"   value="{{old('link')}}">
                            </div>
                            <div class="col-md-12 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" name="status" id="status" type="checkbox" >
                                    <label class="form-check-label text-dark" for="status">Slider Off</label>
                                </div>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Slider</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add author Modal-->







@endsection

