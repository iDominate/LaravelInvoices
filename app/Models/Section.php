<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['section_name', 'description', 'created_by'];

    function products() : HasMany
    {
        return $this->hasMany(Product::class, 'section_id', 'id');
    }
}
