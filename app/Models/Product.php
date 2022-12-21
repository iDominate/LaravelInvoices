<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Section;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'section_name', 'description', 'section_id'];

    function section() : BelongsTo
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }
}
