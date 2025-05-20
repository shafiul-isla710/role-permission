<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.pages.product.index',compact('products'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'description'=>'required',
            'price'=>'required',
            'qty'=>'required'
         ]);

         Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'qty'=>$request->qty
         ]);
         flash()->success('Product Created Successfully');
         return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $product = Product::findOrFail($id);
        return view('backend.pages.product.edit',compact('product'));

    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          $request->validate([
            'name' => 'required',
            'description'=>'required',
            'price'=>'required',
            'qty'=>'required'
         ]);

         Product::findOrFail($id)->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'qty'=>$request->qty
         ]);
         flash()->success('Product Updated Successfully');
         return redirect()->route('product.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
