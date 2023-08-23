@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">              
                <form action="{{ route('products.update',$product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="">name</label>
                    <input class="form-control" type="text" name="name" value="{{$product->name}}">
                    <label for="">price</label>
                    <input class="form-control" type="text" name="price" value="{{$product->price}}">
                    <button class="btn btn-info" type="submit" style="margin-top:1rem;">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection