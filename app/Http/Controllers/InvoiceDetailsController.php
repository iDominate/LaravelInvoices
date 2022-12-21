<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetails;
use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoice = Invoice::with(['invoice_detail', 'invoice_attachment'])->find($request->id)->first();
        $invoice_details = InvoiceDetails::where('invoice_id', $invoice->id)->get();
        $attachments = InvoiceAttachment::where('invoice_id', $invoice->id)->get();
        return view('invoices.invoice_details', compact('invoice','invoice_details','attachments'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InvoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceDetails $invoiceDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InvoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceDetails $invoiceDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InvoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InvoiceDetails $invoiceDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InvoiceDetails  $invoiceDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceDetails $invoiceDetails)
    {
        //
    }

    public function openFile(Request $request){
        $name = public_path(path: 'attachments'.$request->invoice_number.'/'.$request->file_name);
        return response()->file($name);
    }

    public function download(Request $request){
        $name = public_path(path: 'attachments'.$request->invoice_number.'/'.$request->file_name);
        $headers = array(
            'Content-Type: image/jpeg',
          );
        return response()->download($name, headers: $headers);

    }

    public function remove(){
        
    }
}
