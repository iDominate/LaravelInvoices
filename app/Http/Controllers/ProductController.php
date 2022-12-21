<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

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
        $sections = Section::all();
        return view('products.products', compact(['products','sections']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.add_invoice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'section_id' => 'required|exists:sections,id',
            'description' => 'required'
        ],[
            'product_name-required' => 'ادخل اسم القسم',
            'section_id.required' => 'اختر القسم',
            'description' => 'ادخل بيان الملاحظات'
        ]);
        

        $exisiting_section = Section::find($request->section_id)->first();

        $request->merge(['section_name' => $exisiting_section->section_name]);

        Product::create($request->all());

        session()->flash('Success', 'تم اضافة المنتج بنجاح');

        return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $existing_product = Product::find($request->id);
        $existing_product->update($request->all());
        session()->flash('Success', 'تم تعديل المنتج بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $existing_product = Product::find($request->id);
        $existing_product->delete();
        session()->flash('Success', 'تم حذف المنتج بنجاح');
        return redirect()->back();
    }
}
