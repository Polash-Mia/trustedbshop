@extends('website.master')

@section('body')
<div class="container-fluid pt-5">
    <div class="text-center mb-4">


        @if ($products->count() == 0)
                <h1 class="text-center text-danger py-5">দুঃখিত কোন পণ্য পাওয়া যায়নি  </h1>
                <a href="{{ route('home') }}" class="btn btn-success rounded">HOME</a>
    

                @else
        <h2 class="section-title px-5"><span class="px-2">প্রয়োজনীয় প্রোডাক্ট</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">

        {{-- @if ($products->count() == 0)
        <div class="text-center">
            <h1 class="text-center text-danger">দুঃখিত কোন পণ্য পাওয়া যায়নি</h1>
        </div>
            <div>
                <a href="" class="btn btn-success rounded">HOME</a>
            </div> --}}
            
        {{-- @else --}}
        @foreach($products as $product)
        
       <div class=" col-md-2 col-6 ">
            <div class="card  border-0">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                        <img class="img-fluid w-100" src="{{asset($product->image)}}" alt="">
                    </a>
                    
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>৳{{$product->regular_price}}</del></h6>
                        <h6 class="text-warning">৳{{$product->selling_price}}</h6>
                        <a href="{{route('product.detail',['id'=>$product->id,'slug'=> Str::slug($product->name)])}}">
                            <h6 class="text-truncate mb-3">{{$product->name}}</h6>
                        </a>
                        
                            <form action="{{route('add-to-cart', ['id' => $product->id ])}}" method="POST">  
                                @csrf    
                                {{-- <input type="hidden" name="qty" value="1"> --}}
                                <input type="hidden" name="quantity"  value="1" >
                                <button type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" >অর্ডার করুন</button> 
                                {{-- <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white rounded" name="order_now" value="অর্ডার করুন"> --}}
                            </form>
                    
                </div>
                
            </div>
        </div>

        @endforeach
        @endif



        {{-- <div class=" col-md-2 col-6 pb-1">
            <div class="card  border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/images (1).jfif" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div>
        <div class=" col-md-2 col-6 pb-1">
            <div class="card product-item border-0 mb-4">
                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                    <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                </div>
                <div class="card-body border-left border-right text-center p-0 ">
                    
                    
                        <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                        <h6 class="text-warning">$123.00</h6>
                        <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <form action="" method="post">      
                                <input type="hidden" name="qty" value="1">
                                <input type="submit" class="btn btn-sm w-100 mb-2 bg-danger px-2 text-white" name="order_now" value="অর্ডার করুন">
                            </form>
                    
                </div>
                
            </div>
        </div> --}}



       
    </div>

    <span>{{$products->links()}}</span>
</div>

<style>
    .w-5{
        height: 45px;
        width: 45px;
    }
</style>
@endsection