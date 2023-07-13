@extends('backend.layouts.app')
@section('main-content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">All Message</h1>



        <div class="row">
            <div class="col-lg-12 text-right mb-2">
                <a href="#addmessage" class="btn btn-primary" data-toggle="modal" ><i class="fas fa-plus-circle"></i> Add message</a>
            </div>

            <div class="col-lg-12">
                @include('backend.layouts.partials.display')
                @include('backend.layouts.partials.displayerror')
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">All Message</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Status</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Updated</th>
                                    <th>Manage</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($message as $msg)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($msg->status==0)
                                            <a href="{{route('admin.all.msg.status',[$msg->id])}}" class="badge badge-danger"><i class="fa fa-envelope"></i> unread</a>
                                            @else
                                            <a href="{{route('admin.all.msg.status',[$msg->id])}}" class="badge badge-secondary"><i class="fa fa-check"></i> Read</a>
                                            @endif
                                    </td>
                                    <td>{{$msg->name}}</td>
                                    <td>{{$msg->email}}</td>
                                    <td>{{$msg->phone}}</td>
                                    <td>{!! $msg->message !!}</td>
                                    <td>{{$msg->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="#deletemsg{{$msg->id}}" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash"> </i> </a>
                                    </td>
                                </tr>


                                <!-- delete author Modal-->
                                <div class="modal fade" id="deletemsg{{$msg->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog " role="document">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete Message?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <form action="{{route('admin.all.msg.destroy', [$msg->id])}}" method="post" >
                                                @csrf
                                                    <!-- Save changes button-->
                                                    <h5><label class="text-primary">{{$msg->name}}</label> will be deleted !!</h5>
                                                    <button type="submit" class="btn btn-danger" >Yes Delete Message</button>
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

    <!-- add Messagge Modal-->
    <div class="modal fade" id="addmessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Message</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.all.msg.store')}}" method="post" >
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name"   value="{{old('name')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="email">Email</label>
                                <input class="form-control" id="email" type="email" name="email"   value="{{old('email')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="phone">Phone</label>
                                <input class="form-control" id="phone" type="text" name="phone"   value="{{old('phone')}}">
                            </div>
                            <div class="col-md-12">
                                <label class="small mb-1" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" class="form-control">{{old('message')}}</textarea>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button type="submit" class="btn btn-primary" >Add Message</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- add author Modal-->







@endsection

