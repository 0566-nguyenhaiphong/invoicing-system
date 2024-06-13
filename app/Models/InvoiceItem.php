<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'fruit_item_id',
        'quantity',
        'amount'
        // other fillable fields if any
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function fruitItem()
    {
        return $this->belongsTo(FruitItem::class);
    }
    

}
