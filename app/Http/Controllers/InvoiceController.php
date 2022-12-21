<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetails;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.invoices',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::all();
        return view('invoices.add_invoice', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = Invoice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_date,
            'due_date'=> $request->due_date,
            'section_name' => Section::find($request->section_name)->first()->section_name,
            'product_name' => Product::find($request->product_name)->first()->product_name,
            'collection_amount' => $request->collection_amount,
            'commission_amount' => $request->commission_amount,
            'discount' => $request->discount,
            'rate_vat' => floatval(substr($request->rate_vat, 0, -1)),
            'value_vat' => $request->value_vat,
            'total' => $request->total,
            'note' => $request->note,
            'status' => 'غير مدفوعة',
            'value_status' => 2,
            'user' => auth()->user()->name
        ]);

        InvoiceDetails::create([
            'invoice_id' => $invoice->id,
            'invoice_number' => $request->invoice_number,
            'section_name' => $invoice->section_name,
            'product_name' => $invoice->product_name,
            'status' => $invoice->status,
            'status_value' => $invoice->value_status,
            'note' => $invoice->note,
            'user' => $invoice->user
        ]);

        if($request->hasFile('pic')){
            $this->validate($request, ['pic' => 'mimes:png,jpg,pdf'], ['pic' => ' pdf,png,jpeg خطا: يجب ان يكون الملف بصيغة ']);
        }

        $image = $request->file('pic');
        $image_name = $image->getClientOriginalName();
        InvoiceAttachment::create([
            'file_name' => $image_name,
            'invoice_number' => $request->invoice_number,
            'created_by' => $invoice->user,
            'invoice_id' => $invoice->id,
        ]);
        $request->file('pic')->move(public_path('attachments'.$invoice->invoice_number), $image_name);

        session()->flash('Success', 'تم اضافة الفاتورة بنجاح');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    function getProducts(Request $request)
    {
        $products = Product::where('section_id', $request->id)->get(['id', 'product_name']);
        return response()->json($products);
    }
}
