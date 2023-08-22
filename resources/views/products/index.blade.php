@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('products.create') }}">Create Product</a>
                <div class="row">
                    @foreach ($productsView as $item)
                        <div class="col-4">
                            <div class="card">
                                <a href="">
                                    <h4>ชื่อสินค้า {{$item->name}}</h4> 
                                      <p> ราคา {{$item->price}}</p>
                                 </a>
                            </div>                            
                        </div>
                    @endforeach                 
                </div>
            </div>
        </div>
    </div>
    
@endsection