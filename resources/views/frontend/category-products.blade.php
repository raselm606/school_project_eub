@extends('frontend.layouts.app')
@section('content')
<div class="product_area mt-150 mb-3 hvh" >

    <div class="container-fluid">
        <div class="row">
            <p class="section_ttileee">{{$category_s->name}}</p>
            @foreach($products as $prod)
            <div class="col-lg-2 col-6 mb-3">
                <div class="product_items">
                    <div class="discount-area " style="z-index: 9999">
                        <span class="badge badge-danger bg-danger position-absolute mt-3">Discount {{ substr($prod->discount, 0, 2)  }}%</span>
                    </div>
                    <div class="image_areaa animate__animated  animate__fadeIn">
                        <a href="{{url('categories/'.$category_s->slug.'/'.$prod->slug)}}"><img src="{{url('asset/upload/products/'.$prod->image)}}" alt=""></a>
                    </div>
                    <div class="text_area_product text-center mt-3">
                        <p class=" mb-1 ">৳ {{$prod->selling_price}}</p>
                        <p><a href="{{url('categories/'.$category_s->slug.'/'.$prod->slug)}}">{{substr($prod->name, 0, 150)}} </a></p>
                    </div>
                    <a href="#" class="ordebtn">অর্ডার করুন</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
