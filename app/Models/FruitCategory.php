<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FruitCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function fruitItems()
    {
        return $this->hasMany(FruitItem::class);
    }
   
    

}
