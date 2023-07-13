@extends('frontend.layouts.app')
@section('content')
<div class="product_area mt-150 mb-3 hvh" >

    <div class="container-fluid">
        <div class="row">
            <p class="section_ttileee">All Trending Deals</p>
            @foreach($trending as $prod)
            <div class="col-lg-2 col-6 mb-3">
                <div class="product_items">
                    <div class="image_areaa">
                        <a href="#"><img src="{{url('asset/upload/products/'.$prod->image)}}" alt=""></a>
                    </div>
                    <div class="text_area_product text-center mt-3">
                        <p class=" mb-1 ">৳ {{$prod->selling_price}}</p>
                        <p><a href="#">{{substr($prod->name, 0, 150)}} </a></p>
                    </div>
                    <a href="#" class="ordebtn">অর্ডার করুন</a>
                </div>
            </div>
            @endforeach
            <div class="col-lg-12 text-center">
                {{ $trending->links('pagination::bootstrap-4') }}
            </div>

        </div>
    </div>
</div>
@endsection
