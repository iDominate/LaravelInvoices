<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvoiceAttachment extends Model
{
    use HasFactory;

    // $table->string('file_name', 255);
    // $table->string('invoice_number', 50);
    // $table->string('created_by', 255);
    // $table->foreignId('invoice_id')->constrained()->cascadeOnDelete();

    protected $fillable = ['file_name','invoice_number','created_by','invoice_id'];

    function invoice() : BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
