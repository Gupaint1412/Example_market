<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 0 = order , 1 = check out
        $order = Order::where('user_id',Auth::id())->where('status',0)->first();   //first เอาตัวแรกตัวเดียวที่เป็น 0
        // dd($order);
        return view('orders.index')->with('orderView',$order); ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return 'store order';
        $product = Product::find($request->product_id);
        $order = Order::where('user_id',Auth::id())->where('status',0)->first();   //first เอาตัวแรกตัวเดียวที่เป็น 0   // 1.1 เช็คว่ามีสินค้าในตระกร้าที่มีสถานะเป็น 1 หรือไม่ 
        if($order){  //ถ้ามี1.1 ให้เช็คว่ามีสินค้าชนิดเดียวกันในตระกร้าหรือไม่
            $orderDetail = $order->order_details()->where('product_id',$product->id)->first(); 
            if($orderDetail){ //ถ้ามีสินค้าชนิดเดียวกันในตะกร้า ให้เพิ่ม จำนวนใน oederdetail
                $amountNew = $orderDetail->amount +1;
                $orderDetail->update([
                    'amount' => $amountNew
                ]);
            }else{ //ถ้าไม่มีสินค้าชนิดเดียวกันให้เพิ่มสินค้าใหม่เข้าไปในตระกร้า
                $prepareCartDetail = [
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'amount' => 1,
                    'price' => $product->price,
                ];
                $orderDetail = OrderDetail::create($prepareCartDetail);
            }
        }else//ถ้าไม่มี 1.1 ให้สร้างตระกร้าที่มี สถานะเป็น 0 และเพิ่มสินค้าในตระกร้า
        {
            $prepareCart = [
                'status' => 0,
                'user_id' => Auth::id(),
            ];
    
            $order = Order::create($prepareCart);
    
           
            $prepareCartDetail = [
                'order_id' => $order->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'amount' => 1,
                'price' => $product->price,
            ];
            $orderDetail = OrderDetail::create($prepareCartDetail);
        }
        
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
