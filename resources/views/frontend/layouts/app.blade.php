<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Amader Bazar</title>
    @include('frontend.layouts.partials.style')
</head>
<body>
<div class="toparea_ fixed-top" >

    <nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary ">
        <div class="container-fluid">
            <a class="navbar-brand logoarae" href="{{url('/')}}"><span class="text-warning">AmarderBazar24.com</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse mobile_none navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex ml-auto mr-auto col-lg-5 mb-2 mt-2" >
                    <input class="form-control   " style="border-radius: 30px;" type="search" placeholder="Search your product" aria-label="Search">

                </form>
                <div class=" mb-2">
                    <span class="text-white"><i class="fa fa-phone-alt"></i> Call: +8801681789989 </span>
                    <a href="" class="btn btn-warning">Checkout cart</a>
                </div>

            </div>
        </div>

    </nav>

    <div class="navbarr bg-warning ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="navarea ">
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
                            </li>
                            @foreach($category as $cat)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('frontend.category',[$cat->slug])}}">{{$cat->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@yield('content')

<footer class="bg-dark text-white pt-3 pb-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center ">
                <p>&copy; {{date('Y')}} <a href="{{url('/')}}" class="text-warning">AmaderBazar24.com</a> All right reserve <br>
                    developed by <a target="_blank" href="https://icodev.space" class="text-warning">icodev.space</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- js -->
@include('frontend.layouts.partials.script')
</body>
</html>
