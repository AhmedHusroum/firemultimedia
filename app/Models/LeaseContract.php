<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaseContract extends Model
{
    use HasFactory;

    protected $table = "lease_contracts";

    protected $fillable = ['name', 'description', 'start_date', 'end_date', 'type', 'is_signed', 'customer_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'lease_contracts_products', 'lease_contract_id', 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id'); // Gebruik 'customer_id' in plaats van 'user_id'
    }
}
