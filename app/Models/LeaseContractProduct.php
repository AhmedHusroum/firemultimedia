<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class LeaseContractProduct extends Model
{
    protected $table = "lease_contracts_products";

    protected $fillable = [
        'lease_contract_id', 'product_id',
    ];

    
}