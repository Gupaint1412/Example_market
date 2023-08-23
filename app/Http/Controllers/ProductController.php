<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('productsView',$products);   //ข้าหน้าคือชื่อตัวแปร  ข้างหลังคือข้อมูลที่เอามาจากฐานข้อมูล
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prepareProduct = [
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => Auth::id()
        ];
        $product = Product::create($prepareProduct);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // return $product;
        return view('products.edit')->with('product',$product);   //  'ตัวแปรเรียกใช้ที่ view' , $ค่าที่รับมา
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $prepareProduct = [
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => Auth::id()
        ];
        $productInst = Product::find($product->id);
        // dd($productInst);
        $productInst->update($prepareProduct);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // return 'delete'.$product->id;
        $productInst = Product::find($product->id);
        $productInst->delete();
        return redirect()->route('products.index');
    }
}
