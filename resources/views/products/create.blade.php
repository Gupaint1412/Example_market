@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">              
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <label for="">name</label>
                    <input class="form-control" type="text" name="name">
                    <label for="">price</label>
                    <input class="form-control" type="text" name="price">
                    <button class="btn btn-success" type="submit" style="margin-top:1rem;">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection