<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FruitItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'unit',
        'price',
        // Any other fields you want to be mass assignable
    ];
    public function category()
    {
        return $this->belongsTo(FruitCategory::class);
    }

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

}
