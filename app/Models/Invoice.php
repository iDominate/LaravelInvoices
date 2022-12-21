<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\InvoiceDetails;
use App\Models\InvoiceAttachment;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_number', 'due_date','product_name','section_name',
    'discount', 'rate_vat','value_vat','total','status','value_status','note','user','commision_amount', 'collection_amount', 'invoice_date'];

    function invoice_detail() : HasOne
    {
        return $this->hasOne(InvoiceDetails::class, 'invoice_id');
    }

    function invoice_attachment() : HasOne
    {
        return $this->hasOne(InvoiceAttachment::class, 'invoice_id');
    }
}
