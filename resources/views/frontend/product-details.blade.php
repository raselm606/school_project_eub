@extends('frontend.layouts.app')
@section('content')
<div class="product_area mt-150 mb-3 " >

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Category</li>
                        <li class="breadcrumb-item"><a href="{{url('/categories/'.$product->category->slug)}}">{{$product->category->name}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
                    </ol>
                </nav>
                <div class="card cadr shadow p-3 mb-3" >
                    <div class="row ">
                        <div class="col-md-4">
                            @if(!empty($product->discount) )
                                <div class="discount-area">
                                    <span class="badge badge-danger bg-success position-absolute mt-3">Discount {{ substr($product->discount, 0, 2)  }}%</span>
                                </div>

                            @endif
                                <a data-fancybox="gallery" href="{{url('asset/upload/products/'.$product->image)}}"><img src="{{url('asset/upload/products/'.$product->image)}}" class="img-fluid rounded-start" alt="..."></a>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body cdbody">

                                <h3 class="card-title font-weight-bold ">{{$product->name}}</h3>
                                <h4><s>৳ {{$product->original_price}}</s> <span class="text-success">৳ {{$product->selling_price}}</span></h4>

                                <p class="card-text"> {!! $product->small_description !!}</p>
                                @if($product->trending == '1' )
                                    <label for="" class="badge badge-success bg-danger ">Trending</label>
                                @endif
                                @if(!empty($product->quantity) )
                                    <label for="" class="badge badge-success bg-success ">In stock: {{$product->quantity}}</label>
                                @endif

                                <br> <br><span class="liador mt-3"> পরিমানঃ</span>
                                <div class="input-group text-center" style="max-width: 140px;">

                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-outline-secondary btn-number"  data-type="minus" data-field="">
                                          <span class="fa fa-minus"></span>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="10" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-outline-secondary btn-number" data-type="plus" data-field="">
                                             <span class="fa fa-plus"></span>
                                        </button>
                                    </span>
                                </div>

                                <div class="btn_group mt-3">
                                    <a class="btn  btn-warning mb-2 liador" href="#"><span class="fa fa-plus-square"></span> অর্ডার করুন</a>
                                    <a class="btn  btn-success mb-2 liador" href="#"><span class="fa fa-cart-plus"></span> কার্টে রাখুন</a>
                                    <button class="btn btn-block  btn-outline-success mb-2"><span class="fa fa-phone-square-alt"></span> +8801681789989</button>
                                </div>

                                <div class="delivery_charge mt-3 col-lg-8 font-weight-bold">
                                    <hr>
                                    <div class="d-flex liadorr justify-content-between text-success">
                                        <span>ঢাকার বাইরে ডেলিভারি খরচ</span>
                                        <span class="liadorr">৳ {{$product->delivery_out}}</span>
                                    </div>
                                    <hr>
                                    <div class="d-flex liadorr justify-content-between text-success">
                                        <span>ঢাকার ভিতরে ডেলিভারি খরচ</span>
                                        <span class="liadorr">৳ {{$product->delivery_in}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">

                            <h5 class="liador">পন্যের বিবরণ :</h5>
                            <hr>
                            <div class="detailsss pl-3">
                                {!! $product->description !!}
                            </div>
{{--                            <ul class="nav nav-tabs" id="myTab" role="tablist">--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">--}}
{{--                                        পন্যের বিবরণ--}}
{{--                                    </button>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <div class="tab-content" id="myTabContent">--}}
{{--                                <div class="tab-pane fade show active mt-3 p-3" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">--}}
{{--                                    {!! $product->description !!}--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="product_area mt-3 mb-3">

        <div class="container-fluid">
            <div class="row">
                <h4 class="section_ttileee liador">রিলেটেড প্রোডাক্ট</h4>
                @foreach($product_pro as $prod)
                    <div class="col-lg-2 col-6 mb-3">
                        <div class="product_items">
                            <div class="discount-area">
                                <span class="badge badge-danger bg-success position-absolute mt-3">Discount {{ substr($prod->discount, 0, 2)  }}%</span>
                            </div>
                            <div class="image_areaa">
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
                    {{ $product_pro->links('pagination::bootstrap-4') }}
                </div>


            </div>
        </div>
    </div>
</div>
@endsection

