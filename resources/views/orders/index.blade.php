@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr style="text-align: center">
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($orderView)
                            @foreach ($orderView->order_details as $item)
                            <tr style="text-align: center">
                                <td>{{ $item->product_name }}</td>   
                                <td>{{ $item->price }}</td>   
                                <td>{{ $item->amount }}</td>
                                <td style="display:flex;justify-content:space-around">
                                    <form action="{{route('orders.update',$orderView->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <input type="hidden" value="decrease" name="value">
                                        <button class="btn btn-outline-danger" type="submit">-</button>
                                    </form>
                                    <form action="{{route('orders.update',$orderView->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <input type="hidden" value="increase" name="value">
                                        <button class="btn btn-outline-success">+</button>
                                    </form>
                                </td>   
                            </tr>
                            @endforeach
                            <tr style="text-align: center">
                                <td></td>
                                <td><b> {{ $orderView->total }}</b></td>
                                <td></td>
                                <td>
                                    <form action="{{route('orders.update',$orderView->id)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" value="checkout" name="value">
                                        <button class="btn btn-outline-primary">Checkout</button>
                                    </form>
                                </td>
                            </tr>
                        @endif                        
                    </tbody>
                </table>                
            </div>
        </div>
    </div>
@endsection