@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary" href="{{ route('products.create') }}">Create Product</a>
                <div class="row" style="margin-top:1rem;">
                @php $i=0; @endphp
                  
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr style="text-align: center">
                                <th>No</th>
                                <th>Name Product</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>                   
                        <tbody>
                            @foreach ($productsView as $item)
                            @php $i++ @endphp                            
                            <tr style="text-align: center">                                
                                <td>{{ $i }}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}}</td>
                                <td style="display: flex;justify-content:center">
                                    <form action="{{ route('orders.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button type="submit" class="btn btn-secondary" style="margin-right:1rem">Add</button>
                                    </form>
                                    <a href="{{ route('products.edit',$item->id) }}" class="btn btn-warning mt-2a" style="margin-right:1rem">Edit</a>
                                    <form action="{{route('products.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>                            
                            </tr>
                            @endforeach      
                        </tbody>
                    </table>                        
                              
                </div>
            </div>
        </div>
    </div>
    
@endsection