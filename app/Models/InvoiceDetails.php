<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceDetails extends Model
{
    use HasFactory;

    protected $table = 'invoice_details';

    protected $fillable = ['invoice_id', 'invoice_number','section_name','product_name','status','status_value','note','user'];

    function invoice() : BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

}
