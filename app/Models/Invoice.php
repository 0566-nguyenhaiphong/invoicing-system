<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        // other fillable fields if any
    ];
    public function items()
    {
        return $this->hasMany(InvoiceItem::class);
    }
    
    
}
