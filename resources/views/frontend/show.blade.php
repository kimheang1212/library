@extends('layout.frontend')
@section('content')
<div class="container">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6">
                <a href="{{url('/show/'.$product->id)}}">
                    <img src="/img/{{$product->image}}" width="200px" alt="">
                </a>
            <div class="col-md-6">
                <div class="small mb-1">SKU: {{$product->id}}</div>
                <h1 class="display-5 fw-bolder">{{$product->name}}</h1>
                <div class="fs-5 mb-5">
                    <span>${{$product->price}}</span>
                </div>
                <p class="lead">
                    {{$product->description}}
                </p>
                <div class="d-flex">
                    <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                    <button class="btn btn-outline-dark flex-shrink-0" type="button">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection