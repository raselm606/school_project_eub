@extends('frontend.layouts.app')
@section('content')
    @include('frontend.layouts.partials.slider')
<div class="product_area mt-3 mb-3 pt-3 pb-3" style="background: #f8f8f8;">

    <div class="container-fluid">
        <div class="trending_area d-flex justify-content-between align-items-center">
            <h5 class="section_ttileee text-uppercase">Trending Deals</h5>
            <h5 class="section_ttileee  "><a class="text-success" href="{{url('/trending')}}">All Products</a></h5>
        </div>
        <div class="row responsive">
            @foreach($trending as $prod)
                <div class="col-lg-2 col-6 mb-3">
                    <div class="product_items">
                        <div class="discount-area" style="z-index: 9999">
                            <span class="badge badge-danger bg-success position-absolute mt-3">Discount {{ substr($prod->discount, 0, 2)  }}%</span>
                        </div>
                        <div class="image_areaa animate__animated  animate__fadeIn ">
                            <a href="{{url('categories/'.$prod->category->slug.'/'.$prod->slug)}}"><img src="{{url('asset/upload/products/'.$prod->image)}}" alt=""></a>
                        </div>
                        <div class="text_area_product text-center mt-3">
                            <p class=" mb-1 ">৳ {{$prod->selling_price}}</p>
                            <p><a href="{{url('categories/'.$prod->category->slug.'/'.$prod->slug)}}">{{$prod->name}}</a></p>
                        </div>
                        <a href="#" class="ordebtn">অর্ডার করুন</a>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</div>

<div class="product_area mt-3 mb-3">

    <div class="container-fluid">
        <div class="row">
            <h3 class="section_ttileee liador">প্রয়োজনীয় প্রোডাক্ট</h3>
            @foreach($product as $prod)
                <div class="col-lg-2 col-6 mb-3 mt-3">
                    <div class="product_items" style="z-index: 9999">
                        <div class="discount-area">
                            <span class="badge badge-danger bg-danger position-absolute mt-3">Discount {{ substr($prod->discount, 0, 2)  }}%</span>
                        </div>
                        <div class="image_areaa animate__animated  animate__fadeIn">
                            <a href="{{url('categories/'.$prod->category->slug.'/'.$prod->slug)}}"><img src="{{url('asset/upload/products/'.$prod->image)}}" alt=""></a>
                        </div>
                        <div class="text_area_product text-center mt-3">
                            <p class=" mb-1 ">৳ {{$prod->selling_price}}</p>
                            <p><a href="{{url('categories/'.$prod->category->slug.'/'.$prod->slug)}}">{{substr($prod->name, 0, 150)}} </a></p>
                        </div>
                        <a href="#" class="ordebtn">অর্ডার করুন</a>
                    </div>
                </div>

            @endforeach
            <div class="col-lg-12 text-center">
                {{ $product->links('pagination::bootstrap-4') }}
            </div>


        </div>
    </div>
</div>

@endsection
