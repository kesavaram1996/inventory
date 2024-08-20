<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','name', 'description', 'quantity_in_stock', 'price'];

    public function getUser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    
}
